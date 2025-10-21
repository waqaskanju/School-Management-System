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
require_once 'sand_box.php';
$link=$LINK;

if ($STUDENT_CHANGES!=1) {
    echo '<div class="bg-danger text-center"> Not allowed!! </div>';
    exit;
}
    $selected_class=$CLASS_NAME;
    $selected_school=$SCHOOL_NAME;

    /* Rules for Naming add under score between two words. */
if (isset($_POST['submit'])) {
    /* First letter of variable is in lower case */
    $roll_no=$_POST['roll_no'];
    $roll_no=Validate_input($roll_no);
    $name=$_POST['name'];
    $name=Validate_input($name);
    $fname=$_POST['fname'];
    $fname=Validate_input($fname);
    $school=$_POST['school'];
    $school=Validate_input($school);
    $class=$_POST['class_exam'];
    $class=Validate_input($class);
    $mobile_no=$_POST['mobile_no'];
    $mobile_no=Validate_input($mobile_no);
    $father_cnic=$_POST['fcnic'];
    $father_cnic=Validate_input($father_cnic);
    $form_b=$_POST['formb'];
    $form_b=Validate_input($form_b);

    /* If data birth is empty 1-Jan-1900 will be added as default value.*/
    $dob=$_POST['dob'];
    $dob=Validate_input($dob);
    if ($dob=='') {
        $default='01/01/1900';
        $date = strtotime($default);
        $dob=date('Y-m-d', $date);
    }
    /* If data of admission is empty Today's Date will be
       added as default value.*/
        $admission_no_high=$_POST['admission_no_high'];
        $admission_no_high=Validate_input($admission_no_high);
        // if admission no is not written it will become roll no.
        if(!isset($admission_no)) {
          $admission_no_high =$roll_no;
        }

    if ($school!=="GHSS Chitor") {
        $admission_no=$roll_no;
        $admission_no_high=$roll_no;
    } else {
        $admission_no=$_POST['admission_no'];
        $admission_no=Validate_input($admission_no);

    }
        $date_admission=$_POST['date_admission'];
        $date_admission=Validate_input($date_admission);
    if ($date_admission=='') {
          $date_admission=date('Y-m-d');
    }
    $gender=$_POST['gender'];
    $gender=Validate_input($gender);

    $status=$_POST['status'];
    $status=Validate_input($status);

    $class_no=$_POST['class_no'];
    if($class_no==0){
      $class_no=$roll_no;
    }

    $address=$_POST['address'];

    // 0 = Struck off, 1= Active, 2=Graduate 3=SLC.
    $status=Change_Student_Status_To_number($status);


    /* First Letter of Column Name is Capital. */
    $q="INSERT INTO students_info (Roll_No,
                                      Name,
                                      FName,
                                      Dob,
                                      Class,
                                      School,
                                      Admission_No,
                                      Admission_No_High,
                                      Admission_Date,
                                      Mobile_No,
                                      Gender,
                                      Status,
                                      Class_No,
                                      Address,
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
                                        '$admission_no_high',
                                        '$date_admission',
                                        '$mobile_no',
                                        '$gender',
                                        '$status',
                                        '$class_no',
                                        '$address',
                                        '$father_cnic',
                                        '$form_b'
                                        )";
    $records=check_rows_effected(
        'Admission_No', 'students_info', 'Admission_No', $admission_no
    );
    if ($records==0) {
        $exe=mysqli_query($link, $q) or
        die('Error in New Student Data Addition'. mysqli_error($link));

        if (isset($exe)) {
          Save_Log_data($q);
          $msg="$roll_no Data Added Successfully";
          $error_type="success text-center";
          show_alert($msg, $error_type);
        } else {
                echo "Error in student data Addition.". mysqli_error($link);
        }
    }
}
?>
    <?php Page_header('Register New Student'); ?>
