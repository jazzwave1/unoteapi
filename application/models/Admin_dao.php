<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'models/Common_dao.php');

class Admin_dao extends Common_dao
{
    public function __construct()
    {
        $this->db = $this->load->database('dev_aws', TRUE);
        $aQueryInfo = edu_get_config('query', 'query');
        $this->queryInfoAdmin = $aQueryInfo['admin'];
    }
    
    public function getAccountTotalCnt()
    {
        $aInput = array('usn' => 1);
        $aConfig = $this->queryInfoAdmin['getAccountTotalCnt'];

        return $this->actModelFuc($aConfig, $aInput);
    }
    
    public function getArticleCnt()
    {
        $aInput = array('site_id' => 1);
        $aConfig = $this->queryInfoAdmin['getArticleCnt'];

        return $this->actModelFuc($aConfig, $aInput);
    }
    public function getNoteCnt()
    {
        $aInput = array('n_idx' => 1);
        $aConfig = $this->queryInfoAdmin['getNoteCnt'];

        return $this->actModelFuc($aConfig, $aInput);
    }
    public function getApiCallCnt()
    {
        $aInput = array('usn' => 1);
        $aConfig = $this->queryInfoAdmin['getApiCallCnt'];

        return $this->actModelFuc($aConfig, $aInput);
    }
    public function getNoteTotalCnt()
    {
        $aInput = array('n_idx' => 1);
        $aConfig = $this->queryInfoAdmin['getNoteTotalCnt'];

        return $this->actModelFuc($aConfig, $aInput);
    }
}
