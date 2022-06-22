<?php 
require_once('sand_box.php');
$link=connect();
page_header('Print Subject Exam Sheet');
?>
<style>
    @media print {
    .same-page {
      break-inside: avoid;
    }

   table.table-bordered{
    border:1px solid red;
    margin-top:20px;
    color:blue;
}

  }


  
</style>
</head>
<body>
<?php  
    $class_name=$_GET['class'];
    $class_name=str_replace( '\'', '', $class_name ); 
    $school_name=$_GET['School'];
    $school_name=str_replace( '\'', '', $school_name ); 

?>
<div class="container">
    <div class="row m-t-1">
        <div class="log col-sm-2">
            <img src="./images/khyber.png" alt="khyber">
        </div>
        <div class="header text-center col-sm-8">
        <h2>GOVT. HIGHER SECONDARY SCHOOL </h2>
        <h2 >  CHITOR, DISTRICT SWAT  </h2>
        <h5>Attendance Sheet  Final Examination Session 2021-2022 Class <?php echo $school_name; ?>  <?php echo $class_name; ?> </h5> 
        <h4> Subject: ____________________  Date:_______________________</h4>
       <!-- <h4> Final Examination Session 2021-2022 Class <?php echo $class_name; ?> </h4>  -->
        </div>
        <div class="logo2 col-sm-2">
        <img src="./images/kpesed.png" alt="kpesed.png">
        </div>
    </div>
</div>

<div class="container">
    <table class="table table-bordered" id="award-list">
        <thead>
    <tr> <th>Serial No</th> <th>Roll No </th> <th>Name </th> <th>Father Name</th> <th>Signature</th><th>Marks</th> </tr>
    <thead>
        <?php
     $q="Select * from students_info WHERE Class='$class_name' AND School='$school_name' AND Status='1'";
        $qr=mysqli_query($link,$q) or die('Error in Q 1'.mysqli_error($link));
        $i=1;
        while($qfa=mysqli_fetch_assoc($qr))
        {
          echo  '<tr><td>'.$i. '</td><td>'.$qfa['Roll_No']. '</td><td>'.$qfa['Name']. '</td><td>'.$qfa['FName']. '</td><td></td><td></td></tr>';
        $i++;
        }
        ?>
    </table>
        <p class="text-right  sign">Examiner Signature </p>
        <p class="text-right">___________________ </p>
</div>


<?php

page_close();
?>