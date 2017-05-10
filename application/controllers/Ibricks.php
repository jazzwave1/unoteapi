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
            
        echo sendCURLPost("http://localhost/~hojunlee/unoteapi/ibricks/test2",$params); 
    }
    public function test2()
    {
        echo "test";
        print_r($_POST);
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
