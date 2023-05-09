<?php

declare(strict_types = 1);

namespace Hoppy\Framework\Exceptions;

use Exception;

/**
 * BaseException
 */
abstract class BaseException extends Exception
{
    /**
     * Exception Context
     * @var array
     */
    protected array $context = [];


    public function setContext(array $context = []): self
    {
        $this->context = $context;
        return $this;
    }

    public function context(): array
    {
        return $this->context;
    }
}