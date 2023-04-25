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
require_once 'sand_box.php';
require_once 'functions.php';
$link=$LINK;

// if user is logged in get his Id otherwise get Id of guest user.
if (isset($_SESSION['user'])) {
    $account_id=$_SESSION['user'];
    $account_id=Validate_Input_html($account_id);
} else {
    $guest=Select_Single_Column_Array_data(
        "Id", "employees", "Name", "'Guest'"
    );
     $account_id=$guest[0];
}

$data=Select_Column_data('*', "setting", 'User_Id', $account_id);
//Select school id from seetting page of current user.
 $selected_school_id=$data['Selected_School_Id'];

// Convert school_id to school_name
$school_names=Select_Single_Column_Array_data(
    "Name", "schools", "Id", "$selected_school_id"
);

// Select class id from seetting page. used at the time of student insertion.
$selected_class_id=$data['Selected_Class_Id'];

// Covert class_id to class_name
$class_names=Select_Single_Column_Array_data(
    "Name", "school_classes", "School_Id", "$selected_school_id"
);

$employee_data=Select_Column_data(
    'Name,Designation', "employees", 'Id', $account_id
);

//Select single username from Array.


//Permissions

//  Student Changes Permission.
$STUDENT_CHANGES=$data['Student_Changes'];

//  Batch Marks Changes Permission.
$BATCH_MARKS_CHANGES=$data['Batch_Marks_Changes'];

// Single Marks Change Permission.
$SINGLE_MARKS_CHANGES=$data['Single_Marks_Changes'];

// Subject Change Permission.
$SUBJECT_CHANGES=$data['Subject_Changes'];;

// School Change Permission
$SCHOOL_CHANGES=$data['School_Changes'];

// Marks Lock Changes.
$MARKS_LOCK_CHANGES=$data['Marks_Lock_Changes'];;

// Permission Changes
$PERMISSION_CHANGES=$data['Permission_Changes'];;


//Values
$SCHOOL_NAME = $school_names[0];
$SCHOOL_FULL_NAME_ABV = "GHSS Chitor Swat";
$SCHOOL_FULL_NAME = "Government Higher Secondary School";
$SCHOOL_LOCATION = "CHITOR SWAT";
$CLASS_NAME = $class_names[0];
$DESIGNATION=$employee_data['Designation'];
$user_name=$employee_data['Name'];

$award_list_msg ="Attendance Sheet  Final Exam Mar 2023";
$class_result_header="Final Term Examination Session 2022-2023";
$class_wise_report_header="Class wise report of Final Term Exam 2022-2023";
$header_for_roll_no_slip="Roll no slip annual examination
2022-23
under the auspices of Distt: exam committee Swat.";
$sub_header_for_roll_no_slip=" Final Examinination";

?>
