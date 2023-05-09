<?php

declare(strict_types = 1);

namespace Hoppy\Framework\Classes\Helper;

use Hoppy\Framework\Classes\Traits\HttpTrait;
use Hoppy\Framework\Classes\Utils;

class Env
{

    use HttpTrait;

    public function ip(): string
    {
        $headers       = $this->request()->getHeaders();
        $xForwardedFor = (string) ($headers['HTTP_X_FORWARDED_FOR'] ?? '');
        if ($xForwardedFor) {
            if (strpos($xForwardedFor, ',') !== false) {
                $tmp = explode(',', $xForwardedFor);
                $ip  = trim(reset($tmp));

            }
            else {
                $ip = $xForwardedFor;
            }
            if (Utils::isIp($ip)) {
                return $ip;
            }
        }

        $clientIp = (string) ($headers['HTTP_CLIENT_IP'] ?? '');
        if (Utils::isIp($clientIp)) {
            return $clientIp;
        }

        $remoteIp = (string) ($headers['REMOTE_ADDR'] ?? '');
        if (Utils::isIp($remoteIp)) {
            return $remoteIp;
        }

        return 'unknown';
    }
}