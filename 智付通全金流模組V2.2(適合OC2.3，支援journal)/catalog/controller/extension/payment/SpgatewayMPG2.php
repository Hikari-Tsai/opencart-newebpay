<?php

class ControllerExtensionPaymentSpgatewayMPG2 extends Controller {
	
	public function index() {
		# Set the checkout form action
		$data = array();
		//$data['SpgatewayMPG2_action'] = $this->url->link('extension/payment/SpgatewayMPG2/redirect', '', 'SSL');
		$data['SpgatewayMPG2_action'] = $this->url->link('extension/payment/SpgatewayMPG2/redirect', '', true);
		
		# Get the translation
		$this->load->language('extension/payment/SpgatewayMPG2');
		$data['SpgatewayMPG2_text_title'] = $this->config->get('SpgatewayMPG2_storename');//$this->language->get('SpgatewayMPG2_text_title');
		$data['SpgatewayMPG2_text_credit'] = $this->language->get('SpgatewayMPG2_text_credit');
		$data['SpgatewayMPG2_text_detail'] = $this->language->get('SpgatewayMPG2_text_detail');
		$data['SpgatewayMPG2_text_payment_methods'] = $this->language->get('SpgatewayMPG2_text_payment_methods');
		$data['SpgatewayMPG2_text_checkout_button'] = $this->language->get('SpgatewayMPG2_text_checkout_button');
		
		# Get the translation of payment methods
		$payment_methods = $this->config->get('SpgatewayMPG2_payment_methods');
		$data['payment_methods'] = array();
		foreach ($payment_methods as $payment_type => $value) {
			$data['payment_methods'][$payment_type] = $this->language->get('SpgatewayMPG2_text_' . $value);
		}
		
		# Get the template
		/*$config_template = $this->config->get('config_template');
		$payment_template = '';
		if (file_exists(DIR_TEMPLATE . $config_template)) {
			$payment_template = $config_template;
		} else {
			$payment_template = 'default';
		}
		$payment_template .= (strpos(VERSION, '2.2.') !== false) ? '/payment/SpgatewayMPG2.tpl' : '/template/payment/SpgatewayMPG2.tpl';*/

		/*if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/extension/payment/SpgatewayMPG2')) {
			return $this->load->view($this->config->get('config_template') . '/template/payment/SpgatewayMPG2', $data);
		} else {
			return $this->load->view('extension/payment/SpgatewayMPG2', $data);
		}*/

		
		//return $this->load->view($payment_template, $data);

		// Load the template
        $view_path = 'extension/payment/SpgatewayMPG2';//$this->module_path;
        return $this->load->view($view_path, $data);
  }

