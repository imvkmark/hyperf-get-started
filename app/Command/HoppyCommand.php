<?php

declare(strict_types = 1);

namespace App\Command;

use Hyperf\Command\Annotation\Command;
use Hyperf\Command\Command as HyperfCommand;
use Hyperf\Contract\ContainerInterface;
use Hyperf\Di\Annotation\Inject;
use Hyperf\Utils\Filesystem\Filesystem;

/**
 * @Command
 */
class HoppyCommand extends HyperfCommand
{

    protected $signature = 'app:hoppy {action : handle}';

    /**
     * @var ContainerInterface
     */
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        parent::__construct();
    }

    public function configure()
    {
        parent::configure();
        $this->setDescription('Hyperf Demo Command');
    }

    /**
     * @Inject)
     * @var Filesystem
     */
    private Filesystem $file;


    public function handle(): void
    {
        $action = $this->input->getArgument('action');

        if ($action === 'lang') {
            $files = [
                'en/framework.php',
                'zh_CN/framework.php',
            ];
            foreach ($files as $file) {
                $this->file->copy(
                    BASE_PATH . '/storage/languages/' . $file,
                    BASE_PATH . '/hoppy/framework/resources/lang/' . $file,
                );
            }

            $this->line('Copy Lang Success!', 'info');
        }

    }
}
