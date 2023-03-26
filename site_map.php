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
<?php require_once 'nav.html';?>
<div class="row mt-3">
<div class="col-6">
    <ul>
        <li><a href="add_all_subjects_marks.php">Add all subjects marks</a></li>
        <li><a href="add_class_subject.php">Add Subjects To Class</a> 
                Before Adding this. First Add Class to School.</li>
        <li><a href="add_school_class.php">Add School Class</a>
                This is the initail step in Add Class Subject</li>
        <li><a href="add_school.php">Add School</a></li>
        <li><a href="add_student.php">Add Student</a></li>
        <li><a href="assign_subject.php">Assign Subject</a>
                Assign Class Subject to Teacher
        </li>
        <li><a href="award_list.php">Award List</a></li>
        <li><a href="book_list.php">Book List</a> Manual class name required</li>
        <li><a href="calculate_position.php">Calculate Position</a></li>
        <li><a href="change_password.php">Change Password</a>
        <li><a href="check_roll_no.php">Check Roll No</a>
                Supporting page Used in Add Student and Add All Subjects Marks</li>
        <li><a href="class_result.php">Class Result</a> </li>
        <li><a href="class_test_ayaz.php">Class Test Ayaz</a>
                Manual class name required
        </li>
        <li><a href="class_test.php">Class Test</a>  Manual class name required </li>
        <li><a href="class_wise_age.php">Class wise age</a>Age Range of a class</li>
        <li><a href="class_wise_report.php">Class wise Report</a>
                1st 2nd 3rd division and fail in all classes </li>
        <li><a href="comming_soon.html">Comming Soon</a> </li>
        <li><a href="config.php">Config</a>
                Supporing Page for Configuration of Site </li>
        <li><a href="db_connection.php">Database Connection</a>
                Supporting Page for Database Connection</li>
        <li><a href="delete_class_subject.php">Delete Class Subject</a> </li>
        <li><a href="delete_student.php">Delete Student</a> </li>
        <li><a href="detail_student.php">Detail Student</a> Use For Seaching</li>
        <li><a href="dmc.php">DMC</a> Munual Roll No Required to show DMC </li>
        <li><a href="edit_student.php">Edit Student</a> </li>
        <li><a href="empty_marks_table.php">Empty Marks Table</a>
                Dummy Page having query for munual entry into Database.</li>
        <li><a href="empty_position_column.php">Empty Position Column</a>
                Used in Calcuate Postion. </li>
    </ul>
</div>
<div class="col-6">
    <ul>
        <li><a href="functions.php">Functions</a> Functions which are testable </li>
        <li><a href="index.php">Index Page</a> </li>
        <li><a href="login.php">Login Page</a> </li>
        <li><a href="logout.php">Logout Page</a> </li>
        <li><a href="nav.html">Nav</a> </li>
        <li><a href="new_code_test.php"> New Code Test Page</a> Testing new code</li>
        <li><a href="phpunit.xml">Phpunit</a> Configuration file of Phpunit </li>
        <li><a href="print_dmc.php">Print DMC</a>
               Page for Selecting Roll No. To Print DMC. Parent page of DMC.php </li>
        <li>
            <a href="roll_no_slip.php">Roll No Slip</a>Print Roll No slip of a class.
        </li>
        <li><a href="sand_box.php">Sand Box</a> Page containing all functions.</li>
        <li><a href="search.php">Search</a> Provide Submit and Roll No</li>
        <li><a href="seating_plan.php">
               Seating Plan for 6th 7th 8th 9th A 9th B and 10th A</a></li>
        <li><a href="seating_plan_B.php">Seating Plan for class 10th B</a></li>
        <li><a href="set_cookie.php"> Set Cookie </a>Cookie for Admin. Require
               changes in code.(Uncomment the code) Used for always write premission
        </li>
        <li><a href="setting.php">Setting</a>
                Change Read/Write Permission, Change Lock Status</li>
        <li><a href="show_class.php">Show Class</a>Show details of a class like name,
               fname, dob, mobile no, pic, CNIC.</li>
        <li><a href="site_map.php">Site Map</a> </li>
        <li><a href="subject_link.php">Subject Link</a>Show all subject of a class to
               add marks. Its the parent page of update_one_subject_marks.php</li>
        <li><a href="subject_wise_report.php">Subject Wise Report</a></li>
        <li><a href="test_pictures.php">Test Pictures</a>Test if picture is present.
        </li>
        <li><a href="update_all_subjects_marks.php">All Marks Update</a></li>
        <li><a href="update_one_subject_marks.php">
                Update One Subject Marks</a>
                First Support Page of Subject_Link. Show form with marks.</li>
        <li><a href="update_roll_no.php">Update Roll No</a>
                For Mass Roll No update / For Mass Roll No insert in Exam Table 
                During Final Exam of other schools</li>
        <li><a href="update_subject_marks.php">
                Update Subject Marks.</a> 2nd Support Page of Subject_link.
                Javascipt file call this file using Ajax.</li>
            <li><a href="view_lock_subjects.php">View Lock Subject </a></li>
    </ul>
</div>
</div>

</div>


<?php Page_close(); ?>
