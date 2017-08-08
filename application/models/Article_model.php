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

    public function getUnreadArticleCnt($usn)
    {
        if(!$usn) return false;

        $aInput = array('usn'=>$usn);

        $aArticleCnt = $this->article_dao->getUnreadArticleCnt($aInput);
        $sUnreadCnt = $aArticleCnt[0]->cnt;

        return $sUnreadCnt;
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
                if($oData->craw_data->corporation == '페이스북')
                {
                    if(isset($oData->craw_data->contents))
                    {
                        $aArticleInfo[$key]->craw_data->title = mb_substr($oData->craw_data->contents, 0, 20, 'utf-8');;
                    }

                    $datetime = $oData->craw_data->datetime;
                    $date = new DateTime($datetime);
                    $aArticleInfo[$key]->craw_data->datetime = $date->format('Y.m.d. H:i');
                }
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
                if($oData->craw_data->corporation == '페이스북')
                {
                    if(isset($oData->craw_data->contents))
                    {
                        $aArticleInfo[$key]->craw_data->title = mb_substr($oData->craw_data->contents, 0, 20, 'utf-8');;
                    }

                    $datetime = $oData->craw_data->datetime;
                    $date = new DateTime($datetime);
                    $aArticleInfo[$key]->craw_data->datetime = $date->format('Y.m.d. H:i');
                }
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
                if($oData->craw_data->corporation == '페이스북')
                {
                    if(isset($oData->craw_data->contents))
                    {
                        $aArticleInfo[$key]->craw_data->title = mb_substr($oData->craw_data->contents, 0, 20, 'utf-8');;
                    }

                    $datetime = $oData->craw_data->datetime;
                    $date = new DateTime($datetime);
                    $aArticleInfo[$key]->craw_data->datetime = $date->format('Y.m.d. H:i');
                }
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

        if(isset($aArticleDetailInfo) && is_array($aArticleDetailInfo) )
        {
            foreach ($aArticleDetailInfo as $key => $oData)
            {
                $aArticleDetailInfo[$key]->craw_data = json_decode($oData->craw_data);
                $contents = (isset($oData->craw_data->contents)) ? nl2br($oData->craw_data->contents) : '';

                if($oData->craw_data->corporation == '페이스북')
                {
                    if(isset($oData->craw_data->contents))
                    {
                        $aArticleDetailInfo[$key]->craw_data->title = mb_substr($oData->craw_data->contents, 0, 20, 'utf-8');;
                    }
                    else
                    {
                        $url = '<a href="'.$oData->craw_data->url.'" target="_blank">페이스북 링크 바로가기</a><br><br>';
                        $aArticleDetailInfo[$key]->craw_data->title = $url;
                    }

                    $datetime = $oData->craw_data->datetime;
                    $date = new DateTime($datetime);
                    $aArticleDetailInfo[$key]->craw_data->datetime = $date->format('Y.m.d. H:i');
                }

                $aArticleDetailInfo[$key]->craw_data->contents = $contents;
                $aArticleDetailInfo[$key]->regdate = substr($oData->regdate,0,4).'.'.substr($oData->regdate,5,2).'.'.substr($oData->regdate,8,2);
            }
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

    public function readArticle($t_idx)
    {
        if(!$t_idx) return false;

        $aInput = array('t_idx' => $t_idx);

        if( $this->article_dao->readArticle($aInput) )
            return true;
        
        return false;
    }

}
