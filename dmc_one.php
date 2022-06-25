<?php

require_once('sand_box.php');
if (isset($_GET['rollno'])){

require_once('db_connection.php');

$link=connect();

$rollno=$_GET['rollno'];
$q="SELECT * FROM students_info WHERE Roll_No=".$rollno;

$qr=mysqli_query($link,$q) or die('Error:'. mysqli_error($link));
$qra=mysqli_fetch_assoc($qr);

$Roll_No= $qra['Roll_No'];
$Name= $qra['Name'];   
$Father_Name=$qra['FName']; 
$Class_Name=$qra['Class'];
$School_Name=$qra['School'];
$Class_Position= $qra['Class_Position'];


$q2="SELECT * FROM marks WHERE Roll_No=".$Roll_No;
$qr2=mysqli_query($link,$q2);
$qra2=mysqli_fetch_assoc($qr2);

 $English_Marks= $qra2['English_Marks'];
 $Urdu_Marks= $qra2['Urdu_Marks'];
 $Maths_Marks= $qra2['Maths_Marks'];
 $Hpe_Marks= $qra2['Hpe_Marks'];
 $Nazira_Marks= $qra2['Nazira_Marks'];
 $Science_Marks= $qra2['Science_Marks'];
 $Arabic_Marks= $qra2['Arabic_Marks'];
 $Islamyat_Marks= $qra2['Islamyat_Marks'];
 $History_Marks= $qra2['History_Marks'];
 $Computer_Marks= $qra2['Computer_Marks'];
 $Mutalia_Marks= $qra2['Mutalia_Marks'];
 $Qirat_Marks= $qra2['Qirat_Marks'];
 $Drawing_Marks= $qra2['Drawing_Marks'];

 $Obtained_Marks=$English_Marks+$Urdu_Marks+$Maths_Marks+$Hpe_Marks+$Nazira_Marks+$Science_Marks+
                  $Arabic_Marks+$Islamyat_Marks+$History_Marks+$Computer_Marks+$Mutalia_Marks+$Qirat_Marks+$Drawing_Marks;
  $Total_Marks=1;
if($Class_Name=="6th" OR $Class_Name=="6th A" OR $Class_Name=="6th B" ){
  $Total_Marks=1100;
 }
 else if ($Class_Name=="7th" OR $Class_Name=="7th A" OR $Class_Name=="7th B" ){
  $Total_Marks=1200;
 }
 else if ($Class_Name=="8th" OR $Class_Name=="8th A" OR $Class_Name=="8th B" ){
  $Total_Marks=1300;
 }

 else {
  $Total_Marks=0;
 }
 
 
    
 $Percentage=round(($Obtained_Marks * 100)/$Total_Marks,2); 
 $Serial_No= $qra2['Serial_No'];
}
else{


  echo "Please Enter Roll No";
}
?>

<?php  page_header('DMC'); ?>

