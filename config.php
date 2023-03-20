<?php

/**
 * Configuration of Website.
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
require_once 'db_connection.php';
require_once 'sand_box.php';
$link=connect();

$current_user='';
$designation='';
if (isset($_SESSION['user'])) {
    $user=Select_Single_Column_Array_data(
        "Name", "employees", "Id", $_SESSION['user']
    );
    $current_user= $user[0];
    $current_designation=Select_Single_Column_Array_data(
        "Designation", "employees", "Id", $_SESSION['user']
    );
    $designation = $current_designation[0];

}
// echo "Designation=".$designation;
$user=Select_Single_Column_Array_data(
    "User_Name", "Setting", "User_Id", "1"
);

    $previous_school=Select_Single_Column_Array_data(
        "Selected_School", "Setting", "User_Id", "1"
    );
    $previous_class=Select_Single_Column_Array_data(
        "Selected_Class", "Setting", "User_Id", "1"
    );
    $SCHOOL_NAME = $previous_school[0];
    $SCHOOL_FULL_NAME_ABV = "GHSS Chitor Swat";
    $SCHOOL_FULL_NAME = "Government Higher Secondary School";
    $SCHOOL_LOCATION = "CHITOR SWAT";
    $CLASS_INSERT = $previous_class[0];
    $SCHOOL_INSERT = $SCHOOL_NAME;
    $CLASS_SHOW="10th B";
    $SCHOOL_SHOW=$SCHOOL_NAME;

    $mode=Select_Single_Column_Array_data(
        "Allow_Edit", "Setting", "User_Id", "1"
    );
    $MODE=$mode[0];

    // For Waqas Mode is always write. for other users it is read.
    if (isset($_COOKIE['User_Name'])) {
        $user_name=$_COOKIE['User_Name'];
        if ($user_name=="Waqas Ahmad") {
            $MODE="write";
        }
    }
    $award_list_msg ="Attendance Sheet  Final Exam Mar 2023";
    $class_result_header="Final Examination Mar 2023";
    $class_wise_report_header="Class wise report of Final Exam GHSS CHITOR";
    $header_for_roll_no_slip="Roll no slip annual examination
    2022-23
    under the auspices of Distt: exam committee Swat.";
    $sub_header_for_roll_no_slip=" Final Examinination";
    ?>
