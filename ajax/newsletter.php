<?php
	@define ( '_lib' , '../admin/lib/');
	include_once _lib."config.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";
	$d = new database($config['database']);
	
	$email = $_POST['email'];
	
	if($email==''){
		echo 'Xin vui lòng nhập địa chỉ email của bạn';
		exit();
	}
	
	$sql = "select * from #_newsletter where email='$email'";
	$d->query($sql);
	if($d->num_rows()>0){
		echo 'Email này đã đăng ký';
		exit();	
	}
	$d->reset();
	$sql = "insert into #_newsletter (email,stt,hienthi,ngaytao) value('$email',1,1,".time().")";
	if($d->query($sql))echo 'Bạn đã đăng ký thành công';
	else echo 'Hệ thống đang bận, xin quý khách vui lòng thử lại sau';
	
?>