<?php

/**
 * Print DMC.
 * php version 8.1
 *
 * @category DMC
 *
 * @package None
 *
 * @author Waqas Ahmad <waqas@waqaskanju.com>
 *
 * @license http://www.waqaskanju.com/license MIT
 *
 * @link http://www.waqaskanju.com/
 **/
session_start();
require_once 'sand_box.php';
$link=$LINK;
  Page_header('Batch DMCs')?>

  <style>
    /* 
    this property is set here because the global css page is for one dmc. if we 
    change it in main css file. THe height of single dmc will also change which 
    i don not want.
     */
    .dmc-background-image {
      height: 1751px;
    }
    </style>
</head>
<body>
  <?php  require_once 'nav.html';?>
   <div class="bg-warning text-center no-print">
    <h4>Batch DMCs</h4>
   </div>

<div class="container-fluid no-print">
  <form action="#" method="GET">
    <div class="row">
        <?php

          $school_name=$SCHOOL_NAME;

          // In the dropdown class name selected class name will be selected.
          if(isset($_GET['class_exam'])){
            $class_name=$_GET['class_exam'];
          } else {
            $class_name='7th';
          }

          Select_class($class_name);
          Select_school($school_name);?>
    </div>
    <button class="no-print btn btn-primary mt-2" type="submit"
            name="submit">
            Show Result
    </button>
  </form>
