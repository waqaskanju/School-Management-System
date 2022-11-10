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

/**
 * @return      database connection.
 * @description connection to database
 * **/
function connect()
{
    $link=mysqli_connect('localhost', 'root', '', 'chitor_db');
    if($link) {
    }
    else{

        echo 'error in connection';
    }

    return $link;
}

?>
