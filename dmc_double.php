<?php

if (isset($_GET['rollno'])) {

    include_once 'db_connection.php';
    include_once 'sand_box.php';
    $link=connect();

    $rollno=$_GET['rollno'];
    $q="SELECT * FROM students_info WHERE Roll_No=".$rollno;

    $qr=mysqli_query($link, $q);
    $qra=mysqli_fetch_assoc($qr);

    $Roll_No= $qra['Roll_No'];
    $Name= $qra['Name'];
    $Father_Name=$qra['FName'];
    $Class_Name=$qra['Class'];
    $School_Name=$qra['School'];
    $Class_Position= $qra['Class_Position'];


    $q2="SELECT * FROM marks WHERE Roll_No=".$Roll_No;
    $qr2=mysqli_query($link, $q2);
    $qra2=mysqli_fetch_assoc($qr2);

    $English_Marks= $qra2['English_Marks'];
    $Urdu_Marks= $qra2['Urdu_Marks'];
    $Maths_Marks= $qra2['Maths_Marks'];
    $Science_Marks= $qra2['Science_Marks'];

    $Obtained_Marks=$English_Marks+$Urdu_Marks+$Maths_Marks+$Science_Marks;
    $Total_Marks=400;
    $Percentage=($Obtained_Marks * 100)/$Total_Marks;
    $Serial_No= $qra2['Serial_No'];
}
else{


    echo "Please Enter Roll No";
}
?>

<?php Page_header('Double DMC'); ?>
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
      <div class="col-md-9">
      </div>
      <div class="col-md-3">
        <p class="font-weight-bold text-danger">Serial No  <?php echo $Serial_No; ?> </p>
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
          <span class="font-weight-bold"> Session </span> 2020 - 2021
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

                <td>General Science</td> <td> 100 </td><td> <?php echo $Science_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <tr>

                <td></td> <td> 400 </td><td> <?php echo $Obtained_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
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


<!--Area 2 Start  -->
<br>
<br>
<br>
<br>
<br>
<br>

<?php

if (isset($_GET['rollno2'])) {



    $rollno=$_GET['rollno2'];
    $q="SELECT * FROM students_info WHERE Roll_No=".$rollno;

    $qr=mysqli_query($link, $q);
    $qra=mysqli_fetch_assoc($qr);

    $Roll_No= $qra['Roll_No'];
    $Name= $qra['Name'];
    $Father_Name=$qra['FName'];
    $Class_Name=$qra['Class'];
    $School_Name=$qra['School'];
    $Class_Position= $qra['Class_Position'];


    $q2="SELECT * FROM marks WHERE Roll_No=".$Roll_No;
    $qr2=mysqli_query($link, $q2);
    $qra2=mysqli_fetch_assoc($qr2);

    $English_Marks= $qra2['English_Marks'];
    $Urdu_Marks= $qra2['Urdu_Marks'];
    $Maths_Marks= $qra2['Maths_Marks'];
    $Science_Marks= $qra2['Science_Marks'];

    $Obtained_Marks=$English_Marks+$Urdu_Marks+$Maths_Marks+$Science_Marks;
    $Total_Marks=400;
    $Percentage=($Obtained_Marks * 100)/$Total_Marks;
    $Serial_No= $qra2['Serial_No'];
}
else{


    echo "Please Enter Roll No";
}
?>

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
      <div class="col-md-9">
      </div>
      <div class="col-md-3">
        <p class="font-weight-bold text-danger">Serial No  <?php echo $Serial_No; ?> </p>
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
          <span class="font-weight-bold"> Session </span> 2020 - 2021
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

                <td>General Science</td> <td> 100 </td><td> <?php echo $Science_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <tr>

                <td></td> <td> 400 </td><td> <?php echo $Obtained_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
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

<!-- Area 2 End -->
<?php Page_close(); ?>
