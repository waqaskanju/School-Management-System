<?php
    /**
     * USe for testing Code
     * php version 8.1
     *
     * @category Test
     *
     * @package None
     *
     * @author Waqas <waqaskanju@gmail.com>
     *
     * @license http://www.waqaskanju.com/license MIT
     *
     * @link http://www.waqaskanju.com/
     **/
require_once 'credentials.php';
$pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user_name, $db_password);
require_once 'sand_box.php';
/*
$query=$pdo->query("SELECT * from students_info WHERE Roll_No=1");
while ($row=$query->fetch(PDO::FETCH_ASSOC)) {
    echo $row['Name'];
}

echo $sql="INSERT INTO schools (Name) VALUES(:name)";
$stmt=$pdo->prepare($sql);
$stmt->execute(array(':name'=>$_GET['name']));
*/


?>
