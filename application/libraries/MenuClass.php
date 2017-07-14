<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MenuClass {
    public function  __construct()
    {
    }
    public static function getMenuList($usn)
    {
        if(!$usn) return false;

        $ci =& get_instance();

        // 공통메뉴 config 파일에서 가져오기
        $aMenu = $ci->config->item('menu');

        // 개인메뉴 db eduniety.category 에서 가져오기
        $oCategoryModel = edu_get_instance('category_model', 'model');
        $aCategoryInfo = $oCategoryModel->category_model->getCategoryInfo($usn);

        $aCategoryList = array();
        foreach ($aCategoryInfo as $obj) {
            $aCategoryList[] = array(
                 'url'      => 'Textbank/'.$obj->category_idx
                ,'s_icon'   => ''
                ,'s_name'   => $obj->name
                ,'is_use'   => 'y'
            );
        }

        // echo '<pre>aCategoryList: '. print_r( $aCategoryList, true ) .'</pre>';
        // echo '<pre>aCategoryInfo: '. print_r( $aCategoryInfo, true ) .'</pre>';
        // echo '<pre>aMenu: '. print_r( $aMenu, true ) .'</pre>';
        // die();

        $aMenuList = array();
        foreach ($aMenu as $key => $aMenuData) {
            $aMenuList[] = $aMenuData;
            
            if($aMenuData['title']['class'] == 'category')
            {
                $aMenuList[$key]['sub'] = $aCategoryList;
            }
        }
        // echo '<pre>aMenu: '. print_r( $aMenu, true ) .'</pre>';
        // echo '<pre>aMenuList: '. print_r( $aMenuList, true ) .'</pre>';
        // die();

        return $aMenuList;
    }

}
