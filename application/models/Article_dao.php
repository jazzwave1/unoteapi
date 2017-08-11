<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'models/Common_dao.php');

class Article_dao extends Common_dao
{
    public function __construct()
    {
        $this->db = $this->load->database('dev_aws', TRUE);
        $aQueryInfo = edu_get_config('query', 'query');
        $this->queryInfoArticle = $aQueryInfo['article'];
    }

    public function updateTextbankForCidx($aParam=array())
    {
        $aConfig = $this->queryInfoArticle['updateTextbankForCidx'];
        return $this->actModelFuc($aConfig, $aParam);
    }

    public function getUnreadArticleCnt($aParam=array())
    {
        $aConfig = $this->queryInfoArticle['getUnreadArticleCnt'];
        return $this->actModelFuc($aConfig, $aParam);
    }

    public function getArticleInfoByUsn($aParam=array())
    {
        $aConfig = $this->queryInfoArticle['getArticleInfoByUsn'];
        return $this->actModelFuc($aConfig, $aParam);
    }
    public function getArticleCnt($aParam=array())
    {
        $aConfig = $this->queryInfoArticle['getArticleCnt'];
        return $this->actModelFuc($aConfig, $aParam);
    }

    public function getArticleBookmarkInfo($aParam=array())
    {
        $aConfig = $this->queryInfoArticle['getArticleBookmarkInfo'];
        return $this->actModelFuc($aConfig, $aParam);
    }
    public function getArticleBookmarkCnt($aParam=array())
    {
        $aConfig = $this->queryInfoArticle['getArticleBookmarkCnt'];
        return $this->actModelFuc($aConfig, $aParam);
    }

    public function getArticleTrashInfo($aParam=array())
    {
        $aConfig = $this->queryInfoArticle['getArticleTrashInfo'];
        return $this->actModelFuc($aConfig, $aParam);
    }
    public function getArticleTrashCnt($aParam=array())
    {
        $aConfig = $this->queryInfoArticle['getArticleTrashCnt'];
        return $this->actModelFuc($aConfig, $aParam);
    }

    public function getArticleCategoryInfo($aParam=array())
    {
        $aConfig = $this->queryInfoArticle['getArticleCategoryInfo'];
        return $this->actModelFuc($aConfig, $aParam);
    }

    public function getArticleInfoByTidx($aParam=array())
    {
        $aConfig = $this->queryInfoArticle['getArticleInfoByTidx'];
        return $this->actModelFuc($aConfig, $aParam);
    }
    public function deleteArticle($aParam=array())
    {
        $aConfig = $this->queryInfoArticle['deleteArticle'];
        return $this->actModelFuc($aConfig, $aParam);
    }
    public function deleteTrash($aParam=array())
    {
        $aConfig = $this->queryInfoArticle['deleteTrash'];
        return $this->actModelFuc($aConfig, $aParam);
    }
    public function chkBookmarkArticle($aParam=array())
    {
        $aConfig = $this->queryInfoArticle['chkBookmarkArticle'];
        return $this->actModelFuc($aConfig, $aParam);
    }
    public function unchkBookmarkArticle($aParam=array())
    {
        $aConfig = $this->queryInfoArticle['unchkBookmarkArticle'];
        return $this->actModelFuc($aConfig, $aParam);
    }
    public function isBookmarkArticle($aParam=array())
    {
        $aConfig = $this->queryInfoArticle['isBookmarkArticle'];
        return $this->actModelFuc($aConfig, $aParam);
    }
    public function readArticle($aParam=array())
    {
        $aConfig = $this->queryInfoArticle['readArticle'];
        return $this->actModelFuc($aConfig, $aParam);
    }
    public function deleteArticleByCidx($aParam=array())
    {
        $aConfig = $this->queryInfoArticle['deleteArticleByCidx'];
        return $this->actModelFuc($aConfig, $aParam);
    }
}
