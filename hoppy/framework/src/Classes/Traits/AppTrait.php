<?php

declare(strict_types = 1);

namespace Hoppy\Framework\Classes\Traits;

use Illuminate\Support\MessageBag;
use Poppy\Framework\Classes\Resp;

/**
 * AppTrait
 */
trait AppTrait
{
    /**
     * error
     */
    protected string $error;

    /**
     * success
     */
    protected string $success;

    /**
     * 获取错误
     */
    public function getError(): string
    {
        return $this->error;
    }

    /**
     * 设置错误
     * @param string $error error
     * @return bool
     */
    public function setError(string $error): bool
    {
        $this->error = $error;
        return false;
    }

    /**
     * Get success messages;
     */
    public function getSuccess(): string
    {
        return $this->success;
    }

    /**
     * @param string $success 设置的成功信息
     * @return bool
     */
    public function setSuccess(string $success): bool
    {
        $this->success = $success;
        return true;
    }
}