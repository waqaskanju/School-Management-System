<?php
/**
 * Home Work list
 * php version 8.1
 *
 * @category Student List
 * @package  None
 *
 * @author Waqas Ahmad <waqaskanju@gmail.com>
 *
 * @license http://www.abc.com MIT
 *
 * @link None
 **/
session_start();
require_once 'sand_box.php';
$link=$LINK;
Page_header('Home Work list');
?>
</style>
</head>
<body>
<?php require_once 'nav.html';?>
<div class="container">
  <form class="no-print" action="#" method="GET" >
    <div class="row">
      <?php
        // Default values are coming from Config.php
        $selected_class=$CLASS_NAME;
        $selected_school=$SCHOOL_NAME;
        select_class($selected_class);
        select_school($selected_school);
        ?>
      </div>
      <button type="submit" name="submit" class="btn btn-primary mt-1">
        Show Home work List
      </button>
    </form>
  </div>
<?php
if (isset($_GET['submit'])) {
    $class_name=$_GET['class_exam'];
    $class_name=Validate_input($class_name);

    $school_name=$_GET['school'];
    $school_name=Validate_input($school_name);
} else {
    $class_name=$CLASS_NAME;
    $school_name=$SCHOOL_NAME;
}
?>
<div class="container">
<?php include_once 'nav.html'; ?>
  <div class="row m-t-1">
    <div class="log col-sm-2">
        <img src="./images/khyber.png" alt="khyber">
    </div>
    <div class="header text-center col-sm-8">
    <h2><?php echo $SCHOOL_FULL_NAME; ?> </h2>
      <h2><?php echo  $SCHOOL_LOCATION; ?>  </h2>
        <h5>Summer/Winter Vocation Homework List

      </h5>
        <h5>
              Class: <?php echo $class_name; ?>
              Date: <?php// echo date('d-m-Y') ?>
        </h5>
    </div>
    <div class="logo2 col-sm-2">
      <img src="./images/kpesed.png" alt="kpesed.png">
    </div>
  </div>
</div>

<div class="container">
    <table class="border border-dark" id="award-list">
        <thead>
    <tr> 
    <th class="border border-dark fw-bolder">Serial No</th> 
    <th class="border border-dark fw-bolder">Roll No </th> 
    <th class="border border-dark fw-bolder">Name </th>
     <th class="border border-dark fw-bolder">Father Name</th>
     <?php
        $subjects=Select_Subjects_Of_class($school_name, $class_name);
        $number_of_subjects=count($subjects);
        for ($i=0; $i<count($subjects); $i++) {
            echo "<th class='border border-dark fw-bolder'>".$subjects[$i]['Name']."</th>";
        }
        ?>
    <!-- <th> Signature</th> -->
    </tr>
  </thead>
  <tbody>
        <?php
        $q="Select Roll_No,Name,FName from students_info
        WHERE Class='$class_name'
        AND School='$SCHOOL_NAME'
        AND Status='1' Order by Roll_No ASC";
        $qr=mysqli_query($link, $q) or die('Error in Q 1'.mysqli_error($link));
        $i=1;
        while ($qfa=mysqli_fetch_assoc($qr)) {
            echo  '<tr>
            <td class="border border-dark fw-bolder">'.$i. '</td>
            <td class="border border-dark fw-bolder">'.$qfa['Roll_No'].'</td>
            <td class="border border-dark fw-bolder">'.$qfa['Name'].'</td>
            <td class="border border-dark fw-bolder">'.$qfa['FName'].'</td>';

            for ($j=1;$j<=$number_of_subjects;$j++) {
                echo "<td class='border border-dark fw-bolder'></td>";
            }

           // echo'<td class="border border-dark fw-bolder"></td></tr>';
            $i++;
        }
        ?>
        </tbody>
    </table>
</div>
<?php
    Page_close();
?>
