<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.container {
  position: relative;
  text-align: center;
  color: white;
}


.top-left-logo {
  position: absolute;
  top: 5em;
  left: 5em;
}
.top-center-school-name {
  position: absolute;
  top: 5em;
  left: 13em;
}


.bottom-right {
  position: absolute;
  bottom: 4em;
  right: 7em;
}

.centered {
  position: absolute;
  top: 40%;
  left: 10%;

}

.color-black {
  color:black;
}

.text-uppercase {
  text-transform: uppercase;
}

.text-body {
  text-align: left;
  text-align: justify;
  text-justify: inter-word;
  font-size: 20px;
  line-height: 30px;
  width: 85%;
}
</style>
</head>
<?php
require_once 'sand_box.php';
$link=$LINK;
$rollno1=$_GET['rollno1'];
$rollno2=$_GET['rollno2'];
    // Select detail of Student based on Roll No.
    $q="SELECT Roll_No,Name,FName,Graduation_Year FROM students_info
    WHERE Roll_No='".$rollno1."' OR Roll_No='".$rollno2."'";
    $qr=mysqli_query($link, $q) or die('Error:'. mysqli_error($link));

    if(mysqli_num_rows($qr)<2) {
      $name1=$data_row_1['Name'];
      $fname1=$data_row_1['FName'];
      $name2=$data_row_2="_________________";
      $fname2=$data_row_2="_________________";
      $previous_year=$graduation_year-1;
      $current_year=$graduation_year-2000;
      $session1= $previous_year ."-". $current_year;

    } else {
    $data_row_1=mysqli_fetch_assoc($qr);
    $name1=$data_row_1['Name'];
    $fname1=$data_row_1['FName'];
    $graduation_year1=$data_row_1['Graduation_Year'];
    $previous_year1=$graduation_year1-1;
    $current_year1=$graduation_year1-2000;
    $session1= $previous_year1 ."-". $current_year1;

    $data_row_2=mysqli_fetch_assoc($qr);
    $name2=$data_row_2['Name'];
    $fname2=$data_row_2['FName'];
    $graduation_year2=$data_row_2['Graduation_Year'];
    $previous_year2=$graduation_year2-1;
    $current_year2=$graduation_year2-2000;
    $session2=$previous_year2 ."-". $current_year2;
    }



?>
<body>
<div class="container">
  <img src="images/flower_design.jpg" alt="Snow" style="width:100%;">
  <div class="top-left-logo"><img src="./images/khyber.png"></div>
  <div class="top-center-school-name color-black">
      <h3 class="text-center text-uppercase">
      Government Higher Secondary School
      </h3>
      <h3 class=" text-uppercase">Chitor District Swat </h3>
      <h3 class=" text-uppercase mt-3 mb-3"><u>Character Certificate</u></h3>
  </div>

  <div class="centered color-black">
    <p class="text-body">This is to certify that <u><b>Mr. <?php echo $name1; ?></b></u> S/O <u><b>Mr. <?php echo $fname1?></b></u>
      has been  a regular
      student of  class 10th during the session <?php echo $session1;?> During his stay at the school,
      he has been obedient, hardworking and punctual. He bears good moral character.
      I wish him success in future.
    </p>
  </div> <!--end of central container-->
  <div class="bottom-right color-black"> <h4>Principal<h4>
    <h5>GHSS CHITOR SWAT<h5>
  </div>
</div>  <!-- End of container-->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="container">
  <img src="images/flower_design.jpg" alt="Snow" style="width:100%;">
  <div class="top-left-logo"><img src="./images/khyber.png"></div>
  <div class="top-center-school-name color-black">
      <h3 class="text-center text-uppercase">
      Government Higher Secondary School
      </h3>
      <h3 class=" text-uppercase">Chitor District Swat </h3>
      <h3 class=" text-uppercase mt-3 mb-3"><u>Character Certificate</u></h3>
  </div>

  <div class="centered color-black">
    <p class="text-body">This is to certify that <u><b>Mr. <?php echo $name2; ?></b></u> S/O <u><b>Mr. <?php echo $fname2?></b></u>
      has been  a regular
      student of  class 10th during the session <?php echo $session2;?> During his stay at theschool,
      he has been obedient, hardworking and punctual. He bears good moral character.
      I wish him success in future.
    </p>
  </div> <!--end of central container-->
  <div class="bottom-right color-black"> <h4>Principal<h4>
    <h5>GHSS CHITOR SWAT<h5>
  </div>
</div>

</body>
</html>
