<?php
/**
 * Created by PhpStorm.
 * User: Pieter
 * Date: 14-3-2018
 * Time: 09:21
 */

$session = $_POST['session'];
if ($session == "called"){
    unset($_SESSION['customError']);
}