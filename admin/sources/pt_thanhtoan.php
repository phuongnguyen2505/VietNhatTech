<?php	if(!defined('_source')) die("Error");
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
switch($act){
	case "capnhat":
		get_gioithieu();
		$template = "pt_thanhtoan/item_add";
		break;
	case "save":
		save_gioithieu();
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

function get_gioithieu(){
	global $d, $item;

	$sql = "select * from #_pt_thanhtoan limit 0,1";
	$d->query($sql);
	if($d->num_rows()==0) 
	{
		$data['ten'] = "";
		$data['mota'] = "";
		$data['noidung'] = "";
		
		$d->reset();
		$d->setTable('pt_thanhtoan');
		if($d->insert($data))
		transfer("Đã khởi tạo dữ liệu cho cho lần đầu tiên", "index.php?com=pt_thanhtoan&act=capnhat");
	}
	$item = $d->fetch_array();
}

function save_gioithieu(){
	global $d;
	$file_name=fns_Rand_digit(0,9,5);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=pt_thanhtoan&act=capnhat");
	if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG',_upload_hinhanh,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 220,150, _upload_hinhanh,$file_name);
			$d->setTable('pt_thanhtoan');			
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_hinhanh.$row['photo']);
				delete_file(_upload_hinhanh.$row['thumb']);
			}
		}
	$data['ten'] = $_POST['ten'];
	$data['mota'] = $_POST['mota'];
	$data['noidung_vi'] = $_POST['noidung_vi'];
	$data['noidung_en'] = $_POST['noidung_en'];
	
	$d->reset();
	$d->setTable('pt_thanhtoan');
	if($d->update($data))
		transfer("Dữ liệu được cập nhật", "index.php?com=pt_thanhtoan&act=capnhat");
	else
		transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=pt_thanhtoan&act=capnhat");
}

?>
