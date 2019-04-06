<?php

class ReplyController
{

    function run()
    {
        //здесь достаём данные из post и определяем, какой view показать

        $fio = isset($_POST['fio']) ? $_POST['fio'] : '';
        $groupNumber = isset($_POST['group-number']) ? $_POST['group-number'] : '';

        $viewType = isset($_POST['view-type']) ? $_POST['view-type'] : '';
        $prType = isset($_POST['pr-type']) ? $_POST['pr-type'] : '';

        //Этот импорт нужен, чтобы достать свойсва count(FormController::prTypes) и FormController::prTypes['text']
        include $_SERVER['DOCUMENT_ROOT'] . '/modules/FormModule/FormController.php';
        $prIndex = -1;
        for ($i = 0; $i < count(FormController::$prTypes); $i++) {
            if (FormController::$prTypes[$i]['id'] === $prType) {
                $prIndex = $i;
                break;
            }
        }


        $aValue = isset($_POST['a-value']) ? $_POST['a-value'] : '';
        $bValue = isset($_POST['b-value']) ? $_POST['b-value'] : '';
        $cValue = isset($_POST['c-value']) ? $_POST['c-value'] : '';
        $answerValue = isset($_POST['answer-value']) ? $_POST['answer-value'] : '';



        $shouldSend = isset($_POST['send-to-email-checkbox']) ? 'yes' : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $about = isset($_POST['about']) ? $_POST['about'] : '';


        if ($this->postedDataIsValid($fio, $groupNumber, $prIndex, $aValue, $bValue, $cValue, $answerValue, $shouldSend, $email)) {

            //Должна быть реализована фукнция вычисления правильного ответа
            $rightAnswer = 228;

            if ($viewType === 'print-view') {
                include 'PrintableReplyView.php';
            } else {
                include 'BrowserReplyView.php';
            }

            if ($shouldSend) {
                //Мы должны отправить результаты на почту
            }

        } else {
            $formValidationError = 'Не все поля формы введены корректно!';
            $GLOBALS['APP']->showForm();
        }

    }

    private function postedDataIsValid($fio, $groupNumber, $prIndex, $aValue, $bValue, $cValue, $answerValue, $shouldSend, $email)
    {

        if (
            preg_match('~^[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ-]{4,} +[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ-]{4,} *(?:$|[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ-]{4,}$)~', trim($fio, ' ')) &&
            preg_match('~^\d{3}-\d{3}$~', trim($groupNumber, ' ')) &&
            ($prIndex >= 0 && $prIndex <= count(FormController::$prTypes) - 1) &&
            preg_match('~^\d+(?:$|[\.,]{1}\d+$)~', trim($aValue, ' ')) &&
            preg_match('~^\d+(?:$|[\.,]{1}\d+$)~', trim($bValue, ' ')) &&
            preg_match('~^\d+(?:$|[\.,]{1}\d+$)~', trim($cValue, ' ')) &&
            preg_match('~^\d+(?:$|[\.,]{1}\d+$)~', trim($answerValue, ' ')) &&
            //Если установлена отправка по email, то его нужно валидировать
            ($shouldSend === '' || filter_var($email, FILTER_VALIDATE_EMAIL))
        ) {
            return true;
        } else {
            return false;
        }

    }

    private function showPrintableReplyView()
    {
        include 'PrintableReplyView.php';
    }


    private function showBrowserReplyView()
    {
        include 'BrowserReplyView.php';
    }

}

?>




