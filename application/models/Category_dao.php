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

}
