<?php
/**
 * Main Index page of CMS
 * php version 8.1
 *
 * @category Management
 *
 * @package None
 *
 * @author Waqas <ahmad@waqaskanju.com>
 *
 * @license http://www.abc.com MIT
 *
 * @link Adfas
 **/

 require_once 'db_connection.php';
 require_once 'sand_box.php';
 require_once 'config.php';
 $link=connect();
 Page_header("Select Subject");
?>
</head>
  <body>
   <div class="container">
   <h3>Select a subject where you want to add marks.</h3>
    <div class="row">
        <div class="col-4">
        <h5> Class 6th Subjects </h5>
          <?php
            $sixth_subjects=Select_Subjects_Of_class('6th');
            for ($i=0; $i<count($sixth_subjects); $i++) {
                echo '<a href="update_one_subject_marks.php?Class=6th&
                         Subject='.$sixth_subjects[$i]['Name'].'">'.
                         $sixth_subjects[$i]['Name'].'</a>(';
                        echo Subject_teacher('6th', $sixth_subjects[$i]['Name']);
                         echo " Sb) <br>";
            }
            ?>
      </div>
      <div class="col-4">
      <h5> Class 7th Subjects </h5>
  <?php
    $seventh_subjects=Select_Subjects_Of_class('7th');
    for ($i=0; $i<count($seventh_subjects); $i++) {
        echo '<a href="update_one_subject_marks.php?Class=7th&
                Subject='.$seventh_subjects[$i]['Name'].'">'.
                $seventh_subjects[$i]['Name'].'</a>(';
                echo Subject_teacher('7th', $seventh_subjects[$i]['Name']);
                echo " Sb) <br>";
    }
    ?>
      </div>
      <div class="col-4">
      <h5> Class 8th Subjects </h5>
  <?php
    $eighth_subjects=Select_Subjects_Of_class('8th');
    for ($i=0; $i<count($eighth_subjects); $i++) {
        echo '<a href="update_one_subject_marks.php?Class=8th&
        Subject='.$eighth_subjects[$i]['Name'].'">'.
        $eighth_subjects[$i]['Name'] .'</a>(';
        echo Subject_teacher('8th', $eighth_subjects[$i]['Name']);
                echo " Sb) <br>";
    }
    ?>
      </div>

  </div>

  <div class="row">

  <div class="col-4">
      <h5> Class 9th  A Subjects </h5>
  <?php
    $nineth_subjects=Select_Subjects_Of_class('9th A');
    for ($i=0; $i<count($nineth_subjects); $i++) {
        echo '<a href="update_one_subject_marks.php?Class=9th A&
                 Subject='.$nineth_subjects[$i]['Name'].'">'.
                 $nineth_subjects[$i]['Name'] .'</a>(';
                 echo Subject_teacher('9th A', $nineth_subjects[$i]['Name']);
                 echo " Sb) <br>";
    }
    ?>

      </div>

  <div class="col-4">
  <h5> Class 9th B Subjects </h5>
  <?php
    $ninethb_subjects=Select_Subjects_Of_class('9th B');
    for ($i=0; $i<count($ninethb_subjects); $i++) {
        echo '<a href="update_one_subject_marks.php?Class=9th B&
        Subject='.$ninethb_subjects[$i]['Name'].'">'.
        $ninethb_subjects[$i]['Name'] .'</a>(';
                 echo Subject_teacher('9th B', $ninethb_subjects[$i]['Name']);
                 echo " Sb) <br>";
    }
    ?>
  </div>
  <div class="col-4">

<h5> Class 10th A Subjects </h5>
  <?php
    $tenth_subjects=Select_Subjects_Of_class('10th A');
    for ($i=0; $i<count($tenth_subjects); $i++) {
        echo '<a href="update_one_subject_marks.php?Class=10th A&
        Subject='.$tenth_subjects[$i]['Name'].'">'.
        $tenth_subjects[$i]['Name'] .'</a><br>';
    }
    ?>

  </div>


  </div>
  <div class="row">
  <div class="col-4">
  <h5> Class Tenth B Subjects </h5>
  <?php
    $tenthb_subjects=Select_Subjects_Of_class('10th B');
    for ($i=0; $i<count($tenthb_subjects); $i++) {
        echo '<a href="update_one_subject_marks.php?Class=10th B&
                 Subject='.$tenthb_subjects[$i]['Name'].'">'.
                 $tenthb_subjects[$i]['Name'] .'</a><br>';
    }
    ?>
  </div>
  </div>

 </div> <!-- End of main container -->
  <?php Page_close(); ?>
