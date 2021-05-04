<header id="header" class="header lock-padding">
    <div class="header__top">
        <div class="inner">
            <a href="<?echo get_home_url()?>" class="main-logo header__top__item">
                <img src="<?php echo get_template_directory_uri();?>/img/main-logo.svg" class="spacer" alt="">
            </a>
            <a href="#" class="burger-btn">
                <span></span>
            </a>
            <div class="header__top__item work-time">
                Работаем <span>24</span>/<span>7</span>
            </div>
<!--             <div class="header__item-city">
                <a href="#" class="header__top__item location">
                    <span class="marker"></span>
                    <span class = "city_prost"><? echo $GLOBALS["city"];?></span>
                </a>
                <?php get_template_part('template-parts/popup-gorod');?>
            </div> -->
            <div class="header__top__item contact-box">
                <span class="db desktop phone"><? echo $tel = carbon_get_theme_option("to_phone"); ?></span>
                <a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel); ?>" class="db mobil phone"><? echo $tel; ?></a>
                <a href="mailto:<? echo $mail = carbon_get_theme_option("to_mail"); ?>" class="email"><? echo $mail; ?></a>
            </div>
        </div>
    </div>
    <?php get_template_part('template-parts/popups');?>
    <?php get_template_part('template-parts/menu-button');?>
</header> 