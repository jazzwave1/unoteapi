<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Crawling extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        // $this->account_model = edu_get_instance('account_model', 'model'); 
    }

    public function index()
    {
        $this->History();
    }
    
    public function History()
    {
        // test code
        $account = $this->_getAccount();

        $oCrawlingClass = edu_get_instance('CrawlingClass');
        $aList = $oCrawlingClass->getCrawling($account);
        
        echo "<!--";
        print_r($aList);
        echo "-->";
        
        $data = array(
             'vdata' => $aList
            ,'contents' => 'crawling/clist'
        );

        $this->load->view('common/container', $data);

    }
    public function reqcrawl()
    {
        // test code
        $account = $this->_getAccount();

        $aTemp = array();

        $data = array(
             'vdata' => $aTemp 
            ,'contents' => 'crawling/reqcrawl'
        );

        $this->load->view('common/container', $data);

    }
    private function _getAccount()
    {
        // return usn
        return "1";
    }

   

    ######################################
    ############ RPC Function ############
    ######################################
    public function rpcCrawling()
    {
        // facebook & naver, daum 구분할수 있도록 처리 해야함 
//        print_r($_POST); 

        $usn      = $this->input->post('usn');
        $siteid   = $this->input->post('site');
        $user_id  = $this->input->post('s_id');
        $user_pwd = $this->input->post('s_pwd');
        $aReqFilter = $this->input->post('filter');

        //chk param
        if(!$usn)      {response_json(array('code'=>999, 'msg'=>'Fail')); die;}  
        if(!$siteid)   {response_json(array('code'=>999, 'msg'=>'Fail')); die;}  
        if(!$user_id)  {response_json(array('code'=>999, 'msg'=>'Fail')); die;}  
        if(!$user_pwd) {response_json(array('code'=>999, 'msg'=>'Fail')); die;}  

        // set MSGQ & get q_idx
        $oCrawlingClass = edu_get_instance('CrawlingClass');
        if($nRtnCode = $oCrawlingClass->callCrawling($usn, $siteid, $aReqFilter))
        {
//            echo $nRtnCode."\n";
            if($nRtnCode == '2')
            {
                response_json(array('code'=>2, 'msg'=>'API Fail'));
                die;
            }
            
            response_json(array('code'=>1, 'msg'=>'OK')); die;
        }
        else
        {
            response_json(array('code'=>999, 'msg'=>'Fail')); die;
        }

//      echo "\n usn : ".$usn;
//      echo "\n siteid : ".$siteid;
//      echo "\n user_id : ".$user_id;
//      echo "\n user_pwd : ".$user_pwd;
//      echo "\n q_idx : ".$q_idx;

        //$oCrawlingClass = edu_get_instance('CrawlingClass');
        //$aList = $oCrawlingClass->getCrawling($account);
 
        die;
    }




}
