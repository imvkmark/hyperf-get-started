<?php

namespace App\Aspect;

use App\Annotation\AnMethod;
use Hyperf\Di\Annotation\Aspect;
use Hyperf\Di\Aop\AbstractAspect;
use Hyperf\Di\Aop\ProceedingJoinPoint;

/**
 * @Aspect()
 */
class AppStart extends AbstractAspect
{

    public $annotations = [
        AnMethod::class,
    ];


    public function process(ProceedingJoinPoint $proceedingJoinPoint)
    {
        $res = $proceedingJoinPoint->process();

        $meta = $proceedingJoinPoint->getAnnotationMetadata()->method[AnMethod::class];
        var_dump($proceedingJoinPoint->arguments, 'aspect');
        return $res;
    }
}