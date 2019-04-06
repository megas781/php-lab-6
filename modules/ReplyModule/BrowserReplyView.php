<div id="browser-view">
    <table>
        <thead>
        <tr>
            <th colspan="2">
                <div>Результат тестирования</div>
                <hr></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>ФИО</td>
            <td><?php echo $fio; ?></td>
        </tr>
        <tr>
            <td>Номер группы</td>
            <td><?php echo $groupNumber; ?></td>
        </tr>
        <tr>
            <td>Сведения о студенте</td>
            <td><?php echo $about; ?></td>
        </tr>
        <tr>
            <td>Тип задачи</td>
            <td><?php echo FormController::$prTypes[$prIndex]['text']; ?></td>
        </tr>
        <tr>
            <td colspan="2"><b>Входные данные</b></td>
        </tr>
        <tr>
            <td>A</td>
            <td><?php echo $aValue; ?></td>
        </tr>
        <tr>
            <td>B</td>
            <td><?php echo $bValue; ?></td>
        </tr>
        <tr>
            <td>C</td>
            <td><?php echo $cValue; ?></td>
        </tr>
        <tr class="<?php echo $answerValue == $computedValue ? 'right-answer' : 'wrong-answer'; ?>">
            <td>Ответ студента</td>
            <td><?php echo $answerValue; ?></td>
        </tr>
        <tr>
            <td>Правильный ответ</td>
            <td><?php echo $computedValue; ?></td>
        </tr>
        <tr>
            <th colspan="2"><div><?php

                    if ($answerValue == $computedValue) {
                        echo 'Ответы совпадают';
                    } else {
                        echo 'Ответы не совпадают';
                    }

                    ?></div></th>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="2">
                <a class="restart-test-link" href="http://<?php echo $_SERVER['HTTP_HOST'] . '/php-lab-6/' ?>?new=yes&fio=<?php echo $fio ?>&group-number=<?php echo $groupNumber; ?>&should-send=<?php echo $shouldSend; ?>&email=<?php echo $email; ?>&about=<?php echo $about ?>">Повторить тест</a>
            </td>
        </tr>
        </tfoot>
    </table>

</div>