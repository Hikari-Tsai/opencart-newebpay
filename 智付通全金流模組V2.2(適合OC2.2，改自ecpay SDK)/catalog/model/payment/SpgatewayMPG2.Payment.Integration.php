<?php

/**
 * 付款方式。
 */
abstract class SpgatewayMPG2_PaymentMethod {

    /**
     * 不指定付款方式。
     */
    const ALL = 'ALL';

    /**
     * 信用卡付費。
     */
    const Credit = 'Credit';

    /**
     * 網路 ATM。
     */
    const WebATM = 'WebATM';

    /**
     * 自動櫃員機。
     */
    const ATM = 'ATM';

    /**
     * 超商代碼。
     */
    const CVS = 'CVS';

    /**
     * 超商條碼。
     */
    const BARCODE = 'BARCODE';

    /**
     * AndroidPay。
     */
    const AndroidPay = 'AndroidPay';

}

/**
 * 付款方式子項目。
 */
abstract class SpgatewayMPG2_PaymentMethodItem {

    /**
     * 不指定。
     */
    const None = '';
    // WebATM 類(001~100)
    /**
     * 台新銀行。
     */
    const WebATM_TAISHIN = 'TAISHIN';

    /**
     * 玉山銀行。
     */
    const WebATM_ESUN = 'ESUN';

    /**
     * 華南銀行。
     */
    const WebATM_HUANAN = 'HUANAN';

    /**
     * 台灣銀行。
     */
    const WebATM_BOT = 'BOT';

    /**
     * 台北富邦。
     */
    const WebATM_FUBON = 'FUBON';

    /**
     * 中國信託。
     */
    const WebATM_CHINATRUST = 'CHINATRUST';

    /**
     * 第一銀行。
     */
    const WebATM_FIRST = 'FIRST';

    /**
     * 國泰世華。
     */
    const WebATM_CATHAY = 'CATHAY';

    /**
     * 兆豐銀行。
     */
    const WebATM_MEGA = 'MEGA';

    /**
     * 元大銀行。
     */
    const WebATM_YUANTA = 'YUANTA';

    /**
     * 土地銀行。
     */
    const WebATM_LAND = 'LAND';
    // ATM 類(101~200)
    /**
     * 台新銀行。
     */
    const ATM_TAISHIN = 'TAISHIN';

    /**
     * 玉山銀行。
     */
    const ATM_ESUN = 'ESUN';

    /**
     * 華南銀行。
     */
    const ATM_HUANAN = 'HUANAN';

    /**
     * 台灣銀行。
     */
    const ATM_BOT = 'BOT';

    /**
     * 台北富邦。
     */
    const ATM_FUBON = 'FUBON';

    /**
     * 中國信託。
     */
    const ATM_CHINATRUST = 'CHINATRUST';
    
    /**
     * 土地銀行。
     */
    const ATM_LAND = 'LAND';
    
    /**
     * 國泰世華銀行。
     */
    const ATM_CATHAY = 'CATHAY';

    /**
     * 大眾銀行。
     */
    const ATM_Tachong = 'Tachong';

    /**
     * 永豐銀行。
     */
    const ATM_Sinopac = 'Sinopac';

    /**
     * 彰化銀行。
     */
    const ATM_CHB = 'CHB';

    /**
     * 第一銀行。
     */
    const ATM_FIRST = 'FIRST';
    
    // 超商類(201~300)
    /**
     * 超商代碼繳款。
     */
    const CVS = 'CVS';

    /**
     * OK超商代碼繳款。
     */
    const CVS_OK = 'OK';

    /**
     * 全家超商代碼繳款。
     */
    const CVS_FAMILY = 'FAMILY';

    /**
     * 萊爾富超商代碼繳款。
     */
    const CVS_HILIFE = 'HILIFE';

    /**
     * 7-11 ibon代碼繳款。
     */
    const CVS_IBON = 'IBON';

    // 其他類(901~999)
    /**
     * 超商條碼繳款。
     */
    const BARCODE = 'BARCODE';

    /**
     * 信用卡(MasterCard/JCB/VISA)。
     */
    const Credit = 'Credit';

    /**
     * 貨到付款。
     */
    const COD = 'COD';

}

/**
 * 額外付款資訊。
 */
abstract class SpgatewayMPG2_ExtraPaymentInfo {

    /**
     * 需要額外付款資訊。
     */
    const Yes = 'Y';

    /**
     * 不需要額外付款資訊。
     */
    const No = 'N';

}

/**
 * 額外付款資訊。
 */
abstract class SpgatewayMPG2_DeviceType {

    /**
     * 桌機版付費頁面。
     */
    const PC = 'P';

    /**
     * 行動裝置版付費頁面。
     */
    const Mobile = 'M';

}

/**
 * 信用卡訂單處理動作資訊。
 */
abstract class SpgatewayMPG2_ActionType {

    /**
     * 關帳
     */
    const C = 'C';

    /**
     * 退刷
     */
    const R = 'R';

    /**
     * 取消
     */
    const E = 'E';

    /**
     * 放棄
     */
    const N = 'N';

}

/**
 * 定期定額的週期種類。
 */
abstract class SpgatewayMPG2_PeriodType {

    /**
     * 無
     */
    const None = '';

    /**
     * 年
     */
    const Year = 'Y';

    /**
     * 月
     */
    const Month = 'M';

    /**
     * 日
     */
    const Day = 'D';

}

/**
 * 電子發票開立註記。
 */
abstract class SpgatewayMPG2_InvoiceState {
    /**
     * 需要開立電子發票。
     */
    const Yes = 'Y';

    /**
     * 不需要開立電子發票。
     */
    const No = '';
}

/**
 * 電子發票載具類別
 */
abstract class SpgatewayMPG2_CarruerType {
  // 無載具
  const None = '';
  
  // 會員載具
  const Member = '1';
  
  // 買受人自然人憑證
  const Citizen = '2';
  
  // 買受人手機條碼
  const Cellphone = '3';
}

/**
 * 電子發票列印註記
 */
abstract class SpgatewayMPG2_PrintMark {
  // 不列印
  const No = '0';
  
  // 列印
  const Yes = '1';
}

/**
 * 電子發票捐贈註記
 */
abstract class SpgatewayMPG2_Donation {
  // 捐贈
  const Yes = '1';
  
  // 不捐贈
  const No = '2';
}

/**
 * 通關方式
 */
abstract class SpgatewayMPG2_ClearanceMark {
  // 經海關出口
  const Yes = '1';
  
  // 非經海關出口
  const No = '2';
}

/**
 * 課稅類別
 */
abstract class SpgatewayMPG2_TaxType {
  // 應稅
  const Dutiable = '1';
  
  // 零稅率
  const Zero = '2';
  
  // 免稅
  const Free = '3';
  
  // 應稅與免稅混合(限收銀機發票無法分辦時使用，且需通過申請核可)
  const Mix = '9';
}

/**
 * 字軌類別
 */
