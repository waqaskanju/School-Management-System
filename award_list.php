<?php
/**
 * Add New Students to LMS
 * php version 8.1
 *
 * @category Student
 *
 * @package Adf
 *
 * @author Waqas Ahmad <waqaskanju@gmail.com>
 *
 * @license http://www.abc.com MIT
 *
 * @link Adfas
 **/
require_once 'sand_box.php';
$link=connect();
?>
<form action="#" method="GET">
<div class="form-row no-print">
<?php
  $selected_class='';
  select_class($selected_class);

  $selected_class='';
  select_school($SCHOOL_SHOW);

  $selected_subject='';
  select_subject($selected_subject);

  $selected_teacher='';
  select_teacher($selected_teacher);

  ?>
</div>
<button class="no-print" type="submit" name="submit" class="btn btn-primary">
  Submit
</button>

</form>
<?php

Page_Header('Award list CLass ');
?>
</style>
</head>
<body>
<?php
if (isset($_GET['submit'])) {
    $class_name=$_GET['class_exam'];
    $class_name=str_replace('\'', '', $class_name);

    // $class_name=$_GET['class_exam'];
    // $class_name=str_replace('\'', '', $class_name);
    $school_name=$_GET['school'];
    $school_name=str_replace('\'', '', $school_name);

    $subject_name=$_GET['subject'];
    $subject_name=str_replace('\'', '', $subject_name);

    $teacher_name=$_GET['teacher_name'];
    $teacher_name=str_replace('\'', '', $teacher_name);
}  else {
    $school_name='';
    $subject_name='';
    $teacher_name='';
}
?>
<div class="container">
    <div class="row m-t-1">
        <div class="log col-sm-2">
            <img src="./images/khyber.png" alt="khyber">
        </div>
        <div class="header text-center col-sm-8">
        <h2>GOVT. HIGHER SECONDARY SCHOOL </h2>
        <h2 >  CHITOR, DISTRICT SWAT  </h2>
        <h5>
            Attendance Sheet  Monthly Test Dec 2022  Class:
            <?php echo $class_name;  ?>
        </h5>

        <h5>
            Teacher: Mr.<?php echo $teacher_name; ?>
             Subject:  <?php echo $subject_name; ?>
             Date: <?php echo date('d-M-Y') ?>
        </h5>

        </div>
        <div class="logo2 col-sm-2">
        <img src="./images/kpesed.png" alt="kpesed.png">
        </div>
    </div>
</div>

<div class="container">
    <table class="table table-bordered" id="award-list">
        <thead>
    <tr>
        <th>S #</th>
        <th>Adm #</th>
        <th>Roll #</th>
        <th>Name</th>
        <th>Father Name</th>
        <th>Student <br> Signature</th>
        <th>Marks</th>
        <th colspan="2">Marks in words</th>

    </tr>
</thead>
        <?php
        $q="Select * from students_info WHERE
              Class='$class_name'
              AND
              School='$school_name'
              AND
              Status='1' order by Admission_No ASC";
        $qr=mysqli_query($link, $q) or die('Error in Q 1'.mysqli_error($link));
        $i=1;
        while ($qfa=mysqli_fetch_assoc($qr)) {
                echo  '<tr>
                            <td>'.$i. '</td>
                            <td>'.$qfa['Admission_No'].'</td>
                            <td>'.$qfa['Roll_No'].'</td>
                            <td>'.$qfa['Name'].'</td>
                            <td>'.$qfa['FName'].'</td>
                            <td></td>
                            <td></td>
                            <td></td>


                        </tr>';
            $i++;
        }
        ?>
    </table>
    <div class="row">
        <div class="col-sm-6">
    <p class="text-left  sign">Controller of  Examination Signature </p>
    <p class="text-left">___________________ </p>
    </div>
    <div class="col-sm-6">
        <p class="text-right  sign">Examiner Signature </p>
        <p class="text-right">___________________ </p>
    </div>
    </div>
</div>

<?php Page_close(); ?>
