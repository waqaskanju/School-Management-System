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

$USER = "Waqas Ahmad";
global  $CLASS_INSERT;
global  $SCHOOL_INSERT;
global  $CLASS_SHOW;
global  $SCHOOL_SHOW;
global  $MODE;

if ($USER=="Waqas Ahmad") {
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
    $MODE="write";
}

$award_list_msg ="Attendance Sheet  Final Exam Mar 2023";
$class_result_header="Final Examination Mar 2023";
$class_wise_report_header="Class wise report of Final Exam GHSS CHITOR";
$header_for_roll_no_slip="Roll no slip annual examination
    2022-23
    under the auspices of Distt: exam committee Swat.";
$sub_header_for_roll_no_slip=" Final Examinination";
?>
