<?php

declare(strict_types = 1);

namespace Hoppy\Framework\Classes\Conn;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Utils;
use Hyperf\Guzzle\ClientFactory;
use JsonException;

class ConnClient
{

    private const ERR_JSON = 901;

    /**
     * 应用 ID
     * @var int |string
     */
    private $appid;

    /**
     * 密钥
     * @var string
     */
    private string $secret = '';


    /**
     * @var GuzzleClient
     */
    private GuzzleClient $guzzle;

    public function __construct(ClientFactory $client)
    {
        $this->guzzle = $client->create();
    }

    /**
     * 发送应用 GET 请求
     * @param string $url
     * @param array  $query
     * @return array|mixed
     */
    public function get(string $url, array $query = [])
    {
        $query = ConnSign::sign($query, $this->appid, $this->secret);
        try {
            $resp    = $this->guzzle->get($url, [
                'query' => $query,
            ]);
            $content = $resp->getBody()->getContents();
            return json_decode($content, true, 512, JSON_THROW_ON_ERROR);
        } catch (GuzzleException $e) {
            return [
                'status'  => $e->getCode(),
                'message' => $e->getMessage(),
            ];
        } catch (JsonException $e) {
            return [
                'status'  => self::ERR_JSON,
                'message' => $e->getMessage(),
            ];
        }
    }

    public function file(string $url, $params, $filepath)
    {
        $form_params = ConnSign::sign($params, $this->appid, $this->secret);
        $multipart   = [];
        foreach ($form_params as $key => $param) {
            $multipart[] = [
                'name'     => $key,
                'contents' => $param,
            ];
        }

        $multipart[] = [
            'name'     => 'file',
            'contents' => Utils::tryFopen($filepath, 'r'),
            'filename' => basename($filepath),
        ];

        try {
            $resp    = $this->guzzle->post($url, [
                'multipart' => $multipart,
            ]);
            $content = $resp->getBody()->getContents();
            return json_decode($content, true, 512, JSON_THROW_ON_ERROR);
        } catch (GuzzleException $e) {
            return [
                'status'  => $e->getCode(),
                'message' => $e->getMessage(),
            ];
        } catch (JsonException $e) {
            return [
                'status'  => self::ERR_JSON,
                'message' => $e->getMessage(),
            ];
        }
    }

    /**
     * 发送应用 POST 请求
     * @param string $url
     * @param array  $form_params
     * @return array|mixed
     */
    public function post(string $url, array $form_params = [])
    {
        $form_params = ConnSign::sign($form_params, $this->appid, $this->secret);

        try {
            $resp    = $this->guzzle->post($url, [
                'form_params' => $form_params,
            ]);
            $content = $resp->getBody()->getContents();
            return json_decode($content, true, 512, JSON_THROW_ON_ERROR);
        } catch (GuzzleException $e) {
            return [
                'status'  => $e->getCode(),
                'message' => $e->getMessage(),
            ];
        } catch (JsonException $e) {
            return [
                'status'  => self::ERR_JSON,
                'message' => $e->getMessage(),
            ];
        }
    }

    /**
     * @param int|string $appid
     * @return ConnClient
     */
    public function setAppid($appid): ConnClient
    {
        $this->appid = $appid;
        return $this;
    }

    /**
     * @param string $secret
     * @return ConnClient
     */
    public function setSecret(string $secret): ConnClient
    {
        $this->secret = $secret;
        return $this;
    }
}