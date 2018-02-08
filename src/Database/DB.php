<?php

namespace Tilit\Database;

/**
 * This class can be used to perform CRUD operations.
 * 
 * @author Gerrit Mulder <info@gerritmulder.com>
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
        try {
            self::$pdo = new \PDO('mysql:host=localhost;dbname=tilit', 'root', 'usbw');
            self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(\PDOException $e) {
            $e->getMessage();
        }
    }

    public static function select($table)
    {
        $stmt = DB::$pdo->prepare("SELECT * FROM :table");
        $stmt->bindParam(':table', $table);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}