<?php
	@define ( '_lib' , '../admin/lib/');
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."class.database.php";
	$d = new database($config['database']);
	
	@$id = $_GET['id'];
		
	$d->reset();
	$sql_video = "select url,id from #_video where id='".$id."' order by id desc";
	$d->query($sql_video);
	$row_video = $d->result_array();
	

?>
<a href="quickview.php?id=<?=$row_video[0]['id']?>" class="various3 xemnhanh" >
	<img width="220" height="165" src="http://img.youtube.com/vi/<?=$row_video[0]['url']?>/hqdefault.jpg" alt="<?=$row_video[0]['ten']?>"/>
	<span class="nut_video"></span>
</a>