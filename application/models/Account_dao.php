<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'models/Common_dao.php');

class Account_dao extends Common_dao
{
    public function __construct()
    {
        $this->db = $this->load->database('dev_aws', TRUE);
        $this->edu_db = $this->load->database('dev_edu', true);
        $aQueryInfo = edu_get_config('query', 'query');
        $this->queryInfoAccount = $aQueryInfo['account'];
    }

    public function getAccountInfo($aParam=array())
    {
        $aConfig = $this->queryInfoAccount['getAccountInfo'];
        return $this->actModelFuc($aConfig, $aParam);
    }

    public function setAccountInfo($aParam=array())
    {
        $aConfig = $this->queryInfoAccount['setAccountInfo'];
        return $this->actModelFuc($aConfig, $aParam);
    }

    public function getEduMemInfo($account_id)
    {
        $aInput = array('newid'=>$account_id);
        $aConfig = $this->queryInfoAccount['getEduMemInfo'];

        return $this->actModelFucFromDB($aConfig, $aInput, $this->edu_db);

    }

}
