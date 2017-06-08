<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'models/Common_dao.php');

class Admin_dao extends Common_dao
{
    public function __construct()
    {
        // 8층에서 ACL 이 막혀 있습니다. ㅠ ㅠ 보안 정책상 접근을 제한 해 두었습니다. 
        $this->aws_db   = $this->load->database('dev_aws', true);
        //$aQueryInfo = edu_get_config('query', 'query');
        //$this->queryInfoAdmin = $aQueryInfo['admin'];
    }
    
    public function getAws($aParam)
    {
        $aConfig = $this->queryInfoAdmin['getAws'];
        print_r( $this->actModelFucFromDB($aConfig, $aParam, $this->aws_db) ) ;
        //return $this->actModelFucFromDB($aConfig, $aParam, $this->aws_db) ;
    }
}
