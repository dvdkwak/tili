<?php

namespace Tilit\ActionLog;

class ActionLog
{
    public $type;

    public $author;

    public $message;

    public function __construct($type, $author, $message)
    {
        $this->type = $type;
        $this->author = $author;
        $this->message = $message;
    }
}