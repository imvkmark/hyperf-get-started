<?php

declare(strict_types = 1);

namespace App\Controller\Http;

use Hoppy\Framework\Classes\Resp;
use Hoppy\Framework\Classes\Traits\HyperfTrait;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpMessage\Exception\HttpException;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Contract\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @AutoController(prefix="framework")
 */
class FrameworkController extends AbstractController
{
    use HyperfTrait;

    /**
     * @Inject
     */
    private Resp $resp;

    public function success(): ResponseInterface
    {
        return $this->resp->success();
    }

    public function error(): ResponseInterface
    {
        return $this->resp->error();
    }

    public function web(): ResponseInterface
    {
        return $this->resp->web(Resp::PARAM_ERROR);
    }

    public function httpException(RequestInterface $request): void
    {
        $status = $request->input('status', 500);
        throw new HttpException($status);
    }

    public function validateException(RequestInterface $request): void
    {
        $validator = $this->validator()->make(
            $request->all(),
            [
                'foo' => 'required',
                'bar' => 'required',
            ],
            [
                'foo.required' => 'foo is required',
                'bar.required' => 'bar is required',
            ]
        );
        $validator->validate();
    }
}
