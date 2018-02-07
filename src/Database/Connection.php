<?php

namespace Tilit\Database;

/**
 * Creates a PDO connection.
 *
 * @author Gerrit Mulder <info@gerritmulder.com>
 */
class Connection
{
    /**
     * Set the PDO connection and object
     */
    public function __construct()
    {
        try {
            $this->pdo = new \PDO('mysql:host=localhost;dbname=tilit', 'root', 'usbw');
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(\PDOException $e) {
            $e->getMessage();
        }
    }
}