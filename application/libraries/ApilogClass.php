<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'libraries/LogClass.php'); 

class ApilogClass extends LogClass 
{
    public function __construct()
    {
    
    }

    public function setErrorLog()
    {
        echo "set Error Call Log ";
        die;
    } 

}