</head>
<body>
<div class="container border border-primary">  
  <div class="container">
    <div class="row" style="margin-top:10px;">
      <div class="col-md-2">
        <img src="images/khyber.png" class="img img-fluid" alt="khyberlogo" height="auto" >
      </div>
      <div class="col-md-8">
        <h3 class="text-center text-uppercase">Government Higher Secondary School</h3>
        <h3 class="text-center text-uppercase">Chitor Swat </h3>
        <h4 class="text-center">Detailed Marks Sheet</h4>
      </div>
      <div class="col-md-2">
        <img src="images/kpesed.png" alt="booklogo" height="auto" class=" img img-fluid" >
      </div>
    </div>
  </div>


  <div class="container">
    <div class="row">
      <div class="col-md-8">
      </div>
      <div class="col-md-3">
        <p class="font-weight-bold text-danger">Serial No  <?php echo $Serial_No; ?> </p>
      </div>
      <div class="col-md-1">
      </div>
    </div>
  </div>
    
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <table class=" table">
            <tr>
              <td> <span class="font-weight-bold"> Name </span> </td> <td> <?php echo $Name;  ?> </td> 
            </tr>
            <tr>
              <td> <span class="font-weight-bold"> Father's Name </span></td> <td> <?php echo $Father_Name;  ?></td> 
            </tr>
            <tr>
              <td> <span class="font-weight-bold"> School </span></td> <td><?php echo $School_Name;  ?></td> 
            </tr>
        </table>
        </div>
        <div class="col-md-4">
           <!--   <center> <img src="images/waqas.jpg" class="img-fluid; max-width:50%; height: auto; img-thumbnail"width="100" height="100" > </center> -->
        </div>
      </div> <!-- Row of Naming and Picture -->
    </div> <!-- Naming information-->
  

  <div class="container">
    <div class="row" style="padding:20px">
      <div class="col-md-4">
        <span class="font-weight-bold"> Roll No </span>  <span> <?php echo $Roll_No;  ?> </span>
      </div>
      <div class="col-md-4">

        <span class="font-weight-bold"> Class </span>   <?php echo $Class_Name;  ?>
      </div>
      <div class="col-md-4">
          <span class="font-weight-bold"> Session </span> 2021 - 2022    
      </div>

    </div>
  </div>
   

  <div class="container"> 
    <div class="row">

        <div class="col-md-11">

          <table class="table table-bordered">
            <thead>
              <th>
                Subjects
              </th>
              <th>
                Total Marks
              </th>
              <th>
                Marks
              </th>

              <th>
                Remarks
              </th>
            </thead>
            <tbody>
              <tr>
                <td>English</td> <td> 100 </td><td> <?php echo $English_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <tr>

                <td>Urdu</td> <td> 100 </td><td> <?php echo $Urdu_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>

              <tr>

                <td>Mathematics</td> <td> 100 </td><td> <?php echo $Maths_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <tr>

                <td>HPE</td> <td> 100 </td><td> <?php echo $Hpe_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <tr>

                <td>Nazira</td> <td> 100 </td><td> <?php echo $Nazira_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <tr>

                <td>General Science</td> <td> 100 </td><td> <?php echo $Science_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <tr>

                <td>Arabic</td> <td> 100 </td><td> <?php echo $Arabic_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <tr>

                <td>Islamyat</td> <td> 100 </td><td> <?php echo $Islamyat_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <tr>

                <td>History & Geopraphy</td> <td> 100 </td><td> <?php echo $History_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <tr>

                <td>Computer Science</td> <td> 100 </td><td> <?php echo $Computer_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
          
              <tr>

                <td>Mutalia Quran</td> <td> 100 </td><td> <?php echo $Mutalia_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <tr>

                <td>Qirat</td> <td> 100 </td><td> <?php echo $Qirat_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <tr>

            <td>Drawing</td> <td> 100 </td><td> <?php echo $Drawing_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
            </tr>
              <tr>

                <td></td> <td> <?php echo $Total_Marks;  ?></td><td> <?php echo $Obtained_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>


            </tbody>
          </table>


          <table class="table table-bordered" style="margin-top:10px "> 
            <tr> 
                  <td> <span class="font-weight-bold">Percentage </span> </td>       <td> <?php echo $Percentage;  ?> </td>  
                  <td> <span class="font-weight-bold"> Class Position </span> </td> <td> <?php echo $Class_Position;  ?> </td> 
            </tr>
          </table>  
        </div>
      <div class="col-md-1">
      </div>
</div>
</div>



<div class="container" style="margin-top:100px ">
<div class="row">
          <div class="col-md-6">
          

            <table class="table">
              <tr> <td> ____________________________ </td> </tr>
              <tr> <td><span class="font-weight-bold"> Controller of Examination</span> </td> </tr>

            </table>
          </div>
          <div class="col-md-2">
          </div>

          <div class="col-md-3">

            <table class="table">
              <tr> <td>____________________________  </td> </tr>
              <tr> <td><span class="font-weight-bold" > Principal</span> </td> </tr>

            </table> 
          </div>
          <div class="col-md-1">
          </div>

       </div>
  </div>     

</div> <!--Overall container -->
<?php page_close(); ?>
