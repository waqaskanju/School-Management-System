<?php
require_once('db_connection.php');
require_once('sand_box.php');
$link=connect();
if(isset($_GET['submit']))
{
  $roll_no=$_GET['rollno'];
  /* Urdu */
  $urd_marks=$_GET['urd'];
  /* Arabic */
  $ara_marks=$_GET['ara'];
  /* Science */
  $sci_marks=$_GET['sci'];
  /* Maths */
  $mat_marks=$_GET['mat'];
  /* Islamayat */
  $isl_marks=$_GET['isl'];
  /* Nazira */
  $naz_marks=$_GET['naz'];
  /* English */
  $eng_marks=$_GET['eng'];
  /* HPE */
  $hpe_marks=$_GET['hpe'];
  /* History and Geopraphy */
  $his_marks=$_GET['his'];
  /* Qirat */
  $qir_marks=$_GET['qir'];
  /* Computer Science */
  $csc_marks=$_GET['csc'];
  /* Mutaliq Quran */
  $muq_marks=$_GET['muq'];
  /* Drawing */
  $dra_marks=$_GET['dra'];
  
  
 
  $q="INSERT INTO marks (Roll_No,English_Marks,Urdu_Marks,Maths_Marks,Science_Marks) VALUES ('$roll_no','$eng_marks','$urd_marks','$mat_marks','$sci_marks')";
  $exe=mysqli_query($link,$q) or die('error'.mysqli_error($link));
  if($exe){ echo "$roll_no"." Submitted Successfully";}
  else{ echo 'error in submit';}
}
?>
<?php page_header("Add Marks"); ?>
</head>
<body>
  <div class="bg-warning text-center">
    <h4>Enter Marks</h4>
  </div>
  <?php require_once('nav.php');?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <form class="" action="#">
        <div class="form-group">
          <p class="p-2 text-primary font-weight-bold"> Note: Please Enter Roll No, Make sure this Roll No is   already registered in students page, other wise it will not work. </p>
          <label for="rollno">Roll No:</label> <span id="aj_result" class="text-danger"></span>
          <input type="number" class="form-control" id="rollno"  min="1" name="rollno" placeholder="type roll no" autofocus required onfocusout="check_roll_no_marks()">
        </div>
        <div class="form-row">
          <div class="form-group col-md-3">
          <label for="english">English:</label>
          <input type="number" class="form-control" id="eng" max="100" min="0" placeholder="type english marks" name="eng" required>
          </div>
          <div class="form-group col-md-3">
            <label for="urdu">Urdu:</label>
            <input type="number" class="form-control" id="urd" max="100" min="0" name="urd"  placeholder="type urdu marks" required>
          </div>
            <div class="form-group col-md-3">
              <label for="maths">Maths:</label>
              <input type="text" class="form-control" placeholder="type maths marks" id="mat" max="100" min="0" name="mat" required>
            </div>
            <div class="form-group col-md-3">
              <label for="hpe">HPE:</label>
              <input type="text" class="form-control" id="hpe" max="100" min="0" name="hpe" placeholder="type hpe marks" required>
            </div>
            <div class="form-group col-md-3">
              <label for="nazira">Nazira:</label>
              <input type="text" class="form-control" id="nazira" max="100" min="0" name="naz" placeholder="type nazira marks" required>
            </div>
            <div class="form-group col-md-3">
              <label for="science">Science:</label>
              <input type="text" class="form-control" id="sci" max="100" min="0" name="sci" placeholder="type science marks" required>
            </div>
            <div class="form-group col-md-3">
              <label for="science">Science:</label>
              <input type="text" class="form-control" id="sci" max="100" min="0" name="sci" placeholder="type science marks" required>
            </div>
            <div class="form-group col-md-3">
              <label for="science">Science:</label>
              <input type="text" class="form-control" id="sci" max="100" min="0" name="sci" placeholder="type science marks" required>
            </div>
            <div class="form-group col-md-3">
              <label for="science">Science:</label>
              <input type="text" class="form-control" id="sci" max="100" min="0" name="sci" placeholder="type science marks" required>
            </div>
            <div class="form-group col-md-3">
              <label for="science">Science:</label>
              <input type="text" class="form-control" id="sci" max="100" min="0" name="sci" placeholder="type science marks" required>
            </div>
            <div class="form-group col-md-3">
              <label for="science">Science:</label>
              <input type="text" class="form-control" id="sci" max="100" min="0" name="sci" placeholder="type science marks" required>
            </div>
            <div class="form-group col-md-3">
              <label for="science">Science:</label>
              <input type="text" class="form-control" id="sci" max="100" min="0" name="sci" placeholder="type science marks" required>
            </div>
            <div class="form-group col-md-3">
              <label for="science">Science:</label>
              <input type="text" class="form-control" id="sci" max="100" min="0" name="sci" placeholder="type science marks" required>
            </div>
        </div>
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered">
        <?php
          $start_rollno=300;
          $end_rollno=327;
        ?>
        <caption style="caption-side:top"> <h5> <?php echo  "Showing data  from Roll: $start_rollno to Roll No: $end_rollno" ?></h5></caption>
        <tr> <td> Roll No </td> <td> English </td> <td> Urdu </td> <td> Maths </td><td> Science </td> </tr> 
         <?php
          $qs="Select * from marks WHERE Roll_No>$start_rollno AND Roll_No<$end_rollno order by Roll_No ASC";
          $qr=mysqli_query($link,$qs) or die('error:'.mysqli_error($link));
            while($qfa=mysqli_fetch_assoc($qr))
             {
              echo  '<tr><td>'.$qfa['Roll_No']. '</td><td>'.$qfa['English_Marks']. '</td><td>'.$qfa['Urdu_Marks']. '</td><td>'.$qfa['Maths_Marks']. '</td><td>'.$qfa['Science_Marks']. '</td></tr>';
            }
          ?>
      </table>
    </div>
  </div>
</div>
<?php page_close(); ?>
