<section class="kom-p">
	<div class="inner">
		<h1>Сформировать комерческое предложение</h1>
		<form action="" class="kom-p__form" id = "kp_form">
			<div class="input-panel__field-box">
				<label for="email">* E-mail</label>
				<input type="email" id="email" name="email" class="email inputbox" placeholder="E-mail" value="<?echo $_REQUEST["email"]?>">
				<span class="err-message">Поле заполнено не корректно.</span>
			</div>
			<div class="input-panel__field-box">
				<label for="category">* Категория</label>
				<input type="text" name="category" id="category" class = "inputbox" placeholder="Категория" value="<?echo $_REQUEST["categoria"]?>">
				<span class="err-message">Поле заполнено не корректно.</span>
			</div>
			<div class="input-panel__field-box">
				<label for="marka">* Марка</label>
				<input type="text" name="marka" id="marka" placeholder="Марка"  class = "inputbox" value="<?echo $_REQUEST["marka"]?>">
				<span class="err-message">Поле заполнено не корректно.</span>
			</div>
			<div class="input-panel__field-box">
				<label for="model">* Модель</label>
				<input type="text" name="model" id="model" placeholder="Модель"  class = "inputbox" value="<?echo $_REQUEST["model"]?>">
				<span class="err-message">Поле заполнено не корректно.</span>
			</div>
			<div class="input-panel__field-box">
				<label for="number">* Госномер</label>
				<input type="text" name="number" id="number" placeholder="Госномер"  class = "inputbox" value="<?echo $_REQUEST["gosnomer"]?>">
				<span class="err-message">Поле заполнено не корректно.</span>
			</div>
			<div class="input-panel__field-box">
				<label for="power">* Мощность ЛС</label>
				<input type="text" name="power" id="power" placeholder="Мощность ЛС"  class = "inputbox" value="<?echo $_REQUEST["power"]?>">
				<span class="err-message">Поле заполнено не корректно.</span>
			</div>
			<div class="input-panel__field-box">
				<label for="price">* Стоимость страховки</label>
				<input required type="text" name="price" id="price"  class = "inputbox" placeholder="Стоимость страховки">
				<span class="err-message">Поле заполнено не корректно.</span>
			</div>
			<div class = "btn_wraper">
				<button type="submit" class="btn btn_uni offer-submit">Сформировать</button>
			</div>
		</form>
	</div>
</section>