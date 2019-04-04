<?php

class ReplyController
{

    function run()
    {

        //здесь достаём данные из post и определяем, какой view показать

        if ($this->postedDataIsValid()) {

            if ($_POST['view-type'] === 'print-view') {
                $this->showPrintableReplyView();
            } else {
                $this->showBrowserReplyView();
            }

        } else {
            $GLOBALS['APP']->showForm();
        }


    }

    private function postedDataIsValid()
    {
//        echo 'валидность не пройдена';
        return true;
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




