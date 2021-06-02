<?php 

/*
Template Name: Страница с картой
Template Post Type: page
*/

get_header(); ?>

<?php get_template_part('template-parts/header-section');?>

	<main class="main main-map-page">	
		<section class = "text_page_main_section">
            <div class="inner" id = "main_cabinet_regchec">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h1> Пункты прохождения техосмотра в
                <?
                    if (isset($_REQUEST["city"]))
                    {
                        $city = $_REQUEST["city"];
                        if ($city === "Курск") 
                            echo " Курске";
                        else 
                            echo " Воронеже";
                    } else { 
                        $city = "Курск";
                        echo " Курске";
                    }
                ?>
            </h1>
                <?php the_content();?>
            <?php endwhile;?>
            <?php endif; ?>	

                <div class="block__map" id="map"></div>

            </div>
        </section>

        <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>

        <?php get_template_part('template-parts/request-section');?>

        <section class = "msg_section">
            <div class="inner">
                <?
                    if ($city === "Курск") 
                        {
                        ?>
                            <h2 class = "big-title textCenter">Записывайтесь на сайте и проходите техосмотр всего за 700 рублей!</h2>
                            
                        <?
                        }
                    else 
                            {
                        ?>
                            <h2 class = "big-title textCenter">Записывайтесь на сайте и проходите техосмотр всего за 450 рублей</h2>
                        <?
                            }
                        ?>
            </div>
        </section>

        <?php get_template_part('template-parts/certificates-section');?>

        <script>
				let qCity = "<?echo $city;?>";
                let toPunctsKursk = [
                    {
                        name: "ООО «ТЕХАВТОСЕРВИС»",
                        adress: "Курск, пр-кт.Кулакова, д.150",
                        typeto: "M1, N1",
                        fullname: "ООО «ТЕХАВТОСЕРВИС» Курск, пр-кт.Кулакова, д.150 - M1 N1",
                        coordinat: [51.65633857231167,36.133879000000015]
                    },
                    {
                        name: "ООО «ТЕХАВТОСЕРВИС»",
                        adress: "Курск, ул.Комарова, д16",
                        typeto: "M1, N1",
                        fullname: "ООО «ТЕХСЕРВИЗАВТО» Курск, ул.Комарова, д16 - М1 N1",
                        coordinat: [51.70315907229032,36.14059849999998]
                    },
                    {
                        name: "ООО «ТЕХАВТОСЕРВИС»",
                        adress: "Курск, пр.Магистральный 18з",
                        typeto: "L, M1 M2 M3 N1 N2 N3 O1 O2 O3 O4",
                        fullname: "ООО «ТЕХСЕРВИЗАВТО» Курск, пр.Магистральный 18з - L, M1 M2 M3 N1 N2 N3 O1 O2 O3 O4",
                        coordinat: [51.6513825722989,36.153426499999966]
                    },
                    {
                        name: "Ип Захаров СН",
                        adress: "Курск, 3-й Краснополянский пер. 6а",
                        typeto: "M1 N1",
                        fullname: "Ип Захаров СН Курск, 3-й Краснополянский пер. 6а - M1 N1",
                        coordinat: [51.6752200722752,36.15869050000001]
                    },
                    {
                        name: "ООО АвтоПрофи",
                        adress: "Курск, пркт Клыкова, д111",
                        typeto: "M1 N1",
                        fullname: "ООО АвтоПрофи Курск, пркт Клыкова, д111 - L, M1, N1",
                        coordinat: [51.715085072264365,36.133564500000006]
                    }

                ];

                let toPunctsVrn = [
                    {
                        name: "ООО АвтоПрофи",
                        adress: "Воронеж, пр-кт Патриотов 45б - М1",
                        typeto: "M1",
                        fullname: "ООО АвтоПрофи Воронеж, пр-кт Патриотов 45б - М1",
                        coordinat: [51.64571607231264,39.110266999999894]
                    }];

                toPuncts = toPunctsKursk;

                if (qCity == "Курск") 
                    toPuncts = toPunctsKursk;
                else 
                    toPuncts = toPunctsVrn;

                function goToForm(event, index) {
                    event.preventDefault();
                    console.log(index);
                    to_form.city = qCity;
                    to_form.kategory = "Категория M1 - не более 8 мест для сидения";
                    to_form.punct = toPuncts[index].fullname;
                    
                    window.location.hash="request-section";
                }

                ymaps.ready(initKursk); 

				function initKursk () {

                    let centerMap = [51.6865649789696,36.15569179032135]; 

                    if (qCity == "Воронеж")
                        centerMap = [51.64571607231264,39.110266999999894]; 

					var myMap = new ymaps.Map("map", {
                    // Координаты центра карты
                    center: centerMap,
                    // Масштаб карты
                    zoom: 11,
                    // Выключаем все управление картой
                    controls: ['zoomControl']
                }); 

			for (let i = 0; i<toPuncts.length; i++)
            {
                
                pm1 = new ymaps.Placemark(toPuncts[i].coordinat,
                    {
    				    balloonContent: '<div class="ballWrapper">'+
                        '<h2>'+toPuncts[i].name+'</h2>'+
                        '<strong>Адрес: </strong>'+toPuncts[i].adress+'<br/>'+
                        '<strong>Категории ТС: </strong>'+toPuncts[i].typeto+'<br/><br/>'+
                        '<a onclick = "goToForm(event, '+i+')" class = "btn" href = "#">Записаться</a>'+
                        '</div>'
                    },
                    {
    				    iconLayout: 'default#image',
                        iconImageHref: '<?php bloginfo("template_url"); ?>/img/map-marker.svg',  
                        iconImageSize: [40, 51],
                        iconImageOffset: [-20, -25]
                    }
                );

                
                myMap.geoObjects.add(pm1);
            }
                
                // Отключим zoom
                myMap.behaviors.disable('scrollZoom');

                }
        </script>
    </main>

<?php get_footer("cooper"); ?>  