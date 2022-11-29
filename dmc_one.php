<?php

/**
 * Print DMC.
 * php version 8.1
 *
 * @category Student
 *
 * @package None
 *
 * @author Waqas Ahmad <waqas@waqaskanju.com>
 *
 * @license http://www.abc.com MIT
 *
 * @link None
 **/
require_once 'db_connection.php';
require_once 'sand_box.php';
require_once 'config.php';

if (isset($_GET['rollno'])) {



    $link=connect();

    $rollno=$_GET['rollno'];
    $q="SELECT * FROM students_info WHERE Roll_No=".$rollno;

    $qr=mysqli_query($link, $q) or die('Error:'. mysqli_error($link));
    $qra=mysqli_fetch_assoc($qr);

    $Roll_No = $qra['Roll_No'];
    $Name = $qra['Name'];
    $Father_Name = $qra['FName'];
    $Class_Name = $qra['Class'];
    $current_class = $Class_Name;
    $School_Name = $qra['School'];
    $Class_Position = $qra['Class_Position'];


    $q2="SELECT * FROM marks WHERE Roll_No=".$Roll_No;
    $qr2=mysqli_query($link, $q2);
    $qra2=mysqli_fetch_assoc($qr2);

    $English_Marks= $qra2['English_Marks'];
    $Urdu_Marks= $qra2['Urdu_Marks'];
    $Maths_Marks= $qra2['Maths_Marks'];
    $Science_Marks= $qra2['Science_Marks'];
    $Hpe_Marks= $qra2['Hpe_Marks'];
    $Nazira_Marks= $qra2['Nazira_Marks'];
    $History_Marks= $qra2['History_Marks'];
    $Drawing_Marks= $qra2['Drawing_Marks'];
    $Islamyat_Marks= $qra2['Islamyat_Marks'];
    $Computer_Marks= $qra2['Computer_Marks'];
    $Arabic_Marks= $qra2['Arabic_Marks'];
    $Mutalia_Marks= $qra2['Mutalia_Marks'];
    $Qirat_Marks= $qra2['Qirat_Marks'];
    $Pashto_Marks= $qra2['Pashto_Marks'];
    $Social_Marks= $qra2['Social_Marks'];
    $Biology_Marks= $qra2['Biology_Marks'];
    $Chemistry_Marks= $qra2['Chemistry_Marks'];
    $Physics_Marks= $qra2['Physics_Marks'];



    $Obtained_Marks=$English_Marks +
                    $Urdu_Marks +
                    $Maths_Marks +
                    $Science_Marks +
                    $Hpe_Marks +
                    $Nazira_Marks +
                    $History_Marks +
                    $Drawing_Marks +
                    $Islamyat_Marks +
                    $Computer_Marks +
                    $Arabic_Marks +
                    $Mutalia_Marks +
                    $Qirat_Marks +
                    $Pashto_Marks +
                    $Social_Marks +
                    $Biology_Marks +
                    $Chemistry_Marks +
                    $Physics_Marks;


    $Total_Marks=-1;
    if ($Class_Name=="5th" OR $Class_Name=="5th A" OR $Class_Name=="5th B" ) {
        $Total_Marks = $FIFTH_TOTAL_MARKS;
    } else if ($Class_Name=="6th" OR $Class_Name=="6th A" OR $Class_Name=="6th B") {
        $Total_Marks = $SIXTH_TOTAL_MARKS;
        $subject_array = $SIXTH_SUBJECT;
    } else if ($Class_Name=="7th" OR $Class_Name=="7th A" OR $Class_Name=="7th B") {
        $Total_Marks = $SEVENTH_TOTAL_MARKS;
        $subject_array = $SEVENTH_SUBJECT;
    } else if ($Class_Name=="8th" OR $Class_Name=="8th A" OR $Class_Name=="8th B") {
        $Total_Marks = $EIGHTH_TOTAL_MARKS;
        $subject_array = $EIGHTH_SUBJECT;
    } else if ($Class_Name=="9th" OR $Class_Name=="9th A" OR $Class_Name=="9th B") {
        $Total_Marks = $NINTH_TOTAL_MARKS;
        $subject_array = $NINETH_SUBJECT;
    } else if ($Class_Name=="10th"OR$Class_Name=="10th A"OR$Class_Name=="10th B") {
        $Total_Marks=$TENTH_TOTAL_MARKS;
        $subject_array = $TENTH_SUBJECT;

    } else {
        $Total_Marks=-1;
        $subject_array ="not a class";
    }

    $Percentage=round(($Obtained_Marks * 100)/$Total_Marks, 2);
    $Serial_No= $qra2['Serial_No'];
} else {
    echo "Please Enter Roll No";
    exit;
}
?>

<?php  Page_header('DMC of '. $Roll_No); ?>

