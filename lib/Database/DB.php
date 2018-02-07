<?php

namespace Tilit\Database;

/**
 * This class can be used to perform CRUD operations.
 * 
 * @author Gerrit Mulder
 */
class DB
{
    /**
     * @var \PDO
     */
    public static $pdo;

    /**
     * Sets a new connection to the pdo property
     */
    public function __construct()
    {
        self::$pdo = new Connection;
    }
}