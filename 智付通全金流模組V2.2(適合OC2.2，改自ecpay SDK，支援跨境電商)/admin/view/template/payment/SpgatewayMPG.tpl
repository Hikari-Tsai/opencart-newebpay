<?php echo $header; ?>
<?php echo $column_left; ?>
<div id="content">
	<div class="page-header">
		<div class="container-fluid">
			<div class="pull-right">
				<button type="submit" form="form_SpgatewayMPG" class="btn btn-primary">
					<i class="fa fa-save"></i>
				</button>
				<a href="<?php echo $SpgatewayMPG_cancel; ?>" class="btn btn-default">
					<i class="fa fa-reply"></i>
				</a>
			</div>
			<ul class="breadcrumb">
			<?php foreach ($breadcrumbs as $breadcrumb) { ?>
				<li>
					<a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
				</li>
			<?php } ?>
			</ul>
		</div>
	</div>
	<div class="container-fluid">
		<?php if ($error_warning) { ?>
		<div class="alert alert-danger">
			<i class="fa fa-exclamation-circle"></i>
			&nbsp;<?php echo $error_warning; ?>
			<button type="button" class="close" data-dismiss="alert">&times;</button>
		</div>
		<?php } ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-pencil"></i>
					&nbsp;<?php echo $heading_title; ?>
				</h3>
			</div>
			<div class="panel-body">
				<form action="<?php echo $SpgatewayMPG_action; ?>" method="post" enctype="multipart/form-data" id="form_SpgatewayMPG" class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $SpgatewayMPG_text_status; ?>
						</label>
						<div class="col-sm-2">
							<?php $selected = ' selected="selected"'; ?>
							<select name="SpgatewayMPG_status" class="form-control">
								<option value="0"<?php if (!$SpgatewayMPG_status) { echo $selected; } ?>><?php echo $SpgatewayMPG_text_disabled; ?></option>
								<option value="1"<?php if ($SpgatewayMPG_status) { echo $selected; } ?>><?php echo $SpgatewayMPG_text_enabled; ?></option>
							</select>
						</div>
					</div>
					<div class="form-group required">
                        <label class="col-sm-2 control-label">
                        	<?php echo $SpgatewayMPG_text_test_mode; ?>
                        </label>
                        <div class="col-sm-2">
                            <select name="SpgatewayMPG_test_mode" class="form-control">
                            	<option value="0"<?php if (!$SpgatewayMPG_test_mode) { echo $selected; } ?>>No</option>
								<option value="1"<?php if ($SpgatewayMPG_test_mode) { echo $selected; } ?>>Yes</option>
                                <!--<option value="1" <?php //echo ($test_mode ? 'selected="selected"' : ''); ?> >Yes</option>
                                <option value="0" <?php //echo (!$test_mode ? 'selected="selected"' : ''); ?> >No</option>-->
                            </select>
                        </div>
                    </div>
                    <div class="form-group required">
						<label class="col-sm-2 control-label">
							<?php echo $SpgatewayMPG_text_storename; ?>
						</label>
						<div class="col-sm-2">
							<input type="text" name="SpgatewayMPG_storename" value="<?php echo $SpgatewayMPG_storename; ?>" class="form-control" />
						</div>
						<div class="text-danger"><?php echo $SpgatewayMPG_error_storename; ?></div>
					</div>
					<div class="form-group required">
						<label class="col-sm-2 control-label">
							<?php echo $SpgatewayMPG_text_merchant_id; ?>
						</label>
						<div class="col-sm-2">
							<input type="text" name="SpgatewayMPG_merchant_id" value="<?php echo $SpgatewayMPG_merchant_id; ?>" class="form-control" />
						</div>
						<div class="text-danger"><?php echo $SpgatewayMPG_error_merchant_id; ?></div>
					</div>
					<div class="form-group required">
						<label class="col-sm-2 control-label">
							<?php echo $SpgatewayMPG_text_hash_key; ?>
						</label>
						<div class="col-sm-4">
							<input type="text" name="SpgatewayMPG_hash_key" value="<?php echo $SpgatewayMPG_hash_key; ?>" class="form-control" />
						</div>
						<div class="text-danger"><?php echo $SpgatewayMPG_error_hash_key; ?></div>
					</div>
					<div class="form-group required">
						<label class="col-sm-2 control-label">
							<?php echo $SpgatewayMPG_text_hash_iv; ?>
						</label>
						<div class="col-sm-4">
							<input type="text" name="SpgatewayMPG_hash_iv" value="<?php echo $SpgatewayMPG_hash_iv; ?>" class="form-control" />
						</div>
						<div class="text-danger"><?php echo $SpgatewayMPG_error_hash_iv; ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $SpgatewayMPG_text_payment_methods; ?>
						</label>
						<div class="col-sm-4">
							<?php $checked = ' checked="checked"'; ?>
							<input type="checkbox" name="SpgatewayMPG_payment_methods[CREDIT]" value="1"<?php if (isset($SpgatewayMPG_payment_methods['CREDIT'])) { echo $checked; }	?> />
							<label class="control-label">
								&nbsp;<?php echo $SpgatewayMPG_text_credit; ?>
							</label>
							<br />
							<!--<input type="checkbox" name="SpgatewayMPG_payment_methods[Credit_3]" value="credit_3"<?php if (isset($SpgatewayMPG_payment_methods['Credit_3'])) { echo $checked; }	?> />
							<label class="control-label">
								&nbsp;<?php echo $SpgatewayMPG_text_credit_3; ?>
							</label>
							<br />
							<input type="checkbox" name="SpgatewayMPG_payment_methods[Credit_6]" value="credit_6"<?php if (isset($SpgatewayMPG_payment_methods['Credit_6'])) { echo $checked; }	?> />
							<label class="control-label">
								&nbsp;<?php echo $SpgatewayMPG_text_credit_6; ?>
							</label>
							<br />
							<input type="checkbox" name="SpgatewayMPG_payment_methods[Credit_12]" value="credit_12"<?php if (isset($SpgatewayMPG_payment_methods['Credit_12'])) { echo $checked; }	?> />
							<label class="control-label">
								&nbsp;<?php echo $SpgatewayMPG_text_credit_12; ?>
							</label>
							<br />
							<input type="checkbox" name="SpgatewayMPG_payment_methods[Credit_18]" value="credit_18"<?php if (isset($SpgatewayMPG_payment_methods['Credit_18'])) { echo $checked; }	?> />
							<label class="control-label">
								&nbsp;<?php echo $SpgatewayMPG_text_credit_18; ?>
							</label>
							<br />
							<input type="checkbox" name="SpgatewayMPG_payment_methods[Credit_24]" value="credit_24"<?php if (isset($SpgatewayMPG_payment_methods['Credit_24'])) { echo $checked; }	?> />
							<label class="control-label">
								&nbsp;<?php echo $SpgatewayMPG_text_credit_24; ?>
							</label>
							<br />-->
							<input type="checkbox" name="SpgatewayMPG_payment_methods[WEBATM]" value="1"<?php if (isset($SpgatewayMPG_payment_methods['WEBATM'])) { echo $checked; }	?> />
							<label class="control-label">
								&nbsp;<?php echo $SpgatewayMPG_text_webatm; ?>
							</label>
							<br />
							<input type="checkbox" name="SpgatewayMPG_payment_methods[VACC]" value="1"<?php if (isset($SpgatewayMPG_payment_methods['VACC'])) { echo $checked; }	?> />
							<label class="control-label">
								&nbsp;<?php echo $SpgatewayMPG_text_atm; ?>
							</label>
							<br />
							<input type="checkbox" name="SpgatewayMPG_payment_methods[CVS]" value="1"<?php if (isset($SpgatewayMPG_payment_methods['CVS'])) { echo $checked; }	?> />
							<label class="control-label">
								&nbsp;<?php echo $SpgatewayMPG_text_cvs; ?>
							</label>
							<br />
							<input type="checkbox" name="SpgatewayMPG_payment_methods[BARCODE]" value="1"<?php if (isset($SpgatewayMPG_payment_methods['BARCODE'])) { echo $checked; }	?> />
							<label class="control-label">
								&nbsp;<?php echo $SpgatewayMPG_text_barcode; ?>
							</label>
							<br />
							<input type="checkbox" name="SpgatewayMPG_payment_methods[UNIONPAY]" value="1"<?php if (isset($SpgatewayMPG_payment_methods['UNIONPAY'])) { echo $checked; }	?> />
							<label class="control-label">
								&nbsp;<?php echo $SpgatewayMPG_text_unionpay; ?>
							</label>
							<br />
							<input type="checkbox" name="SpgatewayMPG_payment_methods[ALIPAY]" value="1"<?php if (isset($SpgatewayMPG_payment_methods['ALIPAY'])) { echo $checked; }	?> />
							<label class="control-label">
								&nbsp;<?php echo $SpgatewayMPG_text_alipay; ?>
							</label>
							<br />
						</div>
					</div>
					<div class="form-group required">
						<label class="col-sm-2 control-label">
							<?php echo $SpgatewayMPG_text_expiredate; ?>
						</label>
						<div class="col-sm-2">
							<input type="text" name="SpgatewayMPG_expiredate" value="<?php echo $SpgatewayMPG_expiredate; ?>" class="form-control" />
						</div>
						<div class="text-danger"><?php echo $SpgatewayMPG_error_expiredate; ?></div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $SpgatewayMPG_text_credit_3; ?>
						</label>
						<div class="col-sm-4">
							<input type="text" name="SpgatewayMPG_insflagday_3" value="<?php echo $SpgatewayMPG_insflagday_3; ?>" class="form-control" placeholder="<?php echo $SpgatewayMPG_entry_insflagday; ?>" />
						</div>
				
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $SpgatewayMPG_text_credit_6; ?>
						</label>
						<div class="col-sm-4">
							<input type="text" name="SpgatewayMPG_insflagday_6" value="<?php echo $SpgatewayMPG_insflagday_6; ?>" class="form-control" placeholder="<?php echo $SpgatewayMPG_entry_insflagday; ?>" />
						</div>
						
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $SpgatewayMPG_text_credit_12 ?>
						</label>
						<div class="col-sm-4">
							<input type="text" name="SpgatewayMPG_insflagday_12" value="<?php echo $SpgatewayMPG_insflagday_12; ?>" class="form-control" placeholder="<?php echo $SpgatewayMPG_entry_insflagday; ?>" />
						</div>
						
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $SpgatewayMPG_text_credit_18; ?>
						</label>
						<div class="col-sm-4">
							<input type="text" name="SpgatewayMPG_insflagday_18" value="<?php echo $SpgatewayMPG_insflagday_18; ?>" class="form-control" placeholder="<?php echo $SpgatewayMPG_entry_insflagday; ?>" />
						</div>
						
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $SpgatewayMPG_text_credit_24; ?>
						</label>
						<div class="col-sm-4">
							<input type="text" name="SpgatewayMPG_insflagday_24" value="<?php echo $SpgatewayMPG_insflagday_24; ?>" class="form-control" placeholder="<?php echo $SpgatewayMPG_entry_insflagday; ?>" />
						</div>
						
					</div>
					<!--<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $SpgatewayMPG_text_conditioninsflag; ?>(30-Month)
						</label>
						<div class="col-sm-4">
							<input type="text" name="SpgatewayMPG_insflagday_30" value="<?php echo $SpgatewayMPG_insflagday_30; ?>" class="form-control" placeholder="<?php echo $SpgatewayMPG_entry_insflagday; ?>" />
						</div>
						
					</div>-->

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-create-status">
                            <?php echo $SpgatewayMPG_text_create_status; ?>
                        </label>
                        <div class="col-sm-2">
                            <select name="SpgatewayMPG_create_status" id="input-create-status" class="form-control">
                                <?php foreach ($order_statuses as $order_status) { ?>
                                    <option value="<?php echo $order_status['order_status_id']; ?>"<?php if ($order_status['order_status_id'] == $SpgatewayMPG_create_status) { echo ' selected="selected"'; } ?>>
                                        <?php echo $order_status['name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-getcode-status">
                            <?php echo $SpgatewayMPG_text_getcode_status; ?>
                        </label>
                        <div class="col-sm-2">
                            <select name="SpgatewayMPG_getcode_status" id="input-getcode-status" class="form-control">
                                <?php foreach ($order_statuses as $order_status) { ?>
                                    <option value="<?php echo $order_status['order_status_id']; ?>"<?php if ($order_status['order_status_id'] == $SpgatewayMPG_getcode_status) { echo ' selected="selected"'; } ?>>
                                        <?php echo $order_status['name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-success-status">
                            <?php echo $SpgatewayMPG_text_success_status; ?>
                        </label>
                        <div class="col-sm-2">
                            <select name="SpgatewayMPG_success_status" id="input-success-status" class="form-control">
                                <?php foreach ($order_statuses as $order_status) { ?>
                                    <option value="<?php echo $order_status['order_status_id']; ?>"<?php if ($order_status['order_status_id'] == $SpgatewayMPG_success_status) { echo ' selected="selected"'; } ?>>
                                        <?php echo $order_status['name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-failed-status">
                            <?php echo $SpgatewayMPG_text_failed_status; ?>
                        </label>
                        <div class="col-sm-2">
                            <select name="SpgatewayMPG_failed_status" id="input-failed-status" class="form-control">
                                <?php foreach ($order_statuses as $order_status) { ?>
                                    <option value="<?php echo $order_status['order_status_id']; ?>"<?php if ($order_status['order_status_id'] == $SpgatewayMPG_failed_status) { echo ' selected="selected"'; } ?>>
                                        <?php echo $order_status['name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $SpgatewayMPG_text_geo_zone; ?>
						</label>
						<div class="col-sm-2">
							<select name="SpgatewayMPG_geo_zone_id" class="form-control">
								<option value="0"><?php echo $SpgatewayMPG_text_all_zones; ?></option>
								<?php
								foreach ($geo_zones as $geo_zone) {
									$selected = "";
									if ($geo_zone['geo_zone_id'] == $SpgatewayMPG_geo_zone_id) {
										$selected = ' selected="selected"';
									}
									echo '<option value="' . $geo_zone['geo_zone_id'] . '"' . $selected . '>' . $geo_zone['name'] . '</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $SpgatewayMPG_text_sort_order; ?>
						</label>
						<div class="col-sm-2">
							<input type="text" name="SpgatewayMPG_sort_order" value="<?php echo $SpgatewayMPG_sort_order; ?>" class="form-control" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php echo $footer; ?>