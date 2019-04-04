<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Проверка знаний</title>

    <link rel="stylesheet" href="compose.css">
</head>
<body>
<div>
    <?php

    if (!isset($_POST['state'])) $_POST['state'] = 'page-load';

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    ?>
    <div class="_flex-centering">
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/App.php';
        ?>
