<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category_model extends CI_model{
    public function __construct()
    {
        $this->category_dao = edu_get_instance('category_dao', 'model');
    }

    public function getCategoryInfo($usn)
    {
        if(!$usn) return false;

        $aInput = array('usn'=>$usn);
        $aCategoryInfo = $this->category_dao->getCategoryInfo($aInput);

        if( is_array($aCategoryInfo) && count($aCategoryInfo) > 0 )
            return $aCategoryInfo;

        return false;
    }

}
