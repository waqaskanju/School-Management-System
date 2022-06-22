<?php
	require_once('db_connection.php');
	require_once('sand_box.php');
	$link=connect();
	page_header("Home Page");
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
        <strong>Welcome to GHSS Chitor Student Management System</strong>
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
        <!-- <a href="http://www.ubh.com" class="tile purple">
          <h3 class="title">View Roll No</h3>
        </a> -->
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
          <h3 class="title tile blue">Slips  &darr;</h3>
        <div class="tile blue flex-container"> 
              <a href="award_list.php?class='6th'">6th</a>
               <a href="award_list.php?class='7th A'">7th A</a>
               <a href="award_list.php?class='7th B'">7th B</a>
               <a href="award_list.php?class='8th'">8th</a>
</div>
      </div>
      <div class="col-sm-4">
      <a href="timetable.html" class="tile green">
          <h3 class="title">Time Table</h3>
        </a>
      </div>
      <div class="col-sm-4">
      <a href="batch_edit.php?Class='4th'&School='GHSS Chitor'&Year='2022'" class="tile green">
          <h3 class="title">Batch Edit</h3>
        </a>
      </div>
  </div>
</div> 
<?php page_close(); ?>
