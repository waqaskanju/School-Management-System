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
Page_Header('Award list CLass ');
?>
</style>
</head>
<body>
<?php
    $class_name=$_GET['class'];
    $class_name=str_replace('\'', '', $class_name);
    $school_name=$_GET['School'];
    $school_name=str_replace('\'', '', $school_name);

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
            Attendance Sheet  Monthly Test Oct 2022  Class:
            <?php echo $class_name;  ?>
        </h5>
        <!-- <h5> School Name:  <?php // echo $school_name; ?>  </h5>
        <h5>  Class: <?php // echo $class_name;  ?> </h5>-->
        <h4> Subject: ____________________  Date: <?php echo date('d-M-Y') ?>
       <!-- <h4>
        Final Examination Session 2021-2022 Class
        </h4>  -->
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
        <th>Serial No</th>
        <th>Admission No </th>
        <th>Roll No </th>
        <th>Name </th>
        <th>Father Name</th>
        <th>Signature</th>
        <th>Marks</th>
    </tr>
    <thead>
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
