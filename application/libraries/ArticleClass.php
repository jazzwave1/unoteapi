<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ArticleClass {

    public function __construct()
    {
        $a = func_get_args();
        $i = func_num_args();
        if (method_exists($this,$f='__construct'.$i))
        {
        call_user_func_array(array($this,$f),$a);
        }
    }
    public function  __construct1($usn)
    {
        if(!$usn) return false;
        
        $this->usn = $usn;

        $this->oArticleInfo = $this->_getArticleInfo($this->usn);
    }

    private function _getArticleInfo($usn)
    {
        $oArticleModel = edu_get_instance('article_model', 'model');
        $aArticleInfo = $oArticleModel->article_model->getArticleInfoByUsn($usn);

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
