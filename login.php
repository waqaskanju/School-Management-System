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
?>

</head>
<body>
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
if (isset($_POST['submit'])) {
    /* First letter of variable is in lower case */
    $username=$_POST['username'];
    $username=Validate_input($username);
    $password=$_POST['password'];
    $password= Validate_input($password);
    $password= md5($password);

    $q="SELECT  Employee_Id,User_Name,Password FROM login 
    WHERE User_Name='$username' AND Password='$password' AND
  Status='1'";

    $exe=mysqli_query($link, $q);

    if (mysqli_num_rows($exe)==1) {
        $exer=mysqli_fetch_assoc($exe);
        $employee_id=$exer['Employee_Id'];
        $_SESSION['user']=$employee_id;

        header("Refresh:1; url=index.php");
    } else {
        echo "<p class='text-danger'>Incorrect User Name OR Password";
    }


}
?>
<?php
    Page_close();
?>
