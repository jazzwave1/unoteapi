<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class  Article_model extends CI_model{
    public function __construct()
    {
        edu_get_instance('article_dao', 'model');
    }

    public function updateTextbankForCidx($category_idx)
    {
        if(!$category_idx) return false;
        
        $aInput = array(
             'category_idx'  => $category_idx
        );
        return $this->article_dao->updateTextbankForCidx($aInput);
    }

    public function getArticleInfoByUsn($usn)
    {
        if(!$usn) return false;

        $aInput = array('usn'=>$usn);

        $aArticleInfo = $this->article_dao->getArticleInfoByUsn($aInput);

        foreach ($aArticleInfo as $key => $oData)
        {
            $aArticleInfo[$key]->craw_data = json_decode($oData->craw_data);
            $aArticleInfo[$key]->regdate = substr($oData->regdate,0,4).'.'.substr($oData->regdate,5,2).'.'.substr($oData->regdate,8,2);
        }

        return $aArticleInfo;
    }

    public function getArticleDetailInfo($t_idx)
    {
        if(!$t_idx) return false;

        $aRes = array();

        $aInput = array('t_idx'=>$t_idx);

        $aArticleDetailInfo = $this->article_dao->getArticleInfoByTidx($aInput);

        foreach ($aArticleDetailInfo as $key => $oData)
        {
            $aArticleDetailInfo[$key]->craw_data = json_decode($oData->craw_data);
            $aArticleDetailInfo[$key]->regdate = substr($oData->regdate,0,4).'.'.substr($oData->regdate,5,2).'.'.substr($oData->regdate,8,2);
        }

        $aRes = $aArticleDetailInfo[0];

        return $aRes;
    }


}
