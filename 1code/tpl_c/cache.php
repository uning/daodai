<?php

define(TPL_PATH,dirname(__FILE__));
require_once "zend_inc.php";
//Zend_Loader::registerAutoload();
Zend_Loader::loadClass('Zend_View');
Zend_Loader::loadClass('Zend_Cache');
Zend_Loader::loadClass('Zend_Form');

$frontendOptions = array(
   'lifeTime' => 7200, // 两小时的缓存生命期
   'automatic_serialization' => true
);

$backendOptions = array(
    'cache_dir' => '../cache/' // 放缓存文件的目录
);
//前端:Core, Output, File, Function 和 Class.
$cache_front="Output";
//后端适配器(File, Sqlite, Memcache...)
$backend="File";
// 取得一个Zend_Cache_Core 对象
$cache = Zend_Cache::factory($cache_front,
                             $backend,
                             $frontendOptions,
                             $backendOptions);



$data = array(
    array(
        'author' => 'Hernando de Soto',
        'title' => 'The Mystery of Capitalism'
    ),
    array(
        'author' => 'Henry Hazlitt',
        'title' => 'Economics in One Lesson'
    ),
    array(
        'author' => 'Milton Friedman',
        'title' => 'Free to Choose'
    )
);

$now=time();
if(0&&!$cache->start('mypage')){
try
{
//传递数据给Zend_View类的实例　

// 传递一个唯一标识符给start()方法
    // output as usual:
    echo 'This is cached ('.$now.') ';

$view = new Zend_View();

$form = new Zend_Form;

/*
require_once "Zend_View_Smarty.php";
$view = new Zend_View_Smarty();
//*/

$view->setScriptPath(TPL_PATH);
$view->books=$data;


$view->setEscape('htmlentities');
$view->countries=array('us' => 'United States', 'il' =>'Israel', 'de' => 'Germany');

//解析一段View代码"booklist.php"来显示数据
echo $view->render('tpl_booklist.php');
//echo $view->render('bookinfo.tpl');

}

Catch (Zend_Exception $e){
	echo "Caught exception:" . get_class($e)."\n";
    echo "Message: ".$e->getMessage()."\n";
}
   $cache->end(); // the output is saved and sent to the browser
}

/*
echo 'This is never cached ('.$now.')';

// 查看一个缓存是否存在:
if(!$result = $cache->load('myresult')) {

    // 缓存不命中;连接到数据库

   // $db = Zend_Db::factory( [...] );

   // $result = $db->fetchAll('SELECT * FROM huge_table');
     echo "This one is new!\n\n";
   $result=$data;
   
    $cache->save($result, 'myresult');

} else {
    // cache hit! shout so that we know
    echo "This one is from cache!\n\n";
}





//other operation
//tag is for remove quickly
$cache->save($data, 'myUniqueID', array('tagA', 'tagB', 'tagC'));
$cache->remove('idToRemove');
// 清除所有缓存纪录
$cache->clean(Zend_Cache::CLEANING_MODE_ALL);

// 仅清除过期的
$cache->clean(Zend_Cache::CLEANING_MODE_OLD);
//删除标记为'tagA'和'tagC'的缓存项: 
$cache->clean(Zend_Cache::CLEANING_MODE_MATCHING_TAG, array('tagA', 'tagC'));
*/



