
<?php
/**
 * Show subjects of each class
 *  * php version 8.1
 *
 * @category Subject
 *
 * @package None
 *
 * @author Waqas <waqaskanju@gmail.com>
 *
 * @license http://www.waqaskanju.com/license MIT
 *
 * @link www.waqaskanju.com
 **/
require_once 'db_connection.php';
 require_once 'sand_box.php';
 $link=connect();
 Page_header('Class Subject');
?>
</style>
</head>
<body>
    <?php
    function show_class_subjects($link, $class_id){
        $q="Select Subject_Id from class_subjects where class_id=$class_id";
        $qr=mysqli_query($link,$q);
        echo "<ul>";
        while($qra=mysqli_fetch_assoc($qr)){
            $id=$qra['Subject_Id'];
           $q2="SELECT Name from Subjects where Id=$id";
           $qr2=mysqli_query($link,$q2);
           $qra2=mysqli_fetch_assoc($qr2);
           echo "<li>". $qra2['Name']."</li>";
        }
    }
    
    ?>
    <div class="row">
        <div class="col-sm-3">
            <h4>Class 5th</h4>
        </div>
        <div class="col-sm-3"><h4>Class 6th</h4>
        <?php $all_subjects=show_class_subjects($link,"1");?>
    
    </div>
        <div class="col-sm-3"><h4>Class 7th</h4>
        <?php $all_subjects=show_class_subjects($link,"2");?>
    </div>
        <div class="col-sm-3"><h4>Class 8th</h4>
        <?php $all_subjects=show_class_subjects($link,"3");?>
    </div>
</div>
        <div class="row">
        <div class="col-sm-3"><h4>Class 9th A</h4>
        <?php $all_subjects=show_class_subjects($link,"4");?>
    </div>
        <div class="col-sm-3"><h4>Class 9th B</h4>
        <?php $all_subjects=show_class_subjects($link,"5");?>
    </div>
        <div class="col-sm-3"><h4>Class 10th A</h4>
        <?php $all_subjects=show_class_subjects($link,"6");?>
    </div>
        <div class="col-sm-3"><h4>Class 10th B</h4>
        <?php $all_subjects=show_class_subjects($link,"7");?>
    </div>
</div>

<?php

 Page_close();
?>
