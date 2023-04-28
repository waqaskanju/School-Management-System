<?php 
session_start();
require_once 'sand_box.php';
$link=$LINK;
if ($STUDENT_CHANGES!=1) {
  echo '<div class="bg-danger text-center"> Not allowed!! </div>';
  exit;
}

if(isset($_POST["submit"])) {
$target_dir = "pictures/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    //echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    //echo "File is not an image.";
    $uploadOk = 0;
    $_SESSION['error']="File is not an image";
    Change_location('picture_upload.php');
    return;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
  $_SESSION['error']="Sorry, file already exists.";
  
  return;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 1000000) {
  //echo "Sorry, your file is too large.";
  $uploadOk = 0;
  $_SESSION['error']="Sorry, your file is too large.";
  Change_location('picture_upload.php');
  return;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
  $_SESSION['error']="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  Change_location('picture_upload.php');
  return;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  $_SESSION['error']="Sorry, your file was not uploaded.";
  Change_location('picture_upload.php');
  return;
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.</div>";
  $_SESSION['success']="File Uploaded";
  Change_location('picture_upload.php');
  return;
  } else {
   // "<div class='text-danger'>Sorry, there was an error uploading your file.</div>";
    $_SESSION['error']="Sorry, there was an error uploading your file.";
    Change_location('picture_upload.php');
    return;
  }
}
}
 
 Page_header('Edit Permission'); ?>
<body>
<?php 
require_once 'nav.html';
  // Flash pattern
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}
if ( isset($_SESSION['success']) ) {
  echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
  unset($_SESSION['success']);
}
?>
  <h5>Kindly Upload only .png picture. Make File size is 1 MB</h5>
  <div class="container-fluid">
<form action="#" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
</div>

</body>
</html>