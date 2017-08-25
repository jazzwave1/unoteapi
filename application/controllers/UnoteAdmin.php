<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UnoteAdmin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('MSGQClass');
        $this->load->library('IbricksClass');
 
        $this->admin_model = edu_get_instance('admin_model','model');

        $this->aMenu = array(
            array( 
                 'title'       => 'DashBoard'
                ,'title_class' => 'fa fa-dashboard' 
                ,'active'      => true
                ,'child'       => array( 
                     array('link' => HOSTURL.'/UnoteAdmin/UnoteDashboard', 'title' => 'DashBoard')
                )
            )
            ,array( 
                 'title'       => 'IbricksAPI Test'
                ,'title_class' => 'fa fa-list' 
                ,'active'      => false
                ,'child'       => array( 
                    array('link' => HOSTURL.'/UnoteAdmin/ApiTestIbSpellCheck', 'title' => '맞춤법검사')
                   ,array('link' => HOSTURL.'/UnoteAdmin/ApiTestIbBeautifySentence', 'title' => '윤문추천')
                )
            )
        );  
    }
    public function UnoteDashboard()
    {
        $aMenu = $this->_setMenuActive(0);
        $temp = "";
        
        $aContentHeader= array(
             'bTitle' => 'Dashboard'
            ,'sTitle' => '[ Tip : 팁입니다. ]'
            ,'navi'   => array('검색&DashBoard', 'Dashboard')
        );
        
        $aResult = array(
             'sArticleString' => $this->_getArticleCnt()
            ,'sNoteString'    => $this->_getNoteCnt()
            ,'sApiCallString' => $this->_getApiCallCnt()
            
            ,'nAccount'       => $this->_getAccountTotalCnt()
            ,'nNote'          => $this->_getNoteTotalCnt()
            ,'sBSCnt'         => $this->_getBeautifySentenceCnt()
            ,'sServerStatus'  => $this->_getServerStatus()
        );

        $data = array(
             'menu'           => $this->load->view('admin/menu', $aMenu , true)
            ,'content_header' => $this->load->view('admin/content_header', $aContentHeader , true)
            ,'main_content'   => $this->load->view('admin/unote_dashboard', $aResult , true) 
            ,'footer'         => $this->load->view('admin/footer', $temp, true)
        );

        $this->load->view('admin/layout', $data);
        
    }
    public function ApiTestIbSpellCheck()
    {
        $aMenu = $this->_setMenuActive(1);
        $temp = "";
        
        $aContentHeader= array(
             'bTitle' => 'Ibricks API 맞춤법검사'
            ,'sTitle' => '[ Tip : 팁입니다. ]'
            ,'navi'   => array('IbricksAPI', '맞춥범검사')
        );

        $data = array(
             'menu'           => $this->load->view('admin/menu', $aMenu , true)
            ,'content_header' => $this->load->view('admin/content_header', $aContentHeader , true)
            ,'main_content'   => $this->load->view('admin/spellcheck', $temp , true) 
            ,'footer'         => $this->load->view('admin/footer', $temp, true)
        );

        $this->load->view('admin/layout', $data);
    }
    public function ApiTestIbBeautifySentence()
    {
        $aMenu = $this->_setMenuActive(1);
        $temp = "";
        
        $aContentHeader= array(
             'bTitle' => 'Ibricks API 윤문추천'
            ,'sTitle' => '[ Tip : 팁입니다. ]'
            ,'navi'   => array('IbricksAPI', '윤문추천')
        );

        $data = array(
             'menu'           => $this->load->view('admin/menu', $aMenu , true)
            ,'content_header' => $this->load->view('admin/content_header', $aContentHeader , true)
            ,'main_content'   => $this->load->view('admin/beautifysentence', $temp , true) 
            ,'footer'         => $this->load->view('admin/footer', $temp, true)
        );

        $this->load->view('admin/layout', $data);  
    }

    private function _getArticleCnt()
    {
        return $this->admin_model->getArticleCnt();     
    }
    private function _getNoteCnt()
    {
        return $this->admin_model->getNoteCnt();     
    }
    private function _getApiCallCnt()
    {
        return $this->admin_model->getApiCallCnt();     
    }
    private function _getAccountTotalCnt()
    {
        return $this->admin_model->getAccountTotalCnt();     
    }
    private function _getNoteTotalCnt()
    {
        return $this->admin_model->getNoteTotalCnt();     
    }
    private function _getBeautifySentenceCnt()
    {
        return $this->admin_model->getBSTotalCnt();     
    }
    private function _getServerStatus()
    {
        return $this->admin_model->getServerStatus();     
    }



    //////////////////
    // RPC Function //
    //////////////////
    public function RpcIbSpellCheck($sStr='')
    {
        //$sStr = $this->input->post('sStr');
        
        if(!$sStr) 
        {
            response_json(array('code'=>999, 'msg'=>'input param check')); 
            die;
        }
        $sResultJson = IbricksClass::spellCheckFromString($sStr);
        $oResultJson = json_decode($sResultJson);

        response_json(array('code'=>1, 'msg'=>'input param check', 'result'=>(array)$oResultJson)); 
        die;
    }

    private function _setMenuActive($num)
    {
      $aMenu = array('aMenu'=>$this->aMenu);
      
      foreach($this->aMenu as $key=>$val)
      {
        if($key == $num)
          $aMenu['aMenu'][$key]['active'] = true;
        else
          $aMenu['aMenu'][$key]['active'] = false;
      }
      
      return $aMenu;
    }
}
?>
