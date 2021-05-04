<section id = "request-section" class="request-section">
    <div class="inner">
        <h2 class="big-title">
            Заполните заявку
        </h2>
        <form class="request-form request-form-to ">
            <div class="control-panel">
                <a href="" id = "control-panel_1" class="control-panel__item current">
                    <span class="db step">
                        Шаг 1
                    </span>
                    <span class="db step-desk">
                        Информация о владельце
                    </span>
                </a>
                <a href="" id = "control-panel_2" class="control-panel__item">
                    <span class="db step">
                        Шаг 2
                    </span>
                    <span class="db step-desk">
                        Информация о машине
                    </span>
                </a>
                <a href="" id = "control-panel_3" class="control-panel__item">
                    <span class="db step">
                        Шаг 3
                    </span>
                    <span class="db step-desk">
                        Информация о машине
                    </span>
                </a>
                <a href="" id = "control-panel_4" class="control-panel__item">
                    <span class="db step">
                        Шаг 4
                    </span>
                    <span class="db step-desk">
                        Контактные данные
                    </span>
                </a>
            </div>
            <div class="input-panel">
                <div id = "input-panel__step_1" class="input-panel__step active">
                    <div class="row">
                        <div class="input-panel__field-box">
                            <label>
                                <span class="caption db mandatory">Фамилия</span>
                                <input type="text" name="lastname" class="inputbox lastname" placeholder="Фамилия" autocomplete="off">
                                <span class="err-message">
                                    Поле заполнено некорректно.
                                </span>
                            </label>
                        </div>
                        <div class="input-panel__field-box">
                            <label>
                                <span class="caption db mandatory">Имя</span>
                                <input type="text" name="name" class="inputbox name" placeholder="Имя" autocomplete="off">
                                <span class="err-message">
                                    Поле заполнено некорректно.
                                </span>
                            </label>
                        </div>
                        <div class="input-panel__field-box">
                            <label>
                                <span class="caption db">*Отчество</span>
                                <input type="text" name="patronymic" class="inputbox patronymic" placeholder="Отчество" autocomplete="off">
                                <span class="err-message">
                                     Поле заполнено некорректно.
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="btn-box">
                        <a href="#" class="btn" id = "toStep2">Далее</a>
                    </div>
                </div>
                <div id = "input-panel__step_2" class="input-panel__step ">
                    <div class="row">
                        <div class="input-panel__field-box">
                            <label>
                                <span class="caption db mandatory">Шины марка</span>
                                <input type="text" name="shini" class="inputbox shini" placeholder="Шины марка" autocomplete="off">
                                <span class="err-message">
                                    Пожалуйста, заполните это поле.
                                </span>
                            </label>
                        </div>
                        <div class="input-panel__field-box">
                            <label>
                                <span class="caption db mandatory">Пробег ТС в км</span>
                                <input type="number" name="probeg" class="inputbox probeg" placeholder="Пробег" autocomplete="off">
                                <span class="err-message">
                                    Пожалуйста, заполните это поле.
                                </span>
                            </label>
                        </div>
                        <div class="input-panel__field-box">
                            <span class="caption db">Тип ТС</span>
                            <select class="selectBox" name="type_ts">
                                <option value="Обычный автомобиль" selected>Обычный автомобиль</option>
                                <option value="Используеутся в такси">Используеутся в такси</option>
                                <option value="Для обучения">Для обучения</option>
                                <option value="Для перевозки опасных грузов Для перевозки опасных грузов">Для перевозки опасных грузов Для перевозки опасных грузов</option>
                                <option value="Мотоцикл">Мотоцикл</option>
                            </select>
                        </div>
                        <div class="input-panel__field-box">
                            <label>
                                <span class="caption db mandatory">Тип топлива</span>
                                <input type="text" name="toplivo" class="inputbox toplivo" placeholder="Тип топлива" autocomplete="off">
                                <span class="err-message">
                                    Пожалуйста, заполните это поле.
                                </span>
                            </label>
                        </div>
                        <div class="input-panel__field-box">
                            <label>
                                <span class="caption db mandatory">Гос. рег. номер</span>
                                <input type="text" name="gosnomer" class="inputbox gosnomer" placeholder="Гос. рег. номер" autocomplete="off">
                                <span class="err-message">
                                    Пожалуйста, заполните это поле.
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="btn-box">
                        <a href="#" class="btn" id = "bacStep1">Назад</a>
                        <a href="#" class="btn" id = "toStep3">Далее</a>
                    </div>
                </div>
                <div id = "input-panel__step_3" class="input-panel__step ">
                    <div class="free-row">
                        <div class="input-panel__field-box input-panel__field-box__doc">
                            <span class="caption db mandatory">Документ</span>
                            <select class="selectBox" class = "type_doc" name="type_doc">
                                <option value="СТС" selected>СТС</option>
                                <option value="ПТС">ПТС</option>
                                <option value="ЭПТС">ЭПТС</option>
                            </select>
                        </div>
                        <div class="input-panel__field-box input-panel__field-box-series">
                            <label>
                                <span class="caption db mandatory">Серия</span>
                                <input type="text" name="doc_seria" class="inputbox doc_seria" placeholder="0000" autocomplete="off">
                                <span class="err-message">
                                    Пожалуйста, заполните это поле.
                                </span>
                            </label>
                        </div>
                        <div class="input-panel__field-box">
                            <label>
                                <span class="caption db mandatory">Номер</span>
                                <input type="text" name="doc_number" class="inputbox doc_number" placeholder="123456" autocomplete="off">
                                <span class="err-message">
                                    Пожалуйста, заполните это поле.
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-panel__field-box">
                            <label>
                                <span class="caption db mandatory">Выдано</span>
                                <input type="text" name="doc_org" class="inputbox doc_org" placeholder="Выдано" autocomplete="off">
                                <span class="err-message">
                                    Пожалуйста, заполните это поле.
                                </span>
                            </label>
                        </div>
                        <div class="input-panel__field-box input-panel__field-box-date">
                            <label>
                                <span class="caption db mandatory">Дата выдачи</span>
                                <input type="text" id="field-date" name="doc_data_v" class="inputbox doc_data_v" placeholder="дд.мм.гггг" autocomplete="off">
                                <span class="err-message">
                                    Пожалуйста, заполните это поле.
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-panel__field-box">
                            <label>
                                <span class="caption db mandatory">Марка</span>
                                <input type="text" name="doc_marka" class="inputbox doc_marka" placeholder="Марка" autocomplete="off">
                                <span class="err-message">
                                    Пожалуйста, заполните это поле.
                                </span>
                            </label>
                        </div>
                        <div class="input-panel__field-box">
                            <label>
                                <span class="caption db mandatory">Модель</span>
                                <input type="text" name="doc_model" class="inputbox doc_model" placeholder="Модель" autocomplete="off">
                                <span class="err-message">
                                    Пожалуйста, заполните это поле.
                                </span>
                            </label>
                        </div>
                        <div class="input-panel__field-box">
                            <span class="caption db mandatory">Категория ТС</span>
                            <select class="selectBox" name="doc_cat_ts" class="doc_cat_ts">
                                <option value="А | L - Мототранспортные средства" selected>
                                    А | L - Мототранспортные средства
                                </option>
                                <option value="B | M1 - Легковые автомобили">
                                    B | M1 - Легковые автомобили
                                </option>
                                <option value="B | N1 - Грузовые автомобили до 3.5 тонн">
                                    B | N1 - Грузовые автомобили до 3.5 тонн
                                </option>
                                <option value="C | N2 - Грузовые автомобили 3.5 - 12 тонн">
                                    C | N2 - Грузовые автомобили 3.5 - 12 тонн
                                </option>
                                <option value="C | N3 - Грузовые автомобили свыше 12 тонн">
                                    C | N3 - Грузовые автомобили свыше 12 тонн
                                </option>
                                <option value="D | M2 - Автобусы до 5 тонн">
                                    D | M2 - Автобусы до 5 тонн
                                </option>
                                <option value="D | M3 - Автобусы свыше 5 тонн">
                                    D | M3 - Автобусы свыше 5 тонн
                                </option>
                                <option value="E | O1 - Прицепы до 0.75 тонн">
                                    E | O1 - Прицепы до 0.75 тонн
                                </option>
                                <option value="E | O2 - Прицепы 0.75 - 3.5 тонн">
                                    E | O2 - Прицепы 0.75 - 3.5 тонн
                                </option>
                                <option value="E | O3 - Прицепы 3.5 - 12 тонн">
                                    E | O3 - Прицепы 3.5 - 12 тонн
                                </option>
                                <option value="E | O4 - Прицепы свыше 12 тонн">
                                    E | O4 - Прицепы свыше 12 тонн
                                </option>
                            </select>
                        </div>
                        <div class="input-panel__field-box">
                            <label>
                                <span class="caption db mandatory">Идентификационный номер VIN</span>
                                <input type="text" name="doc_vin" class="inputbox doc_vin" placeholder="Идентификационный номер VIN" autocomplete="off">
                                <span class="err-message">
                                    Пожалуйста, заполните это поле.
                                </span>
                            </label>
                        </div>
                        <div class="input-panel__field-box">
                            <label>
                                <span class="caption db mandatory">Шасси № (или введите VIN)</span>
                                <input type="text" name="doc_hassi" class="inputbox doc_hassi" placeholder="Шасси №" autocomplete="off">
                                <span class="err-message">
                                    Пожалуйста, заполните это поле.
                                </span>
                            </label>
                        </div>
                        <div class="input-panel__field-box">
                            <label>
                                <span class="caption db mandatory">Кузов № (или введите VIN)</span>
                                <input type="text" name="doc_kuzov" class="inputbox doc_kuzov" placeholder="Кузов №" autocomplete="off">
                                <span class="err-message">
                                    Пожалуйста, заполните это поле.
                                </span>
                            </label>
                        </div>
                        <div class="input-panel__field-box">
                            <label>
                                <span class="caption db mandatory">Год выпуска ТС</span>
                                <input type="number" name="doc_godvip" class="inputbox doc_godvip" placeholder="Год выпуска ТС" autocomplete="off">
                                <span class="err-message">
                                    Пожалуйста, заполните это поле.
                                </span>
                            </label>
                        </div>
                        <div class="input-panel__field-box">
                            <label>
                                <span class="caption db mandatory">Разрешенная масса, кг</span>
                                <input type="number" name="doc_r_massa" class="inputbox doc_r_massa" placeholder="Разрешенная масса, кг" autocomplete="off">
                                <span class="err-message">
                                    Пожалуйста, заполните это поле.
                                </span>
                            </label>
                        </div>
                        <div class="input-panel__field-box">
                            <label>
                                <span class="caption db mandatory">Масса без нагрузки, кг</span>
                                <input type="number" name="doc_m_massa" class="inputbox doc_m_massa" placeholder="Масса без нагрузки, кг" autocomplete="off">
                                <span class="err-message">
                                    Пожалуйста, заполните это поле.
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="btn-box">
                        <a href="#" class="btn" id = "bacStep2">Назад</a>
                        <a href="#" class="btn" id = "toStep4">Далее</a>
                    </div>
                </div>
                <div id = "input-panel__step_4" class="input-panel__step ">
                    <div class="row">
                        <div class="input-panel__field-box">
                            <label>
                                <span class="caption db mandatory">Телефон</span>
                                <input type="tel" id="pers_tel" name="pers_tel" class="inputbox pers_tel" placeholder="+7 (999) 999-99-99" autocomplete="off">
                                <span class="err-message">
                                    Пожалуйста, заполните это поле.
                                </span>
                            </label>
                        </div>
                        <div class="input-panel__field-box">
                            <label>
                                <span class="caption db mandatory">E-mail</span>
                                <input type="email" name="pers_mail" class="inputbox pers_mail" placeholder="введите e-mail" autocomplete="off">
                                <span class="err-message">
                                    Пожалуйста, заполните это поле.
                                </span>
                            </label>
                        </div>
                        <div class="input-panel__field-box">
                            <label>
                                <span class="caption db mandatory">Город</span>
                                <input type="text" name="pers_city" class="inputbox pers_city city_prost_val" placeholder="Введите город" value = "<? echo $GLOBALS["city"];?>" autocomplete="off">
                                <span class="err-message">
                                    Пожалуйста, заполните это поле.
                                </span>
                            </label>
                        </div>
                    </div>
                    <label>
                        <span class="caption db">Ваш комментарий к заказу</span>
                        <textarea name="pers_message" class = "pers_message textarea" class="textarea"></textarea>
                        <span class="err-message">
                            Пожалуйста, заполните это поле.
                        </span>
                    </label>
                    <div class="consent-box">
                        <label class="consent">
                            <input class = "policy_checed" type="checkbox">
                            <span></span>
                        </label>
                        <span class="consent-mess">
                            Даю согласие на обработку персональных данных и принимаю <a href="#">пользовательское соглашение.</a>
                        </span>
                    </div>

                    <div class="btn-box">
                        <a href="#" class="btn"  id = "bacStep3" >Назад</a>
                        <button type="submit" class="btn" id = "sendTOform" >Отправить</button>
                    </div>
                </div>
            </div>
            <div class="request-form__footer">
                <p>
                    Обращаем ваше внимание, оформить заявку на проведение техосмотра вы можете по данной форме в любое время. Данные автоматически будут отправлены в базу ГИБДД ЕАИСТО. Документ является легитимным для получения страхового полиса и полностью соответствует законодательству РФ.
                </p>
            </div>
        </form>
    </div>
</section>