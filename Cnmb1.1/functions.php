<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
    $form->addInput($logoUrl);
    
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowRecentPosts' => _t('显示最新文章'),
    'ShowRecentComments' => _t('显示最近回复'),
    'ShowCategory' => _t('显示分类'),
    'ShowArchive' => _t('显示归档'),
    'ShowOther' => _t('显示其它杂项')),
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));
    
    $form->addInput($sidebarBlock->multiMode());
}

function themeInit($archive){
    if ($archive->is('single')){
    		$archive->content = image_class_replace($archive->content);
    }
}

function image_class_replace($content){
    $content = preg_replace('#<a(.*?) href="([^"]*/)?(([^"/]*)\.[^"]*)"(.*?)>#', '<a$1 href="$2$3"$5 target="_blank">', $content);
    return $content;
}

function img_postthumb($html) { 
	preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $html, $thumbUrl);  //通过正则式获取图片地址
	
	if(isset($thumbUrl[1][0])){
		$img_src = $thumbUrl[1][0];  //将赋值给img_src
		$img_counter = count($thumbUrl[0]);  //一个src地址的计数器
		 
		switch ($img_counter > 0) {
			case $allPics = 1:
			return $img_src;  //当找到一个src地址的时候，输出缩略图
			break;
			default:
			echo '';  //没找到(默认情况下)，不输出任何内容
		}
	} else {
		return false;
	}
}

/*
function themeFields($layout) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $layout->addItem($logoUrl);
}
*/

