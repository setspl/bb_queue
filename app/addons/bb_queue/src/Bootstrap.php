<?php

namespace Tygh\Addons\Queue;

use Tygh\Core\ApplicationInterface;
use Tygh\Core\BootstrapInterface;
use Tygh\Core\HookHandlerProviderInterface;
use Tygh\Registry;

require_once Registry::get('config.dir.addons') . '/bb_queue/func.php';

/**
 * Class Bootstrap
 * @package Tygh\Addons\Queue
 */
class Bootstrap implements BootstrapInterface, HookHandlerProviderInterface
{
    /**
     * @inheritDoc
     */
    public function boot(ApplicationInterface $app)
    {
        $app->register(new ServiceProvider());
    }

    public function getHookHandlerMap(): array
    {
        return [
            /**
             * Custom save log hook handler in case you want to suppress root signing logs.
             */
            'save_log' => [
                'addons.bb_queue.save_log_hook_handler',
                'onSaveLog',
            ],

            /**
             * Core job exception handler entry.
             */
            'queue_job_exception_occurred' => [
                'addons.bb_queue.queue_jobs_hook_handler',
                'onJobException'
            ],
        ];
    }
}
