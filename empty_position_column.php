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
 * @license http://www.abc.com MIT
 *
 * @link Adfas
 **/
?>
<?php
session_start();
require_once 'sand_box.php';
$link=$LINK;
if ($_SESSION['user']) {
    if ($BATCH_MARKS_CHANGES!=1) {
        echo "Not Allowed.";
        exit;
    }
    Page_header('Empty Position Column');
    ?>
</head>

<body>
<?php 
    $current_folder=basename(__DIR__); 
    $path="http://localhost/$current_folder/empty_position_column.php?table=position";
    $path2="http://localhost/$current_folder/empty_position_column.php?table=mark";
?>
  <div class="container-fluid">
    <?php include_once 'nav.html';?>
    <p>Use these Buttons when you want to add marks of new exam. All the previous data of marks will be deleted.
      Make sure you have taken backup, incase you want to use your previous exam marks.
    </p>
    <div class="row">
      <div class="col-6">
        <a class="btn btn-primary"
        href="<?php $path ?>">
            Empty Position Table Value
        </a>
      </div>
      <div class="col-6">
        <a class="btn btn-primary"
           href="<?php $path2 ?>">
            Empty Marks Table
        </a>
      </div>
    </div>
    <?php
    if (isset($_GET['table'])) {
        $table_value=$_GET['table'];
        if ($table_value=="position") {
            $update_position="Update students_info set  Class_Position='' ";
            $exe_update=mysqli_query($link, $update_position);
            if ($exe_update) {
                echo '<div class="alert-success">Position emptified 
                  </div>';
                  // redirection(2, 'empty_position_column.php');
            } else {
                echo 'error in position emptification';
            }
        }    
        if ($table_value=="marks") {
            $empty_marks="TRUNCATE Table marks;";
            $exe_marks=mysqli_query($link, $empty_marks);
            if ($exe_marks) {
                echo '<div class="alert-success">Marks table data deleted.
            .</div>';
                // redirection(2, 'empty_position_column.php');
            } else {
                echo 'Error in marks table emptification';
            
            }
        }
    }

    ?>
</div>
    <?php
} else {
    echo "Please login. Then come back.";
    header("refresh 3;url=login.php");
}
  Page_close();
?>
