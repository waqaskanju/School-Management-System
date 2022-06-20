<?php
  require_once('db_connection.php');
  require_once('sand_box.php');
  $link=connect();
  page_header("Class Result")
?>
</head>
<body>
   <div class="bg-warning text-center">
    <h4>Class Result</h4>
  </div>
  <?php require_once('nav.php');?>
<div class="container">  
<div class="row">
  <div class="col-md-12">
    <form action="#" method="GET">
      <div class="form-row">
      <?php select_class(); ?>
      <?php  select_school();?> 
    </div>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    
    </form>
    <table class="table table-bordered">
      <tr> <td> Roll No </td> <td> Name </td> <td> Father Name </td> <td> English </td><td> Urdu</td><td> Math</td> <td> Science</td><td> Class Position</td> </tr> 
      <?php
        if(isset($_GET['submit']))
        {
          $class_name=$_GET['class_exam'];
          $school_name=$_GET['school'];
          $class_name= "'$class_name'";
          $school_name="'$school_name'";
          $qs="SELECT students_info.Roll_No, students_info.Name,students_info.FName,marks.English_Marks, marks.Urdu_Marks,marks.Maths_Marks,marks.Science_Marks,students_info.Class_Position FROM chitor_db.students_info JOIN chitor_db.marks ON chitor_db.students_info.Roll_No = chitor_db.marks.Roll_No WHERE students_info.Class=$class_name AND students_info.School=$school_name";
          $qr=mysqli_query($link,$qs) or die('error:'.mysqli_error($link));
          while($qfa=mysqli_fetch_assoc($qr))
          {
            echo  '<tr><td>'.$qfa['Roll_No']. '</td><td>'.$qfa['Name']. '</td><td>'.$qfa['FName']. '</td><td>'.$qfa['English_Marks'].'<td>'.$qfa['Urdu_Marks']. '</td><td>'.$qfa['Maths_Marks']. '</td><td>'.$qfa['Science_Marks'].'</td><td>'.$qfa['Class_Position']. '</td> </td></tr>';
          }
        }
      ?>
    </table>
  </div>
</div>
</div>
<?php page_close();?>
