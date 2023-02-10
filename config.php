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

require_once 'db_connection.php';

$USER = "Waqas Ahmad";
global  $CLASS_INSERT;
global  $SCHOOL_INSERT;
global  $CLASS_SHOW;
global  $SCHOOL_SHOW;
global  $MODE;
global $SIXTH_SUBJECT;
global $SEVENTH_SUBJECT;
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

$link=connect();
 $SIXTH_SUBJECT = class_subjects($link,'6th');
 $SEVENTH_SUBJECT = class_subjects($link,'7th');
 $EIGHTH_SUBJECT = class_subjects($link,'8th');
 $NINETH_SUBJECT = class_subjects($link,'9th A');
 $TENTH_SUBJECT = class_subjects($link,'10th A');
?>
