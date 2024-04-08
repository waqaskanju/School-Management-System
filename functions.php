<?php

  /**
   * All the general functions of the website resides here.
   * php version 8.1
   *
   * @category Functions
   *
   * @package Functions
   *
   * @author Waqas Ahmad <waqaskanju@gmail.com>
   *
   * @license http://www.abc.com MIT
   *
   * @link Adfas
   **/
/**
 * This function change -1 to absent.
 *
 * @param Integer $marks date of birth
 *
 * @return Makrs of A for absent.
 */
function Show_absent($marks)
{
    if ($marks == -1) {
            $marks ="A";
    }
    return $marks;
}

/**
 * This function change absent to zero for total marks calculation.
 *
 * @param Integer $marks_value date of birth
 *
 * @return Makrs of A for absent.
 */
function Change_Absent_tozero($marks_value)
{
    if ($marks_value == -1) {
            $marks_value=0;
    }
    return $marks_value;
}



/**
 * This function change subject name to column name where
 * marks of the subject will be added.
 *
 * @param string $subject Msg to be saved
 *
 * @return Void  save message.
 */
function Change_Subject_To_Marks_col($subject)
{
    switch ($subject) {
    case "English":
        return "English_Marks";
    break;
    case "Urdu":
        return "Urdu_Marks";
    break;
    case "Maths":
        return "Maths_Marks";
    break;
    case "Hpe":
        return "Hpe_Marks";
    break;
    case "Nazira":
        return "Nazira_Marks";
    break;
    case "General Science":
        return "Science_Marks";
    break;
    case "Arabic":
        return "Arabic_Marks";
    break;
    case "Islamyat":
        return "Islamyat_Marks";
    break;
    case "History And Geography":
        return "History_Marks";
    break;
    case "Computer Science":
        return "Computer_Marks";
    break;
    case "Mutalia Quran":
        return "Mutalia_Marks";
    break;
    case "Drawing":
        return "Drawing_Marks";
    break;
    case "Social Study":
        return "Social_Marks";
    break;
    case "Pak Study":
        return "Social_Marks";
    break;
    case "Pashto":
        return "Pashto_Marks";
    break;
    case "Biology":
        return "Biology_Marks";
    break;
    case "Chemistry":
        return "Chemistry_Marks";
    break;
    case "Physics":
        return "Physics_Marks";
    break;
    case "Civics":
        return "Civics_Marks";
    break;
    case "Economics":
        return "Economics_Marks";
    break;
    case "Islamic Study":
        return "Islamic_Study_Marks";
    break;
    case "Islamic Education":
        return "Islamic_Education_Marks";
    break;
    case "Statistics":
        return "Statistics_Marks";
    break;
    default:
        echo "Unknown Subject";
    }

}


/**
 * Project Folder Name
 *
 * @return Void  show project folder used in print.
 */
function Project_Folder_name()
{
    // return folder of the project.
    $path=getcwd();
    //echo  $main_dir=dirname($path, 1);
    $chunks = explode('\\', $path);
    $chunks_length=count($chunks);
    return $my_directory=$chunks[$chunks_length-1];

}

/**
 * Project Folder Name
 *
 * @param integer $status Name of class
 *
 * @return Void  show project folder used in print.
 */
function Change_Status_To_word($status)
{
    if ($status==0) {
        return "Stuck off";
    } else if ($status==1) {
        return "Active";
    } else if ($status==2) {
        return "Graduate";
    } else if ($status==3) {
        return "SLC";
    } else {
        return "Something wrong";
    }
}

/**
 * Project Folder Name
 *
 * @param integer $status Name of class
 *
 * @return Void  show project folder used in print.
 */
function Change_Student_Status_To_number($status)
{
    if ($status=="Active") {
        return 1;
    } else if ($status=="Struck Off") {
        return 0;
    } else if ($status=="Graduate") {
        return 2;
    } else if ($status=="SLC") {
        return 3;
    } else {
        // return 4 means so thing is wrong.
        return 4;
    }
}

/**
 * Project Folder Name
 *
 * @param time   $sec Time in Second
 * @param string $url Url of the page
 *
 * @return Void  show project folder used in print.
 */
function redirection($sec,$url)
{
    header("refresh:$sec; url=$url");
}

/**
 * Project Folder Name
 *
 * @param string $url Url of the page
 *
 * @return Void  show project folder used in print.
 */
function Change_location($url)
{
    header("Location: $url");
}



/**
 * Show Alert Message
 *
 * @param string $message    Time in Second
 * @param string $alert_type Url of the page
 *
 * @return Void  show project folder used in print.
 */
function Show_alert($message,$alert_type)
{
    echo "<div class='alert alert-$alert_type alert-dismissible fade show'
               role='alert'>
                  <strong> $message </strong> 
                    <button type='button' class='btn-close' data-bs-dismiss='alert'
                            aria-label='Close'></button>
                </div>";
}


/**
 * Check Module Permission
 *
 * @param string $module_name Name of module
 *
 * @return css_class  show project folder used in print.
 */
function Check_Module_permission($module_name)
{
    if ($module_name!=1) {
        return "d-none";
    } else {
        return "d-block";
    }
}


/**
 *  Get Value of Permission
 *
 * @param Integer $value Value of premission either 0 or 1.
 *
 * @return $selected_class For example 6th 7th etc
 */
function Get_Permission_value($value)
{
    $student_value=0;
    if (isset($_POST[$value])) {
        $student_value=$_POST[$value];
    }
    return $student_value;
}

/**
 *  Change date to Pakistani format
 *
 * @param String $date Date value.
 *
 * @return pakistani date format
 */
function Change_Date_To_Pak_format($date)
{
    $date_from_string=strtotime($date);
    $pkr_date = date('d-m-Y', $date_from_string);
    return $pkr_date;
}

/**
 *  Change rank number to english position
 * with 1 it will add 1st, 2 to 2nd
 * 3 to 3rd and 4 to 4th and so on 
 *
 * @param integer $rank as value.
 *
 * @return postion date format
 */
function Change_rank_to_position($rank)
{
   if($rank==1){
    return "1st";
   }
   else if($rank==2){
    return "2nd";
   }
   else if($rank==3)
   return "3rd";
  else
    return $rank."th";
}
?>
