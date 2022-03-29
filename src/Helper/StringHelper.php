<?php

namespace App\Helper;

class StringHelper
{
    public const _STRING = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_';

    /**
     * @param int $length
     *
     * @return string
     */
    public static function getRandomString(int $length = 10): string
    {
        $charactersLength = strlen(static::_STRING);
        $randomString = '';
        for ($i = 0; $i < $length; ++$i) {
            $randomString .= static::_STRING[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}
