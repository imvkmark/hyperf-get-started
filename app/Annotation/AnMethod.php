<?php

namespace App\Annotation;

use Hyperf\Di\Annotation\AbstractAnnotation;

/**
 * @Annotation
 * @Target({"METHOD"})
 */
class AnMethod extends AbstractAnnotation
{
    public string $method = '';
}