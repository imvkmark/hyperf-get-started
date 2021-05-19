<?php

namespace App\Annotation;

use Hyperf\Di\Annotation\AbstractAnnotation;

/**
 * @Annotation
 * @Target({"METHOD"})
 */
class AnMethodByParams extends AbstractAnnotation
{
    public string $method = '';

    public array $params = [];


    public function collectMethod(string $className, ?string $target): void
    {
        parent::collectMethod($className, $target);
    }
}