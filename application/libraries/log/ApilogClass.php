<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'libraries/log/LogClass.php');

class ApilogClass extends LogClass
{
    public function __construct()
    {
        $this->log_dao = edu_get_instance('log_dao', 'model');
    }

    public static function setApiLog($usn, $sApiName, $aInput, $sOutput, $c_code, $regdate)
    {
        if(!$usn || !$sApiName || !$aInput || !$c_code || !$regdate) 
        {
            return false;
        }
        
        $sInput = json_encode($aInput);

        $aInput = array(
             'usn'     => $usn
            ,'api'     => $sApiName
            ,'input'   => $sInput
            ,'output'  => $sOutput
            ,'c_code'  => $c_code
            ,'regdate' => $regdate
        );
        
        $log_dao = edu_get_instance('log_dao', 'model');
        return $log_dao->setApiLog($aInput);
    }

}
