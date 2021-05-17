<?php 

/*
Template Name: Страница с картой
Template Post Type: page
*/

get_header(); ?>

<?php get_template_part('template-parts/header-section');?>

	<main class="main">	
		<section class = "text_page_main_section">
            <div class="inner" id = "main_cabinet_regchec">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h1><?php the_title();?></h1>
                <?php the_content();?>
            <?php endwhile;?>
            <?php endif; ?>	

            <div class="block__map" id="map"></div>
			<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>

            <script>
				
                let toPuncts = [
                    {
                        name: "ООО «ТЕХАВТОСЕРВИС»",
                        adress: "Курск, пр-кт.Кулакова, д.150",
                        typeto: "M1, N1",
                        coordinat: [51.65633857231167,36.133879000000015]
                    },
                    {
                        name: "ООО «ТЕХАВТОСЕРВИС»",
                        adress: "Курск, ул.Комарова, д16",
                        typeto: "M1, N1",
                        coordinat: [51.70315907229032,36.14059849999998]
                    },
                    {
                        name: "ООО «ТЕХАВТОСЕРВИС»",
                        adress: "Курск, пр.Магистральный 18з",
                        typeto: "L, M1 M2 M3 N1 N2 N3 O1 O2 O3 O4",
                        coordinat: [51.6513825722989,36.153426499999966]
                    },
                    {
                        name: "Ип Захаров СН",
                        adress: "Курск, 3-й Краснополянский пер. 6а",
                        typeto: "M1 N1",
                        coordinat: [51.6752200722752,36.15869050000001]
                    },
                    {
                        name: "ООО АвтоПрофи",
                        adress: "Курск, пркт Клыкова, д111",
                        typeto: "M1 N1",
                        coordinat: [51.715085072264365,36.133564500000006]
                    }

                ];

                function goToForm(event, index) {
                    event.preventDefault();
                    console.log(index);
                }

                ymaps.ready(initKursk); 

				function initKursk () {
					var myMap = new ymaps.Map("map", {
                    // Координаты центра карты
                    center: [51.6865649789696,36.15569179032135],
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


            </div>
        </section>
    </main>

<?php get_footer("cooper"); ?>  