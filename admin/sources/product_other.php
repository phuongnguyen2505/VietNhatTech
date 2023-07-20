<?php	if(!defined('_source')) { die("Error");
}

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$urldanhmuc ="";
$urldanhmuc.= (isset($_REQUEST['id_list'])) ? "&id_list=".addslashes($_REQUEST['id_list']) : "";
$urldanhmuc.= (isset($_REQUEST['id_cat'])) ? "&id_cat=".addslashes($_REQUEST['id_cat']) : "";
$urldanhmuc.= (isset($_REQUEST['id_item'])) ? "&id_item=".addslashes($_REQUEST['id_item']) : "";

$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
switch($act){

case "man":
    get_items();
    $template = "product_other/items";
    break;
case "add":        
    $template = "product_other/item_add";
    break;
case "edit":        
    get_item();
    $template = "product_other/item_add";
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
    $template = "product_other/loais";
    break;
case "add_item":        
    $template = "product_other/loai_add";
    break;
case "edit_item":        
    get_loai();
    $template = "product_other/loai_add";
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
    $template = "product_other/cats";
    break;
case "add_cat":        
    $template = "product_other/cat_add";
    break;
case "edit_cat":        
    get_cat();
    $template = "product_other/cat_add";
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
    $template = "product_other/lists";
    break;
case "add_list":        
    $template = "product_other/list_add";
    break;
case "edit_list":        
    get_list();
    $template = "product_other/list_add";
    break;
case "save_list":
    save_list();
    break;
case "delete_list":
    delete_list();
    break;
    // ===================================================    
case "man_photo":
    get_photos();
    $template = "product_other/photos";
    break;
case "add_photo":
    $template = "product_other/photo_add";
    break;
case "edit_photo":
    get_photo();
    $template = "product_other/photo_edit";
    break;
case "save_photo":
    save_photo();
    break;
case "delete_photo":
    delete_photo();
    break;
        // ===================================================    
case "man_tags":
    get_tags();
    $template = "product_other/tags";
    break;
case "add_tags":
    $template = "product_other/tags_add";
    break;
case "edit_tags":
    get_tag();
    $template = "product_other/tags_edit";
    break;
case "save_tags":
    save_tags();
    break;
case "delete_tags":
    delete_tag();
    break;
    // ============================================================
case "duyetbl":
    get_duyetbl();
    $template = "product_other/duyetbl";
    break;
case "delete_binhluan":
    delete_binhluan();
    $template = "product_other/duyetbl";
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
    if(isset($_REQUEST['sptb'])!='') {
        $id_up = $_REQUEST['sptb'];
        $sql_sp = "SELECT id,sptb FROM table_product_other where id='".$id_up."' ";
        $d->query($sql_sp);
        $cats= $d->result_array();
        $time=time();
        $hienthi=$cats[0]['sptb'];
        if($hienthi==0) {
            $sqlUPDATE_ORDER = "UPDATE table_product_other SET sptb ='$time' WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        else
        {
            $sqlUPDATE_ORDER = "UPDATE table_product_other SET sptb =0  WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }    
    }
    // ----------------------------------------------------------------------------------------
    // ----------------------------------------------------------------------------------------
    if(isset($_REQUEST['spbc'])!='') {
        $id_up = $_REQUEST['spbc'];
        $sql_sp = "SELECT id,spbc FROM table_product_other where id='".$id_up."' ";
        $d->query($sql_sp);
        $cats= $d->result_array();
        $time=time();
        $hienthi=$cats[0]['spbc'];
        if($hienthi==0) {
            $sqlUPDATE_ORDER = "UPDATE table_product_other SET spbc ='$time' WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        else
        {
            $sqlUPDATE_ORDER = "UPDATE table_product_other SET spbc =0  WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }    
    }
    // ----------------------------------------------------------------------------------------
    if (isset($_REQUEST['noibat']) && $_REQUEST['noibat'] != '') {
        $id_up = $_REQUEST['noibat'];
        $sql_sp = "SELECT id,noibat FROM table_product_other where id='".$id_up."' ";
        $d->query($sql_sp);
        $cats= $d->result_array();
        $time=time();
        $hienthi=$cats[0]['noibat'];
        if($hienthi==0) {
            $sqlUPDATE_ORDER = "UPDATE table_product_other SET noibat ='$time' WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        else
        {
            $sqlUPDATE_ORDER = "UPDATE table_product_other SET noibat =0  WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }    
    }
    // -------------------------------------------------------------------------------
    
    // ----------------------------------------------------------------------------------------
    if (isset($_REQUEST['hienthi']) && $_REQUEST['hienthi'] != '') {
        $id_up = $_REQUEST['hienthi'];
        $sql_sp = "SELECT id,hienthi FROM table_product_other where id='".$id_up."' ";
        $d->query($sql_sp);
        $cats= $d->result_array();
        $hienthi=$cats[0]['hienthi'];
        if($hienthi==0) {
            $sqlUPDATE_ORDER = "UPDATE table_product_other SET hienthi =1 WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        else
        {
            $sqlUPDATE_ORDER = "UPDATE table_product_other SET hienthi =0  WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }    
    }
    // -------------------------------------------------------------------------------
    $sql = "select * from #_product_other";    
    if (isset($_REQUEST['id_list']) && (int)$_REQUEST['id_list'] != 0) {
        $sql .= " WHERE id_list=" . (int)$_REQUEST['id_list'];
    }
    
    if (isset($_REQUEST['id_cat']) && (int)$_REQUEST['id_cat'] != 0) {
        $sql .= " WHERE id_cat=" . (int)$_REQUEST['id_cat'];
    }
    
    if (isset($_REQUEST['id_item']) && (int)$_REQUEST['id_item'] != 0) {
        $sql .= " WHERE id_item=" . (int)$_REQUEST['id_item'];
    }
    
    if (isset($_REQUEST['keyword']) && $_REQUEST['keyword'] != '') {
        $keyword = addslashes($_REQUEST['keyword']);
        $sql .= " WHERE ten_vi LIKE '%$keyword%'";
    }
    $sql.=" order by stt,id desc";
    
    $d->query($sql);
    $items = $d->result_array();
    
    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url="index.php?com=product_other&act=man".$urldanhmuc;
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
        transfer("Không nhận được dữ liệu", "index.php?com=product_other&act=man");
    }    
    $sql = "select * from #_product_other where id='".$id."'";
    $d->query($sql);
    if($d->num_rows()==0) { transfer("Dữ liệu không có thực", "index.php?com=product_other&act=man");
    }
    $item = $d->fetch_array();    
}

function save_item()
{
    global $d;
    $file_name=fns_Rand_digit(0, 9, 12);
    if(empty($_POST)) { transfer("Không nhận được dữ liệu", "index.php?com=product_other&act=man");
    }
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    
    
    if($id) {
        $id =  themdau($_POST['id']);
        if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product, $file_name)) {
            $data['photo'] = $photo;    
            $data['thumb'] = create_thumb($data['photo'], 210, 230, _upload_product, $file_name, 2);        
            $d->setTable('product_other');
            $d->setWhere('id', $id);
            $d->select();
            if($d->num_rows()>0) {
                $row = $d->fetch_array();
                delete_file(_upload_product.$row['photo']);    
                delete_file(_upload_product.$row['thumb']);                
            }
        }    
        $ext = end((explode('.', $_FILES['file1']['name'])));
        $name = basename($_FILES['file1']['name'], '.'.$ext);
        if($file = upload_image("file1", 'doc|xls|pdf|dwg|docx|xlsx|DOC|XLSX|XLS|PDF|DWG|DOCX', _upload_product, changeTitle($name))) {
            $data['file'] = $file;
            
            $d->setTable('product_other');
            $d->setWhere('id', $id);
            $d->select();
            if($d->num_rows()>0) {
                $row = $d->fetch_array();
                delete_file(_upload_product.$row['file']);
            }
        }
        // VN-------------------
        $data['title_vi'] = isset($_POST['title_vi']) ? $_POST['title_vi'] : '';
        $data['keywords_vi'] = isset($_POST['keywords_vi']) ? $_POST['keywords_vi'] : '';
        $data['description_vi'] = isset($_POST['description_vi']) ? $_POST['description_vi'] : '';
        $data['ten_vi'] = isset($_POST['ten_vi']) ? $_POST['ten_vi'] : '';
        $data['noidung_vi'] = isset($_POST['noidung_vi']) ? addslashes($_POST['noidung_vi']) : '';
        $data['tags_vi'] = isset($_POST['tags_vi']) ? $_POST['tags_vi'] : '';
        $data['mota_vi'] = isset($_POST['mota_vi']) ? $_POST['mota_vi'] : '';

        // EN-------------------
        $data['title_en'] = isset($_POST['title_en']) ? $_POST['title_en'] : '';
        $data['keywords_en'] = isset($_POST['keywords_en']) ? $_POST['keywords_en'] : '';
        $data['description_en'] = isset($_POST['description_en']) ? $_POST['description_en'] : '';
        $data['ten_en'] = isset($_POST['ten_en']) ? $_POST['ten_en'] : '';
        $data['noidung_en'] = isset($_POST['noidung_en']) ? addslashes($_POST['noidung_en']) : '';
        $data['tags_en'] = isset($_POST['tags_en']) ? $_POST['tags_en'] : '';
        $data['mota_en'] = isset($_POST['mota_en']) ? $_POST['mota_en'] : '';

        // TW-------------------
        $data['title_ta'] = isset($_POST['title_ta']) ? $_POST['title_ta'] : '';
        $data['keywords_ta'] = isset($_POST['keywords_ta']) ? $_POST['keywords_ta'] : '';
        $data['description_ta'] = isset($_POST['description_ta']) ? $_POST['description_ta'] : '';
        $data['ten_ta'] = isset($_POST['ten_ta']) ? $_POST['ten_ta'] : '';
        $data['noidung_ta'] = isset($_POST['noidung_ta']) ? addslashes($_POST['noidung_ta']) : '';
        $data['tags_ta'] = isset($_POST['tags_ta']) ? $_POST['tags_ta'] : '';
        $data['mota_ta'] = isset($_POST['mota_ta']) ? $_POST['mota_ta'] : '';

        // JP-------------------
        $data['title_ja'] = isset($_POST['title_ja']) ? $_POST['title_ja'] : '';
        $data['keywords_ja'] = isset($_POST['keywords_ja']) ? $_POST['keywords_ja'] : '';
        $data['description_ja'] = isset($_POST['description_ja']) ? $_POST['description_ja'] : '';
        $data['ten_ja'] = isset($_POST['ten_ja']) ? $_POST['ten_ja'] : '';
        $data['noidung_ja'] = isset($_POST['noidung_ja']) ? addslashes($_POST['noidung_ja']) : '';
        $data['tags_ja'] = isset($_POST['tags_ja']) ? $_POST['tags_ja'] : '';
        $data['mota_ja'] = isset($_POST['mota_ja']) ? $_POST['mota_ja'] : '';

        // Chung--------------------------
        $data['id_list'] = isset($_POST['id_list']) ? (int)$_POST['id_list'] : 0;
        $data['id_cat'] = isset($_POST['id_cat']) ? (int)$_POST['id_cat'] : 0;
        $data['id_item'] = isset($_POST['id_item']) ? (int)$_POST['id_item'] : 0;
        $data['gia'] = isset($_POST['gia']) ? (int)$_POST['gia'] : 0;
        $data['masp'] = isset($_POST['masp']) ? $_POST['masp'] : '';
        $data['tinhtrang'] = isset($_POST['tinhtrang']) ? $_POST['tinhtrang'] : '';
        $data['tenkhongdau'] = isset($_POST['ten_vi']) ? changeTitle($_POST['ten_vi']) : '';

        $data['stt'] = isset($_POST['stt']) ? $_POST['stt'] : 0;
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['ngaysua'] = time();
        $d->setTable('product_other');
        $d->setWhere('id', $id);
        if($d->update($data)) {
            ///////////////update tag/////////////////
            mysql_query("DELETE FROM table_protag where id_pro = '$id'");
            // VI
            if (isset($_POST['tags_vi']) && trim($_POST['tags_vi']) != '') {
                $arrTags = explode(",", $_POST['tags_vi']);
                foreach ($arrTags as $tag)
                {
                    $tag = trim($tag);
                    if($tag!="") {
                        //Lấy id của tag có tên là $tag, nếu ko có thì thêm mới
                        $d->reset();
                        $sql= "select id from table_tags where ten='".$tag."'";
                        $d->query($sql);
                        $kiemtratag = $d->result_array();
                   
                        if (count($kiemtratag)!=0) {
                              $idTag = $kiemtratag[0]['id'];
                        }
                        else
                        {
                            mysql_query("insert into table_tags(ten) values ('$tag')");
                            $idTag = mysql_insert_id();
                        }
              
                        //Insert dữ liệu vào table Articles_Tags
                        mysql_query("insert into table_protag(id_pro,id_tag) values ($id, $idTag)");
                    }
                }
            }
              
            // EN
            // VI
            if (isset($_POST['tags_en']) && trim($_POST['tags_en']) != '') {
                $arrTags = explode(",", $_POST['tags_en']);
                foreach ($arrTags as $tag)
                {
                    $tag = trim($tag);
                    if($tag!="") {
                             //Lấy id của tag có tên là $tag, nếu ko có thì thêm mới
                             $d->reset();
                             $sql= "select id from table_tags where ten_vi='".$tag."'";
                             $d->query($sql);
                             $kiemtratag = $d->result_array();
                   
                        if (count($kiemtratag)!=0) {
                            $idTag = $kiemtratag[0]['id'];
                        }
                        else
                           {
                            mysql_query("insert into table_tags(ten) values ('$tag')");
                            $idTag = mysql_insert_id();
                        }
              
                        //Insert dữ liệu vào table Articles_Tags
                        mysql_query("insert into table_protag(id_pro,id_tag) values ($id, $idTag)");
                    }
                }
            }
              
            // CN
            // VI
            if (isset($_POST['tags_ta']) && trim($_POST['tags_ta']) != '') {
                $arrTags = explode(",", $_POST['tags_ta']);
                foreach ($arrTags as $tag)
                {
                    $tag = trim($tag);
                    if($tag!="") {
                             //Lấy id của tag có tên là $tag, nếu ko có thì thêm mới
                             $d->reset();
                             $sql= "select id from table_tags where ten_vi='".$tag."'";
                             $d->query($sql);
                             $kiemtratag = $d->result_array();
                   
                        if (count($kiemtratag)!=0) {
                            $idTag = $kiemtratag[0]['id'];
                        }
                        else
                           {
                            mysql_query("insert into table_tags(ten) values ('$tag')");
                            $idTag = mysql_insert_id();
                        }
              
                        //Insert dữ liệu vào table Articles_Tags
                        mysql_query("insert into table_protag(id_pro,id_tag) values ($id, $idTag)");
                    }
                }
            }
            
            redirect("index.php?com=product_other&act=man&curPage=".$_REQUEST['curPage']."");
        }
        else {
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product_other&act=man");
        }
    }else{
        if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product, $file_name)) {
            $data['photo'] = $photo;        
            $data['thumb'] = create_thumb($data['photo'], 210, 230, _upload_product, $file_name, 2);        
        }        
        $ext = end((explode('.', $_FILES['file1']['name'])));
        $name = basename($_FILES['file1']['name'], '.'.$ext);
        if($file = upload_image("file1", 'doc|xls|pdf|dwg|docx|xlsx|DOC|XLSX|XLS|PDF|DWG|DOCX', _upload_product, changeTitle($name))) {
            $data['file'] = $file;
            
        }
        // VN-------------------    
        $data['title_vi'] = $_POST['title_vi'];
        $data['keywords_vi'] = $_POST['keywords_vi'];
        $data['description_vi'] = $_POST['description_vi'];
        $data['ten_vi'] = $_POST['ten_vi'];
        $data['noidung_vi'] = addslashes($_POST['noidung_vi']);
        $data['mota_vi'] = $_POST['mota_vi'];
        
        // EN-------------------    
            
        $data['title_en'] = $_POST['title_en'];
        $data['keywords_en'] = $_POST['keywords_en'];
        $data['description_en'] = $_POST['description_en'];
        $data['ten_en'] = $_POST['ten_en'];
        $data['noidung_en'] = addslashes($_POST['noidung_en']);
        $data['mota_en'] = $_POST['mota_en'];
                
        // TW-------------------    
        $data['title_ta'] = $_POST['title_ta'];
        $data['keywords_ta'] = $_POST['keywords_ta'];
        $data['description_ta'] = $_POST['description_ta'];
        $data['ten_ta'] = $_POST['ten_ta'];
        $data['noidung_ta'] = addslashes($_POST['noidung_ta']);
        $data['mota_ta'] = $_POST['mota_ta'];
                
        // JP-------------------    
        $data['title_ja'] = $_POST['title_ja'];
        $data['keywords_ja'] = $_POST['keywords_ja'];
        $data['description_ja'] = $_POST['description_ja'];
        $data['ten_ja'] = $_POST['ten_ja'];
        $data['noidung_ja'] = addslashes($_POST['noidung_ja']);
        $data['mota_ja'] = $_POST['mota_ja'];
        
        // Chung----------------------
        
        $data['id_list'] = (int)$_POST['id_list'];            
        $data['id_cat'] = (int)$_POST['id_cat'];
        $data['id_item'] = (int)$_POST['id_item'];
        $data['gia'] = (int)$_POST['gia'];        
        $data['masp'] = $_POST['masp'];    
        $data['tenkhongdau'] = changeTitle($_POST['ten_vi']);    
        
        $data['stt'] = $_POST['stt'];
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['ngaytao'] = time();
        $d->setTable('product_other');
        if($d->insert($data)) {            
            redirect("index.php?com=product_other&act=man");
        }
        else {
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=product_other&act=man");
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
        $sql = "select id,thumb, photo from #_product_other where id='".$id."'";
        $d->query($sql);
        if($d->num_rows()>0) {
            while($row = $d->fetch_array()){
                delete_file(_upload_product.$row['photo']);
                delete_file(_upload_product.$row['thumb']);            
            }
            $sql = "delete from #_product_other where id='".$id."'";
            $d->query($sql);
        }
        if($d->query($sql)) {
            redirect("index.php?com=product_other&act=man".$id_catt."");
        } else {
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=product_other&act=man");
        }
    }elseif(isset($_GET['listid'])) {
        $listid = explode(",", $_GET['listid']); 
        for ($i=0 ; $i<count($listid); $i++){
            $idTin=$listid[$i]; 
            $id =  themdau($idTin);        
            $d->reset();
            $sql = "delete from #_product_other where id='".$id."'";
            $d->query($sql);
        }
        redirect("index.php?com=product_other&act=man".$id_catt."");
    }
}

// ====================================
function get_cats()
{
    global $d, $items, $paging;
    // ----------------------------------------------------------------------------------------
    if($_REQUEST['noibat']!='') {
        $id_up = $_REQUEST['noibat'];
        $sql_sp = "SELECT id,noibat FROM table_product_other_cat where id='".$id_up."' ";
        $d->query($sql_sp);
        $cats= $d->result_array();
        $time=time();
        $hienthi=$cats[0]['noibat'];
        if($hienthi==0) {
            $sqlUPDATE_ORDER = "UPDATE table_product_other_cat SET noibat ='$time' WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        else
        {
            $sqlUPDATE_ORDER = "UPDATE table_product_other_cat SET noibat =0  WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }    
    }
    // -------------------------------------------------------------------------------
    $sql = "select * from #_product_other_cat";
        
    if((int)$_REQUEST['id_list']!='') {
        $sql.=" where id_list=".$_REQUEST['id_list']."";
    }
    $sql.=" order by stt";
    // ----------------------------------------------------------------------------------------
    if($_REQUEST['hienthi']!='') {
        $id_up = $_REQUEST['hienthi'];
        $sql_sp = "SELECT id,hienthi FROM table_product_other_cat where id='".$id_up."' ";
        $d->query($sql_sp);
        $cats= $d->result_array();
        $hienthi=$cats[0]['hienthi'];
        if($hienthi==0) {
            $sqlUPDATE_ORDER = "UPDATE table_product_other_cat SET hienthi =1 WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        else
        {
            $sqlUPDATE_ORDER = "UPDATE table_product_other_cat SET hienthi =0  WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }    
    }
    
    $d->query($sql);
    $items = $d->result_array();
    
    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url="index.php?com=product_other&act=man_cat";
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
        transfer("Không nhận được dữ liệu", "index.php?com=product_other&act=man_cat");
    }
    
    $sql = "select * from #_product_other_cat where id='".$id."'";
    $d->query($sql);
    if($d->num_rows()==0) { transfer("Dữ liệu không có thực", "index.php?com=product_other&act=man_cat");
    }
    $item = $d->fetch_array();
}

function save_cat()
{
    global $d;
    $file_name=fns_Rand_digit(0, 9, 12);
    if(empty($_POST)) { transfer("Không nhận được dữ liệu", "index.php?com=product_other&act=man_cat");
    }
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if($id) {
        $id =  themdau($_POST['id']);
        if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product, $file_name)) {
            $data['photo'] = $photo;    
            $data['thumb'] = create_thumb($data['photo'], 190, 190, _upload_product, $file_name, 1);        
            $d->setTable('product_other_list');
            $d->setWhere('id', $id);
            $d->select();
            if($d->num_rows()>0) {
                $row = $d->fetch_array();
                delete_file(_upload_product.$row['photo']);    
                delete_file(_upload_product.$row['thumb']);                
            }
        }        
        
        
        // VN-------------------    
        $data['title_vi'] = $_POST['title_vi'];
        $data['keywords_vi'] = $_POST['keywords_vi'];
        $data['description_vi'] = $_POST['description_vi'];
        $data['ten_vi'] = $_POST['ten_vi'];
        $data['noidung_vi'] = $_POST['noidung_vi'];
        
        // EN-------------------    
            
        $data['title_en'] = $_POST['title_en'];
        $data['keywords_en'] = $_POST['keywords_en'];
        $data['description_en'] = $_POST['description_en'];
        $data['ten_en'] = $_POST['ten_en'];
        $data['noidung_en'] = $_POST['noidung_en'];
                
        // TW-------------------    
        $data['title_ta'] = $_POST['title_ta'];
        $data['keywords_ta'] = $_POST['keywords_ta'];
        $data['description_ta'] = $_POST['description_ta'];
        $data['ten_ta'] = $_POST['ten_ta'];
        $data['noidung_ta'] = $_POST['noidung_ta'];
                
        // JP-------------------    
        $data['title_ja'] = $_POST['title_ja'];
        $data['keywords_ja'] = $_POST['keywords_ja'];
        $data['description_ja'] = $_POST['description_ja'];
        $data['ten_ja'] = $_POST['ten_ja'];
        
        // Chung-----------------------
        
        $data['tenkhongdau'] = changeTitle($_POST['ten_vi']);        
        $data['id_list'] = $_POST['id_list'];            
        $data['stt'] = $_POST['stt'];
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['ngaysua'] = time();
        
        $d->setTable('product_other_cat');
        $d->setWhere('id', $id);
        if($d->update($data)) {
            redirect("index.php?com=product_other&act=man_cat&curPage=".$_REQUEST['curPage']."");
        } else {
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product_other&act=man_cat");
        }
    }else{    
        if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product, $file_name)) {
            $data['photo'] = $photo;        
            $data['thumb'] = create_thumb($data['photo'], 180, 100, _upload_product, $file_name, 1);        
        }    
    
        // VN-------------------    
        $data['title_vi'] = $_POST['title_vi'];
        $data['keywords_vi'] = $_POST['keywords_vi'];
        $data['description_vi'] = $_POST['description_vi'];
        $data['ten_vi'] = $_POST['ten_vi'];
        $data['noidung_vi'] = $_POST['noidung_vi'];
        // EN-------------------    
            
        $data['title_en'] = $_POST['title_en'];
        $data['keywords_en'] = $_POST['keywords_en'];
        $data['description_en'] = $_POST['description_en'];
        $data['ten_en'] = $_POST['ten_en'];
        $data['noidung_en'] = $_POST['noidung_en'];        
        // TW-------------------    
        $data['title_ta'] = $_POST['title_ta'];
        $data['keywords_ta'] = $_POST['keywords_ta'];
        $data['description_ta'] = $_POST['description_ta'];
        $data['ten_ta'] = $_POST['ten_ta'];
        $data['noidung_ta'] = $_POST['noidung_ta'];        
        // JP-------------------    
        $data['title_ja'] = $_POST['title_ja'];
        $data['keywords_ja'] = $_POST['keywords_ja'];
        $data['description_ja'] = $_POST['description_ja'];
        $data['ten_ja'] = $_POST['ten_ja'];
            
        $data['id_list'] = $_POST['id_list'];
        $data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
        $data['stt'] = $_POST['stt'];
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['ngaytao'] = time();
        
        $d->setTable('product_other_cat');
        if($d->insert($data)) {
            redirect("index.php?com=product_other&act=man_cat");
        } else {
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=product_other&act=man_cat");
        }
    }
}

function delete_cat()
{
    global $d;
    if(isset($_GET['id'])) {
        $id =  themdau($_GET['id']);        
        $d->reset();        
        
        $sql = "delete from #_product_other_cat where id='".$id."'";
        $d->query($sql);
        
        
        if($d->query($sql)) {
            redirect("index.php?com=product_other&act=man_cat");
        } else {
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=product_other&act=man_cat");
        }
    }else { transfer("Không nhận được dữ liệu", "index.php?com=product_other&act=man_cat");
    }
}
/*---------------------------------*/
function get_loais()
{
    global $d, $items, $paging;
    // ----------------------------------------------------------------------------------------
    if($_REQUEST['hienthi']!='') {
        $id_up = $_REQUEST['hienthi'];
        $sql_sp = "SELECT id,hienthi FROM table_product_other_item where id='".$id_up."' ";
        $d->query($sql_sp);
        $cats= $d->result_array();
        $hienthi=$cats[0]['hienthi'];
        if($hienthi==0) {
            $sqlUPDATE_ORDER = "UPDATE table_product_other_item SET hienthi =1 WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        else
        {
            $sqlUPDATE_ORDER = "UPDATE table_product_other_item SET hienthi =0  WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }    
    }
    
    $sql = "select * from #_product_other_item";
        
    if((int)$_REQUEST['id_list']!='') {
        $sql.=" where id_list=".$_REQUEST['id_list']."";
    }
    $sql.=" order by stt";
    
    $d->query($sql);
    $items = $d->result_array();
    
    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url="index.php?com=product_other&act=man_item";
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
        transfer("Không nhận được dữ liệu", "index.php?com=product_other&act=man_item");
    }
    
    $sql = "select * from #_product_other_item where id='".$id."'";
    $d->query($sql);
    if($d->num_rows()==0) { transfer("Dữ liệu không có thực", "index.php?com=product_other&act=man_item");
    }
    $item = $d->fetch_array();
}

function save_loai()
{
    global $d;
    $file_name=fns_Rand_digit(0, 9, 12);
    if(empty($_POST)) { transfer("Không nhận được dữ liệu", "index.php?com=product_other&act=man_item");
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
        
                    
        
        $data['tenkhongdau'] = changeTitle($_POST['ten_vi']);        
        $data['id_list'] = $_POST['id_list'];    
        $data['id_cat']= $_POST['id_cat'];            
        $data['stt'] = $_POST['stt'];
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['ngaysua'] = time();
        
        $d->setTable('product_other_item');
        $d->setWhere('id', $id);
        if($d->update($data)) {
            redirect("index.php?com=product_other&act=man_item&curPage=".$_REQUEST['curPage']."");
        } else {
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product_other&act=man_item");
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
        

        $data['id_list'] = $_POST['id_list'];
        $data['id_cat']= $_POST['id_cat'];    
        $data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
        $data['stt'] = $_POST['stt'];
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['ngaytao'] = time();
        
        $d->setTable('product_other_item');
        if($d->insert($data)) {
            redirect("index.php?com=product_other&act=man_item");
        } else {
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=product_other&act=man_item");
        }
    }
}

function delete_loai()
{
    global $d;
    if(isset($_GET['id'])) {
        $id =  themdau($_GET['id']);        
        $d->reset();        
        
        $sql = "delete from #_product_other_item where id='".$id."'";
        $d->query($sql);
        
        
        if($d->query($sql)) {
            redirect("index.php?com=product_other&act=man_item");
        } else {
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=product_other&act=man_item");
        }
    }else { transfer("Không nhận được dữ liệu", "index.php?com=product_other&act=man_item");
    }
}
/*---------------------------------*/
function get_lists()
{
    global $d, $items, $paging;
    // ----------------------------------------------------------------------------------------
    if (isset($_REQUEST['noibat']) && $_REQUEST['noibat'] != '') {
        $id_up = $_REQUEST['noibat'];
        $sql_sp = "select noibat from table_product_other_list where id='".$id_up."'";
        $d->query($sql_sp);
        $cats= $d->result_array();
        $time=time();
        $hienthi=$cats[0]['noibat'];
        if($hienthi==0) {
            $sqlUPDATE_ORDER = "UPDATE table_product_other_list SET noibat ='$time' WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        else
        {
            $sqlUPDATE_ORDER = "UPDATE table_product_other_list SET noibat =0  WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }    
    }
    
    // ----------------------------------------------------------------------------------------
    if (isset($_REQUEST['hienthi']) && $_REQUEST['hienthi'] != '') {      
        $id_up = $_REQUEST['hienthi'];
        $sql_sp = "SELECT id,hienthi FROM table_product_other_list where id='".$id_up."' ";
        $d->query($sql_sp);
        $cats= $d->result_array();
        $hienthi=$cats[0]['hienthi'];
        if($hienthi==0) {
            $sqlUPDATE_ORDER = "UPDATE table_product_other_list SET hienthi =1 WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        else
        {
            $sqlUPDATE_ORDER = "UPDATE table_product_other_list SET hienthi =0  WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }    
    }
    
    $sql = "select * from #_product_other_list";            
    $sql.=" order by stt,id desc";
    
    $d->query($sql);
    $items = $d->result_array();
    
    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url="index.php?com=product_other&act=man_list";
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
        transfer("Không nhận được dữ liệu", "index.php?com=product_other&act=man_list");
    }    
    $sql = "select * from #_product_other_list where id='".$id."'";
    $d->query($sql);
    if($d->num_rows()==0) { transfer("Dữ liệu không có thực", "index.php?com=product_other&act=man_list");
    }
    $item = $d->fetch_array();    
}

function save_list()
{
    global $d;
    $file_name=fns_Rand_digit(0, 9, 12);
    if(empty($_POST)) { transfer("Không nhận được dữ liệu", "index.php?com=product_other&act=man_list");
    }
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if($id) {
        $id =  themdau($_POST['id']);
        if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product, $file_name)) {
            $data['photo'] = $photo;
            $data['thumb'] = create_thumb($data['photo'], 230, 230, _upload_product, $file_name, 1);        
            $d->setTable('product_other_list');
            $d->setWhere('id', $id);
            $d->select();
            if($d->num_rows()>0) {
                $row = $d->fetch_array();
                delete_file(_upload_product.$row['photo']);    
                delete_file(_upload_product.$row['thumb']);                
            }
        }        
    
        // VN-------------------    
        $data['title_vi'] = isset($_POST['title_vi']) ? $_POST['title_vi'] : '';
        $data['keywords_vi'] = isset($_POST['keywords_vi']) ? $_POST['keywords_vi'] : '';
        $data['description_vi'] = isset($_POST['description_vi']) ? $_POST['description_vi'] : '';
        $data['ten_vi'] = isset($_POST['ten_vi']) ? $_POST['ten_vi'] : '';
        $data['mota_vi'] = isset($_POST['mota_vi']) ? $_POST['mota_vi'] : '';
        
        // EN-------------------    
            
        $data['title_en'] = isset($_POST['title_en']) ? $_POST['title_en'] : '';
        $data['keywords_en'] = isset($_POST['keywords_en']) ? $_POST['keywords_en'] : '';
        $data['description_en'] = isset($_POST['description_en']) ? $_POST['description_en'] : '';
        $data['ten_en'] = isset($_POST['ten_en']) ? $_POST['ten_en'] : '';
        $data['mota_en'] = isset($_POST['mota_en']) ? $_POST['mota_en'] : '';
                
        // TW-------------------    
        $data['title_ta'] = isset($_POST['title_ta']) ? $_POST['title_ta'] : '';
        $data['keywords_ta'] = isset($_POST['keywords_ta']) ? $_POST['keywords_ta'] : '';
        $data['description_ta'] = isset($_POST['description_ta']) ? $_POST['description_ta'] : '';
        $data['ten_ta'] = isset($_POST['ten_ta']) ? $_POST['ten_ta'] : '';
        $data['mota_ta'] = isset($_POST['mota_ta']) ? $_POST['mota_ta'] : '';
                
        // JP-------------------    
        $data['title_ja'] = isset($_POST['title_ja']) ? $_POST['title_ja'] : '';
        $data['keywords_ja'] = isset($_POST['keywords_ja']) ? $_POST['keywords_ja'] : '';
        $data['description_ja'] = isset($_POST['description_ja']) ? $_POST['description_ja'] : '';
        $data['ten_ja'] = isset($_POST['ten_ja']) ? $_POST['ten_ja'] : '';
        $data['mota_ja'] = isset($_POST['mota_ja']) ? $_POST['mota_ja'] : '';        
        // Chung------------------------                        
        $data['tenkhongdau'] = isset($_POST['ten_vi']) ? changeTitle($_POST['ten_vi']) : '';
        $data['stt'] = isset($_POST['stt']) ? $_POST['stt'] : '';
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['ngaysua'] = time();
        
        $d->setTable('product_other_list');
        $d->setWhere('id', $id);
        if (isset($_REQUEST['curPage'])) {
            $curPage = $_REQUEST['curPage'];
        } else {
            $curPage = 1;
        }
        if($d->update($data)) {
            redirect("index.php?com=product_other&act=man_list&curPage=".$curPage);
        } else {
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product_other&act=man_list");
        }
    }else{    
    
        if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product, $file_name)) {
            $data['photo'] = $photo;    
            $data['thumb'] = create_thumb($data['photo'], 230, 230, _upload_product, $file_name, 1);        
        }                
        
        // VN-------------------    
        $data['title_vi'] = $_POST['title_vi'];
        $data['keywords_vi'] = $_POST['keywords_vi'];
        $data['description_vi'] = $_POST['description_vi'];
        $data['ten_vi'] = $_POST['ten_vi'];
        $data['mota_vi'] = $_POST['mota_vi'];
        
        // EN-------------------    
            
        $data['title_en'] = $_POST['title_en'];
        $data['keywords_en'] = $_POST['keywords_en'];
        $data['description_en'] = $_POST['description_en'];
        $data['ten_en'] = $_POST['ten_en'];
        $data['mota_en'] = $_POST['mota_en'];
                
        // TW-------------------    
        $data['title_ta'] = $_POST['title_ta'];
        $data['keywords_ta'] = $_POST['keywords_ta'];
        $data['description_ta'] = $_POST['description_ta'];
        $data['ten_ta'] = $_POST['ten_ta'];
        $data['mota_ta'] = $_POST['mota_ta'];
                
        // JP-------------------    
        $data['title_ja'] = $_POST['title_ja'];
        $data['keywords_ja'] = $_POST['keywords_ja'];
        $data['description_ja'] = $_POST['description_ja'];
        $data['ten_ja'] = $_POST['ten_ja'];
        $data['mota_ja'] = $_POST['mota_ja'];
        
        // Chung------------------------                        
        $data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
        $data['stt'] = $_POST['stt'];
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['ngaysua'] = time();
        
        $d->setTable('product_other_list');
        if($d->insert($data)) {
            redirect("index.php?com=product_other&act=man_list");
        } else {
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=product_other&act=man_list");
        }
    }
}

function delete_list()
{
    global $d;
    if(isset($_GET['id'])) {
        $id =  themdau($_GET['id']);        
        $d->reset();        
        
        $sql = "delete from #_product_other_list where id='".$id."'";
        $d->query($sql);
        
        
        if($d->query($sql)) {
            redirect("index.php?com=product_other&act=man_list");
        } else {
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=product_other&act=man_list");
        }
    }else { transfer("Không nhận được dữ liệu", "index.php?com=product_other&act=man_list");
    }
}
/*---------------------------------------------*/
function get_photos()
{
    global $d, $items, $paging;    
    // ----------------------------------------------------------------------------------------
    if($_REQUEST['hienthi']!='') {
        $id_up = $_REQUEST['hienthi'];
        $sql_sp = "SELECT id,hienthi FROM table_product_other_hinhanh where id='".$id_up."' ";
        $d->query($sql_sp);
        $cats= $d->result_array();
        $hienthi=$cats[0]['hienthi'];
        if($hienthi==0) {
            $sqlUPDATE_ORDER = "UPDATE table_product_other_hinhanh SET hienthi =1 WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        else
        {
            $sqlUPDATE_ORDER = "UPDATE table_product_other_hinhanh SET hienthi =0  WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }    
    }
    
    
    
    $sql = "select * from #_product_other_hinhanh where ( id_photo = '".$_REQUEST['idc']."' OR '".$_REQUEST['idc']."'=0  ) order by stt,id desc ";            
    $d->query($sql);
    $items = $d->result_array();
    
    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url="index.php?com=product_other&act=man_photo&idc=".$_REQUEST['idc']."";
    $maxR=10;
    $maxP=4;
    $paging=paging($items, $url, $curPage, $maxR, $maxP);
    $items=$paging['source'];

}

function get_photo()
{
    global $d, $item, $list_cat;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if(!$id) {
        transfer("Không nhận được dữ liệu", "index.php?com=product_other&act=man_photo&idc=".$_REQUEST['idc']."");
    }
    
    $d->setTable('product_other_hinhanh');
    $d->setWhere('com', 'product_other');
    $d->setWhere('id', $id);
    $d->select();
    if($d->num_rows()==0) { transfer("Dữ liệu không có thực", "index.php?com=product_other&act=man_photo&idc=".$_REQUEST['idc']."");
    }
    $item = $d->fetch_array();
    $d->reset();
}

function save_photo()
{
    global $d;
    $file_name=fns_Rand_digit(0, 9, 10);
    if(empty($_POST)) { transfer("Không nhận được dữ liệu", "index.php?com=product_other&act=man_photo&idc=".$_REQUEST['idc']."");
    }
    
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if($id) { // cap nhat
        
        if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|Jpg|JPEG', _upload_product, $file_name)) {
            $data['photo'] = $photo;
            $data['thumb'] = create_thumb($data['photo'], 300, 300, _upload_product, $file_name.$i, 1);
            $d->setTable('product_other_hinhanh');
            $d->setWhere('id', $id);
            $d->select();
            if($d->num_rows()>0) {
                   $row = $d->fetch_array();
                   delete_file(_upload.$row['photo']);
                   delete_file(_upload.$row['thumb']);                    
            }
        }
        $data['id'] = $_REQUEST['id'];
        $data['mota'] = $_POST['mota'];
        $data['stt'] = $_POST['stt'];
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['com'] = 'product_other';
        $d->reset();
        $d->setTable('product_other_hinhanh');
        $d->setWhere('id', $id);
        if(!$d->update($data)) { transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product_other&act=man_photo&idc=".$_REQUEST['idc']."");
        }
        redirect("index.php?com=product_other&act=man_photo&idc=".$_REQUEST['idc']."");
            
    }{ // them moi
        
    for($i=0; $i<5; $i++){
        if($photo = upload_image("file".$i, 'jpg|png|gif|JPG|jpeg|Jpg|JPEG', _upload_product, $file_name.$i)) {
            $data['photo'] = $photo;
            $data['thumb'] = create_thumb($data['photo'], 300, 300, _upload_product, $file_name.$i, 1);
                        
            $data['mota'] = "mota :".$i;
                        
            $data['stt'] = $_POST['stt'.$i];
            $data['mota'] = $_POST['mota'.$i];
                        
            $data['hienthi'] = isset($_POST['hienthi'.$i]) ? 1 : 0;
            $data['com'] = 'product_other';
                        
            $data['id_photo'] = $_REQUEST['idc'];
                        
            $d->setTable('product_other_hinhanh');
            if(!$d->insert($data)) { transfer("Lưu dữ liệu bị lỗi", "index.php?com=product_other&act=man_photo&idc=".$_REQUEST['idc']."");
            }
        }
    }
    redirect("index.php?com=product_other&act=man_photo&idc=".$_REQUEST['idc']."");
    }
}


function delete_photo()
{
    global $d;
    
    if(isset($_GET['id'])) {
        $id =  themdau($_GET['id']);
        $d->setTable('product_other_hinhanh');
        $d->setWhere('id', $id);
        $d->select();
        if($d->num_rows()==0) { transfer("Dữ liệu không có thực", "index.php?com=product_other&act=man_photo&idc=".$_REQUEST['idc']."");
        }
        $row = $d->fetch_array();
        delete_file(_upload_product.$row['photo']);
        delete_file(_upload_product.$row['thumb']);            
        if($d->delete()) {
        
            redirect("index.php?com=product_other&act=man_photo&idc=".$_REQUEST['idc']."");
        } else {
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=product_other&act=man_photo&idc=".$_REQUEST['idc']."");
        }
    }else { transfer("Không nhận được dữ liệu", "index.php?com=product_other&act=man_photo&idc=".$_REQUEST['idc']."");
    }
}
function get_duyetbl()
{
    global $d, $items, $paging;    
    if(@$_REQUEST['hienthi']!='') {
        $id_up = @$_REQUEST['hienthi'];
        $sql_sp = "SELECT id,hienthi FROM table_product_other_bl where id='".$id_up."' ";
        $d->query($sql_sp);
        $cats= $d->result_array();
        $hienthi=$cats[0]['hienthi'];
        //echo "id:". $spdc1;
        if($hienthi==0) {
            $sqlUPDATE_ORDER = "UPDATE table_product_other_bl SET hienthi =1 WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        else
        {
            $sqlUPDATE_ORDER = "UPDATE table_product_other_bl SET hienthi =0  WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

        }    
    }
    
    $sql = "select * from #_product_other_bl";    
    $sql.=" order by id desc";
    $d->query($sql);
    $items = $d->result_array();
    
    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url="index.php?com=product_other&act=duyetbl";
    $maxR=20;
    $maxP=4;
    $paging=paging($items, $url, $curPage, $maxR, $maxP);
    $items=$paging['source'];
}
function delete_binhluan()
{
    global $d;
    if(isset($_GET['id'])) {
        $id =  themdau($_GET['id']);        
        $sql = "delete from #_product_other_bl where id='".$id."'";
        if($d->query($sql)) {
            redirect("index.php?com=product_other&act=duyetbl");
        } else {
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=product_other&act=duyetbl");
        }
    }elseif (isset($_GET['listid'])==true) {
        $listid = explode(",", $_GET['listid']); 
        for ($i=0 ; $i<count($listid); $i++){
            $idTin=$listid[$i]; 
            $id =  themdau($idTin);        
            $d->reset();
            
            $sql = "delete from #_product_other_bl where id='".$id."'";
            $d->query($sql);
            
        }redirect("index.php?com=product_other&act=duyetbl");
    }else { transfer("Không nhận được dữ liệu", "index.php?com=product_other&act=duyetbl");
    }
}

function get_tags()
{
    global $d, $items, $paging;
    
    $idp=$_GET['idp'];
    //echo $idp; exit;
    $d->reset();
    $sql="select * from table_tags where id_pro=$idp";
    $d->query($sql);
    $items=$d->result_array();
    $maxR=20;
    $maxP=20;
    $paging=paging($items, $url, $curPage, $maxR, $maxP);
    $items=$paging['source'];
}

function get_tag()
{
    global $d, $item, $paging;
    
    $id=$_GET['id'];
    $idp=$_GET['idp'];
    //echo $id; exit;
    $d->reset();
    $sql="select * from table_tags where id_pro=$idp and id=$id";
    $d->query($sql);
    $item=$d->fetch_array();
    //echo $item['ten']; exit;
}

function save_tags()
{
    global $d;
    if(empty($_POST)) { transfer("Không nhận được dữ liệu", "index.php?com=product_other&act=man_list");
    }
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if($id) {
        $idp=$_POST['id_pro'];    
        $data['id_pro'] = $_POST['id_pro'];                
        $data['ten'] = $_POST['ten'];
        $data['link'] = $_POST['link'];
        
        $d->setTable('tags');
        $d->setWhere('id', $id);
        if($d->update($data)) {
            redirect("index.php?com=product_other&act=man_tags&idp=$idp");
        } else {
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product_other&act=man_tags&idp=$idp");
        }
    }else{    
        $idp=$_POST['idp'];
        for($i=0; $i<5;$i++)
        {
            $data['id_pro']=$_POST['idp'];        
            $data['ten'] = $_POST['ten'.$i];
            $data['link'] = $_POST['link'.$i];
            $d->setTable('tags');
            if($data['ten']!="" || $data['link']!="") {
                $d->insert($data);
            }
            //echo "a".$idp; exit;
        }
        redirect("index.php?com=product_other&act=man_tags&idp=$idp");
    }
}

function delete_tag()
{
    global $d;
    $idp=$_GET['idp'];
    if(isset($_GET['id'])) {
        $id =  themdau($_GET['id']);        
        $sql = "delete from #_tags where id='".$id."'";
        if($d->query($sql)) {
            redirect("index.php?com=product_other&act=man_tags&idp=$idp");
        } else {
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=product_other&act=man_tags&idp=$idp");
        }
    }
}

?>
