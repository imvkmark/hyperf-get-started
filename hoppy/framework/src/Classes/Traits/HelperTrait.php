<?php

declare(strict_types = 1);

namespace Hoppy\Framework\Classes\Traits;

use Hoppy\Framework\Classes\Helper\Env;
use Hyperf\Utils\ApplicationContext;

trait HelperTrait
{

    public function helperEnv()
    {
        return ApplicationContext::getContainer()->get(Env::class);
    }
}