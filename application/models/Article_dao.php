<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'models/Common_dao.php');

class Article_dao extends Common_dao
{
    public function __construct()
    {
        $this->db = $this->load->database('dev_aws', TRUE);
        $aQueryInfo = edu_get_config('query', 'query');
        $this->queryInfoArticle = $aQueryInfo['article'];
    }

    public function updateTextbankForCidx($aParam=array())
    {
        $aConfig = $this->queryInfoArticle['updateTextbankForCidx'];
        return $this->actModelFuc($aConfig, $aParam);
    }

}
