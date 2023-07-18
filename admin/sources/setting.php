<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "capnhat":
		get_gioithieu();
		$template = "setting/item_add";
		break;
	case "save":
		save_gioithieu();
		break;
		
	default:
		$template = "index";
}

function get_gioithieu(){
	global $d, $item;

	$sql = "select * from #_setting limit 0,1";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item = $d->fetch_array();
}

function save_gioithieu(){
	global $d;
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=setting&act=capnhat");
	
	#VN-------------------	
	$data['title_vi'] = magic_quote($_POST['title_vi']);
	$data['keywords_vi'] = magic_quote($_POST['keywords_vi']);
	$data['description_vi'] = magic_quote($_POST['description_vi']);
	$data['ten_vi'] = magic_quote($_POST['ten_vi']);
	$data['logan_vi'] = magic_quote($_POST['logan_vi']);
	$data['diachi_vi'] = magic_quote($_POST['diachi_vi']);
	
	#EN-------------------	
	$data['title_en'] = magic_quote($_POST['title_en']);
	$data['logan_en'] = magic_quote($_POST['logan_en']);
	$data['keywords_en'] = magic_quote($_POST['keywords_en']);
	$data['description_en'] = magic_quote($_POST['description_en']);
	$data['ten_en'] = magic_quote($_POST['ten_en']);
	$data['diachi_en'] = magic_quote($_POST['diachi_en']);
	
	#TW-------------------	
	$data['title_ta'] = magic_quote($_POST['title_ta']);
	$data['keywords_ta'] = magic_quote($_POST['keywords_ta']);
	$data['description_ta'] = magic_quote($_POST['description_ta']);
	$data['ten_ta'] = magic_quote($_POST['ten_ta']);
	$data['diachi_ta'] = magic_quote($_POST['diachi_ta']);
	$data['logan_ta'] = magic_quote($_POST['logan_ta']);
	
	#JP-------------------	
	$data['title_ja'] = magic_quote($_POST['title_ja']);
	$data['keywords_ja'] = magic_quote($_POST['keywords_ja']);
	$data['description_ja'] = magic_quote($_POST['description_ja']);
	$data['ten_ja'] = magic_quote($_POST['ten_ja']);
	$data['diachi_ja'] = magic_quote($_POST['diachi_ja']);
	$data['logan_ja'] = magic_quote($_POST['logan_ja']);
	
	#Chung---------
	$data['email'] = magic_quote($_POST['email']);
	$data['dienthoai'] = magic_quote($_POST['dienthoai']);
	$data['hotline'] = magic_quote($_POST['hotline']);
	$data['toado'] = magic_quote($_POST['toado']);
	$data['toado1'] = magic_quote($_POST['toado1']);
	$data['website'] = magic_quote($_POST['website']);
	$data['facebook'] = magic_quote($_POST['facebook']);
	$data['google'] = magic_quote($_POST['google']);
	$data['twitter'] = magic_quote($_POST['twitter']);
	$data['youtube'] = magic_quote($_POST['youtube']);
	$data['fax'] = magic_quote($_POST['fax']);
	$data['analytics'] = magic_quote($_POST['analytics']);
	$data['chat'] = magic_quote($_POST['chat']);
	
	#Query--------------------	
	$d->reset();
	$d->setTable('setting');
	if($d->update($data))
		header("Location:index.php?com=setting&act=capnhat");
	else
		transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=setting&act=capnhat");
}

?>