<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'models/Common_dao.php');

class Msgq_dao extends Common_dao
{
    public function __construct()
    {
        $this->db = $this->load->database('dev_aws', TRUE);
        $aQueryInfo = edu_get_config('query', 'query');
        $this->queryInfoMsgq = $aQueryInfo['msgq'];
    }

    public function getMsgQ($aParam=array())
    {
        $aConfig = $this->queryInfoMsgq['getMSGQ'];
        return $this->actModelFuc($aConfig, $aParam);
    }

    public function setMsgQ($account)
    {
        $aParam = array(
            'account' => $account
           ,'state'   => 'REQ' 
           ,'regdate' => date('Y-m-d H:i:s') 
        );
        $aConfig = $this->queryInfoMsgq['setMSGQ'];
        $this->actModelFuc($aConfig, $aParam);
        return $this->db->insert_id();
    }
    public function updateMsgQ($aParam=array())
    {
        $aConfig = $this->queryInfoMsgq['updateMSGQ'];
        return $this->actModelFuc($aConfig, $aParam);
    }
    public function getMsgQList($aParam=array())
    {
        $aConfig = $this->queryInfoMsgq['getMSGQList'];
        return $this->actModelFuc($aConfig, $aParam);
    }


}
