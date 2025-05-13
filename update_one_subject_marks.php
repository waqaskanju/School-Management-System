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
session_start();
require_once 'sand_box.php';
$link=$LINK;
if ($SINGLE_MARKS_CHANGES!=1) {
  echo '<div class="bg-danger text-center"> Not allowed!! </div>';
  exit;
}
?>
<?php
    Page_header("Add One Subject Marks");
?>

</head>
<body class="background">
<?php  require_once 'nav.html';?>
  <div class="bg-primary text-white text-center">
    <?php
        $selected_school=$SCHOOL_NAME;

        $subject = $_GET['Subject'];
        $subject=Validate_input($subject);

        $class=$_GET['Class'];
        $class=Validate_input($class);

        $subject_marks=Change_Subject_To_Marks_col($subject);

        // for  validating a teacher.
        // echo $user_name;
        $is_allowed=check_marks_update_permission($class,$subject);
        if($user_name!="admin"){
          if ($is_allowed!=1 ) {
            echo '<div class="bg-danger text-center"> Not allowed!! Try assigning the subject </div>';
            exit;
          }
      }
    ?>
    </div>  
    <h4 class="m-lr-1 bg-warning">
      Form for Adding Class: <?php echo $class;?>
      Subject: <?php echo $subject ?> Marks,
      Selected School <?php echo $selected_school ?>
      <a href="./setting.php" target="_blank"><i class='bi bi-pencil text-white'></i></a>
    </h4>
  
    


<div class="container-fluid">
  <p class="text-info text-white font-weight-bold bg-dark">Note: Type -1 for absent student (Minus one).
  Marks are auto saved on focus out.</p>
  <?php
    $q="SELECT students_info.Roll_No, students_info.Class_No, students_info.Name, marks.$subject_marks
    from students_info inner join marks ON students_info.Roll_No=marks.Roll_No
    WHERE Class='$class' AND School='$selected_school' AND Status='1'
    order by Roll_No ASC";

    $exe=mysqli_query($link, $q);
    $tab_index=1;
    while ($qfa=mysqli_fetch_assoc($exe)) {
        $name=$qfa['Name'];
        $roll_no=$qfa['Roll_No'];
        $class_no=$qfa['Class_No'];
        $marks=$qfa[$subject_marks];
        ?>

    <form class="" action="#" id="form<?php echo $roll_no ?>">
      <div class="row d-none d-md-flex">
        <div class="col-md-1"> <?php echo $tab_index; ?></div>
        <div class="col-md-1">
          <input type="number" class="form-control-plaintext text-white" id="roll_no"
                name="" value="<?php echo $roll_no ?>" placeholder="Roll No"
                readonly  required>
        </div>
        <div class="col-md-1">
          <input type="number" class="form-control-plaintext text-white" id="class_no"
                name="" value="<?php echo $class_no ?>" placeholder="class no"   readonly>
        </div>
        <div class="col-md-3">
          <input type="text" class="form-control-plaintext text-white" id="name"
                 name="" readonly
                 value="<?php echo $name ?>" placeholder="type name">
        </div>
        <div class="col-md-2">
          <input type="number" class="form-control"
                 id="<?php echo $roll_no ?>marks" max="100" min="-1"
                 name="<?php echo $roll_no ?>marks" min="-1" max="100"
                 tabindex="<?php echo $tab_index;?>"  placeholder="type  marks"
                 value="<?php echo $marks;?>"
                 onfocusout="save_subject_marks('<?php echo $roll_no; ?>');
                 this.reportValidity()">
        </div>
        <div class="col-md-3">
          <span id="<?php echo $roll_no ?>response"></span>
          <input type="hidden"  name="subject_name" id="subject_name"
          value="<?php echo $subject_marks;?>"
                   required>
          <input type="hidden"   name="roll_no"
          id=<?php echo $roll_no ?> value="<?php echo $roll_no ?>"
                   required>
          <input type="hidden"   name="Subject" id="actual_subject"
          value="<?php echo $subject ?>"
                   >
          <input type="hidden" name="Class" id="class_name"
          value="<?php echo $class ?>">
        </div>
      </div> <!-- End of Row -->
    </form>
        <?php
        $tab_index++;
    }
    ?>
    <a class="btn btn-danger" id="lock_button"
    href="setting.php?Lock_Form=1&lock_status=1&
    class_exam=<?php echo $class?>&subject=<?php echo $subject?>
    &school=<?php echo $selected_school?>"> Lock Marks </a>
    </div>  <!-- End of Container -->

    </div>
<?php Page_close(); ?>
