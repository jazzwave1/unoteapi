<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Note_model extends CI_model
{
    public function __construct()
    {
        $this->load->model('note_dao');
    }

    public function getNoteInfoByUsn($usn)
    {
        if(!$usn) return false;

        $aRes = array();

        $aInput = array('usn'=>$usn);

        $aNoteInfo = $this->note_dao->getNoteInfoByUsn($aInput);

        foreach ($aNoteInfo as $key => $obj) {
            $aInput = array('n_idx'=>$obj->n_idx);
            $aNoteSummary = $this->note_dao->getNoteSummary($aInput);

            $sSummary = '';
            if( isset($aNoteSummary) && is_array($aNoteSummary)>0 )
            {
                $sSummary = strip_tags($aNoteSummary[0]->contents);
            }

            $aNoteInfo[$key]->regdate = substr($obj->regdate,0,4).'.'.substr($obj->regdate,5,2).'.'.substr($obj->regdate,8,2);
            $aNoteInfo[$key]->summary = $sSummary;
            $aNoteInfo[$key]->thumbnail = '';
        }

        $aRes = $aNoteInfo;

        return $aRes;
    }

    public function getNoteDetailInfo($n_idx)
    {
        if(!$n_idx) return false;

        $aRes = array('is_use'=>'N');

        $aInput = array('n_idx'=>$n_idx);

        $aNoteInfo = $this->note_dao->getNoteInfoByNidx($aInput);
        $aNoteDetailInfo = $this->note_dao->getNoteDetailInfo($aInput);
        
        if( is_array($aNoteInfo) )
        {
            $aRes['is_use'] = 'Y';
            $aRes['n_idx'] = $aNoteInfo[0]->n_idx;
            $aRes['title'] = $aNoteInfo[0]->title;
            $aRes['regdate'] = substr($aNoteInfo[0]->regdate,0,4).'.'.substr($aNoteInfo[0]->regdate,5,2).'.'.substr($aNoteInfo[0]->regdate,8,2);

            $aRes['text'] = '';
            if( isset($aNoteDetailInfo) && is_array($aNoteDetailInfo) )
            {
                foreach ($aNoteDetailInfo as $obj)
                {
                    $aRes['text'] .= str_replace('<p','<p id="s_idx_'.$obj->s_idx.'" ', $obj->contents);
                }
            }
        }
        return $aRes;
    }

    public function deleteNote($n_idx)
    {
        if(!$n_idx) return false;

        $aInput = array('n_idx' => $n_idx, 'deldate' => date('Y-m-d H:i:s') );

        if( $this->note_dao->deleteNote($aInput) )
            return true;

        return false;
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
/*
Dev Code
이하 코드는 추후 수정 및 삭제 예정
==============================================================================
*/

    public function isNote($n_idx)
    {
        if(!$n_idx) return false;

        $aInput = array('n_idx'=>$n_idx);
        $aNoteInfo = $this->note_dao->getNoteInfo($aInput);

        if( is_array($aNoteInfo) && count($aNoteInfo) > 0 )
            return true;

        return false;
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

        return false;
    }
}
