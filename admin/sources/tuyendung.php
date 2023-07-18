<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man":
		get_items();
		$template = "tuyendung/items";
		break;
	case "add":
		$template = "tuyendung/item_add";
		break;
	case "capnhat":
		get_item_cn();
		$template = "tuyendung/item_add_c";
		break;
	case "edit":		
		get_item();		
		$template = "tuyendung/item_add";
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
		$template = "tuyendung/cats";
		break;
	case "add_cat":
		$template = "tuyendung/cat_add";
		break;
	case "edit_cat":
		get_cat();
		$template = "tuyendung/cat_add";
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
	
	if(@$_REQUEST['tinnoibat']!='')
	{
	$id_up = @$_REQUEST['tinnoibat'];
	
	$tinnoibat=time();
	
	$sql_sp = "SELECT id,tinnoibat FROM table_tuyendung where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$spdc1=$cats[0]['tinnoibat'];
	//echo "id:". $spdc1;
	if($spdc1==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_tuyendung SET tinnoibat ='".$tinnoibat."' WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_tuyendung SET tinnoibat =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	
	if(@$_REQUEST['hienthi']!='')
	{
	$id_up = @$_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_tuyendung where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	//echo "id:". $spdc1;
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_tuyendung SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_tuyendung SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	
	$sql = "select * from #_tuyendung ";
	if((int)$_REQUEST['id_cat']!='')
	{
	$sql.=" where  	id_cat=".$_REQUEST['id_cat']."";
	}
	$sql.=" order by id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=tuyendung&act=man";
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=tuyendung&act=man");
	
	$sql = "select * from #_tuyendung where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=tuyendung&act=man");
	$item = $d->fetch_array();
}

function get_item_cn(){
	global $d, $item;
	
	$sql = "select * from #_tuyendung order by id asc limit 0,1";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=tuyendung&act=man");
	$item = $d->fetch_array();
}

function save_item(){
	global $d;
	$file_name=fns_Rand_digit(0,9,8);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=tuyendung&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$id =  themdau($_POST['id']);
		
		if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF',_upload_tintuc,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 230,160, _upload_tintuc,$file_name,1);
			$d->setTable('tuyendung');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_tintuc.$row['photo']);
				delete_file(_upload_tintuc.$row['thumb']);
			}
		}
		
		#VN-------------------	
		$data['title_vi'] = magic_quote($_POST['title_vi']);
		$data['keywords_vi'] = magic_quote($_POST['keywords_vi']);
		$data['description_vi'] = magic_quote($_POST['description_vi']);
		$data['ten_vi'] = magic_quote($_POST['ten_vi']);
		$data['mota_vi'] = magic_quote($_POST['mota_vi']);
		$data['noidung_vi'] = magic_quote(($_POST['noidung_vi']));
		
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
		
		#Chung---------------------
		
		$data['id_cat'] = (int)$_POST['id_cat'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('tuyendung');
		$d->setWhere('id', $id);
		if($d->update($data))
				redirect("index.php?com=tuyendung&act=man");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=tuyendung&act=man");
	}else{
		
		if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF',_upload_tintuc,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 230,160, _upload_tintuc,$file_name,1);
		}
		
		#VN-------------------	
		$data['title_vi'] = magic_quote($_POST['title_vi']);
		$data['keywords_vi'] = magic_quote($_POST['keywords_vi']);
		$data['description_vi'] = magic_quote($_POST['description_vi']);
		$data['ten_vi'] = magic_quote($_POST['ten_vi']);
		$data['mota_vi'] = magic_quote($_POST['mota_vi']);
		$data['noidung_vi'] = magic_quote(($_POST['noidung_vi']));
		
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
		
		#Chung------------------------
		
		$data['id_cat'] = (int)$_POST['id_cat'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('tuyendung');
		if($d->insert($data))
			redirect("index.php?com=tuyendung&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=tuyendung&act=man");
	}
}

function delete_item(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		
		$d->reset();
		$sql = "select * from #_tuyendung where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_tintuc.$row['photo']);
				delete_file(_upload_tintuc.$row['thumb']);
			}
			$sql = "delete from #_tuyendung where id='".$id."'";
			$d->query($sql);
		}
		
		if($d->query($sql))
			redirect("index.php?com=tuyendung&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=tuyendung&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=tuyendung&act=man");
}
//===========================================================
function get_cats(){
	global $d, $items, $paging;
	
	if(@$_REQUEST['hienthi']!='')
	{
	$id_up = @$_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_tuyendung_cat where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	//echo "id:". $spdc1;
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_tuyendung_cat SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_tuyendung_cat SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	
	$sql = "select * from #_tuyendung_cat order by stt";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=tuyendung&act=man_cat";
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=tuyendung&act=man_cat");
	
	$sql = "select * from #_tuyendung_cat where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=tuyendung&act=man_cat");
	$item = $d->fetch_array();
}

function save_cat(){
	global $d;
	$file_name_item=fns_Rand_digit(0,9,5);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=tuyendung&act=man_cat");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		
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
		
		#Chung----------------------------
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];		
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;		
		$data['ngaysua'] =time();	
		$d->setTable('tuyendung_cat');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=tuyendung&act=man_cat&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=tuyendung&act=man_cat");
	}else{
		
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
		
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];	
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;		
		$data['ngaytao'] =time();	
		
		$d->setTable('tuyendung_cat');
		if($d->insert($data))
			redirect("index.php?com=tuyendung&act=man_cat");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=tuyendung&act=man_cat");
	}
}

function delete_cat(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();		
		$sql = "delete from #_tuyendung_cat where id='".$id."'";
		if($d->query($sql))
			redirect("index.php?com=tuyendung&act=man_cat");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=tuyendung&act=man_cat");
	}else transfer("Không nhận được dữ liệu", "index.php?com=tuyendung&act=man_cat");
}
?>