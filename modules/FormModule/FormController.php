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

    function run($fio = '', $groupNumber = '', $shouldSend = '', $email = '', $about = '') {
        //Здесь мы обрабатываем данные (работаем с post) и передаём их во view


        //Либо дефолт, либо из get. И самый приоритет у post
        if (isset($_POST['fio'])) $fio = $_POST['fio'];
        if (isset($_POST['group-number'])) $groupNumber = $_POST['group-number'];


        //Если первая загрузка, то выбирается первый вариант
        if ($GLOBALS['APP']->getState() === 'form-post' ) {
            //Если уже был post, то данные подгружаются из $_POST
            for ($i = 0; $i < count(FormController::$prTypes); $i++) {
                $prType = FormController::$prTypes[$i];
                if ($prType['id'] === $_POST['pr-type']) {
                    FormController::$prTypes[$i]['checked'] = 'checked';
                }
            }
        } else {
            //Работает для load-page и ?new=yes
            FormController::$prTypes[0]['checked'] = 'checked';
        }

        if ($GLOBALS['APP']->getState() === 'form-post') {
            //Если уже был post, то данные подгружаются из $_POST
            for ($i = 0; $i < count(FormController::$viewTypes); $i++) {

                $viewType = FormController::$viewTypes[$i];

                if ($viewType['id'] === $_POST['view-type']) {
                    //Почему-то приходится обращаться через $this, чтобы алгоритм работал
                    FormController::$viewTypes[$i]['checked'] = 'checked';
                }
            }
        } else {
            FormController::$viewTypes[0]['checked'] = 'checked';
        }


        //Следующие четыре переменные не подгружаются из post, но могут быть сгенерированы рандомно.
        //Нужно будет реализовать эту логику

        if ($GLOBALS['APP']->getState() == 'retest') {
            //Здесь мы должны сгенерировать рандомные значения для a, b и c
            $aValue = rand(1, 100);
            $bValue = rand(1, 100);
            $cValue = rand(1, 100);
            $answerValue = '';

        } else {
            //здесь логика для page-load и form-post
            $aValue = isset($_POST['a-value']) ? $_POST['a-value'] : '';
            $bValue = isset($_POST['b-value']) ? $_POST['b-value'] : '';
            $cValue = isset($_POST['c-value']) ? $_POST['c-value'] : '';
            $answerValue = isset($_POST['answer-value']) ? $_POST['answer-value'] : '';
        }



        //'checked' или ''
        if (isset($_POST['should-send'])) $shouldSend = $_POST['should-send'];

        if (isset($_POST['email'])) $email = $_POST['email'];

        if (isset($_POST['about'])) $about = $_POST['about'];

        include 'FormView.php';
    }
}
?>