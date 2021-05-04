<? if (empty($_COOKIE["cityChec"])) {?>
	<div class="city_vsp_vin">
		<div class="qq">Ваш город <br/><span style="city_in_win"><? echo $GLOBALS["city"];?></span>?</div>
		<div class="qq_btn">
			<button class="yes_no_btn yes_btn yes_btn_sv btn btn-pink">Да, спасибо</button>
			<button class="yes_no_btn no_btn no_btn_sv btn btn-pink">Нет, другой</button>
		</div>
	</div> 
<?}?>