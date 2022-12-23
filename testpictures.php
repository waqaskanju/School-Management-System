<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Picture</title>
</head>
<body>
    <?php
$dir = "./pictures/*.png";
//get the list of all files with .jpg extension in the directory and safe it in an array named $images
$images = glob($dir);
//extract only the name of the file without the extension and save in an array named $find
foreach( $images as $image ):
    echo "<img src='" . $image . "' alt='" . $image . "'  width='300' height='300'  />";
endforeach;
?>
</body>
</html>

