
<?php

//Здесь определяем, показывать ли нам ReplyView и показывать ли вообще

switch ($APP->getState()) {

    case 'page-load':
        $APP->showForm();
        break;

    case 'form-post':
        $APP->showReply();
        break;

    case 'retest':
        $APP->showFormWithGetParams();
        break;
    default:
        echo 'default case';
}

?>