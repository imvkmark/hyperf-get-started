<?php

declare(strict_types = 1);

namespace Hoppy\Framework\Classes\Conn;

use Carbon\Carbon;
use Hyperf\Utils\Arr;
use Hyperf\Utils\Str;

/**
 * 应用验签
 */
class ConnSign
{

    /**
     * 计算验签
     * @param array      $params 参数
     * @param int|string $appid  应用 ID
     * @param string     $secret 密钥
     * @return array
     */
    public static function sign(array $params, $appid, string $secret): array
    {
        $params         = array_merge($params, [
            'appid'     => $appid,
            'timestamp' => Carbon::now()->timestamp,
        ]);
        $sign           = self::calcSign($params, $secret);
        $params['sign'] = $sign;

        return $params;
    }

    /**
     * 对数据进行签名, 并返回 md5 的数据
     * @param array  $params 参数
     * @param string $secret 密钥
     * @return string
     */
    protected static function calcSign(array $params, string $secret): string
    {
        $params = self::except($params);
        ksort($params);
        $kvStr = http_build_query($params, '', '&');
        return md5(md5($kvStr) . $secret);
    }

    /**
     * @param $params
     * @return array
     */
    protected static function except($params): array
    {
        $excepts = [];
        foreach ($params as $key => $param) {
            if (!Str::startsWith($key, '_')) {
                if (is_array($param)) {
                    $excepts[$key] = $param;
                }
                else {
                    $excepts[$key] = trim((string) $param);
                }
            }
        }
        return Arr::except($excepts, [
            'sign', 'image', 'file', 'appid',
        ]);
    }
}