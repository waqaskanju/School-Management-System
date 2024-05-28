<?php
/**
 * Report of A class
 * php version 8.1
 *
 * @category Report
 *
 * @package None
 *
 * @author Waqas Ahmad <waqaskanju@gmail.com>
 *
 * @license http://www.waqaskanju.com/license MIT
 *
 * @link http://www.waqaskanju.com/
 **/
session_start();
require_once 'sand_box.php';
$link=$LINK;
?>
<?php Page_header("Subject Wise Report"); ?>
</head>
<body>
<?php require_once 'nav.html';?>

<div class="container-fluid no-print">
<div class="bg-warning text-center">
    <h4>Subject wise Result Report</h4>
</div>
  <form action="#" method="GET">
        <div class="row">
            <?php
            $class_name='7th';
            $school_name=$SCHOOL_NAME;
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
    $class=$_GET['class_exam'];
    $class=Validate_input($class);

    $school=$_GET['school'];
    $school=Validate_input($school);
?>
<!-- Page Header -->
<div id="spinner">
  <img src="./images/spinner.gif" alt="spinner">
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2">
      <img class="img-fluid" src="./images/khyber.png" alt="khyber">
    </div>
    <div class="text-center col-sm-8">
      <h3> <?php echo $SCHOOL_FULL_NAME; ?> </h3>
      <h3>  <?php echo $SCHOOL_LOCATION; ?> </h3>
      <h5>
        Report of Class <?php echo $class ?>
          <?php
          // from config page
            echo $class_result_header;
            ?>
      </h5>
             <h6>
            Print Date: <?php echo date('d-M-Y') ?>
            School Name: <?php echo $school_name ?>

        </h6>
      </div>
      <div class="col-sm-2">
        <img class="img-fluid" src="./images/kpesed.png" alt="kpesed.png">
      </div>
    </div> <!--row end -->
  </div> <!--fluid end -->

<!-- Page Header End -->


<?php

    $class_subjects=select_subjects_of_class($school, $class);
    for ($i=0;$i<count($class_subjects);$i++) {
        $subject=$class_subjects[$i]['Name'];
        $teacher_name=subject_teacher($class, $subject);
        $teacher=$teacher_name;
        // No of students appear in exam
        $present=0;
        // No of absent students
        $absent=0;
        // Sixty % and above
        $first_division=0;
        // from 50 till 59
        $second_division=0;
        // from 33% to 49%
        $third_division=0;
        // Total No of students appear in exam.
        $total_appear=0;
        // Pass studetns;
        $pass=0;
        // Fail Studetns
        $fail=0;
        $total_students=0;

        $subject_marks=Change_Subject_To_Marks_col($subject);
        $total_marks = 40;
        $q="SELECT students_info.Roll_No, marks.".$subject_marks." from students_info
            inner join marks ON students_info.Roll_NO=marks.Roll_No
            WHERE Class='".$class."'
            AND School='".$school."' AND Status=1";

        $exe=mysqli_query($link, $q) or die('error'.mysqli_error($link));
        $total_students=mysqli_num_rows($exe);
        while ($exe_response=mysqli_fetch_assoc($exe)) {
            $roll_no=$exe_response['Roll_No'];
            $marks=$exe_response[$subject_marks];
            $percentage=0;
            if ($marks == -1) {
                $absent = $absent+1;
            } else {
                $percentage=$marks*100/$total_marks;
                if ($percentage>=60) {
                    $first_division = $first_division+1;
                } else if ($percentage >=50 && $percentage<60) {
                      $second_division = $second_division+1;
                } else if ($percentage>=33 && $percentage<50) {
                      $third_division = $third_division+1;
                } else if ($percentage>=0 && $percentage<33) {
                      $fail = $fail+1;
                }
            }
        }
        ?>
<h5 class="text-center mt-3">
  <!-- Report of Class
        <?php echo $class; ?> -->
        Subject <?php echo $subject; ?>
        Teacher <?php echo $teacher; ?></h5>
        <table border="1">
        <tr>
            <td> Class</td>  <td> <?php echo $class ?> </td>
            <td> Subject</td>  <td> <?php echo $subject ?> </td>
            <td> Teacher</td>  <td> <?php echo $teacher ?> </td>
        </tr>
        <tr>
            <td>Total Students</td>  <td> <?php echo $total_students; ?> </td>
            <td> Present</td> <td><?php echo $present=$total_students-$absent;?></td>
            <td> Absent</td>  <td> <?php echo $absent; ?> </td>
        </tr>
        <tr>
            <td>Total Appeared in Exam </td>  <td>
                <?php echo $total_appear = $total_students-$absent; ?></td>
            <td> Pass (33% and above)</td>  <td>
                <?php echo $first_division+$second_division+$third_division ?></td>
            <td> Fail (less then 33%)</td>  <td>
                <?php echo $fail ?> </td>
        </tr>
        <tr>
            <td>1st Division (60% - 100%)</td><td><?php echo $first_division ?></td>
            <td>2nd Division (50% - 59%)</td><td><?php echo $second_division ?></td>
            <td>3rd Division (33% - 49%)</td><td><?php echo $third_division ?></td>
        </tr>
    </table>
    <div>
</div>
<script>
      document.getElementById('spinner').style.display = "none";
</script>
    <?php }

} //End of Submit if.
?>
<?php Page_close(); ?>
