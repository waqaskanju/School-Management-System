<?php
/**
 * Monthly Test List
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
session_start();
require_once 'sand_box.php';
$link=$LINK;
Page_header('Monthly Test List All Subject');
?>
</style>
</head>
<body>
<?php require_once 'nav.html';?>
<div class="container-fluid">
  <form class="no-print" action="#" method="GET">
    <div class="row">
      <?php
        // Default values are coming from Config.php
        $selected_class=$CLASS_NAME;
        $selected_school=$SCHOOL_NAME;
        select_class($selected_class);
        select_school($selected_school);
        ?>
      </div>
      <button type="submit" name="submit" class="btn btn-primary mt-1">
        Show Monthly Test List
      </button>
    </form>
  </div>
<?php
if (isset($_GET['submit'])) {
    $class_name=$_GET['class_exam'];
    $class_name=Validate_input($class_name);
    $class_name=Validate_input($class_name);

    $school_name=$_GET['school'];
    $school_name=Validate_input($school_name);
    $school_name=Validate_input($school_name);
} else {
    $class_name=$CLASS_NAME;
    $school_name=$SCHOOL_NAME;
}
?>
<div class="container-fluid">
<?php include_once 'nav.html'; ?>
  <div class="row m-t-1">
    <div class="log col-sm-2">
        <img class="img-fluid" src="./images/khyber.png" alt="khyber">
    </div>
    <div class="header text-center col-sm-8">
    <h3><?php echo $SCHOOL_FULL_NAME; ?> </h2>
      <h3><?php echo  $SCHOOL_LOCATION; ?>  </h2>
        <h5>Monthly Test List  <?php // echo '20'.date('y').'-20'.date('y')+1;?>

      </h5>
        <h5>
              Class: <?php echo $class_name; ?>
              Month: _____________<?php // echo date('d-m-Y') ?>
        </h5>
    </div>
    <div class="logo2 col-sm-2">
      <img class="img-fluid" src="./images/kpesed.png" alt="kpesed.png">
    </div>
  </div>
</div>

<div class="container-fluid">
    <table class="table table-bordered border-dark" id="award-list">
        <thead>
          <tr class="border dorder-dark"> 
          <th class="border border-dark fw-bolder">Serial No</th>
          <th class="border border-dark fw-bolder">Roll No </th>
          <th class="border border-dark fw-bolder">Name </th>
     <?php
        $subjects=Select_Subjects_Of_class($school_name, $class_name);
        $number_of_subjects=count($subjects);
        for ($i=0; $i<count($subjects); $i++) {
            echo "<th class='border border-dark fw-bolder'>".$subjects[$i]['Name']."</th>";
        }
        ?>
    </tr>
  </thead>
  <tbody>
        <?php
        $q="Select Roll_No,Name from students_info
        WHERE Class='$class_name'
        AND School='$SCHOOL_NAME'
        AND Status='1' Order by Roll_No ASC";
        $qr=mysqli_query($link, $q) or die('Error in Q 1'.mysqli_error($link));
        $i=1;
        while ($qfa=mysqli_fetch_assoc($qr)) {
            echo  '<tr>
            <td class="border border-dark fw-bolder">'.$i. '</td>
            <td class="border border-dark fw-bolder">'.$qfa['Roll_No'].'</td>
            <td class="border border-dark fw-bolder">'.$qfa['Name'].'</td>';
        

            for ($j=1;$j<=$number_of_subjects;$j++) {
                echo "<td class='border border-dark fw-bolder'></td>";
            }

            
            $i++;
        }
        ?>
        </tbody>
    </table>
</div>
<?php
    Page_close();
?>
