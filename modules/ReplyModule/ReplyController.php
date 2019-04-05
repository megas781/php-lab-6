<?php

class ReplyController
{

    function run()
    {
        //здесь достаём данные из post и определяем, какой view показать

        $fio = isset($_POST['fio']) ? $_POST['fio'] : '';
        $groupNumber = isset($_POST['group-number']) ? $_POST['group-number'] : '';

        $prType = isset($_POST['pr-type']) ? $_POST['pr-type'] : '';
        $viewType = isset($_POST['view-type']) ? $_POST['view-type'] : '';

        $aValue = isset($_POST['a-value']) ? $_POST['a-value'] : '';
        $bValue = isset($_POST['b-value']) ? $_POST['b-value'] : '';
        $cValue = isset($_POST['c-value']) ? $_POST['c-value'] : '';

        $shouldSend = isset($_POST['send-to-email-checkbox']) ? 'yes' : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $about = isset($_POST['about']) ? $_POST['about'] : '';


        if ($this->postedDataIsValid($fio, $groupNumber, $aValue, $bValue, $cValue, $shouldSend, $email)) {
            echo 'прошло валидацию';
        } else {
            echo 'что-то сука не нравится';
        }

        $GLOBALS['APP']->showForm();
//        if ($this->postedDataIsValid($fio,$groupNumber,$aValue,$bValue,$cValue,$shouldSend, $email)) {
//
//            if ($_POST['view-type'] === 'print-view') {
//                $this->showPrintableReplyView();
//            } else {
//                $this->showBrowserReplyView();
//            }
//
//        } else {
//            $GLOBALS['APP']->showForm();
//        }


    }

    private function postedDataIsValid($fio, $groupNumber, $aValue, $bValue, $cValue, $shouldSend, $email)
    {

        if (
            preg_match('~^[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ-]{4,} +[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ-]{4,} *(?:$|[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ-]{4,}$)~', trim($fio, ' ')) &&
            preg_match('~^\d{3}-\d{3}$~', trim($groupNumber, ' ')) &&
            preg_match('~^\d+(?:$|[\.,]{1}\d+$)~', trim($aValue, ' ')) &&
            preg_match('~^\d+(?:$|[\.,]{1}\d+$)~', trim($bValue, ' ')) &&
            preg_match('~^\d+(?:$|[\.,]{1}\d+$)~', trim($cValue, ' ')) &&
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




