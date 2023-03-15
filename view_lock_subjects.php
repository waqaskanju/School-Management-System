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
require_once 'db_connection.php';
require_once 'sand_box.php';
require_once 'config.php';
?>
 <?php Page_header('View UnLocked Subjects'); ?>
</head>
<body>
<div class="bg-warning text-center">
    <h4>View Locked Subjects</h4>
</div>
    <div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <form action="#" method="GET">
                <div class="form-row no-print">
                    <?php
                        $selected_class='';
                        Select_class($selected_class);
                    ?>
                </div>
                    <button class="no-print" type="submit"
                    name="submit" class="btn btn-primary">
                     Submit
                    </button>
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_GET['submit'])) {
    $class_name=$_GET['class_exam'];
    $class_id=Convert_Class_Name_To_id($class_name);
    $q="SELECT Subject_Id from class_subjects
    WHERE Status='1' AND Lock_Status='1' AND Class_Id='$class_id'";
    $exe=mysqli_query($link,$q);
    $effect=mysqli_num_rows($exe);
    if ($effect==0) {
        echo "No Unlock Subjects";
    } else {
        echo "<ul>";
        while($exer=mysqli_fetch_assoc($exe)) {
                $subject_id=$exer['Subject_Id'];
                $subject_name=Select_Column_data('subjects',"Name","Id",$subject_id);
                echo "<li>".$subject_name['Name']."</li>";
        }
        echo "</ul>";
    }
}
?>
</div>


<?php Page_close(); ?>

