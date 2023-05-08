<?php

declare(strict_types=1);

namespace App\Controller\AnotherHttp;

use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;
use Hyperf\HttpServer\Contract\RequestInterface;

/**
 * @Controller(prefix="order", server="anotherHttp")
 */
class OrderController
{
    /**
     * @RequestMapping(path="home",methods="get")
     */
    public function index(RequestInterface $request)
    {
        return 'another-order-home-' . $request->input('id');
    }
}
