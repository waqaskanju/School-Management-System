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
        include_once 'db_connection.php';
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

function select_single_column_array_data($column_name,$table_name,$where_column,$where_value){
    $q="SELECT $column_name from $table_name WHERE $where_column=$where_value";
    global $link;
    $exe=mysqli_query($link,$q);
    $data=[];
while($exer=mysqli_fetch_assoc($exe)){
    $value=$exer[$column_name];
array_push($data,$value);
}
return $data;
}    

/**
 *  Showing the Combo box with Class Names 
 *
 * @return name of classes 6th 7th etc
 */    
function select_class($selected_class) {
    
    $class_names_array=select_single_column_array_data("Name","school_classes","Status","1");
    $selected="selected";
    echo "
<div class='form-group col-md-6'>
	<label for='class_exam'>Select Class Name: </label>
              <select class='form-control' name='class_exam' required>
                <option value=''>Select Class </option>";
        for($i=0;$i<count($class_names_array);$i++){
       echo "<option value='$class_names_array[$i]'"; 
            if ($selected_class==$class_names_array[$i]){ 
               echo "selected";
            }  
       echo"> $class_names_array[$i] </option> ";
    }

    echo "   </select>
      </div>
";

}

/**
 *  Showing the Combo box with School Names 
 *
 * @return name of classes GPS Chitor Kokrai etc
 */    

function select_school($selected_school)
{
    $selected="selected";
    $school_names_array=select_single_column_array_data("Name","schools","Status","1");
    echo "
	<div class='form-group col-md-6'>
		<label for='school'>Select School Name: </label>
              <select class='form-control' name='school' required>
                <option value=''>Select School </option>";
                for($i=0;$i<count($school_names_array);$i++){
                    echo "<option value='$school_names_array[$i]'"; 
                         if ($selected_school==$school_names_array[$i]){ 
                            echo "selected";
                         }  
                    echo"> $school_names_array[$i] </option> ";
                 }
             
                 echo "   </select>
                   </div>
             ";
}

function select_subject($selected_subject)
{
    $selected="selected";
    $subject_names_array=select_single_column_array_data("Name","subjects","Status","1");
    echo "
<div class='form-group col-md-6'>
	<label for='class_exam'>Select Subject Name: </label>
              <select class='form-control' name='subject' required>
                <option value=''>Select Subject </option>";
                for($i=0;$i<count($subject_names_array);$i++){
                    echo "<option value='$subject_names_array[$i]'"; 
                         if ($selected_subject==$subject_names_array[$i]){ 
                            echo "selected";
                         }  
                    echo"> $subject_names_array[$i] </option> ";
                 }
                echo "   </select>
                </div>
          ";
}

function select_teacher($selected_teacher)
{
     $teacher_names_array=select_single_column_array_data("Name","employees","Status","1");
    $selected="selected";
    echo "
<div class='form-group col-md-6'>
	<label for='teacher_name'>Select Teacher Name: </label>
              <select class='form-control' name='teacher_name' required>
                <option value=''>Select Teacher </option>";
			 for($i=0;$i<count($teacher_names_array);$i++){
                    echo "<option value='$teacher_names_array[$i]'"; 
                         if ($selected_teacher==$teacher_names_array[$i]){ 
                            echo "selected";
                         }  
                    echo"> $teacher_names_array[$i] </option> ";
                 }
           echo "  </select>
      </div>
";
}

function calculate_position($link,$class,$school)
{

    $class_name=$class;
    $school_name=$school;

    $q="SELECT Roll_No from students_info
	where Class='$class_name' AND School='$school_name' AND Status=1";
    $qr=mysqli_query($link, $q) or die('Error in Q 1'.mysqli_error($link));
    while ($qra=mysqli_fetch_assoc($qr)){
        $q2="SELECT * FROM marks WHERE Roll_No=".$qra['Roll_No'];
        $qr2=mysqli_query($link, $q2) or die('Error in Q 2'. mysqli_query($link));
        while ($qfa=mysqli_fetch_assoc($qr2)){
            $sum = 0;
          $sum=  $qfa['English_Marks'] + $qfa['Urdu_Marks'] +
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

            $qr3 = mysqli_query($link, $q3) or die('Error in Q 3 '.mysqli_error($link));
            echo " Roll No: ". $qfa['Roll_No']  . " Completed <br>";

            $q4="Update students_info set Class_Position='' where Class='$class_name'";
            $qr4=mysqli_query($link, $q4);
            if($qr4){
                echo " successfully emptyfied Class_Position of".$class_name;
            }
            else {
                echo "error in emptying the".$class_name;
            }
        }
    }
    if($qr) {
        return 1;
    }
    else{
        return 0;
    }
}

