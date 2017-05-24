<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CrawlingClass {

    public function  __construct()
    {
    }

    public function getCrawling($usn)
    {
        $oCraModel = edu_get_instance('crawling_model', 'model');
        $aCraInfo = $oCraModel->crawling_model->getCrawlingInfo($usn);

        return $aCraInfo;
    }

}
