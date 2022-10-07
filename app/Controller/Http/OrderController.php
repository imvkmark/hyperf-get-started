<?php

declare(strict_types=1);

namespace App\Controller\Http;

use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;
use Hyperf\HttpServer\Contract\RequestInterface;

/**
 * @Controller()
 */
class OrderController extends AbstractController
{
    /**
     * @RequestMapping(path="home",methods="get")
     */
    public function index(RequestInterface $request)
    {
        $id = $request->input('id');
        return 'home-' . $id;
    }
}
