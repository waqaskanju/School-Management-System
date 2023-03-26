<?php
/**
 * Add  All Subjects Marks of Students
 * php version 8.1
 *
 * @category Exam
 *
 * @package None
 *
 * @author Waqas <admin@waqaskanju.com>
 *
 * @license http://www.waqaskanju.com/license MIT
 *
 * @link http://www.waqaskanju.com
 **/
require_once 'db_connection.php';
require_once 'sand_box.php';
require_once 'config.php';
?>
<?php Page_header('View Locked Subjects'); ?>
</head>
<body>
  <div class="bg-warning text-center">
    <h4>View Locked Subjects</h4>
  </div>
  <?php require_once 'nav.html';?>
  <div class="container mt-3">
    <form action="#" method="GET">
        <div class="row no-print">
          <?php
            $selected_class='';
            global $SCHOOL_NAME;
            $selected_school=$SCHOOL_NAME;
            Select_school($selected_school);
            Select_class($selected_class);
            ?>
        </div>
        <button class="no-print btn btn-primary mt-3" type="submit" name="submit">
          Show Locked Subjects
        </button>
    </form>
  </div>
<?php
if (isset($_GET['submit'])) {
    $school_name=$_GET['school'];
    $class_name=$_GET['class_exam'];
    $school_id=Convert_School_Name_To_id($school_name);
    $class_id=Convert_Class_Name_To_id($class_name);
    $q="SELECT Subject_Id from class_subjects
    WHERE Status='1' AND Lock_Status='1' AND Class_Id='$class_id' AND
     School_Id='$school_id'";
    $exe=mysqli_query($link, $q);
    $effect=mysqli_num_rows($exe);
    if ($effect==0) {
        echo "<div class='text-danger text-center'>No Unlock Subjects available </div>";
    } else {
        echo "<ul>";
        while ($exer=mysqli_fetch_assoc($exe)) {
                $subject_id=$exer['Subject_Id'];
                $subject_name=Select_Column_data(
                    'subjects', "Name", "Id", $subject_id
                );
                echo "<li>".$subject_name['Name']."</li>";
        }
        echo "</ul>";
    }
}
?>
</div>


<?php Page_close(); ?>

