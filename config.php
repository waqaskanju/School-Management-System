<?php

/**
 * Configuration of Website.
 * php version 8.1
 *
 * @category Adfsad
 *
 * @package Adf
 *
 * @author Khan <abc@examp.com>
 *
 * @license http://www.abc.com MIT
 *
 * @link Adfas
 **/

$USER = "Waqas Ahmad";
global  $CLASS_INSERT;
global  $SCHOOL_INSERT;
global  $CLASS_SHOW;
global  $SCHOOL_SHOW;
global  $MODE;
global $SIXTH_SUBJECT;
global $SEVENTH_SUBJECT_SUBJECT;
global $EIGHTH_SUBJECT;
global $NINETH_SUBJECT;
global $TENTH_SUBJECT;

global $SIXTH_TOTAL_MARKS;
global $SEVENTH_TOTAL_MARKS;
global $EIGHTH_TOTAL_MARKS;
global $NINTH_TOTAL_MARKS;
global $TENTH_TOTAL_MARKS;

if ($USER=="Waqas Ahmad") {
    $SCHOOL_NAME = "GHSS Chitor";
    $SCHOOL_FULL_NAME_ABV = "GHSS Chitor Swat";
    $SCHOOL_FULL_NAME = "Government Higher Secondary School";
    $SCHOOL_LOCATION = "CHITOR SWAT";
    $CLASS_INSERT = "10th B";
    $SCHOOL_INSERT = $SCHOOL_NAME;
    $CLASS_SHOW="10th B";
    $SCHOOL_SHOW=$SCHOOL_NAME;
    $MODE="write";
}

$SIXTH_SUBJECT = ["English", "Urdu", "Maths",  "Mutalia Quran",
"General Science",  "History And Geography", "Islamyat", "Pashto",
"Computer Science"];

$SEVENTH_SUBJECT = ["English", "Urdu", "Maths",  "Mutalia Quran",
 "General Science", "History And Geography", "Islamyat", "Pashto",
 "Computer Science" ];

$EIGHTH_SUBJECT = ["English", "Urdu", "Maths", "Mutalia Quran",
 "General Science", "History And Geography", "Islamyat", "Pashto",
 "Computer Science" ];

$NINETH_SUBJECT = ["English", "Urdu", "Maths",
 "Islamyat", "Biology","Chemistry",
 "Physics","Pak Study","Mutalia Quran"];

$TENTH_SUBJECT = ["English", "Urdu", "Maths", "Islamyat", "Biology",
 "Chemistry","Physics","Pak Study" ];
?>
