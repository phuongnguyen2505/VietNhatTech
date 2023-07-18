<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man_photo":
		get_photos();
		$template = "doitac/photos";
		break;
	case "add_photo":
		$template = "doitac/photo_edit";
		break;
	case "edit_photo":
		get_photo();
		$template = "doitac/photo_edit";
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
	#----------------------------------------------------------------------------------------
	if($_REQUEST['footer']!='')
	{
	$id_up = $_REQUEST['footer'];
	$sql_sp = "SELECT id,footer FROM table_doitac where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$time=time();
	$hienthi=$cats[0]['footer'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_doitac SET footer ='$time' WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_doitac SET footer =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$d->setTable('doitac');
	$d->setWhere('com', 'doitac');
	$d->setOrder('stt,id desc');
	$d->select('*');
	$d->query();
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=doitac&act=man_photo";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];

}

function get_photo(){
	global $d, $item, $list_cat;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=doitac&act=man_photo");
	
	$d->setTable('doitac');
	$d->setWhere('com', 'doitac');
	$d->setWhere('id', $id);
	$d->select();
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=doitac&act=man_photo");
	$item = $d->fetch_array();
	$d->reset();
}

function save_photo(){
	global $d;
	$file_name=fns_Rand_digit(0,9,15);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=doitac&act=man_photo");
	
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){ // cap nhat
		
			if($photo = upload_image("file", 'jpg|png|gif', _upload_hinhanh,$file_name)){
				$data['photo'] = $photo;
				$data['thumb']= create_thumb($data['photo'], 82,70, _upload_hinhanh,$file_name,1);	
				$d->setTable('doitac');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_hinhanh.$row['photo']);
				}
			}
			
			#Vi
			$data['ten_vi'] = $_POST['ten_vi'];
			$data['noidung_vi'] = addslashes($_POST['noidung_vi']);
			
			#En
			$data['ten_en'] = $_POST['ten_en'];
			$data['noidung_en'] = addslashes($_POST['noidung_en']);
			
			#CN
			$data['ten_ta'] = $_POST['ten_ta'];
			$data['noidung_ta'] = addslashes($_POST['noidung_ta']);
			
			
			#Chung
			$data['id'] = $_REQUEST['id'];
			$data['stt'] = $_POST['stt'];
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$data['com'] = 'doitac';

			$data['mota'] = $_POST['mota'];
			$data['height'] = $_POST['chieucao'];

			$d->reset();
			$d->setTable('doitac');
			$d->setWhere('id', $id);
			if(!$d->update($data)) transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=doitac&act=man_photo");
			

			header("Location:index.php?com=doitac&act=man_photo");
			
	}{ // them moi
		
				if($data['photo'] = upload_image("file".$i, 'jpg|png|gif', _upload_hinhanh,$file_name))
					{
						$data['thumb'] = create_thumb($data['photo'], 82,70, _upload_hinhanh,$file_name,1);	
						$data['mota'] = "mota :";
						
						$data['stt'] = $_POST['stt'];
						$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
						$data['com'] = 'doitac';
						
						$data['mota'] = $_POST['mota'];
						
						#Vi
			$data['ten_vi'] = $_POST['ten_vi'];
			$data['noidung_vi'] = addslashes($_POST['noidung_vi']);
			
			#En
			$data['ten_en'] = $_POST['ten_en'];
			$data['noidung_en'] = addslashes($_POST['noidung_en']);
			
			#CN
			$data['ten_ta'] = $_POST['ten_ta'];
			$data['noidung_ta'] = addslashes($_POST['noidung_ta']);

						$data['height'] = $_POST['chieucao'];
						
						$data['id_photo'] = $_REQUEST['idc'];
						
						$d->setTable('doitac');
						if(!$d->insert($data)) transfer("Lưu dữ liệu bị lỗi", "index.php?com=doitac&act=man_photo");
					}
			header("Location:index.php?com=doitac&act=man_photo");
		
	}
}


function delete_photo(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->setTable('doitac');
		$d->setWhere('id', $id);
		$d->select();
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=doitac&act=man_photo");
		$row = $d->fetch_array();
		delete_file(_upload_hinhanh.$row['photo']);
		if($d->delete())
		
			header("Location:index.php?com=doitac&act=man_photo");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=doitac&act=man_photo");
	}else transfer("Không nhận được dữ liệu", "index.php?com=doitac&act=man_photo");
}

?>

	
