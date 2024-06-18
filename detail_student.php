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
 * @license http://www.abc.com MIT
 *
 * @link Adfas
 **/
?>
<?php
session_start();
require_once 'sand_box.php';
$link=$LINK;
$selected_class=$CLASS_NAME;
$selected_school=$SCHOOL_NAME;
Page_header('Search Student Details');
?>
<link href="./css/jquery-ui.css" rel="stylesheet">
</head>
<body class="background">
<?php require_once 'nav.html'; ?>
  <div class="container-fluid">
    <form action="#" method="GET">
      <div class="row">
        <div class="col-md-6">
          <label for="name" class="form-label h5 ui-autocomplete-input">
            Type Name/RollNo/Admission No/Father Name*</label>
          <input type="text"  id="name" name="name" value="<?php
          if(isset($_GET['name']))
          {
            echo $_GET['name'];
          }
          ?>" class="form-control"
              placeholder="Search Student type roll or name  or admission no
                           or father name" autocomplete="off"
              required>
        </div>
        <div class="col-md-2 mt-4">
          <input type="submit" name="search" value="Search"
          class="btn btn-primary">
        </div>
      </div> <!-- Row end -->
    </form>
  </div>
<!-- End of form -->



<?php
if (isset($_GET['search']) OR isset($_GET['class_filter']) ) {
    $name=$_GET['name'];
    $name=Validate_input($name);

    if(isset($_GET['class_filter'])){
      $class_name=$_GET['class_exam'];
      $school_name=$_GET['school'];

      $q="SELECT * FROM students_info WHERE Class='$class_name' AND School='$school_name' AND
      (NAME LIKE '%$name%' OR Roll_No LIKE '%$name%' OR FName LIKE '%$name%'
      OR Admission_No LIKE '%$name%')";
    } else {
      $q="SELECT * FROM students_info WHERE Name LIKE '%$name%'
      OR Roll_No LIKE '%$name%'
      OR FName LIKE '%$name%'
      OR Admission_No_High LIKE '%$name%'
      OR Admission_No LIKE '%$name%'";
    }

    $qr=mysqli_query($link, $q) or die('Error:'. mysqli_error($link));
    if (mysqli_num_rows($qr)==0) {
        echo "<h3 class='text-danger ml-5'>No Record Found!</h3>";
        exit;
    }
?>
    <!-- Sub query -->
    <form action="#" method="GET">
<div class="row mt-1 p-3">
    <?php
      Select_school($selected_school);
      Select_class($selected_class);
    ?>

</div>
<input type="hidden"  id="name" name="name" value="<?php
          if(isset($_GET['name']))
          {
            echo $_GET['name'];
          }
          ?>" class="form-control col-1"
              placeholder="Search Student type roll or name  or admission no
                           or father name" autocomplete="off"
              required>
<button class="no-print btn btn-primary m-4 col-4" type="submit"
        name="class_filter">
            Filter by school and class
</button>
  </form>
<!-- Sub query -->
  <!-- page header start -->
<div class="container">
    <div class="row" style="margin-top:10px;">
      <div class="col-md-2 col-xs-1">
        <img src="images/khyber.png"
             class="img img-fluid d-none d-md-block"
             alt="khyberlogo"height="auto" >
      </div>
      <div class="col-md-8 col-xs-4 d-none d-md-block">
        <h3 class="text-center text-uppercase"> <?php echo $SCHOOL_FULL_NAME ?></h3>
        <h3 class="text-center text-uppercase">Chitor Swat </h3>
        <h4 class="text-center">Student Profile</h4>
      </div>
      <div class="col-md-2 col-xs-1 d-none d-md-block">
        <img src="images/kpesed.png"
        alt="booklogo"
        height="auto"
        class="img img-fluid" >
      </div>
    </div>
  </div>
<!-- page header end -->


  <?php
    $no_of_records=mysqli_num_rows($qr);
    echo "<h4 class='text-success text-center ml-5'>$no_of_records Records found.</h4>";
    while ($qra=mysqli_fetch_assoc($qr)) {
        $Roll_No= $qra['Roll_No'];
        $Name= $qra['Name'];
        $Father_Name=$qra['FName'];
        $Dob=$qra['Dob'];
        $Mobile_No=$qra['Mobile_No'];
        $Admission_Date=$qra['Admission_Date'];
        $Admission_No=$qra['Admission_No'];
        $Admission_No_High=$qra['Admission_No_High'];
        $Father_Cnic=$qra['Father_Cnic'];
        $Student_Form_B=$qra['Student_Form_B'];
        $Class_Name=$qra['Class'];
        $School_Name=$qra['School'];
        $Address= $qra['Address'];
        $Status=$qra['Status'];

        ?>
<div class="container border border-primary bg-white mt-3 p-2">
    <div class="container ">
      <div class="row">
        <div class="col-md-8">
          <table class="table">
            <tr>
              <td>
                <span class="font-weight-bold"> Name </span> </td>
                <td> <?php echo $Name;  ?> </td>
            </tr>
            <tr>
              <td>
                <span class="font-weight-bold"> Father's Name </span></td>
              <td> <?php echo $Father_Name;  ?></td>
            </tr>
            <tr>
              <td>
                <span class="font-weight-bold"> School </span></td>
                <td><?php echo $School_Name;  ?></td>
            </tr>
        </table>
        </div>
        <div class="col-md-4">
            <center>
              <img src="pictures/<?php echo $Roll_No ?>.png"
                   class="img-fluid; max-width:50%; height: auto; img-thumbnail"
                   width="200"
                   height="200" >
            </center>
        </div>
      </div> <!-- Row of Naming and Picture -->
    </div>

<!-- container 2 -->
<div class="container">
    <div class="row" style="padding:20px">
      <div class="col-md-4">
        <span class="font-weight-bold"> Roll No </span>

        <span>
          <?php
            echo "<a href='edit_student.php?roll_no=$Roll_No&submit=Search#'>
            $Roll_No<i class='bi bi-pencil'></i></a>";
            ?>
      </span>
      </div>
      <div class="col-md-4">

        <span class="font-weight-bold"> Class </span>   <?php echo $Class_Name;  ?>
      </div>
      <div class="col-md-4">
          <span class="font-weight-bold"> Session </span> 2021 - 2022
      </div>

    </div>
  </div>
<!-- end of container 2 -->

<div class="container">
  <div class="row">
    <div class="col-md-3">
      <tr>
        <td>
          <span class="font-weight-bold"> Dob </span>
        </td>
        <td>
          <?php
            echo  Change_Date_To_Pak_format($Dob);
            ?>
        </td>
      </tr>
    </div>
    <div class="col-md-3">
      <tr>
        <td>
          <span class="font-weight-bold"> Admission No </span>
        </td>
        <td>
          <?php echo $Admission_No;  ?>
        </td>
      </tr>
    </div>
    <div class="col-md-3">
      <tr>
        <td>
          <span class="font-weight-bold"> Admission Date</span>
        </td>
        <td>
          <?php echo Change_Date_To_Pak_format($Admission_Date);  ?>
        </td>
      </tr>
    </div>
    <div class="col-md-3">
      <tr>
        <td>
          <span class="font-weight-bold"> Mobile No</span>
        </td>
        <td>
          <?php echo $Mobile_No;?>
        </td>
      </tr>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <tr>
        <td>
          <span class="font-weight-bold">Father CNIC</span>
        </td>
        <td>
          <?php echo $Father_Cnic?>
        </td>
      </tr>
    </div>
    <div class="col-md-3">
      <tr>
        <td>
          <span class="font-weight-bold">Student Form B</span>
        </td>
        <td>
          <?php echo $Student_Form_B ?>
        </td>
      </tr>
    </div>
    <div class="col-md-3">
      <tr>
        <td>
          <span class="font-weight-bold">Address</span>
        </td>
        <td>
          <?php echo $Address ?>
        </td>
      </tr>
    </div>
    <div class="col-md-3">
      <tr>
        <td>
          <span class="font-weight-bold">Status</span>
        </td>
        <td>
          <?php
		echo $status_word=Change_Status_To_word($Status);
            ?>

        </td>
      </tr>
    </div>
  </div> <!-- row -->
  <div class="row">
    <div class="col-md-3">
      <tr>
        <td>
          <span class="font-weight-bold">Admission No High</span>
        </td>
        <td>
          <?php echo $Admission_No_High;?>
        </td>
      </tr>
    </div>  <!-- col md 3 end -->
</div>  <!-- row end -->
  <!-- container row-->
</div>


</div> <!--End of top main container with blue border -->
        <?php
    }
}
?>
<script src="./js/jquery.js"></script>
<script src="./js/jquery-ui.js"></script>

<?php
$studentsArray = array();
$q2="SELECT DISTINCT Name,FName FROM students_info";
$qr2=mysqli_query($link, $q2) or die('Error:'. mysqli_error($link));
 while ($qra2=mysqli_fetch_assoc($qr2)) {
$addName= $qra2['Name'];
$addFather_Name=$qra2['FName'];
array_push($studentsArray,$addName,$addFather_Name);
}
?>
<script type="text/javascript">
let students = <?php echo json_encode($studentsArray); ?>;
let unique_names = [...new Set(students)];
$( "#name" ).autocomplete({
	source: unique_names
});
</script>

<?php
  Page_close();
?>
