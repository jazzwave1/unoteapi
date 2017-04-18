<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login
{
    private function portal()
    {
        $id = $this->input->post('id');
        $pwd = $this->input->post('pwd');

        $key = 'password-enc-key';


        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);


        $enc_pwd = mcrypt_encrypt();

    }

}