<?php

namespace Tilit\ActionLog;

/**
 * Represents the log and allows screening properties
 *
 * @author Gerrit Mulder <info@gerritmulder.com>
 */
class ActionLog
{
    /**
     * @var Logtype
     */
    public $type;

    /**
     * @var Logauthor
     */
    public $author;

    /**
     * @var Logmessage
     */
    public $message;

    /**
     * Sets the log properties
     *
     * @param $type
     * @param $author
     * @param $message
     */
    public function __construct($type, $author, $message)
    {
        $this->type = $type;
        $this->author = $author;
        $this->message = $message;
    }
}