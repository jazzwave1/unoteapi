<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'models/Common_dao.php');

class Account_dao extends Common_dao
{
    public function __construct()
    {
        $this->db = $this->load->database('dev_aws', TRUE);
        $this->edu_db = $this->load->database('dev_membership', TRUE);
        
        $aQueryInfo = edu_get_config('query', 'query');
        $this->queryInfoAccount = $aQueryInfo['account'];
        $this->queryInfoEdu = $aQueryInfo['edumember'];
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
//      $aRet = array(
//              'newid' => 'test1'
//              ,'name' => '테스트'
//              ,'email1' => ''
//              ,'email2' => ''
//              ,'BengSch' => ''
//              ,'OffSch' => ''
//              ,'mobile1' => ''
//              ,'mobile2' => ''
//              ,'mobile3' => ''
//              ,'post' => ''
//              ,'addr' => ''
//              ,'addrdetail' => ''
//          );
//      return $aRet;

        $aInput = array('mb_id'=>$account_id);
        $aConfig = $this->queryInfoEdu['getMemberInfo'];

        return $this->actModelFucFromDB($aConfig, $aInput, $this->edu_db);
    }

}
