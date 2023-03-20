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
session_start();


require_once 'db_connection.php';
require_once 'sand_box.php';
require_once 'config.php';
$link=connect();
Page_header("Home Page");

?>
<link rel="stylesheet" href="css/tiles.css">
<link rel="stylesheet" href="css/style.css">
</head>
  <body>
<div class="container">
  <div class="row">
      <h1 class="text-primary">
        <strong class="col-md-12">
          Welcome  
          <?php echo $current_user ?> 
          to 
          <?php echo $SCHOOL_NAME?> Managment System
        </strong>
      </h1>
      <?php
        if ($current_user!=="") {
            echo '<a href="logout.php">Logout</a>';
        }
        ?>
  </div>
  <div class="row">
    <div class="col-sm-4">
        <a href="add_student.php" class="tile purple">
       <h3 class="title"> <i class="bi bi-person"></i>Student</h3>
        </a>
    </div>
    <div class="col-sm-4">
        <a href="roll_no_slip.php" class="tile blue">
          <h3 class="title"><i class="bi bi-clipboard-check"></i> Roll No Slip </h3>
        </a>
    </div>
    <div class="col-sm-4">
      <a href="./timetable/index.html" class="tile green">
        <h3 class="title"><i class="bi bi-alarm"></i> Time Table </h3>
      </a>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4">
      <a href="show_class.php" class="tile orange">
        <h3 class="title"><i class="bi bi-people"></i> View Class Data</h3>
      </a>
    </div>
    <div class="col-sm-4">
      <a href="award_list.php" class="tile seagreen">
          <h3 class="title"><i class="bi bi-cloud-lightning-rain"></i>
           Award List</h3>
      </a>
    </div>
    <div class="col-sm-4">
      <a href="detail_student.php" class="tile khaki">
        <h3 class="title"><i class="bi bi-binoculars"></i> Search</h3>
      </a>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4">
      <a href="book_list.php" class="tile purple">
        <h3 class="title"><i class="bi bi-book"></i> Book List </h3>
      </a>
    </div>
    <div class="col-sm-4">
      <a href="print.php" class="tile blue">
        <h3 class="title"><i class="bi bi-arrow-down-square"></i> Print</h3>
      </a>
    </div>
    <div class="col-sm-4">
      <a href="calculate_position.php" class="tile green">
        <h3 class="title"><i class="bi bi-calculator"></i> Calculate Position</h3>
      </a>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-4">
      <a href="class_test.php" class="tile orange">
        <h3 class="title"><i class="bi bi-emoji-wink"></i> Class Test List </h3>
      </a>
    </div>
    <div class="col-sm-4">
      <a href="print_dmc.php" class="tile seagreen">
        <h3 class="title"><i class="bi bi-columns-gap"></i> Print DMC</h3>
      </a>
    </div>
    <div class="col-sm-4">
      <a href="class_result.php" class="tile khaki">
        <h3 class="title"><i class="bi bi-diagram-3"> </i> View Result</h3>
      </a>
    </div>
</div>
<div class="row">
<div class="col-sm-4">
          <a href="class_wise_age.php" class="tile purple">
            <h3 class="title"><i class="bi bi-translate"></i> Class wise age</h3>
          </a>
    </div>
    <div class="col-sm-4">
          <a href="subject_link.php" class="tile blue">
            <h3 class="title"><i class="bi bi-pencil"></i> 
            Add Marks Subject Wise</h3>
          </a>
    </div>
    <div class="col-sm-4">
          <a href="test_pictures.php" class="tile green">
            <h3 class="title"><i class="bi file-image"></i> Test Pictures</h3>
          </a>
    </div>
</div>
<div class="row">
<div class="col-sm-4">
          <a href="class_wise_report.php" class="tile orange">
            <h3 class="title"> <i class="bi bi-pie-chart"></i> 
            Classwise Report</h3>
          </a>
    </div>
    <div class="col-sm-4">
          <a href="subject_wise_report.php" class="tile seagreen">
            <h3 class="title"><i class="bi bi-flag"></i> 
            Subject Wise Report</h3>
          </a>
    </div>
    <div class="col-sm-4">
          <a href="site_map.php" class="tile khaki">
            <h3 class="title"><i class="bi bi-map"></i> Site Map</h3>
          </a>
    </div>
</div>
<div class="row">
<div class="col-sm-4">
          <a href="setting.php" class="tile orange">
            <h3 class="title"><i class="bi bi-wrench"></i> Settings</h3>
          </a>
    </div>
    <div class="col-sm-4">
          <a href="view_lock_subjects.php" class="tile seagreen">
            <h3 class="title"><i class="bi bi-lock"></i> Locked Subjects</h3>
          </a>
    </div>
    <div class="col-sm-4">
          <a href="add_class_subject.php" class="tile khaki">
            <h3 class="title"><i class="bi bi-node-plus"></i>
             Add Subject To Class</h3>
          </a>
    </div>
</div>
<div class="row">
<div class="col-sm-4">
          <a href="assign_subject.php" class="tile orange">
            <h3 class="title"><i class="bi bi-emoji-sunglasses"></i>
             Assign Subject To Teacher</h3>
          </a>
    </div>
    <div class="col-sm-4">
          <a href="seating_plan.php" class="tile seagreen">
            <h3 class="title"><i class="bi bi-flower1"></i> Seating Plan</h3>
          </a>
    </div>
    <div class="col-sm-4">
          <a href="seating_plan_B.php" class="tile khaki">
            <h3 class="title"><i class="bi bi-flower2"></i> Seating Plan B</h3>
          </a>
    </div>
</div>
<div class="row">
<div class="col-sm-4">
          <a href="login.php" class="tile orange">
            <h3 class="title"><i class="bi bi-door-open"></i> Login</h3>
          </a>
    </div>
    <div class="col-sm-4">
          <a href="change_password.php" class="tile seagreen">
            <h3 class="title"><i class="bi bi-shield-plus"></i>Change Password</h3>
          </a>
    </div>
    <div class="col-sm-4">
          <a href="logout.php" class="tile khaki">
            <h3 class="title"><i class="bi bi-door-closed"></i> Logout</h3>
          </a>
    </div>
</div>
<?php Page_close(); ?>