</head>
<body>
<div class="container border border-primary">
  <div class="container">
    <div class="row" style="margin-top:10px;">
      <div class="col-md-2">
        <img src="images/khyber.png"
              class="img img-fluid"
              alt="khyberlogo"
              height="auto" >
      </div>
      <div class="col-md-8">
        <h3 class="text-center text-uppercase">
          Government Higher Secondary School
        </h3>
        <h3 class="text-center text-uppercase">Chitor Swat </h3>
        <h4 class="text-center">Detailed Marks Sheet</h4>
      </div>
      <div class="col-md-2">
        <img src="images/kpesed.png"
             alt="booklogo"
             height="auto"
             class="img img-fluid">
      </div>
    </div>
  </div>


  <div class="container">
    <div class="row">
      <div class="col-md-8">
      </div>
      <div class="col-md-3">
        <p class="font-weight-bold text-danger">
            Serial No
          <?php echo $Serial_No; ?>
        </p>
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
              <td>
                <span class="font-weight-bold"> Name </span> </td>
              <td> <?php echo $Name;  ?> </td>
            </tr>
            <tr>
              <td>
                <span class="font-weight-bold"> Father's Name </span></td>
                <td> <?php echo $Father_Name;  ?></td>
            </tr>
            <tr>
              <td>
                <span class="font-weight-bold"> School </span> </td>
                <td><?php echo $School_Name;?> </td>
            </tr>
        </table>
        </div>
        <div class="col-md-4">
            <center>
              <img src="pictures/<?php echo $rollno ?>.png"
                  class="img-fluid; max-width:50%; height: auto; img-thumbnail"
                  width="200"
                  height="200">
            </center>
        </div>
      </div> <!-- Row of Naming and Picture -->
    </div> <!-- Naming information-->


  <div class="container">
    <div class="row" style="padding:20px">
      <div class="col-md-4">
        <span class="font-weight-bold"> Roll No </span>
        <span> <?php echo $Roll_No;  ?> </span>
      </div>
      <div class="col-md-4">
        <span class="font-weight-bold"> Class </span>
        <?php echo $Class_Name;?>
      </div>
      <div class="col-md-4">
          <span class="font-weight-bold"> Session </span>
          <?php echo  date('Y')-1 . "-" ;
                echo date('Y');
          ?>
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
              <?php if (Select_Class_subject($Class_Name, "English", $subject_array)) { ?>
                <td>English</td> <td> 100 </td><td> <?php echo $English_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <?php }?>
              <?php if (Select_Class_subject($Class_Name, "Urdu", $subject_array)) { ?>
              <tr>

                <td>Urdu</td> <td> 100 </td><td> <?php echo $Urdu_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <?php }?>
              <?php if (Select_Class_subject($Class_Name, "Maths", $subject_array)) { ?>

                <tr>
                <td>Mathematics</td> <td> 100 </td><td> <?php echo $Maths_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <?php }?>
              <tr>
              <?php if (Select_Class_subject($Class_Name, "HPE", $subject_array)) { ?>
                <td>HPE</td> <td> 100 </td><td> <?php echo $Hpe_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <?php }?>
              <?php if (Select_Class_subject($Class_Name, "Nazira", $subject_array)) { ?>
              <tr>

                <td>Nazira</td> <td> 100 </td><td> <?php echo $Nazira_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <?php }?>
              <?php if (Select_Class_subject($Class_Name, "General Science", $subject_array)) { ?>
              <tr>

                <td>General Science</td> <td> 100 </td><td> <?php echo $Science_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <?php }?>
              <?php if (Select_Class_subject($Class_Name, "Arabic", $subject_array)) { ?>
              <tr>

                <td>Arabic</td> <td> 100 </td><td> <?php echo $Arabic_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <?php }?>
              <?php if (Select_Class_subject($Class_Name, "Islamyat", $subject_array)) { ?>
              <tr>

                <td>Islamyat</td> <td> 100 </td><td> <?php echo $Islamyat_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <?php }?>
              <?php if (Select_Class_subject($Class_Name, "History and Geography", $subject_array)) { ?>

                <tr>

                <td>History & Geopraphy</td> <td> 100 </td><td> <?php echo $History_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>

              <?php }?>
              <?php if (Select_Class_subject($Class_Name, "Pak Study", $subject_array)) { ?>

        <tr>

        <td>Pak Study/ Social Study</td> <td> 100 </td><td> <?php echo $Social_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
      </tr>

      <?php }?>
              <?php if (Select_Class_subject($Class_Name, "Computer Science", $subject_array)) { ?>
              <tr>

                <td>Computer Science</td> <td> 100 </td><td> <?php echo $Computer_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <?php }?>
              <?php if (Select_Class_subject($Class_Name, "Mutalia Quran", $subject_array)) { ?>
              <tr>

                <td>Mutalia Quran</td> <td> 100 </td><td> <?php echo $Mutalia_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <?php }?>
              <?php if (Select_Class_subject($Class_Name, "Qirat", $subject_array)) { ?>
              <tr>

                <td>Qirat</td> <td> 100 </td><td> <?php echo $Qirat_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <?php }?>
              <?php if (Select_Class_subject($Class_Name, "Drawing", $subject_array)) { ?>
              <tr>
            <td>Drawing</td> <td> 100 </td><td> <?php echo $Drawing_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
            </tr>
            <?php }?>
              <tr>
              <?php if (Select_Class_subject($Class_Name, "Pashto", $subject_array)) { ?>
              <tr>
            <td>Pashto</td> <td> 100 </td><td> <?php echo $Pashto_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
            </tr>
            <?php }?>
            <tr>
              <?php if (Select_Class_subject($Class_Name, "Biology", $subject_array)) { ?>
              <tr>
            <td>Biology</td> <td> 100 </td><td> <?php echo $Biology_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
            </tr>
            <?php }?>
            <tr>
              <?php if (Select_Class_subject($Class_Name, "Chemistry", $subject_array)) { ?>
              <tr>
            <td>Chemistry</td> <td> 100 </td><td> <?php echo $Chemistry_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
            </tr>
            <?php }?>
            <tr>
              <?php if (Select_Class_subject($Class_Name, "Physics", $subject_array)) { ?>
              <tr>
            <td>Physics</td> <td> 100 </td><td> <?php echo $Physics_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
            </tr>
            <?php }?>
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
<?php Page_close(); ?>
