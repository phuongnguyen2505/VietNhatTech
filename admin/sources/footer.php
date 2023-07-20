<?php	if(!defined('_source')) { die("Error");
}
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
switch($act){
case "capnhat":
    get_gioithieu();
    $template = "footer/item_add";
    break;
case "save":
    save_gioithieu();
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

function get_gioithieu()
{
    global $d, $item;

    $sql = "select * from #_footer limit 0,1";
    $d->query($sql);
    if($d->num_rows()==0) { transfer("Dữ liệu chưa khởi tạo.", "index.php");
    }
    $item = $d->fetch_array();
}

function save_gioithieu()
{
    global $d;
    
    
    // VN-------------------    
    $data['noidung_vi'] = isset($_POST['noidung_vi']) ? $_POST['noidung_vi'] : '';
        
    // EN-------------------    
    $data['noidung_en'] = isset($_POST['noidung_en']) ? $_POST['noidung_en'] : '';
                
    // TW-------------------    
    $data['noidung_ta'] = isset($_POST['noidung_ta']) ? $_POST['noidung_ta'] : '';
                
    // JP-------------------    
    $data['noidung_ja'] = isset($_POST['noidung_ja']) ? $_POST['noidung_ja'] : '';
    
    
    
    $d->reset();
    $d->setTable('footer');
    if($d->update($data)) {
        transfer("Dữ liệu được cập nhật", "index.php?com=footer&act=capnhat");
    } else {
        transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=footer&act=capnhat");
    }
}

?>
