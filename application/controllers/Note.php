<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Note extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        $this->load->library('log/ErrorlogClass');
        $this->oErrorLog = new ErrorlogClass();

        $this->load->model('account_model');
        $this->load->model('note_model');
    }

    public function testAPI($account_id,$n_idx)
    {
        // get DB data
        if(!$aAccountInfo = $this->_isAccount($account_id))
        {
            $aErrorLog = array(
                 'file'   =>'/Note/testAPI'
                ,'code'   => 999
                ,'aInput' => array($account_id , $n_idx)
            );
            response_json($this->oErrorLog->setErrorLog($aErrorLog));
            die;
        }
        // json return
        response_json(array('code'=>1, 'msg'=>'OK', 'data'=>$aAccountInfo));
        die; 
    }

    public function writeNote($account_id, $n_idx)
    {
        // account_id check
        if(!$this->_isAccount($account_id))
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
        $aErrorLog = array(
             'file' =>'/Note/errorlogTest'
            ,'code' => 999
            ,'aInput' => array('test', 'value') 
        );
        response_json($this->oErrorLog->setErrorLog($aErrorLog));
    }


    private function _setContentInfo($contents)
    {
        $aRtn = array();
        $aTemp = explode("</p>", $contents);
        foreach($aTemp as $key=>$val)
        {
            $aTemp[$key] .= "</p>"; 
            $aRtn[] = array('s_idx'=>$key+1, 'contents'=>$aTemp[$key]);
        } 
        return $aRtn;
    }

    public function saveNote($sType='reg')
    {
        if($this->input->post('sType')) 
            $sType = $this->input->post('sType') ;
        
        
        if($sType == 'reg')
        {
            $aNoteData = array(
                'n_idx'    => 'NULL'
                ,'usn'     => 1
                ,'title'   => $this->input->post('title') 
                ,'regdate' => date("Y-m-d H:i:s")
            );
           
            // insertNote
            // 추후 note_display, note_sentence table 추가 필요
            if($pk = $this->note_model->insertNote($aNoteData))
            {
                $aContentInfo = $this->_setContentInfo($this->input->post('ir1'));
                $this->note_model->insertNoteSentence($pk, $aContentInfo) ;
                
                $aResult = array( 'code' => 1, 'msg' => 'OK', 'pk'=>$pk);
                response_json($aResult);
                die;
            }

        }
        else if($sType == 'edit')
        {
            $aNoteData = array(
                'n_idx'     => $this->input->post('n_idx') 
                ,'usn'      => 1
                ,'title'    => $this->input->post('title') 
                ,'regdate'  => date("Y-m-d H:i:s")
                ,'contents' => $this->_setContentInfo($this->input->post('ir1')) 
            );

            if($this->_isNote($aNoteData['n_idx']))
            {
                // update
                if($this->note_model->updateNote($aNoteData))
                {
                    $aResult = array( 'code' => 1, 'msg' => 'OK');
                    response_json($aResult);
                }
            }
// test code 
// 잠시 막아둠            
//          $aErrorLog = array(
//               'file' =>'/Note/saveNote | edit'
//              ,'code' => 301 
//              ,'aInput' => $aNoteData 
//          );
//          response_json($this->oErrorLog->setErrorLog($aErrorLog));
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
                $aResult = array( 'code' => 1, 'msg' => 'OK');
                response_json($aResult);
            }
            $aErrorLog = array(
                'file' =>'/Note/deleteNote'
                ,'code' => 901 
                ,'aInput' => array($n_idx) 
            );
            response_json($this->oErrorLog->setErrorLog($aErrorLog));
            die;
        }
        
        $aErrorLog = array(
            'file' =>'/Note/deleteNote'
            ,'code' => 301 
            ,'aInput' => array($n_idx) 
        );
        response_json($this->oErrorLog->setErrorLog($aErrorLog));
        die;
    }

    private function _isAccount($account_id=0)
    {
        return $this->account_model->isAccount($account_id);
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
