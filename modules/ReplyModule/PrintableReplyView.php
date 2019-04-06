<div id="printable-view">
    <table>
        <thead>
        <tr>
            <th>Результат тестирования</th>
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
        <tr>
            <td>Ответ студента</td>
            <td><?php echo $answerValue; ?></td>
        </tr>
        <tr>
            <td>Правильный ответ</td>
            <td><?php echo $computedValue; ?></td>
        </tr>
        <tr>
            <td><b><?php

                    if ($answerValue == $computedValue) {
                        echo 'Ответы совпадают';
                    } else {
                        echo 'Ответы не совпадают';
                    }

                    ?></b></td>
        </tr>
        </tbody>
    </table>

</div>