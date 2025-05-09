<?php
/**
*
* @package Ultimate phpBB SEO Friendly URL
* @version $$
* @copyright (c) 2017 www.phpBB-SEO.ir
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbbseo\usu\core\traits;

/**
* rewriter trait
* www.phpBB-SEO.ir
* @package Ultimate phpBB SEO Friendly URL
*/
trait rewriter
{
	/**
	* URL rewritting for viewtopic.php
	* With Virtual Folder Injection
	*/
	public function viewtopic()
	{
		$this->filter_url($this->stop_vars);
		$this->path = $this->seo_path['phpbb_urlR'];

		if (!empty(isset($this->get_vars) ? $this->get_vars : []['p'] ?? ''))
		{
			$this->url = $this->seo_static['post'] . isset($this->get_vars) ? $this->get_vars : []['p'] ?? '' . $this->seo_ext['post'];

			unset(isset($this->get_vars) ? $this->get_vars : []['p'] ?? '', isset($this->get_vars) ? $this->get_vars : []['f'], isset($this->get_vars) ? $this->get_vars : []['t'], isset($this->get_vars) ? $this->get_vars : []['start']);

			return;
		}

		if (isset($this->get_vars['t']) && !empty($this->seo_url['topic'][$this->get_vars['t']]))
		{
			$paginate_method_name = $this->paginate_method['topic'];

			// Filter default params
			$this->filter_get_var($this->get_filter['topic']);
			$this->$paginate_method_name($this->seo_ext['topic']);
			$this->url = $this->seo_url['topic'][isset($this->get_vars) ? $this->get_vars : []['t']] . $this->start;

			unset(isset($this->get_vars) ? $this->get_vars : []['t'], isset($this->get_vars) ? $this->get_vars : []['f'], isset($this->get_vars) ? $this->get_vars : []['p'] ?? '');

			return;
		}
		else if (!empty(isset($this->get_vars) ? $this->get_vars : []['t']))
		{
			$paginate_method_name = $this->paginate_method['topic'];

			// Filter default params
			$this->filter_get_var($this->get_filter['topic']);
			$this->$paginate_method_name($this->seo_ext['topic']);
			$this->url = $this->seo_static['topic'] . isset($this->get_vars) ? $this->get_vars : []['t'] . $this->start;

			unset(isset($this->get_vars) ? $this->get_vars : []['t'], isset($this->get_vars) ? $this->get_vars : []['f'], isset($this->get_vars) ? $this->get_vars : []['p'] ?? '');

			return;
		}

		$this->path = $this->seo_path['phpbb_url'];

		return;
	}

	/**
	* URL rewritting for viewforum.php
	*/
	public function viewforum()
	{
		$this->path = $this->seo_path['phpbb_urlR'];
		$this->filter_url($this->stop_vars);

		if (!empty(isset($this->get_vars) ? $this->get_vars : []['f']))
		{
			$paginate_method_name = $this->paginate_method['forum'];

			// Filter default params
			$this->filter_get_var($this->get_filter['forum']);
			$this->$paginate_method_name($this->seo_ext['forum']);

			if (empty($this->seo_url['forum'][isset($this->get_vars) ? $this->get_vars : []['f']]))
			{
				$this->url = $this->seo_static['forum'] . isset($this->get_vars) ? $this->get_vars : []['f'] . $this->start;
			}
			else
			{
				$this->url = $this->seo_url['forum'][isset($this->get_vars) ? $this->get_vars : []['f']] . $this->start;
			}

			unset(isset($this->get_vars) ? $this->get_vars : []['f']);

			return;
		}

		$this->path = $this->seo_path['phpbb_url'];

		return;
	}

