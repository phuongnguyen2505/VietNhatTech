<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man":
		get_items();
		$template = "hinhanh/items";
		break;
	case "add":
		$template = "hinhanh/item_add";
		break;
	case "edit":		
		get_item();		
		$template = "hinhanh/item_edit";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	#===================================================	
	case "man_cat":
		get_cats();
		$template = "hinhanh/cats";
		break;
	case "add_cat":
		$template = "hinhanh/cat_add";
		break;
	case "edit_cat":
		get_cat();
		$template = "hinhanh/cat_add";
		break;
	case "save_cat":
		save_cat();
		break;
	case "delete_cat":
		delete_cat();
		break;
	default:
		$template = "index";

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


function get_items(){
	global $d, $items, $paging;
	
	//$idc=$_GET['idc'];
	//if($idc!=""){
		if(@$_REQUEST['update']!='')
		{
		$id_up = @$_REQUEST['update'];
		
		$tinnoibat=time();
		
		$sql_sp = "SELECT id,tinnoibat,photo FROM table_hinhanh where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$spdc1=$cats[0]['tinnoibat'];
		//echo "id:". $spdc1;
		if($spdc1==0)
		{
		$sqlUPDATE_ORDER = "UPDATE table_hinhanh SET tinnoibat ='".$tinnoibat."' WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
		$sqlUPDATE_ORDER = "UPDATE table_hinhanh SET tinnoibat =0  WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	
		}	
		}
		
		if(@$_REQUEST['hienthi']!='')
		{
		$id_up = @$_REQUEST['hienthi'];
		$sql_sp = "SELECT id,hienthi,photo FROM table_hinhanh where id='".$id_up."'";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$hienthi=$cats[0]['hienthi'];
		//echo "id:". $spdc1;
		if($hienthi==0)
		{
		$sqlUPDATE_ORDER = "UPDATE table_hinhanh SET hienthi =1 WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
		$sqlUPDATE_ORDER = "UPDATE table_hinhanh SET hienthi =0  WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	
		}	
		}
		
		$sql = "select * from #_hinhanh";
		$d->query($sql);
		$items = $d->result_array();
		
		$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
		$url="index.php?com=hinhanh&act=man";
		$maxR=10;
		$maxP=4;
		$paging=paging($items, $url, $curPage, $maxR, $maxP);
		$items=$paging['source'];
	//}
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=hinhanh&act=man");
	
	$sql = "select * from #_hinhanh where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=hinhanh&act=man");
	$item = $d->fetch_array();
}

function save_item(){
	
	global $d;
	$file_name=fns_Rand_digit(0,9,10);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=hinhanh&act=man&idc=".$_REQUEST['idc']."");
	
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){ // cap nhat
		
			if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|Jpg|JPEG', _upload_thuvienanh,$file_name)){
				$data['photo'] = $photo;
				$data['thumb'] = create_thumb($data['photo'], 275, 170, _upload_thuvienanh,$file_name,1);
				$d->setTable('hinhanh');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload.$row['photo']);
					delete_file(_upload.$row['thumb']);					
				}
			}
			$data['id'] = $_REQUEST['id'];
			$data['ten_vi'] = $_POST['ten_vi'];
			$data['ten_en'] = $_POST['ten_en'];
			$data['link'] = $_POST['link'];
			$data['stt'] = $_POST['stt'];
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$d->reset();
			$d->setTable('hinhanh');
			$d->setWhere('id', $id);
			if(!$d->update($data)) transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=hinhanh&act=man&idc=".$_REQUEST['idc']."");
			redirect("index.php?com=hinhanh&act=man&idc=".$_REQUEST['idc']."");
			
	}{ // them moi
		
			for($i=0; $i<5; $i++){
				if($photo = upload_image("file".$i, 'jpg|png|gif|JPG|jpeg|Jpg|JPEG', _upload_thuvienanh,$file_name.$i))
					{

						$data['photo'] = $photo;
						$data['thumb'] = create_thumb($data['photo'], 275, 170, _upload_thuvienanh,$file_name.$i,1);
						
						$data['ten_vi'] = $_POST['ten_vi'.$i];
						$data['ten_en'] = $_POST['ten_en'.$i];
						$data['stt'] = $_POST['stt'.$i];
						
						$data['hienthi'] = isset($_POST['hienthi'.$i]) ? 1 : 0;
						
						$data['id_cat'] = $_REQUEST['idc'];
						
						$d->setTable('hinhanh');
						if(!$d->insert($data)) transfer("Lưu dữ liệu thành công", "index.php?com=hinhanh&act=man&idc=".$_REQUEST['idc']."");
					}else{

						transfer("Lưu dữ liệu thành công", "index.php?com=hinhanh&act=man&idc=".$_REQUEST['idc']."");
					}
			}
			redirect("index.php?com=hinhanh&act=man&idc=".$_REQUEST['idc']."");
	}

}

