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

        $sDate = $this->privacy[0];
        
        if(!$sDate) 
        {
            echo "약관 버전을 확인 해 주세요";
            die;
        }

        $sFileName = 'privacy_' . $sDate ;
        
        $this->load->view('policy/'.$sFileName);

        /* $text = $this->_getPrivacyFile($this->privacy[0]) ; */

        // $data = array(
        //     ‘txt’ => $text
        // );

    } 
    private function _getPrivacyFile($sFileName)
    {
        /* 
        txt -> html 로 변경하기 위해서 해당 로직은 
        홀딩 합니다. 

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
        
        */ 
    } 
}
?>
