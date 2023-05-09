<?php

declare(strict_types = 1);

namespace Hoppy\Framework\Tests\Classes;

use Hoppy\Framework\Application\HyperfTrait;
use Hoppy\Framework\Classes\Resp;
use Hoppy\Framework\Tests\Cases\AbstractTestCase;


/**
 * todo
 * @internal
 * @coversNothing
 */
class RespTest extends AbstractTestCase
{

    use HyperfTrait;

    /**
     * @var Resp
     */
    private Resp $resp;

    protected function setUp(): void
    {
        parent::setUp();
        $this->resp = $this->container()->get(Resp::class);
    }


    public function testLanguage()
    {

    }
}
