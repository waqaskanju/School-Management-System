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

if (isset($_SESSION['user'])) {
    $account_id=$_SESSION['user'];
} else {
    $account_id=22;
}

//echo $account_id;
// Situation if user is not logged in then he is Guest.


// Used at the time of marks insertion and student insertion.
//Select school id from seeting page of current user.
$selected_school_id_array=Select_Single_Column_Array_data(
    "Selected_School_Id", "Setting", "User_Id", "$account_id"
);
//print_r($selected_school_id_array);

// Used at the time of marks insertion and student insertion.
// As the result is arrray we need only one school.
 $selected_school_id=$selected_school_id_array[0];

// Convert school_id to school_name
$school_names=Select_Single_Column_Array_data(
    "Name", "schools", "Id", "$selected_school_id"
);

// Used at the time of student insertion.
// Select class id from seeting page. used at the time of student insertion.
$selected_class_id_array=Select_Single_Column_Array_data(
    "Selected_Class_Id", "Setting", "User_Id", "$account_id"
);

// Used at the time of student insertion.
// As the data is array we need only one class id
$selected_class_id=$selected_class_id_array[0];

// Covert class_id to class_name
$class_names=Select_Single_Column_Array_data(
    "Name", "school_classes", "School_Id", "$selected_school_id"
);

// Select user name
$user=Select_Single_Column_Array_data(
    "User_Name", "Login", "Employee_Id", "$account_id"
);

//Select username from Array.
$user_name=$user[0];

// // user Id Allow_Edit.  Used For Site Changes.
// $mode=Select_Single_Column_Array_data(
//     "Allow_Edit", "Setting", "User_Id", "$account_id"
// );

// $MODE=$mode[0];
$designation=Select_Single_Column_Array_data(
    "Designation", "employees", "Id", "$account_id"
);

//Permissions

//  Student Changes Permission.
$student_changes_mode=Select_Single_Column_Array_data(
    "Student_Changes", "Setting", "User_Id", "$account_id"
);
$STUDENT_CHANGES=$student_changes_mode[0];

//  Batch Marks Changes Permission.
$batch_marks_changes_mode=Select_Single_Column_Array_data(
    "Batch_Marks_Changes", "Setting", "User_Id", "$account_id"
);

$BATCH_MARKS_CHANGES=$batch_marks_changes_mode[0];

// Single Marks Change Permission.
$single_marks_changes_mode=Select_Single_Column_Array_data(
    "Single_Marks_Changes", "Setting", "User_Id", "$account_id"
);

$SINGLE_MARKS_CHANGES=$single_marks_changes_mode[0];

// Subject Change Permission.
$subject_changes_mode=Select_Single_Column_Array_data(
    "Subject_Changes", "Setting", "User_Id", "$account_id"
);

$SUBJECT_CHANGES=$subject_changes_mode[0];

// School Change Permission
$school_changes_mode=Select_Single_Column_Array_data(
    "School_Changes", "Setting", "User_Id", "$account_id"
);

$SCHOOL_CHANGES=$school_changes_mode[0];

// Marks Lock Changes
$marks_lock_changes_mode=Select_Single_Column_Array_data(
    "Marks_Lock_Changes", "Setting", "User_Id", "$account_id"
);

$MARKS_LOCK_CHANGES=$marks_lock_changes_mode[0];



$SCHOOL_NAME = $school_names[0];
$SCHOOL_FULL_NAME_ABV = "GHSS Chitor Swat";
$SCHOOL_FULL_NAME = "Government Higher Secondary School";
$SCHOOL_LOCATION = "CHITOR SWAT";
$CLASS_NAME = $class_names[0];
$DESIGNATION=$designation[0];

$award_list_msg ="Attendance Sheet  Final Exam Mar 2023";
$class_result_header="Final Term Examination Session 2022-2023";
$class_wise_report_header="Class wise report of Final Term Exam 2022-2023";
$header_for_roll_no_slip="Roll no slip annual examination
2022-23
under the auspices of Distt: exam committee Swat.";
$sub_header_for_roll_no_slip=" Final Examinination";

?>