abstract class SpgatewayMPG2_InvType {
  // 一般稅額
  const General = '07';
  
  // 特種稅額
  const Special = '08';
}

abstract class SpgatewayMPG2_EncryptType {
    // MD5(預設)
    const ENC_MD5 = 0;
    
    // SHA256
    const ENC_SHA256 = 1;
}

/**
 * AllInOne short summary.
 *
 * AllInOne description.
 *
 * @version 1.1.0818
 * @author charlie
 */


class SpgatewayMPG2_AllInOne {

    public $ServiceURL = 'ServiceURL';
    public $ServiceMethod = 'ServiceMethod';
    public $HashKey = 'HashKey';
    public $HashIV = 'HashIV';
    public $MerchantID = 'MerchantID';
    public $PaymentType = 'PaymentType';
    public $Send = 'Send';
    public $SendExtend = 'SendExtend';
    public $Query = 'Query';
    public $Action = 'Action';
    public $EncryptType = SpgatewayMPG2_EncryptType::ENC_MD5;

    function __construct() {

        $this->PaymentType = 'aio';
        $this->Send = array(
            "ReturnURL"         => '',
            "ClientBackURL"     => '',
            "OrderResultURL"    => '',
            "MerchantOrderNo"   => '',
            "TimeStamp"         => '',
            "PaymentType"       => 'aio',
            "Amt"               => '',
            "TradeDesc"         => '',
            //"ChoosePayment"     => SpgatewayMPG2_PaymentMethod::ALL,
            "Remark"            => '',
            "ChooseSubPayment"  => SpgatewayMPG2_PaymentMethodItem::None,
            "NeedExtraPaidInfo" => SpgatewayMPG2_ExtraPaymentInfo::No,
            "DeviceSource"      => '',
            "IgnorePayment"     => '',
            "PlatformID"        => '',
            "InvoiceMark"       => SpgatewayMPG2_InvoiceState::No,
            "Items"             => array(),
            "StoreID"           => '',
            "CustomField1"      => '',
            "CustomField2"      => '',
            "CustomField3"      => '',
            "CustomField4"      => '',
            'HoldTradeAMT'      => 0,
            "Version"           => '',
            "RespondType"       => 'String',
            "LoginType"         => 0,
            "Email"             => '',
            "ReturnURL"         => '',
            "ClientBackURL"     => '',
            "NotifyURL"         => '',
            "ExpireDate"        => '',
            "CustomerURL"       => '',
            "CREDIT"            => 0,
            "InstFlag"          => 0,
            "UNIONPAY"          => 0,
            "WEBATM"            => 0,
            "VACC"              => 0,
            "CVS"               => 0,
            "BARCODE"           => 0,
            "ALIPAY"           => 0,
            //"ANDROIDPAY"        => 0




            //'TimeStamp'         => time()
            //'CheckValue'        =>''//_getCheckValue($result);
        );

        $this->SendExtend = array();

        $this->Query = array(
            'MerchantOrderNo' => '',
            'TimeStamp' => ''
        );
        $this->Action = array(
            'MerchantOrderNo' => '',
            'TradeNo' => '',
            'Action' => SpgatewayMPG2_ActionType::C,
            'Amt' => 0
        );
        $this->Capture = array(
            'MerchantOrderNo' => '',
            'CaptureAMT' => 0,
            'UserRefundAMT' => 0,
            'PlatformID' => ''
        );

        $this->TradeNo = array(
            'DateType' => '',
            'BeginDate' => '',
            'EndDate' => '',
            'MediaFormated' => ''
        );

        $this->Trade = array(
            'CreditRefundId' => '',
            'CreditAmount' => '',
            'CreditCheckCode' => ''
        );
        
        $this->Funding = array(
            "PayDateType" => '',
            "StartDate" => '',
            "EndDate" => ''
        );

    }

    //產生訂單
    function CheckOut($target = "_self") {
        $arParameters = array_merge( array('MerchantID' => $this->MerchantID, 'EncryptType' => $this->EncryptType) ,$this->Send);
        SpgatewayMPG2_Send::CheckOut($target,$arParameters,$this->SendExtend,$this->HashKey,$this->HashIV,$this->ServiceURL);
    }

    //產生訂單html code
    function CheckOutString($paymentButton = null, $target = "_self") {
        $arParameters = array_merge( array('MerchantID' => $this->MerchantID, 'EncryptType' => $this->EncryptType) ,$this->Send);
        return SpgatewayMPG2_Send::CheckOutString($paymentButton,$target = "_self",$arParameters,$this->SendExtend,$this->HashKey,$this->HashIV,$this->ServiceURL);
    }

    //取得付款結果通知的方法
    function CheckOutFeedback() {
        return $arFeedback = SpgatewayMPG2_CheckOutFeedback::CheckOut(array_merge($_POST, array('EncryptType' => $this->EncryptType)),$this->HashKey,$this->HashIV,0);   
    }

    //訂單查詢作業
    function QueryTradeInfo() {
        return $arFeedback = SpgatewayMPG2_QueryTradeInfo::CheckOut(array_merge($this->Query,array('MerchantID' => $this->MerchantID, 'EncryptType' => $this->EncryptType)) ,$this->HashKey ,$this->HashIV ,$this->ServiceURL) ;
    }
    
    //信用卡定期定額訂單查詢的方法
    function QueryPeriodCreditCardTradeInfo() {
        return $arFeedback = SpgatewayMPG2_QueryPeriodCreditCardTradeInfo::CheckOut(array_merge($this->Query,array('MerchantID' => $this->MerchantID, 'EncryptType' => $this->EncryptType)) ,$this->HashKey ,$this->HashIV ,$this->ServiceURL);
    }

    //信用卡關帳/退刷/取消/放棄的方法
    function DoAction() {
        return $arFeedback = SpgatewayMPG2_DoAction::CheckOut(array_merge($this->Action,array('MerchantID' => $this->MerchantID, 'EncryptType' => $this->EncryptType)) ,$this->HashKey ,$this->HashIV ,$this->ServiceURL);
    }
        
    //合作特店申請撥款
    function AioCapture(){
        return $arFeedback = SpgatewayMPG2_AioCapture::Capture(array_merge($this->Capture,array('MerchantID' => $this->MerchantID, 'EncryptType' => $this->EncryptType)) ,$this->HashKey ,$this->HashIV ,$this->ServiceURL);
    }

    //下載會員對帳媒體檔
    function TradeNoAio($target = "_self"){
        $arParameters = array_merge( array('MerchantID' => $this->MerchantID, 'EncryptType' => $this->EncryptType) ,$this->TradeNo);
        SpgatewayMPG2_TradeNoAio::CheckOut($target,$arParameters,$this->HashKey,$this->HashIV,$this->ServiceURL);
    }

