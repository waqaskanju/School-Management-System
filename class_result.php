<?php
/**
 * Show the result of a class
 * php version 8.1
 *
 * @category School_Stock
 * @package  Adf
 *
 * @author Waqas Ahmad <waqaskanju@gmail.com>
 *
 * @license http://www.abc.com MIT
 *
 * @link Adfas
 **/
  require_once 'db_connection.php';
  require_once 'sand_box.php';
  require_once 'config.php';
  $link=connect();
  Page_header("Class Result")
?>
</head>
<body>
   <div class="bg-warning text-center">
    <h4>Class Result</h4>
  </div>
  <?php // require_once 'nav.php';?>
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <form action="#" method="GET">
                <div class="form-row no-print">
                    <?php
                        $selected_class='';
                        Select_class($selected_class);
                        Select_school($SCHOOL_SHOW);?>
                </div>
                    <button class="no-print" type="submit"
                    name="submit" class="btn btn-primary">
                     Submit
                    </button>
            </form>
        </div>
    </div>
</div>

      <?php
        if (isset($_GET['submit'])) {
            $class_name_nq=$_GET['class_exam'];
            $school_name=$_GET['school'];
            $class_name= "'$class_name_nq'";
            $school_name="'$school_name'";

            $current_class = str_replace("'", "", $class_name);
            // Initially Subject marks.
            $subject_total_marks=0;
            $all_subjects_total_marks=0;
            echo'   <table class="table table-bordered">
            <thead>
            <tr>
            <th> S No </th>
            <th> Roll No </th>
            <th> Name </th>';
                //Class_name_nq=class name without quotes.
            $class_subjects=select_subjects_of_class($class_name_nq);
            // variable for marks selection query
            $subject_marks_selection_query="";
            for ($i=0;$i<count($class_subjects);$i++) {
                $subject=$class_subjects[$i]['Name'];
                $subject_total_marks=Subject_Total_marks($current_class, $subject);
                $all_subjects_total_marks=$all_subjects_total_marks
                +
                $subject_total_marks;
                echo "<th> $subject </th>";
                $subject_marks_selection_query = $subject_marks_selection_query.
                Change_Subject_To_Marks_col($subject).
                ',';
            }
            //echo $subject_marks_selection_query;
            echo'   <th> Total</th>
            <th> % </th>
            <th> Position </th>
        </tr></thead>';
            $qs="SELECT students_info.Roll_No, students_info.Name,
          $subject_marks_selection_query students_info.Class_Position
          FROM chitor_db.students_info JOIN chitor_db.marks
          ON chitor_db.students_info.Roll_No = chitor_db.marks.Roll_No
          WHERE students_info.Class=$class_name
          AND students_info.School=$school_name order by Roll_No ASC";
            $qr=mysqli_query($link, $qs) or die('error:'.mysqli_error($link));
            $i=1;
            while ($qfa=mysqli_fetch_assoc($qr)) {
                echo  '<tr>
                  <td>'.$i. '</td>
                   <td>'.$qfa['Roll_No']. '</td>
                   <td>'.$qfa['Name']. '</td>';
                // Array to store all marks of a student
                   $marks_array=[];
                for ($i=0;$i<count($class_subjects);$i++) {
                    // Get the name of each subject
                        $subject=$class_subjects[$i]['Name'];
                    // Change Subject Name to its corresponding Makrs Column in db
                        $marks_array[$i]=$qfa[Change_Subject_To_Marks_col($subject)];
                    // Show Student Marks.
                    // If marks=-1 show A (for absent)
                        echo  '<td>'.Show_absent($marks_array[$i]) .'</td>';
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
                $position=substr($qfa['Class_Position'], 0, 6);

                 echo  '<td>'. $student_total. '</td>
                 <td>' . number_format($percentage, 1, '.', ' ') . '</td>
                 <td>'. $position  .'</td>
                 </tr>';
                   $i++;
            }
            echo  "<h5 class='text-center'>
                        $class_result_header Class:" . $class_name .
                        " School: " . $school_name . "Date:" .date('d-M-Y')." <h5>";
        }
        ?>
    </table>
  </div>
</div>
</div>
<?php Page_close();?>
