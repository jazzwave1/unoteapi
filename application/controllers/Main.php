<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->account_model = edu_get_instance('account_model', 'model'); 
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

        // set cookie
        $coo  = edu_get_instance('CookieClass');
        $oCoo = new $coo();
        $oCoo->setCookie( (array) $oAcc->oAccInfo);

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

        $this->load->view('main/dashboard', $data);
    }


    private function _isLogin()
    {
        // test code
        return $account_id = '1111';

        // session 추가 필요

        if(!$account_id)
            return false;

        return $account_id;
    }

}
