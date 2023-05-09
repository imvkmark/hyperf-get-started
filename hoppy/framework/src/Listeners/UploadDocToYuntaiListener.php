<?php

declare(strict_types = 1);

namespace Hoppy\Framework\Listeners;

use Hoppy\Framework\Action\Yuntai;
use Hoppy\Framework\Classes\Traits\HyperfTrait;
use Hoppy\Framework\Events\ApidocGeneratedEvent;
use Hyperf\Event\Contract\ListenerInterface;

class UploadDocToYuntaiListener implements ListenerInterface
{

    use HyperfTrait;

    public function listen(): array
    {
        return [
            ApidocGeneratedEvent::class,
        ];
    }

    public function process(object $event): void
    {
        $Sso = new Yuntai();
        if ($event->type === 'web' && !$Sso->apidocCapture($event->type)) {
            $this->logger()->info('py-system.apidoc' . $Sso->getError());
        }
    }
}