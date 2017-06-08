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
                 'title'       => '검색 & DashBoard'
                ,'title_class' => 'fa fa-search' 
                ,'active'      => true
                ,'child'       => array( 
                     array('link' => HOSTURL.'/unoteadmin/UnoteDashboard', 'title' => 'DashBoard')
                    ,array('link' => HOSTURL.'/unoteadmin/userlist', 'title' => '프로그램별 검색')
                )
            )
            ,array( 
                 'title'       => 'IbricksAPI'
                ,'title_class' => 'fa fa-list' 
                ,'active'      => false
                ,'child'       => array( 
                    array('link' => HOSTURL.'/unoteadmin/ApiTestIbSpellCheck', 'title' => '맞춤법검사')
                   ,array('link' => HOSTURL.'/unoteadmin/ApiTestIbBeautifySentence', 'title' => '윤문추천')
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

        $data = array(
             'menu'           => $this->load->view('admin/menu', $aMenu , true)
            ,'content_header' => $this->load->view('admin/content_header', $aContentHeader , true)
            ,'main_content'   => $this->load->view('admin/unote_dashboard', $temp , true) 
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
