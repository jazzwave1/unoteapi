<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'libraries/LogClass.php'); 

class ErrorlogClass extends LogClass 
{
    public function __construct()
    {
	    $this->aErrorCodeInfo = edu_get_config('code', 'error_code');
    }

    public function setErrorLog($file,$code)
    {
        // log file write

        
    	$aRet = array(
    			'code' => $code
    			,'msg' => $this->aErrorCodeInfo[$code]
    		);

    	return $aRet;
    } 
}
