<?php

declare(strict_types = 1);

namespace App\Service\AnClass;

use App\Annotation\AnClass;

/**
 * @AnClass(name="q")
 */
class ClassQ
{
    private string $sex = 'girl';

    private $name = '';
}