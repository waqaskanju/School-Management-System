<?php
/**
 * Calculate position of students
 * php version 8.1
 *
 * @category Exam
 * @package  None
 *
 * @author Waqas Ahmad <waqaskanju@gmail.com>
 *
 * @license http://www.abc.com MIT
 *
 * @link None
 **/
  require_once 'db_connection.php';
  require_once 'sand_box.php';
  $link=connect();
  Page_header("Calculate Position");
  $selected_class=$CLASS_INSERT;
  $selected_school=$SCHOOL_INSERT;
?>
</head>
<?php
if (isset($_POST['submit'])) {
          $class_name=$_POST['class_exam'];
          $school_name=$_POST['school'];
          $year=$_POST['year'];

          $em=Empty_Position_table();

    if ($em) {
        echo "Table is cleaned Successfully";
        $cp=Calculate_position($class_name, $school_name, $year);
        if ($cp) {
                  echo "Total marks of $class_name of $school_name of $year
                        entered into table successfully";
              Add_Data_Into_position();
        }
    }


}
?>
<body>
   <div class="bg-warning text-center">
        <h4>Class Position Calculation</h4>
     </div>
  <?php // require_once 'nav.html';?>
    <div class="container">
        <div class="row">
              <div class="col-md-11">
                <form action="#" method="POST">
                  <div class="form-row">
                      <?php Select_class($selected_class); ?>
                      <?php  Select_school($selected_school);?>
                  </div>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="year">Select year:</label>
                              <input type="number" name="year" id="year"  min="2021"
                              value="2021" max="2030" step="1" class="form-control">
                          </div>
                          <div class="form-group col-md-6">
                              <br>
                              <button type="submit" name="submit"
                                      class="btn btn-primary">
                                Submit
                            </button>
                          </div>
                      </div>
                </form>
             </div>
        </div>
    </div>
<?php Page_close(); ?>

