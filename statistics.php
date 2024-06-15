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
   <h3>This Page Will Show Statistics of School
    </h3>
    <div class="row">
<?php
// About All records in Database.
$total_records_db=Check_Rows_effected_num_value("Roll_No","students_info","Roll_No",">0");
$total_active=Check_Rows_effected("Status","students_info","Status","1");
$total_struck_off=Check_Rows_effected("Status","students_info","Status","0");
$total_graduate=Check_Rows_effected("Status","students_info","Status","2");
$total_slc=Check_Rows_effected("Status","students_info","Status","3");
?>

<!-- // Show all records -->
<div class="row">
    <div class="col-3">Total No of records = <?php echo $total_records_db;?></div>
    <div class="col-3">Total No of Active Students = <?php echo  $total_active;?></div>
    <div class="col-2">Total No of Struck off = <?php echo  $total_struck_off;?></div>
    <div class="col-2">Total No of Graduate =<?php echo  $total_graduate; ?></div>
    <div class="col-2">Total No of SLC = <?php echo  $total_slc; ?> </div>
</div>


<?php 
//  Show records of each school.
$school_names=Select_Single_Column_Array_data("Name","schools","Status","1");
?>
 <h3>Total No of Students in Each School</h3>
<div class="row">
<?php
$column_name= "School";
$where_column_name=$column_name;
$table_name="students_info";
$where_column=$column_name;
for($i=0; $i<count($school_names); $i++){
    $value=$school_names[$i];
    $total_each_school=Check_Rows_effected("School","students_info","School",$value);

    echo "<div class='col-2'> $value = <br> $total_each_school </div>";
}
?>
</div>

<!-- No of Students in each class of each school -->

<!-- Steps:
1. First Select all Schools.
2. Select all classes of a school.
3. find active, 
        struck off,
        SLC, 
        and Graduate of class.
-->

<?php
for($i=0; $i<count($school_names); $i++){
    echo "<div class='row'> <h3>Total No of Students in Each Class of $school_names[$i]</h3>";
    $classes_of_school=School_classes_by_id($school_names[$i]);
    for($j=0; $j<count($classes_of_school);$j++){
        echo"<h4> Class=  $classes_of_school[$j] </h4>";
        // Active
        $q="SELECT Name from students_info WHERE school='$school_names[$i]' AND Class='$classes_of_school[$j]' AND Status='1'";
        $effected_rows=Check_Rows_effected_by_query($q);
        echo "<div class='col-3'> Active=$effected_rows</div>";
        // Struck off.
        $q="SELECT Name from students_info WHERE school='$school_names[$i]' AND Class='$classes_of_school[$j]' AND Status='0'";
        $effected_rows=Check_Rows_effected_by_query($q);
        echo "<div class='col-3'> Struck Off=$effected_rows</div>";
        
        // SLC.
        $q="SELECT Name from students_info WHERE school='$school_names[$i]' AND Class='$classes_of_school[$j]' AND Status='3'";
        $effected_rows=Check_Rows_effected_by_query($q);
        echo "<div class='col-3'> SLC=$effected_rows</div>"; 
        
        // Graduate.
        $q="SELECT Name from students_info WHERE school='$school_names[$i]' AND Class='$classes_of_school[$j]' AND Status='2'";
        $effected_rows=Check_Rows_effected_by_query($q);
        echo "<div class='col-3'> Graduate=$effected_rows</div>";  
}
echo '</div>';
}

?>

  </div>

 </div> <!-- End of main container -->
  <?php Page_close(); ?>
