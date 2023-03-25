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

?>