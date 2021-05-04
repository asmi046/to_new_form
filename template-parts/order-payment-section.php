<section class="order-payment">
	<div class="inner">
		<h1>Оплата заказа</h1>
		<table class="order-payment__table">
			<tr>
				<td>E-mail:</td>
				<td><?echo $_REQUEST["email"];?></td>
			</tr>
			<tr>
				<td>Категория:</td>
				<td><?echo $_REQUEST["categoria"];?></td>
			</tr>
			<tr>
				<td>Марка:</td>
				<td><?echo $_REQUEST["marka"];?></td>
			</tr>
			<tr>
				<td>Модель:</td>
				<td><?echo $_REQUEST["model"];?></td>
			</tr>
			<tr>
				<td>Госномер:</td>
				<td><?echo $_REQUEST["gosnomer"];?></td>
			</tr>
			<tr>
				<td>Мощность ЛС:</td>
				<td><?echo $_REQUEST["power"];?></td>
			</tr>
			<tr>
				<td>Стоимость страховки:</td>
				<td><?echo $_REQUEST["price"];?> руб.</td>
			</tr>
		</table>

		<script src="https://securepayments.sberbank.ru/payment/docsite/assets/js/ipay.js"></script>
		<script>
			var ipay = new IPAY({api_token: 'o7bp9mkcij0o04qsmh2pknfm6h'});
			
		</script>

		<script>
			function showSuccessfulPurchase(order) {
				jQuery(".order-result").html("<span class = ' amountBlka amountSucses'>Ваш заказ №"+order.orderNumber+" оплачен!</span>");
				console.log(order);
			}
			
			function showFailurefulPurchase(order) {
				jQuery(".order-result").html("<span class = ' amountBlka amountFaild'>Во время оплаты произошла ошибка!</span>");
				console.log(order);
			}
		</script>

		<button type="submit" class="btn btn_uni"
		
		onclick="event.preventDefault(); ipayCheckout({
			amount:<?php echo $_GET['price']?>,
			currency:'RUB',
			order_number:'',
			description: 'Данные страхователя: email: <?php echo $_GET['email']?> Автомобиль: <?php echo $_GET['marka']?> <?php echo $_GET['model']?>  Категория: <?php echo $_GET['categoria']?>  Госномер: <?php echo $_GET['gosnomer']?> Мощность (ЛС): <?php echo $_GET['power']?>'},
			function(order) { showSuccessfulPurchase(order) },
			function(order) { showFailurefulPurchase(order) })"
		
		>Оплатить</button>
	</div>
</section>