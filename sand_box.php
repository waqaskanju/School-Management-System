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
  date_default_timezone_set("Asia/Karachi");
        require_once 'db_connection.php';
        require_once 'config.php';
        $link=connect();
/**
 *  For showing the title of the page
 *
 * @param string $page_name of the page
 *
 * @return void
 */
function Page_header($page_name)
{
    echo '<!DOCTYPE html>
<html lang="en">
    <head>
        <title>' .$page_name.  '</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/custom.css">
        <link rel="stylesheet" href="css/style.css">
        <script type="text/javascript" src="js/jquery3.6.js">  </script>
        <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
        <script type="text/javascript" src="js/bootstrap.bundle.min.js.map"></script>
        <script type="text/javascript" src="js/custom.js"></script>';
}
/**
 *  For close the html and body tag
 *
 * @return void
 */
function Page_close()
{
    echo'</body>
		</html>';
}
/**
 * Select Single value data.
 * 6th, 7th, 8th etc
 *
 * @param string $table_name   table name
 * @param string $column_name  column of the data
 * @param string $where_column Where condition
 * @param string $where_value  where value
 *
 * @return void  save message.
 */
function Select_Column_data($table_name,$column_name,$where_column,$where_value)
{
    global $link;
    $query = "SELECT $column_name from $table_name
    WHERE $where_column='$where_value'";
    $query_result=mysqli_query($link, $query) or die("Error in this query. $query");
    $query_result_value=mysqli_fetch_assoc($query_result);
    return $query_result_value;
}

/**
 *  Select one column's array data from a table
 *
 * @param string $column_name  which column data you want to get.
 * @param string $table_name   table name
 * @param string $where_column column name for where clause
 * @param string $where_value  value of the where column clause.
 *
 * @return array
 */
function Select_Single_Column_Array_data(
    $column_name,$table_name,$where_column,$where_value
) {
    $q="SELECT $column_name from $table_name WHERE $where_column=$where_value";
    global $link;
    $exe=mysqli_query($link, $q);
    $data=[];
    while ($exer=mysqli_fetch_assoc($exe)) {
        $value=$exer[$column_name];
        array_push($data, $value);
    }
    return $data;
}

/**
 *  Showing the Combo box with Class Names
 *
 * @param string $selected_class which column data you want to get.
 *
 * @return $selected_class For example 6th 7th etc
 */
function Select_class($selected_class)
{
    $class_names_array=Select_Single_Column_Array_data(
        "Name", "school_classes", "Status", "1"
    );
    $selected="selected";
    echo "
<div class='form-group col-md-6'>
	<label for='class_exam'>Select Class Name: </label>
              <select class='form-control' name='class_exam' required>
                <option value=''>Select Class </option>";
    for ($i=0;$i<count($class_names_array);$i++) {
        echo "<option value='$class_names_array[$i]'";
        if ($selected_class==$class_names_array[$i]) {
               echo "selected";
        }
        echo"> $class_names_array[$i] </option> ";
    }
    echo "   </select>
      </div>
";

}

/**
 *  Showing Combo box for select
 *
 * @param string $selected_school name of school
 *
 * @return name of classes GPS Chitor Kokrai etc
 */
function Select_school($selected_school)
{
    $selected="selected";
    $school_names_array=Select_Single_Column_Array_data(
        "Name", "schools", "Status", "1"
    );
    echo "
	<div class='form-group col-md-6'>
		<label for='school'>Select School Name: </label>
              <select class='form-control' name='school' required>
                <option value=''>Select School </option>";
    for ($i=0;$i<count($school_names_array);$i++) {
        echo "<option value='$school_names_array[$i]'";
        if ($selected_school==$school_names_array[$i]) {
            echo "selected";
        }
            echo"> $school_names_array[$i] </option> ";
    }
        echo "   </select>
    </div>
             ";
}

/**
 *  Select subject
 *
 * @param string $selected_subject name of school
 *
 * @return void of classes GPS Chitor Kokrai etc
 */
