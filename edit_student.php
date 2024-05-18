<?php
/**
 * Edit Student Details.
 * php version 8.1
 *
 * @category Student
 *
 * @package None
 *
 * @author Waqas <abc@examp.com>
 *
 * @license http://www.abc.com MIT
 *
 * @link None
 **/
session_start();
require_once 'sand_box.php';
$link=$LINK;
Page_header('Edit Student');

if ($STUDENT_CHANGES=="0") {
    echo '<div class="bg-danger text-center"> Not allowed!! </div>';
    exit;
}

if (isset($_POST['update'])) {
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

            $dob=$_POST['dob'];
            $dob=Validate_input($dob);
    if ($dob=='') {
        $default='01/01/1900';
        $date = strtotime($default);
        $dob = date('Y-m-d', $date);
    }
            $admission_no=$_POST['admission_no'];
            $admission_no=Validate_input($admission_no);

            $admission_no_high=$_POST['admission_no_high'];
            $admission_no_high=Validate_input($admission_no_high);

            $date_admission=$_POST['date_admission'];
            $date_admission=Validate_input($date_admission);

    if ($date_admission=='') {
        $default='01/01/1900';
        $date = strtotime($default);
        $date_admission=date('Y-m-d', $date);
    }
            $mobile_no=$_POST['mobile_no'];
            $mobile_no=Validate_input($mobile_no);

            $father_cnic=$_POST['fcnic'];
            $father_cnic=Validate_input($father_cnic);

            $form_b=$_POST['formb'];
            $form_b=Validate_input($form_b);

            $status=$_POST['status'];
            $status=Validate_input($status);

            // 0 = Struck off, 1= Active, 2=Graduate.
            $status=Change_Student_Status_To_number($status);

            $roll_no_d=$_POST['roll_no_d'];
            $roll_no_d=Validate_input($roll_no_d);

            $gender=$_POST['gender'];
            $gender=Validate_input($gender);

            $class_no=$_POST['class_no'];
            $class_no=Validate_input($class_no);

            $address=$_POST['address'];
            $address=Validate_input($address);

            $graduation_year=$_POST['graduation_year'];
            $graduation_year=Validate_input($graduation_year);

       echo    $q="UPDATE students_info SET Name = '$name',
                                             FName='$fname',
                                             School='$school',
                                             Class='$class',
                                             Dob='$dob',
                                             Admission_No='$admission_no',
                                             Admission_No_High='$admission_no_high',
                                             Admission_Date='$date_admission',
                                             Mobile_No='$mobile_no',
                                             Father_Cnic = '$father_cnic',
                                             Student_Form_B =  '$form_b',
                                             Roll_No='$roll_no_d',
                                             Gender='$gender',
                                             Class_No='$class_no',
                                             Graduation_Year='$graduation_year',
                                             Status='$status',
                                             Address='$address'
                                            WHERE Roll_No=$roll_no";

        $exe=mysqli_query($link, $q) or die('error'.mysqli_error($link));
    if ($exe) {
      Save_Log_data($q);
	      // updated successful message can not be shown. as there is very less time
        // when data is submitted and page is refreshed by change_location function. 
      Change_location("edit_student.php?roll_no=$roll_no");
        $message= $roll_no." Updated Successfully";
        $alert_type='success';
        Show_alert($message, $alert_type);
    } else {
        echo 'error in submit';
    }

}

