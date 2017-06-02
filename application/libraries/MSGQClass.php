<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MSGQClass {

    public function __construct()
    {
    }

    public static function setMsgQ($account)
    {
        if(!$account) return false;
        
        $msgq_model = edu_get_instance('msgq_model', 'model');
        return $msgq_model->setMsgQ($account);
    }

    public static function getMsgQ($q_idx, $account)
    {
        if(!$q_idx || !$account) return false;
        
        $msgq_model = edu_get_instance('msgq_model', 'model');
        return $msgq_model->getMsgQ($q_idx, $account);
    }
    
    public static function updateMsgQ($account, $q_idx, $state)
    {
        if(!$q_idx|| !$account || !$state) return false;

        $msgq_model = edu_get_instance('msgq_model', 'model');
        return $msgq_model->updateMsgQ($account, $q_idx, $state);
    }

    public static function getMsgQList($account)
    {
        if(!$account) return false;
        
        $msgq_model = edu_get_instance('msgq_model', 'model');
        return $msgq_model->getMsgQLIst($account);
    }
}
