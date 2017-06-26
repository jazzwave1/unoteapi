<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginClass
{
    public function __construct()
    {
        $this->timestamp = date('YmdHis');     
        $this->account_dao = edu_get_instance('account_dao', 'model');
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

    public function getEduMemberInfo($account_id)
    {
        if(!$account_id) return false;
        
        print_r( $this->account_dao->getEduMemInfo($account_id) );
    }
    public static function isLogin()
    {
        edu_get_instance('CookieClass');
        
        if($sMemberInfo = CookieClass::getCookieInfo())
        {
            $aMemberInfo = json_decode($sMemberInfo);
            return $aMemberInfo;
        }

        return false;
    }
    
    /////////////////////////////////////
    // 로그인 프로세스 
    /*
     * 쿠키를 기반으로 로그인 프로세스를 태웁니다. 
     * 
     * */
    public static function loginprocess($account_id, $site, $accessToken)
    {
        $bRtn = false;

        switch($site)
        {
            case "eduniety" :
                $bRtn = SELF::_proEduLogin($account_id); 
                break;
            case "facebook" :
                $bRtn = SELF::_proFaceBookLogin($account_id, $accessToken); 
                break;
            default :
                break;
        }
        return $bRtn;
    }
    private static function _proEduLogin($account_id)
    {
        // chk eduniety membership
        // 이부분은 에듀니티에서 어떻게 처리 할지 고민중

        // New Account Class
        $acc = edu_get_instance('AccountClass');
        $oAcc = new $acc($account_id, 'eduniety'); 
        
        // set Cookie ( unote )
        edu_get_instance('CookieClass');
        CookieClass::setCookieInfo($oAcc->oAccInfo->usn, 'eduniety', $account_id);   

        return true;
    }
    private static function _proFaceBookLogin($account_id)
    {
        // New Account Class
        $acc = edu_get_instance('AccountClass');
        $oAcc = new $acc($account_id, 'facebook', $accessToken); 
        
        // set Cookie ( unote )
        edu_get_instance('CookieClass');
        CookieClass::setCookieInfo($oAcc->oAccInfo->usn, 'eduniety', $account_id);   
    }
    
}
