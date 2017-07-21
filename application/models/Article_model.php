<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class  Article_model extends CI_model{
    public function __construct()
    {
        $this->article_dao = edu_get_instance('article_dao', 'model');
    }

    public function updateTextbankForCidx($category_idx)
    {
        if(!$category_idx) return false;
        
        $aInput = array(
             'category_idx'  => $category_idx
        );
        return $this->article_dao->updateTextbankForCidx($aInput);
    }

}
