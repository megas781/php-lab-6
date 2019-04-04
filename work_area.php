
<?php

if (!isset($_POST['state'])) $_POST['state'] = 'page-load';

echo '<pre>';
print_r($_POST);
echo '</pre>';

//Здесь определяем, показывать ли нам ReplyView и показывать ли вообще


switch ($APP->getState()) {

    case 'page-load':

        $APP->showForm();

        break;
    case 'form-post':

        $APP->showReplyView();
        break;
    default:
        echo 'default case';
}

?>