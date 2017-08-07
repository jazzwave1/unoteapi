<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CategoryClass {
    public function  __construct()
    {
    }
    public static function setCategory($category_idx, $usn, $sCategoryName)
    {
        if(!$category_idx)
        {
            // db eduniety.category insert
            $category_model = edu_get_instance('category_model', 'model');
            return $category_model->setCategory($usn, $sCategoryName);
        }
        else
        {
            // db eduniety.category update
            $category_model = edu_get_instance('category_model', 'model');
            return $category_model->updateCategory($category_idx, $usn, $sCategoryName);
        }
    }

    public static function isCategory($usn, $sCategoryName)
    {
        $category_model = edu_get_instance('category_model', 'model');
        return $category_model->isCategory($usn, $sCategoryName);
    }

    public static function delCategory($category_idx)
    {
        // db eduniety.category delete
        $category_model = edu_get_instance('category_model', 'model');
        if($category_model->deleteCategory($category_idx))
        {
            // db eduniety.text_bank category_idx = null
            $article_model = edu_get_instance('article_model', 'model');
            return $article_model->updateTextbankForCidx($category_idx);
        }
        return false;
    }

    public static function goCategory($category_idx, $t_idx)
    {
        $category_model = edu_get_instance('category_model', 'model');
        return $category_model->goCategory($category_idx, $t_idx);
    }
}
