<section id = "request-section" class="request-section">
    <div class="inner">
        <h2 class="big-title">
            Заполните заявку
        </h2>
        <form id="request-form-osago" class="request-form request-form-to ">
            <div class="control-panel">
                <a href="" id = "control-panel_1" class="control-panel__item current">
                    <span class="db step">
                        Шаг 1
                    </span>
                    <span class="db step-desk">
                        Информация об автомобиле 
                    </span>
                </a>
                <a href="" id = "control-panel_2" class="control-panel__item">
                    <span class="db step">
                        Шаг 2
                    </span>
                    <span class="db step-desk">
                        Период и регион, собственник, страхователь
                    </span>
                </a>
                <a href="" id = "control-panel_3" class="control-panel__item">
                    <span class="db step">
                        Шаг 3
                    </span>
                    <span class="db step-desk">
                        Водители
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
                                <span class="caption db mandatory">Марка</span>
                                <input type="text" name="car_marka" class="inputbox car_marka" placeholder="Марка" autocomplete="off">
                                <span class="err-message">
                                    Поле заполнено не корректно.
                                </span>
                            </label>
                        </div>
                        <div class="input-panel__field-box">
                            <label>
                                <span class="caption db mandatory">Модель</span>
                                <input type="text" name="car_model" class="inputbox car_model" placeholder="Модель" autocomplete="off">
                                <span class="err-message">
                                    Поле заполнено не корректно.
                                </span>
                            </label>
                        </div>
                        <div class="input-panel__field-box">
                            <label>
                                <span class="caption db mandatory">Год выпуска</span>
                                <input type="number" name="car_godvip" class="inputbox car_godvip" min = "1890" max = "<? echo date("Y")?>" placeholder="Год выпуска" autocomplete="off">
                                <span class="err-message">
                                    Поле заполнено не корректно.
                                </span>
                            </label>
                        </div>
                        <div class="input-panel__field-box">
                            <label>
                                <span class="caption db mandatory">Мощность двигателя (л.с.)</span>
                                <input type="text" name="car_mosh" class="inputbox car_mosh" placeholder="Мощность двигателя" autocomplete="off">
                                <span class="err-message">
                                    Поле заполнено не корректно.
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

                        <div class="input-panel__field-box show_max_mesta">
                            <label>
                                <span class="caption db mandatory">Количество пассажирских мест</span>
                                <input type="text" name="doc_max_mesta" class="inputbox doc_max_mesta" placeholder="Количество пассажирских мест" autocomplete="off">
                                <span class="err-message">
                                    Пожалуйста, заполните это поле.
                                </span>
                            </label>
                        </div>

                        <div class="input-panel__field-box show_max_mass">
                            <label>
                                <span class="caption db mandatory">Максимально разрешенная масса</span>
                                <input type="text" name="doc_max_mass" class="inputbox doc_max_mass" placeholder="Максимально разрешенная масса" autocomplete="off">
                                <span class="err-message">
                                    Пожалуйста, заполните это поле.
                                </span>
                            </label>
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

                        <div class="input-panel__field-box input-panel__field-box__doc">
                            <span class="caption db mandatory">Цель использования</span>
                            <select class="selectBox" class = "doc_tsel" name="doc_tsel">
                                <option value="Личное" selected>Личное</option>
                                <option value="Дорожные и специальные ТС">Дорожные и специальные ТС</option>
                                <option value="Инкассация">Инкассация</option>
                                <option value="Перевозка опасных и легко воспламеняющихся грузов">Перевозка опасных и легко воспламеняющихся грузов</option>
                                <option value="Прокат/Краткосрочная аренда">Прокат/Краткосрочная аренда</option>
                                <option value="Прочие">Прочие</option>
                                <option value="Регулярные/по заказам пассажирские перевозки">Регулярные/по заказам пассажирские перевозки</option>
                                <option value="Скорая помощь">Скорая помощь</option>
                                <option value="Такси">Такси</option>
                                <option value="Учебная езда">Учебная езда</option>
                                <option value="Экстренные и коммунальные службы">Экстренные и коммунальные службы</option>
                            </select>
                        </div>
                        <div class = "row">
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

                            <div class="input-panel__field-box">
                                <label>
                                    <span class="caption db mandatory">Дата выдачи</span>
                                    <input type="text" name="doc_data_vid" class="inputbox doc_data_vid doc_data_v" placeholder="дд.мм.ггг" autocomplete="off">
                                    <span class="err-message">
                                        Пожалуйста, заполните это поле.
                                    </span>
                                </label>
                            </div>
                        </div>

                        <div class = "row">
                            <div class="input-panel__field-box">
                                <label>
                                    <span class="caption db mandatory">Номер диагностической карты</span>
                                    <input type="text" name="doc_dk_number" class="inputbox doc_dk_number" placeholder="1234561234543" autocomplete="off">
                                    <span class="err-message">
                                        Пожалуйста, заполните это поле.
                                    </span>
                                </label>
                            </div>

                            <div class="input-panel__field-box">
                                <label>
                                    <span class="caption db mandatory">Дата выдачи</span>
                                    <input type="text" name="doc_dk_data" class="inputbox doc_dk_data doc_data_v" placeholder="дд.мм.ггг" autocomplete="off">
                                    <span class="err-message">
                                        Пожалуйста, заполните это поле.
                                    </span>
                                </label>
                            </div>

                            <div class="consent-box flexed_cb">
                                <label class="consent">
                                    <input class = "doc_no_dk" type="checkbox">
                                    <span></span>
                                </label>
                                <span class="consent-mess">
                                    Нет диагностической карты
                                </span>
                            </div>

                        </div>
                    </div>
                    <div class="btn-box">
                        <a href="#" class="btn" id = "toStepOsago2">Далее</a>
                    </div>
                </div>
                <div id = "input-panel__step_2" class="input-panel__step">
                    <div class="row">
                        <div class="input-panel__field-box input-panel__field-box-date input-panel__dt-tb2">
                            <label>
                                <span class="caption db mandatory">Дата начала страховки</span>
                                <input type="text" id="field-date" name="str_data_n" class="inputbox str_data_n doc_data_v" placeholder="дд.мм.гггг" autocomplete="off">
                                <span class="err-message">
                                    Поле заполнено не корректно.
                                </span>
                            </label>
                        </div>
                        <div class="input-panel__field-box input-panel__city">
                            <label>
                                <span class="caption db mandatory">Город прописки собственника</span>
                                <input type="text" name="pers_city" class="inputbox pers_city city_prost_val" placeholder="Город прописки собственника автомобиля" value = "<? echo $GLOBALS["city"];?>" autocomplete="off">
                                <span class="err-message">
                                    Поле заполнено не корректно.
                                </span>
                            </label>
                        </div>



                    </div>
                    <div class="input-panel__title">
                        <h2>Собственник</h2>
                    </div>
                    <div class="row">
                        <div class="input-panel__field-box">
                            <label>
                                <span class="caption db mandatory">Фамилия</span>
                                <input type="text" name="sob_lastname" class="inputbox sob_lastname" placeholder="Фамилия" autocomplete="off">
                                <span class="err-message">
                                    Поле заполнено некорректно.
                                </span>
                            </label>
                        </div>
                        <div class="input-panel__field-box">
                            <label>
                                <span class="caption db mandatory">Имя</span>
                                <input type="text" name="sob_name" class="inputbox sob_name" placeholder="Имя" autocomplete="off">
                                <span class="err-message">
                                    Поле заполнено некорректно.
                                </span>
                            </label>
                        </div>
                        <div class="input-panel__field-box">
                            <label>
                                <span class="caption db">Отчество</span>
                                <input type="text" name="sob_patronymic" class="inputbox sob_patronymic" placeholder="Отчество" autocomplete="off">
                                <span class="err-message">
                                   Поле заполнено некорректно.
                               </span>
                           </label>
                       </div>
                       <div class="input-panel__field-box input-panel__field-box-date">
                            <label id="input-panel__data-os">
                                <span class="caption db mandatory">Дата рождения</span>
                                <input type="text" id="field-date" name="sob_data_r" class="inputbox sob_data_r doc_data_v" placeholder="дд.мм.гггг" autocomplete="off">
                                <span class="err-message">
                                    Поле заполнено не корректно.
                                </span>
                            </label>
                        </div>
                       

                    <div class="input-panel__field-box">
                        <label>
                            <span class="caption db mandatory">Серия и номер Паспорта</span>
                            <input type="text" name="sob_number_vu" class="inputbox sob_number_vu" placeholder="123456" autocomplete="off">
                            <span class="err-message">
                                Поле заполнено не корректно.
                            </span>
                        </label>
                    </div>
                    <div class="input-panel__field-box input-panel__field-box-date">
                        <label id="input-panel__data-os">
                            <span class="caption db mandatory">Дата выдачи паспорта</span>
                            <input type="text" id="field-date" name="sob_data_st" class="inputbox sob_data_st doc_data_v" placeholder="дд.мм.гггг" autocomplete="off">
                            <span class="err-message">
                                Поле заполнено не корректно.
                            </span>
                        </label>
                    </div>
                    <div class="input-panel__field-box input-panel__field-box-date">
                            <label id="input-panel__data-os">
                                <span class="caption db mandatory">Адрес места жительства (как в паспорте)</span>
                                <input type="text" id="sob_propiska" name="sob_propiska" class="inputbox sob_propiska" placeholder="Адрес" autocomplete="off">
                                <span class="err-message">
                                    Поле заполнено не корректно.
                                </span>
                            </label>
                        </div>

                    <span class = "copyVod">&darr; Скопировать данные собственника</span>
                </div>
                <div class="input-panel__title">
                    <h2>Страхователь</h2>
                </div>
                <div class="row">
                    <div class="input-panel__field-box">
                        <label>
                            <span class="caption db mandatory">Фамилия</span>
                            <input type="text" name="strah_lastname" class="inputbox strah_lastname" placeholder="Фамилия" autocomplete="off">
                            <span class="err-message">
                                Поле заполнено некорректно.
                            </span>
                        </label>
                    </div>
                    <div class="input-panel__field-box">
                        <label>
                            <span class="caption db mandatory">Имя</span>
                            <input type="text" name="strah_name" class="inputbox strah_name" placeholder="Имя" autocomplete="off">
                            <span class="err-message">
                                Поле заполнено некорректно.
                            </span>
                        </label>
                    </div>
                    <div class="input-panel__field-box">
                        <label>
                            <span class="caption db">Отчество</span>
                            <input type="text" name="strah_patronymic" class="inputbox strah_patronymic" placeholder="Отчество" autocomplete="off">
                            <span class="err-message">
                               Поле заполнено некорректно.
                           </span>
                       </label>
                   </div>
                   <div class="input-panel__field-box input-panel__field-box-date">
                    <label id="input-panel__data-os">
                        <span class="caption db mandatory">Дата рождения</span>
                        <input type="text" id="field-date" name="strah_data_r" class="inputbox strah_data_r doc_data_v" placeholder="дд.мм.гггг" autocomplete="off">
                        <span class="err-message">
                            Поле заполнено не корректно.
                        </span>
                    </label>
                </div>
                <div class="input-panel__field-box">
                    <label>
                        <span class="caption db mandatory">Серия и номер Паспорта</span>
                        <input type="text" name="strah_number_vu" class="inputbox strah_number_vu" placeholder="123456" autocomplete="off">
                        <span class="err-message">
                            Поле заполнено не корректно.
                        </span>
                    </label>
                </div>
                <div class="input-panel__field-box input-panel__field-box-date">
                    <label id="input-panel__data-os">
                        <span class="caption db mandatory">Выдачи паспорта</span>
                        <input type="text" id="field-date" name="strah_data_st" class="inputbox strah_data_st doc_data_v" placeholder="дд.мм.гггг" autocomplete="off">
                        <span class="err-message">
                            Поле заполнено не корректно.
                        </span>
                    </label>
                </div>
            </div>
            <div class="btn-box">
                <a href="#" class="btn" id = "bacStep1">Назад</a>
                <a href="#" class="btn" id = "toStepOsago3">Далее</a>
            </div>
        </div>
        <div id = "input-panel__step_3" class="input-panel__step ">
            
            <div class="row"  id = "voditel_1">
                <div class="input-panel__title">
                    <h2>Водитель 1</h2>
                </div>

                <div class="input-panel__field-box">
                    <label>
                        <span class="caption db mandatory">Фамилия</span>
                        <input type="text" name="lastname_v1" class="inputbox lastname_v1" placeholder="Фамилия" autocomplete="off">
                        <span class="err-message">
                            Поле заполнено некорректно.
                        </span>
                    </label>
                </div>
                <div class="input-panel__field-box">
                    <label>
                        <span class="caption db mandatory">Имя</span>
                        <input type="text" name="name_v1" class="inputbox name_v1" placeholder="Имя" autocomplete="off">
                        <span class="err-message">
                            Поле заполнено некорректно.
                        </span>
                    </label>
                </div>
                <div class="input-panel__field-box">
                    <label>
                        <span class="caption db">*Отчество</span>
                        <input type="text" name="patronymic_v1" class="inputbox patronymic_v1" placeholder="Отчество" autocomplete="off">
                        <span class="err-message">
                           Поле заполнено некорректно.
                       </span>
                   </label>
               </div>
        
               <div class="input-panel__field-box input-panel__field-box-date">
                    <label id="input-panel__data-os">
                        <span class="caption db mandatory">Дата рождения</span>
                        <input type="text" id="field-date" name="data_r_v1" class="inputbox data_r_v1 doc_data_v" placeholder="дд.мм.гггг" autocomplete="off">
                        <span class="err-message">
                            Поле заполнено не корректно.
                        </span>
                    </label>
                </div>

                <div class="input-panel__field-box">
                    <label>
                        <span class="caption db mandatory">Серия и номер ВУ</span>
                        <input type="text" name="number_vu_v1" class="inputbox number_vu_v1" placeholder="123456" autocomplete="off">
                        <span class="err-message">
                            Поле заполнено не корректно.
                        </span>
                    </label>
                </div>

                <div class="input-panel__field-box input-panel__field-box-date">
                    <label id="input-panel__data-os">
                        <span class="caption db mandatory">Дата начала стажа</span>
                        <input type="text" id="field-date" name="data_st_v1" class="inputbox doc_data_v data_st_v1" placeholder="дд.мм.гггг" autocomplete="off">
                        <span class="err-message">
                            Поле заполнено не корректно.
                        </span>
                    </label>
                </div>
                <span class = "copyVod_v1">&uarr; Скопировать данные собственника</span>
                <span class = "addVoditel" data-voditelindex = "2">+ Добавить водителя</span>  
        </div>
        

        <div class="row"  id = "voditel_2">
            <div class="input-panel__title">
                <h2>Водитель 2</h2>
            </div>

            <div class="input-panel__field-box">
                <label>
                    <span class="caption db mandatory">Фамилия</span>
                    <input type="text" name="lastname_v2" class="inputbox lastname_v2" placeholder="Фамилия" autocomplete="off">
                    <span class="err-message">
                        Поле заполнено некорректно.
                    </span>
                </label>
            </div>
            <div class="input-panel__field-box">
                <label>
                    <span class="caption db mandatory">Имя</span>
                    <input type="text" name="name_v2" class="inputbox name_v2" placeholder="Имя" autocomplete="off">
                    <span class="err-message">
                        Поле заполнено некорректно.
                    </span>
                </label>
            </div>
            <div class="input-panel__field-box">
                <label>
                    <span class="caption db">*Отчество</span>
                    <input type="text" name="patronymic_v2" class="inputbox patronymic_v2" placeholder="Отчество" autocomplete="off">
                    <span class="err-message">
                       Поле заполнено некорректно.
                   </span>
               </label>
           </div>
           <div class="input-panel__field-box input-panel__field-box-date">
            <label id="input-panel__data-os">
                <span class="caption db mandatory">Дата рождения</span>
                <input type="text" id="field-date" name="data_r_v2" class="inputbox data_r_v2 doc_data_v" placeholder="дд.мм.гггг" autocomplete="off">
                <span class="err-message">
                    Поле заполнено не корректно.
                </span>
            </label>
        </div>
        <div class="input-panel__field-box">
            <label>
                <span class="caption db mandatory">Серия и номер ВУ</span>
                <input type="text" name="number_vu_v2" class="inputbox number_vu_v2" placeholder="123456" autocomplete="off">
                <span class="err-message">
                    Поле заполнено не корректно.
                </span>
            </label>
        </div>
        <div class="input-panel__field-box input-panel__field-box-date">
            <label id="input-panel__data-os">
                <span class="caption db mandatory">Дата начала стажа</span>
                <input type="text" id="field-date" name="data_st_v2" class="inputbox data_st_v2 doc_data_v" placeholder="дд.мм.гггг" autocomplete="off">
                <span class="err-message">
                    Поле заполнено не корректно.
                </span>
            </label>
        </div>
        <span class = "copyVod_v2">&uarr; Скопировать данные собственника</span>
        <span class = "addVoditel" data-voditelindex = "3">+ Добавить водителя</span>
    </div>


    <div class="row" id = "voditel_3" >
        <div class="input-panel__title">
            <h2>Водитель 3</h2>
        </div>

        <div class="input-panel__field-box">
            <label>
                <span class="caption db mandatory">Фамилия</span>
                <input type="text" name="lastname_v3" class="inputbox lastname_v3" placeholder="Фамилия" autocomplete="off">
                <span class="err-message">
                    Поле заполнено некорректно.
                </span>
            </label>
        </div>
        <div class="input-panel__field-box">
            <label>
                <span class="caption db mandatory">Имя</span>
                <input type="text" name="name_v3" class="inputbox name_v3" placeholder="Имя" autocomplete="off">
                <span class="err-message">
                    Поле заполнено некорректно.
                </span>
            </label>
        </div>
        <div class="input-panel__field-box">
            <label>
                <span class="caption db">*Отчество</span>
                <input type="text" name="patronymic_v3" class="inputbox patronymic_v3" placeholder="Отчество" autocomplete="off">
                <span class="err-message">
                   Поле заполнено некорректно.
               </span>
           </label>
       </div>
       <div class="input-panel__field-box input-panel__field-box-date">
        <label id="input-panel__data-os">
            <span class="caption db mandatory">Дата рождения</span>
            <input type="text" id="field-date" name="data_r_v3" class="inputbox data_r_v3 doc_data_v" placeholder="дд.мм.гггг" autocomplete="off">
            <span class="err-message">
                Поле заполнено не корректно.
            </span>
        </label>
    </div>
    <div class="input-panel__field-box">
        <label>
            <span class="caption db mandatory">Серия и номер ВУ</span>
            <input type="text" name="number_vu_v3" class="inputbox number_vu_v3" placeholder="123456" autocomplete="off">
            <span class="err-message">
                Поле заполнено не корректно.
            </span>
        </label>
    </div>
    <div class="input-panel__field-box input-panel__field-box-date">
        <label id="input-panel__data-os">
            <span class="caption db mandatory">Дата начала стажа</span>
            <input type="text" id="field-date" name="data_st_v3" class="inputbox data_st_v3 doc_data_v" placeholder="дд.мм.гггг" autocomplete="off">
            <span class="err-message">
                Поле заполнено не корректно.
            </span>
        </label>
    </div>

    <span class = "copyVod_v3">&uarr; Скопировать данные собственника</span>

