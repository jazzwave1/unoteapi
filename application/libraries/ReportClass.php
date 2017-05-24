<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'libraries/LogClass.php'); 

class ReportClass extends LogClass 
{
    public function __construct()
    {
        
    }

    public function sendMailReport($to, $subject, $aMassageInfo, $type='')
    {
        if(!$to || !$subject) return false;

        $this->sendMail($to, $subject, $this->_setMailForm($aMassageInfo, $type));	

        return; 
    }
    public function sendSMSReport()
    {
    
    }
    public function sendTelegramReport()
    {
    
    } 

    private function _setMailForm($aInfo, $type='')
    {
        switch($type)
        {
            case "Error" :
                $ret = $this->_getErrorForm($aInfo);
                break;
            default :
                $ret = $this->_getNomalForm($aInfo);
                break;
        }
    
        return $ret;
    }

    private function _getNomalForm($aInfo)
    {
        $message = "안녕하세요 자동 리포트 시스템입니다. <br><br>리포팅 메일 입니다 <br>아래 부분을 확인 하시기 바랍니다.<BR><BR>".$aInfo['msg'];      

        return $message;
    }
    private function _getErrorForm($aInfo)
    {
        $message = "안녕하세요 자동 리포트 시스템입니다. <br><br> 에러에 대한리포팅 메일 입니다 <br>아래 부분을 확인 하시기 바랍니다.<BR><BR>".$aInfo['msg'];      

        return $message;
    
    }
}
