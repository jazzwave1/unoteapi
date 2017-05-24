<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NoteClass {

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

        $this->oNoteInfo = $this->_getNoteInfo($this->usn);
    }

    public function index()
    {
    }
    private function _getNoteInfo($usn)
    {
        $oNoteModel = edu_get_instance('note_model', 'model');
        $aNoteInfo = $oNoteModel->note_model->getNoteInfo($usn);
        return $aNoteInfo;
    }
    private function _getNoteDisplay($n_idx)
    {
    }
    private function _getNoteSentence($n_idx)
    {
    }
}
