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


function Exam_footer($class,$fail,$pass,$total){
    $pass_p_age=($pass*100)/$total;
    $pass_p_age=number_format($pass_p_age, 2, '.', ' ');
    echo "<div class='row'>
          <div class='col-sm-4'>
            <div class='container'>
              NOTE:
                <ul>
                  <li> Passing Percentage=".Pass_percentage($class)."%
                  </li>
                  
                  <li> Repeater passing percentage=10%</li>
                </ul>
            </div>
            <div class='container mt-5'>
              <p> ______________________ </p>
              <p> Principal GHSS Chitor</p>
            </div>
          </div>
          <div class='col-sm-4'>
          <table class='table table-border'>
          <tr> <td>Failed </td> <td> $fail </td></tr>
          <tr> <td>Passed </td> <td> $pass </td></tr>
          <tr> <td>Passed Percentage </td> <td> $pass_p_age </td></tr>
          </table>
          </div>
          <div class='col-sm-4'>

            <table class='table'>
            <legend class='text-center'>  Examination Committee Members </legend>
            <tr><td>1) Sherin Buhar Sb</td><td>_____________</td></tr>
            <tr><td>2) Noor Ali Shah Sb</td><td>_____________</td></tr>
            <tr><td>3) Abdul Khabir Sb</td><td>_____________</td></tr>
            <tr><td>4) Hamayun Sb</td><td>_____________</td></tr>
            <tr><td>5) Suliman Sb</td><td>_____________</td></tr>
            </table>
        </div>
    </div>
    ";

}
function project_folder_name(){
    // return folder of the project.
    $path=getcwd();
    //echo  $main_dir=dirname($path, 1);
    $chunks = explode('\\', $path);
    $chunks_length=count($chunks);
    return $my_directory=$chunks[$chunks_length-1];
    
}

function change_status_to_word($status) {
    return $status==1? "Active" : "Inactive";
}

function redirection($sec,$url){
    header("refresh:$sec; url=$url");
}

/**
 * Validate Form Input;
 *
 * @param string $data Name of the class.
 *
 * @return string return clean data.
 */
function Validate_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


function Show_alert($message,$alert_type){
    echo "<div class='alert alert-$alert_type alert-dismissible fade show' role='alert'>
                  <strong>Success!</strong> $message
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
}
?>