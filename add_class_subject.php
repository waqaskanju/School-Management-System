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
require_once 'db_connection.php';
require_once 'sand_box.php';
require_once 'config.php';
$link=connect();

if ($SUBJECT_CHANGES=="0") {
    echo '<div class="bg-danger text-center"> Not allowed!! </div>';
    exit;
}

if (isset($_GET['submit'])) {
    $subject_name=$_GET['subject'];
    $school_name=$_GET['school'];
    $class_name=$_GET['class_exam'];
    $total_marks=$_GET['total_marks'];

    $class_id=Convert_Class_Name_To_id($class_name);
    $subject_id=Convert_Subject_Name_To_id($subject_name);
    $school_id=Convert_School_Name_To_id($school_name);

    $q="INSERT INTO class_subjects (School_Id,Class_Id,Subject_Id,Total_Marks)
    VALUES ($school_id,$class_id, $subject_id, $total_marks)";
    $exe=mysqli_query($link, $q) or die('Error in Subject Addittion');
    if ($exe) {
        echo "Subject Added Successfully";
        redirection(1, 'add_class_subject.php');
    } else {
        echo "There is some error in Subject Addition";
    }
}
?>
<?php Page_header('Add Class Subject'); ?>
</head>
<body >
  <div class="bg-warning text-center">
    <h4>Add Subjects to Class</h4>
  </div>
  <?php  require_once 'nav.html';?>
  <aside class="float-end mt-3  p-3">
  <p>
      <a href="delete_class_subject.php" class="btn btn-danger"> Delete Subject</a>
    </p>
    <p>
      <a href="edit_class_subject.php" class="btn btn-warning"> Edit Subject</a>
    </p>
</aside>
  <div class="container">
  
    <form action="#" method="GET">
      <div class="row no-print">
<?php

  $selected_school='';
  $selected_class='';
  $selected_subject='';
  Select_school($selected_school);
  Select_class($selected_class);
?>
  <div>
    <div class="row mt-3">
<?php
  Select_subject($selected_subject);
?>
      <div class="form-group col-md-4">
        <label for="total_marks" class="form-label">Total Marks:</label>
        <input type="number" class="form-control" id="total_marks"
            max="100" min="-1" name="total_marks" value="100"
            placeholder="type total marks of this subject" required>
      </div>
      <div class="col-md-2">
        <button  class="btn btn-primary no-print mt-4" type="submit" name="submit">
          Add Subject
        </button>
</div> <!-- end of row -->
</form>
</div>
<div class="container mt-3">
  <h3>Existing Subject's of Classes</h3>
    <div class="row">
<?php
$school=$SCHOOL_NAME;
$classes_array=School_classes();
foreach ($classes_array as $class) {
    echo "<div class='col-4'>
        <h5> Class $class Subjects </h5>";
    $subjects=Select_Subjects_Of_class($school, $class);
    echo '<ul>';
    for ($i=0; $i<count($subjects); $i++) {
        echo "<li>";
        echo $subjects[$i]['Name'];
        echo "</li>";
    }
    echo "</ul>";
    echo "</div>";
}
?>
  </div>

 </div> <!-- End of main container -->
<?php Page_close(); ?>

