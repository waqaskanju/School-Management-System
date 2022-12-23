<?php

/**
 * Print DMC.
 * php version 8.1
 *
 * @category DMC
 *
 * @package None
 *
 * @author Waqas Ahmad <waqas@waqaskanju.com>
 *
 * @license http://www.waqaskanju.com/license MIT
 *
 * @link http://www.waqaskanju.com/
 **/
require_once 'db_connection.php';
require_once 'sand_box.php';
require_once 'config.php';

if (isset($_GET['rollno'])) {
    $link=connect();
    $rollno=$_GET['rollno'];
    $q="SELECT * FROM students_info WHERE Roll_No=".$rollno;
    save_log_data($q);
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



    $Obtained_Marks=Change_Absent_tozero($English_Marks) +
    Change_Absent_tozero($Urdu_Marks) +
    Change_Absent_tozero($Maths_Marks) +
    Change_Absent_tozero($Science_Marks) +
    Change_Absent_tozero($Hpe_Marks) +
    Change_Absent_tozero($Nazira_Marks) +
    Change_Absent_tozero($History_Marks) +
    Change_Absent_tozero($Drawing_Marks) +
    Change_Absent_tozero($Islamyat_Marks) +
    Change_Absent_tozero($Computer_Marks) +
    Change_Absent_tozero($Arabic_Marks) +
    Change_Absent_tozero($Mutalia_Marks) +
    Change_Absent_tozero($Qirat_Marks) +
    Change_Absent_tozero($Pashto_Marks) +
    Change_Absent_tozero($Social_Marks) +
    Change_Absent_tozero($Biology_Marks) +
    Change_Absent_tozero($Chemistry_Marks) +
    Change_Absent_tozero($Physics_Marks);


    $All_Subjects_Total_Marks=-1;
    if ($Class_Name=="5th" OR $Class_Name=="5th A" OR $Class_Name=="5th B" ) {
      $All_Subjects_Total_Marks = class_total_marks($Class_Name);
    } else if ($Class_Name=="6th" OR $Class_Name=="6th A" OR $Class_Name=="6th B") {
      $All_Subjects_Total_Marks = $SIXTH_TOTAL_MARKS;
        $subject_array = class_total_marks($Class_Name);
    } else if ($Class_Name=="7th" OR $Class_Name=="7th A" OR $Class_Name=="7th B") {
      $All_Subjects_Total_Marks = $SEVENTH_TOTAL_MARKS;
        $subject_array = class_total_marks($Class_Name);
    } else if ($Class_Name=="8th" OR $Class_Name=="8th A" OR $Class_Name=="8th B") {
      $All_Subjects_Total_Marks = class_total_marks($Class_Name);
        $subject_array = $EIGHTH_SUBJECT;
    } else if ($Class_Name=="9th" OR $Class_Name=="9th A" OR $Class_Name=="9th B") {
      $All_Subjects_Total_Marks = class_total_marks($Class_Name);
        $subject_array = $NINETH_SUBJECT;
    } else if ($Class_Name=="10th"OR$Class_Name=="10th A"OR$Class_Name=="10th B") {
      $All_Subjects_Total_Marks=class_total_marks($Class_Name);
        $subject_array = $TENTH_SUBJECT;

    } else {
      $All_Subjects_Total_Marks=-1;
        $subject_array ="not a class";
    }

    $Percentage=round(($Obtained_Marks * 100)/$All_Subjects_Total_Marks, 2);
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
<?php
$Total_Marks=[];
$Total_Marks['English']=subject_total_marks($link,$Class_Name,"English");
$Total_Marks['Urdu']=subject_total_marks($link,$Class_Name,"Urdu");
$Total_Marks['Maths']=subject_total_marks($link,$Class_Name,"Maths");
$Total_Marks['Hpe']=subject_total_marks($link,$Class_Name,"Hpe");
$Total_Marks['Nazira']=subject_total_marks($link,$Class_Name,"Nazira");
$Total_Marks['Science']=subject_total_marks($link,$Class_Name,"General Science");
$Total_Marks['Arabic']=subject_total_marks($link,$Class_Name,"Arabic");
$Total_Marks['Islamyat']=subject_total_marks($link,$Class_Name,"Islamyat");
$Total_Marks['History']=subject_total_marks($link,$Class_Name,"History And Geography");
$Total_Marks['Social']=subject_total_marks($link,$Class_Name,"Social Study");
$Total_Marks['Social']=subject_total_marks($link,$Class_Name,"Pak Study");
$Total_Marks['Computer']=subject_total_marks($link,$Class_Name,"Computer Science");
$Total_Marks['Mutalia']=subject_total_marks($link,$Class_Name,"Mutalia Quran");
$Total_Marks['Qirat']=subject_total_marks($link,$Class_Name,"Qirat");
$Total_Marks['Drawing']=subject_total_marks($link,$Class_Name,"Drawing");
$Total_Marks['Pashto']=subject_total_marks($link,$Class_Name,"Pashto");
$Total_Marks['Physics']=subject_total_marks($link,$Class_Name,"Physics");
$Total_Marks['Chemistry']=subject_total_marks($link,$Class_Name,"Chemistry");
$Total_Marks['Biology']=subject_total_marks($link,$Class_Name,"Biology");
?>

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
                <td>English</td> <td> <?php echo $Total_Marks['English']; ?> </td><td> <?php echo Show_absent($English_Marks);  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <?php }?>
              <?php if (Select_Class_subject($Class_Name, "Urdu", $subject_array)) { ?>
              <tr>

                <td>Urdu</td> <td> <?php echo $Total_Marks['Urdu']; ?> </td><td> <?php echo Show_absent($Urdu_Marks);  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <?php }?>
              <?php if (Select_Class_subject($Class_Name, "Maths", $subject_array)) { ?>

                <tr>
                <td>Mathematics</td> <td> <?php echo $Total_Marks['Maths']; ?> </td><td> <?php echo Show_absent($Maths_Marks);  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <?php }?>
              <tr>
              <?php if (Select_Class_subject($Class_Name, "HPE", $subject_array)) { ?>
                <td>HPE</td> <td> <?php echo $Total_Marks['Hpe']; ?> </td><td> <?php echo Show_absent($Hpe_Marks);  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <?php }?>
              <?php if (Select_Class_subject($Class_Name, "Nazira", $subject_array)) { ?>
              <tr>

                <td>Nazira</td> <td> <?php echo $Total_Marks['Nazira']; ?> </td><td> <?php echo Show_absent($Nazira_Marks);  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <?php }?>
              <?php if (Select_Class_subject($Class_Name, "General Science", $subject_array)) { ?>
              <tr>

                <td>General Science</td> <td> <?php echo $Total_Marks['Science']; ?> </td><td> <?php echo Show_absent($Science_Marks);  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <?php }?>
              <?php if (Select_Class_subject($Class_Name, "Arabic", $subject_array)) { ?>
              <tr>

                <td>Arabic</td> <td> <?php echo $Total_Marks['Arabic']; ?> </td><td> <?php echo Show_absent($Arabic_Marks);  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <?php }?>
              <?php if (Select_Class_subject($Class_Name, "Islamyat", $subject_array)) { ?>
              <tr>

                <td>Islamyat</td> <td> <?php echo $Total_Marks['Islamyat']; ?> </td><td> <?php echo Show_absent($Islamyat_Marks);  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <?php }?>
              <?php if (Select_Class_subject($Class_Name, "History and Geography", $subject_array)) { ?>

                <tr>

                <td>History & Geopraphy</td> <td> <?php echo $Total_Marks['History']; ?> </td><td> <?php echo Show_absent($History_Marks);  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>

              <?php }?>
              <?php if (Select_Class_subject($Class_Name, "Pak Study", $subject_array)) { ?>

        <tr>

        <td>Pak Study/ Social Study</td> <td> <?php echo $Total_Marks['Social']; ?> </td><td> <?php echo Show_absent($Social_Marks);  ?></td>  <td> <!-- Pass/Fall --></td>
      </tr>

      <?php }?>
              <?php if (Select_Class_subject($Class_Name, "Computer Science", $subject_array)) { ?>
              <tr>

                <td>Computer Science</td> <td> <?php echo $Total_Marks['Computer']; ?> </td><td> <?php echo Show_absent($Computer_Marks);  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <?php }?>
              <?php if (Select_Class_subject($Class_Name, "Mutalia Quran", $subject_array)) { ?>
              <tr>

                <td>Mutalia Quran</td> <td> <?php echo $Total_Marks['Mutalia']; ?> </td><td> <?php echo Show_absent($Mutalia_Marks);  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <?php }?>
              <?php if (Select_Class_subject($Class_Name, "Qirat", $subject_array)) { ?>
              <tr>

                <td>Qirat</td> <td> <?php echo $Total_Marks['Qirat']; ?> </td><td> <?php echo Show_absent($Qirat_Marks);  ?></td>  <td> <!-- Pass/Fall --></td>
              </tr>
              <?php }?>
              <?php if (Select_Class_subject($Class_Name, "Drawing", $subject_array)) { ?>
              <tr>
            <td>Drawing</td> <td> <?php echo $Total_Marks['Drawing']; ?> </td><td> <?php echo Show_absent($Drawing_Marks);  ?></td>  <td> <!-- Pass/Fall --></td>
            </tr>
            <?php }?>
              <tr>
              <?php if (Select_Class_subject($Class_Name, "Pashto", $subject_array)) { ?>
              <tr>
            <td>Pashto</td> <td> <?php echo $Total_Marks['Pashto']; ?> </td><td> <?php echo Show_absent($Pashto_Marks);  ?></td>  <td> <!-- Pass/Fall --></td>
            </tr>
            <?php }?>
            <tr>
              <?php if (Select_Class_subject($Class_Name, "Biology", $subject_array)) { ?>
              <tr>
            <td>Biology</td> <td> <?php echo $Total_Marks['Biology']; ?> </td><td> <?php echo Show_absent($Biology_Marks);  ?></td>  <td> <!-- Pass/Fall --></td>
            </tr>
            <?php }?>
            <tr>
              <?php if (Select_Class_subject($Class_Name, "Chemistry", $subject_array)) { ?>
              <tr>
            <td>Chemistry</td> <td> <?php echo $Total_Marks['Chemistry']; ?> </td><td> <?php echo Show_absent($Chemistry_Marks);  ?></td>  <td> <!-- Pass/Fall --></td>
            </tr>
            <?php }?>
            <tr>
              <?php if (Select_Class_subject($Class_Name, "Physics", $subject_array)) { ?>
              <tr>
            <td>Physics</td> <td> <?php echo $Total_Marks['Physics']; ?> </td><td> <?php echo Show_absent($Physics_Marks);  ?></td>  <td> <!-- Pass/Fall --></td>
            </tr>
            <?php }?>
              <tr>
                <!-- Total_Marks =  Class All Subjects Total Marks -->
                <td></td> <td> <?php echo $All_Subjects_Total_Marks;  ?></td><td> <?php echo $Obtained_Marks;  ?></td>  <td> <!-- Pass/Fall --></td>
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
