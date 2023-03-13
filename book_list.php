<?php
/**
 * Add Marks of Students
 * php version 8.1
 *
 * @category School_Stock
 * @package  Adf
 *
 * @author Waqas Ahmad <waqaskanju@gmail.com>
 *
 * @license http://www.abc.com MIT
 *
 * @link Adfas
 **/
require_once 'sand_box.php';
require_once 'config.php';
$link=connect();
Page_header('Book List');
?>
</style>
</head>
<body>
<?php
    $class_name=$_GET['class'];
    $class_name = str_replace('\'', '', $class_name);

?>
<div class="container">
    <div class="row m-t-1">
        <div class="log col-sm-2">
            <img src="./images/khyber.png" alt="khyber">
        </div>
        <div class="header text-center col-sm-8">
            <h2>GOVT. HIGHER SECONDARY SCHOOL </h2>
            <h2>CHITOR, DISTRICT SWAT  </h2>
            <h5>Books Issue List 2022-2023  </h5>
            <h5>
                 Class: <?php echo $class_name; ?>
                 Date: <?php  echo date('d-m-Y') ?>
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
    <tr> <th>Serial No</th> <th>Adm No </th> <th>Roll No </th> <th>Name </th>
    <th>Father Name</th> <th>Father CNIC</th><th>Mobile No</th> </tr>
    <thead>
        <?php
        $q="Select * from students_info
        WHERE Class='$class_name'
        AND School='$SCHOOL_NAME'
        AND Status='1' Order by Roll_No ASC";
        $qr=mysqli_query($link, $q) or die('Error in Q 1'.mysqli_error($link));
        $i=1;
        while ($qfa=mysqli_fetch_assoc($qr)) {
            echo  '<tr><td>'.$i. '</td><td>'.$qfa['Admission_No']. '</td>
            <td>'.$qfa['Roll_No']. '</td> <td>'.$qfa['Name']. '</td>
            <td>'.$qfa['FName']. '</td><td>'.$qfa['Father_Cnic']. '</td>
            <td>'.$qfa['Mobile_No']. '</td></tr>';
            $i++;
        }
        ?>
    </table>
</div>
<?php
    Page_close();
?>
