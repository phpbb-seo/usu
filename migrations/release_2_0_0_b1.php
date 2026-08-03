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

namespace phpbbseo\usu\migrations;

use phpbb\db\migration\migration;

class release_2_0_0_b1 extends migration
{
	public function effectively_installed(): bool
	{
		if (!empty($this->config['seo_usu_on']))
		{
			return $this->db_tools->sql_column_exists($this->table_prefix . 'topics', 'topic_url');
		}

		return false;
	}

	static public function depends_on(): array
	{
		return ['\phpbb\db\migration\data\v310\rc1'];
	}

	public function update_schema(): array
	{
		return [
			'add_columns'	=> [
				TOPICS_TABLE	=> [
					'topic_url'	=> ['VCHAR:255', ''],
				],
			],
		];
	}

	public function revert_schema(): array
	{
		return [
			'drop_columns'	=> [
				TOPICS_TABLE	=> [
					'topic_url',
				],
			],
		];
	}

	public function update_data(): array
	{
		return [
			['config.add', ['seo_usu_on', 1]],
			[
				'module.add',
				[
					'acp',
					'',
					[
						'module_langname'	=> 'ACP_CAT_PHPBB_SEO',
					],
				]
			],
			[
				'module.add',
				[
					'acp',
					'ACP_CAT_PHPBB_SEO',
					[
						'module_langname'	=> 'ACP_MOD_REWRITE',
					],
				]
			],
			[
				'module.add',
				[
					'acp',
					'ACP_MOD_REWRITE',
					[
						'module_basename'	=> '\phpbbseo\usu\acp\usu',
						'module_langname'	=> 'ACP_PHPBB_SEO_CLASS',
						'module_mode'		=> 'settings',
						'module_auth'		=> 'ext_phpbbseo/usu && acl_a_board',
					],
				]
			],
			[
				'module.add',
				[
					'acp',
					'ACP_MOD_REWRITE',
					[
						'module_basename'	=> '\phpbbseo\usu\acp\usu',
						'module_langname'	=> 'ACP_FORUM_URL',
						'module_mode'		=> 'forum_url',
						'module_auth'		=> 'ext_phpbbseo/usu && acl_a_board',
					],
				],
			],
			[
				'module.add',
				[
					'acp',
					'ACP_MOD_REWRITE',
					[
						'module_basename'	=> '\phpbbseo\usu\acp\usu',
						'module_langname'	=> 'ACP_HTACCESS',
						'module_mode'		=> 'htaccess',
						'module_auth'		=> 'ext_phpbbseo/usu && acl_a_board',
					],
				]
			],
			[
				'module.add',
				[
					'acp',
					'ACP_MOD_REWRITE',
					[
						'module_basename'	=> '\phpbbseo\usu\acp\usu',
						'module_langname'	=> 'ACP_SEO_EXTENDED',
						'module_mode'		=> 'extended',
						'module_auth'		=> 'ext_phpbbseo/usu && acl_a_board',
					],
				]
			],
		];
	}
}
