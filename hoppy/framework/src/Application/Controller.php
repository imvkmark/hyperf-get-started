<?php

declare(strict_types = 1);

namespace Hoppy\Framework\Application;


use Hoppy\Framework\Classes\Traits\HttpTrait;
use Hoppy\Framework\Classes\Traits\HyperfTrait;

/**
 * hoppy controller
 */
abstract class Controller
{
    use HyperfTrait, HttpTrait;
}