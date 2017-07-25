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

        if(isset($aArticleInfo) && is_array($aArticleInfo) )
        {
            foreach ($aArticleInfo as $key => $oData)
            {
                $aArticleInfo[$key]->craw_data = json_decode($oData->craw_data);
                $aArticleInfo[$key]->regdate = substr($oData->regdate,0,4).'.'.substr($oData->regdate,5,2).'.'.substr($oData->regdate,8,2);
            }
        }

        return $aArticleInfo;
    }

    public function getArticleBookmarkInfo($usn)
    {
        if(!$usn) return false;

        $aInput = array('usn'=>$usn,'bookmark'=>'Y');

        $aArticleInfo = $this->article_dao->getArticleBookmarkInfo($aInput);

        if(isset($aArticleInfo) && is_array($aArticleInfo) )
        {
            foreach ($aArticleInfo as $key => $oData)
            {
                $aArticleInfo[$key]->craw_data = json_decode($oData->craw_data);
                $aArticleInfo[$key]->regdate = substr($oData->regdate,0,4).'.'.substr($oData->regdate,5,2).'.'.substr($oData->regdate,8,2);
            }
        }

        return $aArticleInfo;
    }

    public function getArticleTrashInfo($usn)
    {
        if(!$usn) return false;

        $aInput = array('usn'=>$usn, 'deltype'=>'DEL');

        $aArticleInfo = $this->article_dao->getArticleTrashInfo($aInput);

        if(isset($aArticleInfo) && is_array($aArticleInfo) )
        {
            foreach ($aArticleInfo as $key => $oData)
            {
                $aArticleInfo[$key]->craw_data = json_decode($oData->craw_data);
                $aArticleInfo[$key]->regdate = substr($oData->regdate,0,4).'.'.substr($oData->regdate,5,2).'.'.substr($oData->regdate,8,2);
            }
        }

        return $aArticleInfo;
    }

    public function getArticleCategoryInfo($usn, $category_idx)
    {
        if(!$usn) return false;

        $aInput = array('usn'=>$usn, 'category_idx'=>$category_idx);

        $aArticleInfo = $this->article_dao->getArticleCategoryInfo($aInput);

        if(isset($aArticleInfo) && is_array($aArticleInfo) )
        {
            foreach ($aArticleInfo as $key => $oData)
            {
                $aArticleInfo[$key]->craw_data = json_decode($oData->craw_data);
                $aArticleInfo[$key]->regdate = substr($oData->regdate,0,4).'.'.substr($oData->regdate,5,2).'.'.substr($oData->regdate,8,2);
            }
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
            $aArticleDetailInfo[$key]->craw_data->contents = nl2br($aArticleDetailInfo[$key]->craw_data->contents);
            $aArticleDetailInfo[$key]->regdate = substr($oData->regdate,0,4).'.'.substr($oData->regdate,5,2).'.'.substr($oData->regdate,8,2);
        }

        $aRes = $aArticleDetailInfo[0];

        return $aRes;
    }

    public function deleteArticle($t_idx)
    {
        if(!$t_idx) return false;

        $aInput = array('t_idx' => $t_idx, 'deltype' => 'DEL', 'deldate' => date('Y-m-d H:i:s') );

        if( $this->article_dao->deleteArticle($aInput) )
            return true;
        
        return false;
    }
    public function deleteTrash($t_idx)
    {
        if(!$t_idx) return false;

        $aInput = array('t_idx' => $t_idx);

        if( $this->article_dao->deleteTrash($aInput) )
            return true;
        
        return false;
    }    
    public function chkBookmarkArticle($t_idx)
    {
        if(!$t_idx) return false;

        $aInput = array('t_idx' => $t_idx, 'bookmark' => 'Y');

        if( $this->article_dao->chkBookmarkArticle($aInput) )
            return true;
        
        return false;
    }
    public function unchkBookmarkArticle($t_idx)
    {
        if(!$t_idx) return false;

        $aInput = array('t_idx' => $t_idx);

        if( $this->article_dao->unchkBookmarkArticle($aInput) )
            return true;
        
        return false;
    }
    public function isBookmarkArticle($t_idx)
    {
        if(!$t_idx) return false;

        $aInput = array('t_idx' => $t_idx);

        if( $this->article_dao->isBookmarkArticle($aInput) )
            return true;
        
        return false;
    }


}
