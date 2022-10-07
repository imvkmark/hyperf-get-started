<?php

declare(strict_types=1);

namespace App\Controller\Http;

use Hyperf\HttpServer\Annotation\AutoController;

/**
 * @AutoController(prefix="user")
 */
class MyController extends AbstractController
{
    public function index()
    {
        return 'user/index';
    }
}
