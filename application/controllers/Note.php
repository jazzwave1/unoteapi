<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Note extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        $this->load->library('ErrorlogClass');
        $this->oErrorLog = new ErrorlogClass();

        $this->load->model('note_model');
    }

    public function testAPI($usn,$n_idx)
    {
        // get DB data
        if(!$aAccountInfo = $this->_isAccount($usn))
        {
            response_json(array('code'=>999, 'msg'=>'No acccount user'));
            die;
        }
        // json return
        //response_json(array('code'=>1, 'msg'=>'OK'));
        response_json(array('code'=>1, 'msg'=>'OK', 'data'=>$aAccountInfo));
        die; 
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

        // json return

    }

    public function errorlogTest()
    {
        response_json($this->oErrorLog->setErrorLog('/Note/errorlogTest', 999));
    }


    public function saveNote($sType='reg')
    {
        // dumy data
        // 추후 note data는 post로 받음
        $aNoteData = array(
            'n_idx'    => 2
            ,'usn'     => 1
            ,'title'   => 'test note 2 - edit'
            ,'regdate' => date("Y-m-d H:i:s")
        );

        if($sType == 'reg')
        {
            // insertNote
            // 추후 note_display, note_sentence table 추가 필요
            if($this->note_model->insertNote($aNoteData))
            {
                response_json($this->oErrorLog->setErrorLog('/Note/saveNote/reg', 1));
                die;
            }

        }
        else if($sType == 'edit')
        {
            if($this->_isNote($aNoteData['n_idx']))
            {
                // update
                if($this->note_model->updateNote($aNoteData))
                {
                    response_json($this->oErrorLog->setErrorLog('/Note/saveNote/edit', 1));
                    die;
                }
            }

            response_json($this->oErrorLog->setErrorLog('/Note/deleteNote', 301));
            die;
        }
    }
    public function deleteNote($n_idx='')
    {
        if($this->_isNote($n_idx))
        {
            // delete
            if($this->note_model->deleteNote($n_idx))
            {
                response_json($this->oErrorLog->setErrorLog('/Note/deleteNote', 1));
                die;
            }

            response_json($this->oErrorLog->setErrorLog('/Note/deleteNote', 901));
            die;
        }

        response_json($this->oErrorLog->setErrorLog('/Note/deleteNote', 301));
        die;
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

        return response_json($aRes);
    }


}