	public function redirect() {
		try {
			# Load SpgatewayMPG2 translation
			$this->load->language('extension/payment/SpgatewayMPG2');
			
			# Validate the payment
			//$payment_type = "All";//$this->request->post['SpgatewayMPG2_choose_payment'];
			$this->load->model('extension/payment/SpgatewayMPG2');
			//$is_valid = $this->model_payment_SpgatewayMPG2->vaildatePayment($payment_type);
			//if (!$is_valid) {
			//	throw new Exception($this->language->get('SpgatewayMPG2_error_invalid_payment'));
			//} else {
				if (!isset($this->session->data['order_id'])) {
					throw new Exception($this->language->get('SpgatewayMPG2_error_order_id_miss'));
				} else {
					# Get the order info
					$order_id = $this->session->data['order_id'];
					$this->load->model('checkout/order');
					$order = $this->model_checkout_order->getOrder($order_id);
					// ????????? ?????? Hikari
        			$user_info = $this->_getUserInfo();
					# Generate the redirection form
					$form_html = '';
					//???????????????
					$this->load->model('account/order');
					$this->load->model('catalog/product');
					// Products
					$products = $this->model_account_order->getOrderProducts($order_id);
					$productsall =''; // Hikari Tedt
					foreach ($products as $product) {
						//$option_data = array();
						$options = $this->model_account_order->getOrderOptions($order_id, $product['order_product_id']);
						//$product_info = $this->model_catalog_product->getProduct($product['product_id']);
						$productsall .= $product['name'] . " X " . $product['quantity'] . ", ";
					}
					//???model?????????????????????????????????????????????
					
					$invoke_result = $this->model_extension_payment_SpgatewayMPG2->invokeSpgatewayMPG2Module();
					if (!$invoke_result) {
						throw new Exception($this->language->get('SpgatewayMPG2_error_module_miss'));
					} else {
						# Set SpgatewayMPG2 parameters
						$aio = new SpgatewayMPG2_AllInOne();
						$aio->Send['MerchantTradeNo'] = '';
						$service_url = '';
						$expiredate = $this->config->get('SpgatewayMPG2_expiredate'); //????????????????????????????????????

						$aio->MerchantID = $this->config->get('SpgatewayMPG2_merchant_id');
						if ($this->config->get('SpgatewayMPG2_test_mode')) {//$this->model_payment_SpgatewayMPG2->isTestMode($aio->MerchantID)) {
							$service_url = 'https://ccore.spgateway.com/MPG/mpg_gateway';//'https://payment-stage.SpgatewayMPG2.com.tw/Cashier/AioCheckOut';
							//$aio->Send['MerchantTradeNo'] = date('YmdHis');
						} else {
							$service_url = 'https://core.spgateway.com/MPG/mpg_gateway';//'https://payment.SpgatewayMPG2.com.tw/Cashier/AioCheckOut';
						}
						$aio->HashKey = $this->config->get('SpgatewayMPG2_hash_key');
						$aio->HashIV = $this->config->get('SpgatewayMPG2_hash_iv');
						$aio->ServiceURL = $service_url;
						$aio->Send['NotifyURL'] 		= $this->url->link('extension/payment/SpgatewayMPG2/feedback', '', true);//$this->url->link('payment/SpgatewayMPG2/response', '', 'SSL');
						$aio->Send['ClientBackURL'] 	= $this->url->link('common/home', '', true);//str_replace('&amp;', '&', $this->url->link('account/order/info', 'order_id=' . $order_id, 'SSL'));
						$aio->Send['ReturnURL'] 		= $this->url->link('extension/payment/SpgatewayMPG2/feedbackShow', '', true);
						$aio->Send['MerchantOrderNo']	= $order_id;
						$aio->Send['TimeStamp']         = time();// date('Y/m/d H:i:s')
						$aio->Send['Version']           = '1.2';
						$aio->Send['Email'] 			= $user_info['Email'];
						$aio->Send['ExpireDate'] 		= date("Ymd",strtotime("+ $expiredate day")); //??????????????????
						$aio->Send['CustomerURL'] 		= $this->url->link('extension/payment/SpgatewayMPG2/feedback', '',true);

						#API??????????????????
						$payment_methods = $this->config->get('SpgatewayMPG2_payment_methods');
						//$payment_desc = $this->language->get('SpgatewayMPG2_text_' . $payment_methods[$payment_type]);
						foreach ($payment_methods as $payment_type => $payment_value) { 
							$aio->Send[$payment_type] = 1;
							//$payment_type; echo $payment_desc; 
						} 
						//API????????????????????????
						/*if ( $this->model_payment_SpgatewayMPG2->formatOrderTotal($order['total']) >= $this->config->get('SpgatewayMPG2_insflagday') ){
							$aio->Send['InstFlag'] = $this->config->get('SpgatewayMPG2_insflagmode');
						}*/
						$InstFlag =array(
							"3"=>'',
							"6"=>'',
							"12"=>'',
							"18"=>'',
							"24"=>'',
							"30"=>''
						);
						if (!empty($this->config->get('SpgatewayMPG2_insflagday_3')) && ($this->model_extension_payment_SpgatewayMPG2->formatOrderTotal($order['total']) >= $this->config->get('SpgatewayMPG2_insflagday_3'))){
							$InstFlag['3'] = true;//??????3???
						}
						if (!empty($this->config->get('SpgatewayMPG2_insflagday_6')) && ($this->model_extension_payment_SpgatewayMPG2->formatOrderTotal($order['total']) >= $this->config->get('SpgatewayMPG2_insflagday_6'))){
							$InstFlag['6'] = true;//??????6???

						}
						if (!empty($this->config->get('SpgatewayMPG2_insflagday_12')) && ($this->model_extension_payment_SpgatewayMPG2->formatOrderTotal($order['total']) >= $this->config->get('SpgatewayMPG2_insflagday_12'))){
							$InstFlag['12'] = true;//??????12???
						}
						if (!empty($this->config->get('SpgatewayMPG2_insflagday_18')) && ($this->model_extension_payment_SpgatewayMPG2->formatOrderTotal($order['total']) >= $this->config->get('SpgatewayMPG2_insflagday_18'))){
							$InstFlag['18'] = true;//??????18???
						}
						if (!empty($this->config->get('SpgatewayMPG2_insflagday_24')) && ($this->model_extension_payment_SpgatewayMPG2->formatOrderTotal($order['total']) >= $this->config->get('SpgatewayMPG2_insflagday_24'))){
							$InstFlag['24'] = true;//??????24???
						}
						if (!empty($this->config->get('SpgatewayMPG2_insflagday_30')) && ($this->model_extension_payment_SpgatewayMPG2->formatOrderTotal($order['total']) >= $this->config->get('SpgatewayMPG2_insflagday_30'))){
							$InstFlag['30'] = true;//??????30???
						}
						$InstFlag_push ='';
						foreach ($InstFlag as $key => $value ){
							if ($value) {
								$InstFlag_push = $InstFlag_push . "," . $key;
							}
						}
						$InstFlag_push = substr($InstFlag_push,1);//?????????????????????
						$aio->Send['InstFlag'] = $InstFlag_push;//????????????????????????

						
						# Set the product info
						$aio->Send['Amt'] = $this->model_extension_payment_SpgatewayMPG2->formatOrderTotal($order['total']);
						array_push(
							$aio->Send['Items'],
							array(
								'Name' => $productsall,//$this->language->get('SpgatewayMPG2_text_item_name'),
								'Price' => $aio->Send['Amt'],
								'Currency' => "???",//$_SESSION['currency'],
								//'Quantity' => 1,
								//'URL' => 'https:shop.quantummusic.com'
							)
						);
						
						# Set the trade description
						$aio->Send['TradeDesc'] = 'SpgatewayMPG2_module_opencart_1.0.1114';
						
						# Get the chosen payment and installment
						/*$type_pieces = explode('_', $payment_type);
						$aio->Send['ChoosePayment'] = $type_pieces[0];
						$choose_installment = 0;
						if (isset($type_pieces[1])) {
							$choose_installment = $type_pieces[1];
						}*/

						# Set the extend information
						/*switch ($aio->Send['ChoosePayment']) {
							case SpgatewayMPG2_PaymentMethod::Credit:
								# Do not support UnionPay
								$aio->SendExtend['UnionPay'] = false;
								
								# Credit installment parameters
								if (!empty($choose_installment)) {
									$aio->SendExtend['CreditInstallment'] = $choose_installment;
									$aio->SendExtend['InstallmentAmount'] = $aio->Send['Amt'];
									$aio->SendExtend['Redeem'] = false;
								}
								break;
							case SpgatewayMPG2_PaymentMethod::WebATM:
								break;
							case SpgatewayMPG2_PaymentMethod::ATM:
								//$aio->SendExtend['ExpireDate'] = 3;
								$aio->SendExtend['PaymentInfoURL'] = $aio->Send['ReturnURL'];
								break;
							case SpgatewayMPG2_PaymentMethod::CVS:
								//$aio->SendExtend['StoreExpireDate'] = 4320; //3 days
	                            $aio->SendExtend['Desc_1'] = '';
	                            $aio->SendExtend['Desc_2'] = '';
	                            $aio->SendExtend['Desc_3'] = '';
	                            $aio->SendExtend['Desc_4'] = '';
	                            $aio->SendExtend['PaymentInfoURL'] = $aio->Send['ReturnURL'];
	                            break;
							case SpgatewayMPG2_PaymentMethod::BARCODE:
								//$aio->SendExtend['StoreExpireDate'] = 3; //3 days
								$aio->SendExtend['Desc_1'] = '';
								$aio->SendExtend['Desc_2'] = '';
								$aio->SendExtend['Desc_3'] = '';
								$aio->SendExtend['Desc_4'] = '';
								$aio->SendExtend['PaymentInfoURL'] = $aio->Send['ReturnURL'];
								break;
							default:
								break;
						}*/
					}
					
					# Update order status and comments
					$payment_methods = $this->config->get('SpgatewayMPG2_payment_methods');
					$order_create_status_id = $this->config->get('SpgatewayMPG2_create_status');
					//$payment_desc = $this->language->get('SpgatewayMPG2_text_' . $payment_methods[$payment_type]);
					$payment_desc2 = $this->language->get('SpgatewayMPG2_text_createstatus');

					//$this->model_checkout_order->addOrderHistory($order_id, $order_create_status_id, $payment_desc, true);
					$this->model_checkout_order->addOrderHistory($order_id, $order_create_status_id, $payment_desc2, true);
				
					# Clean the cart
					$this->cart->clear();

					# Add to activity log
					$this->load->model('account/activity');
					if ($this->customer->isLogged()) {
						$activity_data = array(
							'customer_id' => $this->customer->getId(),
							'name'        => $this->customer->getFirstName() . ' ' . $this->customer->getLastName(),
							'order_id'    => $order_id
						);

						$this->model_account_activity->addActivity('order_account', $activity_data);
					} else {
						$activity_data = array(
							'name'     => $this->session->data['guest']['firstname'] . ' ' . $this->session->data['guest']['lastname'],
							'order_id' => $order_id
						);

						$this->model_account_activity->addActivity('order_guest', $activity_data);
					}

					# Clean the session
					unset($this->session->data['shipping_method']);
					unset($this->session->data['shipping_methods']);
					unset($this->session->data['payment_method']);
					unset($this->session->data['payment_methods']);
					unset($this->session->data['guest']);
					unset($this->session->data['comment']);
					unset($this->session->data['order_id']);
					unset($this->session->data['coupon']);
					unset($this->session->data['reward']);
					unset($this->session->data['voucher']);
					unset($this->session->data['vouchers']);
					unset($this->session->data['totals']);
					
					# Print the redirection form
					$aio->CheckOut();
					exit;
				}
			//}
		} catch (Exception $e) {
			# Process the exception
			$this->session->data['error'] = $e->getMessage();
			$checkout_url = $this->url->link('checkout/checkout');
			$this->response->redirect($checkout_url);
		}
	}
	public function feedbackCode() {

        // ????????????
        $result = $_POST;

		//???????????????
		$this->load->model('account/order');
		$this->load->model('catalog/product');
		// Products
		$products = $this->model_account_order->getOrderProducts($result['MerchantOrderNo']);
		$productsall =''; // Hikari Tedt
		foreach ($products as $product) {
			//$option_data = array();
			$options = $this->model_account_order->getOrderOptions($result['MerchantOrderNo'], $product['order_product_id']);
			//$product_info = $this->model_catalog_product->getProduct($product['product_id']);
			$productsall .= $product['name'] . " X " . $product['quantity'] . ", ";
		}

        if (isset($result['Status']) && !empty($result['Status'])) {
			//??????????????????
			

            /**
             * ????????????
             */
            $this->language->load('checkout/success_getcode');
            $this->language->load('checkout/success_error');

            // ????????? Title
            $title = (in_array($result['Status'], array('SUCCESS', 'CUSTOM'))) ? $this->language->get('heading_title_getcode') : $this->language->get('heading_title_fail') . $result['Message'];

            $this->document->setTitle($title);

            $data['breadcrumbs'] = array();

            $data['breadcrumbs'][] = array(
                'href' => $this->url->link('common/home'),
                'text' => $this->language->get('text_home'),
                'separator' => false
            );

            $data['breadcrumbs'][] = array(
                'href' => $this->url->link('checkout/cart'),
                'text' => $this->language->get('text_basket'),
                'separator' => $this->language->get('text_separator')
            );

            $data['breadcrumbs'][] = array(
                'href' => $this->url->link('checkout/checkout', '', 'SSL'),
                'text' => $this->language->get('text_checkout'),
                'separator' => $this->language->get('text_separator')
            );

            $data['breadcrumbs'][] = array(
                'href' => $this->url->link('checkout/success'),
                'text' => $this->language->get('text_getcode'),
                'separator' => $this->language->get('text_separator')
            );


            $data['heading_title'] = $title;

            //if ($this->customer->isLogged()) {
                
                if (in_array($result['Status'], array('SUCCESS', 'CUSTOM'))) {
                	$showcode ='';
                	$show_text_note = '';
                	switch ($result['PaymentType']) {
			            case 'CREDIT':
			                break;
			            case 'WEBATM':
			            	break;
			            case 'VACC': //ATM??????
			                $showcode .= '????????????: ' . $result['BankCode'] . '<br />';
			                $showcode .= '????????????: ' . $result['CodeNo'] . '<br />';
			                break;

			            case 'CVS':
			                $showcode .= '????????????: ' . $result['CodeNo'] . '<br />';
			                $show_text_note ='<br>????????????????????????????????????????????????????????????<br>???7-11 ibon???<a href="https://www.spgateway.com/info/site_description/seven_ibon_embedded" target="_blank">????????????</a><BR>????????? FamiPort???<a href="https://www.spgateway.com/info/site_description/family_embedded" target="_blank">????????????</a><BR>???OK ?????? OK-go???<a href="https://www.spgateway.com/info/site_description/okshop_embedded" target="_blank">????????????</a><BR>???????????? Life-ET???<a href="https://www.spgateway.com/info/site_description/hilife_embedded" target="_blank">????????????</a>';
			                break;

			            case 'BARCODE':
			                break;

			            default :
			                break;
			        }

					// ???????????????
                	$show_text_customer = '';
                	$show_text_customer .= '<h4>' . $this->language->get('heading_subtitle_getcode') . '</h4>';
                	$show_text_customer .='<div class="col-12" style="color:#229ac8;background-color:#e6ffff;padding:6px;margin-bottom:12px;"><h3 style="color:#229ac8;"><center><b>' . $showcode . '</b></center></h3></div></ br>';
                	$show_text_customer .= '<div class="table-responsive">';
                	$show_text_customer .= '<table class="table table-bordered table-hover">';
                	$show_text_customer .= '<tbody><tr>';
                	$show_text_customer .= '<td class="text-left">' . '????????????' . '</td>';
                	$show_text_customer .= '<td class="text-left">' . $this->_getCode($result);
                	$show_text_customer .= '</td></tr><tr>';
                	$show_text_customer .= '<td class="text-left">' . '??????????????????' . '</td>';
                	$show_text_customer .= '<td class="text-left" style="color:red;">' . $result['ExpireDate'] . ' 23:59:59 </td></tr><tr>';
                	$show_text_customer .= '<td class="text-left">' . '????????????' . '</td>';
                	$show_text_customer .= '<td class="text-left">' . $result['MerchantOrderNo'] . '</td></tr><tr>';
                	$show_text_customer .= '<td class="text-left">' . '????????????' . '</td>';
                	$show_text_customer .= '<td class="text-left">' . $result['Amt'] . '</td></tr><tr>';
                	$show_text_customer .= '<td class="text-left">' . '????????????' . '</td>';
                	$show_text_customer .= '<td class="text-left">' . $productsall . '</td></tr>';
                	$show_text_customer .= '</tbody></table></div>';
                	//$show_text_customer .= '<a href="https://ccore.spgateway.com/barcode?MerID=' . $this->config->get('SpgatewayMPG2_merchant_id') . '&MerTradeNo=' . $result['MerchantOrderNo'] . '"> ??????????????? </a>';

                	$data['text_message'] = $show_text_customer . $show_text_note;

		            


                }else{
                	if ($this->customer->isLogged()) {
	                	$show_text_customer = $this->language->get('text_customer_fail');
	                	$data['text_message'] = sprintf($show_text_customer, $this->url->link('account/account', '', 'SSL'), $this->url->link('account/order', '', 'SSL'), $this->url->link('account/download', '', 'SSL'), $this->url->link('information/contact'));
	                }else{
	                	$show_text_guest = $this->language->get('text_guest_fail');
	                	$data['text_message'] = sprintf($show_text_guest, $this->url->link('information/contact'));
	                }

                }

            //} else {

                // ???????????????
                //$show_text_guest = (in_array($result['Status'], array('SUCCESS', 'CUSTOM'))) ? $this->language->get('text_guest') : $this->language->get('text_guest_fail');

                //$data['text_message'] = sprintf($show_text_guest, $this->url->link('information/contact'));
            //}
                if ($result['PaymentType'] == 'BARCODE') {
                	$data['button_continue'] = $this->language->get('button_print');//'???????????????';//$this->language->get('button_continue');
            		if ($this->config->get('SpgatewayMPG2_test_mode')) {
						$service_urlcode = 'https://ccore.spgateway.com/barcode?MerID=';
					} else {
						$service_urlcode = 'https://core.spgateway.com/barcode?MerID=';
					}

	            	$data['continue'] = $service_urlcode . $this->config->get('SpgatewayMPG2_merchant_id') . '&MerTradeNo=' . $result['MerchantOrderNo'];
                }else{
                	$data['button_continue'] = $this->language->get('button_home'); //$this->language->get('button_continue');

	            	$data['continue'] = $this->url->link('common/home');
                }

	            
    		//??????????????????????????? Hikari ????????????
			/*$ServiceURL = $this->url->link('payment/SpgatewayMPG2/feedback', '', 'SSL');
	        $szHtml =  '<!DOCTYPE html>';
	        $szHtml .= '<html>';
	        $szHtml .=     '<head>';
	        $szHtml .=         '<meta charset="utf-8">';
	        $szHtml .=     '</head>';
	        $szHtml .=     '<body>';
	        $szHtml .=         "<form id=\"__spgateForm\" method=\"post\" target=\"_top\" action=\"{$ServiceURL}\">";
	        
	        foreach ($result as $keys => $value) {
	            $szHtml .=         "<input type=\"hidden\" name=\"{$keys}\" value=\"{$value}\" />";
	        }			        
	        $szHtml .=         '</form>';
	        $szHtml .=         '<script type="text/javascript">document.getElementById("__spgateForm").submit();</script>';
	        $szHtml .=     '</body>';
	        $szHtml .= '</html>';

	        echo $szHtml ;
	        exit;*/


            //?????????????????????????????????
            if (in_array($result['Status'], array('SUCCESS', 'CUSTOM'))) {
                $this->clearCustomerCart($this->customer->getId());
            }



            //if(version_compare(VERSION, '2.2.0.0', "<")) {
				if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/success')) {
					$this->template = $this->config->get('config_template') . '/template/common/success';
				 } else {
					$this->template = 'common/success';
				 }
			//} else {
			//	   $this->template = 'common/success.tpl';
			//}	

            $data['column_left'] = $this->load->controller('common/column_left');
            $data['column_right'] = $this->load->controller('common/column_right');
            $data['content_top'] = $this->load->controller('common/content_top');
            $data['content_bottom'] = $this->load->controller('common/content_bottom');
            $data['footer'] = $this->load->controller('common/footer');
            $data['header'] = $this->load->controller('common/header');

            $this->response->setOutput($this->load->view($this->template, $data));
        } else {
            $url = $this->url->link('common/home');
            header("location:$url");
            exit;
        }
    }
	    /**
     * PAGE ????????????
     */
    public function feedbackShow() {

        // ????????????
        $result = $_POST;

        if (isset($result['Status']) && !empty($result['Status'])) {
            /**
             * ????????????
             */
            $this->language->load('checkout/success');
            $this->language->load('checkout/success_error');

            // ????????? Title
            $title = (in_array($result['Status'], array('SUCCESS', 'CUSTOM'))) ? $this->language->get('heading_title') : $this->language->get('heading_title_fail') . $result['Message'];

            $this->document->setTitle($title);

            $data['breadcrumbs'] = array();

            $data['breadcrumbs'][] = array(
                'href' => $this->url->link('common/home'),
                'text' => $this->language->get('text_home'),
                'separator' => false
            );

            $data['breadcrumbs'][] = array(
                'href' => $this->url->link('checkout/cart'),
                'text' => $this->language->get('text_basket'),
                'separator' => $this->language->get('text_separator')
            );

            $data['breadcrumbs'][] = array(
                'href' => $this->url->link('checkout/checkout'),
                'text' => $this->language->get('text_checkout'),
                'separator' => $this->language->get('text_separator')
            );

            $data['breadcrumbs'][] = array(
                'href' => $this->url->link('checkout/success'),
                'text' => $this->language->get('text_success'),
                'separator' => $this->language->get('text_separator')
            );

            $data['heading_title'] = $title;

            if ($this->customer->isLogged()) {
                // ???????????????
                $show_text_customer = (in_array($result['Status'], array('SUCCESS', 'CUSTOM'))) ? $this->language->get('text_customer') : $this->language->get('text_customer_fail');

                //$data['text_message'] = sprintf($show_text_customer, $this->url->link('account/account', '', 'SSL'), $this->url->link('account/order', '', 'SSL'), $this->url->link('account/download', '', 'SSL'), $this->url->link('information/contact'));
                 $data['text_message'] = sprintf($show_text_customer, $this->url->link('account/account'), $this->url->link('account/order'), $this->url->link('account/download'), $this->url->link('information/contact'));
            } else {

                // ???????????????
                $show_text_guest = (in_array($result['Status'], array('SUCCESS', 'CUSTOM'))) ? $this->language->get('text_guest') : $this->language->get('text_guest_fail');

                $data['text_message'] = sprintf($show_text_guest, $this->url->link('information/contact'));
            }

            $data['button_continue'] = $this->language->get('button_continue');

            $data['continue'] = $this->url->link('common/home');


            //?????????????????????????????????
            if (in_array($result['Status'], array('SUCCESS', 'CUSTOM'))) {
                $this->clearCustomerCart($this->customer->getId());
            }



            //if(version_compare(VERSION, '2.2.0.0', "<")) {
				if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/success')) {
					$this->template = $this->config->get('config_template') . '/template/common/success';
				 } else {
					 $this->template = 'common/success';
				 }
			//} else {
			//	   $this->template = 'common/success.tpl';
			//}	

            $data['column_left'] = $this->load->controller('common/column_left');
            $data['column_right'] = $this->load->controller('common/column_right');
            $data['content_top'] = $this->load->controller('common/content_top');
            $data['content_bottom'] = $this->load->controller('common/content_bottom');
            $data['footer'] = $this->load->controller('common/footer');
            $data['header'] = $this->load->controller('common/header');

            $this->response->setOutput($this->load->view($this->template, $data));
        } else {
            $url = $this->url->link('common/home', '', 'SSL');
            header("location:$url");
            exit;
        }
    }

	 /**
     * POST ????????????
     */
    public function feedback() {
    	$this->load->model('checkout/order'); //Hikari Edit

        // ?????????????????? (YYYYMMDD)
        $file_name = date('Ymd', time()) . '.txt';

        // ????????????
        $file = DIR_LOGS . $file_name;

        $fp = fopen($file, 'a');

        // ????????????
        $result = $_POST;

        //	?????? LOG
        fwrite($fp, print_r($result, true));

        // ????????????????????????
        $this->load->model('checkout/order');

        $order_info = $this->model_checkout_order->getOrder($result['MerchantOrderNo']);

        // ???????????????
        if (!empty($order_info)) {

            /**
             *  ?????? ???????????? ????????????
             */
            $this->load->model('setting/setting');

            //$store_info = $this->model_setting_setting->getSetting('SpgatewayMPG2', $order_info['store_id']);
            $store_info = $this->model_setting_setting->getSetting('SpgatewayMPG2', '0'); //??????????????????????????????

            // 1. ??????????????????
            if (in_array($result['Status'], array('SUCCESS', 'CUSTOM'))) {

                // 2. ?????????????????????
                if (intval($order_info['total']) == $result['Amt']) {

                    /**
                     *  3. ?????? checkCode
                     */
                    $check = array(
                        "MerchantID" => $result['MerchantID'],
                        "Amt" => $result['Amt'],
                        "MerchantOrderNo" => $result['MerchantOrderNo'],
                        "TradeNo" => $result['TradeNo']
                    );

                    ksort($check);

                    $check_str = http_build_query($check, '', '&');

                    /**
                     * ?????????????????????
                     */
                    $checkCode = '';

                    if (!isset($store_info['SpgatewayMPG2_hash_key']) || !isset($store_info['SpgatewayMPG2_hash_iv'])) {
                        $content = $result['MerchantOrderNo'] . ': Hash Setting Error';
                        fwrite($fp, $content . "\n");
                        fclose($fp);
                        echo $content;
                        die;
                    } else {
                        $checkCode = 'HashIV=' . $store_info['SpgatewayMPG2_hash_iv'] . '&' . $check_str . '&HashKey=' . $store_info['SpgatewayMPG2_hash_key'];
                    }

                    $checkCode = strtoupper(hash("sha256", $checkCode));

                    // ???????????????????????????
                    if ($checkCode == $result['CheckCode']) {
                    	//??????????????????????????????????????????????????????
                       // if ($order_info['order_status_id'] != $store_info['SpgatewayMPG2_order_finish_status_id']) {
                       	if ($order_info['order_status_id'] != $store_info['SpgatewayMPG2_success_status']) {

                            // ??????????????????
                            //$this->_updateOrder($order_info, $result, $store_info);
                            //hikari Edit
                            $comment =  (isset($result['ExpireDate'])) ? $this->_getCode($result) : $this->_getComment($result);
                            $newstatus = (isset($result['ExpireDate'])) ? $store_info['SpgatewayMPG2_getcode_status'] : $store_info['SpgatewayMPG2_success_status'];
                            //$comment =  $this->_getComment($result);
                            $this->model_checkout_order->addOrderHistory(
											(int) $order_info['order_id'],
											$newstatus,
											//$store_info['SpgatewayMPG2_success_status'],
											$comment,
											true
										);

                        }
                    } else {
                        $content = $result['MerchantOrderNo'] . ': ERROR_3(CheckCode Eror)';
                        fwrite($fp, $content . "\n");
                        fclose($fp);
                        echo $content;
                        die;
                    }
                } else {
                    $content = $result['MerchantOrderNo'] . ': ERROR_2(Amout Error)';
                    fwrite($fp, $content . "\n");
                    fclose($fp);
                    echo $content;
                    die;
                }
            } else {

                $content = $result['MerchantOrderNo'] . ': ERROR_1(payment status fail)';
                echo $content;

                fwrite($fp, $content . "\n");

                // ?????????????????? (Only Credit or WebAtm)
                if (in_array($result['PaymentType'], array('CREDIT', 'WEBATM'))) {
                    //$this->_updateOrder($order_info, $result, $store_info);
                    //Hikari Edit

                    $comment = $this->_getComment($result) . '????????????: ' . $result['Message'];
	                $this->model_checkout_order->addOrderHistory(
					(int) $order_info['order_id'],
					$this->config->get('SpgatewayMPG2_failed_status'),
					$comment,
					true
					);
                }

                fclose($fp);
                die;
            }
        } else {
            fwrite($fp, $result['MerchantOrderNo'] . ": DataError\n");
        }

        fclose($fp);
        //?????????????????????????????????
        //??????????????????????????????????????????????????????????????????????????????
        if (isset($result['ExpireDate'])) {
			$ServiceURL = $this->url->link('extension/payment/SpgatewayMPG2/feedbackCode', '',true);
	        $szHtml =  '<!DOCTYPE html>';
	        $szHtml .= '<html>';
	        $szHtml .=     '<head>';
	        $szHtml .=         '<meta charset="utf-8">';
	        $szHtml .=     '</head>';
	        $szHtml .=     '<body>';
	        $szHtml .=         "<form id=\"__spgateForm\" method=\"post\" target=\"_top\" action=\"{$ServiceURL}\">";
	        
	        foreach ($result as $keys => $value) {
	            $szHtml .=         "<input type=\"hidden\" name=\"{$keys}\" value=\"{$value}\" />";
	        }			        
	        $szHtml .=         '</form>';
	        $szHtml .=         '<script type="text/javascript">document.getElementById("__spgateForm").submit();</script>';
	        $szHtml .=     '</body>';
	        $szHtml .= '</html>';

	        echo $szHtml ;
	        exit;
	    }
    }

	/*public function response() {
		# Load the model and translation
		$this->load->language('payment/SpgatewayMPG2');
		$this->load->model('payment/SpgatewayMPG2');
		$this->load->model('checkout/order');
		
		# Set the default result message
		$result_message = '1|OK';
		$cart_order_id = null;
		$order = null;
		try {
			# Retrieve the checkout result
			$invoke_result = $this->model_payment_SpgatewayMPG2->invokeSpgatewayMPG2Module();
			if (!$invoke_result) {
				throw new Exception('SpgatewayMPG2 module is missing.');
			} else {
				$aio = new SpgatewayMPG2_AllInOne();
				$aio->HashKey = $this->config->get('SpgatewayMPG2_hash_key');
				$aio->HashIV = $this->config->get('SpgatewayMPG2_hash_iv');
				$SpgatewayMPG2_feedback = $aio->CheckOutFeedback();
				unset($aio);
				
				# Process SpgatewayMPG2 feedback
				if(count($SpgatewayMPG2_feedback) < 1) {
					throw new Exception('Get SpgatewayMPG2 feedback failed.');
				} else {
					# Get the cart order id
					$cart_order_id = $this->model_payment_SpgatewayMPG2->getCartOrderID($SpgatewayMPG2_feedback['MerchantTradeNo'], $this->config->get('SpgatewayMPG2_merchant_id'));
				
					# Get the cart order amount
					$order = $this->model_checkout_order->getOrder($cart_order_id);
					$cart_amount = $this->model_payment_SpgatewayMPG2->formatOrderTotal($order['total']);
					
					# Check the amounts
					$SpgatewayMPG2_amount = $SpgatewayMPG2_feedback['TradeAmt'];
					if ($cart_amount != $SpgatewayMPG2_amount) {
						throw new Exception(sprintf('Order %s amount are not identical.', $cart_order_id));
					} else {
						# Set the common comments
						$comments = sprintf(
							$this->language->get('SpgatewayMPG2_text_common_comments'),
							$SpgatewayMPG2_feedback['PaymentType'],
							$SpgatewayMPG2_feedback['TradeDate']
						);
						
						# Set the getting code comments
						$return_message = $SpgatewayMPG2_feedback['RtnMsg'];
						$return_code = $SpgatewayMPG2_feedback['RtnCode'];
						$get_code_result_comments = sprintf(
							$this->language->get('SpgatewayMPG2_text_get_code_result_comments'),
							$return_code,
							$return_message
						);
						
						# Set the payment result comments
						$payment_result_comments = sprintf(
							$this->language->get('SpgatewayMPG2_text_payment_result_comments'),
							$return_code,
							$return_message
						);
						
						# Get SpgatewayMPG2 payment method
						$type_pieces = explode('_', $SpgatewayMPG2_feedback['PaymentType']);
						$SpgatewayMPG2_payment_method = $type_pieces[0];
						
						# Update the order status and comments
						$fail_message = sprintf('Order %s Exception.(%s: %s)', $cart_order_id, $return_code, $return_message);
						$order_create_status_id = $this->config->get('SpgatewayMPG2_create_status');
						$paid_succeeded_status_id = $this->config->get('SpgatewayMPG2_success_status');
						
						switch($SpgatewayMPG2_payment_method) {
							case SpgatewayMPG2_PaymentMethod::Credit:
							case SpgatewayMPG2_PaymentMethod::WebATM:
								if ($return_code != 1 and $return_code != 800) {
									throw new Exception($fail_message);
								} else {
									# Only finish the order when the status is processing 
									if ($order['order_status_id'] != $order_create_status_id) {
										# The order already paid or not in the standard procedure, do nothing
									} else {
										
										$this->model_checkout_order->addOrderHistory(
											$cart_order_id,
											$paid_succeeded_status_id,
											$payment_result_comments,
											true
										);
										
										
										// ?????????????????????????????? START
										$nInvoice_Status  = $this->config->get('SpgatewayMPG2invoice_status');
										if($nInvoice_Status == 1)
										{
											$this->load->model('payment/SpgatewayMPG2invoice');
											$nInvoice_Autoissue 	= $this->config->get('SpgatewayMPG2invoice_autoissue');
											$sCheck_Invoice_SDK	= $this->model_payment_SpgatewayMPG2invoice->check_invoice_sdk();
											if( $nInvoice_Autoissue == 1 && $sCheck_Invoice_SDK != false )
											{	
												$this->model_payment_SpgatewayMPG2invoice->createInvoiceNo($cart_order_id, $sCheck_Invoice_SDK);
											}
										}
										// ?????????????????????????????? END
	
									}
								}
								break;
							case SpgatewayMPG2_PaymentMethod::ATM:
								if ($return_code != 1 and $return_code != 2 and $return_code != 800) {
									throw new Exception($fail_message);
								} else {
									if ($return_code == 2) {
										# Set the getting code result
										$comments .= sprintf(
											$this->language->get('SpgatewayMPG2_text_atm_comments'),
											$SpgatewayMPG2_feedback['BankCode'],
											$SpgatewayMPG2_feedback['vAccount'],
											$SpgatewayMPG2_feedback['ExpireDate']
										);
										$this->model_checkout_order->addOrderHistory(
											$cart_order_id,
											$order_create_status_id,
											$comments . $get_code_result_comments
										);
									} else {
										# Only finish the order when the status is processing 
										if ($order['order_status_id'] != $order_create_status_id) {
											# The order already paid or not in the standard procedure, do nothing
										} else {
											
											$this->model_checkout_order->addOrderHistory(
												$cart_order_id,
												$paid_succeeded_status_id,
												$payment_result_comments,
												true
											);
											
											// ?????????????????????????????? START
											$nInvoice_Status  = $this->config->get('SpgatewayMPG2invoice_status');
											if($nInvoice_Status == 1)
											{
												$this->load->model('payment/SpgatewayMPG2invoice');
												$nInvoice_Autoissue 	= $this->config->get('SpgatewayMPG2invoice_autoissue');
												$sCheck_Invoice_SDK	= $this->model_payment_SpgatewayMPG2invoice->check_invoice_sdk();
												if( $nInvoice_Autoissue == 1 && $sCheck_Invoice_SDK != false )
												{	
													$this->model_payment_SpgatewayMPG2invoice->createInvoiceNo($cart_order_id, $sCheck_Invoice_SDK);
												}
											}
											// ?????????????????????????????? END
											
										}
									}
								}
								break;
							case SpgatewayMPG2_PaymentMethod::CVS:
								if ($return_code != 1 and $return_code != 800 and $return_code != 10100073) {
									throw new Exception($fail_message);
								} else {
									if ($return_code == 10100073) {
										$comments .= sprintf(
											$this->language->get('SpgatewayMPG2_text_cvs_comments'),
											$SpgatewayMPG2_feedback['PaymentNo'],
											$SpgatewayMPG2_feedback['ExpireDate']
										);
										$this->model_checkout_order->addOrderHistory(
											$cart_order_id,
											$order_create_status_id,
											$comments . $get_code_result_comments
										);
									} else {
										# Only finish the order when the status is processing 
										if ($order['order_status_id'] != $order_create_status_id) {
											# The order already paid or not in the standard procedure, do nothing
										} else {
											$this->model_checkout_order->addOrderHistory(
												$cart_order_id,
												$paid_succeeded_status_id,
												$payment_result_comments,
												true
											);
											
											
											// ?????????????????????????????? START
											$nInvoice_Status  = $this->config->get('SpgatewayMPG2invoice_status');
											if($nInvoice_Status == 1)
											{
												$this->load->model('payment/SpgatewayMPG2invoice');
												$nInvoice_Autoissue 	= $this->config->get('SpgatewayMPG2invoice_autoissue');
												$sCheck_Invoice_SDK	= $this->model_payment_SpgatewayMPG2invoice->check_invoice_sdk();
												if( $nInvoice_Autoissue == 1 && $sCheck_Invoice_SDK != false )
												{	
													$this->model_payment_SpgatewayMPG2invoice->createInvoiceNo($cart_order_id, $sCheck_Invoice_SDK);
												}
											}
											// ?????????????????????????????? END
										}
									}
								}
								break;
							case SpgatewayMPG2_PaymentMethod::BARCODE:
								if ($return_code != 1 and $return_code != 800 and $return_code != 10100073) {
									throw new Exception($fail_message);
								} else {
									if ($return_code == 10100073) {
										$comments .= sprintf(
											$this->language->get('SpgatewayMPG2_text_barcode_comments'),
											$SpgatewayMPG2_feedback['ExpireDate'],
											$SpgatewayMPG2_feedback['Barcode1'],
											$SpgatewayMPG2_feedback['Barcode2'],
											$SpgatewayMPG2_feedback['Barcode3']
										);
										$this->model_checkout_order->addOrderHistory(
											$cart_order_id,
											$order_create_status_id,
											$comments . $get_code_result_comments
										);
									} else {
										# Only finish the order when the status is processing 
										if ($order['order_status_id'] != $order_create_status_id) {
											# The order already paid or not in the standard procedure, do nothing
										} else {
											$this->model_checkout_order->addOrderHistory(
												$cart_order_id,
												$paid_succeeded_status_id,
												$payment_result_comments,
												true
											);
											
											// ?????????????????????????????? START
											$nInvoice_Status  = $this->config->get('SpgatewayMPG2invoice_status');
											if($nInvoice_Status == 1)
											{
												$this->load->model('payment/SpgatewayMPG2invoice');
												$nInvoice_Autoissue 	= $this->config->get('SpgatewayMPG2invoice_autoissue');
												$sCheck_Invoice_SDK	= $this->model_payment_SpgatewayMPG2invoice->check_invoice_sdk();
												if( $nInvoice_Autoissue == 1 && $sCheck_Invoice_SDK != false )
												{	
													$this->model_payment_SpgatewayMPG2invoice->createInvoiceNo($cart_order_id, $sCheck_Invoice_SDK);
												}
											}
											// ?????????????????????????????? END
										}
									}
								}
								break;
							default:
								throw new Exception(sprintf('Order %s, payment method is invalid.', $cart_order_id));
								break;
						}
					}
				}
			}
		} catch (Exception $e) {
			$error = $e->getMessage();
			if (!empty($order)) {
				$paid_failed_status_id = $this->config->get('SpgatewayMPG2_failed_status');
				$comments = sprintf($this->language->get('SpgatewayMPG2_text_failure_comments'), $error);
				$this->model_checkout_order->addOrderHistory($cart_order_id, $paid_failed_status_id, $comments);
			}
			
			# Set the failure result
			$result_message = '0|' . $error;
		}
		# Return URL log
		$this->model_payment_SpgatewayMPG2->logMessage('Order ' . $cart_order_id . ' process SpgatewayMPG2 response result : ' . $result_message);
		
		echo $result_message;
		exit;
	}*/
		/**
     * ???????????????
     *
     * @return array ???????????? key => ????????????, value => ???
     */
    protected function _getUserInfo() {

        if ($this->customer->isLogged()) {
            // account = guest
            // guest = array('id', 'username', ..)
            $result = array(
                'FirstName' => $this->customer->getFirstName() ? $this->customer->getFirstName() : $_SESSION[$_SESSION['account']]['firstname'],
                'LastName' => $this->customer->getLastName() ? $this->customer->getLastName() : $_SESSION[$_SESSION['account']]['lastname'],
                'Email' => ($this->customer->getEmail() ? $this->customer->getEmail() : $_SESSION[$_SESSION['account']]['email']),
                'Phone' => ($this->customer->getTelephone() ? $this->customer->getTelephone() : $_SESSION[$_SESSION['account']]['telephone']),
            );
        } elseif (!empty($_POST)) {
            $result = array(
                'FirstName' => $_POST["firstname"],
                'LastName' => $_POST["lastname"],
                'Email' => $_POST["email"],
                'Phone' => $_POST["telephone"],
            );
        } elseif (isset($this->session->data['guest'])) {
            $result = array(
                'FirstName' => isset($this->session->data['guest']['firstname']) ? $this->session->data['guest']['firstname'] : $this->session->data['guest']['payment']['firstname'],
                'LastName' => isset($this->session->data['guest']['lastname']) ? $this->session->data['guest']['lastname'] : $this->session->data['guest']['payment']['lastname'],
                'Email' => isset($this->session->data['guest']['email']) ? $this->session->data['guest']['email'] : $this->session->data['guest']['payment']['email'],
                'Phone' => isset($this->session->data['guest']['telephone']) ? $this->session->data['guest']['telephone'] : $this->session->data['guest']['payment']['telephone'],
            );
        } else {
            $result = array(
                'FirstName' => '',
                'LastName' => '',
                'Email' => '',
                'Phone' => '',
            );
        }

        $result['ShowLanguage'] = $this->language->get('code');
        $result['ShowName'] = strpos($this->language->get('code'), 'zh-TW') !== true ? $result['LastName'] . $result['FirstName'] : $result['FirstName'] . $result['LastName'];

        return $result;
    }
    /**
     * ??????????????????
     *
     * @param array $order_info ????????????
     * @param array $result     P2G ????????????
     * @param array $store_info ????????????
     */
    protected function _updateOrder($order_info, $result, $store_info) {

        // ????????????
        $order_id = (int) $order_info['order_id'];

        // ??????????????????
        $order_status_id = in_array($result['Status'], array('SUCCESS', 'CUSTOM')) ? (int) $store_info['SpgatewayMPG2_success_status'] : (int) $store_info['SpgatewayMPG2_failed_status'];
						//$order_create_status_id = $this->config->get('SpgatewayMPG2_create_status');
						//$paid_succeeded_status_id = $this->config->get('SpgatewayMPG2_success_status');
        // ????????????
        $comment = (in_array($result['Status'], array('SUCCESS', 'CUSTOM'))) ? $this->_getComment($result) : $this->_getComment($result) . '????????????: ' . $result['Message'];

        $this->db->query("UPDATE `" . DB_PREFIX . "order` SET order_status_id = '" . $order_status_id . "', date_modified = NOW() WHERE order_id = '" . $order_id . "'");

        $this->db->query("INSERT INTO " . DB_PREFIX . "order_history SET order_id = '" . $order_id . "', order_status_id = '" . $order_status_id . "', notify = '1', comment = '" . $this->db->escape($comment) . "', date_added = NOW()");
    }

    /**
     * ????????????
     *
     * @param string $returnResult
     */
    protected function _getComment($returnResult) {
        $result = '';

        $paymentTransform = array(
            'CREDIT' => '?????????',
            'WEBATM' => 'WebATM',
            'VACC' => 'ATM??????',
            'CVS' => '??????????????????',
            'BARCODE' => '????????????',
        );

        switch ($returnResult['PaymentType']) {

            case 'CREDIT':

                $result .= '????????????: ' . $paymentTransform[$returnResult['PaymentType']] . '<br />';
                $result .= '???????????????: ' . $returnResult['RespondCode'] . '<br />';
                $result .= '???????????????: ' . $returnResult['Auth'] . '<br />';
                $result .= '???????????????: ' . $returnResult['Card6No'] . '<br />';
                $result .= '???????????????: ' . $returnResult['Card4No'] . '<br />';

                //	??????
                if (isset($returnResult['Inst']) && !empty($returnResult['Inst'])) {
                    $result .= '????????????: ' . $returnResult['Inst'] . '<br />';

                    //	????????????
                    if (isset($returnResult['InstFirst']) && !empty($returnResult['InstFirst'])) {
                        $result .= '????????????: ' . $returnResult['InstFirst'] . '<br />';
                    }

                    //	????????????
                    if (isset($returnResult['InstEach']) && !empty($returnResult['InstEach'])) {
                        $result .= '????????????: ' . $returnResult['InstEach'] . '<br />';
                    }
                }

                break;

            case 'WEBATM':
            case 'VACC':

                $result .= '????????????: ' . $paymentTransform[$returnResult['PaymentType']] . '<br />';
                $result .= '???????????????????????????: ' . $returnResult['PayBankCode'] . '<br />';
                $result .= '????????????????????????????????????: ' . $returnResult['PayerAccount5Code'] . '<br />';
                break;

            case 'CVS':

                $result .= '????????????: ' . $paymentTransform[$returnResult['PaymentType']] . '<br />';
                $result .= '????????????: ' . $returnResult['CodeNo'] . '<br />';
                break;

            case 'BARCODE':

                $result .= '????????????: ' . $paymentTransform[$returnResult['PaymentType']] . '<br />';
                $result .= '????????????: ' . $returnResult['PayStore'] . '<br />';
                $result .= '???????????????: ' . $returnResult['Barcode_1'] . '<br />';
                $result .= '???????????????: ' . $returnResult['Barcode_2'] . '<br />';
                $result .= '???????????????: ' . $returnResult['Barcode_3'] . '<br />';
                break;

            default :
                break;
        }

        return $result;
    }
    protected function _getCode($returnResult) {
        $result = '';

        $paymentTransform = array(
            'CREDIT' => '?????????',
            'WEBATM' => 'WebATM',
            'VACC' => 'ATM??????',
            'CVS' => '??????????????????',
            'BARCODE' => '????????????',
        );
        $BankTransform = array(
        	'808' => '808 ????????????',
        	'004' => '004 ????????????',
        	'813' => '813 ????????????',
        	'008' => '008 ????????????',
        	'017' => '017 ????????????',


        );

        switch ($returnResult['PaymentType']) {

            case 'CREDIT':
                break;

            case 'WEBATM':
            	break;
            case 'VACC': //ATM??????
            	$bankname = isset($BankTransform[$returnResult['BankCode']]) ? $BankTransform[$returnResult['BankCode']] : $returnResult['BankCode'];

                $result .= '????????????: ' . $paymentTransform[$returnResult['PaymentType']] . '<br />';
                $result .= '????????????: ' . $bankname . '<br />';
                //$result .= '????????????: ' . $returnResult['BankCode'] . '<br />';
                $result .= '????????????: ' . $returnResult['CodeNo'] . '<br />';
                $result .= '????????????: ' . $returnResult['ExpireDate'] . ' 23:59:59';
                break;

            case 'CVS':

                $result .= '????????????: ' . $paymentTransform[$returnResult['PaymentType']] . '<br />';
                $result .= '????????????: ' . $returnResult['CodeNo'] . '<br />';
                $result .= '????????????: ' . $returnResult['ExpireDate'] . ' 23:59:59';
                break;

            case 'BARCODE':
		      		if ($this->config->get('SpgatewayMPG2_test_mode')) {
						$service_urlcode2 = '<img src="https://ccore.spgateway.com/API/barcode_display/get_barcode_img?barcode_text=';
					} else {
						$service_urlcode2 = '<img src="https://core.spgateway.com/API/barcode_display/get_barcode_img?barcode_text=';
					}
                $result .= '????????????: ' . $paymentTransform[$returnResult['PaymentType']] . '<br />';
                $result .= '???????????????: ' . $returnResult['Barcode_1'] . '<br />';
                $result .= $service_urlcode2 . $returnResult['Barcode_1'] . '"><br /><br />';

                $result .= '???????????????: ' . $returnResult['Barcode_2'] . '<br />';
                 $result .= $service_urlcode2 . $returnResult['Barcode_2'] . '"><br /><br />';
                $result .= '???????????????: ' . $returnResult['Barcode_3'] . '<br />';
                 $result .= $service_urlcode2 . $returnResult['Barcode_3'] . '"><br /><br />';
                 $result .= '????????????: ' . $returnResult['ExpireDate'] . ' 23:59:59';

                break;

            default :
                break;
        }

        return $result;
    }


    public function clearCustomerCart($customer_id) {
        $this->db->query("UPDATE `" . DB_PREFIX . "customer` SET cart = '' WHERE customer_id = '" . (int) $customer_id . "'");
        unset($this->session->data['customer_id']);
    }
}
