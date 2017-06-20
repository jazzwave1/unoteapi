<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
     //   $this->account_model = edu_get_instance('account_model', 'model');
    }

    public function index()
    {
        
        // id check
        if(! $account_id = $this->_isLogin() )
        {
            alert('로그인 후 이용하세요.','/login');
            die;
        }

        // get account info
        $acc  = edu_get_instance('AccountClass');
        $oAcc = new $acc($account_id);

        // get note info
        $usn = $oAcc->oAccInfo->usn;
        $note  = edu_get_instance('NoteClass');
        $oNote = new $note($usn);

        $data = array();
        $aUserInfo = array(
                'oAccountInfo'   => $oAcc->oAccInfo
               ,'oNoteInfo'      => $oNote->oNoteInfo
            );
        $data['aUserInfo'] = $aUserInfo;

        // test code
        echo "<!--";
        print_r($data);
        echo "-->";

        $this->load->view('main/dashboard', $data);
    }


    private function _isLogin()
    {
        edu_get_instance('LoginClass');
        $oMemberInfo = LoginClass::isLogin();
        
        if($oMemberInfo->usn)
            return $oMemberInfo->account;

        return false;
    }

}
