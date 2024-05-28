<?php

/**
 * Print DMC.
 * php version 8.1
 *
 * @category DMC
 *
 * @package None
 *
 * @author Waqas Ahmad <waqas@waqaskanju.com>
 *
 * @license http://www.waqaskanju.com/license MIT
 *
 * @link http://www.waqaskanju.com/
 **/
session_start();
require_once 'sand_box.php';
$link=$LINK;
?>

<?php  Page_header('Change header of Pages'); ?>
</head>
<body>
<?php require_once 'nav.html';?>
  <div class="bg-warning text-center no-print">
    <h4>Header Information Change Form</h4>
  </div>
  <?php
  $column_name="Msg";
  $table_name="header_msgs";
  $where_column="Status";
  $where_value="1";
  $msgs_data=Select_Single_Column_Array_data(
    $column_name,$table_name,$where_column,$where_value
  );
  ?>

  <div class="container-fluid">
  <form class="row">
    <label for="school_abbrev" class="form-label text-primary">School Full Name Abbreviation</label>
    <div class="input-group mb-3">
      
      <input type="text" class="form-control" value="<?php echo $msgs_data[0];?>" id="basic-url" aria-describedby="school_abbrev">
    </div>

    <label for="school_name" class="form-label text-primary">School Full Name</label>
    <div class="input-group mb-3">
      
      <input type="text" class="form-control text-primary" id="basic-url" value="<?php echo $msgs_data[1];?>" aria-describedby="school_name">
    </div>

    <label for="school_location" class="form-label text-primary">School Location</label>
    <div class="input-group mb-3">
     
      <input type="text" class="form-control" value="<?php echo $msgs_data[2];?>" id="basic-url" aria-describedby="school_location">
    </div>

    <!-- Messages -->

    <label for="school_location" class="form-label text-primary">Award List Message</label>
    <div class="input-group mb-3">
     
      <input type="text" class="form-control" value="<?php echo $msgs_data[3];?>" id="basic-url" aria-describedby="school_location">
    </div>


    <label for="school_location" class="form-label text-primary">Class Result Header</label>
    <div class="input-group mb-3">
    
      <input type="text" class="form-control" value="<?php echo $msgs_data[4];?>" id="basic-url" aria-describedby="school_location">
    </div>


    <label for="school_location" class="form-label text-primary">Classwise Result Header</label>
    <div class="input-group mb-3">
     
      <input type="text" class="form-control" id="basic-url" value="<?php echo $msgs_data[5];?>" aria-describedby="school_location">
    </div>


    <label for="school_location" class="form-label text-primary">Roll No Slip Header</label>
    <div class="input-group mb-3">
     
      <input type="text" class="form-control" id="basic-url" value="<?php echo $msgs_data[6];?>" aria-describedby="school_location">
    </div>


    <label for="school_location" class="form-label text-primary">Roll No Slip Sub Header</label>
    <div class="input-group mb-3">
    
      <input type="text" class="form-control " id="basic-url" value="<?php echo $msgs_data[7];?>" aria-describedby="school_location">
    </div>
    <div class="col-12">
    <button type="submit" class="btn btn-primary">Save</button>
  </div>

</form>
</div>

  <?php Page_close(); ?>