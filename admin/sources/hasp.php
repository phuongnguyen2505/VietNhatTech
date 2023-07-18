<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man_photo":
		get_photos();
		$template = "hasp/photos";
		break;
	case "add_photo":
		$template = "hasp/photo_add";
		break;
	case "edit_photo":
		get_photo();
		$template = "hasp/photo_edit";
		break;
	case "save_photo":
		save_photo();
		break;
	case "delete_photo":
		delete_photo();
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
function get_photos(){
	global $d, $items, $paging;
	
	$d->setTable('hasp');
	$d->setWhere('com', $_REQUEST['type1']);
	$d->setWhere('id_photo', $_REQUEST['idc']);
	$d->setOrder('stt,id desc');
	$d->select('*');
	$d->query();
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=hasp&type1=$_REQUEST[type1]&act=man_photo&idc=$_REQUEST[idc]";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];

}

function get_photo(){
	global $d, $item, $list_cat;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=hasp&type1=$_REQUEST[type1]&act=man_photo");
	
	$d->setTable('hasp');
	$d->setWhere('com', $_REQUEST['type1']);
	$d->setWhere('id', $id);
	$d->select();
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=hasp&type1=$_REQUEST[type1]&act=man_photo");
	$item = $d->fetch_array();
	$d->reset();
}

function save_photo(){
	global $d;
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=hasp&type1=$_REQUEST[type1]&act=man_photo");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
			if(isset($_FILES['file']) and $_FILES['file']['name']!=''){
				$name = $_FILES['file']['name'];
				$name = explode('.',$name);
				$name = changeTitle($name[0]);
				$file_name=$name."_".fns_Rand_digit(0,9,4);
				$photo = upload_image("file", 'jpg|png|gif|GIF|PNG|JPG|jpeg|JPEG', _upload_product,$file_name);
				$data['photo'] = $photo;	
				$data['thumb'] = create_thumb($data['photo'], 200, 200, _upload_product,$file_name,1);	
				$d->setTable('hasp');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_product.$row['photo']);
					delete_file(_upload_product.$row['thumb']);	
				}
			}
			$data['id'] = $_REQUEST['id'];
			
			$data['mahinh'] = $_POST['mahinh'];
			$data['ten_vi'] = $_POST['ten_vi'];
			$data['ten_en'] = $_POST['ten_en'];
			$data['ten_ta'] = $_POST['ten_ta'];
			//$data['mausac'] = $_POST['mausac'];
			//$data['mota'] = $_POST['mota'];
			$data['stt'] = $_POST['stt'];
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$data['com'] = $_REQUEST['type1'];
			$d->reset();
			$d->setTable('hasp');
			$d->setWhere('id', $id);
			if(!$d->update($data)) transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=hasp&type1=$_REQUEST[type1]&act=man_photo");
			redirect("index.php?com=hasp&type1=$_REQUEST[type1]&act=man_photo&idc=".$_REQUEST['idc']."");
			
	}{ // them moi
		
			for($i=0; $i<5; $i++){
				if(isset($_FILES['file'.$i]) and $_FILES['file'.$i]['name']!=''){
					$name = $_FILES['file'.$i]['name'];
					$name = explode('.',$name);
					$name = changeTitle($name[0]);
					$file_name=$name."_".fns_Rand_digit(0,9,4);	
					$data['photo'] = upload_image("file".$i, 'jpg|png|gif|GIF|PNG|JPG|jpeg|JPEG', _upload_product,$file_name.$i);
					$data['thumb'] = create_thumb($data['photo'], 200, 200, _upload_product,$file_name.$i,1);	
					$data['stt'] = $_POST['stt'.$i];
					$data['ten_vi'] = $_POST['ten_vi'.$i];
					$data['ten_en'] = $_POST['ten_en'.$i];
					$data['ten_ta'] = $_POST['ten_ta'];
					
					$data['mahinh'] = $_POST['mahinh'.$i];
					//$data['mausac'] = $_POST['mausac'.$i];
					//$data['mota'] = $_POST['mota'.$i];
					$data['hienthi'] = isset($_POST['hienthi'.$i]) ? 1 : 0;
					$data['com'] = $_REQUEST['type1'];
					$data['id_photo'] = $_REQUEST['idc'];
					$d->setTable('hasp');
					if(!$d->insert($data)) transfer("Lưu dữ liệu bị lỗi", "index.php?com=hasp&type1=$_REQUEST[type1]&act=man_photo");
				}
			}
			redirect("index.php?com=hasp&type1=$_REQUEST[type1]&act=man_photo&idc=".$_REQUEST['idc']."");
	}
}

function delete_photo(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->setTable('hasp');
		$d->setWhere('id', $id);
		$d->select();
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=hasp&type1=$_REQUEST[type1]&act=man_photo");
		$row = $d->fetch_array();
		delete_file(_upload_product.$row['photo']);
		delete_file(_upload_product.$row['thumb']);
		if($d->delete())
			redirect("index.php?com=hasp&type1=$_REQUEST[type1]&act=man_photo&idc=".$_REQUEST['idc']."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=hasp&type1=$_REQUEST[type1]&idc=$_REQUEST[idc]&act=man_photo");
	}else if(isset($_GET['listid'])){
		$listid = explode(",",$_GET['listid']);
		foreach($listid as $listid_item){
			$d->reset();
			$d->setTable('hasp');
			$d->setWhere('id', $listid_item);
			$d->select();
			if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=hasp&type1=$_REQUEST[type1]&idc=$_REQUEST[idc]&act=man_photo");
			$row = $d->fetch_array();
			delete_file(_upload_product.$row['photo']);
			delete_file(_upload_product.$row['thumb']);
			$d->delete();
		}
		redirect("index.php?com=hasp&type1=$_REQUEST[type1]&act=man_photo&idc=".$_REQUEST['idc']."");
	}else transfer("Không nhận được dữ liệu", "index.php?com=hasp&type1=$_REQUEST[type1]&idc=$_REQUEST[idc]&act=man_photo");
}

?>

	
