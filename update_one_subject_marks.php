<?php
/**
 * Update Single Subject Marks As the default value will be zero
 *  * php version 8.1
 *
 * @category Marks
 *
 * @package None
 *
 * @author Waqas <waqaskanju@gmail.com>
 *
 * @license http://www.waqaskanju.com/license MIT
 *
 * @link www.waqaskanju.com
 **/
require_once 'db_connection.php';
require_once 'sand_box.php';
$link=connect();
?>

<?php
    Page_header("Add One Subject Marks");
    $subject = $_GET['Subject'];
    $class=$_GET['Class'];
    $subject_marks=change_subject_to_marks_col($subject);
?>
</head>
<body>
  <div class="bg-primary text-white text-center">
    <h4>Form for Adding Class: <?php echo $class;?> Subject: <?php echo $subject ?> Marks</h4>
  </div>
  <?php // require_once 'nav.php';?>
<div class="container-fluid">
<p class="text-info">Note: Type -1 for absent student (Minus one). Marks are auto saved on focus out.</p>
  <?php
   $q="SELECT students_info.Roll_No, students_info.Name, marks.$subject_marks from students_info
  inner join marks ON students_info.Roll_No=marks.Roll_No
  WHERE class='$class' AND Status=1";

    $exe=mysqli_query($link, $q);
    while ($qfa=mysqli_fetch_assoc($exe)) {
        $name=$qfa['Name'];
        $roll_no=$qfa['Roll_No'];
        $marks=$qfa[$subject_marks];
        ?>

    <form class="" action="#" id="form<?php echo $roll_no ?>">
      <div class="row">
        <div class="col-3 col-lg-2">
          <input type="number" class="form-control-plaintext" id="roll_no"
                  name="" value="<?php echo $roll_no ?>" placeholder="Roll No"
                  readonly  required>
        </div>
        <div class="col-4 col-lg-2">
          <input type="text" class="form-control-plaintext" id="name"
                 name="" readonly
                 value="<?php echo $name ?>" placeholder="type name">
        </div>
        <div class="col-3 col-lg-2">
          <input type="number" class="form-control" id="<?php echo $roll_no ?>marks" max="100" min="-1"
                 name="<?php echo $roll_no ?>marks"  placeholder="type  marks"  value="<?php echo $marks;?>"
                 onfocusout="save_subject_marks('<?php echo $roll_no; ?>')">
        </div>
        <div class="col-2 col-lg-6">
          <span id="<?php echo $roll_no ?>response"> </span>
          <input type="hidden"  name="subject_name" id="subject_name" value="<?php echo $subject_marks;?>"
                   required>
          <input type="hidden"   name="roll_no" id=<?php echo $roll_no ?> value="<?php echo $roll_no ?>"
                   required>
          <input type="hidden"   name="Subject" value="<?php echo $subject ?>"
                   >
          <input type="hidden"   name="Class" value="<?php echo $class ?>">
        </div>
      </div> <!-- End of Row -->
    </form>
    <?php   } ?>
    </div>  <!-- End of Container -->
    
    </div>
<?php Page_close(); ?>
