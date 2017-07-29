<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MenuClass {
    public function  __construct()
    {
    }
    public static function getMenuList($usn)
    {
        if(!$usn) return false;

        // 공통메뉴 config 파일에서 가져오기
        $aMenu = edu_get_config('menu','menu');

        // 개인메뉴 db eduniety.category 에서 가져오기
        $oCategoryModel = edu_get_instance('category_model', 'model');
        $aCategoryInfo = $oCategoryModel->category_model->getCategoryInfo($usn);

        $aCategoryList = array();

        if(is_array($aCategoryInfo) && count($aCategoryInfo)>0 )
        {
            foreach ($aCategoryInfo as $obj)
            {
                $aCategoryList[$obj->category_idx] = array(
                    'icon'      => 'fa fa-folder-open'
                    ,'subtitle' => $obj->name
                    ,'is_use'   => 'y'
                );
            }
        }

        $aMenuList = array();
        foreach ($aMenu as $class => $aMenuData) {
            $aMenuList[$class] = $aMenuData;
            
            if($class == 'Category')
            {
                $aMenuList[$class]['sub'] = $aCategoryList;
            }
        }

        edu_get_instance('ArticleClass');
        $unread_cnt = ArticleClass::getUnreadArticleCnt($usn);
        $aMenuList['Article']['sub']['List']['unread_cnt'] = $unread_cnt;

        return $aMenuList;
    }

}
