<?php
/**
 * Show the result of a class
 * php version 8.1
 *
 * @category Exam_Result
 * @package  None
 * @author   Waqas Ahmad <waqaskanju@gmail.com>
 *
 * @license http://www.abc.com MIT
 *
 * @link Adfas
 **/
  session_start();
  require_once 'sand_box.php';
  $link=$LINK;
  Page_header("Class Result")
?>
</head>
<body>
  <?php  require_once 'nav.html';?>
   <div class="bg-warning text-center no-print">
    <h4>Class Result</h4>
  </div>

<div class="container-fluid no-print">
  <form action="#" method="GET">
        <div class="row">
            <?php

            $school_name=$SCHOOL_NAME;

            // In the dropdown class name selected class name will be selected.
            if(isset($_GET['class_exam'])){
              $class_name=$_GET['class_exam'];
            } else {
              $class_name='7th';
            }

            Select_class($class_name);
            Select_school($school_name);?>
        </div>
        <button class="no-print btn btn-primary mt-2" type="submit"
        name="submit">
            Show Result
        </button>
  </form>
</div>
<?php
if (isset($_GET['submit'])) {
    $class_name=$_GET['class_exam'];
    $class_name=Validate_input($class_name);

    $school_name=$_GET['school'];
    $school_name=Validate_input($school_name);
    ?>
<!-- Page Header -->
<div id="spinner">
  <img src="./images/spinner.gif" alt="spinner">
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2">
      <img class="img-fluid" src="./images/khyber.png" alt="khyber">
    </div>
    <div class="text-center col-sm-8">
      <h3>GOVT. HIGHER SECONDARY SCHOOL </h3>
      <h3>  CHITOR, DISTRICT SWAT  </h3>
      <h5>
        Result of
          <?php
            // A message from config page.
            echo $class_result_header;
            ?>
      </h5>
             <h6>
            Date: <?php echo date('d-M-Y') ?>
            School Name: <?php echo $school_name ?>
            Class Name: <?php echo $class_name ?>
        </h6>
      </div>
      <div class="col-sm-2">
        <img class="img-fluid" src="./images/kpesed.png" alt="kpesed.png">
      </div>
    </div> <!--row end -->
  </div> <!--fluid end -->

<!-- Page Header End -->
      <?php
            // Initially Subject marks.
            $subject_total_marks=0;
            $all_subjects_total_marks=0;
            echo'
            <table class="table border border-dark">
            <thead>
            <tr class="border border-dark">
            <th class=" border border-dark fw-bolder vartical"> S No </th>
            <th class="vertical border border-dark fw-bolder"> E No </th>';
            if($school_name=="GHSS Chitor") {
            echo '<th class="vertical border border-dark fw-bolder"> R No </th>';
            }
            echo '<th  class=" border border-dark fw-bolder" > Name </th>';
            // class_subject is an array. to get value you need $class_subjects[0]['Name']; 0 is i;
            $class_subjects=select_subjects_of_class($school_name, $class_name);
            // variable for marks selection query
            $subject_marks_selection_query="";
            //  This loop is used to write subject name and its totoal marks i-e English (100)
        for ($i=0;$i<count($class_subjects);$i++) {
            $subject=$class_subjects[$i]['Name'];
            $subject_total_marks=One_Subject_Total_marks(
                $school_name, $class_name, $subject
            );
            $all_subjects_total_marks=$all_subjects_total_marks
            +
            $subject_total_marks;
            echo "<th class='text-wrap border border-dark fw-bolder'> $subject ($subject_total_marks)</th>";
            // this variable contain subjects name ie English_Marks,Urdu_Marks,Maths_Marks,
            $subject_marks_selection_query = $subject_marks_selection_query.
            Change_Subject_To_Marks_col($subject).
            ',';
          }

            echo'   <th  class="border border-dark fw-bolder text-wrap"> Total ('.$all_subjects_total_marks.')</th>
            <th class="border border-dark fw-bolder"> % </th>
            <th  class="border border-dark fw-bolder text-wrap"> Position </th>
            <th class="border border-dark fw-bolder"> Status </th>
        </tr></thead>';
        // English_marks+ Urdu _Marks etc are used for total marks. need a better solution to sum only what is assigned.
        // The code below is used to select and add students marks.
          $qs="SELECT students_info.Roll_No,students_info.Class_No,students_info.Name,
          $subject_marks_selection_query (`English_Marks`+`Urdu_Marks`+`Maths_Marks`+`Science_Marks`+`Hpe_Marks`+`Nazira_Marks`+`History_Marks`+`Drawing_Marks`+`Islamyat_Marks`+`Computer_Marks`+`Arabic_Marks`+`Mutalia_Marks`+`Qirat_Marks`+`Pashto_Marks`+`Social_Marks`+`Biology_Marks`+`Chemistry_Marks`+`Physics_Marks`+`Civics_Marks`+`Economics_Marks`+`Islamic_Education_Marks`+`Islamic_Study_Marks`+`Statistics_Marks`+`Geography_Marks`) as instant_total, RANK() OVER ( ORDER BY instant_total DESC) as instant_position
          FROM chitor_db.students_info JOIN chitor_db.marks
          ON chitor_db.students_info.Roll_No = chitor_db.marks.Roll_No
          WHERE students_info.Class='$class_name'
          AND students_info.School='$school_name' AND students_info.Status='1'
          order by Roll_No ASC";
            $qr=mysqli_query($link, $qs) or die('error:'.mysqli_error($link));
            $sno=1;
            $fail=0;
            $pass=0;
            echo '<tbody>';
        while ($qfa=mysqli_fetch_assoc($qr)) {
            echo  '<tr class="border border-dark">
              <td class="border border-dark fw-bolder">'.$sno. '</td>
                <td class="border border-dark fw-bolder">'.$qfa['Roll_No']. '</td>';
                if($school_name=="GHSS Chitor"){
                echo ' <td class="border border-dark fw-bolder">'.$qfa['Class_No']. '</td>';
                }
              echo  '<td class="border border-dark fw-bolder">'.$qfa['Name']. '</td>';
            // Array to store all marks of a student
                $marks_array=[];
            // $class_subjects is an array it contain subjects of a particular class it value can be asscess as [$i]['Name']
            for ($i=0;$i<count($class_subjects);$i++) {
                // Get the name of each subject
                   $subject=$class_subjects[$i]['Name'];
                // Change Subject Name to its corresponding Marks Column in db
                    $marks_array[$i]=$qfa[Change_Subject_To_Marks_col($subject)];
                // Show Student Marks.
                // If marks=-1 show A (for absent)
                    echo  '<td class="border border-dark fw-bolder">'.Show_absent($marks_array[$i]) .'</td>';
                 // When random is needed
                 //    echo  '<td class="border border-dark fw-bolder">'.Show_absent(rand(20,50)) .'</td>';
            }
            // initailly total=0 Its total marks of a student.
                $student_total=0;

            for ($j=0;$j<count($marks_array);$j++) {
                // As Absent are stored as -1 for total marks calculation ...
                // we need to convert -1 to 0
                $student_total=$student_total+Change_Absent_tozero(
                    $marks_array[$j]
                );
            }

            if ($all_subjects_total_marks==0) {
                echo "<div class='row'>";
                    echo "<div col-md-6 class='alert alert-danger' role='alert'>";
                        echo "Error Total Marks of Subjects=0, Add Total Marks";
                echo "</div>
                </div>";
                exit;
            }

            $percentage =($student_total*100)/$all_subjects_total_marks;
            $rank=$qfa['instant_position'];
            $position=Change_rank_to_position($rank);
            //find pass percentage of class.
            $pass_p_age=pass_percentage($class_name);
            // it will compare student percentage with passing percentage.
            $status=$percentage>=$pass_p_age ? "Pass" : "Fail";
            
            // Select only number from class name. required in high admission no and both classes.
            preg_match_all('/[0-9]+/', $class_name, $matches);
            // select the number from class name, for example in "class 6th A" it will return 6
            $numberic_class_name=$matches[0][0];
            // now let check if any two pass english, math, general pass 
            if($numberic_class_name>4 && $numberic_class_name<9){
              // this function only works in class 5,6,7,8
             $core_subject_pass=Check_Eng_Mat_Sci_pass($qfa['English_Marks'],$qfa['Maths_Marks'],$qfa['Science_Marks']);
            } 
            
            // both passing marks and core subjects passing is essential.
            if($status=="Fail" || $core_subject_pass=="Fail"){
              $status="Fail";
            } else {
              $status="Pass";
            }

            if ($status=="Fail") {
                $fail=$fail+1;
            } else {
                $pass=$pass+1;
            }
              echo  '<td class="border border-dark fw-bolder">'. $student_total. '</td>
              <td class="border border-dark fw-bolder">' . number_format($percentage, 1, '.', ' ') . '</td>
              <td contenteditable="true" class="border border-dark fw-bolder">'. $position  .'</td>
              <td contenteditable="true" class="border border-dark fw-bolder">'. $status  .'</td>
              </tr>';
                $sno++;

        }
        $total=$sno-1;
}
?>
    </table>
    <?php
    // To remove initail page load error. defaluts are given.
    if (!isset($fail)) {
          $fail=0;
          $pass=0;
          $total=1;
    }

    // without if($sno) condition.
    // when page load and it has no values of pass, fail etc.
    // so shown undefined error.
    if (isset($sno)) {
        if ($sno>1) {
            Exam_footer($class_name, $fail, $pass, $total);
        }
    }
    ?>
    <script>
      document.getElementById('spinner').style.display = "none";
    </script>
    <script src="./js/remove_fail_positions.js"></script>
    <script>
      // this funtion is used to make fail postion empty. there will be no position for fail students.
      setTimeout(
    function () {
        change_fail(); }, 2000
);
    </script>
    <?php
    Page_close();
    ?>
