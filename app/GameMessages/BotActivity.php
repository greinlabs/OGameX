<?php

namespace OGame\GameMessages;

use OGame\GameMessages\Abstracts\GameMessage;

class BotActivity extends GameMessage
{
    protected function initialize(): void
    {
        $this->key = 'bot_activity';
        $this->params = ['bot_name', 'coordinates', 'action'];
        $this->tab = 'economy';
        $this->subtab = 'economy';
    }
}
