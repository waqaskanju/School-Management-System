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
   * @link Adfas
   **/
  session_start();
require_once 'sand_box.php';
$link=$LINK;
Page_header('Show Class');
$show_class=$CLASS_NAME;
$show_school=$SCHOOL_NAME;
$status="1";

if (isset($_GET['status'])) {

    $show_class=$_GET['class_exam'];
    $show_class=Validate_input($show_class);

    $show_school=$_GET['school'];
    $show_school=Validate_input($show_school);
    $status=$_GET['status'];
    if ($status=="active") {
        $status="1";
    } else if ($status=="struck off") {
        $status="0";
    } else if ($status=="both") {

        //$rest=substr($show_class, 1, 1);
        preg_match_all('/[0-9]+/', $show_class, $matches);
         $numberic_class_name=$matches[0][0];

    } else {
        $statu="1";
    }

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
            $selected_school=$SCHOOL_NAME;
            Select_class($selected_class);
            Select_school($selected_school);
            ?>

          </div>
          <button type="submit" name="status" value="struck off"
          class="btn btn-primary">
            Show Inactive Students
          </button>
          <button type="submit" name="status" value="active" class="btn btn-primary">
            Show Active Students
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
              order by Roll_No ASC";
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
                echo  '<tr>
                <td>'.$serial_no. '</td>
                <td>
                  <img class="img img-fluid"  src="pictures/'.$qfa['Roll_No'].'">
                </td>

                          <td>'.$qfa['Admission_No']. '</td>
                          <td>'.$qfa['Roll_No']. '</td>
                          <td>'.$qfa['Name']. '</td>
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
