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
    public function callCrawling($usn, $siteid, $aReqFilter)
    {
        // set MSGQ
        $oCrawlingClass = edu_get_instance('MSGQClass');
        $q_idx = MSGQClass::setMsgQ($usn, $siteid, $aReqFilter); 

        if(!$q_idx) 
            return '2';
         
        // call Ibritcks API
        
        return '1';
    }
}