    //查詢信用卡單筆明細紀錄
    function QueryTrade(){
        return $arFeedback = SpgatewayMPG2_QueryTrade::CheckOut(array_merge($this->Trade,array('MerchantID' => $this->MerchantID, 'EncryptType' => $this->EncryptType)) ,$this->HashKey ,$this->HashIV ,$this->ServiceURL);
    }

    //下載信用卡撥款對帳資料檔
    function FundingReconDetail($target = "_self"){
        $arParameters = array_merge( array('MerchantID' => $this->MerchantID, 'EncryptType' => $this->EncryptType) ,$this->Funding);
        SpgatewayMPG2_FundingReconDetail::CheckOut($target,$arParameters,$this->HashKey,$this->HashIV,$this->ServiceURL);
    }
    
}

/**
* 抽象類
*/
abstract class SpgatewayMPG2_Aio
{
    
    protected static function ServerPost($parameters ,$ServiceURL) {
        $ch = curl_init();

        if (FALSE === $ch) {
            throw new Exception('curl failed to initialize');
        }
        
        curl_setopt($ch, CURLOPT_URL, $ServiceURL);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, TRUE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
        $rs = curl_exec($ch);
        
        if (FALSE === $rs) {
            throw new Exception(curl_error($ch), curl_errno($ch));
        }

        curl_close($ch);

        return $rs;
    }

}

/**
*  產生訂單
*/
class SpgatewayMPG2_Send extends SpgatewayMPG2_Aio
{   
    //付款方式物件
    public static $PaymentObj ;

    protected static function process($arParameters = array(),$arExtend = array())
    {
        //宣告付款方式物件
        $PaymentMethod    = 'SpgatewayMPG2_'.'ALL';//$arParameters['ChoosePayment'];
        self::$PaymentObj = new $PaymentMethod;
        
        //檢查參數
        $arParameters = self::$PaymentObj->check_string($arParameters);
        
        //檢查商品
        $arParameters = self::$PaymentObj->check_goods($arParameters);

        //檢查各付款方式的額外參數&電子發票參數
        $arExtend = self::$PaymentObj->check_extend_string($arExtend,$arParameters['InvoiceMark']);
        
        //過濾
        $arExtend = self::$PaymentObj->filter_string($arExtend,$arParameters['InvoiceMark']);

        //合併共同參數及延伸參數
        return array_merge($arParameters,$arExtend);
    }


    static function CheckOut($target = "_self",$arParameters = array(),$arExtend = array(),$HashKey='',$HashIV='',$ServiceURL=''){

        $arParameters = self::process($arParameters,$arExtend);
        //產生檢查碼
        $szCheckValue = SpgatewayMPG2_CheckValue::generate($arParameters,$HashKey,$HashIV,$arParameters['EncryptType']);
       //$szTradeInfo = SpgatewayMPG2_CheckValue::gen_AES($arParameters,$HashKey,$HashIV);
        //生成表單，自動送出
        $szHtml =  '<!DOCTYPE html>';
        $szHtml .= '<html>';
        $szHtml .=     '<head>';
        $szHtml .=         '<meta charset="utf-8">';
        $szHtml .=     '</head>';
        $szHtml .=     '<body>';
        $szHtml .=         "<form id=\"__SpgatewayMPG2Form\" method=\"post\" target=\"{$target}\" action=\"{$ServiceURL}\">";
        
        foreach ($arParameters as $keys => $value) {
            $szHtml .=         "<input type=\"hidden\" name=\"{$keys}\" value=\"{$value}\" />";
        }

        $szHtml .=             "<input type=\"hidden\" name=\"CheckValue\" value=\"{$szCheckValue}\" />";
        //$szHtml .=             "<input type=\"hidden\" name=\"TradeInfo\" value=\"{$szTradeInfo}\" />";
        $szHtml .=         '</form>';
        $szHtml .=         '<script type="text/javascript">document.getElementById("__SpgatewayMPG2Form").submit();</script>';
        $szHtml .=     '</body>';
        $szHtml .= '</html>';

        echo $szHtml ;
        exit;
    }

    static function CheckOutString($paymentButton,$target = "_self",$arParameters = array(),$arExtend = array(),$HashKey='',$HashIV='',$ServiceURL=''){
        
        $arParameters = self::process($arParameters,$arExtend);
        //產生檢查碼
        $szCheckValue = SpgatewayMPG2_CheckValue::generate($arParameters,$HashKey,$HashIV,$arParameters['EncryptType']);
        
        $szHtml =  '<!DOCTYPE html>';
        $szHtml .= '<html>';
        $szHtml .=     '<head>';
        $szHtml .=         '<meta charset="utf-8">';
        $szHtml .=     '</head>';
        $szHtml .=     '<body>';
        $szHtml .=         "<form id=\"__SpgatewayMPG2Form\" method=\"post\" target=\"{$target}\" action=\"{$ServiceURL}\">";

        foreach ($arParameters as $keys => $value) {
            $szHtml .=         "<input type=\"hidden\" name=\"{$keys}\" value=\"{$value}\" />";
        }

        $szHtml .=             "<input type=\"hidden\" name=\"CheckValue\" value=\"{$szCheckValue}\" />";
        $szHtml .=             "<input type=\"submit\" id=\"__paymentButton\" value=\"{$paymentButton}\" />";
        $szHtml .=         '</form>';
        $szHtml .=     '</body>';
        $szHtml .= '</html>';
        return  $szHtml ;
    }

}


class SpgatewayMPG2_CheckOutFeedback extends SpgatewayMPG2_Aio 
{
    static function CheckOut($arParameters = array(),$HashKey = '' ,$HashIV = ''){
        // 變數宣告。
        $arErrors = array();
        $arFeedback = array();
        $szCheckValue = '';

        $EncryptType = $arParameters["EncryptType"];
        unset($arParameters["EncryptType"]);

        // 重新整理回傳參數。
        foreach ($arParameters as $keys => $value) {
            if ($keys != 'CheckValue') {
                if ($keys == 'PaymentType') {
                    $value = str_replace('_CVS', '', $value);
                    $value = str_replace('_BARCODE', '', $value);
                    $value = str_replace('_CreditCard', '', $value);
                }
                if ($keys == 'PeriodType') {
                    $value = str_replace('Y', 'Year', $value);
                    $value = str_replace('M', 'Month', $value);
                    $value = str_replace('D', 'Day', $value);
                }
                $arFeedback[$keys] = $value;
            }
        }

        $CheckValue = SpgatewayMPG2_CheckValue::generate($arParameters,$HashKey,$HashIV,$EncryptType);

        if ($CheckValue != $arParameters['CheckValue']) {
            array_push($arErrors, 'CheckValue verify fail.');
        }

        if (sizeof($arErrors) > 0) {
            throw new Exception(join('- ', $arErrors));
        }
        
        return $arFeedback;
    }
}


