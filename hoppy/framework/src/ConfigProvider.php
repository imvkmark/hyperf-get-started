<?php

declare(strict_types = 1);

namespace Hoppy\Framework;

use Hoppy\Framework\Command\DocCommand;

class ConfigProvider
{
    public function __invoke(): array
    {
        $files   = [
            'en/framework.php',
            'zh_CN/framework.php',
        ];
        $publish = [];
        foreach ($files as $file) {
            $publish[] = [
                'id'          => 'language-' . $file,
                'description' => 'framework lang file ' . $file,
                'source'      => __DIR__ . '/../resources/lang/' . $file,
                'destination' => BASE_PATH . '/storage/languages/' . $file,
            ];
        }
        return [
            'dependencies' => [
            ],
            'commands'     => [
                DocCommand::class,
            ],
            'annotations'  => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
            'publish'      => array_merge($publish, []),
        ];
    }
}
