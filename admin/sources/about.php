<?php	if(!defined('_source')) die("Error");
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
switch($act){
	case "man":
		get_gioithieus();
		$template = "about/items";
		break;
	case "add":
		$template = "about/item_add";
		break;
	case "edit":
		get_gioithieu();
		$template = "about/item_add";
		break;
	case "capnhat":
		get_gioithieucn();
		$template = "about/item_add";
		break;
	case "save":
		save_gioithieu();
		break;
	case "delete":
		del_gioithieu();
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

function get_gioithieus(){
	global $d, $items;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['noibat']!='')
	{
	$id_up = $_REQUEST['noibat'];
	$sql_sp = "SELECT id,noibat FROM table_about where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$time=time();
	$hienthi=$cats[0]['noibat'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_about SET noibat ='$time' WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_about SET noibat =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	###############
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_about where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_about SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_about SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	$sql = "select * from #_about";
	$d->query($sql);
	$items = $d->result_array();
}

function get_gioithieu(){
	global $d, $item;
	
	$id= addslashes($_GET['id']);
	//echo $id; exit;
	$sql = "select * from #_about where id=$id";
	$d->query($sql);
	$item = $d->fetch_array();
}

function get_gioithieucn(){
	global $d, $item;
	
	//$id= addslashes($_GET['id']);
	//echo $id; exit;
	$sql = "select * from #_about where hienthi =1 order by stt asc,id asc limit 0,1";
	$d->query($sql);
	$item = $d->fetch_array();
}

function save_gioithieu(){
	global $d;
	
	$id= addslashes($_POST['id']);
	$file_name=fns_Rand_digit(0,9,5);
	if($id){
		if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=about&act=man");
		
		$id =  themdau($_POST['id']);
		
		if($photo = upload_image("file", 'jpg|png|gif',_upload_tintuc,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 425,290, _upload_tintuc,$file_name,1);
			$d->setTable('news');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_tintuc.$row['photo']);
				delete_file(_upload_tintuc.$row['thumb']);
			}
		}
		
		#VN-------------------	
		$data['title_vi'] = $_POST['title_vi'];
		$data['keywords_vi'] = $_POST['keywords_vi'];
		$data['description_vi'] = $_POST['description_vi'];
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['mota_vi'] = $_POST['mota_vi'];
		$data['noidung_vi'] = addslashes($_POST['noidung_vi']);
		
		#EN-------------------	
			
		$data['title_en'] = $_POST['title_en'];
		$data['keywords_en'] = $_POST['keywords_en'];
		$data['description_en'] = $_POST['description_en'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['mota_en'] = $_POST['mota_en'];
		$data['noidung_en'] = addslashes($_POST['noidung_en']);
				
		#TW-------------------	
		$data['title_ta'] = $_POST['title_ta'];
		$data['keywords_ta'] = $_POST['keywords_ta'];
		$data['description_ta'] = $_POST['description_ta'];
		$data['ten_ta'] = $_POST['ten_ta'];
		$data['mota_ta'] = $_POST['mota_ta'];
		$data['noidung_ta'] = addslashes($_POST['noidung_ta']);
				
		#JP-------------------	
		$data['title_ja'] = $_POST['title_ja'];
		$data['keywords_ja'] = $_POST['keywords_ja'];
		$data['description_ja'] = $_POST['description_ja'];
		$data['ten_ja'] = $_POST['ten_ja'];
		$data['mota_ja'] = $_POST['mota_ja'];
		$data['noidung_ja'] = addslashes($_POST['noidung_ja']);
		
		#Chung--------------
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);	
		
		$d->reset();
		$d->setTable('about');
		$d->setWhere('id', $id);
		if($d->update($data))
			transfer("Dữ liệu được cập nhật", "index.php?com=about&act=man");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=about&act=man");
	}
	else{
		if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=about&act=man");
		if($photo = upload_image("file", 'jpg|png|gif',_upload_tintuc,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 425,290, _upload_tintuc,$file_name,1);
		}
		#VN-------------------	
		$data['title_vi'] = $_POST['title_vi'];
		$data['keywords_vi'] = $_POST['keywords_vi'];
		$data['description_vi'] = $_POST['description_vi'];
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['noidung_vi'] = addslashes($_POST['noidung_vi']);
		
		#EN-------------------	
			
		$data['title_en'] = $_POST['title_en'];
		$data['keywords_en'] = $_POST['keywords_en'];
		$data['description_en'] = $_POST['description_en'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['noidung_en'] = addslashes($_POST['noidung_en']);
				
		#TW-------------------	
		$data['title_ta'] = $_POST['title_ta'];
		$data['keywords_ta'] = $_POST['keywords_ta'];
		$data['description_ta'] = $_POST['description_ta'];
		$data['ten_ta'] = $_POST['ten_ta'];
		$data['noidung_ta'] = addslashes($_POST['noidung_ta']);
				
		#JP-------------------	
		$data['title_ja'] = $_POST['title_ja'];
		$data['keywords_ja'] = $_POST['keywords_ja'];
		$data['description_ja'] = $_POST['description_ja'];
		$data['ten_ja'] = $_POST['ten_ja'];
		$data['noidung_ja'] = addslashes($_POST['noidung_ja']);
		
		#Chung------------------------
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);	
		
		$d->setTable('about');
		if($d->insert($data))
		{			
			redirect("index.php?com=about&act=man");
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=about&act=man");
	}



}

function del_gioithieu()
{
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "delete from #_about where id='".$id."'";
		$d->query($sql);
		}
		if($d->query($sql))
			redirect("index.php?com=about&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=about&act=man");
	
}
?>