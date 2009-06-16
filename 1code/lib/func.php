<?php

//get db
function & get_db()
{
	global $db,$__DB__CONFIG;
	if($db)
		return $db;
	require_once 'Zend/Db.php';
	$db = Zend_Db::factory('PDO_MYSQL', $__DB__CONFIG);
	return $db;
}

//for quit
function isloggedin()
{
        if(isset($_COOKIE['sid']))
        {
                session_id($_COOKIE['sid']);
                return true;
        }
        return false;
}

function assert_login()
{
        if(!isset($_COOKIE['sid']))
		header("Location: login.php");
	else
	{
                session_id($_COOKIE['sid']);
		session_start();
		if(!isset($_SESSION['uid']))
			header("Location: login.php");
	}
}

function quit($message)
{
	debug_print_backtrace();
	print_r($r);
	die('--------------------------');
}

//for smarty
function get_smarty()
{
	$tpl = new Smarty;
	$tpl->template_dir = TPL_PATH;
	$tpl->compile_dir = TPLC_PATH;
	global $DB, $UID, $ME;
	$tpl->assign("DB", $DB);
	$tpl->assign("ME", $ME);
	$tpl->assign("UID", $UID);
	return $tpl;
}
function display_message($title, $msg)
{
	$tpl = get_smarty();
	$tpl->assign("page_title", $title);
	$tpl->assign("with_sidebar", true);
	$tpl->assign("message", $msg);
	$tpl->assign("yield", 'share/message.tpl');
	$tpl->display('share/container.tpl');
	exit;
}

function display_page($title, $data, $intpl, $frame=true)
{
	$tpl = get_smarty();
	$tpl->assign("yield", $intpl);
	$tpl->assign("page_title", $title);
	$tpl->assign("with_sidebar", true);
	if($data)
	{
		foreach($data as $k => $v)
			$tpl->assign($k, $v);
	}
	if($frame)
		$tpl->display('share/container.tpl');
	else
		$tpl->display($intpl);
	exit;
}

function display_unlogin($title, $intro, $image)
{
	display_page($title, array('intro'=>$intro, 'image'=>$image), "share/unlogin.tpl");
}

function display_segment($tplseg, $data)
{
	$tpl = get_smarty();
	if($data)
	{
		foreach($data as $k => $v)
			$tpl->assign($k, $v);
	}
	$tpl->display($tplseg);
	exit;
}



////get insert sql 
function get_insert_sql($table,&$fields,&$data,$ignore='ignore')
{
		$vaulest='';
		$vaules='';
		foreach($fields as $k)
		{
			$v=$data[$k];
			if($v!==""){
				if($vaulest!=''){
					$vaulest.=',';
					$vaules.=',';
				}
				$vaulest.='`'.$k.'`';
				$vaules.="'".mysql_escape_string ($v)."'";
			}
		}
		return "insert $ignore into ".$table.'('.$vaulest.') values('.$vaules.')';
}
///////
function get_update_sql($table,&$fields,&$data,$cond="1")
{
    $vaulest='';
    foreach($fields as $k)
    {
        $v=$data[$k];
        if($v!==""){
            if($vaulest!=''){
                $vaulest.=',';
            }   
            $vaulest.=' `'.$k."`='".mysql_escape_string($v)."'";
        }   
    }   
    $sql='update '.$table.' set'.$vaulest;
    if($cond!="")
        $sql.=' where '.$cond;
    return $sql;
}  


//get the unique cookie name with  file 
//@param file: the __FILE__ 
function get_self_cookie_name($file)
{
	$rel=str_replace(WEB_ROOT,"",$file);
	$rel=str_replace(".php","_tip",$rel);
    $rel=str_replace("/","__",$rel);
    return $rel;
}

//get tip cookie
function get_tip_cookie($file)
{
	global $_COOKIE;
	$cname=get_self_cookie_name($file);
  
	return  $_COOKIE[$cname];
}