function add_data_into_position($link)
{
    $count_row="SELECT COUNT(Total_Marks) as total_rows FROM position";
    $cqe=mysqli_query($link, $count_row) or die('Error Count Rows:'.mysqli_error($link));
    $cqa=mysqli_fetch_assoc($cqe);
    $total_entries=$cqa['total_rows'];
    for ($i=0;$i<$total_entries;$i++){
        $q="SELECT Total_Marks,Roll_No FROM position ORDER BY Total_Marks DESC LIMIT $i,1";
        $qr=mysqli_query($link, $q) or die('Error Select Distint total'. mysqli_query($link));
        $qra=mysqli_fetch_assoc($qr);
        $j=$i+1;
        if ($i==0) {
            $q="Update students_info set Class_Position='1st   out of $total_entries' WHERE Roll_No=".$qra['Roll_No'];
            mysqli_query($link, $q) or die('Error in first Position'.mysqli_error($link));
        }
        else if($i==1) {$q="Update students_info set Class_Position='2nd   out of $total_entries' WHERE Roll_No=".$qra['Roll_No'];
            mysqli_query($link, $q) or die('Error in 2nd Position'. mysqli_error($link));
        }
        else if ($i==2) {$q="Update students_info set Class_Position='3rd   out of $total_entries' WHERE Roll_No=".$qra['Roll_No'];
            mysqli_query($link, $q) or die('Error in 3rd Position'. mysqli_error($link));
        }
        else if ($i>2) {$q="Update students_info set Class_Position=' $j th out of $total_entries' WHERE Roll_No=".$qra['Roll_No'];
            mysqli_query($link, $q) or die('Error in nth Position'. mysqli_error($link));
        }
        else {echo "Some thing is wrong";
        }
    }
    if ($cqe) {
        echo "Data is Successfully Added to Positions";
    }
}


function empty_position_table($link)
{
    $q="DELETE from position";
    $qr=mysqli_query($link, $q) or die('Error:in deletion'.mysqli_error($link));
    if ($qr) {
        return 1;
    } else {
        return 0;
    }
}

function date_sheet($class)
{
    echo '
	<table border="1" class="m-b-4">
		<tr> <th colspan="19"> Date Sheet Class '; echo $class; echo'th  GHSS CHITOR </th> </tr>
		<tr> <td> Days </td>       <td colspan="2"> Saturday </td>    <td colspan="2"> Monday </td>       <td colspan="2"> Tuesday </td>   <td colspan="2"> Wednesday </td>   <td colspan="2"> Thursday </td>   <td colspan="2"> Friday </td>     <td colspan="2"> Saturday </td>   <td colspan="2"> Monday </td>    <td colspan="2"> Tuesday</td> </tr>
		<tr> <td> Date </td>       <td colspan="2"> 18-06-2022 </td> <td colspan="2"> 20-06-2022 </td> <td colspan="2"> 21-06-2022 </td>   <td colspan="2"> 22-06-2022 </td> <td colspan="2"> 23-06-2022 </td> <td colspan="2"> 24-06-2022 </td> <td colspan="2"> 25-06-2022 </td> <td colspan="2"> 27-06-2022 </td> <td colspan="2"> 28-06-2022 </td> </tr>
		<tr> <td>Class </td>  <td> 1 </td><td> II </td>  <td> 1 </td><td> II </td> <td> 1 </td><td> II </td> <td> 1 </td><td> II </td> <td> 1 </td><td> II </td> <td> 1 </td><td> II </td> <td> 1 </td><td> II </td> <td> 1 </td><td> II </td> <td> 1 </td><td> II </td>          </tr>';
    if($class==6) {
        echo    '<tr> <td> 6th </td> <td> Urdu </td><td> Arabic </td>  <td> General Science </td><td>----- </td> <td> Maths </td><td> --- </td> <td> Islamyat </td><td> Nazira </td> <td> English </td><td> HPE </td> <td> History / Geography </td><td> ----  </td> <td> Qirat </td><td> ---- </td> <td> Computer Science </td><td> Mutalia Quran </td> <td> Drawing </td><td> ---- </td>      </tr>';
    }
    echo'	</table';
}

