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
    public function  __construct2($account_id, $site)
    {
        if(!$account_id) return false;
        if(!$site) return false;
        
        $this->account_id = $account_id;
        $this->site = $site;

        $this->oAccInfo = $this->_getAccountInfo($this->account_id, $this->site);
    }
    public function  __construct3($account_id, $site, $accessToken)
    {
        if(!$account_id) return false;
        if(!$site) return false;
        
        $this->account_id = $account_id;
        $this->site = $site;
        $this->accessToken = $accessToken;

        $this->oAccInfo = $this->_getAccountInfo($account_id, $site, $accessToken);
    }


    public function index()
    {
    }
    private function _getAccountInfo($account_id, $site='', $accessToken='')
    {
        $oAccModel = edu_get_instance('account_model', 'model');
        $aAccInfo = $oAccModel->account_model->getAccountInfo($account_id);

        // Account Info가 없을 경우
        // oAuth 별로 따로 만들어 주어야합니다
        if(!$aAccInfo)
        {
            // get Member Info 
            if($site=='eduniety') $oEduMemInfo = $this->_getEduMemInfo($account_id);
            if($site=='facebook') $oEduMemInfo = $this->_getFBMemInfo($account_id, $accessToken);
            if($site=='naver')    $oEduMemInfo = $this->_getNMemInfo($account_id, $accessToken);
             
            if(!$oEduMemInfo)
            {
                alert('회원 전용 서비스 입니다. 가입 후 이용하세요.','/join');
            }

            // set account info
            $account_id = trim($oEduMemInfo->mb_id);
            $regdate    = date('Y-m-d H:i:s');

            if($site=='facebook')
                $accessToken = $oEduMemInfo->accessToken;
            else if($site=='naver')
                $accessToken = $oEduMemInfo->accessToken;
            else 
                $accessToken = '';
            
            $oAccModel->setAccountInfo($account_id, $regdate, $site, $accessToken);

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
    private function _getFBMemInfo($account_id, $accessToken)
    {
        $aRtn = array(
            'mb_id' => $account_id
            ,'accessToken' => $accessToken
        );
        return (object)$aRtn; 
    }
    private function _getNMemInfo($account_id, $accessToken)
    {
        $aRtn = array(
            'mb_id' => $account_id
            ,'accessToken' => $accessToken
        );
        return (object)$aRtn; 
    }
}
