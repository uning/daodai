<?php


function & get_db()
{
	global $db,$__DB__CONFIG;
	if($db)
		return $db;
	require_once 'Zend/Db.php';
	$db = Zend_Db::factory('PDO_MYSQL', $__DB__CONFIG);
	return $db;
}
