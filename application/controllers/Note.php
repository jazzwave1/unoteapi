<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Note extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        $this->load->model('note_model');
    }

    public function writeNote($usn, $n_idx)
    {
        // usn check
        if(!$this->_isAccount($usn))
        {
            echo "alert('유저 정보 없음');";
            die;
        }

        // n_idx check
        if(!$this->_isNote($n_idx))
        {
            $this->_regNote();
        }
        else
        {
            $this->_editNote();
        }
    }

    private function _isAccount($usn=0)
    {
        return $this->note_model->isAccount($usn);
    }

    private function _isNote($n_idx=0)
    {
        return $this->note_model->isNote($n_idx);
    }

    private function _regNote()
    {
    }

    private function _editNote()
    {
        // note data
        $aRes = $this->note_model->getNoteInfo();

        return $aRes;
    }

    public function saveNote($sType, $aData)
    {
        if($sType == 'reg')
        {
            // insert
            $this->note_model->insertNote($aData);
        }
        else if($sType == 'edit')
        {
            if($this->_isNote($aData['n_idx']))
            {
                // update
                $this->note_model->updateNote($aData);
            }
        }
    }

    public function deleteNote($n_idx='')
    {
        if($this->_isNote($n_idx))
        {
            // delete
            $this->note_model->deleteNote($n_idx);
        }
    }

}
