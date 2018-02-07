<?php

namespace Tilit\Database;

/**
 * Creates a PDO connection.
 * Extends this class to use the pdo property
 * of this object.
 *
 * @author Gerrit Mulder <info@gerritmulder.com>
 */
class Connection
{
    /**
     * @var PDO object
     */
    protected $pdo;

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