function Select_subject($selected_subject)
{
    $selected="selected";
    $subject_names_array=Select_Single_Column_Array_data(
        "Name", "subjects", "Status", "1"
    );
    echo "
<div class='form-group col-md-6'>
	<label for='class_exam'>Select Subject Name: </label>
              <select class='form-control' name='subject' required>
                <option value=''>Select Subject </option>";
    for ($i=0;$i<count($subject_names_array);$i++) {
        echo "<option value='$subject_names_array[$i]'";
        if ($selected_subject==$subject_names_array[$i]) {
            echo "selected";
        }
                    echo"> $subject_names_array[$i] </option> ";
    }
    echo "   </select>
    </div>
        ";
}
/**
 *  Select Teacher
 *
 * @param string $selected_teacher name of school
 *
 * @return void Print combo box with teachers
 */
function Select_teacher($selected_teacher)
{
    $teacher_names_array=Select_Single_Column_Array_data(
        "Name", "employees", "Status", "1"
    );
    $selected="selected";
    echo "
<div class='form-group col-md-6'>
	<label for='teacher_name'>Select Teacher Name: </label>
              <select class='form-control' name='teacher_name' required>
                <option value=''>Select Teacher </option>";
    for ($i=0;$i<count($teacher_names_array);$i++) {
        echo "<option value='$teacher_names_array[$i]'";
        if ($selected_teacher==$teacher_names_array[$i]) {
            echo "selected";
        }
                    echo"> $teacher_names_array[$i] </option> ";
    }
    echo "  </select>
      </div>
        ";
}
/**
 *  Calculate position but its not 100 accurate.
 * Make this function Dynamic its not flexible.
 *
 * @param string $class  name of a class
 * @param string $school name of a school
 *
 * @return int    0 or 1
 */
function Calculate_position($class,$school)
{
    global $link;
    $class_name=$class;
    $school_name=$school;

    $q="SELECT Roll_No from students_info
	where Class='$class_name' AND School='$school_name' AND Status=1";
    $qr=mysqli_query($link, $q) or die('Error in Q 1'.mysqli_error($link));
    while ($qra=mysqli_fetch_assoc($qr)) {
        $q2="SELECT * FROM marks WHERE Roll_No=".$qra['Roll_No'];
        $qr2=mysqli_query($link, $q2) or die('Error in Q 2'. mysqli_query($link));
        while ($qfa=mysqli_fetch_assoc($qr2)) {
            $sum = 0;
            $sum =  $qfa['English_Marks'] + $qfa['Urdu_Marks'] +
                    $qfa['Maths_Marks'] + $qfa['Hpe_Marks'] +
                    $qfa['Nazira_Marks'] + $qfa['Science_Marks'] +
                    $qfa['Arabic_Marks'] + $qfa['Islamyat_Marks'] +
                    $qfa['History_Marks'] + $qfa['Computer_Marks'] +
                    $qfa['Mutalia_Marks'] + $qfa['Qirat_Marks'] +
                    $qfa['Social_Marks'] + $qfa['Pashto_Marks'] +
                    $qfa['Drawing_Marks'] + $qfa['Biology_Marks'] +
                    $qfa['Chemistry_Marks'] + $qfa['Physics_Marks'];

            $roll_no = $qfa['Roll_No'];
            $q3="INSERT INTO position (Roll_No, Total_Marks )
			VALUES ('$roll_no', '$sum')";

            $qr3 = mysqli_query($link, $q3)
            or
            die('Error in Q 3 '.mysqli_error($link));
            echo " Roll No: ". $qfa['Roll_No']  . " Completed <br>";

            $q4="Update students_info set Class_Position=''
            where
            Class='$class_name'";
            $qr4=mysqli_query($link, $q4);

            if ($qr4) {
                echo " successfully emptyfied Class_Position of".$class_name;
            } else {
                echo "error in emptying the".$class_name;
            }
        }
    }
    if ($qr) {
        return 1;
    } else {
        return 0;
    }
}
/**
 *  Add Data into Position Table
 *
 * @return void
 */
