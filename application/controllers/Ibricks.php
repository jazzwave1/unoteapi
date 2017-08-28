<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ibricks extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
       
        $this->load->library('MSGQClass');
        $this->load->library('IbricksClass');
        $this->load->library('log/ApilogClass');

        ////////////////////////////////////
        // chk Login Info
        // true : get MembeInfo
        // false : loaction login page
        $this->oMemberInfo = chkLoginInfo();
        //////////////////////////////////// 
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
    public function testspell()
    {
        $nIdx = 8; 
        $sIdx = 0; 
        $sResultJson = IbricksClass::spellCheckFromString($nIdx, $sIdx);
        $aResultJson = (array) json_decode($sResultJson);
    
        $aTemp = array();
        // no_error & null array unset 
        foreach($aResultJson['data'] as $key=>$val)
        {
            if(count((array)$val) >= 1)
            {
                foreach($val->result as $k => $v)
                {
                    if($v->etype == 'no_error')  
                        unset($val->result[$k]);
                }
                if(!$val->sentence)
                    unset($aResultJson['data'][$key]);
            }
            else
                unset($aResultJson['data'][$key]);
                
        }
        
        foreach($aResultJson['data'] as $key=>$val)
        {
            $aTemp[] = $val->sentence;     
        }

        $aRtn = array();
        $aRtn['result'] = $aResultJson['result']; 
        
        $aTemp2 = array_unique($aTemp);
        foreach($aTemp2 as $val)
        {
            $aTemp3[] = $val;
        }
        
        for($i=0 ; $i<count($aTemp3) ; $i++ )
        {
            foreach($aResultJson['data'] as $key=>$val)
            {
                if($aTemp3[$i] == $val->sentence)
                {
                    //echo $val->sentence. "<br>";
                    $aRtn['data'][] = $val;
                    break;
                }
            }
        }         
        
        echo "<pre>";   
        $aResultJson = $aRtn;
        print_r($aResultJson);           
        die;
    }
    private function chk1()
    {
    
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
        // $nIdx = 76;


        // set api call log --------------------//
        $usn      = $this->oMemberInfo->usn;
        $sApiName = 'spellcheck';
        $aInput   = json_encode(array($_POST));
        $c_code   = 'Ibricks';
        $regdate  = date('Y-m-d H:i:s');  
        //--------------------------------------//

        if(!$nIdx) 
        {
            response_json(array('code'=>999, 'msg'=>'input param check')); 

            $sOutput = json_encode(array('code'=>999, 'msg'=>'input param check'));
            ApilogClass::setApiLog($usn, $sApiName, $aInput, $sOutput, $c_code, $regdate);
            die;
        }

        //$sResultJson = IbricksClass::spellCheckFromString($sIn);
        $sResultJson = IbricksClass::spellCheckFromString($nIdx, $sIdx);
        $aResultJson = (array) json_decode($sResultJson);
        
        $sOutput = $sResultJson;
        ApilogClass::setApiLog($usn, $sApiName, $aInput, $sOutput, $c_code, $regdate);

        $aTemp = array();
        $aTemp2 = array();
        $aTemp3 = array();
        // no_error & null array unset 
        foreach($aResultJson['data'] as $key=>$val)
        {
            if(count((array)$val) >= 1)
            {
                foreach($val->result as $k => $v)
                {
                    if($v->etype == 'no_error')  
                        unset($val->result[$k]);
                }
                if(!$val->sentence)
                    unset($aResultJson['data'][$key]);
            }
            else
                unset($aResultJson['data'][$key]);
        }

        foreach($aResultJson['data'] as $key=>$val)
        {
            $aTemp[] = $val->sentence;     
        }

        $aRtn = array();
        $aRtn['result'] = $aResultJson['result']; 
        $aRtn['data'] = array(); 

        $aTemp2 = array_unique($aTemp);
        foreach($aTemp2 as $val)
        {
            $aTemp3[] = $val;
        }

        for($i=0 ; $i<count($aTemp3) ; $i++ )
        {
            foreach($aResultJson['data'] as $key=>$val)
            {
                if($aTemp3[$i] == $val->sentence)
                {
                    //echo $val->sentence. "<br>";
                    $aRtn['data'][] = $val;
                    break;
                }
            }
        }

        foreach($aRtn['data'] as $key=>$obj)
        {
            if(count($obj->result)<1)
            {
                unset($aRtn['data'][$key]);
            }
        }

        $aResultJson = $aRtn;
        $addonHtml = $this->load->view('addon/spellChk', $aResultJson, true);

        // editor text
        edu_get_instance('NoteClass');
        $aNoteDetailInfo = NoteClass::getNoteDetailInfo($nIdx);
        $chkText = $aNoteDetailInfo['text'];

        $script = '<style>.underlineChk{text-decoration: underline; text-decoration-color:red;color:red;}.highlightChk{background:red; color:#fff;}</style>';

        foreach ($aResultJson['data'] as $key => $obj) {
            foreach ($obj->result as $oData) {
                $chkText = str_replace($oData->input, '<span class="underlineChk">'.$oData->input.'</span>', $chkText);
            }
        }

        // test code
        // echo '<pre>$aResultJson: '. print_r( $aResultJson, true ) .'</pre>';
        // echo '<pre>$chkText: '. print_r( $chkText, true ) .'</pre>';
        // die();

        $aResult = array(
             "code"  => 1
            ,"msg"   => "OK"
            ,"html" => $addonHtml
            ,"chkText" => $script.$chkText
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
        //$nIdx = 26;
        
        // set api call log --------------------//
        $usn      = $this->oMemberInfo->usn;
        $sApiName = 'beauticheck';
        $aInput   = json_encode(array($_POST));
        $c_code   = 'Ibricks';
        $regdate  = date('Y-m-d H:i:s');  
        //--------------------------------------//


        if(!$nIdx) 
        {
            response_json(array('code'=>999, 'msg'=>'input param check')); 
            $sOutput = json_encode(array('code'=>999, 'msg'=>'input param check'));
            ApilogClass::setApiLog($usn, $sApiName, $aInput, $sOutput, $c_code, $regdate);
            die;
        }


        $sResultJson = IbricksClass::beautifySentence($nIdx, $sIdx);
        $aResultJson = (array) json_decode($sResultJson);
//        echo $sResultJson;
        
        $sOutput = $sResultJson;
        ApilogClass::setApiLog($usn, $sApiName, $aInput, $sOutput, $c_code, $regdate);

        // no_error & null array unset 

//        print_r($aResultJson['data']);
        
        foreach($aResultJson['data'] as $key=>$val)
        {
//            echo $key." | "."strlen : ". strlen($val->input). "<br>"; 
            if(strlen((string)strip_tags( $val->sentence)) >= 1)
            {  
                if(count($val->result) == 0)
                    unset($aResultJson['data'][$key]);
            }
            else
                unset($aResultJson['data'][$key]);
        }

        $aRtn = array(); 

        $cnt = 0; 
        foreach($aResultJson['data'] as $key=>$val)
        {
            $aRtn['data'][$cnt]['sentence'] = $val->sentence;
            $aRtn['data'][$cnt]['output'] = $val->result[0]->output; 
            $cnt++;
        }


        // dummy 추가함  ------------------------------- //
        // if($aRtn)
        // {
        //     foreach($aRtn['data'] as $key=>$val)
        //     {
        //         $aRtn['data'][$key]['output'][] = "임시 테스트 라인을 추가합니다.";
        //     }
        // } 
        // dummy 추가함  ------------------------------- //

        $data = array(
            'aBeauti' => $aRtn       
        );

        $addonHtml = $this->load->view('addon/beautiChk', $data, true);
   
        $aResult = array(
             "code"  => 1
            ,"msg"   => "OK"
            ,"html" => $addonHtml
        );
 
        response_json($aResult);
        die;
    }

    public function apiListArticle($sType='', $category_idx='')
    {
        $usn = $this->oMemberInfo->usn;
        $sType = $this->input->post('sType');
        $category_idx = $this->input->post('category_idx');

        //test code
        // $sType = 'list';
        // $category_idx = '25';

        if(!$usn) 
        {
            response_json(array('code'=>999, 'msg'=>'input param check')); 
            die;
        }

        $aArticle = array();
        edu_get_instance('MenuClass');
        edu_get_instance('ArticleClass');
        $aMenuList = MenuClass::getMenuList($usn);

        if($sType == 'list')
        {
            $aArticle['menu'] = $aMenuList['Article']['sub']['List'];
            $aArticle['list'] = ArticleClass::getArticleInfo($usn);
        }
        else if($sType == 'bookmark')
        {
            $aArticle['menu'] = $aMenuList['Article']['sub']['Bookmark'];
            $aArticle['list'] = ArticleClass::getArticleBookmarkInfo($usn);
        }
        else if($sType == 'category')
        {
            $aArticle['menu'] = $aMenuList['Category']['sub'][$category_idx];
            $aArticle['list'] = ArticleClass::getArticleCategoryInfo($usn, $category_idx);
        }

        if( is_array($aArticle['list']) && count($aArticle['list'])>0 )
        {
            foreach ($aArticle['list'] as $key => $obj) {
                if( isset($obj->craw_data->contents) )
                {
                    $aArticle['list'][$key]->craw_data->contents = nl2br($obj->craw_data->contents);
                    $aArticle['list'][$key]->craw_data->contents = replaceArticleHTML($obj->craw_data->contents);
                }
            }
        }

        $aArticle['menu']['type'] = $sType;
        $aArticle['category'] = $aMenuList['Category']['sub'];
        
        $aArticle['list_cnt'] = 0;
        if(is_array($aArticle['list']))
        {
            $aArticle['list_cnt'] = count($aArticle['list']);
        }

        //$sResultJson = IbricksClass::spellCheckFromString($sIn);
        // $sResultJson = IbricksClass::beautifySentence($nIdx, $sIdx);
        // $aResultJson = (array) json_decode($sResultJson);

        $addonHtml = $this->load->view('addon/listArticle', $aArticle, true);

        $aResult = array(
             "code"  => 1
            ,"msg"   => "OK"
            ,"html" => $addonHtml
        );

        // echo '<pre>: '. print_r( $aResult, true ) .'</pre>';
        // die();

        response_json($aResult);
        die;
    }
}
?>
