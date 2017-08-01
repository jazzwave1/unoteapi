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
        // $nIdx = 26;

        if(!$nIdx) 
        {
            response_json(array('code'=>999, 'msg'=>'input param check')); 
            die;
        }

        //$sResultJson = IbricksClass::spellCheckFromString($sIn);
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

        $aResultJson = $aRtn;
         
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
        $nIdx = 26;

        if(!$nIdx) 
        {
            response_json(array('code'=>999, 'msg'=>'input param check')); 
            die;
        }


        $sResultJson = IbricksClass::beautifySentence($nIdx, $sIdx);
//        echo $sResultJson;
        $aResultJson = (array) json_decode($sResultJson);

        // no_error & null array unset 

//        print_r($aResultJson['data']);

        foreach($aResultJson['data'] as $key=>$val)
        {
//            echo $key." | "."strlen : ". strlen($val->input). "<br>"; 
            if(strlen((string)strip_tags( $val->input )) >= 1)
            {  
                if(!trim($val->input))
                    unset($aResultJson['data'][$key]);
            }
            else
                unset($aResultJson['data'][$key]);
        }

        $aRtn = array(); 
        $aRtn['result'] = $aResultJson['result'];

        foreach($aResultJson['data'] as $key=>$val)
        {
            $aRtn['data'][] = $val;
        }


        // dummy 추가함  ------------------------------- //
        foreach($aRtn['data'] as $key=>$val)
        {
        //    print_r( $val->output );
            $val->output[] = "테스트를 위한 라인입니다. 1";
            $val->output[] = "테스트를 위한 라인입니다. 2";
            $val->output[] = "테스트를 위한 라인입니다. 3";
        }
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
        $usn = $this->_getUsn();
        $sType = $this->input->post('sType');
        $category_idx = $this->input->post('category_idx');

        //test code
        // $sType = 'category';
        // $category_idx = '3';

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

    // test code
    private function _getUsn()
    {
        return 1;
    }
}
?>