class SpgatewayMPG2_QueryTradeInfo extends SpgatewayMPG2_Aio
{
    static function CheckOut($arParameters = array(),$HashKey ='',$HashIV ='',$ServiceURL = ''){
        $arErrors = array();
        $arParameters['TimeStamp'] = time();
        $arFeedback = array();
        $arConfirmArgs = array();

        $EncryptType = $arParameters["EncryptType"];
        unset($arParameters["EncryptType"]);

        // 呼叫查詢。
        if (sizeof($arErrors) == 0) {
            $arParameters["CheckValue"] = SpgatewayMPG2_CheckValue::generate($arParameters,$HashKey,$HashIV,$EncryptType);
            // 送出查詢並取回結果。
            $szResult = parent::ServerPost($arParameters,$ServiceURL);
            $szResult = str_replace(' ', '%20', $szResult);
            $szResult = str_replace('+', '%2B', $szResult);
            
            // 轉結果為陣列。
            parse_str($szResult, $arResult);
            // 重新整理回傳參數。
            foreach ($arResult as $keys => $value) {
                if ($keys == 'CheckValue') {
                    $szCheckValue = $value;
                } else {
                    $arFeedback[$keys] = $value;
                    $arConfirmArgs[$keys] = $value;
                }
            }

            // 驗證檢查碼。
            if (sizeof($arFeedback) > 0) {
                $szConfirmMacValue = SpgatewayMPG2_CheckValue::generate($arConfirmArgs,$HashKey,$HashIV,$EncryptType);
                if ($szCheckValue != $szConfirmMacValue) {
                    array_push($arErrors, 'CheckValue verify fail.');
                }
            }
        }

        if (sizeof($arErrors) > 0) {
            throw new Exception(join('- ', $arErrors));
        }

        return $arFeedback ;

    }    
}


class SpgatewayMPG2_QueryPeriodCreditCardTradeInfo extends SpgatewayMPG2_Aio
{
    static function CheckOut($arParameters = array(),$HashKey ='',$HashIV ='',$ServiceURL = ''){
        $arErrors = array();
        $arParameters['TimeStamp'] = time();
        $arFeedback = array();
        $arConfirmArgs = array();

        $EncryptType = $arParameters["EncryptType"];
        unset($arParameters["EncryptType"]);

        // 呼叫查詢。
        if (sizeof($arErrors) == 0) {
            $arParameters["CheckValue"] = SpgatewayMPG2_CheckValue::generate($arParameters,$HashKey,$HashIV,$EncryptType);
            // 送出查詢並取回結果。
            $szResult = parent::ServerPost($arParameters,$ServiceURL);
            $szResult = str_replace(' ', '%20', $szResult);
            $szResult = str_replace('+', '%2B', $szResult);
            
            // 轉結果為陣列。
            $arResult = json_decode($szResult,true);
            // 重新整理回傳參數。
            foreach ($arResult as $keys => $value) {
                $arFeedback[$keys] = $value;
            }

        }

        if (sizeof($arErrors) > 0) {
            throw new Exception(join('- ', $arErrors));
        }

        return $arFeedback ;
    }
}


class SpgatewayMPG2_DoAction extends SpgatewayMPG2_Aio
{
    static function CheckOut($arParameters = array(),$HashKey ='',$HashIV ='',$ServiceURL = ''){
                // 變數宣告。
        $arErrors = array();
        $arFeedback = array();

        $EncryptType = $arParameters["EncryptType"];
        unset($arParameters["EncryptType"]);

        //產生驗證碼
        $szCheckValue = SpgatewayMPG2_CheckValue::generate($arParameters,$HashKey,$HashIV,$EncryptType);
        $arParameters["CheckValue"] = $szCheckValue;
        // 送出查詢並取回結果。
        $szResult = self::ServerPost($arParameters,$ServiceURL);
        // 轉結果為陣列。
        parse_str($szResult, $arResult);
        // 重新整理回傳參數。
        foreach ($arResult as $keys => $value) {
            if ($keys == 'CheckValue') {
                $szCheckValue = $value;
            } else {
                $arFeedback[$keys] = $value;
            }
        }

        if (array_key_exists('RtnCode', $arFeedback) && $arFeedback['RtnCode'] != '1') {
            array_push($arErrors, vsprintf('#%s: %s', array($arFeedback['RtnCode'], $arFeedback['RtnMsg'])));
        }
        
        if (sizeof($arErrors) > 0) {
            throw new Exception(join('- ', $arErrors));
        }

        return $arFeedback ;

    }
}

class SpgatewayMPG2_AioCapture extends SpgatewayMPG2_Aio
{
    static function Capture($arParameters=array(),$HashKey='',$HashIV='',$ServiceURL=''){

        $arErrors   = array();
        $arFeedback = array();
        
        $EncryptType = $arParameters["EncryptType"];
        unset($arParameters["EncryptType"]);

        $szCheckValue = SpgatewayMPG2_CheckValue::generate($arParameters,$HashKey,$HashIV,$EncryptType);
        $arParameters["CheckValue"] = $szCheckValue;

        // 送出查詢並取回結果。
        $szResult = self::ServerPost($arParameters,$ServiceURL);

        // 轉結果為陣列。
        parse_str($szResult, $arResult);

        // 重新整理回傳參數。
        foreach ($arResult as $keys => $value) {
            $arFeedback[$keys] = $value;
        }

        if (sizeof($arErrors) > 0) {
            throw new Exception(join('- ', $arErrors));
        }

        return $arFeedback;

    }
}

class SpgatewayMPG2_TradeNoAio extends SpgatewayMPG2_Aio
{   
    static function CheckOut($target = "_self",$arParameters = array(),$HashKey='',$HashIV='',$ServiceURL=''){
        //產生檢查碼
        $EncryptType = $arParameters['EncryptType'];
        unset($arParameters['EncryptType']);

        $szCheckValue = SpgatewayMPG2_CheckValue::generate($arParameters,$HashKey,$HashIV,$EncryptType);
       
        //生成表單，自動送出
        $szHtml =  '<!DOCTYPE html>';
        $szHtml .= '<html>';
        $szHtml .=     '<head>';
        $szHtml .=         '<meta charset="utf-8">';
        $szHtml .=     '</head>';
        $szHtml .=     '<body>';
        $szHtml .=         "<form id=\"__SpgatewayMPG2Form\" method=\"post\" target=\"{$target}\" action=\"{$ServiceURL}\">";
        
        foreach ($arParameters as $keys => $value) {
            $szHtml .=         "<input type=\"hidden\" name=\"{$keys}\" value=\"{$value}\" />";
        }

        $szHtml .=             "<input type=\"hidden\" name=\"CheckValue\" value=\"{$szCheckValue}\" />";
        $szHtml .=         '</form>';
        $szHtml .=         '<script type="text/javascript">document.getElementById("__SpgatewayMPG2Form").submit();</script>';
        $szHtml .=     '</body>';
        $szHtml .= '</html>';
        
        echo $szHtml ;
        exit;
    }
}

