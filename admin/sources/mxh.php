<?php	if(!defined('_source')) { die("Error");
}

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
case "man":
    get_items();
    $template = "mxh/items";
    break;
case "add":
    $template = "mxh/item_add";
    break;
case "edit":
    get_item();
    $template = "mxh/item_add";
    break;
case "save":
    save_item();
    break;
case "delete":
    delete_item();
    break;
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
    
    // ----------------------------------------------------------------------------------------
    if (isset($_REQUEST['hienthi']) && $_REQUEST['hienthi'] != '') {
        $id_up = $_REQUEST['hienthi'];
        $sql_sp = "SELECT id,hienthi FROM table_mxh where id='".$id_up."' ";
        $d->query($sql_sp);
        $cats= $d->result_array();
        $hienthi=$cats[0]['hienthi'];
        if($hienthi==0) {
            $sqlUPDATE_ORDER = "UPDATE table_mxh SET hienthi =1 WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        else
        {
            $sqlUPDATE_ORDER = "UPDATE table_mxh SET hienthi =0  WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }    
    }
    // ----------------------------------------------------------------------------------------
    if (isset($_REQUEST['noibat']) && $_REQUEST['noibat'] != '') {      
        $id_up = $_REQUEST['noibat'];
        $sql_sp = "SELECT id,noibat FROM table_mxh where id='".$id_up."' ";
        $d->query($sql_sp);
        $cats= $d->result_array();
        $time=time();
        $hienthi=$cats[0]['noibat'];
        if($hienthi==0) {
            $sqlUPDATE_ORDER = "UPDATE table_mxh SET noibat ='$time' WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        else
        {
            $sqlUPDATE_ORDER = "UPDATE table_mxh SET noibat =0  WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }    
    }
    // -------------------------------------------------------------------------------
    
    $sql = "select * from #_mxh order by stt,ten";
    $d->query($sql);
    $items = $d->result_array();
    
    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url="index.php?com=mxh&act=man";
    $maxR=10;
    $maxP=4;
    $paging=paging($items, $url, $curPage, $maxR, $maxP);
    $items=$paging['source'];
}

function get_item()
{
    global $d, $item;
    @$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if(!$id) {
        transfer("Không nhận được dữ liệu", "index.php?com=mxh&act=man");
    }
    
    $sql = "select * from #_mxh where id='".$id."'";
    $d->query($sql);
    if($d->num_rows()==0) { transfer("Dữ liệu không có thực", "index.php?com=mxh&act=man");
    }
    $item = $d->fetch_array();
}

function save_item()
{
    global $d;
    $file_name=fns_Rand_digit(0, 9, 8);
    if(empty($_POST)) { transfer("Không nhận được dữ liệu", "index.php?com=mxh&act=man");
    }
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if($id) {
        $id =  themdau($_POST['id']);
        
        if($photo = upload_image("file", 'jpg|png|gif', _upload_hinhanh, $file_name)) {
            $data['image'] = $photo;
            
            $d->setTable('mxh');
            $d->setWhere('id', $id);
            $d->select();
            if($d->num_rows()>0) {
                $row = $d->fetch_array();
                delete_file(_upload_sanpham.$row['photo']);
            }
        }
        
        
        $data['ten'] = $_POST['ten'];
        $data['url'] = $_POST['url'];
        $data['stt'] = $_POST['stt'];
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        
        $d->setTable('mxh');
        $d->setWhere('id', $id);
        if($d->update($data)) {
            transfer("Dữ liệu đã được cập nhật", "index.php?com=mxh&act=man");
        } else {
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=mxh&act=man");
        }
    }else{
    
        if($photo = upload_image("file", 'jpg|png|gif', _upload_hinhanh, $file_name)) {
            $data['image'] = $photo;
        }
        
        $data['ten'] = $_POST['ten'];
        $data['url'] = $_POST['url'];
        $data['stt'] = $_POST['stt'];
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        
        $d->setTable('mxh');
        if($d->insert($data)) {
            redirect("index.php?com=mxh&act=man");
        } else {
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=mxh&act=man");
        }
    }
}

function delete_item()
{
    global $d;
    
    if(isset($_GET['id'])) {
        $id =  themdau($_GET['id']);
        $sql = "delete from #_mxh where id='".$id."'";
        if($d->query($sql)) {
            redirect("index.php?com=mxh&act=man");
        } else {
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=mxh&act=man");
        }
    }else { transfer("Không nhận được dữ liệu", "index.php?com=mxh&act=man");
    }
}

?>
