************* Data Taken from update single subject marks *********
$q="UPDATE marks SET $subject = $marks WHERE Roll_No=$roll_no";
    $exe=mysqli_query($link, $q) or die('error'.mysqli_error($link));
    if ($exe) {
           echo
           "<div class='alert alert-success alert-dismissible'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>
                 &times;</a>
              <strong>Success!</strong> $roll_no   Added Successfully.
            </div>";
    } else {
        echo 'error in submit';
    }

***********