class SpgatewayMPG2_QueryTrade extends SpgatewayMPG2_Aio
{
    static function CheckOut($arParameters = array(),$HashKey ='',$HashIV ='',$ServiceURL = ''){
        $arErrors = array();
        $arFeedback = array();
        $arConfirmArgs = array();

        $EncryptType = $arParameters["EncryptType"];
        unset($arParameters["EncryptType"]);

        // 呼叫查詢。
        if (sizeof($arErrors) == 0) {
            $arParameters["CheckValue"] = SpgatewayMPG2_CheckValue::generate($arParameters,$HashKey,$HashIV,$EncryptType);
            // 送出查詢並取回結果。
            $szResult = parent::ServerPost($arParameters,$ServiceURL);
            
            // 轉結果為陣列。
            $arResult = json_decode($szResult,true);
            
            // 重新整理回傳參數。
            foreach ($arResult as $keys => $value) {
                $arFeedback[$keys] = $value;
            }
        }

        if (sizeof($arErrors) > 0) {
            throw new Exception(join('- ', $arErrors));
        }

        return $arFeedback ;
    }
}

class SpgatewayMPG2_FundingReconDetail extends SpgatewayMPG2_Aio
{   
    static function CheckOut($target = "_self",$arParameters = array(),$HashKey='',$HashIV='',$ServiceURL=''){
        //產生檢查碼
        $EncryptType = $arParameters["EncryptType"];
        unset($arParameters["EncryptType"]);
        
        $szCheckValue = SpgatewayMPG2_CheckValue::generate($arParameters,$HashKey,$HashIV,$EncryptType);
       
        //生成表單，自動送出
        $szHtml =  '<!DOCTYPE html>';
        $szHtml .= '<html>';
        $szHtml .=     '<head>';
        $szHtml .=         '<meta charset="utf-8">';
        $szHtml .=     '</head>';
        $szHtml .=     '<body>';
        $szHtml .=         "<form id=\"__SpgatewayMPG2Form\" method=\"post\" target=\"{$target}\" action=\"{$ServiceURL}\">";
        
        foreach ($arParameters as $keys => $value) {
            $szHtml .=         "<input type=\"hidden\" name=\"{$keys}\" value=\"{$value}\" />";
        }

        $szHtml .=             "<input type=\"hidden\" name=\"CheckValue\" value=\"{$szCheckValue}\" />";
        $szHtml .=         '</form>';
        $szHtml .=         '<script type="text/javascript">document.getElementById("__SpgatewayMPG2Form").submit();</script>';
        $szHtml .=     '</body>';
        $szHtml .= '</html>';

        echo $szHtml ;
        exit;
    }
}







