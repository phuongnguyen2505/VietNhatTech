<?php	if(!defined('_source')) { die("Error");
}

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
case "capnhat":
    get_lienhe();
    $template = "lienhe/item_add";
    break;
case "save":
    save_lienhe();
    break;
        
default:
    $template = "index";
}

function get_lienhe()
{
    global $d, $item;

    $sql = "select * from #_lienhe limit 0,1";
    $d->query($sql);
    //if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
    $item = $d->fetch_array();
}

function save_lienhe()
{
    global $d;
    if(empty($_POST)) { transfer("Không nhận được dữ liệu", "index.php?com=lienhe&act=capnhat");
    }
    
    // VN-------------------    
    $data['title_vi'] = $_POST['title_vi'];
    $data['keywords_vi'] = $_POST['keywords_vi'];
    $data['description_vi'] = $_POST['description_vi'];
    $data['noidung_vi'] = $_POST['noidung_vi'];
        
    // EN-------------------    
            
    $data['title_en'] = $_POST['title_en'];
    $data['keywords_en'] = $_POST['keywords_en'];
    $data['description_en'] = $_POST['description_en'];
    $data['noidung_en'] = $_POST['noidung_en'];
                
    // TW-------------------    
    $data['title_ta'] = $_POST['title_ta'];
    $data['keywords_ta'] = $_POST['keywords_ta'];
    $data['description_ta'] = $_POST['description_ta'];
    $data['noidung_ta'] = $_POST['noidung_ta'];
                
    // JP-------------------    
    $data['title_ja'] = $_POST['title_ja'];
    $data['keywords_ja'] = $_POST['keywords_ja'];
    $data['description_ja'] = $_POST['description_ja'];
    $data['noidung_ja'] = $_POST['noidung_ja'];
        
    $d->reset();
    $d->setTable('lienhe');
    if($d->update($data)) {
        header("Location:index.php?com=lienhe&act=capnhat");
    } else {
        transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=lienhe&act=capnhat");
    }
}

?>
