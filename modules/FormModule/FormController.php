<?php

class FormController {
    function __construct()
    {

    }

    public $prTypes = [
        ['id' => 'triangle-perimeter', 'text' => 'Периметр треугольника', 'checked' => ''], ['id' => 'arith-average', 'text' => 'Среднее арифметическое', 'checked' => ''],
        ['id' => 'triangle-square', 'text' => 'Площадь треугольника', 'checked' => ''], ['id' => 'geom-average', 'text' => 'Среднее геометрическое', 'checked' => ''],
        ['id' => 'prlppd-volume', 'text' => 'Объём параллелепипеда', 'checked' => ''], ['id' => 'bitwise-conjunction', 'text' => 'Побитовая конъюнкция', 'checked' => '']
    ];

    public $viewTypes = [
        ['id' => 'browser-view', 'text' => 'Для браузера', 'checked' => ''],
        ['id' => 'print-view', 'text' => 'Для печати', 'checked' => '']
    ];

    function run() {
        //Здесь мы обрабатываем данные (работаем с post) и передаём их во view

        $fio = isset($_POST['fio']) ? $_POST['fio'] : '';
        $groupNumber = isset($_POST['group-number']) ? $_POST['group-number'] : '';


        //Если первая загрузка, то выбирается первый вариант
        if ($_POST['state'] === 'page-load') {
            $this->prTypes[0]['checked'] = 'checked';
        } else {
            //Если уже был post, то данные подгружаются из $_POST
            for ($i = 0; $i < count($this->prTypes); $i++) {
                $prType = $this->prTypes[$i];
                if ($prType['id'] === $_POST['pr-type']) {
                    $this->prTypes[$i]['checked'] = 'checked';
                }
            }
        }

        if ($_POST['state'] === 'page-load') {
            $this->viewTypes[0]['checked'] = 'checked';
        } else {
            //Если уже был post, то данные подгружаются из $_POST
            for ($i = 0; $i < count($this->viewTypes); $i++) {

                $viewType = $this->viewTypes[$i];

                if ($viewType['id'] === $_POST['view-type']) {
                    //Почему-то приходится обращаться через $this, чтобы алгоритм работал
                    $this->viewTypes[$i]['checked'] = 'checked';
                }
            }
        }


        $aValue = isset($_POST['a-value']) ? $_POST['a-value'] : '';
        $bValue = isset($_POST['b-value']) ? $_POST['b-value'] : '';
        $cValue = isset($_POST['c-value']) ? $_POST['c-value'] : '';



        //'checked' или ''
        $sendToEmailCheckboxCheckedParam = (isset($_POST['send-to-email-checkbox']) && $_POST['send-to-email-checkbox'] === 'yes') ? 'checked' : '';

        $email = isset($_POST['email']) ? $_POST['email'] : '';

        $about = isset($_POST['about']) ? $_POST['about'] : '';

        include 'FormView.php';
    }
}
?>