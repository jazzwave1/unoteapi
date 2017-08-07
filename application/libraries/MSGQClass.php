<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MSGQClass {

    public function __construct()
    {
    }

    public static function setMsgQ($account, $site_id,$aReqFilter=array())
    {
        if(!$account) return false;
        
        $msgq_model = edu_get_instance('msgq_model', 'model');
        return $msgq_model->setMsgQ($account, $site_id,$aReqFilter);
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
        $aMQList = $msgq_model->getMsgQLIst($account);

        if(!$aMQList)
            return false;
        
        $aRtn = SELF::setFilterString($aMQList);

        $sCorporation = "";
        $sSite = "";
        $sBoard = "";

        //echo "<!--";
        //print_r($aRtn);
        //echo "-->";

        foreach($aRtn as $key=>$val)
        {
            if($val->aMyFilter)
            {
                foreach ($val->aMyFilter as $k=>$v)
                {
                    $sCorporation = $v->corporation;
                    $sSite .= $v->site." / "; 
                    $sBoard .= $v->board." / "; 
                }

            }
            $aRtn[$key]->sCorporation = $sCorporation;
            $aRtn[$key]->sSite = $sSite;
            $aRtn[$key]->sBoard = $sBoard;
            $sCorporation = "";
            $sSite = "";
            $sBoard = "";
        }

        return $aRtn;
    }
    private static function setFilterString($aMQList)
    {
        $msgq_model = edu_get_instance('msgq_dao', 'model');
        
        foreach($aMQList as $key=>$val)
        {
            if($val->req_filter)
            {
                $sValue = str_replace('|',',',$val->req_filter, $count);
                $nBindCount = $count + 1;  

                $aMQList[$key]->aMyFilter = $msgq_model->getMyFilter($val->account, $sValue, $nBindCount);
           
            }
            else
                $aMQList[$key]->aMyFilter = "";
        }
        return $aMQList;        
    }
}
