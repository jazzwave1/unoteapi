<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'libraries/log/LogClass.php');

class ErrorlogClass extends LogClass
{
    public function __construct()
    {
	    $this->aErrorCodeInfo = edu_get_config('code', 'error_code');

    }

    public function setErrorLog($aLogInfo, $type='file')
    {
    	$aRet = array(
    			 'file'   => $aLogInfo['file']
    			,'code'   => $aLogInfo['code']
    			,'msg'    => $this->aErrorCodeInfo[$aLogInfo['code']]
    			,'aInput' => $aLogInfo['aInput']
        );

        if(DEBUG)
        {
            // set debug file
        }

        $this->_setErrorFileLog($aRet);
        return $aRet;
    }
    private function _setErrorFileLog($aLogInfo)
    {
        $fp = $this->logOpen();

        fwrite($fp, "\n##################### ".$aLogInfo['file']." Start ####################\n");
        fwrite($fp, "debug time : ");
        fwrite($fp, print_r(date("Y-m-d H:i:s"), true));
        fwrite($fp, "\n");
        fwrite($fp, print_r($aLogInfo, true));
        fwrite($fp, "\n##################### ".$aLogInfo['file']." End ######################\n");

        return;
    }
}
