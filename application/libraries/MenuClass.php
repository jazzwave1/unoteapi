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

            foreach ($aMenuList[$class]['sub'] as $method => $aSubmenu) {
                if($class != 'Crawling')
                {
                    $aMenuList[$class]['sub'][$method]['total_cnt'] = self::_getMenuCount($usn, $class, $method);
                }
            }
        }
        
        // echo '<pre>aMenuList: '. print_r( $aMenuList, true ) .'</pre>';
        // die();

        edu_get_instance('ArticleClass');
        $unread_cnt = ArticleClass::getUnreadArticleCnt($usn);
        $aMenuList['Article']['sub']['List']['unread_cnt'] = $unread_cnt;


        return $aMenuList;
    }

    public static function _getMenuCount($usn, $class, $method)
    {
        $total_cnt = 0;
        $menu = $class.'/'.$method;

        edu_get_instance('NoteClass');
        edu_get_instance('ArticleClass');
        edu_get_instance('CategoryClass');

        if($menu == 'Note/List')
            $total_cnt = NoteClass::getNoteCnt($usn);
        else if($menu == 'Article/List')
            $total_cnt = ArticleClass::getArticleCnt($usn);
        else if($menu == 'Article/Bookmark')
            $total_cnt = ArticleClass::getArticleBookmarkCnt($usn);
        else if($menu == 'Article/Trash')
            $total_cnt = ArticleClass::getArticleTrashCnt($usn);
        else if($class == 'Category')
            $total_cnt = CategoryClass::getCategoryCnt($usn, $method);

        return $total_cnt;
    }

}