Abstract class SpgatewayMPG2_Verification
{
    // 電子發票延伸參數。
    public $arInvoice = array(
            "RelateNumber",
            "CustomerIdentifier",
            "CarruerType" ,
            "CustomerID" ,
            "Donation" ,
            "Print" ,
            "TaxType",
            "CustomerName" ,
            "CustomerAddr" ,
            "CustomerPhone" ,
            "CustomerEmail" ,
            "ClearanceMark" ,
            "CarruerNum" ,
            "LoveCode" ,
            "InvoiceRemark" ,
            "DelayDay",
            "InvoiceItemDesc",
            "InvoiceItemCount",
            "InvoiceItemWord",
            "InvoiceItemPrice",
            "InvoiceItemTaxType",
            "InvType"
        );

    // 付款方式延伸參數
    public $arPayMentExtend = array();

    //檢查共同參數
    public function check_string($arParameters = array()){
        
        $arErrors = array();
        if (strlen($arParameters['MerchantID']) == 0) {
            array_push($arErrors, 'MerchantID is required.');
        }
        if (strlen($arParameters['MerchantID']) > 12) {
            array_push($arErrors, 'MerchantID max langth as 12.');
        }

        /*if (strlen($arParameters['ReturnURL']) == 0) {
            array_push($arErrors, 'ReturnURL is required.');
        }*/
        if (strlen($arParameters['ClientBackURL']) > 200) {
            array_push($arErrors, 'ClientBackURL max langth as 200.');
        }
        if (strlen($arParameters['OrderResultURL']) > 200) {
            array_push($arErrors, 'OrderResultURL max langth as 200.');
        }

        if (strlen($arParameters['MerchantOrderNo']) == 0) {
            array_push($arErrors, 'MerchantOrderNo is required.');
        }
        if (strlen($arParameters['MerchantOrderNo']) > 20) {
            array_push($arErrors, 'MerchantOrderNo max langth as 20.');
        }
        if (strlen($arParameters['TimeStamp']) == 0) {
            array_push($arErrors, 'TimeStamp is required.');
        }
        if (strlen($arParameters['Amt']) == 0) {
            array_push($arErrors, 'Amt is required.');
        }
        if (strlen($arParameters['TradeDesc']) == 0) {
            array_push($arErrors, 'TradeDesc is required.');
        }
        if (strlen($arParameters['TradeDesc']) > 200) {
            array_push($arErrors, 'TradeDesc max langth as 200.');
        }
        //if (strlen($arParameters['ChoosePayment']) == 0) {
        //    array_push($arErrors, 'ChoosePayment is required.');
        //}
        if (strlen($arParameters['NeedExtraPaidInfo']) == 0) {
            array_push($arErrors, 'NeedExtraPaidInfo is required.');
        }
        if (sizeof($arParameters['Items']) == 0) {
            array_push($arErrors, 'Items is required.');
        }

        // 檢查CheckValue加密方式
        if (strlen($arParameters['EncryptType']) > 1) {
            array_push($arErrors, 'EncryptType max langth as 1.');
        }

        if (sizeof($arErrors)>0) throw new Exception(join('<br>', $arErrors));

        if (!$arParameters['PlatformID']) {
            unset($arParameters['PlatformID']);
        }

        //if ($arParameters['ChoosePayment']!=='ALL') {
        //    unset($arParameters['IgnorePayment']);
        //}

        return $arParameters ;
    }

    //檢查延伸參數
    public function check_extend_string($arExtend = array(),$InvoiceMark = ''){
        //沒設定參數的話，就給預設參數
        foreach ($this->arPayMentExtend as $key => $value) {
            if(!isset($arExtend[$key])) $arExtend[$key] = $value;
        }

        //若有開發票，檢查一下發票參數
        if ($InvoiceMark == 'Y') $arExtend = $this->check_invoiceString($arExtend);

        return $arExtend ;
    }

    //檢查商品
    public function check_goods($arParameters = array()){
        // 檢查產品名稱。
        $szItemDesc = '';
        $arErrors   = array();
        if (sizeof($arParameters['Items']) > 0) {
            foreach ($arParameters['Items'] as $keys => $value) {
                //$szItemDesc .= vsprintf('#%s %d %s x %u', $arParameters['Items'][$keys]);
                $szItemDesc .= vsprintf('#%s (%d %s)', $arParameters['Items'][$keys]);
                /*if (!array_key_exists('ItemURL', $arParameters)) {
                    $arParameters['ItemURL'] = $arParameters['Items'][$keys]['URL'];
                }*/
            }

            if (strlen($szItemDesc) > 0) {
                $szItemDesc = mb_substr($szItemDesc, 1, 50);
                $arParameters['ItemDesc'] = $szItemDesc ;
            }
        } else {
            array_push($arErrors, "Goods information not found.");
        }

        if(sizeof($arErrors)>0) throw new Exception(join('<br>', $arErrors));

        unset($arParameters['Items']);
        return $arParameters ;
    }

    //過濾多餘參數
    public function filter_string($arExtend = array(),$InvoiceMark = ''){
        $arPayMentExtend = array_merge(array_keys($this->arPayMentExtend), ($InvoiceMark == '') ? array() : $this->arInvoice);
        foreach ($arExtend as $key => $value) {
            if (!in_array($key,$arPayMentExtend )) {
                unset($arExtend[$key]);
            }
        }

        return $arExtend ;
    }

    //檢查電子發票參數
    public function check_invoiceString($arExtend = array()){
        $arErrors = array();

        // 廠商自訂編號RelateNumber(不可為空)
        if(!array_key_exists('RelateNumber', $arExtend)){
            array_push($arErrors, 'RelateNumber is required.');
        }else{
            if (strlen($arExtend['RelateNumber']) > 30) {
                array_push($arErrors, "RelateNumber max length as 30.");
            }
        }

        // 統一編號CustomerIdentifier(預設為空字串)
        if(!array_key_exists('CustomerIdentifier', $arExtend)){
            $arExtend['CustomerIdentifier'] = '';
        }else{
            //統編長度只能為8
            if(strlen($arExtend['CustomerIdentifier']) != 8){
                array_push($arErrors, "CustomerIdentifier length should be 8.");
            }
        }

        // 載具類別CarruerType(預設為None)
        if(!array_key_exists('CarruerType', $arExtend)){
            $arExtend['CarruerType'] = SpgatewayMPG2_CarruerType::None ;
        }else{
            //有設定統一編號的話，載具類別不可為合作特店載具或自然人憑證載具。
            $notPrint = array(SpgatewayMPG2_CarruerType::Member, SpgatewayMPG2_CarruerType::Citizen);
            if(strlen($arExtend['CustomerIdentifier']) > 0 && in_array($arExtend['CarruerType'], $notPrint)){
                array_push($arErrors, "CarruerType should NOT be Member or Citizen.");
            }
        }

        // 客戶代號CustomerID(預設為空字串)
        if(!array_key_exists('CustomerID', $arExtend)) {
            $arExtend['CustomerID'] = '';
        }else{
            if($arExtend['CarruerType'] == SpgatewayMPG2_CarruerType::Member && strlen($arExtend['CustomerID']) == 0 ){
                array_push($arErrors, "CustomerID is required.");
            }
        }
        // 捐贈註記 Donation(預設為No)
        if(!array_key_exists('Donation', $arExtend)){
            $arExtend['Donation'] = SpgatewayMPG2_Donation::No ;
        }else{
            //若有帶統一編號，不可捐贈
            if(strlen($arExtend['CustomerIdentifier']) > 0 && $arExtend['Donation'] != SpgatewayMPG2_Donation::No){
                array_push($arErrors, "Donation should be No.");
            }
        }

        // 列印註記Print(預設為No)
        if(!array_key_exists('Print', $arExtend)){
            $arExtend['Print'] = SpgatewayMPG2_PrintMark::No;
        }else{
            //捐贈註記為捐贈(Yes)時，請設定不列印(No)
            if($arExtend['Donation'] == SpgatewayMPG2_Donation::Yes && $arExtend['Print'] != SpgatewayMPG2_PrintMark::No){
                array_push($arErrors, "Print should be No.");
            }
            // 統一編號不為空字串時，請設定列印(Yes)
            if(strlen($arExtend['CustomerIdentifier']) > 0 && $arExtend['Print'] != SpgatewayMPG2_PrintMark::Yes){
                array_push($arErrors, "Print should be Yes.");
            }
        }
        // 客戶名稱CustomerName(UrlEncode, 預設為空字串)
        if(!array_key_exists('CustomerName', $arExtend)){
            $arExtend['CustomerName'] = '';
        }else{
            if (mb_strlen($arExtend['CustomerName'], 'UTF-8') > 20) {
                  array_push($arErrors, "CustomerName max length as 20.");
            }
            // 列印註記為列印(Yes)時，此參數不可為空字串
            if($arExtend['Print'] == SpgatewayMPG2_PrintMark::Yes && strlen($arExtend['CustomerName']) == 0){
                array_push($arErrors, "CustomerName is required.");
            }
        }

        // 客戶地址CustomerAddr(UrlEncode, 預設為空字串)
        if(!array_key_exists('CustomerAddr', $arExtend)){
            $arExtend['CustomerAddr'] = '';
        }else{
            if (mb_strlen($arExtend['CustomerAddr'], 'UTF-8') > 200) {
                  array_push($arErrors, "CustomerAddr max length as 200.");
            }
            // 列印註記為列印(Yes)時，此參數不可為空字串
            if($arExtend['Print'] == SpgatewayMPG2_PrintMark::Yes && strlen($arExtend['CustomerAddr']) == 0){
                array_push($arErrors, "CustomerAddr is required.");
            }
        }
        // 客戶電話CustomerPhone
        if(!array_key_exists('CustomerPhone', $arExtend)){
            $arExtend['CustomerPhone'] = '';
        }else{
            if (strlen($arExtend['CustomerPhone']) > 20) array_push($arErrors, "CustomerPhone max length as 20.");
        }

        // 客戶信箱CustomerEmail 
        if(!array_key_exists('CustomerEmail', $arExtend)){
            $arExtend['CustomerEmail'] = '';
        }else{
            if (strlen($arExtend['CustomerEmail']) > 200) array_push($arErrors, "CustomerEmail max length as 200.");
        }

        //(CustomerEmail與CustomerPhone擇一不可為空)
        if (strlen($arExtend['CustomerPhone']) == 0 and strlen($arExtend['CustomerEmail']) == 0) array_push($arErrors, "CustomerPhone or CustomerEmail is required.");

        //課稅類別 TaxType(不可為空)
        if (strlen($arExtend['TaxType']) == 0) array_push($arErrors, "TaxType is required.");
        
        //通關方式 ClearanceMark(預設為空字串)
        if(!array_key_exists('ClearanceMark', $arExtend)) {
            $arExtend['ClearanceMark'] = '';
        }else{
            //課稅類別為零稅率(Zero)時，ClearanceMark不可為空字串
            if($arExtend['TaxType'] == SpgatewayMPG2_TaxType::Zero && ($arExtend['ClearanceMark'] != SpgatewayMPG2_ClearanceMark::Yes || $arExtend['ClearanceMark'] != SpgatewayMPG2_ClearanceMark::No)) {
                array_push($arErrors, "ClearanceMark is required.");
            }
            if (strlen($arExtend['ClearanceMark']) > 0 && $arExtend['TaxType'] != SpgatewayMPG2_TaxType::Zero) {
                array_push($arErrors, "Please remove ClearanceMark.");
            }
        }
        
        // CarruerNum(預設為空字串)
        if (!array_key_exists('CarruerNum', $arExtend)) {
            $arExtend['CarruerNum'] = '';
        } else {
            switch ($arExtend['CarruerType']) {
                // 載具類別為無載具(None)或會員載具(Member)時，系統自動忽略載具編號
                case SpgatewayMPG2_CarruerType::None:
                case SpgatewayMPG2_CarruerType::Member:
                break;
                // 載具類別為買受人自然人憑證(Citizen)時，請設定自然人憑證號碼，前2碼為大小寫英文，後14碼為數字
                case SpgatewayMPG2_CarruerType::Citizen:
                    if (!preg_match('/^[a-zA-Z]{2}\d{14}$/', $arExtend['CarruerNum'])){
                        array_push($arErrors, "Invalid CarruerNum.");
                    }
                break;
                // 載具類別為買受人手機條碼(Cellphone)時，請設定手機條碼，第1碼為「/」，後7碼為大小寫英文、數字、「+」、「-」或「.」
                case SpgatewayMPG2_CarruerType::Cellphone:
                    if (!preg_match('/^\/{1}[0-9a-zA-Z+-.]{7}$/', $arExtend['CarruerNum'])) {
                        array_push($arErrors, "Invalid CarruerNum.");
                    }
                break;

                default:
                    array_push($arErrors, "Please remove CarruerNum.");
            }
        }

        // 愛心碼 LoveCode(預設為空字串)
        if(!array_key_exists('LoveCode', $arExtend)) $arExtend['LoveCode'] = '';
        // 捐贈註記為捐贈(Yes)時，參數長度固定3~7碼，請設定全數字或第1碼大小寫「X」，後2~6碼全數字
        if ($arExtend['Donation'] == SpgatewayMPG2_Donation::Yes) {
            if (!preg_match('/^([xX]{1}[0-9]{2,6}|[0-9]{3,7})$/', $arExtend['LoveCode'])) {
                array_push($arErrors, "Invalid LoveCode.");
            }
        }

        //備註 InvoiceRemark(UrlEncode, 預設為空字串)
        if(!array_key_exists('InvoiceRemark', $arExtend)) $arExtend['InvoiceRemark'] = '';      
        
        // 延遲天數 DelayDay(不可為空, 預設為0) 延遲天數，範圍0~15，設定為0時，付款完成後立即開立發票
        if(!array_key_exists('DelayDay', $arExtend)) $arExtend['DelayDay'] = 0 ;
        if ($arExtend['DelayDay'] < 0 or $arExtend['DelayDay'] > 15) array_push($arErrors, "DelayDay should be 0 ~ 15.");
        
              
        // 字軌類別 InvType(不可為空)
        if (!array_key_exists('InvType', $arExtend)) array_push($arErrors, "InvType is required.");

        //商品相關整理
        if(!array_key_exists('InvoiceItems', $arExtend)){
            array_push($arErrors, "Invoice Goods information not found.");
        }else{
            $InvSptr = '|';
            $tmpItemDesc = array();
            $tmpItemCount = array();
            $tmpItemWord = array();
            $tmpItemPrice = array();
            $tmpItemTaxType = array();
            foreach ($arExtend['InvoiceItems'] as $tmpItemInfo) {
                if (mb_strlen($tmpItemInfo['Name'], 'UTF-8') > 0) {
                    array_push($tmpItemDesc, $tmpItemInfo['Name']);
                }
                if (strlen($tmpItemInfo['Count']) > 0) {
                    array_push($tmpItemCount, $tmpItemInfo['Count']);
                }
                if (mb_strlen($tmpItemInfo['Word'], 'UTF-8') > 0) {
                    array_push($tmpItemWord, $tmpItemInfo['Word']);
                }
                if (strlen($tmpItemInfo['Price']) > 0) {
                    array_push($tmpItemPrice, $tmpItemInfo['Price']);
                }
                if (strlen($tmpItemInfo['TaxType']) > 0) {
                    array_push($tmpItemTaxType, $tmpItemInfo['TaxType']);
                }
            }
                  
            if ($arExtend['TaxType'] == SpgatewayMPG2_TaxType::Mix) {
                if (in_array(SpgatewayMPG2_TaxType::Dutiable, $tmpItemTaxType) and in_array(SpgatewayMPG2_TaxType::Free, $tmpItemTaxType)) {
                    // Do nothing
                }  else {
                    $tmpItemTaxType = array();
                }
            }
            if ((count($tmpItemDesc) + count($tmpItemCount) + count($tmpItemWord) + count($tmpItemPrice) + count($tmpItemTaxType)) == (count($tmpItemDesc) * 5)) {
                $arExtend['InvoiceItemDesc']    = implode($InvSptr, $tmpItemDesc);
                $arExtend['InvoiceItemCount']   = implode($InvSptr, $tmpItemCount);
                $arExtend['InvoiceItemWord']    = implode($InvSptr, $tmpItemWord);
                $arExtend['InvoiceItemPrice']   = implode($InvSptr, $tmpItemPrice);
                $arExtend['InvoiceItemTaxType'] = implode($InvSptr, $tmpItemTaxType);
            }

            unset($arExtend['InvoiceItems']); 
        }

        $encode_fields = array(
                'CustomerName',
                'CustomerAddr',
                'CustomerEmail',
                'InvoiceItemDesc',
                'InvoiceItemWord',
                'InvoiceRemark'
            );
        foreach ($encode_fields as $tmp_field) {
            $arExtend[$tmp_field] = urlencode($arExtend[$tmp_field]);
        }

        if (sizeof($arErrors) > 0) {
            throw new Exception(join('<br>', $arErrors));
        }

        return $arExtend ;
    }

}


