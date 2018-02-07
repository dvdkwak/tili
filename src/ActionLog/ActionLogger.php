<?php

namespace Tilit\ActionLog;

use Tilit\Database\Connection;

class ActionLogger extends Connection
{
    /**
     * Saves the log to the database 
     *
     * @param object ActionLog
     */
    public function saveLog(ActionLog $log)
    {
        print_r(new \PDO('mysql:host=127.0.0.1;dbname=tilit', 'root', 'usbw'));

        $stmt = $this->pdo->prepare("INSERT INTO tbl_log (type, author, message) VALUES (:type, :author, :message)");

        $stmt->bindParam(':type', $log->type);
        $stmt->bindParam(':author', $log->author);
        $stmt->bindParam(':message', $log->message);

        $stmt->execute();
    }
}