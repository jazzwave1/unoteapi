<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Crawling_model extends CI_model{
    public function __construct()
    {
        $this->crawling_dao = edu_get_instance('crawling_dao', 'model');
    }

    public function getCrawlingInfo($usn)
    {
        if(!$usn) return false;

        $aInput = array('account'=>$usn);
        $aCrawlingInfo = $this->crawling_dao->getCrawlingInfo($aInput);

        if( is_array($aCrawlingInfo) && count($aCrawlingInfo) > 0 )
            return $aCrawlingInfo;

        return false;
    }

}
