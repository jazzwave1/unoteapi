<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'models/Common_dao.php');

class Account_dao extends Common_dao
{
    public function __construct()
    {
        $this->db = $this->load->database('dev_aws', TRUE);
        // $this->edu_db = $this->load->database('dev_edu', TRUE);
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
        // test code
        $aRet = array(
                'newid' => 'test1'
                ,'name' => '테스트'
                ,'email1' => ''
                ,'email2' => ''
                ,'BengSch' => ''
                ,'OffSch' => ''
                ,'mobile1' => ''
                ,'mobile2' => ''
                ,'mobile3' => ''
                ,'post' => ''
                ,'addr' => ''
                ,'addrdetail' => ''
            );
        return $aRet;

        // test code 제거 시 아래 기존 코드 주석제거
        // $aInput = array('newid'=>$account_id);
        // $aConfig = $this->queryInfoAccount['getEduMemInfo'];

        // return $this->actModelFucFromDB($aConfig, $aInput, $this->edu_db);
    }

}
