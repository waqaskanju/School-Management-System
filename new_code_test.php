<?php
    /**
     * USe for testing Code
     * php version 8.1
     *
     * @category Test
     *
     * @package None
     *
     * @author Waqas <waqaskanju@gmail.com>
     *
     * @license http://www.waqaskanju.com/license MIT
     *
     * @link http://www.waqaskanju.com/
     **/


require_once 'db_connection.php';
require_once 'sand_box.php';
$link=connect();

$class_name="6th";

$sql="ALTER TABLE chitor_db.class_subjects
ADD School_Id Int";

$sql="ALTER TABLE chitor_db.class_subjects
ADD FOREIGN KEY (School_Id) REFERENCES Schools(Id)";

$sql="ALTER TABLE chitor_db.class_subjects
  ADD CONSTRAINT uqSchool_Class_Subject UNIQUE(School_Id,Class_Id,Subject_Id)";

// to ignore some files and  print progress and show progress.
// phpcs --ignore=*/vendor -v -p .
?>
