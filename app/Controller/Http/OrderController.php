<?php

declare(strict_types=1);

namespace App\Controller\Http;

use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;

/**
 * @Controller(prefix="order")
 */
class OrderController extends AbstractController
{
    /**
     * @RequestMapping(path="home",methods="get")
     */
    public function index()
    {
        return 'home-' . $this->request->input('id');
    }
}
