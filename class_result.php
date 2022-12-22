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
        select_class($selected_class);

        select_school($SCHOOL_SHOW);?>
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
            if ($current_class=="6th") {
                $subject_array = $SIXTH_SUBJECT;

            } else if ($current_class=="7th") {

                $subject_array = $SEVENTH_SUBJECT;

            } else if ($current_class=="8th") {

                $subject_array = $EIGHTH_SUBJECT;

            } else if ($current_class=="9th" or $current_class=="9th A" or $current_class=="9th B" ) {

                $subject_array = $NINETH_SUBJECT;

            } else if ($current_class=="10th"  or $current_class=="10th A" or $current_class=="10th B") {

                $subject_array = $TENTH_SUBJECT;

            } else {
                $subject_array ="not a class";

            }
            echo'   <table class="table table-bordered">
            <thead>
            <tr>
            <th> S No </th>
            <th> Roll No </th>
            <th> Name </th>';
            if (Select_Class_subject($current_class, "English", $subject_array)) {
                echo '<th> English </th>';
            }
            if (Select_Class_subject($current_class, "Urdu", $subject_array)) {
                echo '<th> Urdu</th>';
            }
            if (Select_Class_subject($current_class, "Maths", $subject_array)) {
                echo ' <th> Maths</th>';
            }
            if (Select_Class_subject($current_class, "Hpe", $subject_array)) {
                echo '  <th> Hpe</th>';
            }
            if (Select_Class_subject($current_class, "Nazira", $subject_array)) {
                echo '  <th> Nazira</th>';
            }
            if (Select_Class_subject($current_class, "General Science", $subject_array)) {
                echo '  <th>General Science</th>';
            }
            if (Select_Class_subject($current_class, "Arabic", $subject_array)) {
                echo ' <th> Arabic</th>';
            }
            if (Select_Class_subject($current_class, "Islamyat", $subject_array)) {
                echo '  <th> Islamyat</th>';
            }
            if (Select_Class_subject($current_class, "History And Geography", $subject_array)) {
                echo '   <th> History And Geography</th>';
            }
            if (Select_Class_subject($current_class, "Computer Science", $subject_array)) {
                echo '  <th> Computer Science</th>';
            }
            if (Select_Class_subject($current_class, "Mutalia Quran", $subject_array)) {
                echo '  <th> Mutalia Quran</th>';
            }
            if (Select_Class_subject($current_class, "Qirat", $subject_array)) {
                echo '   <th> Qirat</th>';
            }
            if (Select_Class_subject($current_class, "Pak Study", $subject_array)) {
                echo '   <th>Pak Study</th>';
            }
            if (Select_Class_subject($current_class, "Pashto", $subject_array)) {
                echo '   <th> Pashto</th>';
            }
            if (Select_Class_subject($current_class, "Drawing", $subject_array)) {
                echo '    <th> Drawing</th>';
            }
            if (Select_Class_subject($current_class, "Biology", $subject_array)) {
                echo '     <th>Biology</th>';
            }
            if (Select_Class_subject($current_class, "Chemistry", $subject_array)) {
                echo '     <th>Chemistry</th>';
            }
            if (Select_Class_subject($current_class, "Physics", $subject_array)) {
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
          marks.Physics_Marks,students_info.Class_Position FROM chitor_db.students_info JOIN chitor_db.marks ON chitor_db.students_info.Roll_No = chitor_db.marks.Roll_No WHERE students_info.Class=$class_name AND students_info.School=$school_name order by Admission_No ASC";
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

                if (Select_Class_subject($current_class, "English", $subject_array)) {

                    echo  '<td>'.Show_absent($english_marks) .'</td>';
                }
                if (Select_Class_subject($current_class, "Urdu", $subject_array)) {
                    echo '<td>'.Show_absent($urdu_marks). '</td>';
                }
                if (Select_Class_subject($current_class, "Maths", $subject_array)) {
                    echo ' <td>'.Show_absent($maths_marks). '</td>';
                }
                if (Select_Class_subject($current_class, "Hpe", $subject_array)) {
                    echo ' <td>'.Show_absent($hpe_marks). '</td>';
                }
                if (Select_Class_subject($current_class, "Nazira", $subject_array)) {
                    echo ' <td>'.Show_absent($nazira_marks). '</td>';
                }
                if (Select_Class_subject($current_class, "General Science", $subject_array)) {
                    echo ' <td>'.Show_absent($science_marks).'</td>';
                }
                if (Select_Class_subject($current_class, "Arabic", $subject_array)) {
                    echo ' <td>'.Show_absent($arabic_marks). '</td>';
                }
                if (Select_Class_subject($current_class, "Islamyat", $subject_array)) {
                    echo '  <td>'.Show_absent($islamyat_marks). '</td>';
                }
                if (Select_Class_subject($current_class, "History And Geography", $subject_array)) {
                    echo '  <td>'.Show_absent($history_marks). '</td>';
                }
                if (Select_Class_subject($current_class, "Computer Science", $subject_array)) {
                    echo '   <td>'.Show_absent($computer_marks). '</td>';
                }
                if (Select_Class_subject($current_class, "Mutalia Quran", $subject_array)) {
                    echo '   <td>'.Show_absent($mutalia_marks). '</td>';
                }
                if (Select_Class_subject($current_class, "Qirat", $subject_array)) {
                    echo '   <td>'.Show_absent($qirat_marks). '</td>';
                }
                if (Select_Class_subject($current_class, "Pak Study", $subject_array)) {
                    echo '   <td>'.Show_absent($social_marks). '</td>';
                }
                if (Select_Class_subject($current_class, "Pashto", $subject_array)) {
                    echo '   <td>'.Show_absent($pashto_marks). '</td>';
                }
                if (Select_Class_subject($current_class, "Drawing", $subject_array)) {
                    echo '    <td>'.Show_absent($drawing_marks). '</td>';
                }
                if (Select_Class_subject($current_class, "Biology", $subject_array)) {
                    echo '    <td>'.Show_absent($biology_marks). '</td>';
                }
                if (Select_Class_subject($current_class, "Chemistry", $subject_array)) {
                    echo '   <td>'.Show_absent($chemistry_marks). '</td>';
                }
                if (Select_Class_subject($current_class, "Physics", $subject_array)) {
                    echo '    <td>'.Show_absent($physics_marks). '</td>';
                }

                $total = Change_Absent_tozero($english_marks) + Change_Absent_tozero($urdu_marks) + Change_Absent_tozero($maths_marks) + Change_Absent_tozero($hpe_marks) +
                Change_Absent_tozero($nazira_marks) + Change_Absent_tozero($science_marks) +
                Change_Absent_tozero($arabic_marks) + Change_Absent_tozero($islamyat_marks) + Change_Absent_tozero($history_marks) +
                Change_Absent_tozero($computer_marks) + Change_Absent_tozero($mutalia_marks) + Change_Absent_tozero($qirat_marks) +
                Change_Absent_tozero($social_marks) + Change_Absent_tozero($pashto_marks) + Change_Absent_tozero($drawing_marks) +
                Change_Absent_tozero($biology_marks) + Change_Absent_tozero($chemistry_marks) + Change_Absent_tozero($physics_marks);


                $all_subject_marks=subject_total_marks($current_class);
                $percentage =($total*100)/$all_subject_marks;
                $position=substr($qfa['Class_Position'], 0, 6);

                 echo  '<td>'. $total. '</td>
                 <td>' . number_format($percentage, 1, '.', ' ') . '</td>
                 <td>'. $position  .'</td>
                 </tr>';
                   $i++;
            }
            echo  "<h5 class='text-center'> Monthly Test of OCT Class:" .$class_name . " School:" . $school_name . "Date:" .date('d-M-Y')." <h5>";
        }
        ?>
    </table>
  </div>
</div>
</div>
<?php Page_close();?>
