<?php

class App {

    function __construct()
    {

    }

    //При загрузке страницы сначала определяем состояние
    function getState() {

        //если есть ?new=yes, тогда статус 'retest'
        if (isset($_GET['new']) and $_GET['new'] == 'yes') {
            return 'retest';
        } else {
            //иначе статус подгружается из $_POST['state'];
            return $_POST['state'];
        }

    }

    function showForm($errorMessage = null) {
        include_once 'modules/FormModule/FormController.php';
        $form = new FormController($errorMessage);
        $form->run();
    }
    function showFormWithGetParams() {
        include_once 'modules/FormModule/FormController.php';
        $form = new FormController();

        $fio = isset($_GET['fio']) ? $_GET['fio'] : '';
        $groupNumber = isset($_GET['group-number']) ? $_GET['group-number'] : '';
        $shouldSend= isset($_GET['should-send']) ? $_GET['should-send'] : '';
        $email = isset($_GET['email']) ? $_GET['email'] : '';
        $about = isset($_GET['about']) ? $_GET['about'] : '';

        $form->run($fio, $groupNumber, $shouldSend, $email, $about);
    }

    function showReply() {

        include_once "modules/ReplyModule/ReplyController.php";
        $reply = new ReplyController();
        $reply-> run();

    }

    function notify() {
        echo 'app loaded';
    }

}

$APP = new App();
