<?php

define('DS', DIRECTORY_SEPARATOR );
define('WEB_ROOT', dirname(__FILE__).DS);
define('APP_ROOT',realpath(WEB_ROOT.DS.'..'.DS).DS);

define('PHP_EXT','F:\phpext'.DS);
define('SMARTY_ROOT',PHP_EXT.'smarty'.DS);
define('ZEND_ROOT',PHP_EXT.'ZendFramework-1.8.0PR'.DS);


define('CACHE_PATH',APP_ROOT.'cache'.DS);
define('TPL_PATH',APP_ROOT.'tpl'.DS);
define('TPLC_PATH',APP_ROOT.'tpl_c'.DS);

///add include path here instead of in php.ini for removing easily

//for zend
set_include_path(ZEND_ROOT.DS.'library'. PATH_SEPARATOR . get_include_path());
//for zend extra
set_include_path(ZEND_ROOT.DS.'extra'.DS.'library'. PATH_SEPARATOR . get_include_path());


require_once WEB_ROOT.'config.php';
require_once SMARTY_ROOT.'Smarty.class.php';
/*
require_once APP_ROOT.'include/func.php';
require_once WEB_ROOT.'include/var.php';
require_once WEB_ROOT.'class/util.php';
require_once WEB_ROOT.'class/Database.php';



//merge _GET to _POST ,not overwrite
foreach($_GET as $k=>$v)
{
 if(!array_key_exists($k,$_POST))
   $_POST[$k]=$v;
} 
*/

