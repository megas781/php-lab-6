<?php

$matches = [];
//echo preg_match_all('~[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ-]{8}~','Калачев Глеб Романович', $matches);
//echo preg_match_all('~^\w{2,}\b +\b\w{2,}\b *(?:$|\b\w{2,}\b$)~','Калачев Глеб Романович', $matches);
//echo preg_match('~^\d+(?:$|[\.,]{1}\d+$)~', trim('12.123', ' '), $matches);


//function postedDataIsValid($fio, $groupNumber, $aValue, $bValue, $cValue,$shouldSend, $email)
//{
//    if (
//        preg_match('~^\w{2,}\b +\b\w{2,}\b *(?:$|\b\w{2,}\b$)~', trim($fio, ' ')) &&
//        preg_match('~\^d{3}-\d{3}$~', trim($groupNumber, ' ')) &&
//        preg_match('~^\d+(?:$|[\.,]{1}\d+$)~', trim($aValue, ' ')) &&
//        preg_match('~^\d+(?:$|[\.,]{1}\d+$)~', trim($bValue, ' ')) &&
//        preg_match('~^\d+(?:$|[\.,]{1}\d+$)~', trim($cValue, ' ')) &&
//        //Если установлена отправка по email, то его нужно валидировать
//        ($shouldSend === '' || filter_var($email, FILTER_VALIDATE_EMAIL))
//    ) {
//        return true;
//    } else {
//        return false;
//    }
//
//}

//echo preg_match('~^\d+(?:$|[\.,]{1}\d+$)~', trim(1.2, ' '), $matches);
//echo preg_match('~^\d{3}-\d{3}$~', trim('181-321', ' '), $matches);
//echo trim('Глеб Калачев', ' ') . "<br>";
//echo preg_match('~^[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ-]{4,}\b +\b[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ-]{4,}\b *(?:$|\b[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ-]{4,}\b$)~', trim('Глеб Калачев', ' '), $matches);
//echo preg_match('~^[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ-]{4,} +[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ-]{4,} *(?:$|[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ-]{4,}$)~', trim('Глеб Калачев Романович', ' '), $matches);
//echo preg_match_all('~[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ-]{8}~','Калачев Глеб Романович', $matches);

//echo '1,2' + 1;

$file = include "modules/ReplyModule/MailReplyView.php";

echo $file;

//echo '<pre>';
//print_r($matches);