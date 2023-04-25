<?php
/**
 * Login Page.
 * php version 8.1
 *
 * @category Login
 *
 * @package None
 *
 * @author Waqas <waqas@waqaskanju.com>
 *
 * @license http://www.abc.com MIT
 *
 * @link Adfas
 **/

session_start();
require_once 'sand_box.php';
$link=$LINK;
Page_header('Search Students Detail');

if (isset($_POST['submit'])) {
    /* First letter of variable is in lower case */
    $username=$_POST['username'];
    $username=Validate_Input_html($username);
    $password=$_POST['password'];
    $password= Validate_Input_html($password);
    $password= md5($password);

    $q="SELECT  Employee_Id,User_Name,Password FROM login 
    WHERE User_Name=:user_name AND Password=:password AND
    Status='1'";

    $stmt=$link->prepare($q);
    $stmt->bindParam(':user_name', $user);
    $stmt->bindParam(':password', $pass);
    $user=$username;
    $pass=$password;
    $stmt->execute();
    $count=$stmt->rowCount();  
    if ($count==1) {
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        $employee_id=$row['Employee_Id'];
        $_SESSION['user']=$employee_id;
        $msg="Login Successful";
        $msg_type="success";
        Show_alert($msg, $msg_type);
        redirection(2, 'index.php');
        //echo "<a href='index.php'> Visit Index Page </a>";
    } else {
        echo "<p class='text-danger'>Incorrect User Name OR Password";
    }


}
?>
</head>
<body>
<div class="container-fluid">
<?php require_once 'nav.html';?>
  <div class="bg-warning text-center">
    <h4>Login Page</h4>
  </div>
</div>
<div class="container">
  <form action="#" method="POST">

    <div>
      <label for="name">User Name*</label>
      <input type="text"  id="username" name="username" class="form-control"
             placeholder="Type User Name" required>
    <div>
    <div>
      <label for="name">Password*</label>
      <input type="password"  id="name" name="password" class="form-control"
             placeholder="Type Password" required>
    <div>
      <input type="submit" name="submit" value="Login" class="btn btn-primary mt-3">



</div>
  </form>
</div>

<?php
    Page_close();
?>
