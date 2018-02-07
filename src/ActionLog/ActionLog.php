<?php

namespace Tilit\ActionLog;

class ActionLog implements ActionLogInterface
{
    public $type;

    public $actor;

    public $message;

    public function __construct($type, $actor, $message)
    {
        $this->type = $type;
        $this->actor = $actor;
        $this->message = $message;
    }
}