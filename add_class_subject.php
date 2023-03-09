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
require_once 'db_connection.php';
require_once 'sand_box.php';
require_once 'config.php';
 $link=connect();

if (isset($_GET['submit'])) {
    $subject_name=$_GET['subject'];
    $class_name=$_GET['class_exam'];
    $total_marks=$_GET['total_marks'];

    $class_id=Convert_Class_Name_To_id($class_name);
    $subject_id=Convert_Subject_Name_To_id($subject_name);

    $q="INSERT INTO class_subjects (Class_Id,Subject_Id,Total_Marks)
    VALUES ($class_id, $subject_id, $total_marks)";
    $exe=mysqli_query($link, $q) or die('Error in Subject Addittion');
    if ($exe) {
        echo "Subject Added Successfully";
    } else {
        echo "There is some error in SUbject Addition";
    }
}
?>
<?php Page_header('Register New Student'); ?>
</head>
<body >
  <div class="bg-warning text-center">
    <h4>Add Subjects to Class</h4>
  </div>
  <?php require_once 'nav.html';?>
  <div class="container">
    <div class="form-row">
      <div class="col-md-12 ">
      <div class="row">
        <div class="col-md-12 ">
          <form action="#" method="GET">
            <div class="form-row no-print">
<?php
  $selected_class='';
  $selected_subject='';
  Select_class($selected_class);
  Select_subject($selected_subject);
?>
            </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="total_marks">Total Marks</label>
        <input type="number" class="form-control" id="total_marks"
            max="100" min="-1" name="total_marks" value="100"
            placeholder="type total marks of this subject" required>
      </div>
      <div class="col-md-3">
        <button  class="btn btn-primary no-print mt-4" type="submit" name="submit">
          Submit
        </button>
</form>
</div>
</div>
</div>
<div class="container">
    <div class="row">

<?php
$classes_array=School_classes();
foreach ($classes_array as $class) {
    echo "<div class='col-4'>
        <h5> Class $class Subjects </h5>";
    $subjects=Select_Subjects_Of_class($class);
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

