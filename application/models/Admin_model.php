<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_model
{
    public function __construct()
    {
        $this->admin_dao = edu_get_instance('admin_dao', 'model');
    }

    public function getArticleCnt()
    {
        $aResult = $this->admin_dao->getArticleCnt();    

        return $this->_setArticleCntString($aResult);
    }     
    private function _setArticleCntString($aResult)
    {
        $aTemp = array(
             1 => 0
            ,2 => 0
            ,3 => 0
        );
        $aRtn = array(
             array( 'label'=>'Facebook'   , 'value'=>0) 
            ,array( 'label'=>'Naver Blog' , 'value'=>0) 
            ,array( 'label'=>'Daum Cafe'  , 'value'=>0) 
        );
        if(count($aResult)>1)
        {
            for($i=0 ; $i<count($aResult); $i++)
            {
                switch($aResult[$i]->site_id)
                {
                    case 1:
                        $aTemp[1] += $aResult[$i]->cnt; 
                        break;
                    case 2:
                        $aTemp[2] += $aResult[$i]->cnt; 
                        break;
                    case 3:
                        $aTemp[3] += $aResult[$i]->cnt; 
                        break;
                }
            }
        } 
        //{label: "Facebook", value: 12},
        //{label: "Naver Blog", value: 30},
        //{label: "Daum Cafe", value: 20}

        if(count($aTemp)>=1)
        {
            $aRtn = array(
                 array( 'label'=>'Facebook'   , 'value'=>$aTemp[3]) 
                ,array( 'label'=>'Naver Blog' , 'value'=>$aTemp[1]) 
                ,array( 'label'=>'Daum Cafe'  , 'value'=>$aTemp[2]) 
            );
        }
        
        return json_encode($aRtn);
    }
    public function getNoteCnt()
    {
        $aResult = $this->admin_dao->getNoteCnt();    

        return $this->_setNoteCntString($aResult);
    }
    private function _setNoteCntString($aResult)
    {
        $aTemp = array(); 
        foreach($aResult as $key=>$val)
        {
            $aTemp[] = array('y'=>$val->month, 'item1'=>$val->cnt); 
        }
        return json_encode($aTemp);
    } 
    public function getApiCallCnt()
    {
        $aResult = $this->admin_dao->getApiCallCnt();    
        
        return $this->_setApiCallCntString($aResult);
    }   
    private function _setApiCallCntString($aResult)
    {
        // init
        $aTemp = array(date('Ym-d')=>array());
        
        for($i=0 ; $i<count($aResult) ; $i++)
        {
            array_push($aTemp[$aResult[$i]->day], array('api'=>$aResult[$i]->api , 'cnt'=>$aResult[$i]->cnt));
        }

        // init 
        $aRtn = array();
        $b_cnt = 0;
        $s_cnt = 0;
        
        foreach($aTemp as $key=>$val)
        {
            foreach($val as $k=>$v)
            {
                if($v['api'] == 'beauticheck') $b_cnt = $v['cnt'];
                if($v['api'] == 'spellcheck') $s_cnt = $v['cnt'];
            }
            
            $aRtn[] = array('y'=>$key,'a'=>$b_cnt, 'b'=>$s_cnt); 
        }
        return json_encode($aRtn) ;
    } 
}