function delete_item(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		
		$d->reset();
		$sql = "select * from #_hinhanh where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_thuvienanh.$row['photo']);
				delete_file(_upload_thuvienanh.$row['thumb']);
			}
			$sql = "delete from #_hinhanh where id='".$id."'";
			$d->query($sql);
		}
		$idc=$_GET['idc'];
		if($d->query($sql))
			redirect("index.php?com=hinhanh&act=man&idc=$idc");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=hinhanh&act=man$idc");
	}else transfer("Không nhận được dữ liệu", "index.php?com=hinhanh&act=man$idc");
}
//===========================================================
function get_cats(){
	global $d, $items, $paging;
	
	if(@$_REQUEST['hienthi']!='')
		{
		$id_up = @$_REQUEST['hienthi'];
		$sql_sp = "SELECT id,hienthi,photo FROM table_hinhanh_cat where id='".$id_up."'";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$hienthi=$cats[0]['hienthi'];
		//echo "id:". $spdc1;
		if($hienthi==0)
		{
		$sqlUPDATE_ORDER = "UPDATE table_hinhanh_cat SET hienthi =1 WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
		$sqlUPDATE_ORDER = "UPDATE table_hinhanh_cat SET hienthi =0  WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	
		}	
		}
	
	$sql = "select * from #_hinhanh_cat order by stt";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=hinhanh&act=man_cat";
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=hinhanh&act=man_cat");
	
	$sql = "select * from #_hinhanh_cat where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=hinhanh&act=man_cat");
	$item = $d->fetch_array();
}

function save_cat(){
	global $d;
	$file_name_item=fns_Rand_digit(0,9,5);
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=hinhanh&act=man_cat");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|PNG', _upload_thuvienanh,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 200, 150, _upload_thuvienanh,$file_name,1);		
			$d->setTable('hinhanh_cat');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_thuvienanh.$row['photo']);	
				delete_file(_upload_thuvienanh.$row['thumb']);				
			}
		}		
		
		#VN-------------------	
		$data['title_vi'] = $_POST['title_vi'];
		$data['keywords_vi'] = $_POST['keywords_vi'];
		$data['description_vi'] = $_POST['description_vi'];
		$data['ten_vi'] = $_POST['ten_vi'];
		
		#EN-------------------	
			
		$data['title_en'] = $_POST['title_en'];
		$data['keywords_en'] = $_POST['keywords_en'];
		$data['description_en'] = $_POST['description_en'];
		$data['ten_en'] = $_POST['ten_en'];
				
		#TW-------------------	
		$data['title_ta'] = $_POST['title_ta'];
		$data['keywords_ta'] = $_POST['keywords_ta'];
		$data['description_ta'] = $_POST['description_ta'];
		$data['ten_ta'] = $_POST['ten_ta'];
				
		#JP-------------------	
		$data['title_ja'] = $_POST['title_ja'];
		$data['keywords_ja'] = $_POST['keywords_ja'];
		$data['description_ja'] = $_POST['description_ja'];
		$data['ten_ja'] = $_POST['ten_ja'];
		
		#Chung----------------------
		
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];		
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;		
		$data['ngaysua'] =time();	
		$d->setTable('hinhanh_cat');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=hinhanh&act=man_cat&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=hinhanh&act=man_cat");
	}else{
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|PNG', _upload_thuvienanh,$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 200, 150, _upload_thuvienanh,$file_name,1);		
		}	
		
		#VN-------------------	
		$data['title_vi'] = $_POST['title_vi'];
		$data['keywords_vi'] = $_POST['keywords_vi'];
		$data['description_vi'] = $_POST['description_vi'];
		$data['ten_vi'] = $_POST['ten_vi'];
		
		#EN-------------------	
			
		$data['title_en'] = $_POST['title_en'];
		$data['keywords_en'] = $_POST['keywords_en'];
		$data['description_en'] = $_POST['description_en'];
		$data['ten_en'] = $_POST['ten_en'];
				
		#TW-------------------	
		$data['title_ta'] = $_POST['title_ta'];
		$data['keywords_ta'] = $_POST['keywords_ta'];
		$data['description_ta'] = $_POST['description_ta'];
		$data['ten_ta'] = $_POST['ten_ta'];
				
		#JP-------------------	
		$data['title_ja'] = $_POST['title_ja'];
		$data['keywords_ja'] = $_POST['keywords_ja'];
		$data['description_ja'] = $_POST['description_ja'];
		$data['ten_ja'] = $_POST['ten_ja'];
		
		#Chung
		
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];	
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;		
		$data['ngaytao'] =time();	
		
		$d->setTable('hinhanh_cat');
		if($d->insert($data))
			redirect("index.php?com=hinhanh&act=man_cat");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=hinhanh&act=man_cat");
	}
}

function delete_cat(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		
		$d->reset();
		$sql = "select * from #_hinhanh_cat where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_thuvienanh.$row['photo']);
				delete_file(_upload_thuvienanh.$row['thumb']);
			}
			$sql = "delete from #_hinhanh_cat where id='".$id."'";
			$d->query($sql);
		}
	
		if($d->query($sql))
			redirect("index.php?com=hinhanh&act=man_cat");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=hinhanh&act=man_cat");
	}else transfer("Không nhận được dữ liệu", "index.php?com=hinhanh&act=man_cat");
}
?>