<?php
/**
 * Show Student detail
 * php version 8.1
 *
 * @category Student
 *
 * @package None
 *
 * @author Waqas <waqas@waqaskanju.com>
 *
 * @license http://www.waqaskanju.com/license MIT
 *
 * @link http://www.waqaskanju.com/
 **/

 require_once 'sand_box.php';
?>
 <?php Page_header('Site Map'); ?>
</head>
<body>
<div class="container-fluid">
<div class="row">    
<div class="col-6">
    <ul>
        <li><a href="add_all_subjects_marks.php">Add all subjects marks</a></li>
        <li><a href="add_student.php">Add Student</a></li>
        <li><a href="award_list.php">Award List</a></li>
        <li><a href="book_list.php">Book List</a> Manual class name required</li>
        <li><a href="calculate_position.php">Calculate Position</a></li>
        <li><a href="check_roll_no.php">Check Roll No</a> Supporting page Used in Add Student and Add All Subjects Marks</li>
        <li><a href="class_result.php">Class Result</a> </li>
        <li><a href="class_test_ayaz.php">Class Test Ayaz</a> Manual class name required </li>
        <li><a href="class_test.php">Class Test</a>  Manual class name required </li>
        <li><a href="class_wise_age.php">Class wise age</a> Age Range of a class </li>
        <li><a href="class_wise_report.php">Class wise Report</a> 1st 2nd 3rd division and fail in all classes </li>
        <li><a href="comming_soon.html">Comming Soon</a> </li>
        <li><a href="config.php">Config</a> Supporing Page for Configuration of Site </li>
        <li><a href="db_connection.php">Database Connection</a> Supporting Page for Database Connection</li>
        <li><a href="delete_student.php">Delete Student</a> </li>
        <li><a href="detail_student.php">Detail Student</a> Use For Seaching</li>
        <li><a href="dmc.php">DMC</a> Munual Roll No Required to show DMC </li>
        <li><a href="edit_student.php">Edit Student</a> </li>
        <li><a href="empty_marks_table.php">Empty Marks Table</a> Dummy Page having query for munual entry into Database.</li>
        <li><a href="empty_position_column.php">Empty Position Column</a> Used in Calcuate Postion. </li>

    </ul>
</div>
<div class="col-6">
<li><a href="index.php">Index Page</a> </li>
        <li><a href="nav.php">Nav</a> </li>
        <li><a href="print_dmc.php">Print DMC</a> Page for Selecting Roll No. To Print DMC. Parent page of DMC.php </li>
        <li><a href="roll_no_slip.php">Roll No Slip</a> Print Roll No slip of a class.</li>
        <li><a href="sand_box.php">Sand Box</a> Page containing all functions.</li>
        <li><a href="search.php">Search</a>I am not able to see this page usage. </li>
        <li><a href="show_class.php">Show Class</a> Show details of a class like name, fname, dob, mobile no, pic, CNIC.</li>
        <li><a href="site_map.php">Site Map</a></li>
        <li><a href="subject_link.php">Subject Link</a> Show all subject of a class to add marks. Its the parent page of update_one_subject_marks.php</li>
        <li><a href="subject_wise_report.php">Subject Wise Report</a></li>
        <li><a href="test.html">Test Page html</a> Test html code</li>
        <li><a href="test.php">Test Page Php</a> Test php code</li>
        <li><a href="test_pictures.php">Test Pictures</a> Test if a picture is present.</li>
        <li><a href="update_all_subjects_marks.php">Update All Subjects Marks</a></li>
        <li><a href="update_one_subject_marks.php">Update One Subject Marks</a> First Support Page of Subject_Link. Show form with marks.</li>
        <li><a href="update_roll_no.php">Update Roll No</a> For Mass Roll No update</li>
        <li><a href="update_subject_marks.php">Update Subject Marks.</a> 2nd Support Page of Subject_link. Javascipt file call this file using Ajax.</li>
</div>
</div>

</div>


<?php Page_close(); ?>