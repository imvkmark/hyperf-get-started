<?php

namespace App\Annotation;

use Hyperf\Di\Annotation\AbstractAnnotation;

/**
 * @Annotation
 * @Target({"CLASS"})
 */
class AnClass extends AbstractAnnotation
{
    public string $name = '';
}