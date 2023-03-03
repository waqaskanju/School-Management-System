<?php
/**
 * Show Student detail
 * php version 8.1
 *
 * @category Student
 *
 * @package None
 *
 * @author Waqas <waqas@waqaskanju.com>
 *
 * @license http://www.waqaskanju.com/license MIT
 *
 * @link http://www.waqaskanju.com/
 **/

  require_once 'db_connection.php';
  require_once 'sand_box.php';
  require_once 'config.php';
  $link=connect();

/* Rules for Naming add under score between two words. */
if (isset($GET_['submit'])) {
    $rollno=$_GET['roll_no'];
    $q="SELECT * FROM students_info WHERE Roll_No=".$rollno;

    $qr=mysqli_query($link, $q) or die('Error:'. mysqli_error($link));
    $qra=mysqli_fetch_assoc($qr);

    $Roll_No= $qra['Roll_No'];
    $Name= $qra['Name'];
    $Father_Name=$qra['FName'];
    $Dob=$qra['Dob'];
    $Mobile_No=$qra['Mobile_No'];
    $Admission_Date=$qra['Admission_Date'];
    $Admission_No=$qra['Admission_No'];
    $Father_Cnic=$qra['Father_Cnic'];
    $Student_Form_B=$qra['Student_Form_B'];
    $Class_Name=$qra['Class'];
    $School_Name=$qra['School'];
    $Class_Position= $qra['Class_Position'];
    $Status=$qra['Status'];


}

?>
<?php Page_header("Student Detail"); ?>
</head>
<body>
<div class="container border border-primary">
  <div class="container">
    <div class="row" style="margin-top:10px;">
      <div class="col-md-2">
        <img src="images/khyber.png"
             class="img img-fluid"
             alt="khyberlogo"height="auto" >
      </div>
      <div class="col-md-8">
        <h3 class="text-center text-uppercase">
        <?php
        if (isset($GET_['submit'])) {
            echo $SCHOOL_FULL_NAME;
            ?>
                        </h3>
        <h3 class="text-center text-uppercase">Chitor Swat </h3>
        <h4 class="text-center">Student Profile</h4>
      </div>
      <div class="col-md-2">
        <img src="images/kpesed.png"
        alt="booklogo"
        height="auto"
        class=" img img-fluid" >
      </div>
    </div>


    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <table class=" table">
            <tr>
              <td>
                <span class="font-weight-bold"> Name </span> </td>
                <td>
                  <?php
                    if (isset($GET_['submit'])) {
                        echo $Name;
                    }
                    ?> </td>
            </tr>
            <tr>
              <td>
                <span class="font-weight-bold"> Father's Name </span></td>
              <td>
                <?php
                if (isset($GET_['submit'])) {
                    echo $Father_Name;
                }
                ?> </td>
            </tr>
            <tr>
              <td>
                <span class="font-weight-bold"> School </span></td>
                <td>
                  <?php
                    if (isset($GET_['submit'])) {
                        echo $School_Name;
                    }
                    ?></td>
            </tr>
        </table>
        </div>
        <div class="col-md-4">
            <center>
              <img src="pictures/
              <?php
                if (isset($GET_['submit'])) {
                    echo $rollno;
                }  ?>.png"
                   class="img-fluid; max-width:50%; height: auto; img-thumbnail"
                   width="200"
                   height="200" >
            </center>
        </div>
      </div> <!-- Row of Naming and Picture -->
    </div> <!-- Naming information-->


  <div class="container">
    <div class="row" style="padding:20px">
      <div class="col-md-4">
        <span class="font-weight-bold"> Roll No </span>
        <span> <?php
        if (isset($GET_['submit'])) {
            echo $Roll_No ?>
           } </span>
      </div>
      <div class="col-md-4">

        <span class="font-weight-bold"> Class </span>
            <?php
            if (isset($GET_['submit'])) {
                echo $Class_Name;
            }
            ?>
      </div>
      <div class="col-md-4">
          <span class="font-weight-bold"> Session </span> 2021 - 2022
      </div>

    </div>
  </div>

  <div class="container">
      <div class="row">
        <div class="col-md-3">
            <tr>
              <td>
                <span class="font-weight-bold"> Dob </span>
              </td>
                <td>
                  <?php
                    if (isset($GET_['submit'])) {
                        echo $Dob;
                    }
                    ?>
                </td>
            </tr>
         </div>
         <div class="col-md-3">
            <tr>
              <td>
                <span class="font-weight-bold"> Admission No </span>
              </td>
              <td>
            <?php
            if (isset($GET_['submit'])) {
                echo $Admission_No;
            }
            ?>
            </td>
          </tr>
        </div>
          <div class="col-md-3">
            <tr>
              <td>
                <span class="font-weight-bold"> Admission Date</span>
              </td>
              <td>
                <?php
                if (isset($GET_['submit'])) {
                    echo $Admission_Date;
                } ?>
                </td>
            </tr>
          </div>
          <div class="col-md-3">
            <tr>
              <td>
                <span class="font-weight-bold"> Mobile No</span></td>
                <td><?php
                if (isset($GET_['submit'])) {
                    echo $Mobile_No;
                }?> </td>
            </tr>
          </div>
          <div class="col-md-3">
            <tr>
              <td>
                <span class="font-weight-bold">Father CNIC</span> </td>
                  <td>
                <?php
                if (isset($GET_['submit'])) {
                    echo $Father_Cnic;
                }
                ?>
                </td>
            </tr>
          </div>
        </div>
        <div class="row">
         <div class="col-md-3">
             <tr>
                 <td>
                  <span class="font-weight-bold">Student Form B</span> </td>
                  <td>
                    <?php
                    if (isset($GET_['submit'])) {
                        echo $Student_Form_B;
                    } ?>
                </td>
              </tr>
        </div>
        <div class="col-md-3">
           <tr>
              <td>
                <span class="font-weight-bold">Class Position</span>
              </td>
              <td>
                <?php
                if (isset($GET_['submit'])) {
                    echo $Class_Position;
                } ?>
              </td>
            </tr>
        </div>

        <div class="col-md-3">
          <tr>
              <td>
                <span class="font-weight-bold">Status</span>
              </td>
              <td>
                <?php
                if (isset($GET_['submit'])) {
                    if ($Status=='0') {
                        echo 'Inactive';
                    } else {
                        echo 'Active';
                    }
                }

        }
        }
        ?>
              </td>
          </tr>
         </div>
          </div>


      </div> <!-- Row of Naming and Picture -->
    </div> <!-- Naming information-->

  <?php Page_header('Student Detail'); ?>
  <?php Page_close(); ?>
