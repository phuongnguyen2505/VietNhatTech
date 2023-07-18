<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	
	case "capnhat":
		get_banner();
		$template = "bannerqc/logo_add";
		break;
	case "save":
		save_banner();
		break;
	#====================================
	case "capnhat_en":
		get_banner_en();
		$template = "bannerqc/logo_en_add";
		break;
	case "save_en":
		save_banner_en();
		break;
		#====================================
	case "capnhat_ta":
		get_banner_ta();
		$template = "bannerqc/logo_ta_add";
		break;
	case "save_ta":
		save_banner_ta();
		break;
	#====================================
	case "capnhatft":
		get_ft();
		$template = "bannerqc/logo_ft_add";
		break;
	case "saveft":
		save_ft();
		break;
	#====================================
	case "flash":
		get_banner_giua();
		$template = "bannerqc/banner_giua_add";
		break;
	case "save_banner_giua":
		save_banner_giua();
		break;
	
	case "man_phai":
		get_banner_phai();
		$template = "bannerqc/banner_phai_add";
		break;
	case "save_banner_phai":
		save_banner_phai();
		break;
	#====================================
	#====================================
	case "capnhat_popup":
		get_popup();
		$template = "bannerqc/popup_photo";
		break;
	case "save_popup":
		save_popup();
		break;
	#====================================
	case "capnhat_bg":
		get_banggia();
		$template = "bannerqc/banggia";
		break;
	case "save_banggia":
		save_banggia();
		break;
	default:
		$template = "index";
}
function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}


function get_banner(){
	global $d, $item;

	$sql = "select * from #_photo where com='banner_top'";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item = $d->fetch_array();
}

function save_banner(){
	global $d;
	$file_name=fns_Rand_digit(0,9,3);
	$sql = "select * from #_photo where com='banner_top'";
	$d->query($sql);
	$item = $d->fetch_array();
	$id=$item['id'];
	
	if($id){ // cap nhat
		if($photo = upload_image("file", 'swf|PNG|JPG|GIF|png|jpg|gif', _upload_hinhanh,$file_name)){
			$data['photo'] = $photo;
			$d->setTable('photo');
			$d->setWhere('id', $id);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['photo']);
		}
		//$data['photo'] = $photo;
		//echo dump($id);
		$data['hienthi']= isset($_POST['hienthi'])? 1:0;
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->setWhere('com','banner_top');
		if($d->update($data))
			redirect("index.php?com=bannerqc&act=capnhat");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=bannerqc&act=capnhat");
	}else{ // them moi
		$data['photo'] = upload_image("file".$i, 'swf|PNG|JPG|GIF|png|jpg|gif', _upload_hinhanh,$file_name);
		if(!$data['photo']) $data['photo']="";
		
		$data['com']='banner_top';
		$d->setTable('photo');
		if($d->insert($data))
		redirect("index.php?com=bannerqc&act=capnhat");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=bannerqc&act=capnhat");
	
}
}

function get_banner_en(){
	global $d, $item;

	$sql = "select * from #_photo where com='banner_top_en'";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item = $d->fetch_array();
}

function save_banner_en(){
	global $d;
	$file_name=fns_Rand_digit(0,9,3);
	$sql = "select * from #_photo where com='banner_top_en'";
	$d->query($sql);
	$item = $d->fetch_array();
	$id=$item['id'];
	
	if($id){ // cap nhat
		if($photo = upload_image("file", 'swf|PNG|JPG|GIF|png|jpg|gif', _upload_hinhanh,$file_name)){
			$data['photo'] = $photo;
			$d->setTable('photo');
			$d->setWhere('id', $id);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['photo']);
		}
		//$data['photo'] = $photo;
		//echo dump($id);
		$data['hienthi']= isset($_POST['hienthi'])? 1:0;
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->setWhere('com','banner_top_en');
		if($d->update($data))
			redirect("index.php?com=bannerqc&act=capnhat_en");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=bannerqc&act=capnhat_en");
	}else{ // them moi
		$data['photo'] = upload_image("file".$i, 'swf|PNG|JPG|GIF|png|jpg|gif', _upload_hinhanh,$file_name);
		if(!$data['photo']) $data['photo']="";
		
		$data['com']='banner_top_en';
		$d->setTable('photo');
		if($d->insert($data))
		redirect("index.php?com=bannerqc&act=capnhat_en");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=bannerqc&act=capnhat_en");
	
}
}

function get_banner_ta(){
	global $d, $item;

	$sql = "select * from #_photo where com='banner_top_ta'";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item = $d->fetch_array();
}