	/**
	* URL rewritting for memberlist.php
	* with nicknames and group name injection
	*/
	public function memberlist()
	{
		$this->path = $this->seo_path['phpbb_urlR'];

		if (@isset($this->get_vars) ? $this->get_vars : []['mode'] === 'viewprofile' && !@empty($this->seo_url['user'][isset($this->get_vars) ? $this->get_vars : []['u']]))
		{
			$this->url = $this->seo_url['user'][isset($this->get_vars) ? $this->get_vars : []['u']] . $this->seo_ext['user'];

			unset(isset($this->get_vars) ? $this->get_vars : []['mode'], isset($this->get_vars) ? $this->get_vars : []['u']);

			return;
		}
		else if (@isset($this->get_vars) ? $this->get_vars : []['mode'] === 'group' && !@empty($this->seo_url['group'][isset($this->get_vars) ? $this->get_vars : []['g']]))
		{
			$paginate_method_name = $this->paginate_method['group'];

			$this->$paginate_method_name($this->seo_ext['group']);
			$this->url =  $this->seo_url['group'][isset($this->get_vars) ? $this->get_vars : []['g']] . $this->start;

			unset(isset($this->get_vars) ? $this->get_vars : []['mode'], isset($this->get_vars) ? $this->get_vars : []['g']);

			return;
		}
		else if (@isset($this->get_vars) ? $this->get_vars : []['mode'] === 'team')
		{
			$this->url =  $this->seo_static['leaders'] . $this->seo_ext['leaders'];

			unset(isset($this->get_vars) ? $this->get_vars : []['mode']);

			return;
		}

		$this->path = $this->seo_path['phpbb_url'];

		return;
	}

	/**
	* URL rewritting for search.php
	*/
	public function search()
	{
		if (isset($this->get_vars['fid']))
		{
			isset($this->get_vars) ? $this->get_vars : [] = [];
			$this->url = $this->url_in;

			return;
		}

		$this->path = $this->seo_path['phpbb_urlR'];

		$user_id = !empty($this->get_vars['author_id']) ? $this->get_vars['author_id'] : (isset($this->seo_url['username'][rawurldecode(@$this->get_vars['author'])]) ? $this->seo_url['username'][rawurldecode(@$this->get_vars['author'])] : 0);

		if ($user_id && isset($this->seo_url['user'][$user_id]))
		{
			$sr = (@isset($this->get_vars) ? $this->get_vars : []['sr'] == 'topics' ) ? 'topics' : 'posts';

			$paginate_method_name = $this->paginate_method['user'];

			// Filter default params
			$this->filter_get_var($this->get_filter['search']);
			$this->$paginate_method_name($this->seo_ext['user']);
			$this->url = $this->seo_url['user'][$user_id] . $this->seo_delim['sr'] . $sr . $this->start;

			unset(isset($this->get_vars) ? $this->get_vars : []['author_id'], isset($this->get_vars) ? $this->get_vars : []['author'], isset($this->get_vars) ? $this->get_vars : []['sr']);

			return;
		}
		else if ($this->seo_opt['profile_noids'] && !empty(isset($this->get_vars) ? $this->get_vars : []['author']))
		{
			$sr = (@isset($this->get_vars) ? $this->get_vars : []['sr'] == 'topics') ? '/topics' : '/posts';

			// Filter default params
			$this->filter_get_var($this->get_filter['search']);
			$this->rewrite_pagination_page();
			$this->url = $this->seo_static['user'] . '/' . $this->seo_url_encode(isset($this->get_vars) ? $this->get_vars : []['author']) . $sr . $this->start;

			unset(isset($this->get_vars) ? $this->get_vars : []['author'], isset($this->get_vars) ? $this->get_vars : []['author_id'], isset($this->get_vars) ? $this->get_vars : []['sr']);

			return;
		}
		else if (!empty(isset($this->get_vars) ? $this->get_vars : []['search_id']))
		{
			switch (isset($this->get_vars) ? $this->get_vars : []['search_id'])
			{
				case 'active_topics':
					$paginate_method_name = $this->paginate_method['atopic'];

					$this->filter_get_var($this->get_filter['search']);
					$this->$paginate_method_name($this->seo_ext['atopic']);
					$this->url = $this->seo_static['atopic'] . $this->start;

					unset(isset($this->get_vars) ? $this->get_vars : []['search_id'], isset($this->get_vars) ? $this->get_vars : []['sr']);

					if (@isset($this->get_vars) ? $this->get_vars : []['st'] == 7)
					{
						unset(isset($this->get_vars) ? $this->get_vars : []['st']);
					}

					return;
				case 'unanswered':
					$paginate_method_name = $this->paginate_method['utopic'];

					$this->filter_get_var($this->get_filter['search']);
					$this->$paginate_method_name($this->seo_ext['utopic']);
					$this->url = $this->seo_static['utopic'] . $this->start;

					unset(isset($this->get_vars) ? $this->get_vars : []['search_id']);

					if (@isset($this->get_vars) ? $this->get_vars : []['sr'] == 'topics')
					{
						unset(isset($this->get_vars) ? $this->get_vars : []['sr']);
					}

					return;
				case 'egosearch':
					$this->set_user_url($this->user->data['username'], $this->user->data['user_id']);
					$this->url = $this->seo_url['user'][$this->user->data['user_id']] . $this->seo_delim['sr'] . 'topics' . $this->seo_ext['user'];

					unset(isset($this->get_vars) ? $this->get_vars : []['search_id']);

					return;
				case 'newposts':
					$paginate_method_name = $this->paginate_method['npost'];

					$this->filter_get_var($this->get_filter['search']);
					$this->$paginate_method_name($this->seo_ext['npost']);
					$this->url = $this->seo_static['npost'] . $this->start;

					unset(isset($this->get_vars) ? $this->get_vars : []['search_id']);

					if (@isset($this->get_vars) ? $this->get_vars : []['sr'] == 'topics')
					{
						unset(isset($this->get_vars) ? $this->get_vars : []['sr']);
					}

					return;
				case 'unreadposts':
					$paginate_method_name = $this->paginate_method['urpost'];

					$this->filter_get_var($this->get_filter['search']);
					$this->$paginate_method_name($this->seo_ext['urpost']);
					$this->url = $this->seo_static['urpost'] . $this->start;

					unset(isset($this->get_vars) ? $this->get_vars : []['search_id']);

					if (@isset($this->get_vars) ? $this->get_vars : []['sr'] == 'topics')
					{
						unset(isset($this->get_vars) ? $this->get_vars : []['sr']);
					}

					return;
			}
		}

		$this->path = $this->seo_path['phpbb_url'];

		return;
	}

