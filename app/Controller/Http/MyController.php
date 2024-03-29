<?php

declare(strict_types = 1);

namespace App\Controller\Http;

use Hoppy\Framework\Classes\Resp;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * @AutoController(prefix="user")
 */
class MyController extends AbstractController
{
    /**
     * @Inject
     */
    private Resp $resp;

    public function index()
    {
        return $this->resp->success();
    }
}