function save_banner_ta(){
	global $d;
	$file_name=fns_Rand_digit(0,9,3);
	$sql = "select * from #_photo where com='banner_top_ta'";
	$d->query($sql);
	$item = $d->fetch_array();
	$id=$item['id'];
	
	if($id){ // cap nhat
		if($photo = upload_image("file", 'swf|PNG|JPG|GIF|png|jpg|gif', _upload_hinhanh,$file_name)){
			$data['photo'] = $photo;
			$d->setTable('photo');
			$d->setWhere('id', $id);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['photo']);
		}
		//$data['photo'] = $photo;
		//echo dump($id);
		//
		$data['hienthi']= isset($_POST['hienthi'])? 1:0;
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->setWhere('com','banner_top_ta');
		if($d->update($data))
			redirect("index.php?com=bannerqc&act=capnhat_ta");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=bannerqc&act=capnhat_ta");
	}else{ // them moi
		$data['photo'] = upload_image("file".$i, 'swf|PNG|JPG|GIF|png|jpg|gif', _upload_hinhanh,$file_name);
		if(!$data['photo']) $data['photo']="";
		
		$data['com']='banner_top_ta';
		$d->setTable('photo');
		if($d->insert($data))
		redirect("index.php?com=bannerqc&act=capnhat_ta");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=bannerqc&act=capnhat_ta");
	
}
}


function get_ft(){
	global $d, $item;

	$sql = "select * from #_photo where com='ft'";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item = $d->fetch_array();
}

function save_ft(){
	global $d;
	$file_name=fns_Rand_digit(0,9,3);
	$sql = "select * from #_photo where com='ft'";
	$d->query($sql);
	$item = $d->fetch_array();
	$id=$item['id'];
	//echo dump($id);
	
	if($id){ // cap nhat
		if($photo = upload_image("file", 'swf|PNG|JPG|GIF|png|jpg|gif', _upload_hinhanh,$file_name)){
			$data['photo'] = $photo;
			$d->setTable('photo');
			$d->setWhere('id', $id);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['photo']);
		}
		//$data['photo'] = $photo;
		//echo dump($id);
		$data['hienthi']= isset($_POST['hienthi'])? 1:0;
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->setWhere('com','ft');
		if($d->update($data))
			redirect("index.php?com=bannerqc&act=capnhatft");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=bannerqc&act=capnhatft");
	}else{ // them moi
		$data['photo'] = upload_image("file".$i, 'swf|PNG|JPG|GIF|png|jpg|gif', _upload_hinhanh,$file_name);
		if(!$data['photo']) $data['photo']="";
		
		$data['com']='banner_top';
		$d->setTable('photo');
		if($d->insert($data))
		redirect("index.php?com=bannerqc&act=capnhatft");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=bannerqc&act=capnhatft");
	
}
}



function get_banner_giua(){
	global $d, $item_banner;

	$sql = "select * from #_photo where com='banner_giua'";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item_banner = $d->fetch_array();
}

function save_banner_giua(){
	global $d;
	$file_name=fns_Rand_digit(0,9,5);
	$sql = "select * from #_photo where com='banner_giua'";
	$d->query($sql);
	$item = $d->fetch_array();
	$id=$item['id'];
	//echo dump($id);
	
	if($id){ // cap nhat
		if($photo = upload_image("file", 'swf', _upload_hinhanh,$file_name)){
			$data['photo'] = $photo;
			$d->setTable('photo');
			$d->setWhere('id', $id);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['photo']);
		}
		$data['photo'] = $photo;
		//echo dump($id);
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->setWhere('com','banner_giua');
		if($d->update($data))
			redirect("index.php?com=bannerqc&act=flash");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=bannerqc&act=flash");
	}else{ // them moi
		$data['photo'] = upload_image("file", 'swf', _upload_hinhanh,$file_name);
		if(!$data['photo']) $data['photo']="";
		
		$data['com']='banner_giua';
		$d->setTable('photo');
		if($d->insert($data))
			//transfer("Dữ liệu đã được lưu", "index.php?com=bannerqc&act=man_banner");
			redirect("index.php?com=bannerqc&act=flash");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=bannerqc&act=flash");
	
}
}

function get_banner_phai(){
	global $d, $item_banner;

	$sql = "select * from #_photo where com='banner_phai'";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item_banner = $d->fetch_array();
}