/**
*  付款方式：超商代碼
*/
class SpgatewayMPG2_CVS extends SpgatewayMPG2_Verification
{
    public  $arPayMentExtend = array(
                            'Desc_1'           =>'',
                            'Desc_2'           =>'',
                            'Desc_3'           =>'',
                            'Desc_4'           =>'',
                            'PaymentInfoURL'   =>'',
                            'ClientRedirectURL'=>'',
                            'StoreExpireDate'  =>''
                        );
    
    // 過濾多餘參數
    function filter_string($arExtend = array(),$InvoiceMark = ''){
        $arExtend = parent::filter_string($arExtend, $InvoiceMark);
        return $arExtend ;
    }
}


/**
* 付款方式 : BARCODE 
*/
class SpgatewayMPG2_BARCODE extends SpgatewayMPG2_Verification
{
    public  $arPayMentExtend = array(
                            'Desc_1'           =>'',
                            'Desc_2'           =>'',
                            'Desc_3'           =>'',
                            'Desc_4'           =>'',
                            'PaymentInfoURL'   =>'',
                            'ClientRedirectURL'=>'',
                            'StoreExpireDate'  =>''
                        );
    
    //過濾多餘參數
    function filter_string($arExtend = array(),$InvoiceMark = ''){
        $arExtend = parent::filter_string($arExtend, $InvoiceMark);
        return $arExtend ;
    }
}

