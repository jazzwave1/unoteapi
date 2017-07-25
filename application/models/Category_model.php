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

    public function setCategory($usn, $sCategoryName)
    {
        if (!$usn) return false;

        $aInput = array(
             'usn'  => $usn
            ,'name' => $sCategoryName
        );
        return $this->category_dao->setCategory($aInput);
    }

    public function updateCategory($category_idx, $usn, $sCategoryName)
    {
        if(!$category_idx || !$usn) return false;
        
        $aInput = array(
             'category_idx'  => $category_idx
            ,'usn'           => $usn
            ,'name' => $sCategoryName
        );
        return $this->category_dao->updateCategory($aInput);
    }

    public function deleteCategory($category_idx)
    {
        if(!$category_idx) return false;
        
        $aInput = array(
             'category_idx'  => $category_idx
        );
        return $this->category_dao->deleteCategory($aInput);
    }

    public function goCategory($category_idx, $t_idx)
    {
        if (!$category_idx || !$t_idx) return false;

        $aInput = array(
             'category_idx'  => $category_idx
            ,'t_idx' => $t_idx
        );
        return $this->category_dao->goCategory($aInput);
    }

}
