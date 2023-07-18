<?php	if(!defined('_source')) { die("Error");
}

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$urldanhmuc ="";
$urldanhmuc.= (isset($_REQUEST['id_list'])) ? "&id_list=".addslashes($_REQUEST['id_list']) : "";
$urldanhmuc.= (isset($_REQUEST['id_cat'])) ? "&id_cat=".addslashes($_REQUEST['id_cat']) : "";
$urldanhmuc.= (isset($_REQUEST['id_item'])) ? "&id_item=".addslashes($_REQUEST['id_item']) : "";

$id=isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
switch($act){

case "man":
    get_items();
    $template = "dichvu/items";
    break;
case "add":        
    $template = "dichvu/item_add";
    break;
case "edit":        
    get_item();
    $template = "dichvu/item_add";
    break;
case "save":
    save_item();
    break;
case "delete":
    delete_item();
    break;
    // ===================================================    
case "man_item":
    get_loais();
    $template = "dichvu/loais";
    break;
case "add_item":        
    $template = "dichvu/loai_add";
    break;
case "edit_item":        
    get_loai();
    $template = "dichvu/loai_add";
    break;
case "save_item":
    save_loai();
    break;
case "delete_item":
    delete_loai();
    break;
        
    // ===================================================    
case "man_cat":
    get_cats();
    $template = "dichvu/cats";
    break;
case "add_cat":        
    $template = "dichvu/cat_add";
    break;
case "edit_cat":        
    get_cat();
    $template = "dichvu/cat_add";
    break;
case "save_cat":
    save_cat();
    break;
case "delete_cat":
    delete_cat();
    break;
    // ===================================================    
case "man_list":
    get_lists();
    $template = "dichvu/lists";
    break;
case "add_list":        
    $template = "dichvu/list_add";
    break;
case "edit_list":        
    get_list();
    $template = "dichvu/list_add";
    break;
case "save_list":
    save_list();
    break;
case "delete_list":
    delete_list();
    break;
default:
    $template = "index";
}

// ====================================
function fns_Rand_digit($min,$max,$num)
{
    $result='';
    for($i=0;$i<$num;$i++){
        $result.=rand($min, $max);
    }
    return $result;    
}

