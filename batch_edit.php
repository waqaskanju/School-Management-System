<?php
    require_once('db_connection.php');
    require_once('sand_box.php');
    $link=connect();
   page_header("Update Marks"); ?>
</head>
<?php
   /*  if(isset($_GET['submit']))
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
    } */

   /*  if(isset($_POST['update']))
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
    }  */
?>

<body>
<script>
function mySubmitFunction()
    {
        e.preventDefault();
        return false;
    }
</script>
    <div class="text-center bg-warning">
        <h4>Update Batch Marks</h4>
    </div>
    <?php require_once('nav.php');?>
  
<?php
$class_name=$_GET['Class'];
$school_name=$_GET['School'];
$year=$_GET['Year'];
$i=1;
echo $q="SELECT * from students_info WHERE class=$class_name AND School=$school_name AND Year=$year";
$exe=mysqli_query($link,$q) or die('error in batch select'.mysqli_error($link));
echo "No of records.".mysqli_num_rows($exe);
while($exer=mysqli_fetch_assoc($exe)){
$roll_no=$exer['Roll_No'];
?>    
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form class="" action="#" method="POST" id="<?php echo 'form'.$i?>" onsubmit="return mySubmitFunction(event)" >   
                <div class="form-row">
                     <div class="form-group col-md-1">
                        <label for="rollno">Roll No:</label>
                        <input type="number" class="form-control" id="rollno" 
                                value="<?php echo $roll_no; ?>" readonly>
                    </div>
                    <div class="form-group col-md-1">
                        <label for="english">English:</label>
                        <input type="number" class="form-control" id="eng" max="100" min="0"  
                                value="<?php if(isset($eng_marks)){echo $eng_marks;} else{echo "";}  ?>" 
                                placeholder="type english marks" name="eng" required>
                    </div>
                    <div class="form-group col-md-1">
                        <label for="urdu">Urdu:</label>
                        <input type="number" class="form-control" id="urd" max="100" min="0" name="urd" 
                                value="<?php if(isset($urd_marks)){echo $urd_marks;} else{echo "";}  ?>" 
                                placeholder="type urdu marks" required>
                    </div>
                    <div class="form-group col-md-1">
                        <label for="maths">Maths:</label>
                        <input type="text" class="form-control" placeholder="type maths marks" id="mat"  value="<?php if(isset($mat_marks)){echo $mat_marks;} else{echo "";}  ?>" max="100" min="0" name="mat" required>
                    </div>
                    <div class="form-group col-md-1">
                        <label for="science">Hpe:</label>
                        <input type="text" class="form-control" id="sci" max="100" min="0" name="sci" value="<?php if(isset($sci_marks)){echo $sci_marks;} else{echo "";}  ?>" placeholder="type science marks" required>
                    </div>
                    <div class="form-group col-md-1">
                        <label for="science">Nazira:</label>
                        <input type="text" class="form-control" id="sci" max="100" min="0" name="sci" value="<?php if(isset($sci_marks)){echo $sci_marks;} else{echo "";}  ?>" placeholder="type science marks" required>
                    </div>
                    <div class="form-group col-md-1">
                        <label for="science">Science:</label>
                        <input type="text" class="form-control" id="sci" max="100" min="0" name="sci" value="<?php if(isset($sci_marks)){echo $sci_marks;} else{echo "";}  ?>" placeholder="type science marks" required>
                    </div>
                 </div>
                 <input type="hidden" name="rollno" value="<?php if(isset($roll_no)){echo $roll_no;} else{echo "";}  ?>">
                <button type="button" name="update" class="btn btn-primary"> Update </button>
            </form>
        </div>
    </div>
</div>
<?php
$i++; 
    }
?>

<?php 
    page_close();
?>