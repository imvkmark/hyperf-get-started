<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace App\Controller\Http;

use App\Annotation\AnClass;
use App\Annotation\AnMethod;
use App\Annotation\AnProperty;
use App\Service\AnAspect\AspectQ;
use App\Service\AnClass\ClassQ;
use App\Service\Annotation\MethodAllIn;
use Hyperf\Di\Annotation\AnnotationCollector;
use Roave\BetterReflection\BetterReflection;

class FeatController extends AbstractController
{
    public function index()
    {
        $user   = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        $classes = AnnotationCollector::getClassesByAnnotation(AnClass::class);
        var_dump($classes);
        $property = AnnotationCollector::getPropertiesByAnnotation(AnProperty::class);
        var_dump($property);
        $property = AnnotationCollector::getMethodsByAnnotation(AnMethod::class);
        var_dump($property);
        $property = AnnotationCollector::getClassMethodAnnotation(MethodAllIn::class, 'allin');
        var_dump($property);

        $pro    = (new MethodAllIn());
        $result = $pro->allin();
        var_dump($result);

        return [
            'method'  => $method,
            'message' => "Hello {$user}.",
        ];
    }

    public function ref()
    {
        $ref   = (new BetterReflection())->classReflector()->reflect(ClassQ::class);
        $const = $ref->getImmediateProperties();
        foreach ($const as $con) {
            if ($con->getType()) {
                var_dump($con->getName());
            }
        }
    }

    /**
     * 切面的示例
     * @return string
     */
    public function aspect()
    {
        $content = (new AspectQ())->do() . PHP_EOL;
        $content .= (new AspectQ())->go();
        return $content;
    }
}
