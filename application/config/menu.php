<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
	'menu' => array(
		 0 => array(
			 'title' =>	array(
			 	 'class' => 'mynote'
			 	,'t_name' => '내 노트'
			)
			,'sub' => array(
				0 => array(
					 'url' => 'Mynote'
					,'s_icon' => 'fa-book'
					,'s_name' => '내 노트'
					,'is_use' => 'y'
				)
			)
		)
		,1 => array(
			 'title' =>	array(
			 	 'class' => 'article'
			 	,'t_name' => '글감 관리'
			)
			,'sub' => array(
				 0 => array(
					 'url' => 'Article/List'
					,'s_icon' => 'fa-list'
					,'s_name' => '글감 리스트'
					,'is_use' => 'y'
				)
				,1 => array(
					 'url' => 'Article/Bookmark'
					,'s_icon' => 'fa-bookmark'
					,'s_name' => '북마크'
					,'is_use' => 'y'
				)
				,2 => array(
					 'url' => 'Article/Trash'
					,'s_icon' => 'fa-trash-o'
					,'s_name' => '휴지통'
					,'is_use' => 'y'
				)
			)
		)
		,2 => array(
			 'title' =>	array(
			 	 'class' => 'category'
			 	,'t_name' => '글감 카테고리'
			)
			,'sub' => array(
			)
		)
		,3 => array(
			 'title' =>	array(
			 	 'class' => 'crawling'
			 	,'t_name' => '글감 수집'
			)
			,'sub' => array(
				 0 => array(
					 'url' => 'Article/History'
					,'s_icon' => 'fa-history'
					,'s_name' => '글감 수집 히스토리'
					,'is_use' => 'y'
				)
			)
		)
	)
);