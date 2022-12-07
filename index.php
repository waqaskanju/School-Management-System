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
Page_header("Home Page");
?>
<link rel="stylesheet" href="css/tiles.css">
<link rel="stylesheet" href="css/style.css">
</head>
  <body>
    <div class="bg-warning text-center">
      <h4>Home Page</h4>
    </div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>
        <strong>Welcome to <?php echo $SCHOOL_NAME ?> Managment System</strong>
      </h1>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4">
        <a href="add_student.php" class="tile purple">
          <h3 class="title">Student</h3>
        </a>
    </div>
    <div class="col-sm-4">
        <a href="rollno_slip.php" class="tile blue">
          <h3 class="title"> Roll No Slip </h3>
        </a>
    </div>
    <div class="col-sm-4">
      <a href="./timetable/index.html" class="tile green">
        <h3 class="title"> Time Table </h3>
      </a>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4">
      <a href="show_class.php" class="tile orange">
        <h3 class="title">View Class Data</h3>
      </a>
    </div>
    <div class="col-sm-4">
      <a href="award_list.php" class="tile seagreen">
          <h3 class="title">Award List</h3>
      </a>
    </div>
    <div class="col-sm-4">
      <a href="detail_student.php" class="tile khaki">
        <h3 class="title">Search</h3>
      </a>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4">
      <a href="book_list.php" class="tile purple">
        <h3 class="title">Book List </h3>
      </a>
    </div>
    <div class="col-sm-4">
      <a href="add_mark.php" class="tile blue">
        <h3 class="title">Enter Marks</h3>
      </a>
    </div>
    <div class="col-sm-4">
      <a href="calculate_position.php" class="tile green">
        <h3 class="title">Calculate Position</h3>
      </a>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-4">
      <a href="class_test.php" class="tile orange">
        <h3 class="title">Class Test List </h3>
      </a>
    </div>
    <div class="col-sm-4">
      <a href="print_dmc.php" class="tile seagreen">
        <h3 class="title">Print DMC</h3>
      </a>
    </div>
    <div class="col-sm-4">
      <a href="class_result.php" class="tile khaki">
        <h3 class="title">View Result</h3>
      </a>
    </div>
</div>
<div class="row">
<div class="col-sm-4">
          <a href="class_wise_age.php" class="tile purple">
            <h3 class="title">Class wise age</h3>
          </a>
    </div>
    <div class="col-sm-4">
          <a href="casual_leave.php" class="tile blue">
            <h3 class="title">Casual Leave</h3>
          </a>
    </div>
    <div class="col-sm-4">
          <a href="testpictures.php" class="tile green">
            <h3 class="title">Test Pictures</h3>
          </a>
    </div>
</div>
<?php Page_close(); ?>







