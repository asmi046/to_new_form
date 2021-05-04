<?php

if (empty($_COOKIE["city"])) {
	$objGeo = json_decode(file_get_contents("http://api.sypexgeo.net/c2300/json/".$_SERVER['REMOTE_ADDR']));
	setcookie("city", $objGeo->city->name_ru, time() + 518400);
	$GLOBALS["city"] = $objGeo->city->name_ru;
} else {
	$GLOBALS["city"] = $_COOKIE["city"];
}

define("COMPANY_NAME", "ТО и ОСАГО");
define("MAIL_RESEND", "<noreply@tehosago24.ru>");


define('TELEGRAM_TOKEN_TO', '1277609895:AAG_TP96PFSd3Lp04dleM6I5RT8VjXDySFQ');

define('TELEGRAM_TOKEN_OSAGO', '1339936644:AAFoJC0GEAFdJSxmPKTA8Ei6YMgjDg8KgD0');

function message_to_telegram($text, $chat)
{
	$arr_chat = carbon_get_theme_option('to_telegramm_id');
	if($arr_chat) {
		$arr_chat = explode(",",$arr_chat);
	    $ch = curl_init();
		
		$chatSend = TELEGRAM_TOKEN_TO;
		if ($chat === "TO") $chatSend = TELEGRAM_TOKEN_TO;
		if ($chat === "OSAGO") $chatSend = TELEGRAM_TOKEN_OSAGO;
		
		for ($i = 0; $i<count($arr_chat); $i++) {
		    curl_setopt_array(
		        $ch,
		        array(
		            CURLOPT_URL => 'https://api.telegram.org/bot' . $chatSend . '/sendMessage',
		            CURLOPT_POST => TRUE,
		            CURLOPT_RETURNTRANSFER => TRUE,
		            CURLOPT_TIMEOUT => 10,
		            CURLOPT_POSTFIELDS => array(
		                'chat_id' => trim($arr_chat[$i]),
		                'text' => $text,
		            ),
		        )
		    );
		    $output = curl_exec($ch);
		}
	}
	
}

//----Подключене carbon fields
//----Инструкции по подключению полей см. в комментариях themes-fields.php
include "carbon-fields/carbon-fields-plugin.php";

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' ); 
function crb_attach_theme_options() {
	require_once __DIR__ . "/themes-fields.php";
}

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
	require_once( 'carbon-fields/vendor/autoload.php' );
	\Carbon_Fields\Carbon_Fields::boot();
}

//-----Блок описания вывода меню
// 1. Осмысленные названия для алиаса и для описания на русском.
// если это меню в подвали пишем - Меню в подвале 
// если в шапке то пишем - Меню в шапке 
// если 2 меню в шапке пишем  - Меню в шапке (верхняя часть)

register_nav_menus( array(
	'header_menu' => 'Главное меню'
) );

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 185, 185 ); 

add_post_type_support( 'page', 'excerpt' );

// Подключение стилей и nonce для Ajax в админку 
add_action('admin_head', 'my_assets_admin');
function my_assets_admin(){
	wp_enqueue_style("style-adm",get_template_directory_uri()."/style-admin.css");
	
	wp_localize_script( 'jquery', 'allAjax', array(
			'nonce'   => wp_create_nonce( 'NEHERTUTLAZIT' )
		) );
}

// Подключение стилей и nonce для Ajax и скриптов во фронтенд 

define("STYLEVERSION", "1.0.1");
define("SCRIPTVERSION", "1.0.1");

