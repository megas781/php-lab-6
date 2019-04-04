
<?php
$APP->showForm();

//Здесь определяем, показывать ли нам ReplyView и показывать ли вообще

switch ($APP->getState()) {

    case 'first_load':

        break;
    case 'first_post':

        break;
    case 'next_post':

        break;
    default:
        echo 'default case';
}

?>