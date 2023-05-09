<?php

declare(strict_types = 1);

namespace Hoppy\Framework\Command;

use Hyperf\Command\Annotation\Command;
use Hyperf\Command\Command as HyperfCommand;
use Symfony\Component\Process\Process;

/**
 * 使用命令行生成 api 文档
 * @Command
 */
class DocCommand extends HyperfCommand
{

    protected $signature = 'poppy:doc
		{type : Document type to run. [api]}
	';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $type = $this->input->getArgument('type');
        switch ($type) {
            case 'api':
                if (!command_exists('apidoc')) {
                    $this->error("apidoc 命令不存在\n");
                }
                else {
                    $catalog = config('poppy.framework-apidoc');
                    if (!$catalog) {
                        $this->error('尚未配置 apidoc 生成目录');

                        return;
                    }
                    // 多少个任务
                    $bar = $this->output->createProgressBar(count($catalog));

                    foreach ($catalog as $key => $dir) {
                        $this->performTask($key);
                        // 一个任务处理完了，可以前进一点点了
                        $bar->advance();
                    }
                    $bar->finish();
                }
                break;
            case 'log':
                $this->info(
                    'Please Run Command:' . "\n" .
                    'tail -20f storage/logs/laravel-`date +%F`.log'
                );
                break;
            default:
                $this->comment('Type is now allowed.');
                break;
        }
    }

    /**
     * @param string $key 需要处理的 key
     */
    private function performTask(string $key): void
    {
        $path = BASE_PATH;
        $aim  = BASE_PATH . '/storage/docs/' . $key;

        if (!file_exists($path)) {
            $this->error('Err > 目录 `' . $path . '` 不存在');
            return;
        }

        $def = config('poppy.framework-apidoc.' . $key);
        if ($def['match'] ?? '') {
            $match = $def['match'];
        }
        else {
            $matches = [
                'web' => '.*',
            ];
            $type    = $def['type'] ?? 'web';
            $match   = $matches[$type] ?? $matches['web'];
        }

        $arrMatches = explode('|', $match);
        $f          = array_map(function ($mt) {
            return ' -f "app/Controller/.*/' . $mt . '\.php$"';
        }, $arrMatches);
        $f          = implode(' ', $f);

        $lower = strtolower($key);
        $shell = 'apidoc -i ' . $path . '  -o ' . $aim . ' ' . $f;
        $this->info($shell);
        $process = Process::fromShellCommandline($shell);
        $process->start();
        $process->wait(function ($type, $buffer) use ($lower) {
            if (Process::ERR === $type) {
                $this->error('ERR > ' . $buffer . " [$lower]\n");
            }
        });


        $this->info($process->getOutput());
    }
}