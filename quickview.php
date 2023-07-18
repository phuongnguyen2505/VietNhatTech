<?php
	session_start();
	$session=session_id();
	date_default_timezone_set('Asia/Ho_Chi_Minh');
    error_reporting(E_ALL & ~E_NOTICE & ~8192);
	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './admin/lib/');
	@define ( _upload_folder , './upload/' );
	if(!isset($_SESSION['lang']))
	{
	$_SESSION['lang']='vi';
	}
	$lang=$_SESSION['lang'];
	require_once _source."lang_$lang.php";	

	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";
	include_once _lib."file_requick.php";
	
	$id=addslashes($_GET['id']);	
	if($id!=''){
	
		$d->reset();
		$sql_video = "select url,id from #_video where id='".$id."' order by id desc";
		$d->query($sql_video);
		$row_video = $d->result_array();
	}	
?>
<iframe width="100%" height="90%" src="//www.youtube.com/embed/<?=trim($row_video[0]['url'])?>?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe>