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


// Used for final exam report calculation.
function pass_percentage($class) {
    $pass_percentage=0;
    if ($class=='5th') {
        $pass_percentage=19.4;
    } else if ($class=='6th') {
        $pass_percentage=19.4;
    } else if ($class=='7th') {
        $pass_percentage=19.4;
    } else if ($class=='8th') {
        $pass_percentage=24;
    } else {
        $pass_percentage=24;
    }

    return $pass_percentage;
}

function exam_footer($class){
  echo "  <div class='row'>
        <div class='col-sm-6'>

            <div class='container'>
            NOTE:
                <ul>
                    <li> Passing Percentage=".pass_percentage($class). "%</li>
                    <li> Repeater passing percentage=10%</li>
                </ul>
            </div>
    <div class='container mt-5'>
            <p> ______________________ </p>
            <p> Principal GHSS Chitor</p>
    </div>
        </div>
        <div class='col-sm-6'>

            <table>
            <legend>  Examination Committee Members </legend>
            <tr><td> Sherin Buhar Sb   </td><td>_____________</td></tr>
            <tr><td> Noor Ali Shah Sb  </td><td>_____________</td></tr>
            <tr><td> Abdul Khabir Sb   </td><td>_____________</td></tr>
            <tr><td> Hamayun Sb        </td><td>_____________</td></tr>
            <tr><td> Suliman Sb        </td><td>_____________</td></tr>
            </table>
        </div>
    </div>
    ";

}

?>