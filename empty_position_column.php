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
 * @license http://www.abc.com MIT
 *
 * @link Adfas
 **/
?>
<?php
  require_once 'db_connection.php';
  require_once 'sand_box.php';
  require_once 'config.php';
  $link=connect();
  Page_header('Empty Position Column');
?>
</head>

<body>
  <div class="container">
  <a class="btn btn-primary"
      href="http://localhost/Chitor-CMS/empty_position_column.php?table=position">
    Empty Position Table Value
  </a>
<?php
if (isset($_GET['table'])) {
    $update_position="Update students_info set  Class_Position='' ";
    $exe_update=mysqli_query($link, $update_position);
    if ($exe_update) {
        echo 'Position emptified';
    } else {
        echo 'error in position emptification';
    }
} else {
    echo "<br>";
    echo 'Click on the button';
    echo "<br>";
    echo 'if not working Check URL. May be the Project Name is in url is different.';
}
?>
</div>
<?php
  Page_close();
?>
