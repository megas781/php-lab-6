<?php

class App {

    function __construct()
    {

    }

    //При загрузке страницы сначала определяем состояние
    function getState() {
        return $_POST['state'];
    }

    function showForm() {
        include_once 'modules/FormModule/FormController.php';
        $form = new FormController();
        $form->run();
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
