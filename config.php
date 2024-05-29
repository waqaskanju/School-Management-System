<?php
/**
 * Configuration of Website.
 * php version 8.1
 *
 * @category Configuration
 *
 * @package None
 *
 * @author Waqas Ahmad <waqaskanju@gmail.com>
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
    $account_id=Validate_input($account_id);
} else {
    $guest=Select_Single_Column_Array_data(
        "Id", "employees", "Name", "'Guest'"
    );

     $account_id=$guest[0];
}


//Select school id from setting page of current user.
$selected_school_id_array=Select_Single_Column_Array_data(
    "Selected_School_Id", "setting", "User_Id", "$account_id"
);

// As the result is arrray we need only one school.
 $selected_school_id=$selected_school_id_array[0];

// Convert school_id to school_name
$school_names=Select_Single_Column_Array_data(
    "Name", "schools", "Id", "$selected_school_id"
);

// Select class id from setting page. used at the time of student insertion.
$selected_class_id_array=Select_Single_Column_Array_data(
    "Selected_Class_Id", "setting", "User_Id", "$account_id"
);

 // As the data is array we need only one class id
 $selected_class_id=$selected_class_id_array[0];

 // Covert class_id to class_name
$class_names=Select_Single_Column_Array_data(
    "Name", "school_classes", "Id", "$selected_class_id"
);
 //print_r($class_names);
 // Select username array
$user=Select_Single_Column_Array_data(
    "Name", "employees", "Id", "$account_id"
);

 //Select single username from Array.
 $user_name=$user[0];

$designation=Select_Single_Column_Array_data(
    "Designation", "employees", "Id", "$account_id"
);

 //Permissions

 //  Student Changes Permission.
$student_changes_mode=Select_Single_Column_Array_data(
    "Student_Changes", "setting", "User_Id", "$account_id"
);
 $STUDENT_CHANGES=$student_changes_mode[0];

 //  Batch Marks Changes Permission.
$batch_marks_changes_mode=Select_Single_Column_Array_data(
    "Batch_Marks_Changes", "setting", "User_Id", "$account_id"
);
 $BATCH_MARKS_CHANGES=$batch_marks_changes_mode[0];

 // Single Marks Change Permission.
$single_marks_changes_mode=Select_Single_Column_Array_data(
    "Single_Marks_Changes", "setting", "User_Id", "$account_id"
);
 $SINGLE_MARKS_CHANGES=$single_marks_changes_mode[0];

 // Subject Change Permission.
$subject_changes_mode=Select_Single_Column_Array_data(
    "Subject_Changes", "setting", "User_Id", "$account_id"
);
 $SUBJECT_CHANGES=$subject_changes_mode[0];

 // School Change Permission
$school_changes_mode=Select_Single_Column_Array_data(
    "School_Changes", "setting", "User_Id", "$account_id"
);
 $SCHOOL_CHANGES=$school_changes_mode[0];

 // Marks Lock Changes.
$marks_lock_changes_mode=Select_Single_Column_Array_data(
    "Marks_Lock_Changes", "setting", "User_Id", "$account_id"
);
 $MARKS_LOCK_CHANGES=$marks_lock_changes_mode[0];

 // Permission Changes
$permission_changes_mode=Select_Single_Column_Array_data(
    "Permission_Changes", "setting", "User_Id", "$account_id"
);
 $PERMISSION_CHANGES=$permission_changes_mode[0];


 //Values
 $SCHOOL_NAME = $school_names[0];
 
// 1  Scholl Full Name Abbrevation
 $msg_value=Select_Single_Column_Array_data(
  "Msg", "header_msgs", "Id", "1"
);
$SCHOOL_FULL_NAME_ABV = $msg_value[0];

 //2 School Full Name
 $msg_value=Select_Single_Column_Array_data(
  "Msg", "header_msgs", "Id", "2"
);
$SCHOOL_FULL_NAME = $msg_value[0]; 
 
//3  School Location
 $msg_value=Select_Single_Column_Array_data(
  "Msg", "header_msgs", "Id", "3"
);
 $SCHOOL_LOCATION = $msg_value[0];

 $CLASS_NAME = $class_names[0];
 $DESIGNATION=$designation[0];

 // 4 Award List Msgs
 $msg_value=Select_Single_Column_Array_data(
  "Msg", "header_msgs", "Id", "4"
);
 $award_list_msg =$msg_value[0];

 // 5  Class Result Header
 $msg_value=Select_Single_Column_Array_data(
  "Msg", "header_msgs", "Id", "5"
);
 $class_result_header=$msg_value[0];

 // 6 Class wise report header
 $msg_value=Select_Single_Column_Array_data(
  "Msg", "header_msgs", "Id", "6"
);
 $class_wise_report_header=$msg_value[0];

 // 7 Header for roll no slip
 $msg_value=Select_Single_Column_Array_data(
  "Msg", "header_msgs", "Id", "7"
);
 $header_for_roll_no_slip=$msg_value[0];

 // 8 sub header for roll no slip
 $msg_value=Select_Single_Column_Array_data(
  "Msg", "header_msgs", "Id", "8"
);
 $sub_header_for_roll_no_slip=$msg_value[0];

?>
