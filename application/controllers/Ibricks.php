<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ibricks extends CI_Controller {

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
        $nIdx = $this->input->post('n_idx');
        $sIdx = $this->input->post('s_idx');

        // test code
        // $nIdx = 26;

        if(!$nIdx) 
        {
            response_json(array('code'=>999, 'msg'=>'input param check')); 
            die;
        }

        //$sResultJson = IbricksClass::spellCheckFromString($sIn);
        $sResultJson = IbricksClass::spellCheckFromString($nIdx, $sIdx);
        $aResultJson = (array) json_decode($sResultJson);

        $addonHtml = $this->load->view('addon/spellChk', $aResultJson, true);

        // editor text
        edu_get_instance('NoteClass');
        $aNoteDetailInfo = NoteClass::getNoteDetailInfo($nIdx);
        $chkText = $aNoteDetailInfo['text'];
        foreach ($aResultJson['data'] as $key => $obj) {
            if(isset($obj->result))
            {
                foreach ($obj->result as $oData) {
                    if($oData->etype != 'no_error')
                    {
                        $chkText = str_replace($oData->input, '<span class="spelChk">'.$oData->input.'</span>', $chkText);
                    }
                }
            }
        }

        $aResult = array(
             "code"  => 1
            ,"msg"   => "OK"
            ,"html" => $addonHtml
            ,"chkText" => $chkText
        );
        response_json($aResult);
        die;

        // test code
        // echo "<pre>";
        // echo "* Target Server : ". IBRICKS ."<br>"; 
        // echo "* Function : spellCheck <br>"; 
        // echo "* nIdx : ". $nIdx ."<br>"; 
        // echo "* sIdx : ". $sIdx ."<br>"; 
        // echo "* Result json String  : ". $sResultJson  . "<br>" ;
        // echo "* Result array : ";
        // print_r($aResultJson);
        // echo "<br>";  
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
    public function apiBeautiCheck($nIdx='', $sIdx='')
    {
        $nIdx = $this->input->post('n_idx');
        $sIdx = $this->input->post('s_idx');

        // test code
        // $nIdx = 26;

        if(!$nIdx) 
        {
            response_json(array('code'=>999, 'msg'=>'input param check')); 
            die;
        }

        //$sResultJson = IbricksClass::spellCheckFromString($sIn);
        // $sResultJson = IbricksClass::beautifySentence($nIdx, $sIdx);
        // $aResultJson = (array) json_decode($sResultJson);
        $data = array();

        $addonHtml = $this->load->view('addon/beautiChk', $data, true);

        $aResult = array(
             "code"  => 1
            ,"msg"   => "OK"
            ,"html" => $addonHtml
        );

        response_json($aResult);
        die;
    }

    public function apiListArticle($nIdx='', $sIdx='')
    {
        $nIdx = $this->input->post('n_idx');
        $sIdx = $this->input->post('s_idx');

        // test code
        // $nIdx = 26;

        if(!$nIdx) 
        {
            response_json(array('code'=>999, 'msg'=>'input param check')); 
            die;
        }

        //$sResultJson = IbricksClass::spellCheckFromString($sIn);
        // $sResultJson = IbricksClass::beautifySentence($nIdx, $sIdx);
        // $aResultJson = (array) json_decode($sResultJson);
        $data = array();

        $addonHtml = $this->load->view('addon/listArticle', $data, true);

        $aResult = array(
             "code"  => 1
            ,"msg"   => "OK"
            ,"html" => $addonHtml
        );

        response_json($aResult);
        die;
    }
}
?>
