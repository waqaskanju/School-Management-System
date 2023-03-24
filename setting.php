<?php
/**
 * Show Student detail
 * php version 8.1
 *
 * @category Student
 *
 * @package None
 *
 * @author Waqas <waqas@waqaskanju.com>
 *
 * @license http://www.waqaskanju.com/license MIT
 *
 * @link http://www.waqaskanju.com/
 **/
  session_start();
  require_once 'db_connection.php';
  require_once 'sand_box.php';
  require_once 'config.php';
  $link=connect();
  $selected_class=$CLASS_INSERT;
  $selected_school=$SCHOOL_INSERT;
  $mode=$MODE;
?>

<?php Page_header("Setting");

if (isset($_SESSION['user'])) {

    if (isset($_GET['submit'])) {
        $school=$_GET['school'];
        $class=$_GET['class_exam'];
        $permission=$_GET['permission'];

        $q="Update setting SET
    Selected_School='$school', Selected_Class='$class', Allow_Edit='$permission'
    WHERE User_Id=1";

        $exe=mysqli_query($link, $q);
        if ($exe) {
            echo
              "<div class='alert alert-success' role='alert'>
              Values Updated
              </div>
              ";
            header("Refresh:1; url=setting.php");
        } else {
            echo "Values Not Update";
        }
    }
    ?>
    <?php
    if (isset($_GET['Lock_Form'])) {
        $class_name=$_GET['class_exam'];
        $class_id=Convert_Class_Name_To_id($class_name);
        $subject_name=$_GET['subject'];
        $subject_id=Convert_Subject_Name_To_id($subject_name);
        $lock_status=$_GET['lock_status'];

        // For Security Reason it.
        $q="Update class_subjects SET
    Lock_Status='$lock_status'
    WHERE Class_Id='$class_id' AND Subject_Id='$subject_id'";

        $exe=mysqli_query($link, $q);
        if ($exe) {
            echo
              "<div class='alert alert-success' role='alert'>
              Lock Updated
              </div>
              ";
            header("Refresh:1; url=subject_link.php");
        } else {
            echo "Values Not Update";
        }
    }

    // End of session

    ?>
</head>
<body>
<div class="bg-warning text-center">
    <h4>Setting Page</h4>
  </div>
    <?php
    ?>
    <div class="container">
    <form method="GET" action="#">
        <div class="form-row">
           <?php

             Select_class($selected_class);
             Select_school($selected_school);
            ?>

          <div class="col-md-6">
            <select class='form-control' name="permission" >
                <option value="Select Permission"  
                value='none'>Select Permission</option>
                <option value="read"
                <?php  
                if ($mode=="read") { 
                    echo "selected";
                }?>
        >Read</option>
                <option value="Write"
                <?php 
                if ($mode=="write") { 
                    echo "selected"; 
                }
                ?>

                >Write</option>
            </select>
            </div>
                <button type="submit" name="submit" class="btn btn-primary">
                Update School And Class
                </button>
        </div>
    </form>
</div>

<div class="container mt-3">
  <h3>Update Subject Lock</h3>
<form method="GET" action="#">
        <div class="form-row">
           <?php
            $selected_class='';
            $selected_subject='';
             Select_class($selected_class);
             Select_subject($selected_subject);

            ?>

          <div class="col-md-6">
            <select class='form-control' name="lock_status" >
                <option value="Select Lock Status"  value='none'>Select Permission</option>
                <option value="1">Lock</option>
                <?php
                if ($designation=="Principal") {
                    ?>
                <option value="0">Unlock</option>
                <?php  } ?>
             </select>
            </div>
                <button type="submit" name="Lock_Form" class="btn btn-primary">
                Update Lock
                </button>
        </div>
    </form>

</div>
    <?php
} else {
    echo "<h1class='text-danger'> You are not logged in... Redirecting to Login Page</h1>";
    header("Refresh:3; url=login.php");

}
?>
