<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        edu_get_instance('ArticleClass');
        edu_get_instance('article_model', 'model');

        ////////////////////////////////////
        // chk Login Info
        // true : get MembeInfo
        // false : loaction login page
        $this->oMemberInfo = chkLoginInfo();
        //////////////////////////////////// 
    }

    public function index()
    {
        header('Location: '.HOSTURL.'/Article/List');
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
        $method = $this->input->post('method');
        $usn = $this->oMemberInfo->usn;

        $aResult = array(
             "code"  => 1
            ,"msg"   => "OK"
            ,"aArticleDetail" => $this->_getArticleDetailInfo($t_idx)
        );

        if($method == 'List')
        {
            edu_get_instance('ArticleClass');
            // read update
            if(ArticleClass::readArticle($t_idx))
            {
                // unread cnt
                $aResult['unread_cnt'] = ArticleClass::getUnreadArticleCnt($usn);
            }
        }

        response_json($aResult);
        die;
    } 
    private function _getArticleDetailInfo($t_idx)
    {
        edu_get_instance('ArticleClass');

        $aArticleDetailInfo = ArticleClass::getArticleDetailInfo($t_idx);
        if( isset($aArticleDetailInfo->craw_data->contents) )
        {
            $aArticleDetailInfo->craw_data->contents = replaceArticleHTML($aArticleDetailInfo->craw_data->contents);
        }

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
        edu_get_instance('ArticleClass');
        $t_idx = $this->input->post('t_idx');
        $usn = $this->oMemberInfo->usn;

        $aBookmarkArticle = $this->_bookmarkArticle($t_idx);
        $total_cnt = ArticleClass::getArticleBookmarkCnt($usn);

        if($aBookmarkArticle['result'])
        {
            $aResult = array(
                 "code"  => 1
                ,"msg"   => "OK"
                ,"total_cnt"   => $total_cnt
                ,"type"   => $aBookmarkArticle['type']
            );
        }
        else
        {
            $aResult = array(
                 "code"  => 999
                ,"msg"   => "Error"
                ,"type"   => $aBookmarkArticle['type']
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
            $aRes = array(
                     'type' => 'unchk'
                    ,'result' => $oArticleModel->article_model->unchkBookmarkArticle($t_idx)
            );
        }
        //북마크체크X -> O
        else
        {
            $aRes = array(
                     'type' => 'chk'
                    ,'result' => $oArticleModel->article_model->chkBookmarkArticle($t_idx)
            );
        }

        return $aRes;
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
        if($category_idx > 0)
            $bRes = CategoryClass::goCategory($category_idx, $t_idx);
        else
            $bRes = CategoryClass::cancleCategory($t_idx);

        return $bRes;
    }

    public function setCategory()
    {
        $usn = $this->oMemberInfo->usn;

        $category_idx = $this->input->post('category_idx');
        $name = trim($this->input->post('sCategoryName'));
        $category_cnt = $this->_isCategory($usn, $name);

        if($category_cnt > 0)
        {
            $aResult = array(
                 "code"  => 999
                ,"msg"   => "Error: 카테고리 중복"
            );   
        }
        else
        {
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
        }

        response_json($aResult);
        die;
    }
    private function _isCategory($usn, $sCategoryName)
    {
        edu_get_instance('CategoryClass');
        $sCnt = CategoryClass::isCategory($usn, $sCategoryName);
        return $sCnt;
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
        $usn = $this->oMemberInfo->usn;

        // usn check
        if(! $usn )
        {
            alert('로그인 후 이용하세요.','/unoteapi/Login');
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

        if( is_array($aVdata['sublist']) && count($aVdata['sublist'])>0 )
        {
            foreach ($aVdata['sublist'] as $key => $obj) {
                if( isset($obj->craw_data->contents) )
                {
                    $aVdata['sublist'][$key]->craw_data->contents = replaceArticleHTML($obj->craw_data->contents);
                }
            }
        }

        // echo '<pre>: '. print_r( $aVdata['sublist'], true ) .'</pre>';
        // die();

        $aVdata['sublist_cnt'] = 0;
        if(is_array($aVdata['sublist']))
        {
            $aVdata['sublist_cnt'] = count($aVdata['sublist']);
        }

        if(isset($aVdata['sublist'][0]->t_idx))
        {
            $aArticleDetailInfo = $this->_getArticleDetailInfo($aVdata['sublist'][0]->t_idx);

            $aVdata['aDetail'] = array(
                    't_idx' => $aArticleDetailInfo->t_idx
                    ,'crawdate' => $aArticleDetailInfo->craw_data->datetime
                    ,'regdate' => $aArticleDetailInfo->regdate
                    ,'title' => $aArticleDetailInfo->craw_data->title
                    ,'url' => '<a href="'.$aArticleDetailInfo->craw_data->url.'" target="_blank">원본 링크 바로가기<i class="fa fa-share" aria-hidden="true"></i></a>'
                    ,'contents' => replaceArticleHTML($aArticleDetailInfo->craw_data->contents)
                    ,'bookmark' => $aArticleDetailInfo->bookmark
            );
        }

        $data = array(
             'vdata' => $aVdata
            ,'usn'   => $usn
            ,'aMenuList' => $aMenuList
            ,'contents' => 'article/list'
        );

        $this->load->view('common/container', $data);
    }
}
