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
* Request Mock
* @package phpBB3
*/
class request extends \phpbb\request\request
{
	public function __construct()
	{
	}

	public function overwrite($var_name, $value, $super_global = \phpbb\request\request_interface::REQUEST)
	{
	}

	public function variable($var_name, $default, $multibyte = false, $super_global = \phpbb\request\request_interface::REQUEST)
	{
		return $default;
	}

	public function server($var_name, $default = '')
	{
		return $default;
	}

	public function header($var_name, $default = '')
	{
		return $default;
	}

	public function is_set_post($name)
	{
		return false;
	}

	public function is_set($var, $super_global = \phpbb\request\request_interface::REQUEST)
	{
		return false;
	}

	public function is_ajax()
	{
		return false;
	}

	public function is_secure()
	{
		return false;
	}

	public function variable_names($super_global = \phpbb\request\request_interface::REQUEST)
	{
		return array();
	}

	public function get_super_global($super_global = \phpbb\request\request_interface::REQUEST)
	{
		return array();
	}
}
