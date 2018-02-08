<?php

namespace Tilit\ActionLog;

use Tilit\Database\DB;

/**
 * Main handler of logging actions into the database.
 * 
 * Usage:
 * $actionLogger = new ActionLogger;
 * $actionLogger->saveLog(new ActionLog($type, $author, $message));
 *
 * Default table is tbl_log
 *
 * @author Gerrit Mulder <info@gerritmulder.com>
 */
class ActionLogger
{
    /**
     * Saves the log to the database
     * 
     * @param object ActionLog
     */
    public function saveLog(ActionLog $log)
    {
        $stmt = DB::$pdo->prepare("INSERT INTO tbl_log (type, author, message) VALUES (:type, :author, :message)");

        $stmt->bindParam(':type', $log->type);
        $stmt->bindParam(':author', $log->author);
        $stmt->bindParam(':message', $log->message);

        $stmt->execute();
    }

    public function getLogs()
    {
        $logs = DB::select('tbl_log');
    }
}