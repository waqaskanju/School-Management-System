<?php
/**
 * Add New Students to LMS
 * php version 8.1
 *
 * @category Student
 *
 * @package Adf
 *
 * @author Waqas Ahmad <waqaskanju@gmail.com>
 *
 * @license http://www.abc.com MIT
 *
 * @link Adfas
 **/
require_once 'sand_box.php';
$link=connect();
Page_Header('Sports Certificate ');
?>
</style>
</head>
<body>
<?php
    // $class_name=$_GET['class'];
    // $class_name=str_replace('\'', '', $class_name);
    // $school_name=$_GET['School'];
    // $school_name=str_replace('\'', '', $school_name);

?>
<div class="container">
    <div class="row m-t-1">
        <div class="log col-sm-2">
            <img src="./images/khyber.png" alt="khyber">
        </div>
        <div class="header text-center col-sm-8">
        <h2>GOVT. HIGHER SECONDARY SCHOOL </h2>
        <h2 >  CHITOR, DISTRICT SWAT  </h2>
        <h5>
            Sports Certificate
            <?php // echo  $class_name;  ?>
        </h5>
        <!-- <h5> School Name:  <?php // echo $school_name; ?>  </h5>
        <h5>  Class: <?php // echo $class_name;  ?> </h5>-->

        <!-- <h6>    Date: <?php  // echo date('d-M-Y') ?> -->
       <!-- <h4>
        Final Examination Session 2021-2022 Class
        </h4>  -->
        </div>
        <div class="logo2 col-sm-2">
        <img src="./images/kpesed.png" alt="kpesed.png">
        </div>
    </div>
</div>

<div class="container">


<P> It is certified that Mr Ajab Khan S/O Hazrat Rahman has been a regular student of this school. He has participated in various sport events in cricket team of the school. I wish him best of luck. </p
</div>

<div style="float:right">
<p>  _____________ </p>
<p>  Sign  </p>
</div>
<?php Page_close(); ?>
