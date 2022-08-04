<form class="form-horizontal" action="<?php echo $SpgatewayMPG2_action; ?>" method="POST" id="SpgatewayMPG2_redirect_form">
	<fieldset>
		<legend><?php echo $SpgatewayMPG2_text_title ?></legend>
		<div><?php echo $SpgatewayMPG2_text_detail ?></div><!--Hikari-->

		<!--<div class="form-group">
			<label class="col-sm-2 control-label">
				<?php echo $SpgatewayMPG2_text_payment_methods; ?>
			</label>
			<div class="col-sm-2">
				<select name="SpgatewayMPG2_choose_payment" class="form-control">
					<?php foreach ($payment_methods as $payment_type => $payment_desc) { ?>
					<option value="<?php echo $payment_type; ?>"><?php echo $payment_desc; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>-->
		<input type="hidden" name="SpgatewayMPG2_choose_payment" value="Credit"><!--Hikari-->
		<div class="buttons">
			<div class="pull-right">
				<input type="button" value="<?php echo $SpgatewayMPG2_text_checkout_button; ?>" id="SpgatewayMPG2_checkout_button" class="btn btn-primary" onclick="document.getElementById('SpgatewayMPG2_redirect_form').submit();"/>
			</div>
		</div>
	</fieldset>
</form>
