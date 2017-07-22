<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CrawlingClass {

    public function  __construct()
    {
        $this->aSiteConfig = array(
             '1'=>'네이버'
            ,'2'=>'다음'
            ,'3'=>'페이스북'
        );
    }

    public function getCrawling($usn)
    {
        edu_get_instance('MSGQClass');
        $aList = MSGQClass::getMsgQList($usn); 
        
        foreach($aList as $key=>$val)
        {
            $val->site_name = $this->aSiteConfig[$val->site_id];
            if(!$val->sSite) $val->sSite = '전체';
            if(!$val->sBoard) $val->sBoard = '전체';
        }
        
        return $aList;
    }
    public function callCrawling($usn, $siteid, $aReqFilter, $user_id, $user_pwd)
    {
        // set MSGQ
        $oCrawlingClass = edu_get_instance('MSGQClass');
        $q_idx = MSGQClass::setMsgQ($usn, $siteid, $aReqFilter); 

        if(!$q_idx) 
            return '2';
         
        // call Ibritcks API
        $bCallAPI = true;
        switch($siteid)
        {
            // naver
            case 1 :
                $bCallAPI = $this->_crawlingNaver($usn, $siteid, $aReqFilter, $user_id, $user_pwd); 
                break;
            // daum
            case 2 :
                $bCallAPI = $this->_crawlingDaum($usn, $siteid, $aReqFilter, $user_id, $user_pwd); 
                break;
            // facebook            
            case 3 :
                $bCallAPI = $this->_crawlingFacebook($usn, $siteid, $aReqFilter, $user_id, $user_pwd); 
                break;
            default :
                break;
        }

        if(!$bCallAPI)
        {
            // MSGQ 의 해당 내용을 IB 실패로 업데이트 함 
            $this->_setUpdateMsgQ($usn, $q_idx, "FAIL");
        }
        return '1';
    }
    private function _setUpdateMsgQ($usn, $q_idx , $state)
    {
        // set MSGQ
        $oCrawlingClass = edu_get_instance('MSGQClass');
        MSGQClass::updateMsgQ($usn, $q_idx , $state); 
        return;
    }
    private function _crawlingNaver($usn, $siteid, $aReqFilter, $user_id, $user_pwd)
    {
        return ; 
    }
    private function _crawlingDaum($usn, $siteid, $aReqFilter, $user_id, $user_pwd)
    {
        return ; 
    }
    private function _crawlingFacebook($usn, $siteid, $aReqFilter, $user_id, $user_pwd)
    {
        return ; 
    
    }
}
