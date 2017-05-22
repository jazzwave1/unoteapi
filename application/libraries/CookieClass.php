<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CookieClass {

    public function  __construct()
    {
        $this->setExpire = time()+86400;
        $this->unsetExpire = time()-3600;
    }

    public function setCookie($aCookie)
    {
        foreach ($aCookie as $sName => $sValue)
        {
            setcookie($sName, $sValue, $this->setExpire);
        }
    }

    public function getCookie($sName)
    {
        if( isset($_COOKIE[$sName]) )
        {
            return $_COOKIE[$sName];
        }

        return false;
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


}
