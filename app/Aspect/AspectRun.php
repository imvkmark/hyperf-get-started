<?php

namespace App\Aspect;

use App\Annotation\AnAspect;
use Hyperf\Di\Annotation\Aspect;
use Hyperf\Di\Aop\AbstractAspect;
use Hyperf\Di\Aop\ProceedingJoinPoint;

/**
 * @Aspect()
 */
class AspectRun extends AbstractAspect
{

    public $annotations = [
        AnAspect::class,
    ];


    public function process(ProceedingJoinPoint $proceedingJoinPoint)
    {
        $res = $proceedingJoinPoint->process();
        $ref = $proceedingJoinPoint->getReflectMethod();
        $meta = $proceedingJoinPoint->getAnnotationMetadata();
        var_dump($meta);
        return $res . $ref->getName() . '@' . Aspect::class;
    }
}