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
        $category_idx = $this->input->post('category_idx');
        $usn = $this->input->post('usn');
        $name = $this->input->post('sCategoryName');

        // test code
        $category_idx = '';
        $usn = 1;
        $sCategoryName = '테스트임';

        $aRes = array(
             'category_idx'  => $category_idx
            ,'usn'           => $usn
            ,'sCategoryName' => $sCategoryName
        );

        edu_get_instance('CategoryClass');
        $aRes['resert'] = CategoryClass::setCategory($category_idx, $usn, $sCategoryName);

        echo json_encode($aRes);
    }

    public function delCategory()
    {
        $category_idx = $this->input->post('category_idx');

        // test code
        $category_idx = 9;

        $aRes = array(
             'category_idx'  => $category_idx
        );

        edu_get_instance('CategoryClass');
        $aRes['resert'] = CategoryClass::delCategory($category_idx);

        echo json_encode($aRes);
    }

    
}
