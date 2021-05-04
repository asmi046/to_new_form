<?

// Описание полей для Carbon_Fields производим только в этом файле
// 1. В начале идет описание полей - Настройки темы  далее категорий (если необходимо) в конце аблонов страниц и записей
// 2. Префиксы проставляем каждый раз новые осмысленно по имени проекта 
// 3. Для Полей которые входят в состав составново схема именования следующая <Общий префикс>_<название составного поля>_<имя поля>
// 4. Название секций Так же придумываем осмысленные на русском языке чтобы небыло сплошных Доп. полей
// 5. Каждый блок комментируем


use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'theme_options', __( 'Настройки темы', 'crb' ) )
		->add_fields( array(
			Field::make( 'text', 'to_phone', 'Телефон' ),
			Field::make( 'text', 'to_mail', 'e-mail' ),
			Field::make( 'text', 'to_price', 'Цена техосмотра' ),
			Field::make( 'text', 'to_main_sendmail', 'е-mail для рассылки' )->set_width(100),
			Field::make( 'text', 'to_telegramm_id', 'Telegram ID для рассылки' )->set_width(100),
		) );
		
Container::make('post_meta', 'to_param', 'Преимущества тура')
		->where( 'post_template', '=', 'single-osago.php' )
		->or_where( 'post_template', '=', 'single-to.php' )
		->add_fields(array(
			Field::make('text', 'city_name', 'Город')->set_width(50),
			Field::make('text', 'city_padeg', 'Город склонение (Воронеж -> Воронеже)')->set_width(50)
		));
?>