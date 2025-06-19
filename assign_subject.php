<?php
/**
 * Add New Students to CMS
 * php version 8.1
 *
 * @category Student
 *
 * @package None
 *
 * @author Waqas Ahmad <waqaskanju@gmail.com>
 *
 * @license http://www.waqaskanju.com/license MIT
 *
 * @link http://www.waqaskanju.com
 **/
session_start();
require_once 'sand_box.php';
$link=$LINK;

// if the log in person has no permission for this page. exit.
if ($SUBJECT_CHANGES!=1) {
    echo '<div class="bg-danger text-center"> Not allowed!! </div>';
    exit;
}

// After submission of form   Subject,class, teacher name this section will add it in database.
if (isset($_POST['submit'])) {
    $subject_name=$_POST['subject'];
    $subject_name=Validate_input($subject_name);

    $class_name=$_POST['class_exam'];
    $class_name=Validate_input($class_name);

    $teacher_name=$_POST['teacher_name'];
    $teacher_name=Validate_input($teacher_name);

    $class_id=Convert_Class_Name_To_id($class_name);
    $subject_id=Convert_Subject_Name_To_id($subject_name);
    $teacher_id=Convert_Teacher_Name_To_id($teacher_name);

    $check_subject="SELECT Id from class_subjects
    WHERE Class_Id=$class_id AND Subject_Id=$subject_id";
    $exe=mysqli_query($link, $check_subject);
    $exer=mysqli_fetch_assoc($exe);
    $effected_rows=mysqli_num_rows($exe);
    if ($effected_rows==0) {
        echo "Subject No Found. Please Add it in Add_Class_Subject Page.";
    } else if ($effected_rows>=1) {
        $class_subject_id=$exer['Id'];
        //check if that subject is already assigned.
          $no_of_records_found=Check_Rows_effected('Id','subject_teacher','Class_Subject_Id',$class_subject_id);
          if($no_of_records_found==1){
            echo "The subject is already assigned. Try Updating.<a href='../update_assign_subject.php'> Update Subject Teacher </a>";
          } else {
                  
          
          $q2="INSERT INTO subject_teacher (Class_Subject_Id,Teacher_Id)
              VALUES ($class_subject_id, $teacher_id)";
          $exe2=mysqli_query($link, $q2) or die('Error in Employee Subject Addittion');
          if ($exe2) {
              echo "Teacher Assigned Successfully";
          } else {
              echo "There is some error in Teacher Assignment";
          }
        }
    } else {
        echo "There is Duplication. Kindly Correct. Code Bug";
    }

}
?>
    <?php Page_header('Assign Subject'); ?>
    </head>

    <body >
  <div class="bg-warning text-center">
    <h4>Add Subject to Class</h4>
  </div>

  <?php  require_once 'nav.html';?>
  <aside class="float-end mt-3  p-3">
    Additional Links
  <p>
      <a href="update_assign_subject.php" class="btn btn-info"> Update</a>
    </p>
</aside>
<?php
// Left empty so that onchange event can be applied.
$selected_class='';
$selected_subject='';
$selected_teacher='';
?>
  <div class="container-fluid">
    <form action="#" method="POST">
      <div class="row no-print">
      <?php
        Select_class($selected_class);
        Select_subject($selected_subject);
        ?>
      </div>
      <div class="row">
        <?php Select_teacher($selected_teacher); ?>
        <div class="col-2">
          <button  class="btn btn-primary no-print mt-4" type="submit" name="submit">
            Assign Subject
          </button>
        </div>
      </div>
    </form>
  </div>
<script>

function view_existing_subjects(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       document.getElementById('subject_name').innerHTML=this.responseText;
    }
  };

  let school_name='<?php echo $SCHOOL_NAME;?>';
  let class_name=document.getElementById("class_name").value;
  xhttp.open("GET", "scripts/select_class_subjects.php?school="+school_name+"&class="+class_name, true);
  xhttp.send();
}
</script>


<h4> Already Assigned </h4>
<?php

$q="Select employees.Name as Teacher_Name, school_classes.Name as Class_Name,
subjects.Name as Subject_Name, schools.Name as School_Name 
from subject_teacher 
INNER JOIN employees 
ON subject_teacher.Teacher_Id=employees.Id
INNER JOIN class_subjects
ON subject_teacher.Class_Subject_Id=class_subjects.Id
INNER JOIN subjects
ON class_subjects.Subject_Id=subjects.Id
INNER JOIN school_classes
ON class_subjects.Class_Id=school_classes.Id
INNER JOIN schools
ON class_subjects.School_Id=schools.Id WHERE class_subjects.School_Id=$selected_school_id order by Class_Name";

$exe=mysqli_query($link, $q);
echo "<table><tr><th>Teacher Name</th><th>Class Name</th><th>Subject Name</th> <th>School Name</th></tr>";
while($exer=mysqli_fetch_assoc($exe)){
 echo '<tr> 
 <td>' . $teacher_name=$exer['Teacher_Name'] . '</td>
 <td>' . $class_name=$exer['Class_Name'] . '</td>
 <td>' . $subject_name=$exer['Subject_Name'] . '</td>
 <td>' . $school_name=$exer['School_Name'] . '</td></tr>';
}
echo '</table>';
?>
<?php Page_close(); ?>

