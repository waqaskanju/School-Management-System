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
  <a class="btn btn-primary" href="http://localhost/ghsschitor/empty_tables.php?table=position"> Empty Position Table Value </a>
<?php
if (isset($_GET['table'])) {
  $update_position="Update students_info set  Class_Position='' ";
  $exe_update=mysqli_query($link, $update_position);
  if($exe_update) {
    echo 'Position emptified';
  }
  else {
    echo 'error in position emptification';
  }
}
else {
  echo 'not get any value';
}

Page_close();
?>
