<section class="banner">
  <div class="inner clearfix">
    <div class="text-container text-container-thencs">
      <h1>
       Благодарим за <br>ОБРАЩЕНИЕ
      </h1>
      <ul class = "thencs_list">
        <li>Наши менеджеры свяжутся с Вами в течение 3 минут.</li>
        <li>Так же Вы можете оплатить услугу техосмотра On-Line:</li>
      </ul>

      <a href="#" id = "pay_to_btn" class="btn">Оплатить</a>
    
      <div class="decor-element">
        <img src="<?php echo get_template_directory_uri();?>/img/car.png" class="spacer" alt="">
      </div>


      <!-- Скрипт оплаты Сбербанка -->
      <script>
								function showSuccessfulPurchase(order) {
									jQuery(".order-result").html("<span class = ' amountBlka amountSucses'>Ваш заказ №"+order.orderNumber+" оплачен!</span>");
									console.log(order);
								}

								function showFailurefulPurchase(order) {
									jQuery(".order-result").html("<span class = ' amountBlka amountFaild'>Во время оплаты произошла ошибка!</span>");
									console.log(order);
								}

                let payBtn = document.getElementById("pay_to_btn");
                if (payBtn != undefined)
                payBtn.addEventListener('click', function(e) {

									e.preventDefault();

									let name = getAllUrlParams().n;
									let tel = getAllUrlParams().t;;
									let mail = getAllUrlParams().ml;
									let summ = getAllUrlParams().sm;

									let descriptionM = "Данные страхователя: "
									+"Имя: "+name+"\n\r"
									+"Телефон: "+tel+"\n\r"
									+"e-mail: "+mail+"\n\r";

									console.log(descriptionM);

									let bid = getAllUrlParams().zn;

									ipayCheckout({
										amount: summ,
										currency:'RUB',
										order_number:bid,
										description: descriptionM},
										function(order) { showSuccessfulPurchase(order) },
										function(order) { showFailurefulPurchase(order) })

                }, false);

								// jQuery("#pay_to_btn").on('click', function(e) {

								// });
							</script>

    </div>
  </div>
</section>