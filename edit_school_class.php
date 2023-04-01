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
$selected_class=$CLASS_NAME;
$selected_school=$SCHOOL_NAME;
$mode = $MODE;

if ($mode=="read") {
    echo '<div class="bg-danger text-center"> Not allowed!! </div>';
    exit;
}

/* Rules for Naming add under score between two words. */
if (isset($_GET['submit'])) {
    echo $q="Update  school_classes SET Status='$status' WHERE Id='$id'";
    $exe=mysqli_query($link, $q) or
    die('Error in Class Addition '. mysqli_error($link));
    if ($exe) {
          echo "New class added to school";
    } else {
          echo "Error in Insertion";
    }
}
?>
  <?php Page_header('Add Class to School'); ?>
</head>
<body>
<?php 
$url_id= $_GET['id'];
$q="SELECT * from school_classes WHERE Id='$url_id'";
$exe=mysqli_query($link, $q);
$exer=mysqli_fetch_assoc($exe);
$school_id=$exer['School_Id'];
$school_name=Convert_School_Id_To_name($school_id);
$class_name=$exer['Name'];
$status=$exer['Status'];
$Id=$exer['Id'];
?>
<div class="container-fluid">
  <form class="p-3">
    <div class="row">
      <?php Select_school($selected_school); ?>
      <div class="col-sm-6 form-group">
        <label for="class_name" class="form-label">Class Name:</label>
        <input type="text" placeholder="Type Class Name" 
                class="form-control" name="class_name" 
                value="<?php echo $class_name; ?>" id="class_name" required>
      </div>
    <div>
    <div class="row mt-1">
      <div class="col-sm-6 form-group">
        <label for="status" class="form-label">Status:</label>
        <input type="number" class="form-control" name="status" 
               value="<?php echo $status;?>" min="0" max="1" required>
      </div>
      <div class="col-sm-6">
      <input type="hidden" value="<?php echo $id;?>" name="id">
      <input type="submit" name="submit" class="btn btn-primary mt-4" 
            value="Update Class Name">
      </div>
    <div>
    </form>
  </div>

  <div class='container-fluid'>
    <h3>Existing School Classes</h3>
    <div id='exiting-school-classes'>
    </div>
  </div>
<?php Page_close(); ?>