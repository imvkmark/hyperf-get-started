<?php

declare(strict_types = 1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace HyperfTest\Cases;

use HyperfTest\RedisTestCase;

/**
 * @internal
 * @coversNothing
 */
class RdsStrTest extends RedisTestCase
{
    public function testSet()
    {
        $this->rds->set('hy:str-set', 'a');
        $a = $this->rds->get('hy:str-set');
        $this->assertEquals('a', $a);
    }
}
