<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CookieClass {

    public function  __construct()
    {
        $this->setExpire = time()+86400;
        $this->unsetExpire = time()-3600;
    }
    public function unsetCookie()
    {
        if( isset($_SERVER['HTTP_COOKIE']) )
        {
            foreach ($_COOKIE as $sName => $sValue)
            {
                setcookie($sName, '', $this->unsetExpire, '/');
            }
        }
    }
    public static function getCookieInfo()
    {
        $CI = & get_instance();
        $CI->load->helper('cookie');
        
        if($jMemberInfo = get_cookie('eduniety_MemberInfo'))
            return $jMemberInfo;
        else
            return false;
    }
    public static function setCookieInfo($usn, $site, $account)
    {
        $CI = & get_instance();
        $CI->load->helper('cookie');
        
        $cookie = array(
            'name'   => 'MemberInfo',
            'value'  => json_encode(array('usn' => $usn, 'site'=>$site, 'account'=>$account)),
            'expire' => '86500',
            'prefix' => 'eduniety_', 
            'domain' => CKDOMAIN,
        );
        
        set_cookie($cookie);
        
        return;
    }
    public static function delCookieInfo($name='MemberInfo')
    {
        $CI = & get_instance();
        $CI->load->helper('cookie');
        
        delete_cookie($name, CKDOMAIN, '/', 'eduniety_'); 
        
        return;
    }

}
