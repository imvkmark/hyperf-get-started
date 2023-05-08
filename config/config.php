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

use Hyperf\Contract\StdoutLoggerInterface;
use Psr\Log\LogLevel;

return [
    'app_name'                   => env('APP_NAME', 'skeleton'),
    'app_env'                    => env('APP_ENV', 'dev'),

    // https://hyperf.wiki/2.2/#/zh-cn/quick-start/questions?id=%e4%bb%a3%e7%a0%81%e4%b8%8d%e7%94%9f%e6%95%88
    'scan_cacheable'             => env('SCAN_CACHEABLE', false),
    StdoutLoggerInterface::class => [
        'log_level' => [
            LogLevel::ALERT,
            LogLevel::CRITICAL,
            LogLevel::DEBUG,
            LogLevel::EMERGENCY,
            LogLevel::ERROR,
            LogLevel::INFO,
            LogLevel::NOTICE,
            LogLevel::WARNING,
        ],
    ],
];
