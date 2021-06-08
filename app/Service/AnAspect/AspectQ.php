<?php

declare(strict_types = 1);

namespace App\Service\AnAspect;

use App\Annotation\AnAspect;

/**
 * @AnAspect()
 */
class AspectQ
{
    public function do(): string
    {
        return __CLASS__ . '-' . __FUNCTION__;
    }

    public function go(): string
    {
        return __CLASS__ . '-' . __FUNCTION__;
    }
}