add_action( 'wp_enqueue_scripts', 'my_assets' );
	function my_assets() {

		// Подключение стилей 

		wp_enqueue_style("style-lightbox", get_template_directory_uri()."/css/lightbox.min.js", array(), STYLEVERSION, 'all'); //Лайтбокс (стили)
		wp_enqueue_style("style-slik", get_template_directory_uri()."/css/slick.css", array(), STYLEVERSION, 'all'); //Слайдер (стили)

		wp_enqueue_style("main-style", get_stylesheet_uri(), array(), STYLEVERSION, 'all' ); // Подключение основных стилей в самом конце

		// Подключение скриптов
		
		wp_enqueue_script( 'jquery');

		wp_enqueue_script( 'amodal', get_template_directory_uri().'/js/jquery.arcticmodal-0.3.min.js', array(), SCRIPTVERSION , true); //Модальные окна
		wp_enqueue_script( 'mask', get_template_directory_uri().'/js/jquery.inputmask.bundle.js', array(), SCRIPTVERSION , true); //маска для инпутов
		wp_enqueue_script( 'lightbox', get_template_directory_uri().'/js/lightbox.min.js', array(), SCRIPTVERSION , true); //Лайтбокс
		wp_enqueue_script( 'slick', get_template_directory_uri().'/js/slick.min.js', array(), SCRIPTVERSION , true); //Слайдер

		wp_enqueue_script( 'main', get_template_directory_uri().'/js/main.js', array(), SCRIPTVERSION , true); // Подключение основного скрипта в самом конце
		
		
		wp_localize_script( 'main', 'allAjax', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'nonce'   => wp_create_nonce( 'NEHERTUTLAZIT' )
		) );
	}

	add_action( 'wp_ajax_sendTO', 'sendTO' );
	add_action( 'wp_ajax_nopriv_sendTO', 'sendTO' );

	function sendTO() {
		if ( empty( $_REQUEST['nonce'] ) ) {
			wp_die( '0' );
		}
		
		if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			$headers = array(
				'From: '.COMPANY_NAME.' '.MAIL_RESEND,
				'content-type: text/html',
			);

			parse_str($_REQUEST["alldata"], $param);

			$message_telegram = 'Заказ на оформление ТО c сайта ' . $_SERVER['SERVER_NAME'] 
					."\nТелефон: ".$param["pers_tel"]
					."\nФамилия: ".$param["lastname"]
					."\nИмя: ".$param["name"]
					."\nОтчество: ".$param["patronymic"]
					."\nПочта: ".$param["pers_mail"]
					."\nМарка авто: ".$param["doc_marka"]
					."\nМодель авто: ".$param["doc_model"]
					."\nГод выпуска: ".$param["doc_godvip"]
					."\nМарка шин: ".$param["shini"]
					."\nПробег: ".$param["probeg"]
					."\nКатегория ТС: ".$param["doc_cat_ts"]
					."\nГосномер: ".$param["gosnomer"]
					."\nVIN: ".$param["doc_vin"]
					."\nНомер кузова: ".$param["doc_kuzov"]
					."\nНомер рамы: ".$param["doc_hassi"]
					."\nТип документа: ".$param["type_doc"]
					."\nНомер документа: ".$param["doc_seria"]." ".$param["doc_number"]
					."\nДата выдачи документа: ".$param["doc_data_v"]
					."\nКем выдан документ: ".$param["doc_org"]
					."\nМаксимальная масса: ".$param["doc_r_massa"]
					."\nМасса без нагрузки: ".$param["doc_m_massa"]
					."\nТип ТС: ".$param["type_ts"]
					."\nТип топлива: ".$param["toplivo"]
					."\nГород: ".$param["pers_city"]
					."\nКомментарий: ".$param["pers_message"];
			message_to_telegram($message_telegram, "ТО");
			add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
		
		if (wp_mail(carbon_get_theme_option('to_main_sendmail'), 'Заказ на оформление ТО', 
					"<strong>Телефон:</strong> ".$param["pers_tel"]
					."<br/><strong>Фамилия:</strong> ".$param["lastname"]
					."<br/><strong>Имя:</strong> ".$param["name"]
					."<br/><strong>Отчество:</strong> ".$param["patronymic"]
					."<br/><strong>Почта:</strong> ".$param["pers_mail"]
					."<br/><strong>Марка авто:</strong> ".$param["doc_marka"]
					."<br/><strong>Модель авто:</strong> ".$param["doc_model"]
					."<br/><strong>Год выпуска:</strong> ".$param["doc_godvip"]
					."<br/><strong>Марка шин:</strong> ".$param["shini"]
					."<br/><strong>Пробег:</strong> ".$param["probeg"]
					."<br/><strong>Категория ТС:</strong> ".$param["doc_cat_ts"]
					."<br/><strong>Госномер:</strong> ".$param["gosnomer"]
					."<br/><strong>VIN:</strong> ".$param["doc_vin"]
					."<br/><strong>Номер кузова:</strong> ".$param["doc_kuzov"]
					."<br/><strong>Номер рамы:</strong> ".$param["doc_hassi"]
					."<br/><strong>Тип документа:</strong> ".$param["type_doc"]
					."<br/><strong>Номер документа:</strong> ".$param["doc_seria"]." ".$param["doc_number"]
					."<br/><strong>Дата выдачи документа:</strong> ".$param["doc_data_v"]
					."<br/><strong>Кем выдан документ:</strong> ".$param["doc_org"]
					."<br/><strong>Максимальная масса:</strong> ".$param["doc_r_massa"]
					."<br/><strong>Масса без нагрузки:</strong> ".$param["doc_m_massa"]
					."<br/><strong>Тип ТС:</strong> ".$param["type_ts"]
					."<br/><strong>Тип топлива:</strong> ".$param["toplivo"]
					."<br/><strong>Город:</strong> ".$param["pers_city"]
					."<br/><strong>Комментарий:</strong> ".$param["pers_message"]
					
					, $headers))
				wp_die($message_telegram);
			else wp_die( 'Error!', '', 403 );;


		} else {
			wp_die( 'НО-НО-НО!', '', 403 );
		}
	}
	

	add_action( 'wp_ajax_sendOSAGO', 'sendOSAGO' );
	add_action( 'wp_ajax_nopriv_sendOSAGO', 'sendOSAGO' );

	function sendOSAGO() {
		if ( empty( $_REQUEST['nonce'] ) ) {
			wp_die( '0' );
		}
		
		if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			$headers = array(
				'From: '.COMPANY_NAME.' '.MAIL_RESEND,
				'content-type: text/html',
			);

			parse_str($_REQUEST["alldata"], $param);

			
			$lnk = get_the_permalink(373)."?".http_build_query(
				array(
				"email" => $param["pers_mail"],
				"marka" => $param["car_marka"],
				"model" => $param["car_model"],
				"gosnomer" => $param["gosnomer"],
				"categoria" => $param["doc_cat_ts"],
				"power" => $param["car_mosh"]
				));

			$message_telegram = 'Заказ на оформление ОСАГО c сайта ' . $_SERVER['SERVER_NAME'] 
					."\nE-mail: ".$param["pers_mail"]
					."\nГород: ".$param["pers_city"]
					."\nМарка авто: ".$param["car_marka"]
					."\nМодель авто: ".$param["car_model"]
					."\nГод выпуска: ".$param["car_godvip"]
					."\nМощность двигателя: ".$param["car_mosh"]
					."\nГосномер: ".$param["gosnomer"]
					."\nКатегория ТС: ".$param["doc_cat_ts"]
					
					."\nМаксимально разрешенная масса: ".$param["doc_max_mass"]
					."\nКоличество пассажирских мест: ".$param["doc_max_mesta"]
					."\nИдентификационный номер VIN: ".$param["doc_vin"]
					."\nЦель использования: ".$param["doc_tsel"]
					."\nДокумент: ".$param["type_doc"]
					."\nСерия: ".$param["doc_seria"]
					."\nНомер: ".$param["doc_number"]
					."\nДата выдачи: ".$param["doc_data_vid"]

					."\nНомер диагностической карты: ".$param["doc_dk_number"]
					."\nДата выдачи диагностической карты: ".$param["doc_dk_data"]

					."\nДата начала страховки: ".$param["str_data_n"]
					."\nГород прописки собственника: ".$param["pers_city"]
					."\nФамилия собственника: ".$param["sob_lastname"]
					."\nИмя собственника: ".$param["sob_name"]
					."\nОтчество собственника: ".$param["sob_patronymic"]
					."\nДата рождения собственника: ".$param["sob_data_r"]
					."\nПаспорт собственника: ".$param["sob_number_vu"]
					."\nДата выдачи паспорта: ".$param["sob_data_st"]
					."\nАдрес прописки: ".$param["sob_propiska"]

					."\nФамилия страхователя: ".$param["strah_lastname"]
					."\nИмя страхователя: ".$param["strah_name"]
					."\nОтчество страхователя: ".$param["strah_patronymic"]
					."\nДата рождения страхователя: ".$param["strah_data_r"]
					."\nПаспорт собственника: ".$param["strah_number_vu"]
					."\nДата выдачи паспорта: ".$param["strah_data_st"]

					."\nФамилия водителя #1: ".$param["lastname_v1"]
					."\nИмя водителя #1: ".$param["name_v1"]
					."\nОтчество водителя #1: ".$param["patronymic_v1"]
					."\nДата рождения водителя #1: ".$param["data_r_v1"]
					."\nВодительское удостоверение водителя #1: ".$param["number_vu_v1"]
					."\nГод начала водителя #1: ".$param["data_st_v1"]

					."\nФамилия водителя #2: ".$param["lastname_v2"]
					."\nИмя водителя #2: ".$param["name_v2"]
					."\nОтчество водителя #2: ".$param["patronymic_v2"]
					."\nДата рождения водителя #2: ".$param["data_r_v2"]
					."\nВодительское удостоверение водителя #2: ".$param["number_vu_v2"]
					."\nГод начала водителя #2: ".$param["data_st_v2"]

					."\nФамилия водителя #3: ".$param["lastname_v3"]
					."\nИмя водителя #3: ".$param["name_v3"]
					."\nОтчество водителя #3: ".$param["patronymic_v3"]
					."\nДата рождения водителя #3: ".$param["data_r_v3"]
					."\nВодительское удостоверение водителя #3: ".$param["number_vu_v3"]
					."\nГод начала водителя #3: ".$param["data_st_v3"]
					
					."\nТелефон: ".$param["pers_tel"]
					
					."\nСообщение: ".$param["pers_message"]
					."\n".$lnk;

			message_to_telegram($message_telegram, "OSAGO");
			add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
		
		if (wp_mail(carbon_get_theme_option('to_main_sendmail'), 'Заказ на оформление ОСАГО', 
					'<h2>Заказ на оформление ОСАГО c сайта ' . $_SERVER['SERVER_NAME']."</h2>" 
					."<br/><strong>Телефон:</strong> ".$param["pers_tel"]
					."<br/><strong>E-mail:</strong> ".$param["pers_mail"]
					."<br/><strong>Марка авто:</strong> ".$param["car_marka"]
					."<br/><strong>Модель авто:</strong> ".$param["car_model"]
					."<br/><strong>Год выпуска:</strong> ".$param["car_godvip"]
					."<br/><strong>Мощность двигателя:</strong> ".$param["car_mosh"]
					."<br/><strong>Госномер:</strong> ".$param["gosnomer"]
					."<br/><strong>Категория ТС:</strong> ".$param["doc_cat_ts"]
					
					."<br/><strong>Максимально разрешенная масса:</strong> ".$param["doc_max_mass"]
					."<br/><strong>Количество пассажирских мест:</strong> ".$param["doc_max_mesta"]
					."<br/><strong>Идентификационный номер VIN:</strong> ".$param["doc_vin"]
					."<br/><strong>Цель использования:</strong> ".$param["doc_tsel"]
					."<br/><strong>Документ:</strong> ".$param["type_doc"]
					."<br/><strong>Серия:</strong> ".$param["doc_seria"]
					."<br/><strong>Номер:</strong> ".$param["doc_number"]
					."<br/><strong>Дата выдачи: </strong> ".$param["doc_data_vid"]

					."<br/><strong>Номер диагностической карты: </strong> ".$param["doc_dk_number"]
					."<br/><strong>Дата выдачи диагностической карты: </strong> ".$param["doc_dk_data"]


					."<br/><strong>Дата начала страховки:</strong> ".$param["str_data_n"]
					."<br/><strong>Город прописки собственника:</strong> ".$param["pers_city"]
					."<br/><strong>Фамилия собственника:</strong> ".$param["sob_lastname"]
					."<br/><strong>Имя собственника:</strong> ".$param["sob_name"]
					."<br/><strong>Отчество собственника:</strong> ".$param["sob_patronymic"]
					."<br/><strong>Дата рождения собственника:</strong> ".$param["sob_data_r"]
					."<br/><strong>Серия и номер Паспорта:</strong> ".$param["sob_number_vu"]
					."<br/><strong>Дата выдачи паспорта:</strong> ".$param["sob_data_st"]
					."<br/><strong>Адрес пропики:</strong> ".$param["sob_propiska"]

					."<br/><strong>Фамилия страхователя:</strong> ".$param["strah_lastname"]
					."<br/><strong>Имя страхователя:</strong> ".$param["strah_name"]
					."<br/><strong>Отчество страхователя:</strong> ".$param["strah_patronymic"]
					."<br/><strong>Дата рождения страхователя:</strong> ".$param["strah_data_r"]
					."<br/><strong>Паспорт страхователя:</strong> ".$param["strah_number_vu"]
					."<br/><strong>Дата выдачи паспорта:</strong> ".$param["strah_data_st"]

					."<br/><strong>Фамилия водителя #1:</strong> ".$param["lastname_v1"]
					."<br/><strong>Имя водителя #1:</strong> ".$param["name_v1"]
					."<br/><strong>Отчество водителя #1:</strong> ".$param["patronymic_v1"]
					."<br/><strong>Дата рождения водителя #1:</strong> ".$param["data_r_v1"]
					."<br/><strong>Водительское удостоверение водителя #1:</strong> ".$param["number_vu_v1"]
					."<br/><strong>Год начала водителя #1:</strong> ".$param["data_st_v1"]

					."<br/><strong>Фамилия водителя #2:</strong> ".$param["lastname_v2"]
					."<br/><strong>Имя водителя #2:</strong> ".$param["name_v2"]
					."<br/><strong>Отчество водителя #2:</strong> ".$param["patronymic_v2"]
					."<br/><strong>Дата рождения водителя #2:</strong> ".$param["data_r_v2"]
					."<br/><strong>Водительское удостоверение водителя #2:</strong> ".$param["number_vu_v2"]
					."<br/><strong>Год начала водителя #2:</strong> ".$param["data_st_v2"]

					."<br/><strong>Фамилия водителя #3:</strong> ".$param["lastname_v3"]
					."<br/><strong>Имя водителя #3:</strong> ".$param["name_v3"]
					."<br/><strong>Отчество водителя #3:</strong> ".$param["patronymic_v3"]
					."<br/><strong>Дата рождения водителя #3:</strong> ".$param["data_r_v3"]
					."<br/><strong>Водительское удостоверение водителя #3:</strong> ".$param["number_vu_v3"]
					."<br/><strong>Год начала водителя #3:</strong> ".$param["data_st_v3"]
					

					."<br/><strong>Город:</strong> ".$param["pers_city"]
					."<br/><strong>Сообщение:</strong> ".$param["pers_message"]
					."<a href = '".$lnk."'>Сформировать КП </a> "
				
					, $headers))
				wp_die($message_telegram);
			else wp_die( 'Error!', '', 403 );;


		} else {
			wp_die( 'НО-НО-НО!', '', 403 );
		}
	}


	add_action( 'wp_ajax_send_mail_agent', 'send_mail_agent' );
	add_action( 'wp_ajax_nopriv_send_mail_agent', 'send_mail_agent' );

	function send_mail_agent() {
		if ( empty( $_REQUEST['nonce'] ) ) {
			wp_die( '0' );
		}
		
		if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			$headers = array(
				'From: '.COMPANY_NAME.' '.MAIL_RESEND,
				'content-type: text/html',
			);

			parse_str($_REQUEST["alldata"], $param);

			$message_telegram = 'Заказ на сотрудничество Агента с сайта' . $_SERVER['SERVER_NAME'] 
					."\nТелефон: ".$param["pers_tel"]
					."\nИмя: ".$param["name"];

			message_to_telegram($message_telegram, "TO");

			add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
		
		if (wp_mail(carbon_get_theme_option('to_main_sendmail'), 'Заказ на сотрудничество Агента ', 
					"<strong>Телефон:</strong> ".$param["pers_tel"]
					."<br/><strong>Имя:</strong> ".$param["name"]
					, $headers))
				wp_die($message_telegram);
			else wp_die( 'Error!', '', 403 );;


		} else {
			wp_die( 'НО-НО-НО!', '', 403 );
		}
	}
	
	add_action( 'wp_ajax_offer_client_send', 'offer_client_send' );
	add_action( 'wp_ajax_nopriv_offer_client_send', 'offer_client_send' );

	function offer_client_send() {
		if ( empty( $_REQUEST['nonce'] ) ) {
		wp_die( '0' );
		}
		
		if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
		
		$headers = array(
			'From: Сайт ТО-Профи <noreply@osagoprofi.su',
			'content-type: text/html',
		);
		
		$lnk = get_the_permalink(376)."?".http_build_query(
			array(
			"email" => $_REQUEST["email"],
			"marka" => $_REQUEST["marka"],
			"model" => $_REQUEST["model"],
			"gosnomer" => $_REQUEST["number"],
			"categoria" => $_REQUEST["category"],
			"power" => $_REQUEST["power"],
			"price" => $_REQUEST["price"]
		));

		add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
		if (wp_mail($_REQUEST["email"], 'Оплата ОСАГО', '<strong>Оплата ОСАГО:</strong> Для оплаты ОСАГО онлайн перейдите по ссылке <a href="' . $lnk . '">Страница оплаты</a>', $headers))
			wp_die("<span style = 'color:green;'>Мы свяжемся с Вами в ближайшее время.</span>");
		else wp_die("<span style = 'color:red;'>Сервис недоступен попробуйте позднее.</span>");
		
		} else {
		wp_die( 'НО-НО-НО!', '', 403 );
		}
	}


	/* Отправка почты
		
			$headers = array(
				'From: Сайт '.COMPANY_NAME.' <MAIL_RESEND>',
				'content-type: text/html',
			);
		
			add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
			
			$adr_to_send = <Присваиваем поле карбона c адресами для отправки>;
			$mail_content = "<Тело письма>";
			$mail_them = "<Тема письма>";

			if (wp_mail($adr_to_send, $mail_them, $mail_content, $headers)) {
				wp_die(json_encode(array("send" => true )));
			}
			else {
				wp_die( 'Ошибка отправки!', '', 403 );
			}
	*/
	
	
	/*	Заготовка шорткода
		function true_url_external( $atts ) {
			$params = shortcode_atts( array( // в массиве укажите значения параметров по умолчанию
				'anchor' => 'Миша Рудрастых', // параметр 1
				'url' => 'https://misha.blog', // параметр 2
			), $atts );
			return "<a href='{$params['url']}' target='_blank'>{$params['anchor']}</a>";
		}
		add_shortcode( 'trueurl', 'true_url_external' );
	*/
	
?>