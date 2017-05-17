<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ibricks extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
       
    }
    public function test()
    {
        $params = array(
            "name" => "Lee Ho Jun",
            "age" => "39",
            "location" => "Seoul"
        );

        $this->load->library('ErrorlogClass');
        $oErrorLog = new ErrorlogClass(); 
        $oErrorLog->setDebugLog($params); 

        //echo sendCURLPost("http://localhost/~hojunlee/unoteapi/ibricks/test2",$params); 
    }
    public function test2()
    {
        echo "test";
        print_r($_POST);
    }
    public function sendReportTest()
    {
        echo "Send Mail Test<br>"; 

        $this->load->library('ReportClass');
        $oReport = new ReportClass(); 
        
        $type = 'default'; 
        $to = "GIC@eduniety.net";
        $subject = "[Eduniety Report] 테스트 메일입니다.";
        $aMassageInfo = array(
            'msg'=> '이 메일은 테스트를 위해 발송합니다.'
        );

        echo "<pre>";
        print_r($type);
        echo "<br>"; 
        print_r($to); 
        echo "<br>"; 
        print_r($subject);
        echo "<br>"; 
        print_r($aMassageInfo);
        
        $oReport->sendMailReport($to, $subject, $aMassageInfo, $type); 
    } 
    public function logTest()
    {
        $this->load->library('ApilogClass');
        $oApiLog = new ApilogClass();
        $oApiLog->setCallLog(); 
    }

    ////////////////////////////
    ///////// 수집 API /////////
    ////////////////////////////
    public function getMyCafeList($account_id, $siteid, $user_id, $user_pwd)
    {
        $sURL = IBRICKS."/getMyCafeList"; 

        $params = array(
             "uid"    => $account_id 
            ,"siteid" => $siteid
            ,"user"   => $user_id
            ,"pw"     => $user_pwd
        );

        // result 결과를 처리 하는 부분은 추가적으로 확인 해야 함
        echo sendCURLPost($sURL, $params); 
    } 
    public function crawlMyPost($account_id, $siteid, $user_id, $user_pwd)
    {
        $sURL = IBRICKS."/crawlMyPost"; 

        $params = array(
             "uid"    => $account_id 
            ,"siteid" => $siteid
            ,"user"   => $user_id
            ,"pw"     => $user_pwd
        );

        // result 결과를 처리 하는 부분은 추가적으로 확인 해야 함
        echo sendCURLPost($sURL, $params); 
    } 

    //////////////////////////////
    ///////// 맞춤법 API /////////
    //////////////////////////////
    public function spellCheckFromString($sSting)
    {
        $sURL = IBRICKS."/spellCheck"; 

        $params = array(
             "in" => $sSting
        );

        // result 결과를 처리 하는 부분은 추가적으로 확인 해야 함
        echo sendCURLPost($sURL, $params); 
    } 
    public function spellCheckFromDoc($sDocID)
    {
        $sURL = IBRICKS."/spellCheck"; 

        $params = array(
             "docID" => $sDocID
        );

        // result 결과를 처리 하는 부분은 추가적으로 확인 해야 함
        echo sendCURLPost($sURL, $params); 
    } 

    ////////////////////////////
    ///////// 윤문 API /////////
    ////////////////////////////
    public function beautifySentence($sSting)
    {
        $sURL = IBRICKS."/beautifySentence"; 

        $params = array(
             "in" => $sSting
        );

        // result 결과를 처리 하는 부분은 추가적으로 확인 해야 함
        echo sendCURLPost($sURL, $params); 
    } 
    public function beautifyDoc($sDocID)
    {
        $sURL = IBRICKS."/beautifyDoc"; 

        $params = array(
             "docID" => $sDocID
        );

        // result 결과를 처리 하는 부분은 추가적으로 확인 해야 함
        echo sendCURLPost($sURL, $params); 
    } 

}
?>