/**
*  付款方式 ATM
*/
class SpgatewayMPG2_ATM extends SpgatewayMPG2_Verification
{
    public  $arPayMentExtend = array(
                            'ExpireDate'       => 3,
                            'PaymentInfoURL'   => '',
                            'ClientRedirectURL'=> '',
                        );
    
    //過濾多餘參數
    function filter_string($arExtend = array(),$InvoiceMark = ''){
        $arExtend = parent::filter_string($arExtend, $InvoiceMark);
        return $arExtend ;
    }
}

/**
*  付款方式 WebATM
*/
class SpgatewayMPG2_WebATM extends SpgatewayMPG2_Verification
{
    public  $arPayMentExtend = array();
    
    //過濾多餘參數
    function filter_string($arExtend = array(),$InvoiceMark = ''){
        $arExtend = parent::filter_string($arExtend, $InvoiceMark);
        return $arExtend ;
    }
}

/**
* 付款方式 : 信用卡
*/
class SpgatewayMPG2_Credit extends SpgatewayMPG2_Verification
{
    public $arPayMentExtend = array(
                                    "CreditInstallment" => '',
                                    "InstallmentAmount" => 0,
                                    "Redeem"            => FALSE,
                                    "UnionPay"          => FALSE,
                                    "Language"          => '',
                                    "BidingCard"        => '',
                                    "MerchantMemberID"  => '',
                                    "PeriodAmount"      => '',
                                    "PeriodType"        => '',
                                    "Frequency"         => '',
                                    "ExecTimes"         => '',
                                    "PeriodReturnURL"   => ''
                                );

    function filter_string($arExtend = array(),$InvoiceMark = ''){
        $arExtend = parent::filter_string($arExtend, $InvoiceMark);
        return $arExtend ;
    }
}

/**
*  付款方式：全功能
*/
class SpgatewayMPG2_ALL extends SpgatewayMPG2_Verification
{
    public  $arPayMentExtend = array();

    function filter_string($arExtend = array(),$InvoiceMark = ''){
        return $arExtend ;
    }
}

/**
* 付款方式 : Android Pay
*/
class SpgatewayMPG2_AndroidPay extends SpgatewayMPG2_Verification
{
    public $arPayMentExtend = array();

    function filter_string($arExtend = array(), $InvoiceMark = ''){
        $arExtend = parent::filter_string($arExtend, $InvoiceMark);
        return $arExtend ;
    }
}


/**
*  檢查碼
*/
class SpgatewayMPG2_CheckValue{

    static function generate($arParameters = array(),$HashKey = '' ,$HashIV = '',$encType = 0){
        $sMacValue = '' ;
        
        if(isset($arParameters))
        {   
                    // 要重新排序的參數
            $sortArray = array(
                "MerchantID"        => $arParameters['MerchantID'],
                "TimeStamp"         => $arParameters['TimeStamp'],
                "MerchantOrderNo"   => $arParameters['MerchantOrderNo'],
                "Version"           => $arParameters['Version'],
                "Amt"               => $arParameters['Amt']
            );

            ksort($sortArray);

            $check_merstr = http_build_query($sortArray, '', '&');

            $checkValue_str = 'HashKey=' . $HashKey . '&' . $check_merstr . '&HashIV=' . $HashIV;
            $sMacValue = strtoupper(hash("sha256", $checkValue_str));

            
            /*unset($arParameters['CheckValue']);
            uksort($arParameters, array('SpgatewayMPG2_CheckValue','merchantSort'));
               
            // 組合字串
            $sMacValue = 'HashKey=' . $HashKey ;
            foreach($arParameters as $key => $value)
            {
                $sMacValue .= '&' . $key . '=' . $value ;
            }
            
            $sMacValue .= '&HashIV=' . $HashIV ;    
            
            // URL Encode編碼     
            $sMacValue = urlencode($sMacValue); 
            
            // 轉成小寫
            $sMacValue = strtolower($sMacValue);        
            
            // 取代為與 dotNet 相符的字元
            $sMacValue = str_replace('%2d', '-', $sMacValue);
            $sMacValue = str_replace('%5f', '_', $sMacValue);
            $sMacValue = str_replace('%2e', '.', $sMacValue);
            $sMacValue = str_replace('%21', '!', $sMacValue);
            $sMacValue = str_replace('%2a', '*', $sMacValue);
            $sMacValue = str_replace('%28', '(', $sMacValue);
            $sMacValue = str_replace('%29', ')', $sMacValue);
                                
            // 編碼
            switch ($encType) {
                case SpgatewayMPG2_EncryptType::ENC_SHA256:
                    // SHA256 編碼
                    $sMacValue = hash('sha256', $sMacValue);
                break;
                
                case SpgatewayMPG2_EncryptType::ENC_MD5:
                default:
                // MD5 編碼
                    $sMacValue = md5($sMacValue);
            }

                $sMacValue = strtoupper($sMacValue);*/
        }  

        return $sMacValue ;  
        

    }
    static function gen_AES($arParameters = array(),$HashKey = '' ,$HashIV = ''){
        $$TradeInfo = '' ;
        
        if(isset($arParameters))
        {   
                    // 要重新排序的參數
            $sortArray = array(
                "MerchantID"        => $arParameters['MerchantID'],
                "RespondType"       => $arParameters['RespondType'],
                "TimeStamp"         => $arParameters['TimeStamp'],
                "Version"           => $arParameters['Version'],
                "MerchantOrderNo"   => $arParameters['MerchantOrderNo'],
                "Amt"               => $arParameters['Amt'],
                "ItemDesc"          => $arParameters['ItemDesc']
            );
            $TradeInfo = create_mpg_aes_encrypt($sortArray, $HashKey, $HashIV);

        }  

        return $TradeInfo ;  
        

    }
     /**
    * 自訂排序使用
    */
    private static function merchantSort($a,$b)
    {
        return strcasecmp($a, $b);
    }

   private static function create_mpg_aes_encrypt($parameter = "" , $key = "", $iv = "") {
        $return_str = '';
        if (!empty($parameter)) {
        //將參數經過 URL ENCODED QUERY STRING
        $return_str = http_build_query($parameter);
        }
        return $return_str;//trim(bin2hex(openssl_encrypt(addpadding($return_str), 'aes-256-cbc', $key, OPENSSL_RAW_DATA|OPENSSL_ZERO_PADDING, $iv)));
    }
    private static function addpadding($string, $blocksize = 32) {
        $len = strlen($string);
        $pad = $blocksize - ($len % $blocksize);
        $string .= str_repeat(chr($pad), $pad);
        return $string;
    }


}


?>
