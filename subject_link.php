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
   <p>Note:  -1 Marks means absent.</p>
    <div class="row">

        <div class="col">
        <h5> Class 6th Subjects </h5>
          <?php
            for ($i=0; $i<count($SIXTH_SUBJECT); $i++) {
            echo '<a href="add_subject_marks.php?Class=6th&Subject='.$SIXTH_SUBJECT[$i].'">'.$SIXTH_SUBJECT[$i] .'</a><br>';
            }
          ?>
      </div>
      <div class="col">
      <h5> Class 7th Subjects </h5>
  <?php
    for ($i=0; $i<count($SEVENTH_SUBJECT); $i++) {
     echo '<a href="add_subject_marks.php?Class=7th&Subject='.$SEVENTH_SUBJECT[$i].'">'.$SEVENTH_SUBJECT[$i] .'</a><br>';
    }
?>
      </div>
      <div class="col">
      <h5> Class 8th Subjects </h5>
  <?php
    for ($i=0; $i<count($EIGHTH_SUBJECT); $i++) {
     echo '<a href="add_subject_marks.php?Class=8th&Subject='.$EIGHTH_SUBJECT[$i].'">'.$EIGHTH_SUBJECT[$i] .'</a><br>';
    }
?>
      </div>
      <div class="col">
      <h5> Class 9th  A Subjects </h5>
  <?php

    for ($i=0; $i<count($NINETH_SUBJECT); $i++) {

     echo '<a href="add_subject_marks.php?Class=9th A&Subject='.$NINETH_SUBJECT[$i].'">'.$NINETH_SUBJECT[$i] .'</a><br>';
    }
?>

      </div>
  </div>

  <div class="row">
    <div class="col">

  </div>
  <div class="col">
  <h5> Class 9th B Subjects </h5>
  <?php

    for ($i=0; $i<count($NINETH_SUBJECT); $i++) {

     echo '<a href="add_subject_marks.php?Class=9th B&Subject='.$NINETH_SUBJECT[$i].'">'.$NINETH_SUBJECT[$i] .'</a><br>';
    }
?>
  </div>
  <div class="col">

<h5> Class 10th A Subjects </h5>
  <?php

    for ($i=0; $i<count($TENTH_SUBJECT); $i++) {

     echo '<a href="add_subject_marks.php?Class=10th A&Subject='.$TENTH_SUBJECT[$i].'">'.$TENTH_SUBJECT[$i] .'</a><br>';
    }
?>

  </div>
  <div class="col">
  <h5> Class Tenth B Subjects </h5>
  <?php

    for ($i=0; $i<count($TENTH_SUBJECT); $i++) {

     echo '<a href="add_subject_marks.php?Class=10th B&Subject='.$TENTH_SUBJECT[$i].'">'.$TENTH_SUBJECT[$i] .'</a><br>';
    }
?>
  </div>
  </div>

 </div> <!-- End of main container -->
  <?php Page_close(); ?>
