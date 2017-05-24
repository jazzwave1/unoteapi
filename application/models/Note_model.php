<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Note_model extends CI_model
{
    public function __construct()
    {
        $this->load->model('note_dao');
    }

    public function isNote($n_idx)
    {
        if(!$n_idx) return false;

        $aInput = array('n_idx'=>$n_idx);
        $aNoteInfo = $this->note_dao->getNoteInfo($aInput);

        if( is_array($aNoteInfo) && count($aNoteInfo) > 0 )
            return true;

        return false;
    }

    public function getNoteInfo($usn)
    {
        if(!$usn) return false;

        $aRes = array();

        $aInput = array('usn'=>$usn);

        $aRes = $this->note_dao->getNoteInfo($aInput);

        return $aRes;
    }

    public function insertNote($aNoteData)
    {
        $aInput = array(
            'n_idx'    => $aNoteData['n_idx']
            ,'usn'     => $aNoteData['usn']
            ,'title'   => $aNoteData['title']
            ,'regdate' => date("Y-m-d H:i:s")
        );

        if( $this->note_dao->insertNote($aInput) )
            return true;
        else
            return false;
    }

    public function updateNote($aNoteData)
    {
        $aInput = array(
            'n_idx'    => $aNoteData['n_idx']
            ,'usn'     => $aNoteData['usn']
            ,'title'   => $aNoteData['title']
            ,'regdate' => date("Y-m-d H:i:s")
        );

        if( $this->note_dao->updateNote($aInput) )
            return true;
        else
            return false;
    }

    public function deleteNote($n_idx)
    {
        if(!$n_idx) return false;

        $aInput = array('n_idx' => $n_idx);

        if( $this->note_dao->deleteNote($aInput) )
            // note_display delete
            // note_sentence delete
            return true;
        else
            return false;

    }
}
