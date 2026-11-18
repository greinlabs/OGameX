<?php

namespace OGame\Enums;

enum OfficerType: string
{
    case COMMANDER = 'commander';
    case ADMIRAL = 'admiral';
    case ENGINEER = 'engineer';
    case GEOLOGIST = 'geologist';
    case TECHNOCRAT = 'technocrat';
}