</div>
<?php
if (isset($_GET['submit'])) {
  $class_name=$_GET['class_exam'];
  $class_name=Validate_input($class_name);

  $school_name=$_GET['school'];
  $school_name=Validate_input($school_name);
    
  $q="SELECT Roll_No,Name,FName,Class,School,Class_Position,Status FROM students_info
  WHERE Class='$class_name' AND School='$school_name' AND Status='1'";
  $qr=mysqli_query($link, $q) or die('Error:'. mysqli_error($link));
  Save_Log_data($q);

  if(mysqli_num_rows($qr)==0){
    Show_alert("No record found","warning text-center");
    redirection(1,'dmc_batch.php');
    exit;
  }
  ?>
  <div id="spinner">
    <img src="./images/spinner.gif" alt="spinner">
  </div>
  <?php
  while($qra=mysqli_fetch_assoc($qr))
  {
    $Roll_No = $qra['Roll_No'];
    $Name = $qra['Name'];
    $Father_Name = $qra['FName'];
    $Class_Name = $qra['Class'];
    $current_class = $Class_Name;
    $School_Name = $qra['School'];
    $Class_Position = $qra['Class_Position'];
    $Serial_No= Select_Column_data("marks", "Serial_No", "Roll_No", $Roll_No);
?>


<!-- div for background image -->
<div class="dmc-background-image separate_page">
  <br><br><br><br><br><br>
  <div class="container">
    <div class="container  m-t-1" id="school-banner">
      <div class="row">
        <div class="col-1">
          <!-- empty col for border -->
        </div>
        <div class="col-2">
          <img src="images/khyber.png"
              class="img img-fluid"
              alt="khyberlogo"
              height="auto" >
        </div>
        <div class="col-6">
          <h3 class="text-center text-uppercase">Government Higher Secondary School</h3>
          <h3 class="text-center text-uppercase"><?php echo $SCHOOL_LOCATION; ?> </h3>
        <h4 class="text-center">Detailed Marks Sheet</h4>
        </div>
        <div class="col-2">
          <img src="images/kpesed.png"
              alt="booklogo"
              height="auto"
              class="img img-fluid">
        </div>
        <div class="col-1">
          <!-- empty col for border -->
        </div>
    </div> <!-- end of row -->
  </div> <!-- end of contair school banner -->
</div> <!-- upper connecer of school banner  -->

<!-- only one div of background image is left open -->

  <div class="container mt-5">
    <div class="row">
      <div class="col-1">
        <!-- empty col for border -->
      </div>
      <div class="col-6">
         <!-- empty col for serial no left empty space -->
      </div>
      <div class="col-3 text-right">
        <p class="font-weight-bold text-danger">
            Serial No
          <?php echo $Serial_No['Serial_No']; ?>
        </p>
      </div>
      <div class="col-md-1">
        <!-- Empty -->
      </div>
      <div class="col-1">
        <!-- empty col for border -->
      </div>
    </div> <!-- end of row serial no-->
  </div> <!-- end of container serial no-->

  <div class="container">
    <div class="row" id="naming">
    <!-- empty col for border -->
    <div class="col-1"></div>
      <div class="col-6">
        <table class="table">
          <tr class="row-height border-bottom border-dark fw-bolder align-bottom">
            <td>
              <span class="font-weight-bold"> Name </span> </td>
            <td> <?php echo $Name;  ?> </td>
          </tr>
          <tr class="row-height border-bottom border-dark fw-bolder align-bottom">
            <td>
              <span class="font-weight-bold"> Father's Name </span>
            </td>
            <td> <?php echo $Father_Name;  ?></td>
          </tr>
          <tr class="row-height border-bottom border-dark fw-bolder align-bottom">
            <td>
              <span class="font-weight-bold"> School </span> </td>
            <td><?php echo $School_Name;?> </td>
          </tr>
       </table>
      </div> <!-- end of col 6 col for name fname and school -->
      <div class="col-4">
        <center class="float-center">
          <img src="pictures/<?php echo $Roll_No; ?>.png"
               class="img-fluid; max-width:50%; height: auto; img-thumbnail"
               width="200"
               height="200">
        </center>
      </div>
      <div class="col-1">
        <!-- empty col for border -->
      </div>
    </div> <!-- Row of Naming and Picture -->
  </div> <!-- container of naming-->

  <!-- <center> -->
  <div class="container" style="margin-top:50px">
    <div class="row">
      <div class="col-1">  <!-- empty col for border -->
      </div>
      <div class="col-10">
        <table class="table border border-dark">
          <tr class="border border-dark">
            <th class="border border-dark fw-bolder">Roll No</th>
            <th class="border border-dark fw-bolder"> <?php echo $Roll_No;  ?>  </th>
            <th class="border border-dark fw-bolder">Class</th> <th> <?php echo $Class_Name;  ?>  </th>
            <th class="border border-dark fw-bolder">Session</th> <th><?php echo  date('Y')-1 . "-" ;
                  echo date('Y');?>  </th>
          </tr>
        </table>
      </div>
      <div class="col-1">
        <!-- empty col for border -->
      </div>
    </div>  <!-- end of row for roll class and session -->
  </div> <!-- end of container for roll no class session -->

  <div class="container mt-5">
    <div class="row">
      <div class="col-1">
        <!-- empty col for border -->
      </div>
      <div class="col-10">
        <table class="table border border-dark">
          <thead>
            <tr class="border border-dark">
              <th class="border border-dark fw-bolder">
                Subjects
              </th>
              <th class="border border-dark fw-bolder">
                Total Marks
              </th>
              <th class="border border-dark fw-bolder">
                Marks
              </th>
              <th class='border border-dark fw-bolder'>
                Remarks
              </th>
            </tr>
          </thead>
        <tbody>
          <tr class="border border-dark fw-bolder">
          <?php
            // Initially Students marks are Zero.
            $student_obtain_marks=0;
            // Select all subjects of a class.
            $school_name=$School_Name;
            $subjects=Select_Subjects_Of_class($school_name, $Class_Name);
            // Loop throught all subjects.
            for ($i=0; $i<count($subjects); $i++) {
              $subject_name=$subjects[$i]['Name'];
              // Select total marks of a subject.
              $subject_total_marks=One_Subject_Total_marks(
                $school_name, $Class_Name, $subject_name
              );
              echo "<td class='border border-dark fw-bolder'>".$subject_name."</td>
                      <td class='border border-dark fw-bolder'>".$subject_total_marks."</td>";
              // As subject name and marks column of subject are
              // different coverversion required.
              $column_name=Change_Subject_To_Marks_col($subject_name);
              // Select Marks of a subject and a student.
              $subject_marks=Select_Column_data(
                  "marks", $column_name, "Roll_No", $Roll_No
              );
              // Marks of a subjects of a student.
              $current_marks=$subject_marks[$column_name];
              // As -1 is stored for Absent for total marks -1 is change to 0.
              $student_obtain_marks=$student_obtain_marks+Change_Absent_tozero($current_marks);
              // -1 will be Shown As A=Absent.
              echo "<td class='border border-dark fw-bolder'>".Show_absent($current_marks)."</td>";
              $subject_percentage=(Change_Absent_tozero($current_marks)*100)/$subject_total_marks;
              $Remarks="";
              if ($subject_percentage<30) {
                $Remarks ="<span class=' text-danger fs-5'>Fail</span>";
                }
              echo  "<td class='border border-dark fw-bolder'>".$Remarks."</td>
                        </tr>";
            }
            // Initiall value
            $All_Subjects_Total_Marks=-1;
            $All_Subjects_Total_Marks=Class_Total_marks($school_name, $Class_Name);
            if ($All_Subjects_Total_Marks==0) {
              echo "<div class='text-danger'>
                      All Subject Total Marks=0.. Add Subjects.
                      <a href='add_class_subject.php'> Add Subject </a>
                    </div>";
              exit;
            }
          $Percentage=round(($student_obtain_marks*100)/$All_Subjects_Total_Marks, 2);
        ?>
          <!-- Total_Marks =  Class All Subjects Total Marks -->
          <tr class="border border-dark">
            <td class="border border-dark fw-bolder">Total</td>
            <td class="border border-dark fw-bolder"> <?php echo $All_Subjects_Total_Marks;  ?></td>
            <td class="border border-dark fw-bolder"> <?php echo $student_obtain_marks  ?></td>
            <td class="border border-dark fw-bolder">
            <?php
              if ((($student_obtain_marks*100)/$All_Subjects_Total_Marks)<=pass_percentage($Class_Name)) {
                echo "<span class=' text-danger fs-5'>Status Fail</span>";
              } else {
                echo "<span class=' text-success fs-5'>Status Pass</span>";
              }
            ?>
            </td>
          </tr>
        </tbody>
      </table>
      <!-- print-center mt-5 -->
      <table class="table border border-dark mt-5">
        <tr class="border border-dark">
          <td class="border border-dark fw-bolder">
            <span class="font-weight-bold">Percentage </span>
          </td>
          <td> <?php echo $Percentage;  ?> </td>
          <td class="border border-dark fw-bolder">
            <span class="font-weight-bold"> Class Position </span>
          </td>
          <td class="border border-dark fw-bolder"> <?php echo $Class_Position;  ?> </td>
        </tr>
      </table>
    </div> <!-- end of marks and subject table col10-->
    <div class="col-1">
      <!-- empty col for border -->
    </div>
  </div> <!-- end of row of marks and sujects-->
</div> <!-- end of container of marks and subjects-->

<div class="container m-b-4">
  <div class="row m-t-1 mb-5">
    <div class="col-1">
      <!-- empty col for border -->
    </div>
    <div class="col-sm-5">
      <p class="text-left sign fw-bolder">Controller of  Examination</p>
      <p class="text-left m-t-1">___________________ </p>
    </div>
    <div class="col-sm-5">
      <p class="text-center  sign fw-bolder">Checked By</p>
      <p class="text-center m-t-1">___________________ </p>
    </div>
    <div class="col-1">
      <!-- empty col for border -->
    </div>
  </div>  <!-- end of row exam and check by-->
</div> <!-- end of container exam and check by-->

</div> <!-- container for background image of dmc -->

    <?php
    }  // while loop for each dmc
  }  // if ended form submiited
  ?>
<script>
    document.getElementById('spinner').style.display = "none";
</script>

<?php Page_close(); ?>
