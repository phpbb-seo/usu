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

class release_2_0_0_b2 extends migration
{
	public function effectively_installed(): bool
	{
		if (!empty($this->config['seo_usu_version']))
		{
			return version_compare($this->config['seo_usu_version'], '2.0.0-b2', '>=');
		}

		return false;
	}

	static public function depends_on(): array
	{
		return ['\phpbbseo\usu\migrations\release_2_0_0_b1'];
	}

	public function update_data(): array
	{
		return [
			['config.add', ['seo_usu_version', '2.0.0-b2']],
			[
				'module.remove',
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
						'module_langname'	=> 'ACP_REWRITE_CONF',
						'module_mode'		=> 'server',
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
						'module_langname'	=> 'ACP_SYNC_URL',
						'module_mode'		=> 'sync_url',
						'module_auth'		=> 'ext_phpbbseo/usu && acl_a_board',
					],
				]
			],
		];
	}
}
