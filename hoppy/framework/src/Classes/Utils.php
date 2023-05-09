<?php

declare(strict_types = 1);

namespace Hoppy\Framework\Classes;


class Utils
{
    /**
     * 是否是局域网IP
     * @param string $ip
     * @return bool
     */
    public static function isLocalIp(string $ip): bool
    {
        if (strpos($ip, '127.0.') === 0) {
            return true;
        }
        return (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE));
    }


    /**
     * 是否是 IP
     * @param string $ip
     * @return bool
     */
    public static function isIp(string $ip): bool
    {
        return (bool) filter_var($ip, FILTER_VALIDATE_IP);
    }
}