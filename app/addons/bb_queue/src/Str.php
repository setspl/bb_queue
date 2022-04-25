<?php
/**
 * @copyright ArenaSoftwareS
 * @author Panos <panos@kartpay.com>
 * Created: 24/4/2022/Απρ/2022
 * Time: 23:17
 */

namespace Tygh\Addons\Queue;

class Str {
    public static function contains($haystack, $needles)
    {
        foreach ((array) $needles as $needle) {
            if ($needle !== '' && mb_strpos($haystack, $needle) !== false) {
                return true;
            }
        }

        return false;
    }

}