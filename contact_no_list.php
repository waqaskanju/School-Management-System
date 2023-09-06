<?php
  /**
   * Contact No List
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
// Status 1 means only show active students. I only need list of active students.
$status="1";

if (isset($_GET['status'])) {
    // Name of class.
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

       preg_match_all('/[0-9]+/', $show_class, $matches);
       // select the number from class name, for example in "class 6th A" it will return 6
        $numberic_class_name=$matches[0][0];

    } else {
        $status="1";
    }

}




?>
</head>
<body>
<?php require_once 'nav.html';?>
  <div class="bg-warning text-center no-print">
    <h4>Show Class Contact Information</h4>
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
<!-- End of container fluid -->
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2">
      <img class="img-fluid" src="./images/khyber.png" alt="khyber">
    </div>
    <div class="text-center col-sm-8">
      <h3><?php echo $SCHOOL_FULL_NAME; ?> </h3>
      <h3><?php echo  $SCHOOL_LOCATION; ?>  </h3>
      <h5>
      <?php
      $class_name=$_GET['class_exam'];
      $date=date('d-M-Y');
       ?>
          <?php
            // A message from config page.
            echo "Contact No List of  Class: <u>$class_name</u> &nbsp; Date:<u> $date </u> ";
            ?>
      </h5>

      </div>
      <div class="col-sm-2">
        <img class="img-fluid" src="./images/kpesed.png" alt="kpesed.png">
      </div>
    </div> <!--row end -->
  </div> <!--fluid end -->
<!-- started of body table container -->
<div class="container">
  <div class="row">
      <div class="col-md-12 ">
        <table class="table" border="1">
          <tr class="border border-dark">
            <td class="border border-dark fw-bolder">Serial No</td>
            <td class="border border-dark fw-bolder">Roll No</td>
            <td class="border border-dark fw-bolder">Name</td>
            <td class="border border-dark fw-bolder">Father Name</td>
            <td class="border border-dark fw-bolder">Mobile No</td>
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
               $Roll_No=$qfa['Roll_No'];
                echo  '<tr class="border border-dark">
                <td class="border border-dark fw-bolder">'.$serial_no. '</td>
                <td class="border border-dark fw-bolder">'.$Roll_No. '</td>
                   <td class="border border-dark fw-bolder">'.$qfa['Name']. '</td>
                          <td class="border border-dark fw-bolder">'.$qfa['FName']. '</td>

                          <td class="border border-dark fw-bolder">'.$qfa['Mobile_No']. '</td>
                        </tr>';
                        $serial_no=$serial_no+1;
            }
            ?>
          </table>
        </div> <!-- End of 12 md-->
      </div> <!-- End of row -->
  </div> <!-- End of container -->

  <?php Page_close(); ?>
