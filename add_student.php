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
$mode=$MODE;
$designation=$DESIGNATION;
if ($mode=="read" || $designation!=="SST-IT") {
  echo '<div class="bg-danger text-center"> Not allowed!! </div>';
  exit;
}
if (isset($_SESSION['user'])) {
$selected_class=$CLASS_INSERT;
$selected_school=$SCHOOL_INSERT;



/* Rules for Naming add under score between two words. */
if (isset($_GET['submit'])) {
    /* First letter of variable is in lower case */
    $roll_no=$_GET['roll_no'];
    $name=$_GET['name'];
    $fname=$_GET['fname'];
    $school=$_GET['school'];
    $class=$_GET['class_exam'];
    $mobile_no=$_GET['mobile_no'];
    $father_cnic=$_GET['fcnic'];
    $form_b=$_GET['formb'];

    /* If data birth is empty 1-Jan-1900 will be added as default value.*/
    $dob=$_GET['dob'];
    if ($dob=='') {
         $default='01/01/1900';
         $date = strtotime($default);
         $dob=date('Y-m-d', $date);
    }
    /* If data of admission is empty Today's Date will be added as default value.*/

    if ($school!=="GHSS Chitor") {
        $admission_no=$roll_no;
    } else {
        $admission_no=$_GET['admission_no'];
    }
    $date_admission=$_GET['date_admission'];
    if ($date_admission=='') {
        $date_admission=date('Y-m-d');
    }

    /* First Letter of Column Name is Capital. */
     $q="INSERT INTO students_info (Roll_No,
                                   Name,
                                   FName,
                                   Dob,
                                   Class,
                                   School,
                                   Admission_No,
                                   Admission_Date,
                                   Mobile_No,
                                   Father_Cnic,
                                   Student_Form_B)
                          VALUES (
                                   '$roll_no',
                                    '$name',
                                    '$fname',
                                    '$dob',
                                    '$class',
                                    '$school',
                                    '$admission_no',
                                     '$date_admission',
                                     '$mobile_no',
                                     '$father_cnic',
                                     '$form_b'
                                    )";
    if ($mode=="write") {
         $exe=mysqli_query($link, $q) or
         die('Error in New Student Data Addition'. mysqli_error($link));

        if (isset($exe)) {
            echo
              "<div class='alert alert-success' role='alert'> Roll No
            $roll_no Data Added Successfully  </div>";
              header("Refresh:1; url=add_student.php");
        } else {
                echo "Error in student data Addition.". mysqli_error($link);
        }
    } else {
        echo '<div class="bg-danger text-center"> Not allowed!! </div>';
    }
}
?>
  <?php Page_header('Register New Student'); ?>
</head>
<!-- get_rollno() check if roll no is already assigned. -->
<body onload=get_rollno() class="background">
  <div class="bg-warning text-center">
    <h4>Register New Student</h4>
  </div>
  <?php require_once 'nav.html';?>
  <div class="container-fluid">

    <form class="p-3" action="#" method="GET" onsubmit=save_rollno()  >
      <div class="row bg-white mt-1 p-3">
        <div class="form-group col-md-4">
          <label for="name" class="form-label">Roll No:</label>
            <span id="aj_result" class="text-danger" ></span>
            <small id="next_rollno" class="text-muted" ></small>
          <input type="number" class="form-control" id="rollno" name="roll_no"
                  placeholder="Type Roll No" min="1" onfocus="next_rollno()"
                  autofocus required onfocusout="check_roll_no_student()">
        </div>
        <div class="form-group col-md-4">
          <label for="name" class="form-label">Name:*</label>
          <input type="text" class="form-control" id="name" name="name"
                  placeholder="Type Name" required>
        </div>
        <div class="form-group col-md-4">
          <label for="fname" class="form-label">Father Name:*</label>
          <input type="text" class="form-control" id="fname"
                  name="fname" placeholder="Type Father Name" required>
        </div>
      </div> <!-- End of row 1  -->
<div class="row mt-1 bg-white p-3">
              <div class="form-group col-md-4">
              <label for="dob" class="form-label">Date of Birth
                <span class="text-muted form-text"> (default 1-1-1900)<span>
              </label>
              <input type="date" class="form-control"
              id="dob" name="dob" placeholder="Type date of birth">
            </div>
            <div class="form-group col-md-4">
              <label for="admission_no" class="form-label">Admission No*</label>
              <input type="number" class="form-control" id="admission_no"
                      name="admission_no" min="0" max="999999" step="1"
                      value="0" placeholder="Type date of admission no" required>
            </div>
               <div class="form-group col-md-4">
              <label for="admission" class="form-label">Admission Date 
                <span class="text-muted form-text">
                (default Today's Date)
                <span>
              </label>
              <input type="date" class="form-control" id="admission"
                     name="date_admission" min="2000" max="2030" step="1"
                     value="2022" placeholder="Type date of admission">
            </div>
 </div> <!-- End of row 2 -->
 <div class="row mt-1 p-3 bg-white">
                <div class="form-group col-md-4">
              <label for="mobile" class="form-label">Mobile No</label>
              <input type="text" class="form-control" maxlength="12" id="mobile"
                     name="mobile_no" value="03" placeholder="Type mobile no" >
            </div>

                 <div class="form-group col-md-4">
              <label for="fcnic" class="form-label">Father CNIC</label>
              <input type="text" class="form-control" id="fcnic" name="fcnic"
              value="15602-" placeholder="Type father cnic no" >
            </div>

                 <div class="form-group col-md-4">
              <label for="formb" class="form-label">Student Form B</label>
              <input type="text" class="form-control" id="formb" name="formb"
              value="15602-" placeholder="Type student form b no" >
            </div>

           </div> <!-- end of row 3-->
          <div class="row mt-1 p-3 bg-white">
           <?php
             Select_class($selected_class);
             Select_school($selected_school);
            ?>
          </div>
            <button type="submit" name="submit" class="btn btn-primary mt-3">
              Save Data
            </button>
          </form>
        </div>
      </div>

    </div>
  <?php 
  
}
  
Page_close(); ?>
