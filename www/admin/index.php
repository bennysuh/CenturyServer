<?php
session_start ();
include_once '../../define.php';
require_once PATH_ROOT."framework/MooPHP/MooPHP.php";

include_once PATH_ADMIN_CONTROL.'/header.php';
include( Mootemplate( 'header' ,true) );

$showPage=$_REQUEST['showpage'];
$pageAdminArr=array('admin','punish_edit','punish_shenhe','index','push_new','push_edit','login','game_new','game_edit','page_new','page_edit','page_link','wx_edit');




// exit();
if(in_array($showPage, $pageAdminArr)&&isset($_SESSION['adminname'])){
	include_once PATH_ADMIN_CONTROL."/$showPage.php";
	include( Mootemplate( $showPage,true) );
}
else{
	include_once PATH_ADMIN_CONTROL.'/index.php';
	include( Mootemplate( 'login',true ) );
}





if (isset ( $_REQUEST ['username'] )) {
	$_SESSION ['username'] = $_REQUEST ['username'];
	$uid=$_SESSION ['username'];
}





include( Mootemplate( 'footer',true) );