<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Account_model extends CI_model{
    public function __construct()
    {
        $this->account_dao = edu_get_instance('account_dao', 'model');
    }

    public function isAccount($account_id)
    {
        if(!$account_id) return false;

        $aInput = array('account_id'=>$account_id);
        $aAccountInfo = $this->account_dao->getAccountInfo($aInput);

        if( is_array($aAccountInfo) && count($aAccountInfo) > 0 )
            return $aAccountInfo;

        return false;
    }
    
    public function getAccountInfo($account_id)
    {
        if(!$account_id) return false;

        $aInput = array('account_id'=>$account_id);
        $aAccountInfo = $this->account_dao->getAccountInfo($aInput);

        if( is_array($aAccountInfo) && count($aAccountInfo) > 0 )
            return $aAccountInfo[0];

        return false;
    }

    public function setAccountInfo($account_id, $regdate)
    {
        if (!$account_id || !$regdate) return false;

        $aInput = array(
            'account_id' => $account_id
            ,'regdate' => $regdate
        );
        return $this->account_dao->setAccountInfo($aInput);
    }

    public function getEduMemInfo($account_id)
    {
        if(!$account_id) return false;

        $aInput = array('newid'=>$account_id);
        $aEduMemInfo = $this->account_dao->getEduMemInfo($aInput);

        if( is_array($aEduMemInfo) && count($aEduMemInfo) > 0 )
            return $aEduMemInfo[0];

        return false;
    }
}
