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

    public function getNoteInfoByUsn($usn)
    {
        if(!$usn) return false;

        $aRes = array();

        $aInput = array('usn'=>$usn);

        $aRes = $this->note_dao->getNoteInfo($aInput);

        return $aRes;
    }

    public function getNoteInfoByNidx($n_idx)
    {
        if(!$n_idx) return false;

        $aRes = array();

        $aInput = array('n_idx'=>$n_idx);

        $aRes = $this->note_dao->getNoteInfoByNidx($aInput);

        return $aRes;
    }

    public function insertNote($aNoteData)
    {
        if( $pk = $this->note_dao->insertNote($aNoteData) )
            return $pk;
        else
            return false;
    }
    public function insertNoteSentence($pk, $aContentInfo)
    {
        if(!$pk) return false;
        if(count($aContentInfo) == 0) return false;

        foreach($aContentInfo as $key=>$val)
        {
            $this->note_dao->insertNoteSentence($pk, $val['s_idx'], $val['contents']); 
        }
        return true;
    }

    public function updateNote($aInput)
    {
        if( $this->note_dao->updateNote($aInput) )
        {
            // update note_sentence
            $this->note_dao->deleteNoteSentence($aInput['n_idx']); 
            $this->insertNoteSentence($aInput['n_idx'], $aInput['contents']); 
            return true;
        }    
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