</div>
<div class="btn-box">
    <a href="#" class="btn" id = "bacStep2">Назад</a>
    <a href="#" class="btn" id = "toStepOsago4">Далее</a>
</div>
</div>
<div id = "input-panel__step_4" class="input-panel__step ">
    <div class="row">
        <div class="input-panel__field-box">
            <label>
                <span class="caption db mandatory">Телефон</span>
                <input type="tel" id="pers_tel" name="pers_tel" class="inputbox pers_tel" placeholder="+7 (999) 999-99-99" autocomplete="off">
                <span class="err-message">
                    Поле заполнено не корректно.
                </span>
            </label>
        </div>
        <div class="input-panel__field-box">
            <label>
                <span class="caption db mandatory">E-mail</span>
                <input type="email" name="pers_mail" class="inputbox pers_mail" placeholder="введите e-mail" autocomplete="off">
                <span class="err-message">
                    Поле заполнено не корректно.
                </span>
            </label>
        </div>
        <div class="input-panel__field-box">
            <label>
                <span class="caption db mandatory">Город</span>
                <input type="text" name="pers_city" class="inputbox pers_city city_prost_val" placeholder="Введите город" value = "<? echo $GLOBALS["city"];?>" autocomplete="off">
                <span class="err-message">
                    Поле заполнено не корректно.
                </span>
            </label>
        </div>
    </div>
    <label>
        <span class="caption db">Ваш комментарий к заказу</span>
        <textarea name="pers_message" class = "pers_message textarea" class="textarea"></textarea>
        <span class="err-message">
            Поле заполнено не корректно.
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
        <button type="submit" class="btn" id = "sendOSAGOform" >Отправить</button>
    </div>
</div>
</div>
<div class="request-form__footer">
    <p>
      Обращаем Ваше внимание, оформить страховой полис ОСАГО Вы можете по данной форме в любое время в режиме Онлайн. <br>
      Гарантируем подлинность страхового полиса и его наличие в базе РСА и страховых компаниях.
    </p>
</div>
</form>
</div>
</section>

