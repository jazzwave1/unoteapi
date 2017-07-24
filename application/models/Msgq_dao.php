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

    public function setMsgQ($account, $site_id,$aReqFilter=array())
    {
        if(count($aReqFilter)>=1)
            $sReqFilter = implode('|', $aReqFilter);
        else
            $sReqFilter = '';

        $aParam = array(
            'account' => $account
           ,'state'   => 'REQ' 
           ,'site_id' => $site_id 
           ,'req_filter' => $sReqFilter 
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
    public function getMyFilter($account, $sValue, $nBindCount)
    {
        $btype = 's';
        $query = "select corporation, site, board
                    from req_filter
                   where account = ?
                     and rf_idx in (";
        for($i=0 ; $i<$nBindCount; $i++)
        {
            $query .= "?,";
            $btype .= 'i';
        } 
        $query = substr($query, 0,-1).')';

        $aTemp = explode(',', $sValue);
        $aInputData = array($account);
        $aInputData = array_merge($aInputData, $aTemp); 
        
        $oResult = $this->db->query($query, $aInputData, true, $btype);
        $oRtn = $oResult->result();

        return $oRtn;
    }

}
