<?php
/**
 * Delete Subject From Class
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
$mode=$MODE;
$designation=$DESIGNATION;
if ($mode=="read" || $designation!=="SST-IT") {
    echo '<div class="bg-danger text-center"> Not allowed!! </div>';
    exit;
}

if (isset($_GET['submit'])) {
    $subject_name=$_GET['subject'];
    $class_name=$_GET['class_exam'];

    $class_id=Convert_Class_Name_To_id($class_name);
    $subject_id=Convert_Subject_Name_To_id($subject_name);

    $q="Update class_subjects SET Status=0 WHERE Class_Id='$class_id'
    AND Subject_Id='$subject_id'";
    $exe=mysqli_query($link, $q) or die('Error in Subject Addittion');
    if ($exe) {
        echo "<div class='text-info'>
                Subject Removed Successfully. Redirecting...
              </div>";
        header('refresh:3; url=delete_class_subject.php');
    } else {
        echo "<div class='bg-danger'>There is some error in Subject Deletion</div>";
    }
}
?>
<?php Page_header('Delete Class Subject'); ?>
</head>
<body >
  <div class="bg-warning text-center">
    <h4>Delete Subjects From Class</h4>

  </div>
  <?php  require_once 'nav.html';?> 
    <p class="float-end mt-3">
      <a href="add_class_subject.php"> Add Subject</a>
    </p>
 
  <div class="container">
    <form action="#" method="GET">
      <div class="row no-print">
        <?php
          $selected_class='';
          $selected_subject='';
          Select_class($selected_class);
          Select_subject($selected_subject);
        ?>
      </div>
      <div class="col-md-3">
        <button  class="btn btn-danger no-print mt-4" type="submit" name="submit">
          Delete
        </button>
    </form>
  </div>
  <div class="container">
  <h2 class="text-danger">
    Click on a subject and it will be deleted or use the above form
  </h2>
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
        $subject_name=$subjects[$i]['Name'];
        echo "<a id='delete_subject' href='delete_class_subject.php?submit=delete&
        subject=".$subject_name."&class_exam=".$class."'>$subject_name</a>";
        echo "</li>";
    }
    echo "</ul>";
    echo "</div>";
}
?>
  </div>

 </div> <!-- End of main container -->
<?php Page_close(); ?>

