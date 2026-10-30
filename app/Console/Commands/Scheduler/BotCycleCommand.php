<?php

namespace OGame\Console\Commands\Scheduler;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use OGame\Services\BotService;

#[Description('Run the configured bot spawn and activity cycle')]
#[Signature('ogamex:scheduler:bot-cycle')]
class BotCycleCommand extends Command
{
    public function __construct(private BotService $botService)
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $result = $this->botService->runScheduledCycle();
        if ($result['errors'] !== []) {
            foreach ($result['errors'] as $error) {
                $this->error($error);
            }
            return Command::FAILURE;
        }

        $this->info(sprintf(
            'Bot cycle completed: %d spawned, %d attacks.',
            $result['spawned'],
            $result['attacks']
        ));
        return Command::SUCCESS;
    }
}
