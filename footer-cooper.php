
 </div>
    <footer id="footer" class="footer-cooper">
        <div class="inner">
            <a href="#" class="footer-logo footer__item">
                <img src="<?php echo get_template_directory_uri();?>/img/footer-logo.svg" class="spacer" alt="">
            </a>
            <nav class="footer-menu footer__item">
                <ul>
                    <li><a href="<?echo get_home_url()?>">Техосмотр</a></li>
                    <li><a href="<?echo get_home_url()?>/#services-section">Проверка карты</a></li>
                    <li><a href="<?echo get_the_permalink(347); ?>">ОСАГО</a></li>
                    <li><a href="<?echo get_the_permalink(350); ?>">Сотрудничество</a></li>
                    <li><a href="<?echo get_category_link(4);?>">Отзывы</a></li>
                </ul>
            </nav>
            <div class="footer__item work-time">
                Работаем <span>24</span>/<span>7</span>
                <ul class="footer__item-list">
                    <li><a href="<?php echo get_permalink(361);?>">Контакты и реквизиты компании</a></li>
                    <li><a href="<?php echo get_permalink(365);?>">Описание деятельности компании</a></li>
                    <li><a href="<?php echo get_permalink(369);?>">Способы оплаты</a></li>
                </ul>
            </div>
            <div class="footer__item contact-box">
                <span class="db desktop phone"><? echo $tel = carbon_get_theme_option("to_phone"); ?></span>
                <a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel); ?>" class="db mobil phone"><? echo $tel; ?></a>
                <a href="mailto:<? echo $mail = carbon_get_theme_option("to_mail"); ?>" class="email"><? echo $mail; ?></a>
            </div>
        </div>
    </footer>

    <script src="js/html5.js"></script>
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/jquery.selectBox.js"></script>
    <script src="js/jquery.maskedinput.js"></script>
    <script src="js/script.js"></script>

    <?php wp_footer(); ?>

</body>

</html>
