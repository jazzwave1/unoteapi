<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'models/Common_dao.php');

class Category_dao extends Common_dao
{
    public function __construct()
    {
        $this->db = $this->load->database('dev_aws', TRUE);
        $aQueryInfo = edu_get_config('query', 'query');
        $this->queryInfoCategory = $aQueryInfo['category'];
    }

    public function getCategoryInfo($aParam=array())
    {
        $aConfig = $this->queryInfoCategory['getCategoryInfo'];
        return $this->actModelFuc($aConfig, $aParam);
    }
    public function getCategoryCnt($aParam=array())
    {
        $aConfig = $this->queryInfoCategory['getCategoryCnt'];
        return $this->actModelFuc($aConfig, $aParam);
    }

    public function isCategory($aParam=array())
    {
        $aConfig = $this->queryInfoCategory['isCategory'];
        return $this->actModelFuc($aConfig, $aParam);
    }

    public function setCategory($aParam=array())
    {
        $aConfig = $this->queryInfoCategory['setCategory'];
        return $this->actModelFuc($aConfig, $aParam);
    }

    public function updateCategory($aParam=array())
    {
        $aConfig = $this->queryInfoCategory['updateCategory'];
        return $this->actModelFuc($aConfig, $aParam);
    }

    public function deleteCategory($aParam=array())
    {
        $aConfig = $this->queryInfoCategory['deleteCategory'];
        return $this->actModelFuc($aConfig, $aParam);
    }
    public function goCategory($aParam=array())
    {
        $aConfig = $this->queryInfoCategory['goCategory'];
        return $this->actModelFuc($aConfig, $aParam);
    }
    public function cancleCategory($aParam=array())
    {
        $aConfig = $this->queryInfoCategory['cancleCategory'];
        return $this->actModelFuc($aConfig, $aParam);
    }
}
