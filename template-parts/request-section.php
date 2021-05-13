<section id = "request-section" class="request-section">
    <div class="inner">
        <h2 class="big-title">
            {{header_text}}
        </h2>
        <form class="request-form request-new-form request-form-to ">
            <div class="control-panel">
                <a href="" id = "control-panel_1" class="control-panel__item current">
                    <span class="db step">
                        Заявка на Техосмотр
                    </span>
                    <span class="db step-desk">
                        Заполните информацию и выберите удобную дату и время прохождения техосмотра
                    </span>
                </a>
                
    
            </div>
            <div class="input-panel">
                <div id = "input-panel__step_1" class="input-panel__step active">
                    <div class="row">
                        <div class="input-panel__field-box">
                            <label :class = "{error:fioNoCheced}">
                                <span class="caption db mandatory">ФИО</span>
                                <input v-model = "fio"  type="text" name="fio" class="inputbox lastname" placeholder="ФИО*" autocomplete="off">
                                <span v-show = "fioNoCheced" class="err-message-vue">
                                    Поле заполнено некорректно.
                                </span>
                            </label>
                        </div>
                        <div class="input-panel__field-box">
                            <label :class = "{error:phoneNoCheced}">
                                <span class="caption db mandatory">Телефон</span>
                                <input v-phone  v-model = "phone"  type="tel" name="phone" class="inputbox phone" placeholder="7(___)___-____" autocomplete="off">
                                <span v-show = "phoneNoCheced" class="err-message-vue">
                                    Поле заполнено некорректно.
                                </span>
                            </label>
                        </div>

                        <div class="input-panel__field-box">
                            <label :class = "{error:mailNoCheced}">
                                <span class="caption db mandatory">E-mail</span>
                                <input v-model = "mail" type="email" name="mail" class="inputbox mail" placeholder="E-mail" autocomplete="off">
                                <span v-show = "mailNoCheced" class="err-message-vue">
                                    Поле заполнено некорректно.
                                </span>
                            </label>
                        </div>

                        <div class="input-panel__field-box">
                            <label :class = "{error:dataNoCheced}">
                                <span class="caption db mandatory">Дата прохождения (кроме Вс.)</span>
                            
                                <input v-model = "data" type="date" name="prdata" class="inputbox prdata" placeholder="дд.мм.гггг" autocomplete="off">
                                <span v-show = "dataNoCheced" class="err-message-vue">
                                     Выберите дату прохождения ТО.
                                </span>
                            </label>
                        </div>
                        <div class="input-panel__field-box">
                            <label :class = "{error:timeNoCheced}">
                                <span class="caption db mandatory">Выберите время (с 9:00 до 17:30)</span>
                                
                                <input v-model ="time" type="time" min = "09:00" max = "17:30" name="prtime" class="inputbox prtime" placeholder="чч.мм" autocomplete="off">
                                <span v-show = "timeNoCheced" class="err-message-vue">
                                    Выберите время прохождения ТО.
                                </span>
                            </label>
                        </div>

                        <div class="input-panel__field-box" :class = "{error:cityNoCheced}">
                            <span class="caption db mandatory">Выберитие город</span>
                            <select  @change.prevent = "citySelect" v-model = "city" class="selectBox" placeholder = "Выберите город" name="city">
                                <option value="" selected disabled>Выберите город</option>
                                <option v-for = "(item, index, key) in feildInfo" :value="index">{{index}}</option>
                            </select>

                            <span v-show = "cityNoCheced" class="err-message-vue">
                                Выберите город.
                            </span>
                        </div>

                        <div class="input-panel__field-box" :class = "{error:kategoryNoCheced}">
                            <span class="caption db mandatory">Выберите категорию ТС</span>
                            <select @change.prevent = "setToPrice" v-model = "kategory" class="selectBox" :disabled = 'city == ""' name="category_ts">
                                <option value="" selected disabled>Выберите Категорию ТС</option>
                                <option v-for = "(item, key, index) in categoryTsList" :value="item">{{item}}</option>

                            </select>

                            <span v-show = "kategoryNoCheced" class="err-message-vue">
                                Выберите категорию ТС.
                            </span>
                        </div>

                        <div class="input-panel__field-box" :class = "{error:punctNoCheced}">
                            <span class="caption db mandatory">Выберите пункт ТО</span>
                            <select v-model = "punct" :disabled = 'kategory == ""' class="selectBox" name="punkt_to">
                                <option value="" selected disabled>Выберите пункт ТО</option>
                                <option v-for = "(item, key, index) in punktToList" :value="item">{{item}}</option>
                            </select>

                            <span v-show = "punctNoCheced" class="err-message-vue">
                                Выберите пункт ТО.
                            </span>
                        </div>

                        <div class="input-panel__field-box" >
                            <label>
                                <span class="caption db">Цена прохождения ТО:</span>
                                <input v-model = "price" readonly type="text" name="price" class="inputbox pricefield" placeholder="" autocomplete="off">    
                            </label>
                        </div>

                    </div>
                    <div class="btn-box">
                        <a @click.prevent = "sendForm" href="#" class="btn" id = "toSendNewForm">Отправить</a><img class = "spinerForm" v-show = "spinerStart" src = "<?echo get_bloginfo("template_url");?>/img/load-form.svg" />
                    </div>
                </div>
            </div>
            <div class="request-form__footer">
                <p>
                    Обращаем ваше внимание, оформить предварительную запись на тиехосмотр вы можете по данной форме в любое время.
                </p>
            </div>
        </form>
    </div>
</section>