<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Msgq_model extends CI_model{
    public function __construct()
    {
        $this->msgq_dao = edu_get_instance('msgq_dao', 'model');
    }

    public function getMsgQ($g_idx, $account)
    {
        if(!$g_idx || !$account) return false;

        $aInput = array(
             'account' => $account
            ,'g_idx'   => $g_idx
        );
        $aMsgqInfo = $this->msgq_dao->getMsgQ($aInput);

        if( is_array($aMsgqInfo) && count($aMsgqInfo) > 0 )
            return $aMsgqInfo;

        return false;
    }

    public function setMsgQ($account)
    {
        if(!$account) return false;

        return ($this->msgq_dao->setMsgQ($account) );
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
}
