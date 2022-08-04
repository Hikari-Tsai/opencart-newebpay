<form class="form-horizontal" action="<?php echo $SpgatewayMPG_action; ?>" method="POST" id="SpgatewayMPG_redirect_form">
	<fieldset>
		<legend><?php echo $SpgatewayMPG_text_title ?></legend>
		<div><?php echo $SpgatewayMPG_text_detail ?></div><!--Hikari-->

		<!--<div class="form-group">
			<label class="col-sm-2 control-label">
				<?php echo $SpgatewayMPG_text_payment_methods; ?>
			</label>
			<div class="col-sm-2">
				<select name="SpgatewayMPG_choose_payment" class="form-control">
					<?php foreach ($payment_methods as $payment_type => $payment_desc) { ?>
					<option value="<?php echo $payment_type; ?>"><?php echo $payment_desc; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>-->
		<input type="hidden" name="SpgatewayMPG_choose_payment" value="Credit"><!--Hikari-->
		<div class="buttons">
			<div class="pull-right">
				<input type="button" value="<?php echo $SpgatewayMPG_text_checkout_button; ?>" id="SpgatewayMPG_checkout_button" class="btn btn-primary" onclick="document.getElementById('SpgatewayMPG_redirect_form').submit();"/>
			</div>
		</div>
	</fieldset>
</form>
