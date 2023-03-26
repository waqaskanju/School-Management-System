<?php
/**
 * Add  All Subjects Marks of Students
 * php version 8.1
 *
 * @category Exam
 *
 * @package None
 *
 * @author Waqas <admin@waqaskanju.com>
 *
 * @license http://www.waqaskanju.com/license MIT
 *
 * @link http://www.waqaskanju.com
 **/
session_start();
require_once 'db_connection.php';
require_once 'sand_box.php';
require_once 'config.php';
$link=connect();
$selected_class=$CLASS_INSERT;
$selected_school=$SCHOOL_INSERT;
$mode = $MODE;

if ($mode=="read") {
    echo '<div class="bg-danger text-center"> Not allowed!! </div>';
    exit;
}

/* Rules for Naming add under score between two words. */
if (isset($_GET['submit'])) {
    $new_name=$_GET['school_name'];
    $q="INSERT INTO schools (`Name`,`Status`) VALUES ('$new_name','1')";
    $exe=mysqli_query($link, $q);
    if ($exe) {
        echo "New school added";
    } else {
        echo "Error in Insertion";
    }
    
}
?>
  <?php Page_header('Add School'); ?>
</head>
<body>
<form>
    <input type="text" name="school_name">
    <input type="submit" name="submit" value="Add New School">
</form>
<?php Page_close(); ?>