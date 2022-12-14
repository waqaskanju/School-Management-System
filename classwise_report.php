<?php
/**
 * Report of A class
 * php version 8.1
 *
 * @category Report
 *
 * @package Adf
 *
 * @author Waqas Ahmad <waqaskanju@gmail.com>
 *
 * @license http://www.abc.com MIT
 *
 * @link Adfas
 **/
require_once 'db_connection.php';
require_once 'sand_box.php';
$link=connect();
?>
<?php Page_header("Class Wise Report"); ?>
</head>
<body>

absent=0;
above_sixtees=0;
fiftees=0;
thirty_forty=0;
total_appear=0
"SELECT RollNo from students_info WHERE Class=6th Subject='English' School='GHSS CHITOR' AND Status=1"

Select subject_marks from marks_table where rollno=db_rollno;

if(subject_marks = -1) {
    absent = absent+1;
}
else{
    total_appear= total_appear+1;
percentage =  marks * 100 / total marks;
if(percentage >=60) {
  above_sixtees = above_sixtees+1
}
else if (percentage >=50 and percentate<60){
    fiftees = fiftees+1;
}
else if (percentage >=33 and percentage<50){
    thirty_forty = thirty_forty+1;
}
else {
    fail = fail+1;
}

} //Main if

Total Appeared = total_appear;
pass=thirty_forty+ fiftees + above_sixtees;
fail = fail;

Ist Division = above_sixtees;
50%  - 59%
33%  - 49%

<?php Page_close(); ?>
