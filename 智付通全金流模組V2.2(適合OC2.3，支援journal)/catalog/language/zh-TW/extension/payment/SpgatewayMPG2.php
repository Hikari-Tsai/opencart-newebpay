<?php
// Text
// catalog/controller/payment/SpgatewayMPG2.php:17
//$_['SpgatewayMPG2_text_title'] = '超商付款、轉帳與其他信用卡(智付通加密安全連線)';
$_['SpgatewayMPG2_text_createstatus'] = '藍新金流付款';
// catalog/controller/payment/SpgatewayMPG2.php:18
$_['SpgatewayMPG2_text_payment_methods'] = '付款方式';
// catalog/controller/payment/SpgatewayMPG2.php:19
$_['SpgatewayMPG2_text_checkout_button'] = '結帳';
// catalog/controller/payment/SpgatewayMPG2.php:25
$_['SpgatewayMPG2_text_credit'] = '信用卡一次付清';
$_['SpgatewayMPG2_text_credit_3'] = '信用卡(3期)';
$_['SpgatewayMPG2_text_credit_6'] = '信用卡(6期)';
$_['SpgatewayMPG2_text_credit_12'] = '信用卡(12期)';
$_['SpgatewayMPG2_text_credit_18'] = '信用卡(18期)';
$_['SpgatewayMPG2_text_credit_24'] = '信用卡(24期)';
$_['SpgatewayMPG2_text_webatm'] = '線上轉帳(需有讀卡機，手機不適用)';
$_['SpgatewayMPG2_text_atm'] = 'ATM轉帳';
$_['SpgatewayMPG2_text_cvs'] = '超商繳費代碼';
$_['SpgatewayMPG2_text_barcode'] = '列印超商條碼(手機不適用)';
// catalog/controller/payment/SpgatewayMPG2.php:91
$_['SpgatewayMPG2_text_item_name'] = '網路商品一批';
// catalog/controller/payment/SpgatewayMPG2.php:250
$_['SpgatewayMPG2_text_common_comments'] = '付款方式 : %s, 交易時間 : %s, ';
// catalog/controller/payment/SpgatewayMPG2.php:259
$_['SpgatewayMPG2_text_get_code_result_comments'] = '取號結果 : (%s)%s';
// catalog/controller/payment/SpgatewayMPG2.php:266
$_['SpgatewayMPG2_text_payment_result_comments'] = '付款結果 : (%s)%s';
// catalog/controller/payment/SpgatewayMPG2.php:308
$_['SpgatewayMPG2_text_atm_comments'] = '銀行代碼 : %s, 虛擬帳號 : %s, 付款截止日 : %s, ';
// catalog/controller/payment/SpgatewayMPG2.php:338
$_['SpgatewayMPG2_text_cvs_comments'] = '繳費代碼 : %s, 付款截止日 : %s, ';
// catalog/controller/payment/SpgatewayMPG2.php:367
$_['SpgatewayMPG2_text_barcode_comments'] = '付款截止日 : %s, 第1段條碼號碼 : %s, 第2段條碼號碼 : %s, 第3段條碼號碼 : %s, ';
// catalog/controller/payment/SpgatewayMPG2.php:403
$_['SpgatewayMPG2_text_failure_comments'] = '付款失敗, 錯誤訊息 : %s';
$_['SpgatewayMPG2_text_payment_process']= '第三方金流(智付通)付款作業中';
$_['SpgatewayMPG2_text_detail']= '<BR>
		<div class="container">
		<!--<div class="row">
			<div><span class="error">手機不支援「網路轉帳」與「條碼繳費」，建議改採「ATM轉帳」與「超商代碼」</span></div>
		</div>-->
		<div class="row" style="padding:7px 0px">
			<div class="col-xl-2" style="padding:0px 5px"><B>線上轉帳<span class="error">限電腦操作，需連接讀卡機(手機不適用!)</span></B></div>
			<div class="col-xl-10">系統將直接採用各家銀行線上ATM匯款。</div>
		</div>
		<div class="row" style="padding:7px 0px">
			<div class="col-xl-2" style="padding:0px 5px"><B>ATM轉帳</B></div>
			<div class="col-xl-10">支援多家銀行，若您有台灣銀行、台新銀行、華南銀行，則使用該行庫的ATM轉帳免跨行手續費，其他金融行庫自負手續費15元。</div>
		</div>
		<div class="row" style="padding:7px 0px">
			<div class="col-xl-2" style="padding:0px 5px"><B>超商繳費代碼</B></div>
			<div class="col-xl-10">取得代碼後可在期限內使用超商使用多功能機列印條碼付款(7-ELEVEN ibon、全家FamiPort、萊爾富Life-ET、OK‧go)。<!--<a target="_blank" href="https://www.allpay.com.tw/Service/pay_way_cvpay">操作流程說明</a>--></div>
		</div>
		<div class="row" style="padding:7px 0px">
			<div class="col-xl-2" style="padding:0px 5px"><B>列印繳費條碼<span class="error">限電腦操作且連接印表機使用(手機不適用!)</span></B></div>
			<div class="col-xl-10">。按照步驟將可自動取得三段條碼，請用雷射印表機列印後至超商繳費(繳費期限為三天)。</div>
		</div></div>';
// Error
// catalog/controller/payment/SpgatewayMPG2.php:51
$_['SpgatewayMPG2_error_invalid_payment'] = '無效的付款方式.';
// catalog/controller/payment/SpgatewayMPG2.php:54
$_['SpgatewayMPG2_error_order_id_miss'] = '訂單編號遺失.';
// catalog/controller/payment/SpgatewayMPG2.php:65
$_['SpgatewayMPG2_error_module_miss'] = 'SpgatewayMPG2 模組遺失.';