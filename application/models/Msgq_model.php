<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Msgq_model extends CI_model{
    public function __construct()
    {
        $this->msgq_dao = edu_get_instance('msgq_dao', 'model');
    }

    public function getMsgQ($q_idx, $account)
    {
        if(!$q_idx || !$account) return false;

        $aInput = array(
             'account' => $account
            ,'q_idx'   => $q_idx
        );
        $aMsgqInfo = $this->msgq_dao->getMsgQ($aInput);

        if( is_array($aMsgqInfo) && count($aMsgqInfo) > 0 )
            return $aMsgqInfo;

        return false;
    }
    public function setMsgQ($account, $site_id , $aReqFilter=array())
    {
        if(!$account) return false;

        return ($this->msgq_dao->setMsgQ($account, $site_id, $aReqFilter) );
    }
    public function updateMsgQ($account, $q_idx, $state)
    {
        if(!$q_idx || !$account || !$state) return false;
        
        $aInput = array(
             'state' => $state
            ,'completedate' => date('Y-m-d H:i:s')
            ,'q_idx'   => $q_idx
            ,'account' => $account
        );

        return ($this->msgq_dao->updateMsgQ($aInput));
    }
    public function getMsgQList($account)
    {
        if(!$account) return false;

        $aInput = array( 'account' => $account );
        $aMsgqInfo = $this->msgq_dao->getMsgQList($aInput);

        if( is_array($aMsgqInfo) && count($aMsgqInfo) > 0 )
            return $aMsgqInfo;

        return false;
    }
}
