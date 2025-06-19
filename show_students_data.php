<?php
  /**
   * Show Class data of Students
   * php version 8.1
   *
   * @category Student
   *
   * @package None
   *
   * @author Waqas Ahmad <waqaskanju@gmail.com>
   *
   * @license http://www.abc.com MIT
   *
   * @link None
   **/
session_start();
require_once 'sand_box.php';
$link=$LINK;
Page_header('Show Class');
$show_class=$CLASS_NAME;
$show_school=$SCHOOL_NAME;
// Status 1 means only show active students. I only need list of active students.
$status="1";
 // Select only number from class name. required in high admission no and both classes.
preg_match_all('/[0-9]+/', $show_class, $matches);
// select the number from class name, for example in "class 6th A" it will return 6
 $numberic_class_name=$matches[0][0];

if (isset($_GET['status'])) {


    // Name of class.
    $show_class=$_GET['class_exam'];
    $show_class=Validate_input($show_class);
    $numberic_class_name=$show_class;
    $show_school=$_GET['school'];
    $show_school=Validate_input($show_school);
    $status=$_GET['status'];
    if ($status=="active") {
        $status="1";
    } else if ($status=="struck off") {
        $status="0";
    } else if ($status=="SLC") {
        $status="3";

    } else if ($status=="both") {

      // this code is used at the top of page so no need here.
     //  preg_match_all('/[0-9]+/', $show_class, $matches);
       // select the number from class name, for example in "class 6th A" it will return 6
      //  $numberic_class_name=$matches[0][0];

    } else {
        $status="1";
    }

    $order_by=$_GET['order_by'];



}

  // When the page is opened, order by is not set. so here a default value is given.
if(!isset($order_by)) {
  $order_by="Roll_No";
}


?>
</head>
<body>
<?php require_once 'nav.html';?>
  <div class="bg-warning text-center no-print">
    <h4>Show Class Information</h4>
  </div>
<div class="container-fluid no-print">
        <form class="" action="#" method="GET">
          <div class="row">
          <?php
            $selected_class=$CLASS_NAME;

            // In the dropdown class name selected class name will be selected.
            if(isset($show_class)){
              $selected_class=$show_class;
            }
            $selected_school=$SCHOOL_NAME;
            Select_class($selected_class);
            Select_school($selected_school);
            ?>

          </div>
<!-- Order by Section start -->
          <!-- Row of order by -->
          <div> 
          <label for="">Order by</label>  
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="order_by" id="roll_no" value="Roll_No"
           <?php
          
            if($order_by=="Roll_No") {
              echo "Checked";
            } else 
            ?>
            >
            <label class="form-check-label" for="roll_no">Roll No</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="order_by" id="admission" value="Admission_No"
            <?php
          
          if($order_by=="Admission_No") {
            echo "Checked";
          } else 
          ?>
            >
            <label class="form-check-label" for="admission_no">Admission No</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="order_by" id="class_no" value="Class_No"
            <?php
          
          if($order_by=="Class_No") {
            echo "Checked";
          } else 
          ?>
            >
            <label class="form-check-label" for="class_no">Class No</label>
          </div>
        </div>
<!-- Order by section ends -->


          <button type="submit" name="status" value="struck off"
          class="btn btn-primary">
            Show Inactive Students
          </button>
          <button type="submit" name="status" value="active" class="btn btn-primary">
            Show Active Students
          </button>
          <button type="submit" name="status" value="SLC" class="btn btn-primary">
            SLC
          </button>
          <button type="submit" name="status" value="both" class="btn btn-primary">
            Show Both Class A & B
          </button>

        </form>
</div>
<div class="container">
  <div class="row">
      <div class="col-md-12 ">
        <table class="table" border="1">
          <caption style="caption-side: top">
            <h4>
              <?php echo "Showing Data of Class:
                <u>$show_class</u> School: <u>$show_school</u>";
                    echo ' Date: <u>'. Date('d/m/Y'). '</u>';
                ?>
            </h4>
          </caption>
          <tr>
            <td>Serial No</td>
            <td>Class No</td>
            <td>Pictures</td>
            <td>Admission No</td>
            <td>Roll No</td>
            <td>Name</td>
            <td>Father Name</td>
            <td>Dob </td>
            <td>Mobile No</td>
            <td>Father CNIC</td>
            <td>Form B</td>
            <td>Status</td>
            <?php
            if ($status=="both") {
                echo '<td>Class</td>';
            }
            ?>
          </tr>
            <?php
          


            $qs="Select * from students_info WHERE
              Class='".$show_class."' AND
              school='".$show_school."' AND
              status='".$status."'
              order by $order_by ASC";
            if ($status=="both") {
                // Add  A and B with the Class Name if both is pressed.
                $a=$numberic_class_name.'th A';
                $b=$numberic_class_name.'th B';
                $show_class= "$a' OR Class='$b";

                $qs="Select * from students_info WHERE
                (Class='".$show_class."') AND
                School='".$show_school."' AND
                Status='1'
                order by Roll_No ASC";


            }
              $qr=mysqli_query($link, $qs)or die('error:'.mysqli_error($link));
              $serial_no=1;
            while ($qfa=mysqli_fetch_assoc($qr)) {
               $Roll_No=$qfa['Roll_No'];
               $picture_url="pictures/$Roll_No.png";
               $middle_admission=$qfa['Admission_No'];
               $high_admission=$qfa['Admission_No_High'];
               $admission_no=show_admission_no($numberic_class_name,$middle_admission,$high_admission);
                echo  '<tr>
                <td>'.$serial_no. '</td>
                <td>'.$qfa['Class_No']. '</td>';
                ?>
                <td>
                  <img class="img img-fluid"  src="<?php echo $picture_url;?>">
                </td>
                <?php
 
                     echo '<td>'.$admission_no .'</td>';
                          echo '<td>';
                          echo "<a target='_blank' href='edit_student.php?roll_no=$Roll_No&submit=Search#'>
                          $Roll_No<i class='bi bi-pencil no-print'></i></a>";
                          echo '<td>'.$qfa['Name']. '</td>
                          <td>'.$qfa['FName']. '</td>
                          <td>'.Change_Date_To_Pak_format($qfa['Dob']). '</td>
                          <td>'.$qfa['Mobile_No']. '</td>
                          <td>'.$qfa['Father_Cnic']. '</td>
                          <td>'.$qfa['Student_Form_B']. '</td>
                          <td>'.Change_Status_To_word($qfa['Status']). '</td>';
                          if ($status=="both") {
                            echo '<td>'.$qfa['Class']. '</td>';
                          }
                        echo '</tr>';
                        $serial_no=$serial_no+1;
            }
            ?>
          </table>
        </div>
      </div>
  </div>

  <?php Page_close(); ?>
