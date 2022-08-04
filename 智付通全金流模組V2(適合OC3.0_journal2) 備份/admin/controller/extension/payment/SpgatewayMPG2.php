<?php
/**
 * @author     Hikari
 * @version    V2.1
 * @Website    https://quantummusiclab.com
 */

class ControllerExtensionPaymentSpgatewayMPG2 extends Controller {
	
	private $error = array();
	private $require_settings = array('merchant_id', 'hash_key', 'hash_iv', 'storename', 'expiredate');

	public function index() {
		# Load the translation file
		$this->load->language('extension/payment/SpgatewayMPG2');
		
		# Set the title
		$heading_title = $this->language->get('heading_title');
		$this->document->setTitle($heading_title);
		$data['heading_title'] = $heading_title;
		
		# Load the Setting
		$this->load->model('setting/setting');
		
		# Process the saving setting
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			# Save the setting
			$this->model_setting_setting->editSetting('payment_SpgatewayMPG2', $this->request->post);
			
			# Define the success message
			$this->session->data['success'] = $this->language->get('SpgatewayMPG2_text_success');
			
			# Back to the payment list
			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true));
		}
		
		# Get the translation
		$data['SpgatewayMPG2_text_status'] = $this->language->get('SpgatewayMPG2_text_status');
		$data['SpgatewayMPG2_text_enabled'] = $this->language->get('SpgatewayMPG2_text_enabled');
		$data['SpgatewayMPG2_text_disabled'] = $this->language->get('SpgatewayMPG2_text_disabled');
		$data['SpgatewayMPG2_text_merchant_id'] = $this->language->get('SpgatewayMPG2_text_merchant_id');
		$data['SpgatewayMPG2_text_hash_key'] = $this->language->get('SpgatewayMPG2_text_hash_key');
		$data['SpgatewayMPG2_text_hash_iv'] = $this->language->get('SpgatewayMPG2_text_hash_iv');
		$data['SpgatewayMPG2_text_expiredate'] = $this->language->get('SpgatewayMPG2_text_expiredate');
		$data['SpgatewayMPG2_text_payment_methods'] = $this->language->get('SpgatewayMPG2_text_payment_methods');
		$data['SpgatewayMPG2_text_credit'] = $this->language->get('SpgatewayMPG2_text_credit');
		$data['SpgatewayMPG2_text_credit_3'] = $this->language->get('SpgatewayMPG2_text_credit_3');
		$data['SpgatewayMPG2_text_credit_6'] = $this->language->get('SpgatewayMPG2_text_credit_6');
		$data['SpgatewayMPG2_text_credit_12'] = $this->language->get('SpgatewayMPG2_text_credit_12');
		$data['SpgatewayMPG2_text_credit_18'] = $this->language->get('SpgatewayMPG2_text_credit_18');
		$data['SpgatewayMPG2_text_credit_24'] = $this->language->get('SpgatewayMPG2_text_credit_24');
		$data['SpgatewayMPG2_text_webatm'] = $this->language->get('SpgatewayMPG2_text_webatm');
		$data['SpgatewayMPG2_text_atm'] = $this->language->get('SpgatewayMPG2_text_atm');
		$data['SpgatewayMPG2_text_cvs'] = $this->language->get('SpgatewayMPG2_text_cvs');
		$data['SpgatewayMPG2_text_barcode'] = $this->language->get('SpgatewayMPG2_text_barcode');
		$data['SpgatewayMPG2_text_unionpay'] = $this->language->get('SpgatewayMPG2_text_unionpay');

		$data['SpgatewayMPG2_text_create_status'] = $this->language->get('SpgatewayMPG2_text_create_status');
		$data['SpgatewayMPG2_text_getcode_status'] = $this->language->get('SpgatewayMPG2_text_getcode_status');
		$data['SpgatewayMPG2_text_success_status'] = $this->language->get('SpgatewayMPG2_text_success_status');
		$data['SpgatewayMPG2_text_failed_status'] = $this->language->get('SpgatewayMPG2_text_failed_status');

		$data['SpgatewayMPG2_text_geo_zone'] = $this->language->get('SpgatewayMPG2_text_geo_zone');
		$data['SpgatewayMPG2_text_all_zones'] = $this->language->get('SpgatewayMPG2_text_all_zones');
		$data['SpgatewayMPG2_text_sort_order'] = $this->language->get('SpgatewayMPG2_text_sort_order');
		$data['SpgatewayMPG2_text_test_mode'] = $this->language->get('SpgatewayMPG2_text_test_mode');

		$data['SpgatewayMPG2_text_conditioninsflag'] = $this->language->get('SpgatewayMPG2_text_conditioninsflag');
		$data['SpgatewayMPG2_entry_insflagday'] = $this->language->get('SpgatewayMPG2_entry_insflagday');
		$data['SpgatewayMPG2_entry_insflagmode'] = $this->language->get('SpgatewayMPG2_entry_insflagmode');

		$data['SpgatewayMPG2_text_storename'] = $this->language->get('SpgatewayMPG2_text_storename');

		# Get the error
		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
		
		# Get the error of the require fields
		foreach ($this->require_settings as $setting_name) {
			$tmp_error_name = 'SpgatewayMPG2_error_' . $setting_name;
			if(isset($this->error[$tmp_error_name])) {
				$data[$tmp_error_name] = $this->error[$tmp_error_name];
			} else {
				$data[$tmp_error_name] = '';
			}
		}
		//$data['SpgatewayMPG2_error_expiredate'] = $this->error['SpgatewayMPG2_error_expiredate'];
		
		# Set the breadcrumbs
		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('SpgatewayMPG2_text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('SpgatewayMPG2_text_payment'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true)
		);
		$data['breadcrumbs'][] = array(
			'text' => $heading_title,
			'href' => $this->url->link('extension/payment/SpgatewayMPG2', 'user_token=' . $this->session->data['user_token'], true)
		);
		
		# Set the form action
		$data['SpgatewayMPG2_action'] = $this->url->link('extension/payment/SpgatewayMPG2', 'user_token=' . $this->session->data['user_token'], true);
		
		# Set the cancel button
		$data['SpgatewayMPG2_cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true);
		
		# Get SpgatewayMPG2 setting
		$SpgatewayMPG2_settings = array(
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
			'insflagday',
			'insflagmode',
			'storename'
		);
		foreach ($SpgatewayMPG2_settings as $setting_name) {
			$tmp_setting_name = 'payment_SpgatewayMPG2_' . $setting_name;
			if (isset($this->request->post[$tmp_setting_name])) {
				$data[$tmp_setting_name] = $this->request->post[$tmp_setting_name];
			} else {
				$data[$tmp_setting_name] = $this->config->get($tmp_setting_name);
			}
		}
		//$data['payment_test_mode'] = (isset($this->request->post['payment_SpgatewayMPG2_test_mode'])) ? $this->request->post['payment_SpgatewayMPG2_test_mode'] : $this->config->get('payment_SpgatewayMPG2_test_mode');

		//$data['payment_test_mode'] = (isset($this->request->post[payment_SpgatewayMPG2_test_mode])) ? $this->request->post[payment_SpgatewayMPG2_test_mode] : $this->config->get($this->SpgatewayMPG2_test_mode);

		// Default value
        $default_config = array(
            'payment_SpgatewayMPG2_storename' => '信用卡、超商付款與轉帳(藍新加密安全連線)',
            'payment_SpgatewayMPG2_merchant_id' => '',
            'payment_SpgatewayMPG2_hash_key' => '',
            'payment_SpgatewayMPG2_hash_iv' => '',
            'payment_SpgatewayMPG2_expiredate' => '',//1,
            'payment_SpgatewayMPG2_create_status' => 2,
            'payment_SpgatewayMPG2_success_status' => 5,
            //'payment_SpgatewayMPG2_insflagday' =>'',
            //'payment_SpgatewayMPG2_insflagmode' =>''
            //'payment_SpgatewayMPG2_status' => '',
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
		
		$this->response->setOutput($this->load->view('extension/payment/SpgatewayMPG2', $data));
	}
	
	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/payment/SpgatewayMPG2')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		foreach ($this->require_settings as $setting_name) {
			if (!$this->request->post['payment_SpgatewayMPG2_' . $setting_name]) {
				$this->error['SpgatewayMPG2_error_' . $setting_name] = $this->language->get('SpgatewayMPG2_error_' . $setting_name);
			}
		}
		if (($this->request->post['payment_SpgatewayMPG2_expiredate'] < 1) || ($this->request->post['payment_SpgatewayMPG2_expiredate'] > 180)) {
			$this->error['SpgatewayMPG2_error_expiredate'] = $this->language->get('SpgatewayMPG2_error_expiredate');

		}
		return !$this->error; 
	}
}
