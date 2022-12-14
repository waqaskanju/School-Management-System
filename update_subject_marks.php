<?php
/**
 * Add Subject Marks
 *  * php version 8.1
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
require_once 'db_connection.php';
require_once 'sand_box.php';
$link=connect();
$mode=$MODE;
/* Roll No */
$roll_no=$_GET['roll_no'];
/* Subject  Name */
 $subject = $_GET['subject_name'];
/* Subject Marks */
$marks=$_GET['marks'];

 $q="UPDATE marks SET $subject = $marks WHERE Roll_No=$roll_no";
 if ($mode=="write") {
 $exe=mysqli_query($link, $q) or die('error'.mysqli_error($link));
    if ($exe) {
          echo 'Saved';
    } else {
        echo 'Error';
    }
 }
 else {
    echo "Not Allowed";
 }

?>