function save_banner_phai(){
	global $d;
	$file_name=fns_Rand_digit(0,9,7);
	$sql = "select * from #_photo where com='banner_phai'";
	$d->query($sql);
	$item = $d->fetch_array();
	$id=$item['id'];
	//echo dump($id);
	
	if($id){ // cap nhat
		if($photo = upload_image("file", 'gif|jpg|png', _upload_hinhanh,$file_name)){
			$data['photo'] = $photo;
			$d->setTable('photo');
			$d->setWhere('id', $id);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['photo']);
		}
		$data['photo'] = $photo;
		//echo dump($id);
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->setWhere('com','banner_phai');
		if($d->update($data))
			redirect("index.php?com=bannerqc&act=man_phai");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=bannerqc&act=man_phai");
	}else{ // them moi
		$data['photo'] = upload_image("file", 'gif|jpg|png', _upload_hinhanh,$file_name);
		if(!$data['photo']) $data['photo']="";
		
		$data['com']='banner_phai';
		$d->setTable('photo');
		if($d->insert($data))
			//transfer("Dữ liệu đã được lưu", "index.php?com=bannerqc&act=man_banner");
			redirect("index.php?com=bannerqc&act=man_phai");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=bannerqc&act=man_phai");
	
}
}
// bang giá

function get_banggia(){
	global $d, $item;

	$sql = "select * from #_photo where com='banggia'";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item = $d->fetch_array();
}

function save_banggia(){
	global $d;
	$file_name=fns_Rand_digit(0,9,3);
	$sql = "select * from #_photo where com='banggia'";
	$d->query($sql);
	$item = $d->fetch_array();
	$id=$item['id'];
	
	if($id){ // cap nhat
		if($photo = upload_image("file", 'doc|docx|xls|xlsx|pdf|DOC|DOCX|XLS|XLSX|PDF', _upload_hinhanh,substr($_FILES['file']['name'], 0,strlen($_FILES['file']['name'])-4))){
			$data['photo'] = $photo;
			$d->setTable('photo');
			$d->setWhere('id', $id);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['photo']);
		}
		$data['photo'] = $photo;
		$data['mota_vi'] = $_POST['mota_vi'];
		$data['mota_en'] = $_POST['mota_en'];
		//echo dump($id);
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->setWhere('com','banggia');
		if($d->update($data))
			redirect("index.php?com=bannerqc&act=capnhat_bg");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=bannerqc&act=capnhat_bg");
	}else{ // them moi
		$data['photo'] = upload_image("file".$i, 'doc|docx|xls|xlsx|pdf|DOC|DOCX|XLS|XLSX|PDF', _upload_hinhanh,$_FILES['file']['name']);
		if(!$data['photo']) $data['photo']="";
		$data['mota_vi'] = $_POST['mota_vi'];
		$data['mota_en'] = $_POST['mota_en'];
		$data['com']='banggia';
		$d->setTable('photo');
		if($d->insert($data))
		redirect("index.php?com=bannerqc&act=capnhat_bg");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=bannerqc&act=capnhat_bg");
	
}
}
//popup

// bang giá

function get_popup(){
	global $d, $item;

	$sql = "select * from #_photo where com='popup'";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item = $d->fetch_array();
}

function save_popup(){
	global $d;
	$file_name=fns_Rand_digit(0,9,3);
	$sql = "select * from #_photo where com='popup'";
	$d->query($sql);
	$item = $d->fetch_array();
	$id=$item['id'];
	
	if($id){ // cap nhat
		if($photo = upload_image("file", 'gif|png|jpg|GIF|PNG|JPG)', _upload_hinhanh,$file_name)){
			$data['photo'] = $photo;
			$d->setTable('photo');
			$d->setWhere('id', $id);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['photo']);
		}
		//$data['photo'] = $photo;
		$data['mota_vi'] = $_POST['mota_vi'];
		$data['mota_en'] = $_POST['mota_en'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		//echo dump($id);
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->setWhere('com','popup');
		if($d->update($data))
			redirect("index.php?com=bannerqc&act=capnhat_popup");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=bannerqc&act=capnhat_popup");
	}else{ // them moi
		$data['photo'] = upload_image("file", 'gif|png|jpg|GIF|PNG|JPG)', _upload_hinhanh,$file_name);
		//if(!$data['photo']) $data['photo']="";
		$data['mota_vi'] = $_POST['mota_vi'];
		$data['mota_en'] = $_POST['mota_en'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['com']='popup';
		$d->setTable('photo');
		if($d->insert($data))
		redirect("index.php?com=bannerqc&act=capnhat_popup");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=bannerqc&act=capnhat_popup");
	
}
}


?>