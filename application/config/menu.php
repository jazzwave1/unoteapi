<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
$config['menu'] = array(
	'Note' => array(
		 'title' => '내 노트'
		,'sub' => array(
			'List' => array(
				 'icon' => 'fa fa-book'
				,'subtitle' => '내 노트'
				,'is_use' => true
			)
		)
	)
	,'Article' => array(
		 'title' => '글감 관리'
		,'sub' => array(
			'List' => array(
				 'icon' => 'fa fa-list'
				,'subtitle' => '글감 리스트'
				,'is_use' => true
			)
			,'Bookmark' => array(
				 'icon' => 'fa fa-bookmark'
				,'subtitle' => '북마크'
				,'is_use' => true
			)
			,'Trash' => array(
				 'icon' => 'fa fa-trash-o'
				,'subtitle' => '휴지통'
				,'is_use' => true
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
				 'icon' => 'fa fa-history'
				,'subtitle' => '히스토리'
				,'is_use' => true
			)
		)
	)
);