?>
</head>
<body class="background">
<?php  require_once 'nav.html';?>
  <div class="container-fluid">
    <div class="bg-warning text-center">
      <h4>Edit Student Information</h4>
    </div>
    <form action="#" method="GET">
      <div class="row m-3">
        <div class="col-sm-2">
          <label for="name" class="h5 form-label">
            Type roll number to load data:
          </label>
        </div>
        <div class="col-sm-4">
          <input type="number" class="form-control" id="rollno"
                  name="roll_no" required placeholder="Type Roll No" min="1">
        </div>
        <div class="col-lg-2">
          <input type="submit" name="submit"
             value="Search" class="btn btn-primary">
        </div>
      </div> <!-- end of row -->
    </form>
  </div>   <!-- End of Container -->


      <?php
        /* Rules for Naming add under score between two words. */
        if (isset($_GET['submit'])) {

            $roll_no=$_GET['roll_no'];
            $roll_no=Validate_input($roll_no);

            $q="Select * from students_info WHERE Roll_NO=".$roll_no;
            $qd=mysqli_query($link, $q);
            if (mysqli_num_rows($qd)==0) {
                echo '<h5 class="text-danger container">
                          Roll Number Not Found! Try Again.
                      </h5>';
                exit();
            }
            $data=mysqli_fetch_assoc($qd);

            /* First letter of variable is in lower case */
            $roll_no=$data['Roll_No'];
            $name=$data['Name'];
            $fname=$data['FName'];
            $school=$data['School'];
            $class=$data['Class'];
            $dob=$data['Dob'];

            $class_no=$data['Class_No'];
            $address=$data['Address'];

            $admission_no=$data['Admission_No'];
            $admission_no_high=$data['Admission_No_High'];
            $date_admission=$data['Admission_Date'];
            $mobile_no=$data['Mobile_No'];
            $father_cnic=$data['Father_Cnic'];
            $form_b=$data['Student_Form_B'];
            $status=$data['Status'];
            $gender=$data['Gender'];
            $graduation_year=$data['Graduation_Year'];
            ?>

    <div class="container-fluid">
      <h5 class="bg-info p-2 text-center">
        Data of Roll No <?php echo $roll_no;?>
      </h5>
    <form class="p-3" action="#" method="POST" >
        <div class="row mt-1 p-3 bg-white">   <!-- Row 1 start -->
            <!-- Hidden roll no -->
          <input type="hidden" class="form-control" id="rollno" name="roll_no"
                 placeholder="type Roll No" min="1"
                 value="<?php echo $roll_no  ?>" autofocus required
                 onfocusout="check_roll_no_student()">
                 <!-- Column 1 -->
          <div class="form-group col-md-4">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name"
                   value="<?php echo $name  ?>" placeholder="type Name"required>
          </div>
            <div class="form-group col-md-4">
              <label for="fname" class="form-label">Father Name:</label>
              <input type="text" class="form-control" id="fname" name="fname"
              value="<?php echo $fname ?>" placeholder="type Father Name" required>
            </div>
              <div class="form-group col-md-4">
              <label for="dob" class="form-label">Date of Birth</label>
              <input type="date" class="form-control" id="dob" name="dob"
              value="<?php echo $dob  ?>" placeholder="type date of birth">
            </div>
          </div> <!-- End of Row 1 -->
          <div class="row mt-1 p-3 bg-white">
            <div class="form-group col-md-4">
              <label for="admission_no" class="form-label">Admission No
              <span class="text-muted form-text"> (default roll no)<span>
              </label>
              <input type="number" class="form-control" id="admission_no"
              name="admission_no" value="<?php echo $admission_no  ?>"
              placeholder="middle school admission no">
            </div>
            <div class="form-group col-md-4">
              <label for="admission_no_high" class="form-label">Admission No High*
                <span class="text-danger" id="check_duplicate_high"></span>
                <span class="text-muted form-text"> (default roll no)<span>
              </label>
              <input type="number" class="form-control" id="admission_no_high"
                     name="admission_no_high" min="0" max="999999" step="1"
                     value="<?php echo $admission_no_high;  ?>" placeholder="Type high admission no"
                     onfocusout="check_admission_no_high()" required>
            </div>
            <div class="form-group col-md-4">
              <label for="admission" class="form-label">Admission Date</label>
              <input type="date" class="form-control" id="admission"
                     name="date_admission"  value="<?php echo $date_admission  ?>"
                     placeholder="type date of admission">
            </div>
          </div> <!-- End of Row 2-->
          <div class="row mt-1 p-3 bg-white">
            <div class="form-group col-md-4">
              <label for="mobile" class="form-label">Mobile No</label>
              <small id="mobile_error" class="text-danger"> </small>
              <input type="text" class="form-control" id="mobile" name="mobile_no"
                     value="<?php echo $mobile_no  ?>" placeholder="type mobile no"
                     onfocusout="check_mobile_no_length()">
            </div>
            <div class="form-group col-md-4">
              <label for="class_no" class="form-label">Class No
                <span class="text-muted form-text"> (default roll no)<span>
              </label>
              <input type="number" class="form-control"
              id="class_no" name="class_no" placeholder="Type class_no"
              value="<?php echo $class_no  ?>"
              >
            </div>
            <div class="form-group col-md-4">
              <label for="address" class="form-label">Address
                <span class="text-muted form-text"> <span>
              </label>
              <input type="text" class="form-control"
              id="address" value="<?php echo $address  ?>" name="address" placeholder="Type address">
            </div>
          </div> <!-- End of Row 3 -->
          <div class="row mt-1 p-3 bg-white">
            <div class="form-group col-md-4">
              <label for="fcnic" class="form-label">Father CNIC </label>
              <small id="father_cnic_error" class="text-danger"> </small>
              <input type="text" class="form-control" id="fcnic" name="fcnic"
                      value="<?php echo $father_cnic ?>"
                       placeholder="type father cnic no" onfocusout="check_father_cnic_length()">
            </div>
            <div class="form-group col-md-4">
              <label for="formb" class="form-label"> Student Form B</label>
              <small id="formb_error" class="text-danger"> </small>
              <input type="text" class="form-control" id="formb" name="formb"
                     value="<?php echo $form_b ?>"
                     placeholder="type student form b no" onfocusout="check_student_cnic_length()" >
            </div>
            <div class="form-group col-md-4">
            <label for="status" class="form-label">Status</label>
              <div class="form-check">
                <input class="form-check-input" type="radio"
                name="status" value="Active"
                id="active_id" <?php if ($status==1) { echo "checked";
                               }?> >
                <label class="form-check-label" for="active_id">Active</label>
              </div>
            <div class="form-check">
              <input class="form-check-input" type="radio"
              name="status" value="Struck Off"
              id="struck_off_id" <?php if ($status==0) { echo "checked";
                                 }?> >
              <label class="form-check-label" for="struck_off_id">Struck Off</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio"
              name="status" value="Graduate" <?php if ($status==2) { echo "checked";
                                             }?>
              id="graduate" >
              <label class="form-check-label" for="graduate">Graduate</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio"
              name="status" value="SLC"
              id="slc_id" <?php if ($status==3) { echo "checked";
                                 }?> >
              <label class="form-check-label" for="slc_id">SLC</label>
            </div>
            </div>
          </div> <!-- End of Row 3 -->
          <input type="hidden" name="school" value="<?php echo $school ?>">
          <input type="hidden" name="class" value="<?php echo $class ?>">
          <div class="row mt-1 p-3 bg-white">  <!-- Row 4 started -->
            <?php
            $selected_class=$class;
            $selected_school=$school;
             Select_class($selected_class);
             Select_school($selected_school);
            ?>
          </div>
          <div class="row mt-1 p-3 bg-white">
          <div class="form-group col-md-4">
              <label for="roll_no" class="form-label">Roll No</label>
              <input type="number" class="form-control" id="roll_no" name="roll_no_d"
                     value="<?php echo $roll_no  ?>" placeholder="type Roll no" >
            </div>
            <div class="form-group col-md-4">
            <label for="gender" class="form-label">Gender</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="Male"
                id="male_id" <?php if ($gender=="Male") { echo "checked";
                             } ?> >
                <label class="form-check-label" for="male_id">Male</label>
              </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" value="Female"
              id="female_id" <?php if ($gender=="Female") { echo "checked";
                             } ?> >
              <label class="form-check-label" for="female_id">Female</label>
            </div>
          </div>
          <!-- Graduation year  -->
          <div class="form-group col-md-4">
              <label for="graduation_year" class="form-label">Graduation Year</label>
              <input type="number" class="form-control" id="graduation_year" name="graduation_year"
                     value="<?php echo $graduation_year  ?>" placeholder="Gra year" >
            </div>
        </div>

          <button type="submit" name="update" class="btn btn-primary mt-3">
              Update
            </button>
          </form>
        <?php }  ?>
    </div>  <!-- End of container fluid -->

    <!-- Load Students Start -->
    <div class="container bg-white" id="show_selected_class_students">
    </div>
    <!-- Load Student End -->
 <script type="text/javascript" src="js/load_students.js">
  <?php Page_close(); ?>
