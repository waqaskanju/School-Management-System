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
<!-- <div class="container">   -->
  <div>
<div class="row">
  <div class="col-md-12 ">
    <form action="#" method="GET">
      <div class="form-row no-print">
      <?php
        $selected_class='';
        Select_class($selected_class);
        Select_school($SCHOOL_SHOW);?>
    </div>
      <button class="no-print" type="submit" name="submit" class="btn btn-primary">
        Submit
    </button>

    </form>



      <?php
        if (isset($_GET['submit'])) {
            $class_name=$_GET['class_exam'];
            $school_name=$_GET['school'];
            $class_name= "'$class_name'";
            $school_name="'$school_name'";

            $current_class = str_replace("'", "", $class_name);
            // Initially marks.
            $total_marks=0;
            echo'   <table class="table table-bordered">
            <thead>
            <tr>
            <th> S No </th>
            <th> Roll No </th>
            <th> Name </th>';
            if (Check_Subject_For_class($current_class, "English")) {
                $marks =  Subject_Total_marks($current_class, "English");
                $total_marks = $total_marks+$marks;
                echo '<th> English </th>';
            }
            if (Check_Subject_For_class($current_class, "Urdu")) {
                $marks=Subject_Total_marks($current_class, "Urdu");
                $total_marks = $total_marks+$marks;
                echo '<th> Urdu</th>';
            }
            if (Check_Subject_For_class($current_class, "Maths")) {
                $marks=Subject_Total_marks($current_class, "Maths");
                $total_marks = $total_marks+$marks;
                echo ' <th> Maths</th>';
            }
            if (Check_Subject_For_class($current_class, "Hpe")) {
                $marks=Subject_Total_marks($current_class, "Hpe");
                $total_marks = $total_marks+$marks;
                echo '  <th> Hpe</th>';
            }
            if (Check_Subject_For_class($current_class, "Nazira")) {
                $marks =  Subject_Total_marks($current_class, "Nazira");
                $total_marks = $total_marks+$marks;
                echo '  <th> Nazira</th>';
            }
            if (Check_Subject_For_class($current_class, "General Science")) {
                $marks=Subject_Total_marks($current_class, "General Science");
                $total_marks = $total_marks+$marks;
                echo '  <th>General Science</th>';
            }
            if (Check_Subject_For_class($current_class, "Arabic")) {
                $marks =  Subject_Total_marks($current_class, "Arabic");
                $total_marks = $total_marks+$marks;
                echo ' <th> Arabic</th>';
            }
            if (Check_Subject_For_class($current_class, "Islamyat")) {
                $marks=Subject_Total_marks($current_class, "Islamyat");
                $total_marks = $total_marks+$marks;
                echo '  <th> Islamyat</th>';
            }
            if (Check_Subject_For_Class(
                $link, $current_class, "History And Geography"
            )
            ) {
                $marks=Subject_Total_marks(
                    $current_class, "History And Geography"
                );
                $total_marks = $total_marks+$marks;
                echo '   <th> History And Geography</th>';
            }
            if (Check_Subject_For_class($current_class, "Computer Science")) {
                $marks=Subject_Total_marks(
                    $current_class, "Computer Science"
                );
                $total_marks = $total_marks+$marks;
                echo '  <th> Computer Science</th>';
            }
            if (Check_Subject_For_class($current_class, "Mutalia Quran")) {
                $marks=Subject_Total_marks(
                    $current_class, "Mutalia Quran"
                );
                $total_marks = $total_marks+$marks;

                echo '  <th> Mutalia Quran</th>';
            }
            if (Check_Subject_For_class($current_class, "Qirat")) {
                $marks =  Subject_Total_marks(
                    $current_class, "Qirat"
                );
                $total_marks = $total_marks+$marks;
                echo '   <th> Qirat</th>';
            }
            if (Check_Subject_For_class($current_class, "Social Study")) {
                $marks=Subject_Total_marks(
                    $current_class, "Social Study"
                );
                $total_marks = $total_marks+$marks;
                echo '   <th>Pak/Social Study</th>';
            }
            if (Check_Subject_For_class($current_class, "Pashto")) {
                $marks =  Subject_Total_marks($current_class, "Pashto");
                $total_marks = $total_marks+$marks;
                echo '   <th>Pashto</th>';
            }
            if (Check_Subject_For_class($current_class, "Drawing")) {
                $marks =  Subject_Total_marks($current_class, "Drawing");
                $total_marks = $total_marks+$marks;
                echo '    <th>Drawing</th>';
            }
            if (Check_Subject_For_class($current_class, "Biology")) {
                $marks =  Subject_Total_marks($current_class, "Biology");
                $total_marks = $total_marks+$marks;
                echo '     <th>Biology</th>';
            }
            if (Check_Subject_For_class($current_class, "Chemistry")) {
                $marks =  Subject_Total_marks($current_class, "Chemistry");
                $total_marks = $total_marks+$marks;
                echo '     <th>Chemistry</th>';
            }
            if (Check_Subject_For_class($current_class, "Physics")) {
                $marks =  Subject_Total_marks($current_class, "Physics");
                $total_marks = $total_marks+$marks;
                echo '     <th>Physics</th>';
            }
            echo'   <th> Total</th>
            <th> % </th>
            <th> Position </th>
        </tr></thead>';
            $qs="SELECT students_info.Roll_No, students_info.Name,
          marks.English_Marks,
          marks.Urdu_Marks,
          marks.Maths_Marks,
          marks.Hpe_Marks,
          marks.Nazira_Marks,
          marks.Science_Marks,
          marks.Arabic_Marks,
          marks.Islamyat_Marks,
          marks.History_Marks,
          marks.Computer_Marks,
          marks.Mutalia_Marks,
          marks.Qirat_Marks,
          marks.Social_Marks,
          marks.Pashto_Marks,
          marks.Drawing_Marks,
          marks.Biology_Marks,
          marks.Chemistry_Marks,
          marks.Physics_Marks,students_info.Class_Position
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
                  $english_marks = $qfa['English_Marks'];
                  $urdu_marks=$qfa['Urdu_Marks'];
                  $maths_marks=$qfa['Maths_Marks'];
                  $hpe_marks=$qfa['Hpe_Marks'];
                  $nazira_marks=$qfa['Nazira_Marks'];
                  $science_marks=$qfa['Science_Marks'];
                  $arabic_marks=$qfa['Arabic_Marks'];
                  $islamyat_marks=$qfa['Islamyat_Marks'];
                  $history_marks=$qfa['History_Marks'];
                  $computer_marks=$qfa['Computer_Marks'];
                  $mutalia_marks=$qfa['Mutalia_Marks'];
                  $qirat_marks=$qfa['Qirat_Marks'];
                  $social_marks=$qfa['Social_Marks'];
                  $pashto_marks=$qfa['Pashto_Marks'];
                  $drawing_marks=$qfa['Drawing_Marks'];
                  $biology_marks=$qfa['Biology_Marks'];
                  $chemistry_marks=$qfa['Chemistry_Marks'];
                  $physics_marks=$qfa['Physics_Marks'];

                if (Check_Subject_For_class($current_class, "English")) {

                    echo  '<td>'.Show_absent($english_marks) .'</td>';
                }
                if (Check_Subject_For_class($current_class, "Urdu")) {
                    echo '<td>'.Show_absent($urdu_marks). '</td>';
                }
                if (Check_Subject_For_class($current_class, "Maths")) {
                    echo ' <td>'.Show_absent($maths_marks). '</td>';
                }
                if (Check_Subject_For_class($current_class, "Hpe")) {
                    echo ' <td>'.Show_absent($hpe_marks). '</td>';
                }
                if (Check_Subject_For_class($current_class, "Nazira")) {
                    echo ' <td>'.Show_absent($nazira_marks). '</td>';
                }
                if (Check_Subject_For_Class(
                    $link, $current_class, "General Science"
                )
                ) {
                    echo ' <td>'.Show_absent($science_marks).'</td>';
                }
                if (Check_Subject_For_class($current_class, "Arabic")) {
                    echo ' <td>'.Show_absent($arabic_marks). '</td>';
                }
                if (Check_Subject_For_class($current_class, "Islamyat")) {
                    echo '  <td>'.Show_absent($islamyat_marks). '</td>';
                }
                if (Check_Subject_For_Class(
                    $link, $current_class, "History And Geography"
                )
                ) {
                    echo '  <td>'.Show_absent($history_marks). '</td>';
                }
                if (Check_Subject_For_Class(
                    $link, $current_class, "Computer Science"
                )
                ) {
                    echo '   <td>'.Show_absent($computer_marks). '</td>';
                }
                if (Check_Subject_For_Class(
                    $link, $current_class, "Mutalia Quran"
                )
                ) {
                    echo '   <td>'.Show_absent($mutalia_marks). '</td>';
                }
                if (Check_Subject_For_class($current_class, "Qirat")) {
                    echo '   <td>'.Show_absent($qirat_marks). '</td>';
                }
                if (Check_Subject_For_class($current_class, "Pak Study")) {
                    echo '   <td>'.Show_absent($social_marks). '</td>';
                }
                if (Check_Subject_For_class($current_class, "Pashto")) {
                    echo '   <td>'.Show_absent($pashto_marks). '</td>';
                }
                if (Check_Subject_For_class($current_class, "Drawing")) {
                    echo '    <td>'.Show_absent($drawing_marks). '</td>';
                }
                if (Check_Subject_For_class($current_class, "Biology")) {
                    echo '    <td>'.Show_absent($biology_marks). '</td>';
                }
                if (Check_Subject_For_class($current_class, "Chemistry")) {
                    echo '   <td>'.Show_absent($chemistry_marks). '</td>';
                }
                if (Check_Subject_For_class($current_class, "Physics")) {
                    echo '    <td>'.Show_absent($physics_marks). '</td>';
                }

                $total = Change_Absent_tozero($english_marks) +
                Change_Absent_tozero($urdu_marks) +
                Change_Absent_tozero($maths_marks) +
                Change_Absent_tozero($hpe_marks) +
                Change_Absent_tozero($nazira_marks) +
                Change_Absent_tozero($science_marks) +
                Change_Absent_tozero($arabic_marks) +
                Change_Absent_tozero($islamyat_marks) +
                Change_Absent_tozero($history_marks) +
                Change_Absent_tozero($computer_marks) +
                Change_Absent_tozero($mutalia_marks) +
                Change_Absent_tozero($qirat_marks) +
                Change_Absent_tozero($social_marks) +
                Change_Absent_tozero($pashto_marks) +
                Change_Absent_tozero($drawing_marks) +
                Change_Absent_tozero($biology_marks) +
                Change_Absent_tozero($chemistry_marks) +
                Change_Absent_tozero($physics_marks);


                // $all_subject_marks=class_total_marks($current_class);
                $all_subject_marks=$total_marks;
                $percentage =($total*100)/$all_subject_marks;
                $position=substr($qfa['Class_Position'], 0, 6);

                 echo  '<td>'. $total. '</td>
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