function Add_Data_Into_position()
{
    global $link;
    $count_row="SELECT COUNT(Total_Marks) as total_rows FROM position";
    $cqe=mysqli_query($link, $count_row)
    or
    die('Error Count Rows:'.mysqli_error($link));
    $cqa=mysqli_fetch_assoc($cqe);
    $total_entries=$cqa['total_rows'];
    for ($i=0;$i<$total_entries;$i++) {
        $q="SELECT Total_Marks,Roll_No FROM position
        ORDER BY Total_Marks DESC LIMIT $i,1";
        $qr=mysqli_query($link, $q)
        or
        die('Error Select Distint total'. mysqli_query($link));
        $qra=mysqli_fetch_assoc($qr);
        $j=$i+1;
        if ($i==0) {
            $q="Update students_info
            set Class_Position='1st   out of $total_entries'
            WHERE Roll_No=".$qra['Roll_No'];
            mysqli_query($link, $q)
            or
             die('Error in first Position'.mysqli_error($link));
        } else if ($i==1) {
            $q="Update students_info
            set Class_Position='2nd   out of $total_entries'
             WHERE Roll_No=".$qra['Roll_No'];
            mysqli_query($link, $q)
            or
            die('Error in 2nd Position'. mysqli_error($link));
        } else if ($i==2) {
            $q="Update students_info
            set Class_Position='3rd   out of $total_entries'
            WHERE Roll_No=".$qra['Roll_No'];
            mysqli_query($link, $q)
            or
            die('Error in 3rd Position'. mysqli_error($link));
        } else if ($i>2) {
            $q="Update students_info
            set Class_Position=' $j th out of $total_entries'
            WHERE Roll_No=".$qra['Roll_No'];
            mysqli_query($link, $q)
            or
            die('Error in nth Position'. mysqli_error($link));
        } else {
            echo "Some thing is wrong";
        }
    }
    if ($cqe) {
        echo "Data is Successfully Added to Positions";
    }
}

/**
 *  Empty Position Table
 *
 * @return void
 */
function Empty_Position_table()
{
    global $link;
    $q="DELETE from position";
    $qr=mysqli_query($link, $q) or die('Error:in deletion'.mysqli_error($link));
    if ($qr) {
        return 1;
    } else {
        return 0;
    }
}

/**
 *  This function return all the subjects of a class.
 *
 * @param string $class_name name of a class
 *
 * @return void
 */
function Class_subjects($class_name)
{
    global $link;
    $q1="SELECT Id FROM School_Classes WHERE Name='$class_name'";
    $exe1=mysqli_query($link, $q1)
    or
    die('Error in class subjects function query 1');
    $exer1= mysqli_fetch_assoc($exe1);
    $class_id=$exer1['Id'];

    $q2="SELECT Subject_Id FROM class_subjects
    WHERE Class_Id=$class_id AND Status=1";
    $exe2=mysqli_query($link, $q2)
    or
    die('Error in class subjects function query 2');

    $subjects=[];
    while ($exer2=mysqli_fetch_assoc($exe2)) {
        $subject_id = $exer2['Subject_Id'];

        $q3="SELECT Name FROM subjects WHERE Id=$subject_id AND Status=1";
        $exe3=mysqli_query($link, $q3)
         or
         die('Error in class subjects function query 3');

        while ($exer3=mysqli_fetch_assoc($exe3)) {
              $subject_Name = $exer3['Name'];
              $subjects[]=$subject_Name;
        }
    }
    return $subjects;
}



/**
 * This function Change dob to age.
 *
 * @param string $dob date of birth
 *
 * @return year.
 */
