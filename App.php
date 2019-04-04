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
        include 'modules/FormModule/form.php';
        $form = new FormView();
        $form->run();
    }

    function showReplyView() {

        include "modules/ReplyModule/reply.php";
        $reply = new ReplyView();
        $reply-> run();

    }

    function notify() {
        echo 'app loaded';
    }

}

$APP = new App();