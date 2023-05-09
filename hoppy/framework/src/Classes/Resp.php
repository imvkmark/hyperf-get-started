<?php

declare(strict_types = 1);

namespace Hoppy\Framework\Classes;

use Hyperf\Constants\AbstractConstants;
use Hyperf\Constants\Annotation\Constants;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\ResponseInterface;

/**
 * @Constants
 */
class Resp extends AbstractConstants
{

    /**
     * @Message("framework.resp__success")
     */
    public const SUCCESS = 0;


    /**
     * @Message("framework.resp__error")
     */
    public const ERROR = 1;

    /**
     * @Message("framework.resp__param-error")
     */
    public const PARAM_ERROR = 5;

    /**
     * @Message("framework.resp__sign-error")
     */
    public const SIGN_ERROR = 6;

    /**
     * @Message("framework.resp__inner-error")
     */
    public const INNER_ERROR = 99;

    /**
     * @Message("framework.resp__http_gateway_error")
     */
    public const HTTP_GATEWAY_ERROR = 500;

    /**
     * @Inject
     * @var ResponseInterface
     */
    private ResponseInterface $response;    // 其他错误

    public function success(string $message = '', array $data = [], bool $preserve = false): \Psr\Http\Message\ResponseInterface
    {
        if (!$message) {
            $message = self::getMessage(self::SUCCESS);
        }
        $resp = [
            'status'  => self::SUCCESS,
            'message' => $message,
        ];
        if ((!$data && $preserve) || $data) {
            $resp['data'] = $data;
        }
        return $this->response->json($resp);
    }

    public function error(string $message = '', array $data = []): \Psr\Http\Message\ResponseInterface
    {
        if (!$message) {
            $message = self::getMessage(self::ERROR);
        }
        $resp = [
            'status'  => self::ERROR,
            'message' => $message,
        ];
        if ($data) {
            $resp['data'] = $data;
        }
        return $this->response->json($resp);
    }


    public function web(int $code = self::SUCCESS, string $message = '', array $data = []): \Psr\Http\Message\ResponseInterface
    {
        if (!$message) {
            $message = self::getMessage($code);
        }
        $resp = [
            'status'  => $code,
            'message' => $message,
        ];
        if ($data) {
            $resp['data'] = $data;
        }
        return $this->response->json($resp);
    }

}