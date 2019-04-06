<form method="post" class="pr-form">

    <input type="hidden" name="state" value="form-post">

    <h3 class="pr-form__title">Тест математических знаний</h3>
    <div class="pr-form__mandatory-field-message">* – обязательное поле</div>
    <div><?php if (isset($formValidationError)) echo $formValidationError; ?></div>
    <table class="pr-form__input-container">

        <tr class="pr-form__field text-field field_mandatory">
            <td><label for="fio">ФИО*</label></td>
            <td><input type="text" id="fio" name="fio" placeholder="Иванов Иван Иванович" value="<?php echo $fio; ?>">
            </td>
        </tr>
        <tr class="pr-form__field text-field ">
            <td><label for="group-number">Номер группы</label></td>
            <td><input type="text" id="group-number" name="group-number" placeholder="123-456"
                       value="<?php echo $groupNumber; ?>"></td>
        </tr>


        <tr class="pr-form__field radio-field field_mandatory">
            <td colspan="2">

                <div><label for="">Тип задачи*</label></div>

                <table>
                    <tr>
                        <?php

//                        echo '<pre>';
//                        print_r(FormController::$prTypes);
//                        echo '</pre>';

                        for ($i = 0; $i < count(FormController::$prTypes); $i++) {
                            $prType = FormController::$prTypes[$i];
                            ?>
                            <td><input type="radio" name="pr-type" id="<?php echo $prType['id'] ?>"
                                       value="<?php echo $prType['id'] ?>" <?php echo $prType['checked']?>><label
                                        for="<?php echo $prType['id'] ?>"><?php echo $prType['text'] ?></label>
                            </td>
                            <?php

                            if ($i % 2 === 1 && $i !== count(FormController::$prTypes) - 1) {
                                echo "</tr>\n<tr>";
                            }
                        }
                        ?>
                    </tr>
                </table>

            </td>
        </tr>


        <tr class="pr-form__field text-field field_mandatory">
            <td><label for="a-value">Значение А*</label></td>
            <td><input type="text" id="a-value" name="a-value" placeholder="Вещественное число"
                       value="<?php echo $aValue; ?>"></td>
        </tr>
        <tr class="pr-form__field text-field field_mandatory">
            <td><label for="b-value">Значение B*</label></td>
            <td><input type="text" id="b-value" name="b-value" placeholder="Вещественное число"
                       value="<?php echo $bValue; ?>"></td>
        </tr>
        <tr class="pr-form__field text-field field_mandatory">
            <td><label for="c-value">Значение C*</label></td>
            <td><input type="text" id="c-value" name="c-value" placeholder="Вещественное число"
                       value="<?php echo $cValue; ?>"></td>
        </tr>
        <tr class="pr-form__field text-field field_mandatory">
            <td><label for="answer-value">Ваш ответ*</label></td>
            <td><input type="text" id="answer-value" name="answer-value" placeholder="Вещественное число"
                       value="<?php echo $answerValue; ?>"></td>
        </tr>

        <tr class="pr-form__field radio-field field_mandatory">
            <td colspan="2">

                <div><label for="">Тип ответа*</label></div>

                <table>
                    <tr>
                        <?php
//                        echo '<pre>';
//                        print_r(FormController::$viewTypes);
//                        echo '</pre>';

                        for ($i = 0; $i < count(FormController::$viewTypes); $i++):
                        $viewType = FormController::$viewTypes[$i];
                            ?>
                            <td><input type="radio" name="view-type" id="<?php echo $viewType['id']; ?>"
                                       value="<?php echo $viewType['id']; ?>" <?php echo $viewType['checked'] ?>><label
                                        for="<?php echo $viewType['id'] ?>"><?php echo $viewType['text']; ?></label>
                            </td>
                        <?php endfor; ?>
                    </tr>
                </table>

            </td>
        </tr>

        <tr class="pr-form__field">
            <td colspan="2">
                <input type="checkbox" value="yes"
                       id="send-to-email-checkbox"
                       name="send-to-email-checkbox" <?php echo $sendToEmailCheckboxCheckedParam; ?>>
                <label for="send-to-email-checkbox">Отправить
                    результат на почту</label>
            </td>
        </tr>


        <tr id="email" class="pr-form__field text-field field_mandatory">
            <td><label for="email-input">Ваш email*</label></td>
            <td><input type="text" id="email-input" name="email" placeholder="" value="<?php echo $email ?>"></td>
        </tr>


        <tr class="pr-form__field textarea-field pr-form__about-field">

            <td colspan="2">
                <div><label for="about">Немного о себе</label></div>
                <textarea name="about" id="about" cols="30" rows="10"
                          placeholder="Расскажите о своих интересах, хобби..."><?php echo $about; ?></textarea>
            </td>
        </tr>

        <tr class="pr-form__submit">
            <td>
                <input type="submit" value="Проверить">
            </td>
        </tr>

    </table>

</form>
