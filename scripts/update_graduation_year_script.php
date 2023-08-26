<?php
/**
 * This script file consumed by ajax
 * called from js/update_class_name.js file.
 *  * php version 8.1
 *
 * @category Student
 *
 * @package None
 *
 * @author Waqas <waqaskanju@gmail.com>
 *
 * @license http://www.waqaskanju.com/license MIT
 *
 * @link http://www.waqaskanju.com
 **/
session_start();
require_once '../sand_box.php';
$link=$LINK;

/* Roll No */
$roll_no=$_GET['roll_no'];
$roll_no=Validate_input($roll_no);
/* Subject  Name Marks Column */
$graduation_year=$_GET['graduation_year'];
$graduation_year=Validate_input($graduation_year);

 $q="UPDATE students_info SET Graduation_Year=$graduation_year WHERE Roll_No=$roll_no";

if ($STUDENT_CHANGES==1) {
$exe=mysqli_query($link, $q) or die('error'.mysqli_error($link));
if ($exe) {
        echo "<span class='alert alert-success' role='alert'> Year Updated.
                </span>";
    } else {
        echo "<span class='alert alert-danger' role='alert'>
            Error in query
        </span>";
    }
} else {
    echo "
            <span class='alert alert-danger' role='alert'>
                No Permission For Changing in Student Module.
        </span>";
}
?>
