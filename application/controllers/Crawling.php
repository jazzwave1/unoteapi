<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Crawling extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        // $this->account_model = edu_get_instance('account_model', 'model'); 
    
        
        $this->nPageNum = 10;
        ////////////////////////////////////
        // chk Login Info
        // true : get MembeInfo
        // false : loaction login page
        $this->oMemberInfo = chkLoginInfo();
        //////////////////////////////////// 

    }

    public function index()
    {
        header('Location: '.HOSTURL.'/Crawling/History');
    }

    public function History($pagination_num = 0)
    {
        // test code
        $usn = $this->oMemberInfo->usn;

        if(! $usn )
        {
            alert('로그인 후 이용하세요.','/unoteapi/Login');
            die;
        }

        // init
        $last_page_num = 0;
        $pagination = ''; 
        if(!$pagination_num || $pagination_num == 0) $pagination_num = '';

    

        $this->load->library('MenuClass');
        $aMenuList = MenuClass::getMenuList($usn);
        // $aList['menu'] = $aMenuList['Crawling']['sub']['History'];

        $oCrawlingClass = edu_get_instance('CrawlingClass');
        $aList = $oCrawlingClass->getCrawling($usn);
         
        //echo "<!--";
        //print_r($aList);
        //echo "-->";
        
        if($aList)
        {
            $this->load->library('pagination');

            $config['base_url'] = HOSTURL.'/Crawling/History';
            $config['total_rows'] = count($aList);
            $config['per_page'] = $this->nPageNum; 
            $config['use_page_numbers'] = TRUE;
            $config['num_links'] = 5;
            $config['fixed_page_num'] = 10;
            
            $config['disable_first_link'] = TRUE;
            $config['disable_last_link'] = TRUE;
            
            $config['display_prev_always'] = TRUE;
            $config['display_next_always'] = TRUE;

            // pagination customizing
            $config['num_tag_open'] = '<li>&nbsp;';
            $config['num_tag_close'] = '&nbsp;</li>';
            $config['cur_tag_open'] = '<li><a href="javascript:;" class="on">';
            $config['cur_tag_close'] = '</a></li>';
            $config['prev_link'] = '<li class="arrow">
                                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                    </li>';
            $config['next_link'] = '<li class="arrow">
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </li>'; 

            $last_page_num = floor(count($aList) / $this->nPageNum ) + 1; 
           
            // display count 로 변경 
            $aList = $this->_setPagination($aList, $pagination_num);

            $this->pagination->initialize($config); 
            
            $pagination = $this->pagination->create_links();

        }
        
        $data = array(
             'vdata' => $aList
            ,'usn'   => $usn
            ,'pagination' => $pagination
            ,'pagination_num' => $pagination_num
            ,'last_page_num'  => $last_page_num
            ,'aMenuList' => $aMenuList
            ,'contents' => 'crawling/clist'
        );

        $this->load->view('common/container', $data);

    }
    public function reqcrawl()
    {
        // test code
        $usn = $this->oMemberInfo->usn;
        
        // usn check
        if(! $usn )
        {
            alert('로그인 후 이용하세요.','/unoteapi/Login');
            die;
        }
       
        $aTemp = array();

        $data = array(
             'vdata' => $aTemp 
            ,'contents' => 'crawling/reqcrawl'
        );

        $this->load->view('common/container', $data);

    }
    private function _setPagination($aList, $nPageNum)
    {
        if(count($aList) == 0) return false;
        if($nPageNum == 0) $nPageNum=1;

        $nSNum = ($nPageNum*$this->nPageNum) - 10;
        
        $nENum = ($nPageNum*$this->nPageNum) ;

        if($nENum >= count($aList)) $nENum = count($aList);
        
        foreach($aList as $key=>$val)
        {
            
            if($key >= $nSNum  && $key < $nENum) 
            {
                $aRtn[] = $aList[$key]; 
            }
        }
        
        return $aRtn; 
    } 
   

    ######################################
    ############ RPC Function ############
    ######################################
    public function rpcCrawling()
    {
        // siteid = 1 : NAVER
        // siteid = 2 : DAUM 
        // siteid = 3 : FACEBOOK 

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
        if($nRtnCode = $oCrawlingClass->callCrawling($usn, $siteid, $aReqFilter, $user_id, $user_pwd))
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

    public function rpcDelHistoryArticle()
    {
        $q_idx  = $this->input->post('q_idx');

        //chk param
        if(!$q_idx)      {response_json(array('code'=>999, 'msg'=>'Fail')); die;}  

        $oCrawlingClass = edu_get_instance('CrawlingClass');
        if($oCrawlingClass->deleteHistoryArticle($q_idx))
        {            
            response_json(array('code'=>1, 'msg'=>'OK')); die;
        }
        else
        {
            response_json(array('code'=>999, 'msg'=>'Fail')); die;
        }

        die;
    }



}
