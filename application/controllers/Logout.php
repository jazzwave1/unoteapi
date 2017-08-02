<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
       
        $this->load->library('CookieClass');
    }
    public function index()
    {
        CookieClass::delCookieInfo();
        header('Location: '.HOSTURL.'/Login');
    }
}
?>
