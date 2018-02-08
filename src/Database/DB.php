<?php

namespace Tilit\Database;

/**
 * This class can be used to perform CRUD operations.
 * 
 * @author Gerrit Mulder <info@gerritmulder.com>
 */
class DB
{
    public static function connect()
    {
        try {
            $pdo = new \PDO('mysql:host=localhost;dbname=tilit', 'root', 'usbw');
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch(\PDOException $e) {
            $e->getMessage();
        }
    }

    public static function select($table)
    {
        $stmt = DB::connect()->prepare("SELECT * FROM " . $table);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}