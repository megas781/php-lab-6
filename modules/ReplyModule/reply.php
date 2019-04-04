<?php

class ReplyView
{

    function run() {

        //здесь достаём данные из post и определяем, какой view показать

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




