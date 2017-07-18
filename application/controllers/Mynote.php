<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mynote extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        // $this->account_model = edu_get_instance('account_model', 'model'); 
    }

    public function index()
    {
        // test code
        $usn = 1;

        // usn check
        if(! $usn )
        {
            alert('로그인 후 이용하세요.','/login');
            die;
        }

        $note  = edu_get_instance('NoteClass');
        $oNote = new $note($usn);

        $aVdata = array();
        $aVdata['menu'] = getMenuData('Mynote','index');
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
            ,'contents' => 'mynote/list'
        );

        $this->load->view('common/container', $data);
    }
    public function viewNote($n_idx)
    {
        $note  = edu_get_instance('NoteClass');
        $sHtml = $note->getNoteDetailHtml($n_idx);

        $aRtn = array('html' => $sHtml);

        // test code
        // echo '<pre>aRtn: '. print_r( $aRtn, true ) .'</pre>';
        echo $aRtn['html'];
        // die();

        return json_encode($aRtn);
    }

    public function saveNote($n_idx)
    {
        // test code
        $n_idx = 1;

        edu_get_instance('NoteClass');
        // $bRes = NoteClass::getNote($n_idx); 

        // if()
    }
    public function deleteNote($n_idx)
    {
        // test code
        $n_idx = 1;

        if(!$n_idx) return false;
        
        $this->n_idx = $n_idx;

        $this->_deleteNote($this->n_idx);
    }
    private function _deleteNote($n_idx)
    {
        $oNoteModel = edu_get_instance('note_model', 'model');
        $bRes = $oNoteModel->note_model->deleteNote($n_idx);
        return $bRes;
    }
}
