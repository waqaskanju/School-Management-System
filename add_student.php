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
require_once 'db_connection.php';
require_once 'sand_box.php';
require_once 'config.php';
$link=connect();
$selected_class=$CLASS_INSERT;
$selected_school=$SCHOOL_INSERT;
$mode = $MODE;

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
    $admission_no=$_GET['admission_no'];
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
              header("Refresh:2; url=add_student.php");
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
<body onload=get_rollno()>
  <div class="bg-warning text-center">
    <h4>Register New Student</h4>
  </div>
  <?php require_once 'nav.php';?>
  <div class="container">
    <div class="row">
      <div class="col-md-12 ">
        <form class="" action="#" method="GET" onsubmit=save_rollno() >
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="name">Roll No:</label>
                  <span id="aj_result" class="text-danger" ></span>
                  <span id="next_rollno" class="text-primary" ></span>
                <input type="number" class="form-control" id="rollno" name="roll_no"
                       placeholder="type Roll No" min="1" value="2292"
                       autofocus required onfocusout="check_roll_no_student()">
              </div>
             <div class="form-group col-md-4">
                <label for="name">Name:*</label>
                <input type="text" class="form-control" id="name" name="name"
                       placeholder="type Name" required>
              </div>
            <div class="form-group col-md-4">
              <label for="fname">Father Name:*</label>
              <input type="text" class="form-control" id="fname"
                      name="fname" placeholder="type Father Name" required>
            </div>
              <div class="form-group col-md-4">
              <label for="dob">Date of Birth</label>
              <input type="date" class="form-control"
              id="dob" name="dob" placeholder="type date of birth">
            </div>
            <div class="form-group col-md-4">
              <label for="admission_no">Admission No*</label>
              <input type="number" class="form-control" id="admission_no"
                      name="admission_no" min="0" max="999999" step="1"
                      value="" placeholder="type date of admission no">
            </div>
               <div class="form-group col-md-4">
              <label for="admission">Admission Date</label>
              <input type="date" class="form-control" id="admission"
                     name="date_admission" min="2000" max="2030" step="1"
                     value="2022" placeholder="type date of admission">
            </div>
                <div class="form-group col-md-4">
              <label for="mobile">Mobile No</label>
              <input type="text" class="form-control" maxlength="12" id="mobile"
                     name="mobile_no" value="03" placeholder="type mobile no" >
            </div>

                 <div class="form-group col-md-4">
              <label for="fcnic">Fathere CNIC </label>
              <input type="text" class="form-control" id="fcnic" name="fcnic"
              value="15602-" placeholder="type father cnic no" >
            </div>

                 <div class="form-group col-md-4">
              <label for="formb"> Student Form B</label>
              <input type="text" class="form-control" id="formb" name="formb"
              value="15602-" placeholder="type student form b no" >
            </div>

           </div>
          <div class="form-row">
           <?php
             select_class($selected_class);
             select_school($selected_school);
            ?>
          </div>
            <button type="submit" name="submit" class="btn btn-primary">
              Save Data
            </button>
          </form>
        </div>
      </div>
    
    </div>
  <?php Page_close(); ?>
