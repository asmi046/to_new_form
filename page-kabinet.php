<?php 

/*
Template Name: Личный кабинет агента
Template Post Type: page
*/

get_header(); ?>

<?php get_template_part('template-parts/header-section');?>

<template id = "autorisation">
		<section class = "content">
			<div class="inner">
				<h1>Авторизация</h1>

				<form action="#" class="authoriz__form reviews__form">
					<input v-model="email" :class = "{dontz:emailNotEnter}" autocomplete="off" type="email" name="email" placeholder="Email" id="form-emailw" class="reviews__form-input input">
					<input v-model="password" :class = "{dontz:passwordNotEnter}" autocomplete="new-password" type="password" name="password" placeholder="Пароль" id="form-telw" class="reviews__form-input input">
					<div class = "btn_wrapper">
						<button @click.prevent  = "getAutorisation"  type="button" class="reviews__form-btn agriwind btn">Войти</button>
						<button @click.prevent  = "toRegister" type="button" class="reviews__form-btn agriwind btn btn-tr" id = "registerbtn">Регистрация</button>
					</div>

					<div class = "btn_wrapper" id = "passRecoveryWrapper">
						<a @click.prevent = "toPasRec" href = "#">Не можете войти в личный кабинет?</a>
					</div>

					<div v-show = "showMsgBlk" :class = "{messageFormBlkOk : msgOk}" class = "messageFormBlk">
						{{messageText}}
					</div>

				</form> 

			</div>
		</section>
	</template>


	<template id = "registration">
		<section class = "content">
			<div class="inner">
				<h1>Регистрация</h1>

				<form autocomplete="off" action="#" class="authoriz__form registre__form">
					<input v-model="name" :class = "{dontz:nameNotEnter}" autocomplete="off" type="text" name="name" placeholder="ФИО контактного лица*" id="form-namew" class="reviews__form-input input">
					<input v-model="nameorg" :class = "{dontz:nameorgNotEnter}" autocomplete="off" type="text" name="nameorg" placeholder="Наименование организации*" id="form-nameorgw" class="reviews__form-input input">
					<input v-model="inn" autocomplete="off" type="text" name="inn" placeholder="ИНН организации" id="form-innw" class="reviews__form-input input">
					<input v-model="email" :class = "{dontz:emailNotEnter}" autocomplete="off" type="email" name="email" placeholder="Email*" id="form-emailw" class="reviews__form-input input">
					<input v-phone v-model="tel" autocomplete="off" type="tel" name="tel" placeholder="Телефон" id="form-telw" class="reviews__form-input input">
					<input v-model="password" :class = "{dontz:passwordNotEnter}" type="password" name="password" autocomplete="new-password"  placeholder="Пароль*" id="form-telw" class="reviews__form-input input">
					<div class = "btn_wrapper">
						<button @click.prevent  = "registerUser" type="button" class="reviews__form-btn agriwind btn">Зарегистрироваться</button>
						<button  @click.prevent  = "toAutorization" type="button" class="reviews__form-btn agriwind btn btn-tr" id = "registerbtn">Авторизация</button>
					</div>

					<div v-show = "showMsgBlk" :class = "{messageFormBlkOk : msgOk}" class = "messageFormBlk">
						{{messageText}}
					</div>
				</form> 

			</div>
		</section>
	</template>

	<template id = "passrec">
		<section class = "content">
			<div class="inner">
				<h1>Восстановление пароля</h1>

				<form action="#" class="authoriz__form reviews__form">
					<input v-model="email"  :class = "{dontz:emailNotEnter}" type="email" name="email" placeholder="Email" id="form-emailw" class="reviews__form-input input">
					<div class = "btn_wrapper">
						<button @click.prevent = "getPassRec" type="submit" class="reviews__form-btn agriwind btn">Восстановить</button>
						<button  @click.prevent  = "toAutorization" type="button" class="reviews__form-btn agriwind btn btn-tr" id = "registerbtn">Авторизация</button>
					</div>

					<div v-show = "showMsgBlk" :class = "{messageFormBlkOk : msgOk}" class = "messageFormBlk">
						{{messageText}}
					</div>
				</form> 

			</div>
		</section>
	</template>
	
	<template id = "kabinet">
		<section class = "personal content">
			<div class="inner">
				<h1>Личный кабинет агента</h1>

				<div class = "kabinet_control_panel">
					<div class = "kabinet_register_info">
						<span class="company_name">
							<strong>Компания: </strong> {{company}}
						</span>
						<span class="company_inn">
							<strong>ИНН: </strong> {{inn}}
						</span>
						<span class="company_mail">
							<strong>e-mail: </strong> {{email}}
						</span>

						<span class="company_admin_stata">
							<a @click.prevent = "toStat" href ="#">Статистика</a>
						</span>
					</div>
					<div class ="controllWrapper">
						<a @click.prevent = "relogin" class = "controlGrItem" href = "">Выйти из кабинета</a> 
					</div>
				</div>

				<div class="personal__row product__box product__row">
					<div v-for = "(item, index, key) in UsserZakaz" class="product__wr">
						<div class="product cabinet_wrapper">
							<h3 class="product__name"><strong>{{item.zak_info.zak_number}}</strong> от {{item.zak_info.zak_data}} для <strong>{{item.zak_info.client_name}}</strong> </h3>
							<span class="db product__price">{{item.zak_info.zak_summ}} руб.</span>
							<div class="product__bottom">
								<a @click.prevent = "getZakDetales(item.zak_info.zak_number)" href="#" class="db btn btn__details">Подробнее</a>
								
							</div>
							
						</div>

						<div v-show = "item.open_detale" class = "zakazDetale">
							<strong>Номер заказа:</strong> {{item.zak_info.zak_number}}</br>			
							<strong>Дата заказа:</strong> {{item.zak_info.zak_data}}</br>		
							<strong>Сумма заказа:</strong> {{item.zak_info.zak_summ}}</br>		
							<strong>Клиент:</strong> {{item.zak_info.client_name}}</br>		
							<strong>Телефон:</strong> {{item.zak_info.client_phone}}</br>		
							<strong>e-mail:</strong> {{item.zak_info.client_mail}}</br>		
							<strong>Дата прохождения ТО:</strong> {{item.zak_info.client_data}}</br>		
							<strong>Время прохождения ТО:</strong> {{item.zak_info.client_time}}</br>		
							<strong>Город:</strong> {{item.zak_info.client_city}}</br>		
							<strong>Категория:</strong> {{item.zak_info.client_ts_kat}}</br>		
							<strong>Пункт:</strong> {{item.zak_info.punkt_to}}</br>		

								<button @click.prevent = "repeatZak(item.zak_info)" class="btn btn__zak_repeat ">Повторить</button>
						</div>
					</div>
					        
				</div>

			</div>
		</section>
	</template>

	<template id = "statistic">
		<section class = "personal content">
			<div class="inner">
				<h1>Статистика</h1>
				<a @click.prevent = "toKabinet" href="#" class="goToKabinet">&larr; Вернуться в кабинет</a>
				<table class = "statTable">
					<thead>
						<tr>
							<th>Агент</th>
							<th>ИНН</th>
							<th>№ заказа</th>
							<th>Цена</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td></td>
							<td></th>
							<td></td>
							<td></td>
						</tr>
					</tbody>
				</table>

			</div>
		</section>
	</template>	

	<main class="main">	
		<section class = "text_page_main_section">
            <div class="inner" id = "main_cabinet">
                <autorisation v-show="showAutorize" ></autorisation>
                <registration v-show="showRegistration" ></registration>
                <passrec v-show="showPassRec" ></passrec>
                <kabinet v-show="showKabinet"></kabinet>
                <statistic v-show="showStat"></statistic>
            </div>
        </section>
    </main>

<?php get_footer("cooper"); ?>  