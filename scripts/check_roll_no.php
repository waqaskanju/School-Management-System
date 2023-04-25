<?php
/**
 * Check If Roll No Already Exists.
 * php version 8.1
 *
 * @category Exam
 * @package  Adf
 *
 * @author Waqas Ahmad <waqaskanju@gmail.com>
 *
 * @license http://www.abc.com MIT
 *
 * @link None
 **/
session_start();
require_once '../sand_box.php';
$link=$LINK;


if (isset($_GET['roll_no'])) {
    $roll_no=$_GET['roll_no'];
    $roll_no=Validate_Input_html($roll_no);

    if ($_GET['table']=='student') {
        $q="SELECT * from students_info WHERE Roll_No=:roll_no";
        $stmt=$link->prepare($q);
        $stmt->bindParam(":roll_no", $roll);
        $roll=$roll_no;
        $stmt->execute();

        $total_rows=$stmt->rowCount($qr);
        if ($total_rows>0) {
            echo "Data already exists.";
        }
    }


    if ($_GET['table']=='marks') {
        if ($roll_no=="") {
            echo 'Type Roll No.';
            $roll_no=1;
        }
        $q2="SELECT * from marks WHERE Roll_No=:roll_no";
        $stmt2=$link->prepare($q2);
        $stmt2->bindParam(":roll_no", $roll);
        $roll=$roll_no;
        $stmt2->execute();
        $marks_total_rows=$stmt2->rowCount();
        if ($marks_total_rows>0) {
            echo "Marks Data already exists.Try Editing.";
        } else {
            echo "Looks good";
        }
    }
}
if (isset($_GET['admission_no'])) {
        $admission_no=$_GET['admission_no'];
        $admission_no=Validate_Input_html($admission_no);
    $q="SELECT admission_no from students_info WHERE admission_no=:admission_no";
    $stmt=$link->prepare($q);
    $stmt->bindParam(":admission_no", $adm);
    $adm=$admission_no;
    $stmt->execute();
    $total_rows=$stmt->rowCount();
    if ($total_rows>0) {
        echo "Duplicate Admission No";
    } else {
        echo "Looks Good";
    }
}
?>
