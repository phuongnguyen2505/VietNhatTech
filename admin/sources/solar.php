<?php	if(!defined('_source')) { die("Error");
}

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
case "man":
    get_items();
    $template = "solar/items";
    break;
case "add":
    $template = "solar/item_add";
    break;
case "edit":        
    get_item();        
    $template = "solar/item_add";
    break;
case "save":
    save_item();
    break;
case "delete":
    delete_item();
    break;
    // ===================================================    
case "man_cat":
    get_cats();
    $template = "solar/cats";
    break;
case "add_cat":
    $template = "solar/cat_add";
    break;
case "edit_cat":
    get_cat();
    $template = "solar/cat_add";
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
        $result.=rand($min, $max);
    }
    return $result;    
}


function get_items()
{
    global $d, $items, $paging;
    
    if(@$_REQUEST['tinnoibat']!='') {
        $id_up = @$_REQUEST['tinnoibat'];
    
        $tinnoibat=time();
    
        $sql_sp = "SELECT id,tinnoibat FROM table_news where id='".$id_up."' ";
        $d->query($sql_sp);
        $cats= $d->result_array();
        $spdc1=$cats[0]['tinnoibat'];
        //echo "id:". $spdc1;
        if($spdc1==0) {
            $sqlUPDATE_ORDER = "UPDATE table_news SET tinnoibat ='".$tinnoibat."' WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        else
        {
            $sqlUPDATE_ORDER = "UPDATE table_news SET tinnoibat =0  WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

        }    
    }
    
    if(@$_REQUEST['hienthi']!='') {
        $id_up = @$_REQUEST['hienthi'];
        $sql_sp = "SELECT id,hienthi FROM table_news where id='".$id_up."' ";
        $d->query($sql_sp);
        $cats= $d->result_array();
        $hienthi=$cats[0]['hienthi'];
        //echo "id:". $spdc1;
        if($hienthi==0) {
            $sqlUPDATE_ORDER = "UPDATE table_news SET hienthi =1 WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        else
        {
            $sqlUPDATE_ORDER = "UPDATE table_news SET hienthi =0  WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

        }    
    }
    
    $sql = "select * from #_news where loaitin='solar' ";
    if((int)isset($_REQUEST['id_cat'])!='') {
        $sql.=" and id_cat=".$_REQUEST['id_cat']."";
    }
    $sql.=" order by id desc";
    
    $d->query($sql);
    $items = $d->result_array();
    
    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url="index.php?com=solar&act=man";
    $maxR=20;
    $maxP=4;
    $paging=paging($items, $url, $curPage, $maxR, $maxP);
    $items=$paging['source'];
}

function get_item()
{
    global $d, $item;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if(!$id) {
        transfer("Không nhận được dữ liệu", "index.php?com=solar&act=man");
    }
    
    $sql = "select * from #_news where id='".$id."'";
    $d->query($sql);
    if($d->num_rows()==0) { transfer("Dữ liệu không có thực", "index.php?com=solar&act=man");
    }
    $item = $d->fetch_array();
}

function save_item()
{
    global $d;
    $file_name=fns_Rand_digit(0, 9, 8);
    if(empty($_POST)) { transfer("Không nhận được dữ liệu", "index.php?com=solar&act=man");
    }
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if($id) {
        $id =  themdau($_POST['id']);
        
        if($photo = upload_image("file", 'jpg|png|gif|GIF|JPG|PNG|JPEG|jpeg', _upload_tintuc, $file_name)) {
            $data['photo'] = $photo;
            $data['thumb'] = create_thumb($data['photo'], 210, 230, _upload_tintuc, $file_name, 2);
            $d->setTable('news');
            $d->setWhere('id', $id);
            $d->select();
            if($d->num_rows()>0) {
                $row = $d->fetch_array();
                delete_file(_upload_tintuc.$row['photo']);
                delete_file(_upload_tintuc.$row['thumb']);
            }
        }
        $ext = end((explode('.', $_FILES['file1']['name'])));
        $name = basename($_FILES['file1']['name'], '.'.$ext);
        if($file = upload_image("file1", 'doc|xls|pdf|dwg|docx|xlsx|DOC|XLSX|XLS|PDF|DWG|DOCX', _upload_tintuc, changeTitle($name))) {
            $data['file'] = $file;
            
            $d->setTable('news');
            $d->setWhere('id', $id);
            $d->select();
            if($d->num_rows()>0) {
                $row = $d->fetch_array();
                delete_file(_upload_tintuc.$row['file']);
            }
        }
        // VN-------------------    
        $data['title_vi'] = $_POST['title_vi'];
        $data['keywords_vi'] = $_POST['keywords_vi'];
        $data['description_vi'] = $_POST['description_vi'];
        $data['ten_vi'] = $_POST['ten_vi'];
        $data['mota_vi'] = $_POST['mota_vi'];
        $data['noidung_vi'] = addslashes($_POST['noidung_vi']);
        
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
        
        // Chung---------------------
        
        $data['id_cat'] = (int)isset($_POST['id_cat']);
        $data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
        $data['stt'] = $_POST['stt'];
        $data['loaitin'] = 'solar';
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['ngaysua'] = time();
        
        $d->setTable('news');
        $d->setWhere('id', $id);
        if($d->update($data)) {
            redirect("index.php?com=solar&act=man");
        } else {
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=solar&act=man");
        }
    }else{
        
        if($photo = upload_image("file", 'jpg|png|gif|GIF|JPG|PNG|JPEG|jpeg', _upload_tintuc, $file_name)) {
            $data['photo'] = $photo;
            $data['thumb'] = create_thumb($data['photo'], 210, 230, _upload_tintuc, $file_name, 2);
        }
        $ext = end((explode('.', $_FILES['file1']['name'])));
        $name = basename($_FILES['file1']['name'], '.'.$ext);
        if($file = upload_image("file1", 'doc|xls|pdf|dwg|docx|xlsx|DOC|XLSX|XLS|PDF|DWG|DOCX', _upload_tintuc, changeTitle($name))) {
            $data['file'] = $file;
            
        }
        // VN-------------------    
        $data['title_vi'] = $_POST['title_vi'];
        $data['keywords_vi'] = $_POST['keywords_vi'];
        $data['description_vi'] = $_POST['description_vi'];
        $data['ten_vi'] = $_POST['ten_vi'];
        $data['mota_vi'] = $_POST['mota_vi'];
        $data['noidung_vi'] = addslashes($_POST['noidung_vi']);
        
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
        
        // Chung------------------------
        
        $data['id_cat'] = (int)$_POST['id_cat'];
        $data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
        $data['stt'] = $_POST['stt'];
        $data['loaitin'] = 'solar';
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['ngaytao'] = time();
        
        $d->setTable('news');
        if($d->insert($data)) {
            redirect("index.php?com=solar&act=man");
        } else {
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=solar&act=man");
        }
    }
}

function delete_item()
{
    global $d;
    
    if(isset($_GET['id'])) {
        $id =  themdau($_GET['id']);
        
        $d->reset();
        $sql = "select * from #_news where id='".$id."'";
        $d->query($sql);
        if($d->num_rows()>0) {
            while($row = $d->fetch_array()){
                delete_file(_upload_tintuc.$row['photo']);
                delete_file(_upload_tintuc.$row['thumb']);
            }
            $sql = "delete from #_news where id='".$id."'";
            $d->query($sql);
        }
        
        if($d->query($sql)) {
            redirect("index.php?com=solar&act=man");
        } else {
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=solar&act=man");
        }
    }elseif(isset($_GET['listid'])) {
        $listid = explode(",", $_GET['listid']); 
        for ($i=0 ; $i<count($listid); $i++){
            $idTin=$listid[$i]; 
            $id =  themdau($idTin);        
            $d->reset();
            $sql = "delete from #_news where id='".$id."'";
            $d->query($sql);
        }
        redirect("index.php?com=solar&act=man".$id_catt."");
    }
}
//===========================================================
function get_cats()
{
    global $d, $items, $paging;
    
    if(@$_REQUEST['hienthi']!='') {
        $id_up = @$_REQUEST['hienthi'];
        $sql_sp = "SELECT id,hienthi FROM table_news_cat where id='".$id_up."' ";
        $d->query($sql_sp);
        $cats= $d->result_array();
        $hienthi=$cats[0]['hienthi'];
        //echo "id:". $spdc1;
        if($hienthi==0) {
            $sqlUPDATE_ORDER = "UPDATE table_news_cat SET hienthi =1 WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        else
        {
            $sqlUPDATE_ORDER = "UPDATE table_news_cat SET hienthi =0  WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

        }    
    }
    
    $sql = "select * from #_news_cat where com='solar'  order by stt";
    $d->query($sql);
    $items = $d->result_array();
    
    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url="index.php?com=solar&act=man_cat";
    $maxR=20;
    $maxP=4;
    $paging=paging($items, $url, $curPage, $maxR, $maxP);
    $items=$paging['source'];
}

function get_cat()
{
    global $d, $item;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if(!$id) {
        transfer("Không nhận được dữ liệu", "index.php?com=solar&act=man_cat");
    }
    
    $sql = "select * from #_news_cat where id='".$id."'";
    $d->query($sql);
    if($d->num_rows()==0) { transfer("Dữ liệu không có thực", "index.php?com=solar&act=man_cat");
    }
    $item = $d->fetch_array();
}

function save_cat()
{
    global $d;
    $file_name_item=fns_Rand_digit(0, 9, 5);
    if(empty($_POST)) { transfer("Không nhận được dữ liệu", "index.php?com=solar&act=man_cat");
    }
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if($id) {
        
        // VN-------------------    
        $data['title_vi'] = $_POST['title_vi'];
        $data['keywords_vi'] = $_POST['keywords_vi'];
        $data['description_vi'] = $_POST['description_vi'];
        $data['ten_vi'] = $_POST['ten_vi'];
        
        // EN-------------------    
            
        $data['title_en'] = $_POST['title_en'];
        $data['keywords_en'] = $_POST['keywords_en'];
        $data['description_en'] = $_POST['description_en'];
        $data['ten_en'] = $_POST['ten_en'];
                
        // TW-------------------    
        $data['title_ta'] = $_POST['title_ta'];
        $data['keywords_ta'] = $_POST['keywords_ta'];
        $data['description_ta'] = $_POST['description_ta'];
        $data['ten_ta'] = $_POST['ten_ta'];
                
        // JP-------------------    
        $data['title_ja'] = $_POST['title_ja'];
        $data['keywords_ja'] = $_POST['keywords_ja'];
        $data['description_ja'] = $_POST['description_ja'];
        $data['ten_ja'] = $_POST['ten_ja'];
        
        // Chung----------------------------
        $data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
        $data['stt'] = $_POST['stt'];    
        $data['com'] = 'solar';        
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;        
        $data['ngaysua'] =time();    
        $d->setTable('news_cat');
        $d->setWhere('id', $id);
        if($d->update($data)) {
            redirect("index.php?com=solar&act=man_cat&curPage=".$_REQUEST['curPage']."");
        } else {
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=solar&act=man_cat");
        }
    }else{
        
        // VN-------------------    
        $data['title_vi'] = $_POST['title_vi'];
        $data['keywords_vi'] = $_POST['keywords_vi'];
        $data['description_vi'] = $_POST['description_vi'];
        $data['ten_vi'] = $_POST['ten_vi'];
        
        // EN-------------------    
            
        $data['title_en'] = $_POST['title_en'];
        $data['keywords_en'] = $_POST['keywords_en'];
        $data['description_en'] = $_POST['description_en'];
        $data['ten_en'] = $_POST['ten_en'];
                
        // TW-------------------    
        $data['title_ta'] = $_POST['title_ta'];
        $data['keywords_ta'] = $_POST['keywords_ta'];
        $data['description_ta'] = $_POST['description_ta'];
        $data['ten_ta'] = $_POST['ten_ta'];
                
        // JP-------------------    
        $data['title_ja'] = $_POST['title_ja'];
        $data['keywords_ja'] = $_POST['keywords_ja'];
        $data['description_ja'] = $_POST['description_ja'];
        $data['ten_ja'] = $_POST['ten_ja'];
        
        $data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
        $data['stt'] = $_POST['stt'];
        $data['com'] = 'solar';        
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;        
        $data['ngaytao'] =time();    
        
        $d->setTable('news_cat');
        if($d->insert($data)) {
            redirect("index.php?com=solar&act=man_cat");
        } else {
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=solar&act=man_cat");
        }
    }
}

function delete_cat()
{
    global $d;
    if(isset($_GET['id'])) {
        $id =  themdau($_GET['id']);
        $d->reset();        
        $sql = "delete from #_news_cat where id='".$id."'";
        if($d->query($sql)) {
            redirect("index.php?com=solar&act=man_cat");
        } else {
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=solar&act=man_cat");
        }
    }else { transfer("Không nhận được dữ liệu", "index.php?com=solar&act=man_cat");
    }
}
?>