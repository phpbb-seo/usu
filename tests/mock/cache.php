<?php
/**
*
* @package Ultimate phpBB SEO Friendly URL
* @copyright (c) 2017 www.phpbb-seo.org
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbbseo\usu\tests\mock;

/**
* Cache Mock
* @package phpBB3
*/
class cache extends \phpbb\cache\driver\null
{
	public function __construct()
	{
	}

	public function obtain_bots()
	{
		return array();
	}

	public function obtain_word_list()
	{
		return array();
	}

	public function set_bots($bots)
	{
	}
}
