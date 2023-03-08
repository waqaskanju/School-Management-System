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

$USER = "Waqas Ahmad";
global  $CLASS_INSERT;
global  $SCHOOL_INSERT;
global  $CLASS_SHOW;
global  $SCHOOL_SHOW;
global  $MODE;

if ($USER=="Waqas Ahmad") {
    $SCHOOL_NAME = "GHSS Chitor";
    $SCHOOL_FULL_NAME_ABV = "GHSS Chitor Swat";
    $SCHOOL_FULL_NAME = "Government Higher Secondary School";
    $SCHOOL_LOCATION = "CHITOR SWAT";
    $CLASS_INSERT = "10th B";
    $SCHOOL_INSERT = $SCHOOL_NAME;
    $CLASS_SHOW="10th B";
    $SCHOOL_SHOW=$SCHOOL_NAME;
    $MODE="write";
}

$award_list_msg ="Attendance Sheet  Final Exam Mar 2023";
$class_result_header="Final Examincation Mar 2023";
$class_wise_report_header="Class wise report of Final Exam GHSS CHITOR";
$header_for_roll_no_slip="Roll no slip annual examination
    2022-23
    under the auspices of Distt: exam committee Swat.";
$sub_header_for_roll_no_slip=" Final Examincation";
?>
