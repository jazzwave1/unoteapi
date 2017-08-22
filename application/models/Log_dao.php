<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'models/Common_dao.php');

class Log_dao extends Common_dao
{
    public function __construct()
    {
        $this->db = $this->load->database('dev_aws', TRUE);
        $aQueryInfo = edu_get_config('query', 'query');
        $this->queryInfoMsgq = $aQueryInfo['log'];
    }

    public function getMsgQ($aParam=array())
    {
        $aConfig = $this->queryInfoMsgq['getMSGQ'];
        return $this->actModelFuc($aConfig, $aParam);
    }

    public function setApiLog($aParam=array())
    {
        $aConfig = $this->queryInfoMsgq['setApiLog'];
        $this->actModelFuc($aConfig, $aParam);
    }
    

}
