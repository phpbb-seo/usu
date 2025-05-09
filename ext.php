<?php
/**
*
* @package Ultimate phpBB SEO Friendly URL
* @copyright (c) 2017 www.phpBB-SEO.ir
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbbseo\usu;

class ext extends \phpbb\extension\base
{
    public function is_enableable()
    {
        return version_compare(PHP_VERSION, '7.4', '>=');
    }
}
