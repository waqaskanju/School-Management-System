<?php
  require_once('db_connection.php');
  require_once('sand_box.php');
  require_once('config.php');
  $link=connect();
  page_header('Show Class');
  $show_class="6th";
  $show_school="GHSS Chitor";
  $status="1";
  if(isset($_GET['submit']))
  {
    $show_class=$_GET['class_exam'];
    $show_school=$_GET['school'];
    $status=0;
  }
  if(isset($_GET['active']))
  {
    $show_class=$_GET['class_exam'];
    $show_school=$_GET['school'];
    $status=1;
  }
 
    
?>
</head>
<body>
  <div class="bg-warning text-center">
    <h4>Show Class Information</h4>
  </div>
  <?php require_once('nav.php');?>
<div class="container">
  <div class="row">
      <div class="col-md-12 ">
        <form class="" action="#" method="GET">
          <div class="form-row">  
          <?php 
          
           $selected_class=$CLASS_INSERT; 
           $selected_school=$SCHOOL_INSERT; 
            select_class($selected_class); 
            select_school($selected_school);
    ?>
          
          </div> 
         <button type="submit" name="submit" value="all" class="btn btn-primary">Show All Students</button>
         <button type="submit" name="active" value="active" class="btn btn-primary">Show Active Students</button>
        </form>

<div class="container">
  <div class="row">
      <div class="col-md-12 ">
        <table class="table" border="1">
          <caption style="caption-side: top"> <h4> <?php echo "Showing Data of Class:$show_class School: $show_school";?></h4></caption>
          <tr> <td> Roll No </td> <td> Name </td> <td> Father Name </td><td> Mobile No </td> <td> Class </td><td> School</td> </tr> 
            <?php
              $qs="Select * from students_info WHERE Class='".$show_class."' AND school='".$show_school."' AND status='".$status."'order by Roll_No ASC";
              $qr=mysqli_query($link,$qs)or die('error:'.mysqli_error($link));
              while($qfa=mysqli_fetch_assoc($qr))
              {
                echo  '<tr><td>'.$qfa['Roll_No']. '</td><td>'.$qfa['Name']. '</td><td>'.$qfa['FName']. '</td><td>'.$qfa['Mobile_No']. '</td><td>'.$qfa['Class'].'<td>'.$qfa['School']. '</td></td></tr>';
              }
            ?>
          </table>
        </div>
      </div>
  </div>

  <?php page_close(); ?>