<?php
require_once('sand_box.php');
$link=connect();
page_header('Book List');
?>
</style>
</head>
<body>
<?php
    $class_name=$_GET['class'];
    $class_name=str_replace( '\'', '', $class_name );

?>
<div class="container">
    <div class="row m-t-1">
        <div class="log col-sm-2">
            <img src="./images/khyber.png" alt="khyber">
        </div>
        <div class="header text-center col-sm-8">
            <h2>GOVT. HIGHER SECONDARY SCHOOL </h2>
            <h2>CHITOR, DISTRICT SWAT  </h2>
            <h5>Class Test </h5>
            <h5> Class: <?php echo $class_name; ?>   Date: <?php  echo date('d-m-Y') ?> </h5>
        </div>
        <div class="logo2 col-sm-2">
        <img src="./images/kpesed.png" alt="kpesed.png">
        </div>
    </div>
</div>

<div class="container">
    <table class="table table-bordered" id="award-list">
        <thead>
    <tr> <th>Serial No</th> <th>Name </th> <th>Father Name</th> <th>Test 1</th><th>Test 2</th><th>Test 3</th><th>Test 4</th> <th>Test 5</th> <th>Test 6</th> <th>Test 7</th> <th>Test 8</th><th>Test 9</th><th>Test 10</th><th>Test 11</th><th>Test 12</th> </tr>
    <thead>
        <?php
        $q="Select * from students_info WHERE Class='$class_name' AND School='GHSS CHITOR' AND Status='1' Order by Admission_No ASC";
        $qr = mysqli_query($link, $q) or die('Error in Q 1'.mysqli_error($link));
        $i=1;
        while ($qfa=mysqli_fetch_assoc($qr)) {
            echo  '<tr><td>'.$i. '</td><td>'.$qfa['Name']. '</td><td>'.$qfa['FName']. '</td> <td> Marks</td> <td> Remarks</td> </tr>';
        $i++;
        }
        ?>
    </table>
</div>


<?php

page_close();
?>
