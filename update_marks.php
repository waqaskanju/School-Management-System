<?php

require_once('db_connection.php');
require_once('sand_box.php');
$link=connect();


if(isset($_GET['submit']))
{
  $roll_no=$_GET['rollno'];
 $q="Select * from marks WHERE Roll_No=$roll_no";
  $exe=mysqli_query($link,$q) or die('error'.mysqli_error($link));
  $exea=mysqli_fetch_assoc($exe);


  $eng_marks= $exea['English_Marks'];
  $urd_marks= $exea['Urdu_Marks'];
  $mat_marks= $exea['Maths_Marks'];
  $sci_marks= $exea['Science_Marks'];

  $roll_no=$exea['Roll_No'];

  $q2="Select * from students_info where Roll_No=$roll_no";
  $exe2=mysqli_query($link,$q2) or die('error'.mysqli_error($link));
  $exea2=mysqli_fetch_assoc($exe2);
  $name=$exea2['Name'];
  $fname=$exea2['FName'];
 }

 if(isset($_POST['update']))

{

  $roll_no=$_POST['rollno'];
  $eng_marks=$_POST['eng'];
  $urd_marks=$_POST['urd'];
  $mat_marks=$_POST['mat'];
  $sci_marks=$_POST['sci'];
  

   $q="UPDATE marks SET English_Marks = $eng_marks, Urdu_Marks = $urd_marks, Maths_Marks=$mat_marks, Science_Marks=$sci_marks WHERE Roll_No=$roll_no";
  $exe=mysqli_query($link,$q) or die('error'.mysqli_error($link));
  if($exe){ echo "$roll_no"." Updated  Successfully";}
  else{ echo 'error in submit';}

} 
?>

<?php page_header("Update Marks"); ?>
</head>
<body>
  <div class="text-center bg-warning">
    <h4>Update Marks</h4>
  </div>
  <?php require_once('nav.php');?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <form class="" action="#">
        <P> Here we have a two step Process,  
          <ul>
          <li>Step 1: First type roll no and click on "Load Data" Button.</li>
          <li>Step 2: After marks are show in text boxes , update it to reqire numbber, then click on "Update" Button </li>
        </ul>
         <p class="p-2 text-primary font-weight-bold"> Note: Please Enter Roll No To Load Data </p>
        <div class="form-row">
        <div class="form-group col-md-6">
         <label for="rollno">Roll No:</label>
          <input type="number" class="form-control" id="rollno"  min="1" name="rollno" placeholder="type roll no" autofocus required>
        </div>
        <div class="col-md-6">
          <br>
        <button type="submit" class="btn btn-primary btn-lg"name="submit" value="Search Roll No"> Load Data </button> 
      </div>
    </div>
      </form>
    </div>
  </div>
</div>
  


<div class="container">
<div class="row">
  <div class="col-md-12">

     <form class="" action="#" method="POST">   
        <div class="form-row">
          <div class="col-md-4">
            <label for="name">Name:</label>
            <input type="text" value="<?php if(isset($name)){echo $name;} else{echo "";}  ?>"readonly>
          </div>
          <div class="col-md-4">
            <label for="fname">Father Name:</label>
             <input type="text" value="<?php if(isset($fname)){echo $fname;} else{echo "";}  ?> " readonly>
          </div>
          <div class="col-md-4">
          </div>  
        <div class="form-group col-md-3">
          <label for="english">English:</label>
          <input type="number" class="form-control" id="eng" max="100" min="0"  value="<?php if(isset($eng_marks)){echo $eng_marks;} else{echo "";}  ?>" placeholder="type english marks" name="eng" required>
        </div>
        <div class="form-group col-md-3">
          <label for="urdu">Urdu:</label>
          <input type="number" class="form-control" id="urd" max="100" min="0" name="urd" value="<?php if(isset($urd_marks)){echo $urd_marks;} else{echo "";}  ?>" placeholder="type urdu marks" required>
        </div>
          <div class="form-group col-md-3">
            <label for="maths">Maths:</label>
            <input type="text" class="form-control" placeholder="type maths marks" id="mat"  value="<?php if(isset($mat_marks)){echo $mat_marks;} else{echo "";}  ?>" max="100" min="0" name="mat" required>
          </div>
          <div class="form-group col-md-3">
            <label for="science">Science:</label>
            <input type="text" class="form-control" id="sci" max="100" min="0" name="sci" value="<?php if(isset($sci_marks)){echo $sci_marks;} else{echo "";}  ?>" placeholder="type science marks" required>
          </div>
        </div>
          <input type="hidden" name="rollno" value="<?php if(isset($roll_no)){echo $roll_no;} else{echo "";}  ?>">
          <button type="submit" name="update" class="btn btn-primary"> Update </button>
      </form>


    </div>
  </div>
  
</div>

<?php 

page_close();



?>