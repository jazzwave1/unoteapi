<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Policy extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
       
        $this->privacy = edu_get_config('privacy', 'policy');     
    }
    public function index()
    {
    }
    public function privacy()
    {
        $text = $this->_getPrivacyFile($this->privacy[0]) ; 
        
        $data = array(
            'txt' => $text
        );
        $this->load->view('policy/privacy', $data);

    } 
    private function _getPrivacyFile($sFileName)
    {
        if(!$sFileName) return false;

        $rtn = '';
        if($_SERVER["SERVER_NAME"] == 'localhost')
            $path = "/Users/hojunlee/Sites/unoteapi/static/policy/"; 
        else
            $path = "/var/www/html/unoteapi/static/policy/"; 

        $myfile = fopen($path . "privacy_".$sFileName.".txt", "r");
        while(!feof($myfile)) {
              $rtn .= fgets($myfile) . "<br>";
        }
        fclose($myfile); 
        return $rtn;
    } 
}
?>
