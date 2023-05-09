<?php

declare(strict_types = 1);

namespace Hoppy\Framework\Classes\Traits;

use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Hyperf\Utils\ApplicationContext;

/**
 * http trait
 */
trait HttpTrait
{

    public function request(): RequestInterface
    {
        return ApplicationContext::getContainer()->get(RequestInterface::class);
    }

    public function response(): ResponseInterface
    {
        return ApplicationContext::getContainer()->get(ResponseInterface::class);
    }
}