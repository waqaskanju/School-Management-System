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
  <?php require_once 'nav.php';?>
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
      <button class="no-print" type="submit" name="submit" class="btn btn-primary">Submit</button>

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

            }
            else if ($current_class=="7th") {

                $subject_array = $SEVENTH_SUBJECT;

            }
            else if ($current_class=="8th") {

                $subject_array = $EIGHTH_SUBJECT;

            }
            else if ($current_class=="9th" or $current_class=="9th A" or $current_class=="9th B" ) {

                $subject_array = $NINETH_SUBJECT;

            }
            else if($current_class=="10th"  or $current_class=="10th A" or $current_class=="10th B") {

                $subject_array = $TENTH_SUBJECT;

            }
            else {
                $subject_array ="not a class";

            }
            echo'   <table class="table table-bordered">
            <thead>
            <tr>
            <th> S No </th>
            <th> Roll No </th>
            <th> Name </th>';
            if(Select_Class_subject($current_class, "English", $subject_array)) {
                echo '<th> English </th>';
            }
            if(Select_Class_subject($current_class, "Urdu", $subject_array)) {
                echo '<th> Urdu</th>';
            }
            if(Select_Class_subject($current_class, "Maths", $subject_array)) {
                echo ' <th> Maths</th>';
            }
            if(Select_Class_subject($current_class, "Hpe", $subject_array)) {
                echo '  <th> Hpe</th>';
            }
            if(Select_Class_subject($current_class, "Nazira", $subject_array)) {
                echo '  <th> Nazira</th>';
            }
            if(Select_Class_subject($current_class, "General Science", $subject_array)) {
                echo '  <th> Science</th>';
            }
            if(Select_Class_subject($current_class, "Arabic", $subject_array)) {
                echo ' <th> Arabic</th>';
            }
            if(Select_Class_subject($current_class, "Islamyat", $subject_array)) {
                echo '  <th> Islamyat</th>';
            }
            if(Select_Class_subject($current_class, "History and Geography", $subject_array)) {
                echo '   <th> History & Geography</th>';
            }
            if(Select_Class_subject($current_class, "Computer Science", $subject_array)) {
                echo '  <th> Computer Science</th>';
            }
            if(Select_Class_subject($current_class, "Mutalia Quran", $subject_array)) {
                echo '  <th> Mutalia Quran</th>';
            }
            if(Select_Class_subject($current_class, "Qirat", $subject_array)) {
                echo '   <th> Qirat</th>';
            }
            if(Select_Class_subject($current_class, "Pak Study", $subject_array)) {
                echo '   <th> Social</th>';
            }
            if(Select_Class_subject($current_class, "Pashto", $subject_array)) {
                echo '   <th> Pashto</th>';
            }
            if(Select_Class_subject($current_class, "Drawing", $subject_array)) {
                echo '    <th> Drawing</th>';
            }
            if(Select_Class_subject($current_class, "Biology", $subject_array)) {
                echo '     <th> Biology</th>';
            }
            if(Select_Class_subject($current_class, "Chemistry", $subject_array)) {
                echo '     <th> Chemistry</th>';
            }
            if(Select_Class_subject($current_class, "Physics", $subject_array)) {
                echo '     <th> Physics</th>';
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
            while($qfa=mysqli_fetch_assoc($qr))
            {
                echo  '<tr>
                  <td>'.$i. '</td>
                   <td>'.$qfa['Roll_No']. '</td>
                   <td>'.$qfa['Name']. '</td>';
                if(Select_Class_subject($current_class, "English", $subject_array)) {
                    echo  '<td>'.$qfa['English_Marks'].'</td>';
                }
                if(Select_Class_subject($current_class, "Urdu", $subject_array)) {
                    echo '<td>'.$qfa['Urdu_Marks']. '</td>';
                }
                if(Select_Class_subject($current_class, "Maths", $subject_array)) {
                    echo ' <td>'.$qfa['Maths_Marks']. '</td>';
                }
                if(Select_Class_subject($current_class, "Hpe", $subject_array)) {
                    echo ' <td>'.$qfa['Hpe_Marks']. '</td>';
                }
                if(Select_Class_subject($current_class, "Nazira", $subject_array)) {
                    echo ' <td>'.$qfa['Nazira_Marks']. '</td>';
                }
                if(Select_Class_subject($current_class, "General Science", $subject_array)) {
                    echo ' <td>'.$qfa['Science_Marks'].'</td>';
                }
                if(Select_Class_subject($current_class, "Arabic", $subject_array)) {
                    echo ' <td>'.$qfa['Arabic_Marks']. '</td>';
                }
                if(Select_Class_subject($current_class, "Islamyat", $subject_array)) {
                    echo '  <td>'.$qfa['Islamyat_Marks']. '</td>';
                }
                if(Select_Class_subject($current_class, "History and Geography", $subject_array)) {
                    echo '  <td>'.$qfa['History_Marks']. '</td>';
                }
                if(Select_Class_subject($current_class, "Computer Science", $subject_array)) {
                    echo '   <td>'.$qfa['Computer_Marks']. '</td>';
                }
                if(Select_Class_subject($current_class, "Mutalia Quran", $subject_array)) {
                    echo '   <td>'.$qfa['Mutalia_Marks']. '</td>';
                }
                if(Select_Class_subject($current_class, "Qirat", $subject_array)) {
                    echo '   <td>'.$qfa['Qirat_Marks']. '</td>';
                }
                if(Select_Class_subject($current_class, "Pak Study", $subject_array)) {
                    echo '   <td>'.$qfa['Social_Marks']. '</td>';
                }
                if(Select_Class_subject($current_class, "Pashto", $subject_array)) {
                    echo '   <td>'.$qfa['Pashto_Marks']. '</td>';
                }
                if(Select_Class_subject($current_class, "Drawing", $subject_array)) {
                    echo '    <td>'.$qfa['Drawing_Marks']. '</td>';
                }
                if(Select_Class_subject($current_class, "Biology", $subject_array)) {
                    echo '    <td>'.$qfa['Biology_Marks']. '</td>';
                }
                if(Select_Class_subject($current_class, "Chemistry", $subject_array)) {
                    echo '   <td>'.$qfa['Chemistry_Marks']. '</td>';
                }
                if(Select_Class_subject($current_class, "Physics", $subject_array)) {
                    echo '    <td>'.$qfa['Physics_Marks']. '</td>';
                }
                $total = $qfa['English_Marks'] + $qfa['Urdu_Marks'] +
                $qfa['Maths_Marks'] + $qfa['Hpe_Marks'] +
                $qfa['Nazira_Marks'] + $qfa['Science_Marks'] +
                $qfa['Arabic_Marks'] + $qfa['Islamyat_Marks'] +
                $qfa['History_Marks'] + $qfa['Computer_Marks'] +
                $qfa['Mutalia_Marks'] + $qfa['Qirat_Marks'] +
                $qfa['Social_Marks'] + $qfa['Pashto_Marks'] +
                $qfa['Drawing_Marks'] + $qfa['Biology_Marks'] +
                $qfa['Chemistry_Marks'] + $qfa['Physics_Marks'];

                $percentage =($total*100)/320;
                $position=substr($qfa['Class_Position'], 0, 6);

                 echo  '<td>'. $total. '</td>
                 <td>' . number_format($percentage, 1, '.' , ' ') . '</td>
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
