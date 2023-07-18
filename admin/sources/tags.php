<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man":
		get_items();
		$template = "tags/items";
		break;
	case "add":
		$template = "tags/item_add";
		break;
	case "edit":
		get_item();
		$template = "tags/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
		#===================================================	

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
	
	
	$sql = "select * from #_tags where type='product' and id<>0";
	$sql."order by id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=tags&act=man";
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item,$id_pros;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=tags&act=man");
	
	$sql = "select * from #_tags where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=tags&act=man");
	$item = $d->fetch_array();
	
	$sql_pro = "select * from #_protag where id_tag='".$id."'";
	$d->query($sql_pro);
	$id_pros = $d->result_array();

}

function save_item(){
	global $d;
	$file_name=fns_Rand_digit(0,9,8);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=tags&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$id =  themdau($_POST['id']);
		
		// hinh anh
		
		// du lieu

		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_ta'] = $_POST['ten_ta'];
		
		
		$d->setTable('tags');
		$d->setWhere('id', $id);
		if($d->update($data))
				redirect("index.php?com=tags&act=man");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=tags&act=man");
	}else{
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=tags&act=man");
	}
}

function delete_item(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		
		// xoa hinh anh
		$d->reset();
		$sql = "select id from #_tags where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			$sql = "delete from #_tags where id='".$id."'";
			$d->query($sql);
		}
		$d->reset();
		$sql = "select id from #_protag where id_tag='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			$sql = "delete from #_protag where id_tag='".$id."'";
			$d->query($sql);
		}
		if($d->query($sql))
			redirect("index.php?com=tags&act=man".$id_catt."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=tags&act=man");
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			$sql = "delete from #_tags where id='".$id."'";
			$d->query($sql);
			$sql = "delete from #_protag where id_tag='".$id."'";
			$d->query($sql);
			
		} redirect("index.php?com=tags&act=man");} else transfer("Không nhận được dữ liệu", "index.php?com=tags&act=man");
}
?>

	
