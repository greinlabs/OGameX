<?php

namespace OGame\ViewModels\Queue\Abstracts;

class QueueListViewModel
{
    /**
     * Constructor.
     *
     * @param array<QueueViewModel> $queue
     * @param int $maxItemsInQueue
     */
    public function __construct(
        /**
         * List of queue items.
         */
        public array $queue,
        private int $maxItemsInQueue = 5
    ) {
    }

    /**
     * Get amount of items in the queue.
     *
     * @return int
     */
    public function count(): int
    {
        return count($this->queue);
    }

    /**
     * Check whether the queue has reached its current capacity.
     *
     * @return bool
     */
    public function isQueueFull(): bool
    {
        return count($this->queue) >= $this->maxItemsInQueue;
    }
}
