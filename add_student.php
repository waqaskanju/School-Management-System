<?php
  require_once('db_connection.php');
  require_once('sand_box.php');
  $link=connect();
/* Rules for Naming add under score between two words. */
  if(isset($_GET['submit']))
  {
    /* First letter of variable is in lower case */
    $roll_no=$_GET['roll_no'];
    $name=$_GET['name'];
    $fname=$_GET['fname'];
    $school=$_GET['school'];
    $class=$_GET['class_exam'];
    $school=$_GET['school'];
    $dob=$_GET['dob'];
    $admission_no=$_GET['admission_no'];
    $date_admission=$_GET['date_admission'];
    $mobile_no=$_GET['mobile_no'];
    $father_cnic=$_GET['fcnic'];
    $form_b=$_GET['formb'];
/* First Letter of Columan Name is capital. */
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
    
    $exe=mysqli_query($link,$q) or die('mysqli_error in student addition'.($link));
    if($exe) { echo 
      "<div class='alert alert-success' role='alert'> Roll No 
      $roll_no Added Successfully  </div>";
      header("Refresh:2; url=add_student.php");
    }
    else{ echo "Error in 1st Query". mysqli_error($link);}

  }
?>

  <?php page_header('Register Students'); ?>
</head>
<body>
  <div class="bg-warning text-center">
    <h4>Register Student</h4>
  </div>
  <?php require_once('nav.php');?>
  <div class="container">
    <div class="row">
      <div class="col-md-12 ">
        <form class="" action="#" method="GET" >
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="name">Roll No:</label> <span id="aj_result" class="text-danger" ></span>
                <input type="number" class="form-control" id="rollno" name="roll_no" placeholder="type Roll No" min="1" value="22" autofocus required onfocusout="check_roll_no_student()">
              </div>
             <div class="form-group col-md-4">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="type Name"required>
              </div>
            <div class="form-group col-md-4">
              <label for="fname">Father Name:</label>
              <input type="text" class="form-control" id="fname" name="fname" placeholder="type Father Name" required>
            </div>
              <div class="form-group col-md-4">
              <label for="dob">Date of Birth</label>
              <input type="date" class="form-control" id="dob" name="dob" placeholder="type date of birth">
            </div>
            <div class="form-group col-md-4">
              <label for="admission_no">Admission No</label>
              <input type="number" class="form-control" id="admission_no" name="admission_no" min="0" max="999999" step="1" value="" placeholder="type date of admission no">
            </div>
               <div class="form-group col-md-4">
              <label for="admission">Admission Date</label>
              <input type="date" class="form-control" id="admission" name="date_admission" min="2000" max="2030" step="1" value="2022" placeholder="type date of admission">
            </div>
                <div class="form-group col-md-4">
              <label for="mobile">Mobile No</label>
              <input type="text" class="form-control" id="mobile" name="mobile_no" value="03" placeholder="type mobile no" >
            </div>
              
                 <div class="form-group col-md-4">
              <label for="fcnic">Fathere CNIC </label>
              <input type="text" class="form-control" id="fcnic" name="fcnic" value="03" placeholder="type father cnic no" >
            </div>
              
                 <div class="form-group col-md-4">
              <label for="formb"> Student Form B</label>
              <input type="text" class="form-control" id="formb" name="formb" value="03" placeholder="type student form b no" >
            </div>
              
           </div> 
          <div class="form-row">  
          <?php select_class(); ?>
          <?php  select_school();?>

          </div>  
            <button type="submit" name="submit" class="btn btn-primary">Save Data</button>
          </form>
        </div>
      </div>
      <?php 
        $show_class="'5th'";
        $show_school="'GPS Kokrai'";
      ?>
      <br>
      <br>
      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <caption style="caption-side: top"> <h4> <?php echo "Showing Data of Class:$show_class School: $show_school";?></h4></caption>
            <tr> <td> Roll No </td> <td> Name </td> <td> Father Name </td> <td> Class </td><td> School</td> </tr> 
            <?php
              $qs="Select * from students_info WHERE Class=".$show_class."AND school=".$show_school."order by Roll_No ASC";
              $qr=mysqli_query($link,$qs)or die('error:'.mysqli_error($link));
              while($qfa=mysqli_fetch_assoc($qr))
              {
                echo  '<tr><td>'.$qfa['Roll_No']. '</td><td>'.$qfa['Name']. '</td><td>'.$qfa['FName']. '</td><td>'.$qfa['Class'].'<td>'.$qfa['School']. '</td></td></tr>';
              }
            ?>
          </table>
        </div>
      </div>
    </div>
  <?php page_close(); ?>
