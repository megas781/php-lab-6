<div>

    <div class="_flex-centering">

        <form method="post" class="pr-form">

            <input type="hidden" name="state" value="form-post">

            <h3 class="pr-form__title">Тест математических знаний</h3>
            <div class="pr-form__mandatory-field-message">* – обязательное поле</div>

            <table class="pr-form__input-container">

                <tr class="pr-form__field text-field field_mandatory">
                    <td><label for="fio">ФИО*</label></td>
                    <td><input type="text" id="fio" name="fio" placeholder="Иванов Иван Иванович"></td>
                </tr>
                <tr class="pr-form__field text-field ">
                    <td><label for="group-number">Номер группы</label></td>
                    <td><input type="text" id="group-number" name="group-number" placeholder="123-456"></td>
                </tr>


                <tr class="pr-form__field radio-field field_mandatory">
                    <td colspan="2">

                        <div><label for="">Тип передачи*</label></div>

                        <table>
                            <tr>
                                <td><input type="radio" name="pr-type" id="triangle-perimeter" value="triangle-perimeter"><label for="triangle-perimeter">Периметр треугольника</label></td>

                                <td><input type="radio" name="pr-type" id="arith-average" value="arith-average"><label for="arith-average">Среднее арифметическое</label></td>
                            </tr>
                            <tr>
                                <td><input type="radio" name="pr-type" id="triangle-square" value="triangle-square" checked><label for="triangle-square">Площадь треугольника</label></td>
                                <td><input type="radio" name="pr-type" id="geom-average" value="geom-average"><label for="geom-average">Среднее геометрическое</label></td>
                            </tr>
                            <tr>
                                <td><input type="radio" name="pr-type" id="prlppd-volume" value="prlppd-volume"><label for="prlppd-volume">Объем параллелепипеда</label></td>
                                <td><input type="radio" name="pr-type" id="bitwise-conjunction" value="bitwise-conjunction"><label for="bitwise-conjunction">Побитовая конъюнкиция</label></td>
                            </tr>
                        </table>

                    </td>
                </tr>


                <tr class="pr-form__field text-field field_mandatory">
                    <td><label for="a-value">Значение А*</label></td>
                    <td><input type="text" id="a-value" name="a-value" placeholder="Вещественное число"></td>
                </tr>
                <tr class="pr-form__field text-field field_mandatory">
                    <td><label for="b-value">Значение B*</label></td>
                    <td><input type="text" id="b-value" name="b-value" placeholder="Вещественное число"></td>
                </tr>
                <tr class="pr-form__field text-field field_mandatory">
                    <td><label for="c-value">Значение C*</label></td>
                    <td><input type="text" id="c-value" name="c-value" placeholder="Вещественное число"></td>
                </tr>


                <tr class="pr-form__field radio-field field_mandatory">
                    <td colspan="2">

                        <div><label for="">Тип передачи*</label></div>

                        <table>
                            <tr>
                                <td><input type="radio" name="view-type" id="browser-view" value="browser-view" checked><label for="browser-view">Для браузера</label></td>
                                <td><input type="radio" name="view-type" id="print-view" value="print-view"><label for="print-view">Для печати</label></td>
                            </tr>
                        </table>

                    </td>
                </tr>

                <tr class="pr-form__field">
                    <td colspan="2">
                        <input type="checkbox" value="yes"
                               id="send-to-email-checkbox"
                               name="send-to-email-checkbox">
                        <label for="send-to-email-checkbox">Отправить
                            результат на почту</label>
                    </td>
                </tr>


                <tr id="email" class="pr-form__field text-field field_mandatory">
                    <td><label for="email-input">Ваш email*</label></td>
                    <td><input type="text" id="email-input" name="email" placeholder=""></td>
                </tr>


                <tr class="pr-form__field textarea-field pr-form__about-field">

                    <td colspan="2">
                        <div><label for="about">Немного о себе</label></div>
                        <textarea name="about" id="about" cols="30" rows="10"
                                  placeholder="Расскажите о своих интересах, хобби..."></textarea>
                    </td>
                </tr>

                <tr class="pr-form__submit">
                    <td>
                        <input type="submit" value="Проверить">
                    </td>
                </tr>

            </table>

        </form>

    </div>

</div>