<?php
require_once 'base.php';
	$tpl = new Smarty;
	echo "<br>default template_dir=".$tpl->template_dir;
	echo "<br>default compile_dir=".$tpl->compile_dir;

	$tpl->template_dir = TPL_PATH;
	$tpl->compile_dir = TPLC_PATH;


/*
require_once 'Zend/Feed.php';


//for feed
$feed = Zend_Feed::import('http://news.google.com/?output=rss');
foreach ($feed->items as $item) {
    
    echo "<p>" . $item->title() . "<br />";
    echo $item->link()  . "</p>";
    
}
*/