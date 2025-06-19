<?php
/**
 * Add New Students to LMS
 * php version 8.1
 *
 * @category Exam
 *
 * @package None
 *
 * @author Waqas Ahmad <waqaskanju@gmail.com>
 *
 * @license http://www.abc.com MIT
 *
 * @link award_list.php
 **/
session_start();
require_once 'sand_box.php';
$link=$LINK;
Page_Header('Monthly Class Result report Single Subject');
?>
    </style>
    
</head>
<!-- <body onload="Load_class_subject()"> -->
  <body>
  <?php require_once 'nav.html';?>
  <div class="container-fluid">
    <form action="#" method="GET" id="award-list-form" 
    onsubmit='Save_class_subject()'>
      <div class="row no-print">
        <?php
            $selected_class='';
            Select_school($SCHOOL_NAME);
            
            $selected_class='';
            Select_class($selected_class);

            $selected_subject='';
            Select_subject($selected_subject);
        ?>
      </div>
        <button class="no-print btn btn-primary mt-2" type="submit" name="submit">
          Submit
        </button>
    </form>
</div> <!-- End of container-->
<?php
if (isset($_GET['submit'])) {
    $class_name=$_GET['class_exam'];
    $class_name=str_replace('\'', '', $class_name);
    $class_name=Validate_input($class_name);

    $school_name=$_GET['school'];
    $school_name=str_replace('\'', '', $school_name);
    $school_name=Validate_input($school_name);

    $subject_name=$_GET['subject'];
    $subject_name=str_replace('\'', '', $subject_name);
    $subject_name=Validate_input($subject_name);
} else {
    $school_name='';
    $subject_name='Urdu';
    $teacher_name='';
    $class_name='6th';
}
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2">
      <img class="img-fluid" src="./images/khyber.png" alt="khyber">
    </div>
    <div class="text-center col-sm-8">
      <h3><?php echo $SCHOOL_FULL_NAME; ?> </h3>
      <h3><?php echo  $SCHOOL_LOCATION; ?>  </h3>
      <h5>

            Monthly Test and Notebook Checking Report
                 </h5>
      <h6>
        <?php echo "Class:".$class_name;  ?>
              <b>Teacher:</b> Mr.
	
            <?php
            if ($school_name=="GHSS Chitor") {
                 echo "<u>"; 
                 echo Subject_teacher($class_name, $subject_name);
                 echo "</u>";
            } else {
                echo "__________";
            }
            ?>
             <b>Subject:</b>  
             <u> 
             <?php echo $subject_name; ?>
            </u>
        </h6>
        <h6>
            <b>Print Date:</b> <u><?php echo date('d-M-Y') ?></u>
            <b>School Name:</b> <u><?php echo $school_name ?></u>
        </h6>
        <h6><b>Total Test Marks <u><b>50 </b></u>  Current Notebook checking Unit No ___________ </b></h6>
      </div>
      <div class="col-sm-2">
        <img class="img-fluid" src="./images/kpesed.png" alt="kpesed.png">
      </div>
    </div> <!--row end -->
  </div> <!--fluid end -->
  <div id="spinner">
    <img src="./images/spinner.gif" alt="spinner">
  </div>
  <div class="container-fluid">
    <table class="table border border-dark" id="award-list">
      <thead>
        <tr class="border border-dark">
          <th class="border border-dark fw-bolder">S #</th>
          <th class="border border-dark fw-bolder">Roll #</th>
          <th class="border border-dark fw-bolder">Name</th>
          <th class="border border-dark fw-bolder">Father Name</th>
          <th class="border border-dark fw-bolder">Notebook <br> Checked</th>
          <th class="border border-dark fw-bolder">Checking date</th>
          <th class="border border-dark fw-bolder">Test Marks</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $q="Select * from students_info WHERE
            Class='$class_name'
            AND
            School='$school_name'
            AND
            Status='1' order by Roll_No ASC";
        $qr=mysqli_query($link, $q) or die('Error in Q 1'.mysqli_error($link));
        $i=1;
        while ($qfa=mysqli_fetch_assoc($qr)) {
          $roll_no=$qfa['Roll_No'];
                echo  '<tr>
                            <td class="border border-dark fw-bolder">'.$i. '</td>
                            <td class="border border-dark 
                            fw-bolder">'.$roll_no.'</td>
                            
                            <td class="border border-dark 
                            fw-bolder">'.$qfa['Name'].'</td>

                            <td class="border border-dark 
                            fw-bolder">'.$qfa['FName'].'</td>

                            <td class="border border-dark fw-bolder"></td>
                            <td class="border border-dark fw-bolder"></td>
                            <td class="border border-dark fw-bolder">'?>  
                            <?php
                            $subject=Change_Subject_To_Marks_col($subject_name);
                           // echo $q="SELECT  $subject from  WHERE Roll_No=$roll_no"; 
                             //data
                            $marks_array=Select_Column_data('marks',$subject,'Roll_No',$roll_no);
                             
                             $marks=$marks_array[$subject];
                           //for random genration of marks
                              $marks=rand(-1,50);

                             echo Show_absent($marks)
                            
                            ?>
                            </td></tr>
                      <?php      
            $i++;
        }
        ?>
        </tbody>
    </table>
    <p><b>Total No of Students: <?php echo $i-1;?></b></p> 
    <div class="row same-page">
        <div class="col-sm-6">
            <p class="display-6">Test Detail </p>
            
            <table class="table border border-dark">
                <tr class="border border-dark">
                    
                    <th class="border border-dark fw-bolder">Appeared in Test:</th>
                    <th class="border border-dark fw-bolder">No of Pass:</th>
                    <th class="border border-dark fw-bolder">No of Fail</th>
                </tr>
                <tr class="border border-dark">
                    <td class="border border-dark fw-bolder"></td>
                    <td class="border border-dark fw-bolder"></td>
                    <td class="border border-dark fw-bolder"><br></td>
                </tr>
            </table>
        </div>
        <div class="col-sm-6">
            <p class="display-6">Notebook Checking Detail </p>
            <table class="table border border-dark">
                <tr class="border border-dark">
                    <th class="border border-dark fw-bolder">No of Notebooks checked</th>
                    <th class="border border-dark fw-bolder">No of Notebooks left</th>
                  
                </tr>
                <tr class="border border-dark">
                    <td class="border border-dark fw-bolder"></td>
                    <td class="border border-dark fw-bolder"><br></td>
                </tr>
            </table>
        </div>
    </div>
</div>  <!-- End of container -->
<script>
  document.getElementById('spinner').style.display = "none";
</script>
<script src='js/award_list.js'></script>
<?php Page_close(); ?>
