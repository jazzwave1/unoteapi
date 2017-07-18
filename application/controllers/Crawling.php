<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Crawling extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        // $this->account_model = edu_get_instance('account_model', 'model'); 
    }

    public function index()
    {
        $this->History();
    }
    
    public function History()
    {
        // test code
        $account = $this->_getAccount();

//      edu_get_instance('MSGQClass');
//      $aList = MSGQClass::getMsgQList($account); 

        $oCrawlingClass = edu_get_instance('CrawlingClass');
        $aList = $oCrawlingClass->getCrawling($account);
        
        echo "<!--";
        //print_r($aList);
        echo "-->";
        
        $data = array(
             'vdata' => $aList
            ,'contents' => 'crawling/clist'
        );

        $this->load->view('common/container', $data);

    }

    private function _getAccount()
    {
        // return usn
        return "1";
    }
}
