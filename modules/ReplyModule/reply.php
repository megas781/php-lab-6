<?php

class ReplyView
{

    function run() {

        //здесь достаём данные из post и определяем, какой view показать

        if ($_POST['view-type'] === 'print-view') {
            $this->showPrintableReplyView();
        } else {
            $this->showBrowserReplyView();
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




