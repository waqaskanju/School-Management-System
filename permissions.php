<?php
/**
 * Permission
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
if ($PERMISSION_CHANGES!=1) {
    echo '<div class="bg-danger text-center"> Not allowed!! </div>';
    exit;
}

/* Rules for Naming add under score between two words. */
if (isset($_POST['update'])) {

      $student_changes=Get_Permission_value('student_changes');
      $student_changes=Validate_input($student_changes);

      $batch_marks_changes=Get_Permission_value('batch_marks_changes');
      $batch_marks_changes=Validate_input($batch_marks_changes);

      $single_marks_changes=Get_Permission_value('single_marks_changes');
      $single_marks_changes=Validate_input($single_marks_changes);

      $subject_changes=Get_Permission_value('subject_changes');
      $subject_changes=Validate_input($subject_changes);

      $school_changes=Get_Permission_value('school_changes');
      $school_changes=Validate_input($school_changes);

      $marks_lock_changes=Get_Permission_value('marks_lock_changes');
      $marks_lock_changes=Validate_input($marks_lock_changes);

      $permission_changes=Get_Permission_value('permission_changes');
      $permission_changes=Validate_input($permission_changes);

      $user_id=$_POST['user_id'];
      $user_id=Validate_input($user_id);


    $q="Update setting SET 
        Student_Changes=$student_changes,
        Batch_Marks_Changes=$batch_marks_changes,
        Single_Marks_Changes=$single_marks_changes,
        Subject_Changes=$subject_changes,
        School_Changes=$school_changes,
        Marks_Lock_Changes=$marks_lock_changes,
        Permission_Changes=$permission_changes  
        WHERE User_Id='$user_id'";
    
    $exe=mysqli_query($link, $q) or
    die('Error in Permission Updation '. mysqli_error($link));
    if ($exe) {
      // change in permission log
      Save_Log_data($q);
          echo "Permission updated";
    } else {
          echo "Error in Permission Updation";
    }
}
?>
  <?php Page_header('Edit Permission'); ?>
</head>
<body>
<?php 

if (isset($_REQUEST['select'])) {
    $user_id=$_REQUEST['user_id'];
    $user_id=Validate_input($user_id);
    $q="SELECT * from setting WHERE user_id='$user_id'";
    $exe=mysqli_query($link, $q);
    $exer=mysqli_fetch_assoc($exe);
    $student_changes=$exer['Student_Changes'];
    $batch_marks_changes=$exer['Batch_Marks_Changes'];
    $single_marks_changes=$exer['Single_Marks_Changes'];
    $subject_changes=$exer['Subject_Changes'];
    $school_changes=$exer['School_Changes'];
    $marks_lock_changes=$exer['Marks_Lock_Changes'];
    $permission_changes=$exer['Permission_Changes'];
    ?>
    <div class="container-fluid">
      <?php include_once 'nav.html'; ?>
  <h3 class="text-center bg-warning">Change Permissions</h3>
  <form class="p-3" method="POST" action="#">
    <div class="row mb-3">
      <div class="form-check form-switch col-4">
        <input class="form-check-input" type="checkbox" name="student_changes" 
             role="switch" value="1" 
             <?php if ($student_changes==1) echo "checked";?> >
        <label class="form-check-label">Student Changes</label>
      </div>
      <div class="form-check form-switch col-4">
        <input class="form-check-input" type="checkbox" name="batch_marks_changes" 
             role="switch" value="1" 
             <?php if ($batch_marks_changes==1) echo "checked";?> >
        <label class="form-check-label">Batch Marks Changes</label>
      </div>
      <div class="form-check form-switch col-4">
        <input class="form-check-input" type="checkbox" name="single_marks_changes" 
             role="switch" value="1" 
             <?php if ($single_marks_changes==1) echo "checked";?> >
        <label class="form-check-label">Single Marks Changes</label>
      </div>
    </div> <!-- end of row -->
    <div class="row mb-3">
    <div class="form-check form-switch col-4">
        <input class="form-check-input" type="checkbox" name="subject_changes" 
             role="switch" value="1" 
             <?php if ($subject_changes==1) echo "checked";?>>
        <label class="form-check-label">Subject Changes</label>
      </div>
      <div class="form-check form-switch col-4">
        <input class="form-check-input" type="checkbox" name="school_changes" 
             role="switch" value="1" 
             <?php if ($school_changes==1) echo "checked";?>>
        <label class="form-check-label">School Changes</label>
      </div>
      <div class="form-check form-switch col-4">
        <input class="form-check-input" type="checkbox" name="marks_lock_changes" 
             role="switch" value="1" 
             <?php if ($marks_lock_changes==1) echo "checked";?> >
        <label class="form-check-label">Marks Lock Changes</label>
      </div>
    </div> <!-- end of row -->
    <div class="row mb-3">
    <div class="form-check form-switch col-4">
        <input class="form-check-input" type="checkbox" name="permission_changes" 
             role="switch" value="1" 
             <?php if ($permission_changes==1) echo "checked";?>>
        <label class="form-check-label">Permission Changes</label>
      </div>
      <div class="col-4">
        <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
        <input type="submit" name="update" value="Update" 
               class="btn btn-primary mt-4">
      </div>
    </div> <!-- row end -->
  </form>
</div>

<?php  } ?>


  
  
<div id="existing_employees" class="container-fluid bg-white">
</div>
<script type="text/javascript" src="js/select_employees.js">
<?php Page_close(); ?>