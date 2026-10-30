<?php

namespace OGame\ViewModels;

use OGame\GameObjects\Models\Abstracts\GameObject;

abstract class QueueViewModel
{
    public GameObject $object;
    public int $current_level;
    public bool $requirements_met;
    /** @var array<int, array{title: string, current: int, required: int}> */
    public array $missing_requirements = [];
    public int $count;
    public bool $enough_resources;
    public bool $currently_building;
    public int $bonus_level = 0;
}
