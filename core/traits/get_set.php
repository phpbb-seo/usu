<?php

declare(strict_types=1);

/**
 * Ultimate SEO URL Extension for phpBB
 *
 * Copyright (c) 2026
 *
 * Released under the GNU General Public License v2.0
 *
 * https://opensource.org/licenses/GPL-2.0
 */

namespace phpbbseo\usu\core\traits;

/**
* get_set trait
* phpBB SEO
* @package Ultimate phpBB SEO Friendly URL
*/
trait get_set
{
	// -> Cache functions
	/**
	* forum_id(&$forum_id, $forum_uri = '')
	* will tell the forum id from the uri or the forum_uri GET var by checking the cache.
	*/
	public function get_forum_id(int &$forum_id, string $forum_uri = ''): int
	{
		if (empty($forum_uri))
		{
			$forum_uri = $this->request->variable('forum_uri', '');

			if ($this->request !== null)
			{
				$this->request->overwrite('forum_uri', null, \phpbb\request\request_interface::REQUEST);
				$this->request->overwrite('forum_uri', null, \phpbb\request\request_interface::GET);
			}
			else
			{
				unset($_GET['forum_uri'], $_REQUEST['forum_uri']);
			}
		}

		if (empty($forum_uri) || $forum_uri === $this->seo_static['global_announce'])
		{
			return 0;
		}

		if (!empty($this->cache_config['forum_urls']) && ($id = array_search($forum_uri, $this->cache_config['forum_urls'])))
		{
			$forum_id = max(0, (int) $id);
		}
		elseif ($id = $this->get_url_info('forum', $forum_uri, 'id'))
		{
			$forum_id = max(0, (int) $id);
		}
		elseif (!empty($this->forum_redirect) && isset($this->forum_redirect[$forum_uri]))
		{
			$forum_id = max(0, (int) $this->forum_redirect[$forum_uri]);
		}

		return $forum_id;
	}

	/**
	* Will unset all default var stored in $filter array.
	* Example $filter = array('st' => 0, 'sk' => 't', 'sd' => 'a', 'hilit' => '');
	*/
	public function filter_get_var(array $filter = []): void
	{
		if (empty($this->get_vars))
		{
			return;
		}

		foreach ($this->get_vars as $paramkey => $paramval)
		{
			if (isset($filter[$paramkey]) && ($filter[$paramkey] == $paramval || $paramval === null))
			{
				unset($this->get_vars[$paramkey]);
			}
		}
	}

	/**
	* get_canonical
	* Returns the canonical url if ever built
	* Beware with ssl :
	* 	Since we want zero duplicate, the canonical element will only use https when ssl is forced
	* 	(eg set as THE server protocol in config) and will use http in other cases.
	*/
	public function get_canonical(): string
	{
		return !empty($this->seo_path['canonical']) ? $this->sslify($this->seo_path['canonical'], $this->ssl['forced']) : '';
	}

	/**
	* set_title($type, $title, $id, $parent = '')
	* Set title for url injection
	*/
	public function set_title(string $type, string $title, int|string $id, string $parent = ''): string
	{
		if (empty($this->seo_url[$type][$id]))
		{
			$this->seo_url[$type][$id] = ($parent !== '' ? $parent . '/' : '') . $this->format_url($title, $this->seo_static[$type]);
		}

		return $this->seo_url[$type][$id];
	}

	/**
	* set_cond($bool, $type = 'bool_redir', $or = true)
	* Helps out grabbing boolean vars
	*/
	public function set_cond(bool $bool, string $type = 'do_redir', bool $or = true): void
	{
		if ($or)
		{
			$this->seo_opt['zero_dupe'][$type] = $bool || !empty($this->seo_opt['zero_dupe'][$type]);
		}
		else
		{
			$this->seo_opt['zero_dupe'][$type] = $bool && !empty($this->seo_opt['zero_dupe'][$type]);
		}
	}

	/**
	* Set the do_redir_post option right
	*/
	public function set_do_redir_post(): bool
	{
		switch ($this->seo_opt['zero_dupe']['post_redir'] ?? '')
		{
			case 'guest':
				if (empty($this->user->data['is_registered']))
				{
					$this->seo_opt['zero_dupe']['do_redir_post'] = true;
				}
				break;
			case 'all':
				$this->seo_opt['zero_dupe']['do_redir_post'] = true;
				break;
			case 'off': // Do not redirect
				$this->seo_opt['zero_dupe']['do_redir'] = false;
				$this->seo_opt['zero_dupe']['go_redir'] = false;
				$this->seo_opt['zero_dupe']['do_redir_post'] = false;
				break;
			default:
				$this->seo_opt['zero_dupe']['do_redir_post'] = false;
				break;
		}

		return $this->seo_opt['zero_dupe']['do_redir_post'] ?? false;
	}
}
