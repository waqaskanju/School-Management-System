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
    $school_name=$_GET['school'];
    $school_id =  Convert_School_Name_To_id($school_name);
    $class_name=$_GET['class_name'];
    $q="INSERT INTO school_classes (`Name`,`School_Id`,`Status`) 
    VALUES ('$class_name',$school_id,'1')";
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
  <div class="container-fluid">
    <form class="p-3">
      <div class='row'>
        <?php Select_school($selected_school); ?>
        <div class="col-sm-6 form-group">
          <label for="class_name" class="form-label">Class Name:</label>
          <input type="text" required placeholder="Type Class Name" 
          class="form-control" name="class_name" id="class_name">
        </div>
      </div>
      <input type="submit" name="submit" class="btn btn-primary mt-3" 
            value="Add Class to School">
    </form>
  </div>

  <div class='container-fluid'>
    <h3>Existing School Classes</h3>
    <div id='exiting-school-classes'>
    </div>
  </div>
  <script type="text/javascript" src="js/add_school_class.js">
<?php Page_close(); ?>