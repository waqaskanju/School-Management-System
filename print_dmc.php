<?php
/**
 * Print DMC.
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
Page_header('Print DMC');
?>

</head>
<body>

<div class="container">

    <div class="text-center bg-warning">
         <h4>Print Single or Double DMC </h4>
    </div>
    <div class="row">

        <div class="col-md-6">

             <form class="" action="dmc.php" target="_blank" method="GET">
                <div class="form-group">
                    <p> Type Your Roll No To Print Single DMC  </p>
                    <label for="name">Roll No:</label>
                    <input type="number" class="form-control" id="rollno"
                    name="rollno"
                    placeholder="type Roll No" min="1" autofocus required>
                    <button type="submit" name="submit"
                    class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>






<?php

Page_close();
?>


