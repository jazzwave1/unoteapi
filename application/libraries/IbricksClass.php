<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class IbricksClass {

    public function  __construct()
    {
    }
    
    ////////////////////////////
    ///////// 수집 API /////////
    ////////////////////////////
    public static function getMyCafeList($account_id, $siteid, $user_id, $user_pwd)
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
    public static function crawlMyPost($q_idx, $user_id, $user_pwd, $accessToken)
    {
        $sURL = IBRICKS."/crawlMyPost"; 

        $params = array(
             "qIdx" => $q_idx
            ,"user" => $user_id
            ,"pw"   => $user_pwd
            ,"accessToken" => $accessToken
        );

       //echo "<pre>";
       //print_r($params);
       //die;

        // result 결과를 처리 하는 부분은 추가적으로 확인 해야 함
        echo sendCURLPost($sURL, $params); 
    } 

    //////////////////////////////
    ///////// 맞춤법 API /////////
    //////////////////////////////
    //public static function spellCheckFromString($sStr)
    public static function spellCheckFromString($nIdx, $sIdx)
    {
        $sURL = IBRICKS."/spellCheck"; 

        $params = array(
              "nIdx" => $nIdx
             ,"sIdx" => $sIdx
        );

        // result 결과를 처리 하는 부분은 추가적으로 확인 해야 함
        return sendCURLGet($sURL, $params); 
    } 
    public static function spellCheckFromDoc($sDocID)
    {
        $sURL = IBRICKS."/spellCheck"; 

        $params = array(
             "docID" => $sDocID
        );

        // result 결과를 처리 하는 부분은 추가적으로 확인 해야 함
        return sendCURLGet($sURL, $params); 
    } 

    ////////////////////////////
    ///////// 윤문 API /////////
    ////////////////////////////
    public static function beautifySentence($sSting)
    {
        $sURL = IBRICKS."/beautifySentence"; 

        $params = array(
             "in" => $sSting
        );

        // result 결과를 처리 하는 부분은 추가적으로 확인 해야 함
        echo sendCURLPost($sURL, $params); 
    } 
    public static function beautifyDoc($sDocID)
    {
        $sURL = IBRICKS."/beautifyDoc"; 

        $params = array(
             "docID" => $sDocID
        );

        // result 결과를 처리 하는 부분은 추가적으로 확인 해야 함
        echo sendCURLPost($sURL, $params); 
    }
}
