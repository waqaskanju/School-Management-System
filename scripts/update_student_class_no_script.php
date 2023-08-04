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
session_start();
require_once '../sand_box.php';
$link=$LINK;

/* Roll No */
$roll_no=$_GET['roll_no'];
$roll_no=Validate_input($roll_no);
/* Subject  Name Marks Column */
$student_class_no=$_GET['student_class_no'];
$student_class_no=Validate_input($student_class_no);

 $q="UPDATE students_info SET Class_No=$student_class_no WHERE Roll_No=$roll_no";

if ($STUDENT_CHANGES==1) {
$exe=mysqli_query($link, $q) or die('error'.mysqli_error($link));
if ($exe) {
        echo "<span class='alert alert-success' role='alert'> Class No Updated.
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
