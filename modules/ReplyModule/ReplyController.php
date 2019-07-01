<?php

class ReplyController
{

    function run()
    {
        //здесь достаём данные из post и определяем, какой view показать

        $fio = isset($_POST['fio']) ? htmlspecialchars($_POST['fio']) : '';
        $groupNumber = isset($_POST['group-number']) ? htmlspecialchars($_POST['group-number']) : '';

        $viewType = isset($_POST['view-type']) ? htmlspecialchars($_POST['view-type']) : '';
        $prType = isset($_POST['pr-type']) ? htmlspecialchars($_POST['pr-type']) : '';

        //Этот импорт нужен, чтобы достать свойсва count(FormController::prTypes) и FormController::prTypes['text']
        include_once SITE_ROOT . '/modules/FormModule/FormController.php';
        $prIndex = -1;
        for ($i = 0; $i < count(FormController::$prTypes); $i++) {
            if (FormController::$prTypes[$i]['id'] === $prType) {
                $prIndex = $i;
                break;
            }
        }


        $aValue = isset($_POST['a-value']) ? htmlspecialchars($_POST['a-value']) : '';
        $bValue = isset($_POST['b-value']) ? htmlspecialchars($_POST['b-value']) : '';
        $cValue = isset($_POST['c-value']) ? htmlspecialchars($_POST['c-value']) : '';
        $answerValue = isset($_POST['answer-value']) ? htmlspecialchars($_POST['answer-value']) : '';

        $shouldSend = isset($_POST['should-send']) ? $_POST['should-send'] : '';
        $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
        $about = isset($_POST['about']) ? htmlspecialchars($_POST['about']) : '';


        if ($this->postedDataIsValid($fio, $groupNumber, $prIndex, $aValue, $bValue, $cValue, $answerValue, $shouldSend, $email)) {

            //Здесь мы проверили сырые данные из $_POST. Теперь их можно обработать, НО!
            //Перед обраоткой нужно проверить, существует ли данный prType

            if (in_array($prType, ['triangle-perimeter', 'arith-average', 'triangle-square', 'geom-average', 'prlppd-volume', 'bitwise-conjunction'])) {

                //Здесь мы точно уверены, что getSolvedProblem вернёт верное значение

                $aValue = floatval(str_replace(',','.',$aValue));
                $bValue = floatval(str_replace(',','.',$bValue));
                $cValue = floatval(str_replace(',','.',$cValue));

                //Здесь уже обработанные данные $[letter]Value в типа float.
                //Теперь можно вычислять правильный ответ
                $computedValue = $this->getSolvedProblem($aValue,$bValue,$cValue,$prType);

                if ($viewType === 'print-view') {
                    include 'PrintableReplyView.php';
                } else {
                    include 'BrowserReplyView.php';
                }

                if ($shouldSend) {
                    //Мы должны отправить результаты на почту

                    $file = file_get_contents(SITE_ROOT . '/modules/ReplyModule/PrintableReplyView.php');
//                    echo htmlspecialchars($file);


                    mail( $email, 'Результат тестирования',
                        'asdffdsa',
                        "From: auto@mami.ru\n"."Content-Type: text/plain; charset=utf-8\n" );

//                    if (mail($email, 'Результаты теста', $file, 'From: auto@mami.ru\nContent-Type: text/html; charset=utf-8\n')) {
////                        echo 'успешно отправено';
//                    } else {
////                        echo 'не отправлено';
//                    }
                }
            }



        } else {
            $formValidationError = 'Не все поля формы введены корректно!';
            $GLOBALS['APP']->showForm($formValidationError);
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
    /*
     * @return Float
     */
    private function getSolvedProblem($a,$b,$c, $taskType)
    {

        //Проверка на валидность данных
        if (($taskType == 'triangle-perimeter' || $taskType == 'triangle-square') && ($a >= $b + $c || $b >= $a + $c || $c >= $a + $b)) {
            return 'NaN boy!';
        }

        switch ($taskType) {
            case 'triangle-perimeter':
                return $a + $b + $c;
                break;
            case 'arith-average':
                return ($a + $b + $c)/3;
                break;
            case 'triangle-square':
                $p = ($a + $b + $c)/2;
                return sqrt($p * ($p - $a) * ($p - $b) * ($p - $c));
                break;
            case 'geom-average':
                return pow($a * $b *$c, 1/3);
                break;
            case 'prlppd-volume':
                return $a * $b *$c;
                break;
            case 'bitwise-conjunction':
                return $a & $b & $c;
                break;
            default:
                return '';
                break;
        }
    }

    //Deprecated
    private function showPrintableReplyView()
    {
        include 'PrintableReplyView.php';
    }

    //Deprecated
    private function showBrowserReplyView()
    {
        include 'BrowserReplyView.php';
    }

}

?>




