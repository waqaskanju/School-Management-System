<?php
/**
 * Statistics of School.
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
 require_once 'sand_box.php';
 $link=$LINK;
 
 Page_header("Statistics");
if ($SINGLE_MARKS_CHANGES=="0") {
    echo '<div class="bg-danger text-center"> Not allowed!! </div>';
    exit;
}
?>
</head>

  <body class="background">
  <?php require_once 'nav.html';?>
   <div class="container-fluid">
   <h3>This Page of Will Show Statistics of School
    </h3>
    <div class="row">
<?php
// $school=$SCHOOL_NAME;

$total_records_db=Check_Rows_effected_num_value("Roll_No","students_info","Roll_No",">0");
$total_active=Check_Rows_effected("Status","students_info","Status","1");
$total_struck_off=Check_Rows_effected("Status","students_info","Status","0");
$total_graduate=Check_Rows_effected("Status","students_info","Status","2");
$total_slc=Check_Rows_effected("Status","students_info","Status","3");
?>
<div class="row">
    <div class="col-3">Total No of records = <?php echo $total_records_db;?></div>
    <div class="col-3">Total No of Active Students = <?php echo  $total_active;?></div>
    <div class="col-2">Total No of Struck off = <?php echo  $total_struck_off;?></div>
    <div class="col-2">Total No of Graduate =<?php echo  $total_graduate; ?></div>
    <div class="col-2">Total No of SLC = <?php echo  $total_slc; ?> </div>
</div>

<div class="row">
    <div class="col-3">Total No of Active Students in School 1 = <?php echo  $total_active;?></div>
    <div class="col-3">Total No of Struck off in School 1 = <?php echo  $total_struck_off;?></div>
    <div class="col-3">Total No of Graduate Struck off in School 1 =<?php echo  $total_graduate; ?></div>
    <div class="col-3">Total No of SLC in School 1= <?php echo  $total_slc; ?> </div>
</div>

<?php 
// Select School Names
$school_names=Select_Single_Column_Array_data("Name","schools","Status","1");

// Total No of Students in Each School.
$column_name= "School";
$where_column_name=$column_name;
$table_name="students_info";
$where_column=$column_name;
for($i=0; $i<count($school_names); $i++){
    $value=$school_names[$i];
    $total_each_school=Check_Rows_effected("School","students_info","School",$value);
    echo "<h3>Total No of Students in $value = $total_each_school </h3>";
}


$column_name="Name";
$table_name="school_classes";
$where_column="School_Id";
$where_column="1";
$class_names=Select_Single_Column_Array_data($column_name,$table_name,$where_column,$where_value);

$unique_class_names=array_unique($class_names);
$single_class=$unique_class_names;
$column_name="Class";
$table_name="students_info";
$where_column_name=$column_name;
 print_r(count($single_class));
for($i=0; $i<count($single_class); $i++){
   // echo $value=$single_class[$i];
    //$total_each_class=Check_Rows_effected($column_name,$table_name,$where_column_name,$value);
    //echo "<h3>Total No of Students in $value = $total_each_class </h3>";
}


//$total_records_in_class=Check_Rows_effected_num_value($column_name,$table_name,$where_column_name,$value);
//echo " <h3>Total No of students in Class $value = $total_records_in_class  </h3>";


 echo "Total No of Graduated Students
Total No of Struck off Student
Total No of SLC

Total No of Students in 6th,7th,8th,9th,10th,11th,12th";



?>

  </div>

 </div> <!-- End of main container -->
  <?php Page_close(); ?>
