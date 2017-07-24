<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ibricks extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
       
        $this->load->library('MSGQClass');
        $this->load->library('IbricksClass');
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
    public function logTest()
    {
        $this->load->library('log/ApilogClass');
        $oApiLog = new ApilogClass();
        $oApiLog->setCallLog(); 
    }

    public function testStatic()
    {
        
        MSGQClass::setMsgQ();

    }

    //public function apiSpellCheck($sIn='')
    public function apiSpellCheck($nIdx='', $sIdx='')
    {
        if(!$nIdx) 
        {
            response_json(array('code'=>999, 'msg'=>'input param check')); 
            die;
        }

        //$sResultJson = IbricksClass::spellCheckFromString($sIn);
        $sResultJson = IbricksClass::spellCheckFromString($nIdx, $sIdx);
        $aResultJson = json_decode($sResultJson);
        
        // test code
        echo "<pre>";
        echo "* Target Server : ". IBRICKS ."<br>"; 
        echo "* Function : spellCheck <br>"; 
        echo "* nIdx : ". $nIdx ."<br>"; 
        echo "* sIdx : ". $sIdx ."<br>"; 
        echo "* Result json String  : ". $sResultJson  . "<br>" ;
        echo "* Result array : ";
        print_r($aResultJson);
        echo "<br>";  
    }
    public function apiCrawMyPost($q_idx, $user_id, $user_pwd, $accessToken="")
    {
        $user_id  = urldecode($user_id);
        $user_pwd = urldecode($user_pwd);
        $sResultJson = IbricksClass::crawlMyPost($q_idx, $user_id, $user_pwd, $accessToken);
        $aResultJson = json_decode($sResultJson);
        
        // test code
        echo "<pre>";
        echo "* Target Server : ". IBRICKS ."<br>"; 
        echo "* Function : crawlMyPost <br>"; 
        echo "* qIdx : ". $q_idx."<br>"; 
        echo "* user : ". $user_id ."<br>"; 
        echo "* pw: ". $user_pwd."<br>"; 
        echo "* accessToken: ". $accessToken."<br>"; 
        echo "* Result json String  : ". $sResultJson  . "<br>" ;
        echo "* Result array : ";
        print_r($aResultJson);
        echo "<br>";  
    }
}
?>
