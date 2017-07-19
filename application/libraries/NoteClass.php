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

    public static function getNoteDetailInfo($n_idx)
    {
        if(!$n_idx) return false;
        
        $note_model = edu_get_instance('note_model', 'model');
        $aNoteDetailInfo = $note_model->getNoteDetailInfo($n_idx);

        return $aNoteDetailInfo;    
    }
    private function _getNoteInfo($usn)
    {
        $oNoteModel = edu_get_instance('note_model', 'model');
        $aNoteInfo = $oNoteModel->note_model->getNoteInfoByUsn($usn);
        return $aNoteInfo;
    }





/*
Dev Code
이하 코드는 추후 수정 및 삭제 예정
==============================================================================
*/
    public function delNote($n_idx)
    {
        if(!$n_idx) return false;
        
        $this->n_idx = $n_idx;

        $this->_delNote($this->n_idx);
    }
    public function getNoteDetailHtml($n_idx)
    {
        if(!$n_idx) return false;

        $aNoteInfo = $this->_getNoteInfoByNidx($n_idx);

        return getTemplateDetail($aNoteInfo[0]);
    }


    private function _getNoteInfoByUsn($usn)
    {
        $oNoteModel = edu_get_instance('note_model', 'model');
        $aNoteInfo = $oNoteModel->note_model->getNoteInfoByUsn($usn);
        return $aNoteInfo;
    }
    private function _getNoteInfoByNidx($n_idx)
    {
        $oNoteModel = edu_get_instance('note_model', 'model');
        $aNoteInfo = $oNoteModel->note_model->getNoteInfoByNidx($n_idx);
        return $aNoteInfo;
    }
    private function _getNoteDisplay($n_idx)
    {
    }
    private function _getNoteSentence($n_idx)
    {
    }
    private function _delNote($n_idx)
    {
        $oNoteModel = edu_get_instance('note_model', 'model');
        $bRes = $oNoteModel->note_model->delNote($n_idx);
        return $bRes;
    }
}
