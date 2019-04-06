<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/php-lab-6/');

//echo SITE_ROOT;

?>

<?php require 'master-page/Header/header.php';?>

<?php require SITE_ROOT . '/work_area.php'?>

<?php require 'master-page/Footer/footer.php' ?>