</head>
<!-- get_rollno() check if roll no is already assigned. -->
<body onload=get_rollno() class="background">
    <?php require_once 'nav.html';?>
  <div class="container-fluid">
    <div class="bg-warning text-center">
      <h4>Register New Student</h4>
    </div>
  </div>

  <div class="container-fluid">

    <form class="p-3" action="#" method="POST" onsubmit="return save_rollno(event)"  >
      <div class="row bg-white mt-1 p-3">
        <div class="form-group col-md-4">
          <label for="name" class="form-label">Roll No:</label>
            <span id="aj_result" class="text-danger" ></span>
            <small id="next_rollno" class="text-muted" ></small>
          <input type="number" class="form-control" id="rollno" name="roll_no"
                  placeholder="Type Roll No" tabindex="0" min="1"
                  autofocus required onfocusout="check_roll_no_student()">
        </div>
        <div class="form-group col-md-4">
          <label for="name" class="form-label">Name:*</label>
          <input type="text" class="form-control" id="name" name="name"
                  placeholder="Type Name" tabindex="1" required>
        </div>
        <div class="form-group col-md-4">
          <label for="fname" class="form-label">Father Name:*</label>
          <input type="text" class="form-control" id="fname"
                  name="fname" placeholder="Type Father Name" tabindex="2" required>
        </div>
      </div> <!-- End of row 1  -->
<div class="row mt-1 bg-white p-3">

            <div class="form-group col-md-4">
              <label for="admission_no" class="form-label">Admission No*
              <span class="text-muted form-text">
                (default Roll No)
                <span>
                <span class="text-danger" id="check_duplicate"></span></label>
              <input type="number" class="form-control" id="admission_no"
                     name="admission_no" min="0" max="999999" step="1"
                     value="0" placeholder="Type date of admission no"
                     onfocusout="check_admission_no()" required >
            </div>
            <div class="form-group col-md-4">
              <label for="admission_no_high" class="form-label">Admission No High*
              <span class="text-muted form-text">
                (default Roll No)
                <span>
                <span class="text-danger" id="check_duplicate_high"></span></label>
              <input type="number" class="form-control" id="admission_no_high"
                     name="admission_no_high" min="0" max="999999" step="1"
                     value="0" placeholder="Type high admission no"
                     onfocusout="check_admission_no_high()" required>
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
  <div class="row mt-1 bg-white p-3">
            <div class="form-group col-md-4">
              <label for="dob" class="form-label">Date of Birth
                <span class="text-muted form-text"> (default 1-1-1900)<span>
              </label>
              <input type="date" class="form-control"
              id="dob" name="dob" placeholder="Type date of birth">
            </div>
            <div class="form-group col-md-4">
              <label for="class_no" class="form-label">Class No
                <span class="text-muted form-text"> (default roll no)<span>
              </label>
              <input type="number" class="form-control"
              id="class_no" value="0" name="class_no" placeholder="Type class_no" tabindex="3" accesskey="C">
            </div>
            <div class="form-group col-md-4">
              <label for="address" class="form-label">Address
                <span class="text-muted form-text"> <span>
              </label>
              <input type="text" class="form-control"
              id="address" name="address" placeholder="Type address">
            </div>
 </div> <!-- End of row 3 -->
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
             Select_school($selected_school);
             Select_class($selected_class);
            ?>

          </div>
          <div class="row mt-1 p-3 bg-white">
          <div class="form-group col-md-4">
            <label for="gender" class="form-label">Gender</label>
              <div class="form-check">
                <input class="form-check-input" type="radio"
                name="gender" value="Male"
                id="male_id" checked >
                <label class="form-check-label" for="male_id">Male</label>
              </div>
            <div class="form-check">
              <input class="form-check-input" type="radio"
              name="gender" value="Female"
              id="female_id" >
              <label class="form-check-label" for="female_id">Female</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio"
              name="gender" value="Prefer Not To Say"
              id="prefer_not_to_say" >
              <label class="form-check-label" for="prefer_not_to_say">Prefer Not To Say</label>
            </div>
          </div>
          <div class="form-group col-md-4">
            <label for="status" class="form-label">Status</label>
              <div class="form-check">
                <input class="form-check-input" type="radio"
                name="status" value="Active"
                id="active_id" checked >
                <label class="form-check-label" for="active_id">Active</label>
              </div>
            <div class="form-check">
              <input class="form-check-input" type="radio"
              name="status" value="Struck Off"
              id="struck_off_id" >
              <label class="form-check-label" for="struck_off_id">Struck Off</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio"
              name="status" value="Graduate"
              id="graduate" >
              <label class="form-check-label" for="graduate">Graduate</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio"
              name="status" value="SLC"
              id="slc" >
              <label class="form-check-label" for="slc">SLC</label>
            </div>
          </div>
          </div>
            <button type="submit" name="submit" class="btn btn-primary mt-3">
              Save Data
            </button>
          </form>
        </div>
      </div>

    </div>
    <?php

    Page_close(); ?>
