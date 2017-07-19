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
                    'icon'      => ''
                    ,'subtitle' => $obj->name
                    ,'is_use'   => 'y'
                );
            }
        }

        // echo '<pre>aCategoryList: '. print_r( $aCategoryList, true ) .'</pre>';
        // echo '<pre>aCategoryInfo: '. print_r( $aCategoryInfo, true ) .'</pre>';
        // echo '<pre>aMenu: '. print_r( $aMenu , true ) .'</pre>';
        // die();

        $aMenuList = array();
        foreach ($aMenu as $class => $aMenuData) {
            $aMenuList[$class] = $aMenuData;
            
            if($class == 'Category')
            {
                $aMenuList[$class]['sub'] = $aCategoryList;
            }
        }
        // echo '<pre>aMenu: '. print_r( $aMenu, true ) .'</pre>';
        // echo '<pre>aMenuList: '. print_r( $aMenuList, true ) .'</pre>';
        // die();

        return $aMenuList;
    }

}
