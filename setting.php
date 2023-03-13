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
?>

<?php Page_header("Setting"); ?>

<?php
if (isset($_GET['submit'])) {
    $school=$_GET['school'];
    $class=$_GET['class_exam'];


    $q="Update setting SET
    Selected_School='$school', Selected_Class='$class'
    WHERE User_Id=1";

    $exe=mysqli_query($link, $q);
    if ($exe) {
        echo "Updated";
    } else {
        echo "Not Update";
    }
}
?>
</head>
<body>
<div class="bg-warning text-center">
    <h4>Setting Page</h4>
  </div>
  <?php
    $previous_school=Select_Single_Column_Array_data(
        "Selected_School", "Setting", "User_Id", "1"
    );
    $previous_class=Select_Single_Column_Array_data(
        "Selected_Class", "Setting", "User_Id", "1"
    );
    echo " Previous School= $previous_school[0]";
    echo " Previous Class = $previous_class[0]";
    ?>
    <form method="GET" action="#">
        <div class="form-row">
           <?php
            $selected_school="";
            $selected_class="";
             Select_class($selected_class);
             Select_school($selected_school);
            ?>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">
              Update School And Class
            </button>
    </form>

