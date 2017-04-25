<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginClass
{
    public function __construct()
    {
        $this->timestamp = date('YmdHis');     
    }
    
    public function portal($id, $pwd)
    {
        if(! $this->_chkParam($id, $pwd))
        {
            dieProcess();
        }
        if(! $sEnPwd = $this->_mkEncPWD($id, $pwd) ) 
        {
            dieProcess();
        }
        $sFingerPrint = $this->_mkFingerPrint();
        $sTimeStamp   = $this->timestamp; 

        $this->_sendIB($id, $sFingerPrint, $sEnPwd, $sTimeStamp); 
    }
    private function _sendIB($id, $sFingerPrint, $sEnPwd, $sTimeStamp)
    {
 
        echo "send<br>";
        echo "id : ".$id. "<br>";
        echo "fingerpring : ".$sFingerPrint. "<br>";
        echo "sEnPwd : ".$sEnPwd. "<br>";
        echo "timestamp : ".$sTimeStamp. "<br>" ;
        die;

    }
    private function _chkParam($id, $pwd)
    {
        if(!$id || !$pwd) return false;

        return true;
    }
    private function _mkEncPWD($id, $pwd)
    {
        if(!$id || !$pwd) return false;

        return "fjwiojfoewjfowiejfoijweiofjwojf23fj";
    //$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    //$enc_pwd = mcrypt_encrypt();

    //return $enc_pwd;
    }


    private function _mkFingerPrint()
    {
        return md5($this->_getKey1().$this->timestamp.$this->_getKey2()); 
    }

    private function _getKey1()
    {
        return "eduniety";
    }
    private function _getKey2()
    {
        return "ib";
    } 
    private function _getKeyPwd()
    {
        $key = 'password-enc-key';
        return $key;
    } 


}
