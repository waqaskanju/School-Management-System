<?php

/**
 * Data base connection
 * php version 8.1
 *
 * @category Adfsad
 *
 * @package Adf
 *
 * @author Khan <abc@examp.com>
 *
 * @license http://www.abc.com MIT
 *
 * @link Adfas
 **/
require_once 'credentials.php';

/**
 * Use to connect with database.
 * 
 * @param string $db_host     name of a class
 * @param string $db_username name of a school
 * @param string $db_password name of a school
 * @param string $db_name     name of a school
 * 
 * @return int database connection.
 **/
function connect($db_host,$db_user_name,$db_password,$db_name)
{
    //$link=mysqli_connect($db_host, $db_user_name, $db_password, $db_name);
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user_name, $db_password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($pdo) {
    } else {
                echo 'error in connection';
    }

    return $pdo;
}

$LINK=connect($db_host, $db_user_name, $db_password, $db_name);
?>
