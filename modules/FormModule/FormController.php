<?php

class FormController {
    function __construct()
    {

    }

    static public $prTypes = [
        ['id' => 'triangle-perimeter', 'text' => 'Периметр треугольника', 'checked' => ''], ['id' => 'arith-average', 'text' => 'Среднее арифметическое', 'checked' => ''],
        ['id' => 'triangle-square', 'text' => 'Площадь треугольника', 'checked' => ''], ['id' => 'geom-average', 'text' => 'Среднее геометрическое', 'checked' => ''],
        ['id' => 'prlppd-volume', 'text' => 'Объём параллелепипеда', 'checked' => ''], ['id' => 'bitwise-conjunction', 'text' => 'Побитовая конъюнкция', 'checked' => '']
    ];

    static public $viewTypes = [
        ['id' => 'browser-view', 'text' => 'Для браузера', 'checked' => ''],
        ['id' => 'print-view', 'text' => 'Для печати', 'checked' => '']
    ];

    function run() {
        //Здесь мы обрабатываем данные (работаем с post) и передаём их во view

        $fio = isset($_POST['fio']) ? $_POST['fio'] : '';
        $groupNumber = isset($_POST['group-number']) ? $_POST['group-number'] : '';


        //Если первая загрузка, то выбирается первый вариант
        if ($_POST['state'] === 'page-load') {
            FormController::$prTypes[0]['checked'] = 'checked';
        } else {
            //Если уже был post, то данные подгружаются из $_POST
            for ($i = 0; $i < count(FormController::$prTypes); $i++) {
                $prType = FormController::$prTypes[$i];
                if ($prType['id'] === $_POST['pr-type']) {
                    FormController::$prTypes[$i]['checked'] = 'checked';
                }
            }
        }

        if ($_POST['state'] === 'page-load') {
            FormController::$viewTypes[0]['checked'] = 'checked';
        } else {
            //Если уже был post, то данные подгружаются из $_POST
            for ($i = 0; $i < count(FormController::$viewTypes); $i++) {

                $viewType = FormController::$viewTypes[$i];

                if ($viewType['id'] === $_POST['view-type']) {
                    //Почему-то приходится обращаться через $this, чтобы алгоритм работал
                    FormController::$viewTypes[$i]['checked'] = 'checked';
                }
            }
        }


        $aValue = isset($_POST['a-value']) ? $_POST['a-value'] : '';
        $bValue = isset($_POST['b-value']) ? $_POST['b-value'] : '';
        $cValue = isset($_POST['c-value']) ? $_POST['c-value'] : '';
        $answerValue = isset($_POST['answer-value']) ? $_POST['answer-value'] : '';


        //'checked' или ''
        $sendToEmailCheckboxCheckedParam = (isset($_POST['send-to-email-checkbox']) && $_POST['send-to-email-checkbox'] === 'yes') ? 'checked' : '';

        $email = isset($_POST['email']) ? $_POST['email'] : '';

        $about = isset($_POST['about']) ? $_POST['about'] : '';

        include 'FormView.php';
    }
}
?>