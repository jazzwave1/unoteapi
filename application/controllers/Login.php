<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
       
        $this->account_model = edu_get_instance('account_model','model');
    
        $this->load->library('CookieClass');
    }
    public function index()
    {
        if( LoginClass::isLogin() )
        {
            header('Location: '.HOSTURL.'/Note');
        }
        
        $data = array();
        $this->load->view('login/login', $data);
    }

    ///////////////////////////
    // RPC Function /////////// 
    ///////////////////////////
    public function RpcLogin()
    {
        // facebook login 
        // login page post input param
        // userID, accessToken
        // 클라이언트 페이지에서 해당 정보를 가지고 와서 로그인 시도를 다시함

        // eduniety test login process
        //edu_get_instance('LoginClass');

        // param setting  
        $account_id = $this->input->post('user_id'); 
        $site = $this->input->post('site'); 
        $accessToken  = $this->input->post('accessToken'); 

        if($site == "eduniety")
        {
            if(! $account_id = _getEduMbID() )
            {
                // go~ eduniety login page
                
            }
        }
        
        if(!$site) $site = 'eduniety'; 
        if(!$accessToken) $accessToken = ''; 

        if( LoginClass::loginprocess($account_id, $site, $accessToken) )
            $rtn = array('code'=>'1', 'msg'=>'OK');
        else
            $rtn = array('code'=>'999', 'msg'=>'fail');

        if( $site == 'eduniety')
        {
            response_json($rtn);
            die;
        }
        else
        {
            if($rtn['code'] == 1)
            {
                header('Location: '.HOSTURL.'/Note');
            }
            else
            {
                header('Location: '.HOSTURL.'/Login');
            }
        }
    }


    // test page
    public function delCookie()
    {
        CookieClass::delCookieInfo();
    } 
     
    private function _getEduMbID()
    {
        // test code 
        $mb_id = 'ahnjaejo';
        return $mb_id;
    }
}
?>
