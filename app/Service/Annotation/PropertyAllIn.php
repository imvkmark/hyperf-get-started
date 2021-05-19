<?php

declare(strict_types = 1);

namespace App\Service\Annotation;

use App\Annotation\AnProperty;

/**
 *
 */
class PropertyAllIn
{
    /**
     * @var string
     * @AnProperty(name="allin")
     */
    protected string $actionName;
}