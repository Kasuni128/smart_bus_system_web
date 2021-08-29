<?php 
include_once('config.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('users',array('uid'=>$_REQUEST['delId']));
	header('location: users.php?msg=rds');
	exit;
}
?>