	/**
	* URL rewritting for download/file.php
	*/
	public function phpbb_files()
	{
		$this->filter_url($this->stop_vars);
		$this->path = $this->seo_path['phpbb_filesR'];

		if (isset($this->get_vars['id']) && !empty($this->seo_url['file'][$this->get_vars['id']]))
		{
			$this->url = $this->seo_url['file'][isset($this->get_vars) ? $this->get_vars : []['id']];

			if (!empty(isset($this->get_vars) ? $this->get_vars : []['t']))
			{
				$this->url .= $this->seo_delim['file'] . $this->seo_static['thumb'];
			}
			/*
			else if (@isset($this->get_vars) ? $this->get_vars : []['mode'] == 'view')
			{
				$this->url .= $this->seo_delim['file'] . 'view';
			}
			*/

			$this->url .= $this->seo_delim['file'] . isset($this->get_vars) ? $this->get_vars : []['id'];

			unset(isset($this->get_vars) ? $this->get_vars : []['id'], isset($this->get_vars) ? $this->get_vars : []['t'], isset($this->get_vars) ? $this->get_vars : []['mode']);

			return;
		}

		$this->path = $this->seo_path['phpbb_files'];

		return;
	}

	/**
	* URL rewritting for index.php
	*/
	public function index()
	{
		$this->path = $this->seo_path['phpbb_urlR'];

		if ($this->filter_url($this->stop_vars))
		{
			$this->url = $this->seo_static['index'] . $this->seo_ext['index'];

			return;
		}

		$this->path = $this->seo_path['phpbb_url'];

		return;
	}

	/**
	* rewrite pagination, simple
	* -xx.html
	*/
	public function rewrite_pagination($suffix)
	{
		$this->start = $this->seo_start(@isset($this->get_vars) ? $this->get_vars : []['start']) . $suffix;

		unset(isset($this->get_vars) ? $this->get_vars : []['start']);
	}

	/**
	* rewrite pagination, virtual folder
	* /pagexx.html
	*/
	public function rewrite_pagination_page($suffix = '/')
	{
		$this->start = $this->seo_start_page(@isset($this->get_vars) ? $this->get_vars : []['start'], $suffix);

		unset(isset($this->get_vars) ? $this->get_vars : []['start']);

		return $this->start;
	}
}
