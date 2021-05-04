// Аккордеон
! function(i) {
      var o, n;
      i(".accordion__head").on("click", function() {
        o = i(this).parents(".accordion"), n = o.find(".accordion__body"),
          o.hasClass("active_block") ? (o.removeClass("active_block"),
            n.slideUp()) : (o.addClass("active_block"), n.stop(!0, !0).slideDown(),
            o.siblings(".active_block").removeClass("active_block").children(
              ".accordion__body").stop(!0, !0).slideUp())
      })
    }(jQuery);

// Функция верификации e-mail
function isEmail(email) {
	var regex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	return regex.test(email);
}

//Регуларные выражения
var per_rus =/^([а-яё]+|[А-Я]+)$/i;
var per_cur =/^([0-9]+)$/i;

jQuery(document).ready(function() {
	
    //    MOBIL MENU
	let $burgerBtn = jQuery('.burger-btn'); 
	let $greatShadow = jQuery('.great-shadow');
	let $mainMenu = jQuery('.main-menu');
	let $mainMenuItems = jQuery('.main-menu ul');
	let menuController = false;
	let $body = jQuery('body');
	 
	
	
	
	
		function openMenu() {
			menuController = true;
			$burgerBtn.addClass('active');
			$greatShadow.fadeIn(300);
			$mainMenu.addClass('active');
			$mainMenuItems.addClass('active');
			$body.addClass('lock');
		}
		
		function closeMenu(){ 
			$mainMenuItems.removeClass('active');
			setTimeout(function(){
				$mainMenu.removeClass('active');
			},800);
			setTimeout(function(){ 
				$greatShadow.fadeOut(300);
			}, 800);
			setTimeout(function(){
				$burgerBtn.removeClass('active'); 
				menuController = false;
			}, 800);
			$body.toggleClass('lock');
		}
	
		$burgerBtn.on('click', function (e) {
			e.preventDefault();
			if (!menuController) {
				openMenu(); 
			}
			else{
				closeMenu(); 
			} 
		});


	// Сразу маскируем все поля телефонов
	var inputmask_phone = {"mask": "+7(999)999-99-99"};
	jQuery("input[type=tel]").inputmask(inputmask_phone);

	var mask_gn = {"mask_gn": "999"};
	jQuery(".gosnomer").inputmask("A999AA99[9]");
	jQuery(".doc_data_v").inputmask("99.99.9999");
	jQuery(".doc_data_god").inputmask("9999");
	// Типовой скрипт для отправки сообщений на почту


	jQuery(".location, .no_btn_sv").click(function(e){ 
		e.preventDefault();
		jQuery(".city_vsp_vin").hide();
		jQuery("#popupTO").arcticmodal();
	});

	jQuery(".yes_btn_sv").click(function(e){ 
		e.preventDefault();
		jQuery(".city_vsp_vin").hide();
		document.cookie = "cityChec=yes; max-age=518400";
	});

	jQuery("#popupTO a").click(function(e){ 
		e.preventDefault();
		document.cookie = "city="+jQuery(this).html()+"; max-age=518400";

		jQuery(".city_prost").html(jQuery(this).html());

		jQuery(".city_prost_val").val(jQuery(this).html());

		jQuery("#popupTO").arcticmodal("close");
		
	});

	jQuery(".location-2").click(function(e){ 
		e.preventDefault();
		console.log(111);
		jQuery("#popupOS").arcticmodal();
	});

	jQuery(".control-panel__item").click(function(e){ 
		e.preventDefault();
	});


	function toStapIndex(index) {
		jQuery(".control-panel__item").removeClass("current");
		jQuery(".input-panel__step").removeClass("active");
		jQuery("#control-panel_"+index).addClass("current");
		jQuery("#input-panel__step_"+index).addClass("active");
	}

	//----------------------Верификация ТО

	jQuery("#toStep2").click(function(e){ 
		e.preventDefault();
		
		let flag = true;

		let lastname = jQuery(".request-form-to .lastname");
		if (!per_rus.test(lastname.val())) {
			jQuery(lastname).parent().addClass("error");
			flag = false;
		} else {
			jQuery(lastname).parent().removeClass("error");
		}

		let name = jQuery(".request-form-to .name");
		if (!per_rus.test(name.val())) {
			jQuery(name).parent().addClass("error");
			flag = false;
		} else {
			jQuery(name).parent().removeClass("error");
		}

		let patronymic = jQuery(".request-form-to .patronymic");
		if (!per_rus.test(patronymic.val())) {
			jQuery(patronymic).parent().addClass("error");
			flag = false;
		} else {
			jQuery(patronymic).parent().removeClass("error");
		}

		if (flag) {
			toStapIndex(2);
		} else {
			jQuery('html, body').animate({
				scrollTop: jQuery(".error").offset().top - 50
			}, 1000);
		}
	});
	
	jQuery("#bacStep1").click(function(e){ 
		e.preventDefault();
		toStapIndex(1);
	});


	jQuery("#toStep3").click(function(e){ 
		e.preventDefault();
		let flag = true;

		let shini = jQuery(".request-form-to .shini");
		if (shini.val() == "") {
			jQuery(shini).parent().addClass("error");
			flag = false;
		} else {
			jQuery(shini).parent().removeClass("error");
		}

		let probeg = jQuery(".request-form-to .probeg");
		if (!per_cur.test(probeg.val())) {
			jQuery(probeg).parent().addClass("error");
			flag = false;
		} else {
			jQuery(probeg).parent().removeClass("error");
		}

		let toplivo = jQuery(".request-form-to .toplivo");
		if (!per_rus.test(toplivo.val())) {
			jQuery(toplivo).parent().addClass("error");
			flag = false;
		} else {
			jQuery(toplivo).parent().removeClass("error");
		}

		let gosnomer = jQuery(".request-form-to .gosnomer");
		console.log(gosnomer.val().indexOf('_'));
		console.log(gosnomer.val());
		if ((gosnomer.val() == "" )||(gosnomer.val().indexOf('_') >= 0 )) {
			jQuery(gosnomer).parent().addClass("error");
			flag = false;
		} else {
			jQuery(gosnomer).parent().removeClass("error");
		}

		if (flag) {
			toStapIndex(3);
		}  else {
			jQuery('html, body').animate({
				scrollTop: jQuery(".error").offset().top - 50
			}, 1000);
		}
	});
	
	jQuery("#bacStep2").click(function(e){ 
		e.preventDefault();
		toStapIndex(2);
	});

	
	jQuery("#toStep4").click(function(e){ 
		e.preventDefault();
		
		let flag = true;

		let doc_seria = jQuery(".request-form-to .doc_seria");
		if (doc_seria.val() == "") {
			jQuery(doc_seria).parent().addClass("error");
			flag = false;
		} else {
			jQuery(doc_seria).parent().removeClass("error");
		}

		let doc_number = jQuery(".request-form-to .doc_number");
		if (doc_number.val() == "") {
			jQuery(doc_number).parent().addClass("error");
			flag = false;
		} else {
			jQuery(doc_number).parent().removeClass("error");
		}

		let doc_org = jQuery(".request-form-to .doc_org");
		if (doc_org.val() == "") {
			jQuery(doc_org).parent().addClass("error");
			flag = false;
		} else {
			jQuery(doc_org).parent().removeClass("error");
		}

		let doc_data_v = jQuery(".request-form-to .doc_data_v");
		if ((doc_number.val() == "" )||(doc_number.val().indexOf('_') >= 0 )) {
			jQuery(doc_data_v).parent().addClass("error");
			flag = false;
		} else {
			jQuery(doc_data_v).parent().removeClass("error");
		}

		let doc_marka = jQuery(".request-form-to .doc_marka");
		if (doc_marka.val() == "" ) {
			jQuery(doc_marka).parent().addClass("error");
			flag = false;
		} else {
			jQuery(doc_marka).parent().removeClass("error");
		}

		let doc_model = jQuery(".request-form-to .doc_model");
		if (doc_model.val() == "" ) {
			jQuery(doc_model).parent().addClass("error");
			flag = false;
		} else {
			jQuery(doc_model).parent().removeClass("error");
		}

		let doc_vin = jQuery(".request-form-to .doc_vin");
		if (doc_vin.val() == "" ) {
			jQuery(doc_vin).parent().addClass("error");
			flag = false;
		} else {
			jQuery(doc_vin).parent().removeClass("error");
		}

		let doc_hassi = jQuery(".request-form-to .doc_hassi");
		if (doc_hassi.val() == "" ) {
			jQuery(doc_hassi).parent().addClass("error");
			flag = false;
		} else {
			jQuery(doc_hassi).parent().removeClass("error");
		}

		let doc_kuzov = jQuery(".request-form-to .doc_kuzov");
		if (doc_kuzov.val() == "" ) {
			jQuery(doc_kuzov).parent().addClass("error");
			flag = false;
		} else {
			jQuery(doc_kuzov).parent().removeClass("error");
		}

		let doc_godvip = jQuery(".request-form-to .doc_godvip");
		if (doc_godvip.val() == "" ) {
			jQuery(doc_godvip).parent().addClass("error");
			flag = false;
		} else {
			jQuery(doc_godvip).parent().removeClass("error");
		}

		let doc_r_massa = jQuery(".request-form-to .doc_r_massa");
		if (doc_r_massa.val() == "" ) {
			jQuery(doc_r_massa).parent().addClass("error");
			flag = false;
		} else {
			jQuery(doc_r_massa).parent().removeClass("error");
		}

		let doc_m_massa = jQuery(".request-form-to .doc_m_massa");
		if (doc_m_massa.val() == "" ) {
			jQuery(doc_m_massa).parent().addClass("error");
			flag = false;
		} else {
			jQuery(doc_m_massa).parent().removeClass("error");
		}

		if (flag) {
			toStapIndex(4);
		}  else {
			jQuery('html, body').animate({
				scrollTop: jQuery(".error").offset().top - 50
			}, 1000);
		}
	});
	
	jQuery("#bacStep2").click(function(e){ 
		e.preventDefault();
		toStapIndex(2);
	});
	


	jQuery("#sendTOform").click(function(e){ 
		e.preventDefault();
		
		let flag = true;

		let pers_tel = jQuery(".request-form-to .pers_tel");
		if ((pers_tel.val() == "" )||(pers_tel.val().indexOf('_') >= 0 )) {
			jQuery(pers_tel).parent().addClass("error");
			flag = false;
		} else {
			jQuery(pers_tel).parent().removeClass("error");
		}

		let pers_mail = jQuery(".request-form-to .pers_mail");
		if ((pers_mail.val() == "")||(!isEmail(pers_mail.val()))) {
			jQuery(pers_mail).parent().addClass("error");
			flag = false;
		} else {
			jQuery(pers_mail).parent().removeClass("error");
		}

		let pers_city = jQuery(".request-form-to .pers_city");
		if (!per_rus.test(pers_city.val())) {
			jQuery(pers_city).parent().addClass("error");
			flag = false;
		} else {
			jQuery(pers_city).parent().removeClass("error");
		}

		let policy_checed = jQuery(".request-form-to .policy_checed");
		if (!jQuery(policy_checed).is(':checked')) {
			jQuery(policy_checed).parent().siblings(".consent-mess").addClass("error");
			flag = false;
		} else {
			jQuery(policy_checed).parent().siblings(".consent-mess").removeClass("error");
		}

		if (flag) {
			console.log("COOL");

			var  jqXHR = jQuery.post(
				allAjax.ajaxurl,
				{
					action: 'sendTO',		
					nonce: allAjax.nonce,
					alldata: jQuery(".request-form-to").serialize(),
				}
				
			);
			
			
			jqXHR.done(function (responce) {  
				console.log(responce);
				document.location.href = toThencsPageUrl;	
			});
					
			jqXHR.fail(function (responce) {
				alert("Произошла ошибка попробуйте позднее");
			});

		}  else {
			jQuery('html, body').animate({
				scrollTop: jQuery(".error").offset().top - 50
			}, 1000);
		}
	});

	jQuery("#bacStep3").click(function(e){ 
		e.preventDefault();
		toStapIndex(3);
	});

//-----------------------------


	jQuery("#clsubmit").click(function(){ 

		e.preventDefault();

		var  jqXHR = jQuery.post(
					allAjax.ajaxurl,
					{
						action: 'send_mail',		
						nonce: allAjax.nonce,
						formsubject: jQuery("#formsubject").val(),
					}
					
		);
				
				
		jqXHR.done(function (responce) {  //Всегда при удачной отправке переход для страницу благодарности
					document.location.href = toThencsPageUrl;	
		});
				
		jqXHR.fail(function (responce) {
					jQuery('#messgeModal #lineMsg').html("Произошла ошибка. Попробуйте позднее.");
					jQuery('#messgeModal').arcticmodal();
		});
	});

	//----------------------Верификация ОСАГО

	jQuery("#toStepOsago2").click(function(e){ 
		e.preventDefault();

		let flag = true;

		let car_marka = jQuery("#request-form-osago .car_marka");
		if (car_marka.val() == "") {
			jQuery(car_marka).parent().addClass("error");
			flag = false;
		} else {
			jQuery(car_marka).parent().removeClass("error");
		}

		let car_model = jQuery("#request-form-osago .car_model");
		if (car_model.val() == "") {
			jQuery(car_model).parent().addClass("error");
			flag = false;
		} else {
			jQuery(car_model).parent().removeClass("error");
		}
		
		let car_godvip = jQuery("#request-form-osago .car_godvip");
		if (car_godvip.val() == "") {
			jQuery(car_godvip).parent().addClass("error");
			flag = false;
		} else {
			jQuery(car_godvip).parent().removeClass("error");
		}

		let car_mosh = jQuery("#request-form-osago .car_mosh");
		if (car_mosh.val() == "") {
			jQuery(car_mosh).parent().addClass("error");
			flag = false;
		} else {
			jQuery(car_mosh).parent().removeClass("error");
		}

		let gosnomer = jQuery("#request-form-osago .gosnomer");

		if ((gosnomer.val() == "" )||(gosnomer.val().indexOf('_') >= 0 )) {
			jQuery(gosnomer).parent().addClass("error");
			flag = false;
		} else {
			jQuery(gosnomer).parent().removeClass("error");
		}

		let doc_vin = jQuery("#request-form-osago .doc_vin");
		if (doc_vin.val() == "") {
			jQuery(doc_vin).parent().addClass("error");
			flag = false;
		} else {
			jQuery(doc_vin).parent().removeClass("error");
		}

		let doc_max_mass = jQuery("#request-form-osago .doc_max_mass");
		if ((doc_max_mass.parent().parent().is(':visible'))&&(doc_max_mass.val() == "")) {
			jQuery(doc_max_mass).parent().addClass("error");
			flag = false;
		} else {
			jQuery(doc_max_mass).parent().removeClass("error");
		}

		
		let doc_max_mesta = jQuery("#request-form-osago .doc_max_mesta");
		console.log((doc_max_mesta.parent().parent().is(':visible'))&&(doc_max_mesta.val() == ""));
		if ((doc_max_mesta.parent().parent().is(':visible'))&&(doc_max_mesta.val() == "")) {
			jQuery(doc_max_mesta).parent().addClass("error");
			flag = false;
		} else {
			jQuery(doc_max_mesta).parent().removeClass("error");
		}

		let doc_seria = jQuery("#request-form-osago .doc_seria");
		if (doc_seria.val() == "") {
			jQuery(doc_seria).parent().addClass("error");
			flag = false;
		} else {
			jQuery(doc_seria).parent().removeClass("error");
		}

		let doc_number = jQuery("#request-form-osago .doc_number");
		if (doc_number.val() == "") {
			jQuery(doc_number).parent().addClass("error");
			flag = false;
		} else {
			jQuery(doc_number).parent().removeClass("error");
		}

		let doc_data_vid = jQuery("#request-form-osago .doc_data_vid");
		if ((doc_data_vid.val() == "" )||(doc_data_vid.val().indexOf('_') >= 0 )) {
			jQuery(doc_data_vid).parent().addClass("error");
			flag = false;
		} else {
			jQuery(doc_data_vid).parent().removeClass("error");
		}

		if (!jQuery(".doc_no_dk").prop("checked")) {
			let doc_dk_number = jQuery("#request-form-osago .doc_dk_number");
			if (doc_dk_number.val() == "" ) {
				jQuery(doc_dk_number).parent().addClass("error");
				flag = false;
			} else {
				jQuery(doc_dk_number).parent().removeClass("error");
			}

			let doc_dk_data = jQuery("#request-form-osago .doc_dk_data");
			if ((doc_dk_data.val() == "" )||(doc_dk_data.val().indexOf('_') >= 0 )) {
				jQuery(doc_dk_data).parent().addClass("error");
				flag = false;
			} else {
				jQuery(doc_dk_data).parent().removeClass("error");
			}
		}

		if (flag) {
			toStapIndex(2);
		} else {
			jQuery('html, body').animate({
				scrollTop: jQuery(".error").offset().top - 50
			}, 1000);
		}

	});

	jQuery("#toStepOsago3").click(function(e){ 
		e.preventDefault();

		let flag = true;

		let str_data_n = jQuery("#request-form-osago .str_data_n");
		if ((str_data_n.val() == "")||(str_data_n.val().indexOf('_') >= 0 )) {
			jQuery(str_data_n).parent().addClass("error");
			flag = false;
		} else {
			jQuery(str_data_n).parent().removeClass("error");
		}

		let pers_city = jQuery("#request-form-osago .pers_city");
		if (!per_rus.test(pers_city.val())) {
			jQuery(pers_city).parent().addClass("error");
			flag = false;
		} else {
			jQuery(pers_city).parent().removeClass("error");
		}

		let sob_lastname = jQuery("#request-form-osago .sob_lastname");
		if (!per_rus.test(sob_lastname.val())) {
			jQuery(sob_lastname).parent().addClass("error");
			flag = false;
		} else {
			jQuery(sob_lastname).parent().removeClass("error");
		}

		let sob_name = jQuery("#request-form-osago .sob_name");
		if (!per_rus.test(sob_name.val())) {
			jQuery(sob_name).parent().addClass("error");
			flag = false;
		} else {
			jQuery(sob_name).parent().removeClass("error");
		}

		let sob_data_r = jQuery("#request-form-osago .sob_data_r");
		if ((sob_data_r.val() == "")||(sob_data_r.val().indexOf('_') >= 0 )) {
			jQuery(sob_data_r).parent().addClass("error");
			flag = false;
		} else {
			jQuery(sob_data_r).parent().removeClass("error");
		}

		let sob_number_vu = jQuery("#request-form-osago .sob_number_vu");
		if (sob_number_vu.val() == "") {
			jQuery(sob_number_vu).parent().addClass("error");
			flag = false;
		} else {
			jQuery(sob_number_vu).parent().removeClass("error");
		}

		let sob_data_st = jQuery("#request-form-osago .sob_data_st");
		if ((sob_data_st.val() == "")||(sob_data_st.val().indexOf('_') >= 0 )) {
			jQuery(sob_data_st).parent().addClass("error");
			flag = false;
		} else {
			jQuery(sob_data_st).parent().removeClass("error");
		}

		let sob_propiska = jQuery("#request-form-osago .sob_propiska");
		if (sob_propiska.val() == "") {
			jQuery(sob_propiska).parent().addClass("error");
			flag = false;
		} else {
			jQuery(sob_propiska).parent().removeClass("error");
		}

		//--------------------------------------

		let strah_lastname = jQuery("#request-form-osago .strah_lastname");
		if (!per_rus.test(strah_lastname.val())) {
			jQuery(strah_lastname).parent().addClass("error");
			flag = false;
		} else {
			jQuery(strah_lastname).parent().removeClass("error");
		}

		let strah_name = jQuery("#request-form-osago .strah_name");
		if (!per_rus.test(strah_name.val())) {
			jQuery(strah_name).parent().addClass("error");
			flag = false;
		} else {
			jQuery(strah_name).parent().removeClass("error");
		}

		let strah_data_r = jQuery("#request-form-osago .strah_data_r");
		if ((strah_data_r.val() == "")||(strah_data_r.val().indexOf('_') >= 0 )) {
			jQuery(strah_data_r).parent().addClass("error");
			flag = false;
		} else {
			jQuery(strah_data_r).parent().removeClass("error");
		}

		let strah_number_vu = jQuery("#request-form-osago .strah_number_vu");
		if (strah_number_vu.val() == "") {
			jQuery(strah_number_vu).parent().addClass("error");
			flag = false;
		} else {
			jQuery(strah_number_vu).parent().removeClass("error");
		}

		let strah_data_st = jQuery("#request-form-osago .strah_data_st");
		if ((strah_data_st.val() == "")||(strah_data_st.val().indexOf('_') >= 0 )) {
			jQuery(strah_data_st).parent().addClass("error");
			flag = false;
		} else {
			jQuery(strah_data_st).parent().removeClass("error");
		}


		if (flag) {
			toStapIndex(3);
		} else {
			jQuery('html, body').animate({
				scrollTop: jQuery(".error").offset().top - 50
			}, 1000);
		}

	});

	jQuery("#toStepOsago4").click(function(e){ 
		e.preventDefault();
		let flag = true;

		let lastname_v1 = jQuery("#request-form-osago .lastname_v1");
		if (!per_rus.test(lastname_v1.val())) {
			jQuery(lastname_v1).parent().addClass("error");
			flag = false;
		} else {
			jQuery(lastname_v1).parent().removeClass("error");
		}


		let name_v1 = jQuery("#request-form-osago .name_v1");
		if (!per_rus.test(name_v1.val())) {
			jQuery(name_v1).parent().addClass("error");
			flag = false;
		} else {
			jQuery(name_v1).parent().removeClass("error");
		}

		let data_r_v1 = jQuery("#request-form-osago .data_r_v1");
		if ((data_r_v1.val() == "")||(data_r_v1.val().indexOf('_') >= 0 )) {
			jQuery(data_r_v1).parent().addClass("error");
			flag = false;
		} else {
			jQuery(data_r_v1).parent().removeClass("error");
		}

		let number_vu_v1 = jQuery("#request-form-osago .number_vu_v1");
		if (number_vu_v1.val() == "") {
			jQuery(number_vu_v1).parent().addClass("error");
			flag = false;
		} else {
			jQuery(number_vu_v1).parent().removeClass("error");
		}

		let data_st_v1 = jQuery("#request-form-osago .data_st_v1");
		if ((data_st_v1.val() == "")||(data_st_v1.val().indexOf('_') >= 0 )) {
			jQuery(data_st_v1).parent().addClass("error");
			flag = false;
		} else {
			jQuery(data_st_v1).parent().removeClass("error");
		}

		if (jQuery("#voditel_2").css("display") == "flex") {
			let lastname_v2 = jQuery("#request-form-osago .lastname_v2");
			if (!per_rus.test(lastname_v2.val())) {
				jQuery(lastname_v2).parent().addClass("error");
				flag = false;
			} else {
				jQuery(lastname_v2).parent().removeClass("error");
			}


			let name_v2 = jQuery("#request-form-osago .name_v2");
			if (!per_rus.test(name_v2.val())) {
				jQuery(name_v2).parent().addClass("error");
				flag = false;
			} else {
				jQuery(name_v2).parent().removeClass("error");
			}

			let data_r_v2 = jQuery("#request-form-osago .data_r_v2");
			if ((data_r_v2.val() == "")||(data_r_v2.val().indexOf('_') >= 0 )) {
				jQuery(data_r_v2).parent().addClass("error");
				flag = false;
			} else {
				jQuery(data_r_v2).parent().removeClass("error");
			}

			let number_vu_v2 = jQuery("#request-form-osago .number_vu_v2");
			if (number_vu_v2.val() == "") {
				jQuery(number_vu_v2).parent().addClass("error");
				flag = false;
			} else {
				jQuery(number_vu_v2).parent().removeClass("error");
			}

			let data_st_v2 = jQuery("#request-form-osago .data_st_v2");
			if ((data_st_v2.val() == "")||(data_st_v2.val().indexOf('_') >= 0 )) {
				jQuery(data_st_v2).parent().addClass("error");
				flag = false;
			} else {
				jQuery(data_st_v2).parent().removeClass("error");
			}
		}

		if (jQuery("#voditel_3").css("display") == "flex") {
			let lastname_v3 = jQuery("#request-form-osago .lastname_v3");
			if (!per_rus.test(lastname_v3.val())) {
				jQuery(lastname_v3).parent().addClass("error");
				flag = false;
			} else {
				jQuery(lastname_v3).parent().removeClass("error");
			}


			let name_v3 = jQuery("#request-form-osago .name_v3");
			if (!per_rus.test(name_v3.val())) {
				jQuery(name_v3).parent().addClass("error");
				flag = false;
			} else {
				jQuery(name_v3).parent().removeClass("error");
			}

			let data_r_v3 = jQuery("#request-form-osago .data_r_v3");
			if ((data_r_v3.val() == "")||(data_r_v3.val().indexOf('_') >= 0 )) {
				jQuery(data_r_v3).parent().addClass("error");
				flag = false;
			} else {
				jQuery(data_r_v3).parent().removeClass("error");
			}

			let number_vu_v3 = jQuery("#request-form-osago .number_vu_v3");
			if (number_vu_v3.val() == "") {
				jQuery(number_vu_v3).parent().addClass("error");
				flag = false;
			} else {
				jQuery(number_vu_v3).parent().removeClass("error");
			}

			let data_st_v3 = jQuery("#request-form-osago .data_st_v3");
			if ((data_st_v3.val() == "")||(data_st_v3.val().indexOf('_') >= 0 )) {
				jQuery(data_st_v3).parent().addClass("error");
				flag = false;
			} else {
				jQuery(data_st_v3).parent().removeClass("error");
			}
		}

		if (flag) {
			toStapIndex(4);
		} else {
			jQuery('html, body').animate({
				scrollTop: jQuery(".error").offset().top - 50
			}, 1000);
		}
	});


	jQuery("#sendOSAGOform").click(function(e){ 
		e.preventDefault();
		
		let flag = true;

		let pers_tel = jQuery("#request-form-osago .pers_tel");
		if ((pers_tel.val() == "" )||(pers_tel.val().indexOf('_') >= 0 )) {
			jQuery(pers_tel).parent().addClass("error");
			flag = false;
		} else {
			jQuery(pers_tel).parent().removeClass("error");
		}

		let pers_mail = jQuery("#request-form-osago .pers_mail");
		if ((pers_mail.val() == "")||(!isEmail(pers_mail.val()))) {
			jQuery(pers_mail).parent().addClass("error");
			flag = false;
		} else {
			jQuery(pers_mail).parent().removeClass("error");
		}

		let pers_city = jQuery("#request-form-osago .pers_city");
		if (!per_rus.test(pers_city.val())) {
			jQuery(pers_city).parent().addClass("error");
			flag = false;
		} else {
			jQuery(pers_city).parent().removeClass("error");
		}

		let policy_checed = jQuery("#request-form-osago .policy_checed");
		if (!jQuery(policy_checed).is(':checked')) {
			jQuery(policy_checed).parent().siblings(".consent-mess").addClass("error");
			flag = false;
		} else {
			jQuery(policy_checed).parent().siblings(".consent-mess").removeClass("error");
		}

		if (flag) {
			console.log("COOL");

			var  jqXHR = jQuery.post(
				allAjax.ajaxurl,
				{
					action: 'sendOSAGO',		
					nonce: allAjax.nonce,
					alldata: jQuery("#request-form-osago").serialize(),
				}
				
			);
			
			
			jqXHR.done(function (responce) {  
				console.log(responce);
				document.location.href = osagoThencsPageUrl;	
			});
					
			jqXHR.fail(function (responce) {
				alert("Произошла ошибка попробуйте позднее");
			});

		} else {
			jQuery('html, body').animate({
				scrollTop: jQuery(".error").offset().top - 50
			}, 1000);
		}
	});

	jQuery(".addVoditel").click(function(e){ 
		e.preventDefault();
		let vod_index = jQuery(this).data("voditelindex");

		if (jQuery("#voditel_"+vod_index).css("display") == "flex") {
			jQuery("#voditel_"+vod_index).css("display","none");
			jQuery(this).html("+ Добавить водителя");
		} else {
			jQuery("#voditel_"+vod_index).css("display","flex");
			jQuery(this).html("- Удалить водителя");
		}
	});

	jQuery(".copyVod").click(function(e){ 
		e.preventDefault();
		jQuery(".strah_lastname").val(jQuery(".sob_lastname").val());
		jQuery(".strah_name").val(jQuery(".sob_name").val());
		jQuery(".strah_patronymic").val(jQuery(".sob_patronymic").val());
		jQuery(".strah_data_r").val(jQuery(".sob_data_r").val());
		jQuery(".strah_number_vu").val(jQuery(".sob_number_vu").val());
		jQuery(".strah_data_st").val(jQuery(".sob_data_st").val());
		
	});

	jQuery(".copyVod_v1").click(function(e){ 
		e.preventDefault();
		jQuery(".lastname_v1").val(jQuery(".sob_lastname").val());
		jQuery(".name_v1").val(jQuery(".sob_name").val());
		jQuery(".patronymic_v1").val(jQuery(".sob_patronymic").val());
		jQuery(".data_r_v1").val(jQuery(".sob_data_r").val());
		jQuery(".number_vu_v1").val(jQuery(".sob_number_vu").val());
		jQuery(".data_st_v1").val(jQuery(".sob_data_st").val());
		
	});

	jQuery(".copyVod_v2").click(function(e){ 
		e.preventDefault();
		jQuery(".lastname_v2").val(jQuery(".sob_lastname").val());
		jQuery(".name_v2").val(jQuery(".sob_name").val());
		jQuery(".patronymic_v2").val(jQuery(".sob_patronymic").val());
		jQuery(".data_r_v2").val(jQuery(".sob_data_r").val());
		jQuery(".number_vu_v2").val(jQuery(".sob_number_vu").val());
		jQuery(".data_st_v2").val(jQuery(".sob_data_st").val());
	});

	jQuery(".copyVod_v3").click(function(e){ 
		e.preventDefault();
		jQuery(".lastname_v3").val(jQuery(".sob_lastname").val());
		jQuery(".name_v3").val(jQuery(".sob_name").val());
		jQuery(".patronymic_v3").val(jQuery(".sob_patronymic").val());
		jQuery(".data_r_v3").val(jQuery(".sob_data_r").val());
		jQuery(".number_vu_v3").val(jQuery(".sob_number_vu").val());
		jQuery(".data_st_v3").val(jQuery(".sob_data_st").val());
	});

	jQuery("select[name=doc_cat_ts]").click(function(e){  
		e.preventDefault();

		let carType = jQuery(this).val();

		jQuery(".show_max_mass").hide();
		jQuery(".show_max_mesta").hide();

		if ((carType == "C | N2 - Грузовые автомобили 3.5 - 12 тонн") || (carType == "C | N3 - Грузовые автомобили свыше 12 тонн"))
		{
			jQuery(".show_max_mass").show();
		}

		if ((carType == "D | M2 - Автобусы до 5 тонн") || (carType == "D | M3 - Автобусы свыше 5 тонн"))
		{
			jQuery(".show_max_mesta").show();
		}
	});

	jQuery(".doc_no_dk").click(function(e){  
		

		if (jQuery(".doc_no_dk").prop("checked")) {
			jQuery("input[name=doc_dk_number]").attr("disabled", true);
			jQuery("input[name=doc_dk_data]").attr("disabled", true);
		} else {
			jQuery("input[name=doc_dk_number]").attr("disabled", false);
			jQuery("input[name=doc_dk_data]").attr("disabled", false);
		}
	});

	//-----------------------------------------------------

	jQuery(".agent-form-cooper__btn").click(function(e){ 

		e.preventDefault();

		let pers_tel = jQuery("#agent-form-cooper .pers_tel");
		if ((pers_tel.val() == "" )||(pers_tel.val().indexOf('_') >= 0 )) {
			jQuery(pers_tel).css("border-color", "red");
			return;
		} 


		var  jqXHR = jQuery.post(
					allAjax.ajaxurl,
					{
						action: 'send_mail_agent',		
						nonce: allAjax.nonce,
						alldata: jQuery("#agent-form-cooper").serialize(),
					}
					
		);
				
				
		jqXHR.done(function (responce) {  //Всегда при удачной отправке переход для страницу благодарности
					document.location.href = agentThencsPageUrl;	
		});
				
		jqXHR.fail(function (responce) {
					jQuery('#messgeModal #lineMsg').html("Произошла ошибка. Попробуйте позднее.");
					jQuery('#messgeModal').arcticmodal();
		});
	});


	//--------------------

	jQuery(".offer-submit").click(function(e){ 
		e.preventDefault();

		let flag = true;

		let pers_mail = jQuery("#kp_form .email");
		if ((pers_mail.val() == "")||(!isEmail(pers_mail.val()))) {
			jQuery(pers_mail).parent().addClass("error");
			flag = false;
		} else {
			jQuery(pers_mail).parent().removeClass("error");
		}

		let category = jQuery("#kp_form #category");
		if (category.val() == "") {
			jQuery(category).parent().addClass("error");
			flag = false;
		} else {
			jQuery(category).parent().removeClass("error");
		}

		let marka = jQuery("#kp_form #marka");
		if (marka.val() == "") {
			jQuery(marka).parent().addClass("error");
			flag = false;
		} else {
			jQuery(marka).parent().removeClass("error");
		}

		let model = jQuery("#kp_form #model");
		if (model.val() == "") {
			jQuery(model).parent().addClass("error");
			flag = false;
		} else {
			jQuery(model).parent().removeClass("error");
		}

		let number = jQuery("#kp_form #number");
		if (number.val() == "") {
			jQuery(number).parent().addClass("error");
			flag = false;
		} else {
			jQuery(number).parent().removeClass("error");
		}

		let power = jQuery("#kp_form #power");
		if (power.val() == "") {
			jQuery(power).parent().addClass("error");
			flag = false;
		} else {
			jQuery(power).parent().removeClass("error");
		}

		let price = jQuery("#kp_form #price");
		if (price.val() == "") {
			jQuery(price).parent().addClass("error");
			flag = false;
		} else {
			jQuery(price).parent().removeClass("error");
		}

		if (!flag) {
			return;
		}

        var  jqXHR = jQuery.post(
          allAjax.ajaxurl,
          {
            action: 'offer_client_send',    
            nonce: allAjax.nonce,
			email: pers_mail.val(),
			category: category.val(),
			marka:marka.val(),
			model:model.val(),
			number:number.val(),
			power:power.val(),
			price:price.val(),
          }
          
        );
        
        
        jqXHR.done(function (responce) {
          
          alert("Коммерческое предложение отправлено.");
          
          
        });
        
        jqXHR.fail(function (responce) {
		  
			alert("Произошла ошибка! Попробуйте позднее.");
          
        });
      
	});
	
	//----------------------
});

