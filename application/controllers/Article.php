<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        edu_get_instance('ArticleClass');
        edu_get_instance('article_model', 'model');
    }

    public function index()
    {
        $this->List();
    }

    public function List()
    {
        $this->_getArticleList('list');
    }

    public function Bookmark()
    {
        $this->_getArticleList('bookmark');
    }

    public function Trash()
    {
        $this->_getArticleList('trash');
    }

    public function Category($category_idx)
    {
        $this->_getArticleList('category', $category_idx);
    }

    public function viewArticle($t_idx)
    {
        $aVdata = array();
        $aArticleDetailInfo = $this->_getArticleDetailInfo($t_idx);

        $aVdata['t_idx'] = $aArticleDetailInfo->t_idx;
        $aVdata['title'] = $aArticleDetailInfo->craw_data->title;
        $aVdata['regdate'] = $aArticleDetailInfo->regdate;
        $aVdata['contents'] = $aArticleDetailInfo->craw_data->contents;

        $data = array(
             'vdata' => $aVdata
        );

        $this->load->view('common/textviewerOpen', $data);
    }

    ##########################
    ###### RPC Function ######
    ##########################
    public function rpcGetArticleInfo()
    {
        $t_idx = $this->input->post('t_idx');

        // test code
        // $t_idx = 168;

        $aResult = array(
             "code"  => 1
            ,"msg"   => "OK"
            ,"aArticleDetail" => $this->_getArticleDetailInfo($t_idx) 
        );

        // echo '<pre>: '. print_r( $aResult, true ) .'</pre>';
        // die();

        response_json($aResult);
        die;
    } 
    private function _getArticleDetailInfo($t_idx)
    {
        edu_get_instance('ArticleClass');

        $aArticleDetailInfo = ArticleClass::getArticleDetailInfo($t_idx);

        return $aArticleDetailInfo;
    } 
    public function rpcDeleteArticle()
    {
        $t_idx = $this->input->post('t_idx');

        if($this->_deleteArticle($t_idx))
        {
            $aResult = array(
                 "code"  => 1
                ,"msg"   => "OK"
            );            
        }
        else
        {
            $aResult = array(
                 "code"  => 999
                ,"msg"   => "Error"
            );                  
        }

        response_json($aResult);
        die;
    }
    private function _deleteArticle($t_idx)
    {
        $oArticleModel = edu_get_instance('article_model', 'model');
        $bRes = $oArticleModel->article_model->deleteArticle($t_idx);
        return $bRes;
    }

    public function rpcDeleteTrash()
    {
        $t_idx = $this->input->post('t_idx');

        if($this->_deleteTrash($t_idx))
        {
            $aResult = array(
                 "code"  => 1
                ,"msg"   => "OK"
            );            
        }
        else
        {
            $aResult = array(
                 "code"  => 999
                ,"msg"   => "Error"
            );                  
        }

        response_json($aResult);
        die;
    }
    private function _deleteTrash($t_idx)
    {
        $oArticleModel = edu_get_instance('article_model', 'model');
        $bRes = $oArticleModel->article_model->deleteTrash($t_idx);
        return $bRes;
    }

    public function rpcBookmarkArticle()
    {
        $t_idx = $this->input->post('t_idx');

        if($this->_bookmarkArticle($t_idx))
        {
            $aResult = array(
                 "code"  => 1
                ,"msg"   => "OK"
            );            
        }
        else
        {
            $aResult = array(
                 "code"  => 999
                ,"msg"   => "Error"
            );                  
        }

        response_json($aResult);
        die;
    }
    private function _bookmarkArticle($t_idx)
    {
        $oArticleModel = edu_get_instance('article_model', 'model');
        
        //북마크체크O -> X
        if($this->_isBookmarkArticle($t_idx))
        {
            $bRes = $oArticleModel->article_model->unchkBookmarkArticle($t_idx);
        }
        //북마크체크X -> O
        else
        {
            $bRes = $oArticleModel->article_model->chkBookmarkArticle($t_idx);
        }

        return $bRes;
    }
    private function _isBookmarkArticle($t_idx)
    {
        $oArticleModel = edu_get_instance('article_model', 'model');
        $bRes = $oArticleModel->article_model->isBookmarkArticle($t_idx);
        return $bRes;
    }

    public function rpcGoCategoryArticle()
    {
        $category_idx = $this->input->post('c_idx');
        $t_idx = $this->input->post('t_idx');  

        if($this->_goCategory($category_idx, $t_idx))
        {
            $aResult = array(
                 "code"  => 1
                ,"msg"   => "OK"
            );            
        }
        else
        {
            $aResult = array(
                 "code"  => 999
                ,"msg"   => "Error"
            );                  
        }

        response_json($aResult);
        die;
    }
    private function _goCategory($category_idx, $t_idx)
    {
        edu_get_instance('CategoryClass');
        $bRes = CategoryClass::goCategory($category_idx, $t_idx);
        return $bRes;
    }

    public function setCategory()
    {
        // test code
        $usn = 1;

        $category_idx = $this->input->post('category_idx');
        $name = $this->input->post('sCategoryName');

        if($this->_setCategory($category_idx, $usn, $name))
        {
            $aResult = array(
                 "code"  => 1
                ,"msg"   => "OK"
            );            
        }
        else
        {
            $aResult = array(
                 "code"  => 999
                ,"msg"   => "Error"
            );                  
        }

        response_json($aResult);
        die;
    }
    private function _setCategory($category_idx, $usn, $sCategoryName)
    {
        edu_get_instance('CategoryClass');
        $bRes = CategoryClass::setCategory($category_idx, $usn, $sCategoryName);
        return $bRes;
    }

    public function delCategory()
    {
        $category_idx = $this->input->post('category_idx');

        if($this->_delCategory($category_idx))
        {
            $aResult = array(
                 "code"  => 1
                ,"msg"   => "OK"
            );            
        }
        else
        {
            $aResult = array(
                 "code"  => 999
                ,"msg"   => "Error"
            );                  
        }

        response_json($aResult);
        die;
    }
    private function _delCategory($category_idx)
    {
        edu_get_instance('CategoryClass');
        $bRes = CategoryClass::delCategory($category_idx);
        return $bRes;
    }
    private function _getArticleList($sType, $category_idx=0)
    {
        $usn = $this->_getUsn();

        // usn check
        if(! $usn )
        {
            alert('로그인 후 이용하세요.','/login');
            die;
        }

        $this->load->library('MenuClass');
        $aMenuList = MenuClass::getMenuList($usn);

        $aVdata = array();
        if($sType == 'list')
        {
            $aVdata['menu'] = $aMenuList['Article']['sub']['List'];
            $aVdata['sublist'] = ArticleClass::getArticleInfo($usn);
        }
        else if($sType == 'bookmark')
        {
            $aVdata['menu'] = $aMenuList['Article']['sub']['Bookmark'];
            $aVdata['sublist'] = ArticleClass::getArticleBookmarkInfo($usn);
        }
        else if($sType == 'trash')
        {
            $aVdata['menu'] = $aMenuList['Article']['sub']['Trash'];
            $aVdata['sublist'] = ArticleClass::getArticleTrashInfo($usn);
        }
        else if($sType == 'category')
        {
            $aVdata['menu'] = $aMenuList['Category']['sub'][$category_idx];
            $aVdata['sublist'] = ArticleClass::getArticleCategoryInfo($usn, $category_idx);
        }

        $aVdata['sublist_cnt'] = 0;
        if(is_array($aVdata['sublist']))
        {
            $aVdata['sublist_cnt'] = count($aVdata['sublist']);
        }

        $data = array(
             'vdata' => $aVdata
            ,'aMenuList' => $aMenuList
            ,'contents' => 'article/list'
        );

        $this->load->view('common/container', $data);
    }


    // test code
    private function _getUsn()
    {
        return 1;
    }



    
}
