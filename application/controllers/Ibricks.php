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
        $this->load->library('ApilogClass');
        $oApiLog = new ApilogClass();
        $oApiLog->setCallLog(); 
    }

    public function testStatic()
    {
        
        MSGQClass::setMsgQ();

    }

    public function apiSpellCheck($sIn='')
    {
        if(!$sIn) 
        {
            response_json(array('code'=>999, 'msg'=>'input param check')); 
            die;
        }

        $sResultJson = IbricksClass::spellCheckFromString($sIn);
        $aResultJson = json_decode($sResultJson);
        
        // test code
        echo "<pre>";
        echo "* Target Server : ". IBRICKS ."<br>"; 
        echo "* Function : spellCheck <br>"; 
        echo "* sIn : ". $sIn ."<br>"; 
        echo "* Result json String  : ". $sResultJson  . "<br>" ;
        echo "* Result array : ";
        print_r($aResultJson);
        echo "<br>";  
    }
}
?>
