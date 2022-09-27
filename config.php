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


if ($USER=="Waqas Ahmad") {
    $SCHOOL_NAME = "GHSS Chitor";
    $SCHOOL_FULL_NAME_ABV = "GHSS Chitor Swat";
    $SCHOOL_FULL_NAME = "Government Higher Secondary School";
    $SCHOOL_LOCATION = "CHITOR SWAT";
    $CLASS_INSERT = "9th A";
    $SCHOOL_INSERT = $SCHOOL_NAME;
    $CLASS_SHOW="9th A";
    $SCHOOL_SHOW=$SCHOOL_NAME;
    $MODE="write";
}
?>
