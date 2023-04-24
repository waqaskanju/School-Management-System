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
    $link=mysqli_connect($db_host, $db_user_name, $db_password, $db_name);
    if ($link) {
    } else {
                echo 'error in connection';
    }

    return $link;
}

$LINK=connect($db_host, $db_user_name, $db_password, $db_name);
?>
