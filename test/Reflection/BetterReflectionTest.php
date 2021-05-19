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
namespace HyperfTest\Reflection;

use App\Service\AnClass\ClassQ;
use Hyperf\Di\BetterReflectionManager;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 * @coversNothing
 */
class BetterReflectionTest extends TestCase
{
    public function testManager()
    {
        $ref = BetterReflectionManager::reflectClass(ClassQ::class);
        $const = $ref->getImmediateProperties();
        foreach ($const as $con) {
            // var_dump($con->getType());
        }
    }
}
