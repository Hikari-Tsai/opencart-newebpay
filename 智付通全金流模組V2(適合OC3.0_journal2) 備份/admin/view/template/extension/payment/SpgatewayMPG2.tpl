<?php echo $header; ?>
<?php echo $column_left; ?>
<div id="content">
	<div class="page-header">
		<div class="container-fluid">
			<div class="pull-right">
				<button type="submit" form="form-SpgatewayMPG2" class="btn btn-primary">
					<i class="fa fa-save"></i>
				</button>
				<a href="<?php echo $SpgatewayMPG2_cancel; ?>" class="btn btn-default">
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
				<form action="<?php echo $SpgatewayMPG2_action; ?>" method="post" enctype="multipart/form-data" id="form_SpgatewayMPG2" class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $SpgatewayMPG2_text_status; ?>
						</label>
						<div class="col-sm-2">
							<?php $selected = ' selected="selected"'; ?>
							<select name="payment_SpgatewayMPG2_status" class="form-control">
								<option value="0"<?php if (!$SpgatewayMPG2_status) { echo $selected; } ?>><?php echo $SpgatewayMPG2_text_disabled; ?></option>
								<option value="1"<?php if ($SpgatewayMPG2_status) { echo $selected; } ?>><?php echo $SpgatewayMPG2_text_enabled; ?></option>
							</select>
						</div>
					</div>
					<div class="form-group required">
                        <label class="col-sm-2 control-label">
                        	<?php echo $SpgatewayMPG2_text_test_mode; ?>
                        </label>
                        <div class="col-sm-2">
                            <select name="payment_SpgatewayMPG2_test_mode" class="form-control">
                            	<option value="0"<?php if (!$SpgatewayMPG2_test_mode) { echo $selected; } ?>>No</option>
								<option value="1"<?php if ($SpgatewayMPG2_test_mode) { echo $selected; } ?>>Yes</option>
                                <!--<option value="1" <?php //echo ($test_mode ? 'selected="selected"' : ''); ?> >Yes</option>
                                <option value="0" <?php //echo (!$test_mode ? 'selected="selected"' : ''); ?> >No</option>-->
                            </select>
                        </div>
                    </div>
                    <div class="form-group required">
						<label class="col-sm-2 control-label">
							<?php echo $SpgatewayMPG2_text_storename; ?>
						</label>
						<div class="col-sm-2">
							<input type="text" name="payment_SpgatewayMPG2_storename" value="<?php echo $payment_SpgatewayMPG2_storename; ?>" class="form-control" />
						</div>
						<div class="text-danger"><?php echo $SpgatewayMPG2_error_storename; ?></div>
					</div>
					<div class="form-group required">
						<label class="col-sm-2 control-label">
							<?php echo $SpgatewayMPG2_text_merchant_id; ?>
						</label>
						<div class="col-sm-2">
							<input type="text" name="payment_SpgatewayMPG2_merchant_id" value="<?php echo $payment_SpgatewayMPG2_merchant_id; ?>" class="form-control" />
						</div>
						<div class="text-danger"><?php echo $SpgatewayMPG2_error_merchant_id; ?></div>
					</div>
					<div class="form-group required">
						<label class="col-sm-2 control-label">
							<?php echo $SpgatewayMPG2_text_hash_key; ?>
						</label>
						<div class="col-sm-4">
							<input type="text" name="payment_SpgatewayMPG2_hash_key" value="<?php echo $payment_SpgatewayMPG2_hash_key; ?>" class="form-control" />
						</div>
						<div class="text-danger"><?php echo $SpgatewayMPG2_error_hash_key; ?></div>
					</div>
					<div class="form-group required">
						<label class="col-sm-2 control-label">
							<?php echo $SpgatewayMPG2_text_hash_iv; ?>
						</label>
						<div class="col-sm-4">
							<input type="text" name="payment_SpgatewayMPG2_hash_iv" value="<?php echo $payment_SpgatewayMPG2_hash_iv; ?>" class="form-control" />
						</div>
						<div class="text-danger"><?php echo $SpgatewayMPG2_error_hash_iv; ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $SpgatewayMPG2_text_payment_methods; ?>
						</label>
						<div class="col-sm-4">
							<?php $checked = ' checked="checked"'; ?>
							<input type="checkbox" name="payment_SpgatewayMPG2_payment_methods[CREDIT]" value="1"<?php if (isset($SpgatewayMPG2_payment_methods['CREDIT'])) { echo $checked; }	?> />
							<label class="control-label">
								&nbsp;<?php echo $SpgatewayMPG2_text_credit; ?>
							</label>
							<br />

							<input type="checkbox" name="payment_SpgatewayMPG2_payment_methods[WEBATM]" value="1"<?php if (isset($SpgatewayMPG2_payment_methods['WEBATM'])) { echo $checked; }	?> />
							<label class="control-label">
								&nbsp;<?php echo $SpgatewayMPG2_text_webatm; ?>
							</label>
							<br />
							<input type="checkbox" name="payment_SpgatewayMPG2_payment_methods[VACC]" value="1"<?php if (isset($SpgatewayMPG2_payment_methods['VACC'])) { echo $checked; }	?> />
							<label class="control-label">
								&nbsp;<?php echo $SpgatewayMPG2_text_atm; ?>
							</label>
							<br />
							<input type="checkbox" name="payment_SpgatewayMPG2_payment_methods[CVS]" value="1"<?php if (isset($SpgatewayMPG2_payment_methods['CVS'])) { echo $checked; }	?> />
							<label class="control-label">
								&nbsp;<?php echo $SpgatewayMPG2_text_cvs; ?>
							</label>
							<br />
							<input type="checkbox" name="payment_SpgatewayMPG2_payment_methods[BARCODE]" value="1"<?php if (isset($SpgatewayMPG2_payment_methods['BARCODE'])) { echo $checked; }	?> />
							<label class="control-label">
								&nbsp;<?php echo $SpgatewayMPG2_text_barcode; ?>
							</label>
							<br />
							<input type="checkbox" name="payment_SpgatewayMPG2_payment_methods[UNIONPAY]" value="1"<?php if (isset($SpgatewayMPG2_payment_methods['UNIONPAY'])) { echo $checked; }	?> />
							<label class="control-label">
								&nbsp;<?php echo $SpgatewayMPG2_text_unionpay; ?>
							</label>
							<br />
						</div>
					</div>
					<div class="form-group required">
						<label class="col-sm-2 control-label">
							<?php echo $SpgatewayMPG2_text_expiredate; ?>
						</label>
						<div class="col-sm-2">
							<input type="text" name="payment_SpgatewayMPG2_expiredate" value="<?php echo $payment_SpgatewayMPG2_expiredate; ?>" class="form-control" />
						</div>
						<div class="text-danger"><?php echo $SpgatewayMPG2_error_expiredate; ?></div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $SpgatewayMPG2_text_conditioninsflag; ?>
						</label>
						<div class="col-sm-4">
							<input type="text" name="payment_SpgatewayMPG2_insflagday" value="<?php echo $payment_SpgatewayMPG2_insflagday; ?>" class="form-control" placeholder="<?php echo $SpgatewayMPG2_entry_insflagday; ?>" />
						</div>
						<div class="col-sm-4">
							<input type="text" name="payment_SpgatewayMPG2_insflagmode" value="<?php echo $payment_SpgatewayMPG2_insflagmode; ?>" class="form-control" placeholder="<?php echo $SpgatewayMPG2_entry_insflagmode; ?>" />
						</div>
						
					</div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-create-status">
                            <?php echo $SpgatewayMPG2_text_create_status; ?>
                        </label>
                        <div class="col-sm-2">
                            <select name="payment_SpgatewayMPG2_create_status" id="input-create-status" class="form-control">
                                <?php foreach ($order_statuses as $order_status) { ?>
                                    <option value="<?php echo $order_status['order_status_id']; ?>"<?php if ($order_status['order_status_id'] == $SpgatewayMPG2_create_status) { echo ' selected="selected"'; } ?>>
                                        <?php echo $order_status['name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-getcode-status">
                            <?php echo $SpgatewayMPG2_text_getcode_status; ?>
                        </label>
                        <div class="col-sm-2">
                            <select name="payment_SpgatewayMPG2_getcode_status" id="input-getcode-status" class="form-control">
                                <?php foreach ($order_statuses as $order_status) { ?>
                                    <option value="<?php echo $order_status['order_status_id']; ?>"<?php if ($order_status['order_status_id'] == $SpgatewayMPG2_getcode_status) { echo ' selected="selected"'; } ?>>
                                        <?php echo $order_status['name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-success-status">
                            <?php echo $SpgatewayMPG2_text_success_status; ?>
                        </label>
                        <div class="col-sm-2">
                            <select name="payment_SpgatewayMPG2_success_status" id="input-success-status" class="form-control">
                                <?php foreach ($order_statuses as $order_status) { ?>
                                    <option value="<?php echo $order_status['order_status_id']; ?>"<?php if ($order_status['order_status_id'] == $SpgatewayMPG2_success_status) { echo ' selected="selected"'; } ?>>
                                        <?php echo $order_status['name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-failed-status">
                            <?php echo $SpgatewayMPG2_text_failed_status; ?>
                        </label>
                        <div class="col-sm-2">
                            <select name="payment_SpgatewayMPG2_failed_status" id="input-failed-status" class="form-control">
                                <?php foreach ($order_statuses as $order_status) { ?>
                                    <option value="<?php echo $order_status['order_status_id']; ?>"<?php if ($order_status['order_status_id'] == $SpgatewayMPG2_failed_status) { echo ' selected="selected"'; } ?>>
                                        <?php echo $order_status['name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $SpgatewayMPG2_text_geo_zone; ?>
						</label>
						<div class="col-sm-2">
							<select name="payment_SpgatewayMPG2_geo_zone_id" class="form-control">
								<option value="0"><?php echo $SpgatewayMPG2_text_all_zones; ?></option>
								<?php
								foreach ($geo_zones as $geo_zone) {
									$selected = "";
									if ($geo_zone['geo_zone_id'] == $SpgatewayMPG2_geo_zone_id) {
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
							<?php echo $SpgatewayMPG2_text_sort_order; ?>
						</label>
						<div class="col-sm-2">
							<input type="text" name="payment_SpgatewayMPG2_sort_order" value="<?php echo $SpgatewayMPG2_sort_order; ?>" class="form-control" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php echo $footer; ?>