<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mypagetest extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        // $this->account_model = edu_get_instance('account_model', 'model'); 
        $this->load->library('MSGQClass'); 
    }

    public function index()
    {
    }
    public function req_crawling()
    {
        $data = array();
        $this->load->view('mypagetest', $data);
    }


    //////////////////////////////// 
    // rpc Call  List ////////////// 
    //////////////////////////////// 
    public function setCrawling()
    {
        $account_id  = $this->input->post("user_id"); 
        $account_pwd = $this->input->post("pwd"); 
        
        if(!$account_id || !$account_pwd)
        {
            $rtn = array(
                 'code' => 999
                ,'msg' => 'input param chk' 
            );
            response_json($rtn);
        }
        
        $q_idx = MSGQClass::setMsgQ($account_id);

        if($this->_callIbricksCrawMyPost($account_id, $account_pwd, $q_idx))
        {
            $state = "ING";
            MSGQClass::updateMsgQ($account_id, $q_idx, $state); 
            
            $rtn = array(
                 'code' => 1 
                ,'msg' => 'ok : ING update' 
            );
            response_json($rtn);
        }
        else
        {
            $rtn = array(
                 'code' => 99 
                ,'msg' => 'API Call Fail' 
            );
            response_json($rtn);
        }
        die; 
    }



    /////////////////////////////////////////////////////////////////
    ///////////////////  Ibricks --> api call ///////////////////////
    /*
     * Ibricks 에서 크롤링이 끝나면 호출 하는 API입니다.
     * 해당 메세지 큐에 완료를 남겨 줍니다.
     */ 
    /////////////////////////////////////////////////////////////////
    public function completeCraw($account, $q_idx)
    {
        $state = "COM";
        if( MSGQClass::updateMsgQ($account, $q_idx, $state) )
        {
            $rtn = array(
                 'code' => 1 
                ,'msg' => 'OK' 
            );
        } 
        else
        {
            $rtn = array(
                 'code' => 99 
                ,'msg' => 'API Call Fail' 
            );

        }        
        response_json($rtn);
        die;
    }
    
    private function _callIbricksCrawMyPost($account_id, $account_pwd, $q_idx)
    {
        return true;   
    } 
     
}
