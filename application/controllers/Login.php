<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
       
        $this->account_model = edu_get_instance('account_model','model');
    
        $this->load->library('LoginClass');
        $this->load->library('CookieClass');
    }
    public function index()
    {
        // chk login session
        if(LoginClass::isLogin())
        {
            // go~ my list page
            header('Location: http://localhost/~hojunlee/unoteapi/main');
        }
        else
        {
            // view login page 
            $data = array();
            $this->load->view('login/login', $data);
        } 
    }
    private function _getAccountID()
    {
        return "mintgreen";
    }
    
    // RPC 
    public function RpcLogin()
    {
        // facebook login 
        // login page post input param
        // userID, accessToken
        // 클라이언트 페이지에서 해당 정보를 가지고 와서 로그인 시도를 다시함

        // eduniety test login process
        edu_get_instance('LoginClass');

        // param setting  
        $account_id = $this->input->post('user_id'); 
        $site = $this->input->post('site'); 
        $accessToken  = $this->input->post('accessToken'); 
        
        if(!$site) $site = 'eduniety'; 
        if(!$accessToken) $accessToken = ''; 

        if( LoginClass::loginprocess($account_id, $site, $accessToken) )
            $rtn = array('code'=>'1', 'msg'=>'OK');
        else
            $rtn = array('code'=>'999', 'msg'=>'fail');
        
        response_json($rtn); 
        die;
    }


    // test page
    public function delCookie()
    {
        CookieClass::delCookieInfo();
    } 
     

}
?>
