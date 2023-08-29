<?php
/**
 * Print Character Certificate
 * php version 8.1
 *
 * @category Student
 *
 * @package None
 *
 * @author Waqas Ahmad <waqas@waqaskanju.com>
 *
 * @license http://www.waqaskanju.com/license MIT
 *
 * @link http://www.waqaskanju.com/
 **/

require_once 'sand_box.php';
Page_header('Print Character Certificate');
?>
</head>
<body class="background">
  <?php require_once 'nav.html';?>
  <div class="container-fluid">
    <div class="text-center bg-warning">
      <h4>Print Two Character Certificates </h4>
      <p> Type  two Roll No To Print  Character Certificates. </p>
    </div>
    <form class="mt-3 p-3" action="character_certificate.php" target="_blank" method="GET">
      <div class="row bg-white p-3">
        <div class="col-sm-2">
          <label for="name" class="form-label">Type Roll No:</label>
      </div>
      <div class="col-sm-2 ">
      <input type="number" class="form-control" id="rollno"
               name="rollno1" placeholder="type Roll No 1" min="1" autofocus required>
      </div>
      <div class="col-sm-2 ">
      <input type="number" class="form-control" id="rollno"
               name="rollno2" placeholder="type Roll No 2" min="1"  required>
      </div>
      <div class="col-sm-8 ">
      <button type="submit" name="submit"
      class="btn btn-primary mt-4 mt-md-0" data-toggle="popover"
      title="Popover title" data-content="And  some">
          Show Certificates </button>
      </div>
    </div> <!-- End of Row-->
  </form>
  <h3 class="bg-info p-3"> Note: Legal Page Required For Printing two character certificates.</h3>
</div>
<?php
Page_close();
?>