function get_items()
{
    global $d, $items, $paging,$urldanhmuc;
    // ----------------------------------------------------------------------------------------
    if(isset($_REQUEST['spbc']) ? $_REQUEST['spbc']: '' !='') {
        $id_up = $_REQUEST['spbc'];
        $sql_sp = "SELECT id,spbc FROM table_dichvu where id='".$id_up."' ";
        $d->query($sql_sp);
        $cats= $d->result_array();
        $time=time();
        $hienthi=$cats[0]['spbc'];
        if($hienthi==0) {
            $sqlUPDATE_ORDER = "UPDATE table_dichvu SET spbc ='$time' WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        else
        {
            $sqlUPDATE_ORDER = "UPDATE table_dichvu SET spbc =0  WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }    
    }
    // ----------------------------------------------------------------------------------------
    if(isset($_REQUEST['noibat']) ? $_REQUEST['noibat']: '' !='') {
        $id_up = $_REQUEST['noibat'];
        $sql_sp = "SELECT id,noibat FROM table_dichvu where id='".$id_up."' ";
        $d->query($sql_sp);
        $cats= $d->result_array();
        $time=time();
        $hienthi=$cats[0]['noibat'];
        if($hienthi==0) {
            $sqlUPDATE_ORDER = "UPDATE table_dichvu SET noibat ='$time' WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        else
        {
            $sqlUPDATE_ORDER = "UPDATE table_dichvu SET noibat =0  WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }    
    }
    // -------------------------------------------------------------------------------
    
    // ----------------------------------------------------------------------------------------
    if(isset($_REQUEST['hienthi']) ? $_REQUEST['hienthi']: '' !='') {
        $id_up = $_REQUEST['hienthi'];
        $sql_sp = "SELECT id,hienthi FROM table_dichvu where id='".$id_up."' ";
        $d->query($sql_sp);
        $cats= $d->result_array();
        $hienthi=$cats[0]['hienthi'];
        if($hienthi==0) {
            $sqlUPDATE_ORDER = "UPDATE table_dichvu SET hienthi =1 WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        else
        {
            $sqlUPDATE_ORDER = "UPDATE table_dichvu SET hienthi =0  WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }    
    }
    // -------------------------------------------------------------------------------
    $sql = "select * from #_dichvu";    
    if((int)isset($_REQUEST['id_list']) ? $_REQUEST['id_list']: '' !='') {
        $sql.=" where  	id_list=".$_REQUEST['id_list']."";
    }
    if((int)isset($_REQUEST['id_cat']) ? $_REQUEST['id_cat']: ''!='') {
        $sql.=" and	id_cat=".$_REQUEST['id_cat']."";
    }
    if((int)isset($_REQUEST['id_item']) ? $_REQUEST['id_item']: ''!='') {
        $sql.=" and	id_item=".$_REQUEST['id_item']."";
    }
    
    if(isset($_REQUEST['keyword']) ? $_REQUEST['keyword']: ''!='') {
        $keyword=addslashes($_REQUEST['keyword']);
        $sql.=" where ten LIKE '%$keyword%'";
    }
    $sql.=" order by stt,id desc";
    
    $d->query($sql);
    $items = $d->result_array();
    
    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url="index.php?com=dichvu&act=man".$urldanhmuc;
    $maxR=20;
    $maxP=20;
    $paging=paging($items, $url, $curPage, $maxR, $maxP);
    $items=$paging['source'];
}

function get_item()
{
    global $d, $item,$ds_tags;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if(!$id) {
        transfer("Không nhận được dữ liệu", "index.php?com=dichvu&act=man");
    }    
    $sql = "select * from #_dichvu where id='".$id."'";
    $d->query($sql);
    if($d->num_rows()==0) { transfer("Dữ liệu không có thực", "index.php?com=dichvu&act=man");
    }
    $item = $d->fetch_array();    
}

function save_item()
{
    global $d;
    $file_name=fns_Rand_digit(0, 9, 12);
    if(empty($_POST)) { transfer("Không nhận được dữ liệu", "index.php?com=dichvu&act=man");
    }
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    
    
    if($id) {
        $id =  themdau($_POST['id']);
        if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|PNG', _upload_dichvu, $file_name)) {
            $data['photo'] = $photo;    
            $data['thumb'] = create_thumb($data['photo'], 1920, 1080, _upload_dichvu, $file_name, 1);        
            $d->setTable('dichvu');
            $d->setWhere('id', $id);
            $d->select();
            if($d->num_rows()>0) {
                $row = $d->fetch_array();
                delete_file(_upload_dichvu.$row['photo']);    
                delete_file(_upload_dichvu.$row['thumb']);                
            }
        }    
        
        // VN-------------------    
        $data['title_vi'] = magic_quote($_POST['title_vi']);
        $data['keywords_vi'] = magic_quote($_POST['keywords_vi']);
        $data['description_vi'] = magic_quote($_POST['description_vi']);
        $data['ten_vi'] = magic_quote($_POST['ten_vi']);
        $data['mota_vi'] = magic_quote($_POST['mota_vi']);
        $data['noidung_vi'] = magic_quote(($_POST['noidung_vi']));
        
        // EN-------------------    
            
        $data['title_en'] = $_POST['title_en'];
        $data['keywords_en'] = $_POST['keywords_en'];
        $data['description_en'] = $_POST['description_en'];
        $data['ten_en'] = $_POST['ten_en'];
        $data['mota_en'] = $_POST['mota_en'];
        $data['noidung_en'] = addslashes($_POST['noidung_en']);
                
        // TW-------------------    
        $data['title_ta'] = isset($_POST['title_ta']);
        $data['keywords_ta'] = isset($_POST['keywords_ta']);
        $data['description_ta'] = isset($_POST['description_ta']);
        $data['ten_ta'] = isset($_POST['ten_ta']);
        $data['mota_ta'] = isset($_POST['mota_ta']);
        $data['noidung_ta'] = addslashes(isset($_POST['noidung_ta']));
                
        // JP-------------------    
        $data['title_ja'] = isset($_POST['title_ja']);
        $data['keywords_ja'] = isset($_POST['keywords_ja']);
        $data['description_ja'] = isset($_POST['description_ja']);
        $data['ten_ja'] = isset($_POST['ten_ja']);
        $data['mota_ja'] = isset($_POST['mota_ja']);
        $data['noidung_ja'] = addslashes(isset($_POST['noidung_ja']));
                             
        $data['id_list'] = (int)isset($_POST['id_list']);            
        $data['id_cat'] = (int)isset($_POST['id_cat']);    
        $data['id_item'] = (int)isset($_POST['id_item']);        
        $data['ten_vi'] = $_POST['ten_vi'];
        $data['masp'] = isset($_POST['masp']);    
        $data['tenkhongdau'] = changeTitle($_POST['ten_vi']);    
        
        $data['gia'] = (int)isset($_POST['gia']);
        $data['giamgia'] = (int)isset($_POST['giamgia']);                    
        
        $data['thongso'] = isset($_POST['thongso']);        
        $data['stt'] = $_POST['stt'];
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['ngaysua'] = time();
        $d->setTable('dichvu');
        $d->setWhere('id', $id);
        if($d->update($data)) {
            redirect("index.php?com=dichvu&act=man&curPage=".$_REQUEST['curPage']."");
        } else {
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=dichvu&act=man");
        }
    }else{
        if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|PNG', _upload_dichvu, $file_name)) {
            $data['photo'] = $photo;        
            $data['thumb'] = create_thumb($data['photo'], 1920, 1080, _upload_dichvu, $file_name, 1);        
        }        
        
        
        // VN-------------------    
        $data['title_vi'] = magic_quote($_POST['title_vi']);
        $data['keywords_vi'] = magic_quote($_POST['keywords_vi']);
        $data['description_vi'] = magic_quote($_POST['description_vi']);
        $data['ten_vi'] = magic_quote($_POST['ten_vi']);
        $data['mota_vi'] = magic_quote($_POST['mota_vi']);
        $data['noidung_vi'] = magic_quote(($_POST['noidung_vi']));
        
        // EN-------------------    
            
        $data['title_en'] = $_POST['title_en'];
        $data['keywords_en'] = $_POST['keywords_en'];
        $data['description_en'] = $_POST['description_en'];
        $data['ten_en'] = $_POST['ten_en'];
        $data['mota_en'] = $_POST['mota_en'];
        $data['noidung_en'] = addslashes($_POST['noidung_en']);
                
        // TW-------------------    
        $data['title_ta'] = $_POST['title_ta'];
        $data['keywords_ta'] = $_POST['keywords_ta'];
        $data['description_ta'] = $_POST['description_ta'];
        $data['ten_ta'] = $_POST['ten_ta'];
        $data['mota_ta'] = $_POST['mota_ta'];
        $data['noidung_ta'] = addslashes($_POST['noidung_ta']);
                
        // JP-------------------    
        $data['title_ja'] = $_POST['title_ja'];
        $data['keywords_ja'] = $_POST['keywords_ja'];
        $data['description_ja'] = $_POST['description_ja'];
        $data['ten_ja'] = $_POST['ten_ja'];
        $data['mota_ja'] = $_POST['mota_ja'];
        $data['noidung_ja'] = addslashes($_POST['noidung_ja']);
        
        $data['id_list'] = (int)$_POST['id_list'];            
        $data['id_cat'] = (int)$_POST['id_cat'];    
        $data['id_item'] = (int)$_POST['id_item'];        
        $data['masp'] = $_POST['masp'];    
        $data['tenkhongdau'] = changeTitle($_POST['ten_vi']);    
        
        $data['gia'] = (int)$_POST['gia'];        
        $data['giamgia'] = (int)$_POST['giamgia'];
            
        $data['thongso'] = $_POST['thongso'];        
        
        $data['stt'] = $_POST['stt'];
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['ngaytao'] = time();
        $d->setTable('dichvu');
        if($d->insert($data)) {            
            redirect("index.php?com=dichvu&act=man");
        }
        else {
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=dichvu&act=man");
        }
    }
}

function delete_item()
{
    global $d;
    if($_REQUEST['id_cat']!='') { $id_catt="&id_cat=".$_REQUEST['id_cat'];
    }
    if($_REQUEST['curPage']!='') { $id_catt.="&curPage=".$_REQUEST['curPage'];
    }
    
    
    if(isset($_GET['id'])) {
        $id =  themdau($_GET['id']);
        $d->reset();
        $sql = "select id,thumb, photo from #_dichvu where id='".$id."'";
        $d->query($sql);
        if($d->num_rows()>0) {
            while($row = $d->fetch_array()){
                delete_file(_upload_dichvu.$row['photo']);
                delete_file(_upload_dichvu.$row['thumb']);            
            }
            $sql = "delete from #_dichvu where id='".$id."'";
            $d->query($sql);
        }
        if($d->query($sql)) {
            redirect("index.php?com=dichvu&act=man".$id_catt."");
        } else {
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=dichvu&act=man");
        }
    }elseif(isset($_GET['listid'])) {
        $listid = explode(",", $_GET['listid']); 
        for ($i=0 ; $i<count($listid); $i++){
            $idTin=$listid[$i]; 
            $id =  themdau($idTin);        
            $d->reset();
            $sql = "delete from #_dichvu where id='".$id."'";
            $d->query($sql);
        }
        redirect("index.php?com=dichvu&act=man".$id_catt."");
    }
}

// ====================================
function get_cats()
{
    global $d, $items, $paging;
    
    // ----------------------------------------------------------------------------------------
    if($_REQUEST['noibat']!='') {
        $id_up = $_REQUEST['noibat'];
        $sql_sp = "SELECT id,noibat FROM table_dichvu_cat where id='".$id_up."' ";
        $d->query($sql_sp);
        $cats= $d->result_array();
        $time=time();
        $hienthi=$cats[0]['noibat'];
        if($hienthi==0) {
            $sqlUPDATE_ORDER = "UPDATE table_dichvu_cat SET noibat ='$time' WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        else
        {
            $sqlUPDATE_ORDER = "UPDATE table_dichvu_cat SET noibat =0  WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }    
    }
    // -------------------------------------------------------------------------------
    
    // ----------------------------------------------------------------------------------------
    if($_REQUEST['hienthi']!='') {
        $id_up = $_REQUEST['hienthi'];
        $sql_sp = "SELECT id,hienthi FROM table_dichvu_cat where id='".$id_up."' ";
        $d->query($sql_sp);
        $cats= $d->result_array();
        $hienthi=$cats[0]['hienthi'];
        if($hienthi==0) {
            $sqlUPDATE_ORDER = "UPDATE table_dichvu_cat SET hienthi =1 WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        else
        {
            $sqlUPDATE_ORDER = "UPDATE table_dichvu_cat SET hienthi =0  WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }    
    }
    
    
    $sql = "select * from #_dichvu_cat";
        
    if((int)$_REQUEST['id_list']!='') {
        $sql.=" where id_list=".$_REQUEST['id_list']."";
    }
    $sql.=" order by stt";
    
    $d->query($sql);
    $items = $d->result_array();
    
    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url="index.php?com=dichvu&act=man_cat";
    $maxR=20;
    $maxP=10;
    $paging=paging($items, $url, $curPage, $maxR, $maxP);
    $items=$paging['source'];
}

function get_cat()
{
    global $d, $item;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if(!$id) {
        transfer("Không nhận được dữ liệu", "index.php?com=dichvu&act=man_cat");
    }
    
    $sql = "select * from #_dichvu_cat where id='".$id."'";
    $d->query($sql);
    if($d->num_rows()==0) { transfer("Dữ liệu không có thực", "index.php?com=dichvu&act=man_cat");
    }
    $item = $d->fetch_array();
}

function save_cat()
{
    global $d;
    $file_name=fns_Rand_digit(0, 9, 12);
    if(empty($_POST)) { transfer("Không nhận được dữ liệu", "index.php?com=dichvu&act=man_cat");
    }
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if($id) {        
        $data['ten_vi'] = $_POST['ten_vi'];
        $data['ten_en'] = $_POST['ten_en'];
        $data['title_vi'] = magic_quote($_POST['title_vi']);
        $data['keywords_vi'] = magic_quote($_POST['keywords_vi']);
        $data['description_vi'] = magic_quote($_POST['description_vi']);
        $data['tenkhongdau'] = changeTitle($_POST['ten_vi']);        
        $data['id_list'] = $_POST['id_list'];            
        $data['stt'] = $_POST['stt'];
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['ngaysua'] = time();
        
        $d->setTable('dichvu_cat');
        $d->setWhere('id', $id);
        if($d->update($data)) {
            redirect("index.php?com=dichvu&act=man_cat&curPage=".$_REQUEST['curPage']."");
        } else {
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=dichvu&act=man_cat");
        }
    }else{        
        $data['id_list'] = $_POST['id_list'];
        $data['ten_vi'] = $_POST['ten_vi'];
        $data['ten_en'] = $_POST['ten_en'];
        $data['title_vi'] = magic_quote($_POST['title_vi']);
        $data['keywords_vi'] = magic_quote($_POST['keywords_vi']);
        $data['description_vi'] = magic_quote($_POST['description_vi']);
        $data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
        $data['stt'] = $_POST['stt'];
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['ngaytao'] = time();
        
        $d->setTable('dichvu_cat');
        if($d->insert($data)) {
            redirect("index.php?com=dichvu&act=man_cat");
        } else {
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=dichvu&act=man_cat");
        }
    }
}

function delete_cat()
{
    global $d;
    if(isset($_GET['id'])) {
        $id =  themdau($_GET['id']);        
        $d->reset();        
        
        $sql = "delete from #_dichvu_cat where id='".$id."'";
        $d->query($sql);
        
        
        if($d->query($sql)) {
            redirect("index.php?com=dichvu&act=man_cat");
        } else {
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=dichvu&act=man_cat");
        }
    }else { transfer("Không nhận được dữ liệu", "index.php?com=dichvu&act=man_cat");
    }
}
/*---------------------------------*/
function get_loais()
{
    global $d, $items, $paging;
    // ----------------------------------------------------------------------------------------
    if($_REQUEST['hienthi']!='') {
        $id_up = $_REQUEST['hienthi'];
        $sql_sp = "SELECT id,hienthi FROM table_dichvu_item where id='".$id_up."' ";
        $d->query($sql_sp);
        $cats= $d->result_array();
        $hienthi=$cats[0]['hienthi'];
        if($hienthi==0) {
            $sqlUPDATE_ORDER = "UPDATE table_dichvu_item SET hienthi =1 WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        else
        {
            $sqlUPDATE_ORDER = "UPDATE table_dichvu_item SET hienthi =0  WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }    
    }
    
    $sql = "select * from #_dichvu_item";
        
    if((int)$_REQUEST['id_list']!='') {
        $sql.=" where id_list=".$_REQUEST['id_list']."";
    }
    $sql.=" order by stt";
    
    $d->query($sql);
    $items = $d->result_array();
    
    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url="index.php?com=dichvu&act=man_item";
    $maxR=20;
    $maxP=10;
    $paging=paging($items, $url, $curPage, $maxR, $maxP);
    $items=$paging['source'];
}

function get_loai()
{
    global $d, $item;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if(!$id) {
        transfer("Không nhận được dữ liệu", "index.php?com=dichvu&act=man_item");
    }
    
    $sql = "select * from #_dichvu_item where id='".$id."'";
    $d->query($sql);
    if($d->num_rows()==0) { transfer("Dữ liệu không có thực", "index.php?com=dichvu&act=man_item");
    }
    $item = $d->fetch_array();
}

function save_loai()
{
    global $d;
    $file_name=fns_Rand_digit(0, 9, 12);
    if(empty($_POST)) { transfer("Không nhận được dữ liệu", "index.php?com=dichvu&act=man_item");
    }
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if($id) {        
        $data['ten'] = $_POST['ten'];
        $data['tenkhongdau'] = changeTitle($_POST['ten']);        
        $data['id_list'] = $_POST['id_list'];    
        $data['id_cat']= $_POST['id_cat'];            
        $data['stt'] = $_POST['stt'];
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['ngaysua'] = time();
        
        $d->setTable('dichvu_item');
        $d->setWhere('id', $id);
        if($d->update($data)) {
            redirect("index.php?com=dichvu&act=man_item&curPage=".$_REQUEST['curPage']."");
        } else {
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=dichvu&act=man_item");
        }
    }else{        
        $data['id_list'] = $_POST['id_list'];
        $data['id_cat']= $_POST['id_cat'];    
        $data['ten'] = $_POST['ten'];
        $data['tenkhongdau'] = changeTitle($_POST['ten']);
        $data['stt'] = $_POST['stt'];
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['ngaytao'] = time();
        
        $d->setTable('dichvu_item');
        if($d->insert($data)) {
            redirect("index.php?com=dichvu&act=man_item");
        } else {
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=dichvu&act=man_item");
        }
    }
}

function delete_loai()
{
    global $d;
    if(isset($_GET['id'])) {
        $id =  themdau($_GET['id']);        
        $d->reset();        
        
        $sql = "delete from #_dichvu_item where id='".$id."'";
        $d->query($sql);
        
        
        if($d->query($sql)) {
            redirect("index.php?com=dichvu&act=man_item");
        } else {
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=dichvu&act=man_item");
        }
    }else { transfer("Không nhận được dữ liệu", "index.php?com=dichvu&act=man_item");
    }
}
/*---------------------------------*/
function get_lists()
{
    global $d, $items, $paging;
    
    // ----------------------------------------------------------------------------------------
    if($_REQUEST['hienthi']!='') {
        $id_up = $_REQUEST['hienthi'];
        $sql_sp = "SELECT id,hienthi FROM table_dichvu_list where id='".$id_up."' ";
        $d->query($sql_sp);
        $cats= $d->result_array();
        $hienthi=$cats[0]['hienthi'];
        if($hienthi==0) {
            $sqlUPDATE_ORDER = "UPDATE table_dichvu_list SET hienthi =1 WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        else
        {
            $sqlUPDATE_ORDER = "UPDATE table_dichvu_list SET hienthi =0  WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }    
    }
    
    $sql = "select * from #_dichvu_list";            
    $sql.=" order by stt,id desc";
    
    $d->query($sql);
    $items = $d->result_array();
    
    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url="index.php?com=dichvu&act=man_list";
    $maxR=20;
    $maxP=10;
    $paging=paging($items, $url, $curPage, $maxR, $maxP);
    $items=$paging['source'];
}

function get_list()
{
    global $d, $item;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if(!$id) {
        transfer("Không nhận được dữ liệu", "index.php?com=dichvu&act=man_list");
    }    
    $sql = "select * from #_dichvu_list where id='".$id."'";
    $d->query($sql);
    if($d->num_rows()==0) { transfer("Dữ liệu không có thực", "index.php?com=dichvu&act=man_list");
    }
    $item = $d->fetch_array();    
}

function save_list()
{
    global $d;
    $file_name=fns_Rand_digit(0, 9, 12);
    if(empty($_POST)) { transfer("Không nhận được dữ liệu", "index.php?com=dichvu&act=man_list");
    }
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if($id) {    
    
        if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product, $file_name)) {
            $data['photo'] = $photo;    
            $data['thumb'] = create_thumb($data['photo'], 180, 100, _upload_product, $file_name, 1);        
            $d->setTable('product_list');
            $d->setWhere('id', $id);
            $d->select();
            if($d->num_rows()>0) {
                $row = $d->fetch_array();
                delete_file(_upload_product.$row['photo']);    
                delete_file(_upload_product.$row['thumb']);                
            }
        }        
                    
        $data['ten_vi'] = $_POST['ten_vi'];
        $data['ten_en'] = $_POST['ten_en'];
        $data['ten_ta'] = $_POST['ten_ta'];
        $data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
        $data['stt'] = $_POST['stt'];
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['ngaysua'] = time();
        
        // VN-------------------    
        $data['title_vi'] = $_POST['title_vi'];
        $data['keywords_vi'] = $_POST['keywords_vi'];
        $data['description_vi'] = $_POST['description_vi'];
        
        // EN-------------------    
            
        $data['title_en'] = $_POST['title_en'];
        $data['keywords_en'] = $_POST['keywords_en'];
        $data['description_en'] = $_POST['description_en'];
                
        // TW-------------------    
        $data['title_ta'] = $_POST['title_ta'];
        $data['keywords_ta'] = $_POST['keywords_ta'];
        $data['description_ta'] = $_POST['description_ta'];
        
        
        
        $d->setTable('dichvu_list');
        $d->setWhere('id', $id);
        if($d->update($data)) {
            redirect("index.php?com=dichvu&act=man_list&curPage=".$_REQUEST['curPage']."");
        } else {
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=dichvu&act=man_list");
        }
    }else{    
    
    
        if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product, $file_name)) {
            $data['photo'] = $photo;        
            $data['thumb'] = create_thumb($data['photo'], 180, 100, _upload_product, $file_name, 1);        
        }                
        $data['ten_vi'] = $_POST['ten_vi'];
        $data['ten_en'] = $_POST['ten_en'];
        $data['ten_ta'] = $_POST['ten_ta'];
        $data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
        $data['stt'] = $_POST['stt'];
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['ngaytao'] = time();
        
        // VN-------------------    
        $data['title_vi'] = $_POST['title_vi'];
        $data['keywords_vi'] = $_POST['keywords_vi'];
        $data['description_vi'] = $_POST['description_vi'];
        
        // EN-------------------    
            
        $data['title_en'] = $_POST['title_en'];
        $data['keywords_en'] = $_POST['keywords_en'];
        $data['description_en'] = $_POST['description_en'];
                
        // TW-------------------    
        $data['title_ta'] = $_POST['title_ta'];
        $data['keywords_ta'] = $_POST['keywords_ta'];
        $data['description_ta'] = $_POST['description_ta'];
        
        $d->setTable('dichvu_list');
        if($d->insert($data)) {
            redirect("index.php?com=dichvu&act=man_list");
        } else {
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=dichvu&act=man_list");
        }
    }
}

function delete_list()
{
    global $d;
    if(isset($_GET['id'])) {
        $id =  themdau($_GET['id']);        
        $d->reset();        
        
        $sql = "delete from #_dichvu_list where id='".$id."'";
        $d->query($sql);
        
        
        if($d->query($sql)) {
            redirect("index.php?com=dichvu&act=man_list");
        } else {
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=dichvu&act=man_list");
        }
    }else { transfer("Không nhận được dữ liệu", "index.php?com=dichvu&act=man_list");
    }
}
