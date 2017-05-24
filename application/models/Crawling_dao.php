<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'models/Common_dao.php');

class Crawling_dao extends Common_dao
{
    public function __construct()
    {
        $this->db = $this->load->database('dev_aws', TRUE);
        $aQueryInfo = edu_get_config('query', 'query');
        $this->queryInfoCrawling = $aQueryInfo['crawling'];
    }

    public function getCrawlingInfo($aParam=array())
    {
        $aConfig = $this->queryInfoCrawling['getCrawlingInfo'];
        return $this->actModelFuc($aConfig, $aParam);
    }

}
