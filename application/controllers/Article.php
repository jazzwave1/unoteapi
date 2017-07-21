<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        $this->load->model('note_model');
    }

    public function index()
    {
        $this->List();
    }

    public function List()
    {
        // test code
        $usn = 1;

        // usn check
        if(! $usn )
        {
            alert('로그인 후 이용하세요.','/login');
            die;
        }

        $aVdata = array();
        $aVdata['menu'] = getMenuData('Article','List');

        $note  = edu_get_instance('NoteClass');
        $oNote = new $note($usn);
        $aVdata['sublist'] = $oNote->oNoteInfo;

        // test code
        // echo "<!--";
        // echo "<pre>";
        // print_r($aVdata);
        // echo "</pre>";
        // echo "-->";
        // die();

        $data = array(
             'vdata' => $aVdata
            ,'contents' => 'article/list'
        );

        $this->load->view('common/container', $data);
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

    
}
