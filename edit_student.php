<?php
  require_once 'db_connection.php';
  require_once 'sand_box.php';
  require_once 'config.php';
  $link=connect();
  Page_header('Edit Student');
  $mode = $MODE;
?>
</head>
<body>

  <?php require_once 'nav.php';?>
  <div class="container">
    <div class="row">
      <div class="col-md-12 ">
      <div class="bg-warning text-center">
    <h4>Edit Student</h4>
  </div>
  <form action="#" method="GET">
    <div class="row">
          <div class="col-lg-4"><label for="name"> Type Roll No to load data:</label> </div>
          <div class="col-lg-6"><input type="number" class="form-control" id="rollno" name="roll_no" required placeholder="type Roll No" min="1"> </div>
          <div class="col-lg-2"><input type="submit" name="submit" value="Search"> </div>
    </div>
  </form>
      <?php
        /* Rules for Naming add under score between two words. */
        if(isset($_GET['submit'])) {

            $roll_no=$_GET['roll_no'];
            $q="Select * from students_info WHERE Roll_NO=".$roll_no;
            $qd=mysqli_query($link, $q);
            if(mysqli_num_rows($qd)==0) {
                echo '<h5 class="bg-danger"> Roll No Not Found! </h5>';
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

            $admission_no=$data['Admission_No'];
            $date_admission=$data['Admission_Date'];
            $mobile_no=$data['Mobile_No'];
            $father_cnic=$data['Father_Cnic'];
            $form_b=$data['Student_Form_B'];
            ?>
      <h5 class="bg-success"> Data of Roll No <?php echo $roll_no;?> loaded.</h5>
        <form class="" action="#" method="GET" >
            <div class="form-row">
                <input type="hidden" class="form-control" id="rollno" name="roll_no" placeholder="type Roll No" min="1" value="<?php echo $roll_no  ?>" autofocus required onfocusout="check_roll_no_student()">
             <div class="form-group col-md-4">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name  ?>" placeholder="type Name"required>
              </div>
            <div class="form-group col-md-4">
              <label for="fname">Father Name:</label>
              <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $fname ?>" placeholder="type Father Name" required>
            </div>
              <div class="form-group col-md-4">
              <label for="dob">Date of Birth</label>
              <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $dob  ?>" placeholder="type date of birth">
            </div>
            <div class="form-group col-md-4">
              <label for="admission_no">Admission No</label>
              <input type="number" class="form-control" id="admission_no" name="admission_no" value="<?php echo $admission_no  ?>" placeholder="type date of admission no">
            </div>
               <div class="form-group col-md-4">
              <label for="admission">Admission Date</label>
              <input type="date" class="form-control" id="admission" name="date_admission"  value="<?php echo $date_admission  ?>" placeholder="type date of admission">
            </div>
                <div class="form-group col-md-4">
              <label for="mobile">Mobile No</label>
              <input type="text" class="form-control" id="mobile" name="mobile_no" value="<?php echo $mobile_no  ?>" placeholder="type mobile no" >
            </div>

                 <div class="form-group col-md-4">
              <label for="fcnic">Fathere CNIC </label>
              <input type="text" class="form-control" id="fcnic" name="fcnic" value="<?php echo $father_cnic ?>" placeholder="type father cnic no" >
            </div>

            <div class="form-group col-md-4">
              <label for="formb"> Student Form B</label>
              <input type="text" class="form-control" id="formb" name="formb" value="<?php echo $form_b ?>" placeholder="type student form b no" >
            </div>
              <input type="hidden" name="school" value="<?php echo $school ?>">
              <input type="hidden" name="class" value="<?php echo $class ?>">
           </div>
             <!--   <div class="form-row">
            <?php // select_class(); ?>
            <?php  // select_school();?>

          </div>  -->
            <button type="submit" name="update" class="btn btn-primary">Edit Data</button>
          </form>
        <?php }  ?>

        </div>
      </div>

    </div>
    <?php
    if (isset($_GET['update'])) {
                $roll_no=$_GET['roll_no'];
                $name=$_GET['name'];
                $fname=$_GET['fname'];
                $school=$_GET['school'];
                $class=$_GET['class'];
                $school=$_GET['school'];
                $dob=$_GET['dob'];
        if ($dob=='') {
            $default='01/01/1900';
            $date = strtotime($default);
            $dob = date('Y-m-d', $date);
        }
                $admission_no=$_GET['admission_no'];
                $date_admission=$_GET['date_admission'];
        if ($date_admission=='') {
            $default='01/01/1900';
            $date = strtotime($default);
            $date_admission=date('Y-m-d', $date);
        }
                $mobile_no=$_GET['mobile_no'];
                $father_cnic=$_GET['fcnic'];
                $form_b=$_GET['formb'];

                $q="UPDATE students_info SET Name = '$name',
                                             FName='$fname',
                                             School='$school',
                                             Class='$class',
                                             Dob='$dob',
                                             Admission_No='$admission_no',
                                             Admission_Date='$date_admission',
                                             Mobile_No='$mobile_no',
                                             Father_Cnic = '$father_cnic',
                                             Student_Form_B =  '$form_b'
                                              WHERE Roll_No=$roll_no";
        if ($mode=="write") {
            $exe=mysqli_query($link, $q) or die('error'.mysqli_error($link));
            if ($exe) {
                echo "$roll_no"." Updated  Successfully";
            } else {
                echo 'error in submit';
            }
        }
    } else {
          echo '<div class="bg-danger text-center"> Not allowed!! </div>';
    }


    ?>
  <?php Page_close(); ?>
