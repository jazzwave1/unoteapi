<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AccountClass {

    public function __construct()
    {
        $a = func_get_args();
        $i = func_num_args();
        if (method_exists($this,$f='__construct'.$i))
        {
        call_user_func_array(array($this,$f),$a);
        }
    }
    public function  __construct1($account_id)
    {
        if(!$account_id) return false;
        
        $this->account_id = $account_id;

        $this->oAccInfo = $this->_getAccountInfo($this->account_id);
    }

    public function index()
    {
    }
    private function _getAccountInfo($account_id)
    {
        $oAccModel = edu_get_instance('account_model', 'model');
        $aAccInfo = $oAccModel->account_model->getAccountInfo($account_id);

        // Account Info가 없을 경우
        if(!$aAccInfo)
        {
            // Eduniety Member Info 가져오기
            $oEduMemInfo = $this->_getEduMemInfo($account_id);

            if(!$oEduMemInfo)
            {
                alert('회원 전용 서비스 입니다. 가입 후 이용하세요.','/join');
            }

            // set account info
            $account_id     = trim($oEduMemInfo->newid);
            $regdate        = date('Y-m-d H:i:s');
            $oAccModel->setAccountInfo($account_id, $regdate);

            // get account info
            $aAccInfo = $oAccModel->account_model->getAccountInfo($account_id);
        }

        return $aAccInfo;
    }
    private function _getEduMemInfo($account_id)
    {
        $oAccModel = edu_get_instance('account_model', 'model');
        return $oAccModel->account_model->getEduMemInfo($account_id);
    }
}
