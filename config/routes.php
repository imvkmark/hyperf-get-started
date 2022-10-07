<?php

declare(strict_types=1);

/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

use Hyperf\HttpServer\Router\Router;

Router::addRoute(['GET', 'POST', 'HEAD'], '/feat', 'App\Controller\Http\FeatController@index');
Router::addRoute(['GET', 'POST', 'HEAD'], '/feat/ref', 'App\Controller\Http\FeatController@ref');
Router::addRoute(['GET', 'POST', 'HEAD'], '/feat/aspect', 'App\Controller\Http\FeatController@aspect');

Router::get('/favicon.ico', function () {
    return '';
});
