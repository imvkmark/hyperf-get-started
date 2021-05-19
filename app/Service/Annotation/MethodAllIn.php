<?php

declare(strict_types = 1);

namespace App\Service\Annotation;

use App\Annotation\AnMethodByParams;

class MethodAllIn
{

    /**
     * @AnMethodByParams(method="allin",params={"id"})
     */
    public function allin(): string
    {
        return 'all-in';
    }
}