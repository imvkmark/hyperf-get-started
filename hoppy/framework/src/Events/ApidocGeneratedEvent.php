<?php

declare(strict_types = 1);

namespace Hoppy\Framework\Events;

class ApidocGeneratedEvent
{

    /**
     * 文档的类型
     * @var string
     */
    public string $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }
}
