<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
$config['menu'] = array(
	'Mynote' => array(
		 'title' => '내 노트'
		,'sub' => array(
			'index' => array(
				 's_icon' => 'fa-book'
				,'s_name' => '내 노트'
				,'is_use' => 'y'
			)
		)
	)
	,'Article' => array(
		 'title' => '글감 관리'
		,'sub' => array(
			'List' => array(
				 's_icon' => 'fa-list'
				,'s_name' => '글감 리스트'
				,'is_use' => 'y'
			)
			,'Bookmark' => array(
				 's_icon' => 'fa-bookmark'
				,'s_name' => '북마크'
				,'is_use' => 'y'
			)
			,'Trash' => array(
				 's_icon' => 'fa-trash-o'
				,'s_name' => '휴지통'
				,'is_use' => 'y'
			)
		)
	)
	,'Category' => array(
		 'title' => '글감 카테고리'
		,'sub' => array(
		)
	)
	,'Crawling' => array(
		 'title' => '글감 수집'
		,'sub' => array(
			'History' => array(
				 's_icon' => 'fa-history'
				,'s_name' => '글감 수집 히스토리'
				,'is_use' => 'y'
			)
		)
	)
);
