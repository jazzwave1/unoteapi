<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mypagetest extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
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
        $user_id  = $this->input->post("user_id"); 
        $user_pwd = $this->input->post("pwd"); 
        
        $usn = $this->input->post("usn"); 
        $siteid = $this->input->post("siteid"); 
        
        if(!$user_id || !$user_pwd || !$usn|| !$siteid)
        {
            $rtn = array(
                 'code' => 999
                ,'msg' => 'input param chk' 
            );
            response_json($rtn);
        }
        
        $q_idx = MSGQClass::setMsgQ($usn);

        if($this->_callIbricksCrawMyPost($user_id, $user_pwd, $q_idx, $usn, $siteid))
        {
            $state = "ING";
            MSGQClass::updateMsgQ($usn, $q_idx, $state); 
            
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
    
    private function _callIbricksCrawMyPost($user_id, $user_pwd, $q_idx, $usn, $siteid)
    {
        return true;   
    
        $this->load->library('IbricksClass'); 
        IbricksClass::crawlMyPost($user_id, $user_pwd, $usn, $siteid, $q_idx );
    } 
     
}
