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

namespace phpbbseo\usu;

class ext extends \phpbb\extension\base
{
    public function is_enableable(): bool
    {
        return version_compare(PHP_VERSION, '7.4', '>=');
    }
}
