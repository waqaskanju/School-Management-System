<?php
  require_once('db_connection.php');
  require_once('sand_box.php');
  $link=connect();

  if(isset($_GET['submit']))
  {
    $roll_no=$_GET['rollno'];
    $name=$_GET['name'];
    $fname=$_GET['fname'];
    $year=$_GET['year'];
    $school=$_GET['school'];
    $class_exam=$_GET['class_exam'];
    $school=$_GET['school'];

    $q="INSERT INTO students_info (Roll_No, Name,FName,Year,Class,School) VALUES ('$roll_no','$name','$fname','$year','$class_exam','$school')";
    $exe=mysqli_query($link,$q) or die(mysqli_error($link));
    if($exe) { echo "$roll_no"." Submitted Successfully"; }
    else{ echo "Error in 1st Query". mysqli_error($link);}

  }
?>

  <?php page_header('Register Students'); ?>
</head>
<body>
  <div class="bg-warning text-center">
    <h4>Add Students Information</h4>
  </div>
  <?php require_once('nav.php');?>
  <div class="container">
    <div class="row">
      <div class="col-md-12 ">
        <form class="" action="#" method="GET" >
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="name">Roll No:</label> <span id="aj_result" class="text-danger" ></span>
                <input type="number" class="form-control" id="rollno" name="rollno" placeholder="type Roll No" min="1" value="295" autofocus required onfocusout="check_roll_no_student()">
              </div>
             <div class="form-group col-md-4">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="type Name"required>
              </div>
            <div class="form-group col-md-4">
              <label for="fname">Father Name:</label>
              <input type="text" class="form-control" id="fname" name="fname" placeholder="type Father Name" required>
            </div>
            <div class="form-group col-md-4">
              <label for="year">Year:</label>
              <input type="number" class="form-control" id="year" name="year" min="2021" max="2030" step="1" value="2022" placeholder="type year" required>
            </div>
           </div> 
          <div class="form-row">  
          <?php select_class(); ?>
          <?php  select_school();?>

          </div>  
            <button type="submit" name="submit" class="btn btn-primary">Save Data</button>
          </form>
        </div>
      </div>
      <?php 
        $show_class="'5th'";
        $show_school="'GPS Kokrai'";
      ?>
      <br>
      <br>
      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <caption style="caption-side: top"> <h4> <?php echo "Showing Data of Class:$show_class School: $show_school";?></h4></caption>
            <tr> <td> Roll No </td> <td> Name </td> <td> Father Name </td> <td> Class </td><td> School</td> </tr> 
            <?php
              $qs="Select * from students_info WHERE Class=".$show_class."AND school=".$show_school."order by Roll_No ASC";
              $qr=mysqli_query($link,$qs)or die('error:'.mysqli_error($link));
              while($qfa=mysqli_fetch_assoc($qr))
              {
                echo  '<tr><td>'.$qfa['Roll_No']. '</td><td>'.$qfa['Name']. '</td><td>'.$qfa['FName']. '</td><td>'.$qfa['Class'].'<td>'.$qfa['School']. '</td></td></tr>';
              }
            ?>
          </table>
        </div>
      </div>
    </div>
  <?php page_close(); ?>
