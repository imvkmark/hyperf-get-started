<?php

declare(strict_types = 1);

namespace Hoppy\Framework\Classes\Traits;

use Hyperf\Contract\StdoutLoggerInterface;
use Hyperf\Utils\ApplicationContext;
use Hyperf\Validation\Contract\ValidatorFactoryInterface;
use Psr\Container\ContainerInterface;

/**
 * poppy controller
 */
trait HyperfTrait
{
    public function container(): ContainerInterface
    {
        return ApplicationContext::getContainer();
    }


    public function logger(): StdoutLoggerInterface
    {
        return $this->container()->get(StdoutLoggerInterface::class);
    }

    public function validator(): ValidatorFactoryInterface
    {
        return $this->container()->get(ValidatorFactoryInterface::class);
    }
}