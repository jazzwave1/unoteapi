<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ArticleClass {

    public function __construct()
    {
    }

    public static function getUnreadArticleCnt($usn)
    {
        $oArticleModel = edu_get_instance('article_model', 'model');
        $sArticleCnt = $oArticleModel->article_model->getUnreadArticleCnt($usn);

        return $sArticleCnt;
    }
    public static function getArticleInfo($usn)
    {
        $oArticleModel = edu_get_instance('article_model', 'model');
        $aArticleInfo = $oArticleModel->article_model->getArticleInfoByUsn($usn);

        return $aArticleInfo;
    }
    public static function getArticleBookmarkInfo($usn)
    {
        $oArticleModel = edu_get_instance('article_model', 'model');
        $aArticleInfo = $oArticleModel->article_model->getArticleBookmarkInfo($usn);

        return $aArticleInfo;
    }
    public static function getArticleTrashInfo($usn)
    {
        $oArticleModel = edu_get_instance('article_model', 'model');
        $aArticleInfo = $oArticleModel->article_model->getArticleTrashInfo($usn);

        return $aArticleInfo;
    }
    public static function getArticleCategoryInfo($usn, $category_idx)
    {
        $oArticleModel = edu_get_instance('article_model', 'model');
        $aArticleInfo = $oArticleModel->article_model->getArticleCategoryInfo($usn, $category_idx);

        return $aArticleInfo;
    }

    public static function getArticleDetailInfo($t_idx)
    {
        if(!$t_idx) return false;
        
        $article_model = edu_get_instance('article_model', 'model');
        $aArticleDetailInfo = $article_model->getArticleDetailInfo($t_idx);

        return $aArticleDetailInfo;    
    }
}
