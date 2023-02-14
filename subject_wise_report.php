<?php
/**
 * Report of A class
 * php version 8.1
 *
 * @category Report
 *
 * @package none
 *
 * @author Waqas Ahmad <waqaskanju@gmail.com>
 *
 * @license http://www.waqaskanju.com/license MIT
 *
 * @link http://www.waqaskanju.com/
 **/
require_once 'db_connection.php';
require_once 'sand_box.php';
require_once 'config.php';
$link=connect();
?>
<?php Page_header("Subject Wise Report"); ?>
</head>
<body>
  
<?php

$class= '6th';
$class_subjects=select_subjects_of_class($class);
for($i=0;$i<count($class_subjects);$i++){
$subject= $class_subjects[$i]['Name'];

$teacher_name=subject_teacher($link,$class,$subject);

//$subject_id=convert_subject_name_to_id($link,$subject);

$teacher =$teacher_name;

// NO of students appear in exam
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





$subject_marks = change_subject_to_marks_col($subject);
$school ="GHSS CHITOR";
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
<h3 class="text-center"> Report of Class <?php echo $class; ?>  Subject <?php echo $subject; ?> Teacher <?php echo $teacher; ?></h3>
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


    <script>

    const mydata=[
    <?php echo $first_division;?>,
    <?php echo $second_division;?>,
    <?php echo $third_division;?>,
    <?php echo $fail;?>
  ];
    </script>

    <div>
  <canvas id="myChart"></canvas>
</div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['1st Division', '2nd Division', '3rd Division', 'Fail'],
      datasets: [{
        label: 'Result of class: <?php echo $class ?> Subject: <?php echo $subject; ?> Teacher: <?php echo $teacher; ?>',
        data: mydata,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
<?php } ?>
<?php Page_close(); ?>
