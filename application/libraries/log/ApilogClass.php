<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'libraries/log/LogClass.php');

class ApilogClass extends LogClass
{
    public function __construct()
    {

    }

    public function setCallLog()
    {
        echo "set Api Call Log ";
        die;
    }

}
