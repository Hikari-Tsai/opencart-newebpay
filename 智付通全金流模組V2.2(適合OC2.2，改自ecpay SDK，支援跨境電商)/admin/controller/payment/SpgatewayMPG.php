<?php

class ControllerPaymentSpgatewayMPG extends Controller {
	
	private $error = array();
	private $require_settings = array('merchant_id', 'hash_key', 'hash_iv', 'expiredate', 'storename');

	public function index() {
		# Load the translation file
		$this->load->language('payment/SpgatewayMPG');
		
		# Set the title
		$heading_title = $this->language->get('heading_title');
		$this->document->setTitle($heading_title);
		$data['heading_title'] = $heading_title;
		
		# Load the Setting
		$this->load->model('setting/setting');
		
		# Process the saving setting
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			# Save the setting
			$this->model_setting_setting->editSetting('SpgatewayMPG', $this->request->post);
			
			# Define the success message
			$this->session->data['success'] = $this->language->get('SpgatewayMPG_text_success');
			
			# Back to the payment list
			$this->response->redirect($this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'));
		}
		
		# Get the translation
		$data['SpgatewayMPG_text_status'] = $this->language->get('SpgatewayMPG_text_status');
		$data['SpgatewayMPG_text_enabled'] = $this->language->get('SpgatewayMPG_text_enabled');
		$data['SpgatewayMPG_text_disabled'] = $this->language->get('SpgatewayMPG_text_disabled');
		$data['SpgatewayMPG_text_merchant_id'] = $this->language->get('SpgatewayMPG_text_merchant_id');
		$data['SpgatewayMPG_text_hash_key'] = $this->language->get('SpgatewayMPG_text_hash_key');
		$data['SpgatewayMPG_text_hash_iv'] = $this->language->get('SpgatewayMPG_text_hash_iv');
		$data['SpgatewayMPG_text_expiredate'] = $this->language->get('SpgatewayMPG_text_expiredate');
		$data['SpgatewayMPG_text_payment_methods'] = $this->language->get('SpgatewayMPG_text_payment_methods');
		$data['SpgatewayMPG_text_credit'] = $this->language->get('SpgatewayMPG_text_credit');
		$data['SpgatewayMPG_text_credit_3'] = $this->language->get('SpgatewayMPG_text_credit_3');
		$data['SpgatewayMPG_text_credit_6'] = $this->language->get('SpgatewayMPG_text_credit_6');
		$data['SpgatewayMPG_text_credit_12'] = $this->language->get('SpgatewayMPG_text_credit_12');
		$data['SpgatewayMPG_text_credit_18'] = $this->language->get('SpgatewayMPG_text_credit_18');
		$data['SpgatewayMPG_text_credit_24'] = $this->language->get('SpgatewayMPG_text_credit_24');
		$data['SpgatewayMPG_text_webatm'] = $this->language->get('SpgatewayMPG_text_webatm');
		$data['SpgatewayMPG_text_atm'] = $this->language->get('SpgatewayMPG_text_atm');
		$data['SpgatewayMPG_text_cvs'] = $this->language->get('SpgatewayMPG_text_cvs');
		$data['SpgatewayMPG_text_barcode'] = $this->language->get('SpgatewayMPG_text_barcode');
		$data['SpgatewayMPG_text_unionpay'] = $this->language->get('SpgatewayMPG_text_unionpay');
		$data['SpgatewayMPG_text_alipay'] = $this->language->get('SpgatewayMPG_text_alipay');

		$data['SpgatewayMPG_text_create_status'] = $this->language->get('SpgatewayMPG_text_create_status');
		$data['SpgatewayMPG_text_getcode_status'] = $this->language->get('SpgatewayMPG_text_getcode_status');
		$data['SpgatewayMPG_text_success_status'] = $this->language->get('SpgatewayMPG_text_success_status');
		$data['SpgatewayMPG_text_failed_status'] = $this->language->get('SpgatewayMPG_text_failed_status');

		$data['SpgatewayMPG_text_geo_zone'] = $this->language->get('SpgatewayMPG_text_geo_zone');
		$data['SpgatewayMPG_text_all_zones'] = $this->language->get('SpgatewayMPG_text_all_zones');
		$data['SpgatewayMPG_text_sort_order'] = $this->language->get('SpgatewayMPG_text_sort_order');
		$data['SpgatewayMPG_text_test_mode'] = $this->language->get('SpgatewayMPG_text_test_mode');

		$data['SpgatewayMPG_text_conditioninsflag'] = $this->language->get('SpgatewayMPG_text_conditioninsflag');
		$data['SpgatewayMPG_entry_insflagday'] = $this->language->get('SpgatewayMPG_entry_insflagday');
		$data['SpgatewayMPG_entry_insflagmode'] = $this->language->get('SpgatewayMPG_entry_insflagmode');

		$data['SpgatewayMPG_text_storename'] = $this->language->get('SpgatewayMPG_text_storename');

		# Get the error
		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
		
		# Get the error of the require fields
		foreach ($this->require_settings as $setting_name) {
			$tmp_error_name = 'SpgatewayMPG_error_' . $setting_name;
			if(isset($this->error[$tmp_error_name])) {
				$data[$tmp_error_name] = $this->error[$tmp_error_name];
			} else {
				$data[$tmp_error_name] = '';
			}
		}
		//$data['SpgatewayMPG_error_expiredate'] = $this->error['SpgatewayMPG_error_expiredate'];
		
		# Set the breadcrumbs
		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('SpgatewayMPG_text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('SpgatewayMPG_text_payment'),
			'href' => $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL')
		);
		$data['breadcrumbs'][] = array(
			'text' => $heading_title,
			'href' => $this->url->link('payment/SpgatewayMPG', 'token=' . $this->session->data['token'], 'SSL')
		);
		
		# Set the form action
		$data['SpgatewayMPG_action'] = $this->url->link('payment/SpgatewayMPG', 'token=' . $this->session->data['token'], 'SSL');
		
		# Set the cancel button
		$data['SpgatewayMPG_cancel'] = $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL');
		
		# Get SpgatewayMPG setting
		$SpgatewayMPG_settings = array(
			'status',
			'test_mode',
			'merchant_id',
			'hash_key',
			'hash_iv',
			'payment_methods',
            'create_status',
            'getcode_status',
            'success_status',
            'failed_status',
			'geo_zone_id',
			'sort_order',
			'expiredate',
			//'insflagday',
			'insflagday_3',
			'insflagday_6',
			'insflagday_12',
			'insflagday_18',
			'insflagday_24',
			'insflagday_30',
			//'insflagmode',
			'storename',
		);
		foreach ($SpgatewayMPG_settings as $setting_name) {
			$tmp_setting_name = 'SpgatewayMPG_' . $setting_name;
			if (isset($this->request->post[$tmp_setting_name])) {
				$data[$tmp_setting_name] = $this->request->post[$tmp_setting_name];
			} else {
				$data[$tmp_setting_name] = $this->config->get($tmp_setting_name);
			}
		}
		//$data['test_mode'] = (isset($this->request->post[$this->SpgatewayMPG_test_mode])) ? $this->request->post[$this->SpgatewayMPG_test_mode] : $this->config->get($this->SpgatewayMPG_test_mode);

		// Default value
        $default_config = array(
            'SpgatewayMPG_storename' => '信用卡、超商付款與轉帳(藍新金流加密安全連線)',
            'SpgatewayMPG_merchant_id' => '',
            'SpgatewayMPG_hash_key' => '',
            'SpgatewayMPG_hash_iv' => '',
            'SpgatewayMPG_expiredate' => '',//1,
            'SpgatewayMPG_create_status' => 1,
            'SpgatewayMPG_success_status' => 15,
            //'SpgatewayMPG_insflagday' =>'',
            //'SpgatewayMPG_insflagmode' =>''
            //'SpgatewayMPG_status' => '',
        );
        foreach ($default_config as $name => $value) {
            if (is_null($data[$name])) {
                $data[$name] = $value;
            }
        }

        # Get the order statuses
        $this->load->model('localisation/order_status');
        $data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
		
		# Get the geo zone
		$this->load->model('localisation/geo_zone');
		$data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
		
		# View's setting
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		
		$this->response->setOutput($this->load->view('payment/SpgatewayMPG.tpl', $data));
	}
	
	protected function validate() {
		if (!$this->user->hasPermission('modify', 'payment/SpgatewayMPG')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		foreach ($this->require_settings as $setting_name) {
			if (!$this->request->post['SpgatewayMPG_' . $setting_name]) {
				$this->error['SpgatewayMPG_error_' . $setting_name] = $this->language->get('SpgatewayMPG_error_' . $setting_name);
			}
		}
		if (($this->request->post['SpgatewayMPG_expiredate'] < 1) || ($this->request->post['SpgatewayMPG_expiredate'] > 180)) {
			$this->error['SpgatewayMPG_error_expiredate'] = $this->language->get('SpgatewayMPG_error_expiredate');

		}
		return !$this->error; 
	}
}
