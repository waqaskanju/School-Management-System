<?php
/**
 * Add Marks of Students
 * php version 8.1
 *
 * @category Adfsad
 *
 * @package Adf
 *
 * @author Khan <abc@examp.com>
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
          <h3 class="title">Student Registration</h3>
        </a>
    </div>
    <div class="col-sm-4">
        <a href="print_dmc.php" class="tile orange">
          <h3 class="title">Print DMC</h3>
        </a>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4">
        <a href="class_result.php" class="tile green">
          <h3 class="title">View Class Result</h3>
        </a>
    </div>
    <div class="col-sm-4">
        <a href="add_mark.php" class="tile blue">
          <h3 class="title">Enter Marks</h3>
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
        <h4 class="tile purple">Print  Roll No &darr; </h4>
        <div class="tile purple flex-container">

               <a href="rollno_slip.php?class='6th'">6th</a>
               <a href="rollno_slip.php?class='7th A'">7th A</a>
               <a href="rollno_slip.php?class='7th B'">7th B</a>
               <a href="rollno_slip.php?class='8th'">8th</a>
        </div>
    </div>
  </div>
  <div class="row">
      <div class="col-sm-4">
          <h3 class="title tile blue">Award list  &darr;</h3>
        <div class="tile blue flex-container">
          <ul>
            <!-- <li>
              <a href="award_list.php?class='5th'&School='GPS Chitor'">
                GPS Chitor 5th
              </a>
            </li>
            <li>
              <a href="award_list.php?class='5th'&School='GPS Kokrai'">
                GPS Kokrai 5th
              </a>
            </li> -->
            <li>
              <a href="award_list.php?class='6th'&School='GHSS Chitor'">
                GHSS Chitor 6th
              </a>
            </li>
            <li>
              <a href="award_list.php?class='7th'&School='GHSS Chitor'">
                GHSS Chitor 7th
              </a>
            </li>

            <!-- <li>
              <a href="award_list.php?class='8th'&School='GMS Marghazar'">
                GMS Marghazar 8th
              </a>
            </li>
            <li>
              <a href="award_list.php?class='8th'&School='GMS Spal Bandai'">
                GMS Sapal Bandai 8th
              </a>
            </li>-->
            <li>
              <a href="award_list.php?class='8th'&School='GHSS Chitor'">
                GHSS Chitor 8th
              </a>
            </li>
            <li>
              <a href="award_list.php?class='9th A'&School='GHSS Chitor'">
                GHSS Chitor 9th A
              </a>
            </li>
            <li>
              <a href="award_list.php?class='9th B'&School='GHSS Chitor'">
                GHSS Chitor 9th B
              </a>
            </li>
            <li>
              <a href="award_list.php?class='10th A'&School='GHSS Chitor'">
                GHSS Chitor 10th A
              </a>
            </li>
            <li>
              <a href="award_list.php?class='10th B'&School='GHSS Chitor'">
                GHSS Chitor 10th B
              </a>
            </li>
          </ul>
</div>

      </div>
      <div class="col-sm-3">
      <a href="./timetable/Time_Table_Teachers.html" class="tile green">
        Time Table Teachers
      </a>
      </div>
      <div class="col-sm-3">
      <a href="./timetable/Time_Table_Classes.html" class="tile green">
        Time Table Classes
      </a>
      </div>
      <div class="col-sm-3">
      <a href="./timetable/Time_Table_Vacant.html" class="tile blue">
        Time Table Vacant
      </a>
      </div>
  </div>
  <div class="col-sm-3">
      <a href="batch_edit.php?Class='4th'&School='GHSS Chitor'&Year='2022'"
         class="tile green">
          <h3 class="title">Batch Edit</h3>
        </a>
      </div>
  <div class="row">
      <div class="col-sm-4">
          <h3 class="title tile purple">Book list  &darr;</h3>
        <div class="tile purple flex-container">
          <ul>
            <li> <a href="book_list.php?class='6th'">Class 6th</a> </li>
            <li>  <a href="book_list.php?class='7th'">Class 7th </a> </li>
            <li> <a href="book_list.php?class='8th'">Class  8th </a> </li>
            <li>  <a href="book_list.php?class='9th A'"> 9th A</a> </li>
            <li> <a href="book_list.php?class='9th B'"> 9th B</a></li>
            <li>  <a href="book_list.php?class='10th A'"> 10th A</a> </li>
            <li> <a href="book_list.php?class='10th B'"> 10th B</a></li>
          </ul>

</div>
</div>
</div>
<!-- Test Area Starts -->
<div class="row">
      <div class="col-sm-4">
          <h3 class="title tile blue">Test list  &darr;</h3>
        <div class="tile blue flex-container">
          <ul>
            <li> <a href="class_test_anwar.php?class='6th'">Class 6th</a> </li>
            <li>  <a href="class_test_anwar.php?class='7th'">Class 7th </a> </li>
            <li> <a href="class_test_anwar.php?class='8th'">Class  8th </a> </li>
            <li>  <a href="class_test_anwar.php?class='9th A'"> 9th A</a> </li>
            <li> <a href="class_test_anwar.php?class='9th B'"> 9th B</a></li>
            <li>  <a href="class_test_anwar.php?class='10th A'"> 10th A</a> </li>
            <li> <a href="class_test_anwar.php?class='10th B'"> 10th B</a></li>
          </ul>

</div>
</div>
</div>
<!-- Test Area Finish -->
<div class="row">
  <div class="col-lg-6">
    <ul>
      <li> <a href="calculate_position.php"> Calculate Positions</li>
    </ul>
</div>
</div>
</div>
<?php Page_close(); ?>