function class_subjects($link, $class_name){
$q1="SELECT Id FROM School_Classes WHERE Name='$class_name'";
$exe1=mysqli_query($link, $q1) or die('Error in class subjects function query 1');
$exer1= mysqli_fetch_assoc($exe1);
$class_id=$exer1['Id'];

$q2="SELECT Subject_Id FROM class_subjects WHERE Class_Id=$class_id AND Status=1";
$exe2=mysqli_query($link,$q2) or die('Error in class subjects function query 2');

$subjects=[];
   while($exer2=mysqli_fetch_assoc($exe2)){
    $subject_id = $exer2['Subject_Id'];

    $q3="SELECT Name FROM subjects WHERE Id=$subject_id AND Status=1";
    $exe3=mysqli_query($link,$q3) or die('Error in class subjects function query 3');

    while($exer3=mysqli_fetch_assoc($exe3)){
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
function calculate_age($dob)
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


function  save_log_data($msg){
$fp = fopen('log.txt', 'a');//opens file in append mode
$server_name = $_SERVER['REMOTE_ADDR'];
$msg = $msg." ".$server_name." ".date('d-M-Y H:i:s')."\n";
fwrite($fp, $msg);
fclose($fp);
}

// This function change subject name to column name where
// marks of the subject will be added.
function change_subject_to_marks_col($subject){
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
  default:
    echo "Unknown Subject";
}

}

// this function contain name of classes like
// 6th, 7th, 8th etc
function school_classes($link){
$myclasses=[];
    $q="SELECT Name from school_classes where Status=1";
$exe=mysqli_query($link,$q);
while($school_classes=mysqli_fetch_assoc($exe)){
  $myclasses[] =  $school_classes['Name'];
}
 return $myclasses;
}

function select_column_data($link,$table_name,$column_name,$where_column,$where_value){
   $query = "SELECT $column_name from $table_name WHERE $where_column='$where_value'";
  //echo "<br>"; 
  $query_result=mysqli_query($link,$query);
    $query_result_value=mysqli_fetch_assoc($query_result);
    $query_result_value[$column_name];    
    return $query_result_value;
}

function subject_total_marks($link,$class,$subject){

    // Select class ID based on Class Name;
    $data1[]=select_column_data($link,"school_classes","Id","Name",$class);
    $class_id=$data1[0]['Id'];
    // Select Subject ID based on Subject Name
     $data2[]=select_column_data($link,"subjects","Id","Name",$subject);
    $subject_id=$data2[0]['Id'];
   $q="Select Total_Marks from class_subjects WHERE Class_Id=$class_id AND Subject_Id=$subject_id";
  
   $exe=mysqli_query($link,$q);
   $effect=mysqli_num_rows($exe);
    if($effect==0){
     return 0;
    }
    $return_marks=mysqli_fetch_assoc($exe);
    $subject_total_marks=$return_marks['Total_Marks'];
         return $subject_total_marks;
    }

    function convert_class_name_to_id($link,$class_name){
        $data1[]=select_column_data($link,"school_classes","Id","Name",$class_name);
      return  $class_id=$data1[0]['Id'];
    
    }
    function convert_subject_name_to_id($link,$subject_name){
        $data2[]=select_column_data($link,"subjects","Id","Name",$subject_name);
      return  $subject_id=$data2[0]['Id'];
        
    }

// show teacher name based on subject name and class name;
function subject_teacher($link,$class_name,$subject_name){
    
    // show class_id based on class name.
   $class_id=convert_class_name_to_id($link,$class_name);
      
    //show subject_id based on subject_name;
    $subject_id=convert_subject_name_to_id($link,$subject_name);
  
    // show class_subject_id based on class and subject_id.
    $q="SELECT Id FROM class_subjects WHERE Class_Id=$class_id AND Subject_Id=$subject_id";
    $exe=mysqli_query($link,$q) or die('Error in ID selection in Subject teacher function');
    $exer=mysqli_fetch_assoc($exe);
    $class_subject_id=$exer['Id'];

    // Select teacher Id based on class subject.
    $t_id=select_column_data($link,"subject_teacher","Teacher_Id","Class_Subject_Id",$class_subject_id);
    $teacher_id=$t_id['Teacher_Id'];

    // Select teacher name based on teacher id.
    $t_name=select_column_data($link,"employees","Name","Id",$teacher_id);
    $teacher_name=$t_name['Name'];
    
    return $teacher_name;
}

 function Check_Subject_For_Class($link,$class_name,$subject_name){

    $data1[]=select_column_data($link,"school_classes","Id","Name",$class_name);
    $class_id=$data1[0]['Id'];
    
    $data2[]=select_column_data($link,"subjects","Id","Name",$subject_name);
    $subject_id=$data2[0]['Id'];
    $q="Select Total_Marks from class_subjects WHERE Class_Id=$class_id AND Subject_Id=$subject_id";
  
   
   $exe=mysqli_query($link,$q);
   $effect=mysqli_num_rows($exe);
    if($effect==0){
     return false;
    }
    else {
        return true;
    }
     
}


function one_subject_total_marks($link,$class_name,$subject_name){

    $class_id=convert_class_name_to_id($link,$class);
    $subject_id=convert_subject_name_to_id($link,$subject);
    
    $q="Select Total_Marks from class_subjects WHERE Class_Id=$class_id AND Subject_Id=$subject_id";
   
   $exe=mysqli_query($link,$q);
   $total_marks=mysqli_fetch_assoc($exe);
   $effect=mysqli_num_rows($exe);
    if($effect==0){
     return 0;
    }
    else {
        return $total_marks;
    }

    

}

function class_total_marks($link,$class_name){
    $current_class=$class_name;
    $total_marks=0;
    if (Check_Subject_For_Class($link,$current_class, "English")) {
        $marks =  subject_total_marks($link,$current_class,"English");
        $total_marks = $total_marks+$marks;
     }
     if (Check_Subject_For_Class($link,$current_class, "Urdu")) {
         $marks =  subject_total_marks($link,$current_class,"Urdu");
        $total_marks = $total_marks+$marks;
     }
     if (Check_Subject_For_Class($link,$current_class, "Maths")) {
         $marks =  subject_total_marks($link,$current_class,"Maths");
        $total_marks = $total_marks+$marks;
     }
     if (Check_Subject_For_Class($link,$current_class, "Hpe")) {
         $marks =  subject_total_marks($link,$current_class,"Hpe");
        $total_marks = $total_marks+$marks;
     }
     if (Check_Subject_For_Class($link,$current_class, "Nazira")) {
         $marks =  subject_total_marks($link,$current_class,"Nazira");
        $total_marks = $total_marks+$marks;
     }
     if (Check_Subject_For_Class($link,$current_class, "General Science")) {
         $marks =  subject_total_marks($link,$current_class,"General Science");
        $total_marks = $total_marks+$marks;
     }
     if (Check_Subject_For_Class($link,$current_class, "Arabic")) {
         $marks =  subject_total_marks($link,$current_class,"Arabic");
        $total_marks = $total_marks+$marks;
     }
     if (Check_Subject_For_Class($link,$current_class, "Islamyat")) {
         $marks =  subject_total_marks($link,$current_class,"Islamyat");
        $total_marks = $total_marks+$marks;
     }
     if (Check_Subject_For_Class($link,$current_class, "History And Geography")) {
         $marks =  subject_total_marks($link,$current_class,"History And Geography");
        $total_marks = $total_marks+$marks;
     }
     if (Check_Subject_For_Class($link,$current_class, "Computer Science" )) {
         $marks =  subject_total_marks($link,$current_class,"Computer Science");
        $total_marks = $total_marks+$marks; 
     }
     if (Check_Subject_For_Class($link,$current_class, "Mutalia Quran" )) {
         $marks =  subject_total_marks($link,$current_class,"Mutalia Quran");
        $total_marks = $total_marks+$marks;
     }
     if (Check_Subject_For_Class($link,$current_class, "Qirat")) {
         $marks =  subject_total_marks($link,$current_class,"Qirat");
        $total_marks = $total_marks+$marks;
     }
     if (Check_Subject_For_Class($link,$current_class, "Social Study")) {
         $marks =  subject_total_marks($link,$current_class,"Social Study");
        $total_marks = $total_marks+$marks;
     }
     if (Check_Subject_For_Class($link,$current_class, "Pashto")) {
         $marks =  subject_total_marks($link,$current_class,"Pashto");
        $total_marks = $total_marks+$marks;
     }
     if (Check_Subject_For_Class($link,$current_class, "Drawing")) {
         $marks =  subject_total_marks($link,$current_class,"Drawing");
        $total_marks = $total_marks+$marks;
     }
     if (Check_Subject_For_Class($link,$current_class, "Biology")) {
         $marks =  subject_total_marks($link,$current_class,"Biology");
        $total_marks = $total_marks+$marks;
     }
     if (Check_Subject_For_Class($link,$current_class, "Chemistry")) {
         $marks =  subject_total_marks($link,$current_class,"Chemistry");
        $total_marks = $total_marks+$marks;
     }
     if (Check_Subject_For_Class($link,$current_class, "Physics")) {
         $marks =  subject_total_marks($link,$current_class,"Physics");
        $total_marks = $total_marks+$marks;
     }
     return $total_marks;
}

function select_subjects_of_class($class_name){
    global $link;
    // convert class name to class id as table data is in Id from
    $class_id=convert_class_name_to_id($link,$class_name);
    $q="SELECT Subject_Id from class_subjects WHERE Class_Id='$class_id'";
    $exe=mysqli_query($link,$q) or die('Not table to select subject of a class');
    $subjects=array();
    while($exer=mysqli_fetch_assoc($exe)){
            $subject_id=$exer['Subject_Id'];
          $subject=select_column_data($link,"subjects","Name","Id",$subject_id);
          array_push($subjects,$subject);
    }
return $subjects;
  
}



?>


