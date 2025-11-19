<?php
/**
 * Add  All Subjects Marks of Students
 * php version 8.1
 *
 * @category Exam
 *
 * @package None
 *
 * @author Waqas <admin@waqaskanju.com>
 *
 * @license http://www.waqaskanju.com/license MIT
 *
 * @link http://www.waqaskanju.com
 **/
session_start();
require_once 'sand_box.php';
$link=$LINK;


if ($BATCH_MARKS_CHANGES!=1) {
    echo "<div class='bg-danger'>
            Limited Permission.View this page is Not Allowed.
          </div>";
    exit;
}

?>
  <?php Page_header('Add Roll No to  Marks Table'); ?>
</head>

<body>
<?php require_once 'nav.html';?>
<div class="container-fluid">
<p Class="bg-info fs-3 pl-1">If students are not shown for 1st semester in <a href="subject_link.php">Add Marks Page</a> Click on the button below (Insert Roll No to Marks Table)</p>
<form action="#" method="GET">
<input type="submit" name="first_semester" value="First Semester" class="btn btn-primary" 
       value="Insert Roll No in Marks Table" name="submit"> 
</form>
</div>


<div class="container-fluid">
<p Class="bg-info fs-3 pl-1">If students are not shown for 2nd semester in <a href="subject_link.php">Add Marks Page</a> Click on the button below (Insert Roll No to Marks Table)</p>
<form action="#" method="GET">
<input type="submit" name="second_semester" value="Second Semester" class="btn btn-primary" 
       value="Insert Roll No in Marks Table" name="submit"> 
</form>
</div>



<?php 
//* Rules for Naming add under score between two words. */
if (isset($_GET['second_semester'])) {
    $q="SELECT Roll_No from Students_Info WHERE Status=1";
    $exe=mysqli_query($link, $q);
    While ($exer=mysqli_fetch_assoc($exe)) {
        $roll_no=$exer['Roll_No'];
        $q2="SELECT Roll_No from marks WHERE Roll_No='$roll_no' AND Exam_Id='2'";
        $exe2=mysqli_query($link, $q2);
        $effect=mysqli_num_rows($exe2);
        if ($effect==0) {
           $q3="INSERT INTO marks (Roll_No,Exam_Id) VALUES($roll_no,'2')";
            $exe3=mysqli_query($link, $q3);
            if ($exe3) {
                echo "INSERTED $roll_no <br>";
            }
        } else {
            echo "$roll_no already present <br>";
        }
    }
}





/* Rules for Naming add under score between two words. */
if (isset($_GET['first_semester'])) {
    $q="SELECT Roll_No from Students_Info WHERE Status=1";
    $exe=mysqli_query($link, $q);
    While ($exer=mysqli_fetch_assoc($exe)) {
        $roll_no=$exer['Roll_No'];
        $q2="SELECT Roll_No from marks WHERE Roll_No='$roll_no' AND Exam_Id='1'";
        $exe2=mysqli_query($link, $q2);
        $effect=mysqli_num_rows($exe2);
        if ($effect==0) {
           $q3="INSERT INTO marks (Roll_No,Exam_Id) VALUES($roll_no,'1')";
            $exe3=mysqli_query($link, $q3);
            if ($exe3) {
                echo "INSERTED $roll_no <br>";
            }
        } else {
            echo "$roll_no already present <br>";
        }
    }
}

Page_close(); ?>