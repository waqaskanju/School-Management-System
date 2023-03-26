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
session_start();
require_once 'db_connection.php';
require_once 'sand_box.php';
require_once 'config.php';
$link=connect();
$selected_class=$CLASS_INSERT;
$selected_school=$SCHOOL_INSERT;
$mode = $MODE;

if ($mode=="read") {
    echo '<div class="bg-danger text-center"> Not allowed!! </div>';
    exit;
}

/* Rules for Naming add under score between two words. */
if (isset($_GET['submit'])) {
    $school_name=$_GET['school'];
    $school_id =  Convert_School_Name_To_id($school_name);
    $class_name=$_GET['class_name'];
    $q="INSERT INTO school_classes (`Name`,`School_Id`,`Status`) 
    VALUES ('$class_name',$school_id,'1')";
    $exe=mysqli_query($link, $q);
    if ($exe) {
          echo "New school added";
    } else {
          echo "Error in Insertion";
    }
}
?>
  <?php Page_header('Add Class to School'); ?>
</head>
<body>
  <form>
    <?php Select_school($selected_school); ?>
    <input type="text" name="class_name">
    <input type="submit" name="submit" value="Add Class to School">
</form>
<?php Page_close(); ?>