function Calculate_age($dob)
{
    $date = new DateTime($dob);
    $now = new DateTime();
    $interval = $now->diff($date);
    return $interval->y;
}

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
 * Save log of query
 *
 * @param string $msg Msg to be saved
 *
 * @return Void  save message.
 */
function Save_Log_data($msg)
{
    $fp = fopen('log.txt', 'a');//opens file in append mode
    $server_name = $_SERVER['REMOTE_ADDR'];
    $msg = $msg." ".$server_name." ".date('d-M-Y H:i:s')."\n";
    fwrite($fp, $msg);
    fclose($fp);
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
 * This function contain name of school classes like
 * 6th, 7th, 8th etc
 *
 * @return void  save message.
 */
function School_classes()
{
    global $link;
    $myclasses=[];
    $q="SELECT Name from school_classes where Status=1";
    $exe=mysqli_query($link, $q);
    while ($school_classes=mysqli_fetch_assoc($exe)) {
        $myclasses[] =  $school_classes['Name'];
    }
    return $myclasses;
}

/**
 * This function change subject name to column name where
 * marks of the subject will be added.
 *
 * @param string $class_name Msg to be saved
 *
 * @return Void  save message.
 */
function Convert_Class_Name_To_id($class_name)
{
    global $link;
    $data1[]=Select_Column_data("school_classes", "Id", "Name", $class_name);
    return  $class_id=$data1[0]['Id'];

}
/**
 * This function change subject name to column name where
 * marks of the subject will be added.
 *
 * @param string $subject_name Msg to be saved
 *
 * @return Void  save message.
 */
function Convert_Subject_Name_To_id($subject_name)
{
    global $link;
    $data2[]=Select_Column_data("subjects", "Id", "Name", $subject_name);
    return  $subject_id=$data2[0]['Id'];

}

/**
 * This function change Teacher name to Id
 *
 * @param string $teacher_name Msg to be saved
 *
 * @return Void  save message.
 */
function Convert_Teacher_Name_To_id($teacher_name)
{
    global $link;
    $data2[]=Select_Column_data("employees", "Id", "Name", $teacher_name);
    return  $subject_id=$data2[0]['Id'];

}

/**
 * Show teacher name based on subject name and class name;
 *
 * @param string $class_name   Msg to be saved
 * @param string $subject_name Subject name
 *
 * @return string  Teacher Name.
 */
function Subject_teacher($class_name,$subject_name)
{
    global $link;
    // show class_id based on class name.
    $class_id=Convert_Class_Name_To_id($class_name);

    //show subject_id based on subject_name;
    $subject_id=Convert_Subject_Name_To_id($subject_name);

    // show class_subject_id based on class and subject_id.
    $q="SELECT Id FROM class_subjects
    WHERE Class_Id=$class_id AND Subject_Id=$subject_id";
    $exe=mysqli_query($link, $q)
    or
    die('Error in ID selection in Subject teacher function');
    $exer=mysqli_fetch_assoc($exe);
    $class_subject_id=$exer['Id'];

    // Select teacher Id based on class subject.
    $t_id=Select_Column_data(
        "subject_teacher", "Teacher_Id", "Class_Subject_Id", $class_subject_id
    );
    $teacher_id=$t_id['Teacher_Id'];

    // Select teacher name based on teacher id.
    $t_name=Select_Column_data("employees", "Name", "Id", $teacher_id);
    $teacher_name=$t_name['Name'];

    return $teacher_name;
}

/**
 * Show teacher name based on subject name and class name;
 *
 * @param string $class_name   Msg to be saved
 * @param string $subject_name Subject name
 *
 * @return bool  True or False.
 */
function Check_Subject_For_class($class_name,$subject_name)
{
    //echo "Class Name= $class_name Subject Name= $subject_name ";
    global $link;

    //Step 1: Change Class Name to Class ID.
    $data1[]=select_column_data("school_classes", "Id", "Name", $class_name);
    $class_id=$data1[0]['Id'];

    //Step 2: Change Subject Name to ID.
    $data2[]=Select_Column_data("subjects", "Id", "Name", $subject_name);
    $subject_id=$data2[0]['Id'];

    //Step 3: Determine if it is allowed or not.
    $q="Select Status from class_subjects
    WHERE Class_Id=$class_id AND Subject_Id=$subject_id";

    $exe=mysqli_query($link, $q);
    $effect=mysqli_num_rows($exe);
    if ($effect==0) {
        return "Subject Not Defined.";
    } else {
        $exer=mysqli_fetch_assoc($exe);
        $status=$exer['Status'];
            if ($status==1) {
                return true;
            } else {
                return false;
            }

    }
}


/**
 * Show teacher name based on subject name and class name;
 *
 * @param string $class_name   Msg to be saved
 * @param string $subject_name Subject name
 *
 * @return Void  save message.
 */
function One_Subject_Total_marks($class_name,$subject_name)
{

    global $link;
    $class_id=Convert_Class_Name_To_id($class_name);
    $subject_id=Convert_Subject_Name_To_id($subject_name);

    $q="Select Total_Marks from class_subjects
    WHERE Class_Id=$class_id AND Subject_Id=$subject_id";

    $exe=mysqli_query($link, $q);
    $total_marks=mysqli_fetch_assoc($exe);
    $effect=mysqli_num_rows($exe);
    if ($effect==0) {
        return 0;
    } else {

        return $total_marks['Total_Marks'];

    }



}
/**
 * Show all the subjects of a class in index array. As $Subject[$i]['Name'];
 *
 * @param string $class_name Name of a class
 *
 * @return array  All Subjects of A Class a $subjects[$i]['Name'].
 */
function Select_Subjects_Of_class($class_name)
{
    global $link;
    // convert class name to class id as table data is in Id from
    $class_id=Convert_Class_Name_To_id($class_name);
    $q="SELECT Subject_Id from class_subjects WHERE Class_Id='$class_id' AND Status='1'";
    $exe=mysqli_query($link, $q) or die('Not table to select subject of a class');
    $subjects=array();
    while ($exer=mysqli_fetch_assoc($exe)) {
            $subject_id=$exer['Subject_Id'];
          $subject=Select_Column_data("subjects", "Name", "Id", $subject_id);
          array_push($subjects, $subject);
    }
    return $subjects;

}
/**
 * Class Total Marks.. Sum of all subjects total marks.
 *
 * @param string $class_name Msg to be saved
 *
 * @return Void  save message.
 */
function Class_Total_marks($class_name)
{
    global $link;
    $total_marks=0;
    $subjects=Select_Subjects_Of_class($class_name);
    for ($i=0;$i<count($subjects);$i++) {
        $marks =  One_Subject_Total_marks($class_name, $subjects[$i]['Name']);
        $total_marks = $total_marks+$marks;
    }
     return $total_marks;
}



/**
 * Check Lock if marks updation is allowed;
 *
 * @param string $class_name   Name of the class.
 * @param string $subject_name Name of the subject.
 *
 * @return int 1 or 0. one means status is on updation not allowed.
 */
function Check_Subject_Update_Lock_status($class_name,$subject_name)
{
     //echo "Class Name= $class_name Subject Name= $subject_name ";
     global $link;
     $data1[]=select_column_data("school_classes", "Id", "Name", $class_name);
     $class_id=$data1[0]['Id'];

     $data2[]=Select_Column_data("subjects", "Id", "Name", $subject_name);
     $subject_id=$data2[0]['Id'];
     $q="Select Lock_Status from class_subjects
     WHERE Class_Id=$class_id AND Subject_Id=$subject_id";

     $exe=mysqli_query($link, $q);
     $effect=mysqli_num_rows($exe);
    if ($effect==0) {
         //echo "False";
         return "Subject Not Defined";
    } else {
         $exer=mysqli_fetch_assoc($exe);
         return $exer['Lock_Status'];
    }

}

function Validate_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


?>


