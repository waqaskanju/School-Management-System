<?php
/**
 * Add Subject Marks
 *  * php version 8.1
 *
 * @category Adfsad
 *
 * @package Adf
 *
 * @author Khan <abc@examp.com>
 *
 * @license http://www.abc.com MIT
 *
 * @link Adfas
 **/
require_once 'db_connection.php';
require_once 'sand_box.php';
$link=connect();
if (isset($_GET['submit'])) {
    $roll_no=$_GET['roll_no'];
    /* Subject  Name */
    $subject = $_GET['subject_name'];
    /* Subject Marks */
    $marks=$_GET['marks'];

    $q="UPDATE marks SET $subject = $marks WHERE Roll_No=$roll_no";
    $exe=mysqli_query($link, $q) or die('error'.mysqli_error($link));
    if ($exe) {
           echo
           "<div class='alert alert-success alert-dismissible'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>
                 &times;</a>
              <strong>Success!</strong> $roll_no   Added Successfully.
            </div>";
    } else {
        echo 'error in submit';
    }
}
?>

<?php

    Page_header("Add Subject Marks");
    $subject = $_GET['Subject'];
    $class=$_GET['Class'];
?>
</head>
<body>
  <div class="bg-warning text-center">
    <h4>Enter <?php echo $subject ?> Marks</h4>
  </div>
  
<div class="container">
<span id="aj_result" class="text-danger"></span>
  <?php
    $subject_marks=$subject."_Marks";
 echo   $q ="SELECT students_info.Roll_No, students_info.Name, marks.$subject_marks
    from students_info
  inner join marks ON students_info.Roll_No=marks.Roll_No
  WHERE class='$class' AND Status=1 order by Admission_No ASC";

    $exe=mysqli_query($link, $q);
    $tab_index=1;
    while ($qfa=mysqli_fetch_assoc($exe)) {
        $name=$qfa['Name'];
        $roll_no=$qfa['Roll_No'];
        $marks=$qfa[$subject_marks];
        ?>

    <form class="" action="#" id="form<?php echo $roll_no ?>">
        <div class="form-row">
            <div class="col-lg-2">
            <input type="number" class="form-control" id="roll_no"
                 name="" value="<?php echo $roll_no ?>" placeholder="Roll No"
                 readonly  required>
    </div>
        <div class="col-lg-22">
        <input type="text" class="form-control" id="name"
                 name="" readonly
                 value="<?php echo $name ?>" placeholder="type name"
                  >
    </div>

        <div class="col-lg-2">
        <input type="number" class="form-control" id="<?php echo $roll_no ?>marks"
        max="100" min="-1"
                 name="<?php echo $roll_no ?>marks"  placeholder="type  marks"
                 value="<?php echo $marks;?>" tabindex="<?php echo $tab_index;?>"
                 onfocusout="save_subject_marks('<?php echo $roll_no; ?>')"
                >
    </div>


    <div class="col-lg-2">
    <button type="button" name="submit" form="form<?php echo $roll_no?>"
          class="btn btn-primary btn-sm"
          onclick="save_subject_marks('<?php echo $roll_no; ?>')">
            Submit <?php echo $roll_no ?>
    </button>
    </div>
    <div class="col-lg-2">
       <span id="<?php echo $roll_no ?>response"> </span>
    </div>
    <div class="col-lg-1">
    <input type="hidden"  name="subject_name" id="subject_name"
    value="<?php echo $subject_marks;?>"
                   required>
    </div>
    <div class="col-lg-1">
    <input type="hidden"   name="roll_no" id=<?php echo $roll_no ?>
    value="<?php echo $roll_no ?>"
                   required>
    </div>
    <div class="col-lg-1">
    <input type="hidden"   name="Subject" value="<?php echo $subject ?>"
                   >
    </div>
    <div class="col-lg-1">
    <input type="hidden"   name="Class" value="<?php echo $class ?>"
                   >
    </div>
        </div>
    </form>

        <?php
        $tab_index = $tab_index + 1;
    }
    ?>
    </div>
<?php Page_close(); ?>
