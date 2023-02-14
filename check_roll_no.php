<?php
     require_once 'db_connection.php';
      $link=connect();
    $roll_no=$_GET['roll_no'];
    
if($_GET['table']=='student') {
    $q="SELECT * from students_info WHERE Roll_No=".$roll_no;
    $qr=mysqli_query($link, $q) or die('Error'.mysqli_error($link));
    $total_rows=mysqli_num_rows($qr);
    if($total_rows>0) { echo "Data already exists.";
    }
}


if($_GET['table']=='marks') {
    $q="SELECT * from marks WHERE Roll_No=".$roll_no;
    $qr=mysqli_query($link, $q) or die('Error'.mysqli_error($link));
    $total_rows=mysqli_num_rows($qr);
    if($total_rows>0) { echo "Data already exists.";
    }
}
?>       