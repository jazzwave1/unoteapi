<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CrawlingClass {

    public function  __construct()
    {
    }

    public function getCrawling($usn)
    {
        edu_get_instance('MSGQClass');
        $aList = MSGQClass::getMsgQList($usn); 
        
        return $aList;
    }

}
