<?php

class ModelPaymentSpgatewayMPG extends Model {
	private $trans = array();
	
	public function getMethod($address, $total) {
		# Condition check
		$SpgatewayMPG_geo_zone_id = $this->config->get('SpgatewayMPG_geo_zone_id');
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "zone_to_geo_zone` WHERE geo_zone_id = '" . (int)$SpgatewayMPG_geo_zone_id . "' AND country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");
		$status = false;
		if ($total <= 0) {
			$status = false;
		} elseif (!$SpgatewayMPG_geo_zone_id) {
			$status = true;
		} elseif ($query->num_rows) {
			$status = true;
		} else {
			$status = false;
		}

		# Set the payment method parameters
		$this->load->language('payment/SpgatewayMPG');
		$method_data = array();
		if ($status) {
			$method_data = array(
				'code' => 'SpgatewayMPG',
				'title' => $this->config->get('SpgatewayMPG_storename'),//$this->language->get('SpgatewayMPG_text_title'),
				'terms' => '',
				'sort_order' => $this->config->get('SpgatewayMPG_sort_order')
			);
		}
		
		return $method_data;
	}
	
	public function vaildatePayment($payment) {
		$payment_methods = $this->config->get('SpgatewayMPG_payment_methods');
		if (isset($payment_methods[$payment])) {
			return true;
		} else {
			return false;
		}
	}
	
	public function invokeSpgatewayMPGModule() {
		if (!class_exists('SpgatewayMPG_AllInOne', false)) {
			if (!include('SpgatewayMPG.Payment.Integration.php')) {
				$this->load->language('payment/SpgatewayMPG');
				return false;
			}
		}
		
		return true;
	}
	
	public function isTestMode($SpgatewayMPG_status) {
		if ($SpgatewayMPG_merchant_id == 'MS33421905' or $SpgatewayMPG_merchant_id == '2000214') { //Hikari
			return true;
		} else {
			return false;
		}
	}
	
	public function getCartOrderID($merchant_trade_no, $SpgatewayMPG_merchant_id) {
		$cart_order_id = $merchant_trade_no;
		if ($this->isTestMode($SpgatewayMPG_merchant_id)) {
			$cart_order_id = substr($merchant_trade_no, 14);
		}
		
		return $cart_order_id;
	}
	
	public function formatOrderTotal($order_total) {
		return intval(round($order_total));
	}
	
	public function getPaymentMethod($payment_type) {
		$info_pieces = explode('_', $payment_type);
		
		return $info_pieces[0];
	}

	public function logMessage($message) {
		$log = new Log('SpgatewayMPG_return_url.log');
		$log->write($message);
	}
	
}
