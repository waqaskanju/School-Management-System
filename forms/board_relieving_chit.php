<?php
/**
 * Board Relieving chit
 * php version 8.1
 *
 * @category Site
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
require_once 'sand_box.php';
$link=$LINK;

// if ($SUBJECT_CHANGES!=1) {
//     echo '<div class="bg-danger text-center"> Not allowed!! </div>';
//     exit;
// }

/* Rules for Naming add under score between two words. */
if (isset($_GET['submit'])) {
    // $subject_name=$_GET['subject_name'];
    // $subject_name=Validate_input($subject_name);
    // $q="INSERT INTO subjects (`Name`,`Status`) VALUES ('$subject_name','1')";
    // $exe=mysqli_query($link, $q);
    // if ($exe) {
    //     echo "<div class='alert-success'>New Subject added</div>";
    //     redirection(1, 'add_subject.php');
    // } else {
    //     echo "Error in Subject Insertion";
    // }
    
}
?>
  <?php Page_header('Relieving Chit'); ?>
</head>
<body class="background">
<?php require_once 'nav.html';?>
<div class="container-fluid">
  <form method="GET" class="p-3" action="#">
    <div class="row bg-white mt-1 p-3">    
      <div class="form-group col-3">
        <label for="teacher_name" class="form-label">Name:</label>
        <input type="text" name="teacher_name" id="teacher_name" 
        class="form-control" required>
      </div>
      <div class="form-group col-4">
        <label for="teacher_name" class="form-label">Designation:</label>
        <input type="text" name="teacher_name" id="teacher_name" 
        class="form-control" required>
      </div>
      <div class="form-group col-4">
        <label for="teacher_name" class="form-label">BPS:</label>
        <input type="text" name="teacher_name" id="teacher_name" 
        class="form-control" required>
      </div>
      <div class="form-group col-4">
        <label for="teacher_name" class="form-label">Appointed As:</label>
        <input type="text" name="teacher_name" id="teacher_name" 
        class="form-control" required>
      </div>
      <div class="form-group col-4">
        <label for="teacher_name" class="form-label">Station Name:</label>
        <input type="text" name="teacher_name" id="teacher_name" 
        class="form-control" required>
      </div>
      <div class="form-group col-4">
        <label for="teacher_name" class="form-label">Center No</label>
        <input type="text" name="teacher_name" id="teacher_name" 
        class="form-control" required>
      </div>
      <div class="form-group col-4">
        <label for="teacher_name" class="form-label">Board Notification No</label>
        <input type="text" name="teacher_name" id="teacher_name" 
        class="form-control" required>
      </div>
      <div class="form-group col-4">
        <label for="teacher_name" class="form-label">Board Notification Date</label>
        <input type="text" name="teacher_name" id="teacher_name" 
        class="form-control" required>
      </div>
      <div class="form-group col-4">
        <label for="teacher_name" class="form-label">Date from Which Relieved</label>
        <input type="text" name="teacher_name" id="teacher_name" 
        class="form-control" required>
      </div>
      <div class="col-1">
        <input type="submit" name="submit" value="Save" 
        class="btn btn-primary mt-4">
      </div>
    </div>
  </form>
</div>

<div class="container-fluid">
<h3>Existing  Subjects</h3>
<p class="text-white">Click on Subject Name to Edit</p>
  <div id="existing_subjects" class="bg-white">
  </div>
</div>
<script src="js/select_subjects.js">
<?php Page_close(); ?>