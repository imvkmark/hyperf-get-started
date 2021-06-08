<?php

declare(strict_types = 1);

namespace HyperfTest;

use Hyperf\Redis\Redis;
use Hyperf\Utils\ApplicationContext;
use PHPUnit\Framework\TestCase;

abstract class RedisTestCase extends TestCase
{
    protected $rds;
    public function __construct()
    {
        parent::__construct();
        $container = ApplicationContext::getContainer();
        $this->rds = $container->get(Redis::class);
    }
}
