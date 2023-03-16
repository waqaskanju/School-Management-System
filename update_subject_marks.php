<?php
/**
 * Add Subject Marks script file consumed by ajax
 * called from add_subject_marks.php file.
 *  * php version 8.1
 *
 * @category Exam
 *
 * @package None
 *
 * @author Waqas <waqaskanju@gmail.com>
 *
 * @license http://www.waqaskanju.com/license MIT
 *
 * @link http://www.waqaskanju.com
 **/
require_once 'db_connection.php';
require_once 'sand_box.php';
$link=connect();
// not allow to use this file when mode=read in config file.
$mode=$MODE;
/* Roll No */
$roll_no=$_GET['roll_no'];
/* Subject  Name Marks Column */
$subject = $_GET['subject_name'];
/* Actual Subject  Name */
$actual_subject = $_GET['actual_subject'];
/* Subject Marks */
$marks=$_GET['marks'];
/* Class Name */
$class=$_GET['class_name'];
$update_Status=Check_Subject_Update_Lock_status($class, $actual_subject);
if($marks>100) {
    echo "Max Marks error";
    exit;
}
$q="UPDATE marks SET $subject = $marks WHERE Roll_No=$roll_no";
if ($mode=="write") {
    if ($update_Status==0) {
        $exe=mysqli_query($link, $q) or die('error'.mysqli_error($link));
        if ($exe) {
            echo 'Marks Saved';
        } else {
            echo 'Error Not Saved.';
        }
    } else {
        echo "Markes are finalized. Changes Not allowed.";
    }

} else {
    echo "Not Allowed. Read Mode Only";
}

?>
