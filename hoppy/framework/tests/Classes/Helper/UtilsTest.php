<?php

declare(strict_types = 1);

namespace Hoppy\Framework\Tests\Classes\Helper;

use Hoppy\Framework\Classes\Utils;
use PHPUnit\Framework\TestCase;

class UtilsTest extends TestCase
{


    public function testIsIp(): void
    {
        $this->assertTrue(Utils::isIp('192.168.1.11'));
    }

    public function testIsLocalIp(): void
    {
        $this->assertTrue(Utils::isLocalIp('192.168.1.11'));
    }
}
