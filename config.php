<?php

/**
 * COnfiguration of Website.
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
"General Science",  "History and Geography", "Islamyat", "Pashto" ];

$SEVENTH_SUBJECT = ["English", "Urdu", "Maths",  "Mutalia Quran",
 "General Science", "History and Geography", "Islamyat", "Pashto" ];

$EIGHTH_SUBJECT = ["English", "Urdu", "Maths", "Mutalia Quran",
 "General Science", "History and Geography", "Islamyat", "Pashto" ];

$NINETH_SUBJECT = ["English", "Urdu", "Maths",
 "Islamyat", "Biology","Chemistry",
 "Physics","Pak Study" ];

$TENTH_SUBJECT = ["English", "Urdu", "Maths", "Islamyat", "Biology",
 "Chemistry","Physics","Pak Study" ];

?>
