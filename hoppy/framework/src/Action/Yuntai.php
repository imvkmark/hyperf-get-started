<?php

declare(strict_types = 1);

namespace Hoppy\Framework\Action;

use Hoppy\Framework\Classes\Conn\ConnClient;
use Hoppy\Framework\Classes\Traits\AppTrait;
use Hoppy\Framework\Classes\Traits\FrameworkTrait;
use Hoppy\Framework\Classes\Traits\HyperfTrait;

/**
 * 对接 Console 中台
 */
class Yuntai
{
    use AppTrait, HyperfTrait, FrameworkTrait;

    /**
     * 应用控制台客户端
     * @var ConnClient
     */
    private ConnClient $client;

    /**
     * 控制台 URL
     * @var string
     */
    private string $host;

    /**
     * 汇报之后的地址
     * @var string
     */
    private string $yuntaiUrl;

    /**
     * 应用 ID
     * @var string
     */
    private string $appid;

    /**
     */
    public function __construct()
    {
        $this->appid  = (string) env('YUNTAI_APPID');
        $secret       = (string) env('YUNTAI_SECRET');
        $this->host   = (string) env('YUNTAI_URL');
        $this->client = $this->microAppClient()->setAppid($this->appid)->setSecret($secret);
    }

    /**
     * 获取本地的文件上传
     * @param $type
     * @return bool
     */
    public function apidocCapture($type): bool
    {
        if (!$this->checkAppId()) {
            return false;
        }
        $cwUrl = $this->host . '/api_v1/op/app/apidoc/capture';
        $file  = BASE_PATH . '/storage/docs/' . $type . '/assets/main.bundle.js';
        if (!file_exists($file)) {
            return $this->setError('文件不存在');
        }


        $resp = $this->client->file($cwUrl, [
            'name'    => env('APP_NAME'),
            'version' => $type . '-' . 'latest',
        ], $file);

        $status  = data_get($resp, 'status');
        $message = data_get($resp, 'message');
        if ($status !== 0) {
            return $this->setError($message);

        }
        return true;
    }

    /**
     * @return string
     */
    public function getYuntaiUrl(): string
    {
        return $this->yuntaiUrl;
    }

    private function checkAppId(): bool
    {
        if (!$this->appid) {
            return $this->setError('当前未设置云台应用, 不进行上报');
        }
        return true;
    }
}