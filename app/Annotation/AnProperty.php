<?php

namespace App\Annotation;

use Hyperf\Di\Annotation\AbstractAnnotation;

/**
 * @Annotation
 * @Target({"PROPERTY"})
 */
class AnProperty extends AbstractAnnotation
{
    public string $name = '';


}