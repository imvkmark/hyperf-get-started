<?php

declare(strict_types = 1);

namespace Hoppy\Framework\Classes\Traits;

use Hoppy\Framework\Classes\MicroService\ConnClient;
use Hoppy\Framework\Classes\Resp;
use Hyperf\Utils\ApplicationContext;

/**
 * framework trait
 */
trait FrameworkTrait
{
    public function resp(): Resp
    {
        return ApplicationContext::getContainer()->get(Resp::class);
    }


    public function microAppClient()
    {
        return ApplicationContext::getContainer()->get(ConnClient::class);
    }
}