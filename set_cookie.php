<?php
/**
 * This page is used to set user default permission mode=write is only
 * for admin for other persons it is read.
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
$mode = $MODE;
if($mode=="read"){
  echo "Not Allowed";

} else {
   $cookie_name="User_Name";
   $cookie_value="Waqas Ahmad";
// Uncomment it when you need it.
   //  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
  if(isset($_COOKIE['User_Name'])){
    echo "Cookie added User_Name=";
    echo $_COOKIE['User_Name'];
  }
}

?>

<?php Page_header('Set Cookie'); ?>
</head>
<body >

</body>
</html>
