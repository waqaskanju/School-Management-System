<?php
/*Formula For Assigning Roll No
First Digit Year=21
Second digit class 10
For A=1
For B=2
Third digit Class No
*/
require_once 'db_connection.php' ;
require_once 'sand_box.php' ;
$link=connect();
$doit=0;

if ($doit==1) {
    $r=2110101;
    for ($i=2021101001;$i<=2021101045;$i++) {
$sql="UPDATE students_info SET Roll_No=$r WHERE Roll_No=$i";
               $exe=mysqli_query($link,$sql);
                if($exe){
                    echo "$sql"." Updated  Successfully". "</br>";}
                else{ echo 'error in submit';}
                $r++;
            }

}
?>
