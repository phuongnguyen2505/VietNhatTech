<?php if (!defined('_source')) {
    die("Error");
}
@$idl = addslashes($_GET['idl']);
@$idc = addslashes($_GET['idc']);
@$idi = addslashes($_GET['idi']);
@$id = addslashes($_GET['id']);

if ($id != '') {
    // Cap nhat so lan xem
    $sql_lanxem = "UPDATE #_" . $table_select . " SET luotxem=luotxem+1  WHERE id ='" . $id . "'";
    $d->query($sql_lanxem);
    $ar = array("ingersoll-randusa" => "Ingersoll Rand", "san-pham" => "Yoshitake", "san-pham-khac" => "Sản phẩm");
    if ($lang == 'en') {
        $ar['san-pham-khac'] = 'Product';
    }
    define("_tit", $ar[$com]);
    if (!empty($_POST)) {
        //tiếp nhận dữ liệu        
        $hoten = $_POST['hoten'];
        $email = $_POST['email'];
        $tieude = $_POST['tieude'];
        $noidung = $_POST['noidung'];
        //validate dữ liệu
        $hoten = trim(strip_tags($hoten));
        $email = trim(strip_tags($email));
        $tieude = trim(strip_tags($tieude));
        $noidung = trim(strip_tags($noidung));

        $ngaydangky = time();
        if (get_magic_quotes_gpc() == false) {
            $hoten = mysql_real_escape_string($hoten);
            $email = mysql_real_escape_string($email);
            $tieude = mysql_real_escape_string($tieude);
            $noidung = mysql_real_escape_string($noidung);
        }
        $coloi = false;
        if ($hoten == null) {
            $coloi = true;
            $error_hoten = "<br>Bạn chưa nhập họ tên";
        }
        if ($email == null) {
            $coloi = true;
            $error_email = "<br>Bạn chưa nhập email";
        }
        if ($tieude == null) {
            $coloi = true;
            $error_tieude = "<br>Bạn chưa nhập tiêu đề";
        }
        if ($noidung == null) {
            $coloi = true;
            $error_noidung = "<br>Bạn chưa nhập nội dung";
        }

        if ($coloi == false) {

            $sql = "INSERT INTO  table_" . $table_select . "_bl (tieude,ngaydang,hoten,email,noidung,hienthi,id_product) 
				VALUES ('$tieude','$ngaydangky','$hoten','$email','$noidung','0','$id')";
            mysql_query($sql) or die(mysql_error());
            transfer("Gửi bình luận thành công!<br/>$link", getCurrentPageURL());
        }
    }

    // Binh luan cua tin
    // $sql_binhluan = "select tieude,ngaydang,hoten,email,noidung from #_product_bl where hienthi=1 and id_product='".$id."' order by ngaydang desc";
    // $d->query($sql_binhluan);
    // $tintuc_binhluan = $d->result_array();

    $d->reset();
    $sql_detail = "select file,title_$lang as title,keywords_$lang as keywords ,description_$lang as description,id_list,id_cat,id_item,id,photo,thumb,ten_$lang as ten,tenkhongdau,gia,masp,mota_$lang as mota,ngaytao,noidung_$lang as noidung,luotxem,tinhtrang,tags_$lang as tags from #_" . $table_select . " where hienthi=1 and id='" . $id . "'";
    $d->query($sql_detail);
    $row_detail = $d->result_array();

    $hinhsharefb = 'http://' . $config_url . '/' . _upload_product_l . $row_detail[0]['photo'] . '';

    $title_bar = $row_detail[0]['ten'] . ' - ';
    $title_custom = $row_detail[0]['title'];
    $title_tcat = $row_detail[0]['ten'];
    $keywords_custom = $row_detail[0]['keywords'];
    $description_custom = $row_detail[0]['description'];


    $sql_hinhanh = "select id,photo,ten_$lang as ten from #_hasp where com='hasp' and hienthi=1 and id_photo='" . $row_detail[0]['id'] . "'";
    $d->query($sql_hinhanh);
    $row_hinhanhsp11 = $d->result_array();

    $d->reset();
    $sql_sanphamkhac = "select file,id,thumb,photo,ten_$lang as ten,photo,tenkhongdau,ngaytao,mota_$lang as mota from #_" . $table_select . " where hienthi=1 and id <>'" . $id . "' and id_list='" . $row_detail[0]['id_list'] . "' order by stt,ngaytao desc limit 0,4";
    $d->query($sql_sanphamkhac);
    $sanpham_khac = $d->result_array();
} else {


    $title_bar = $title_select . ' - ';
    $title_tcat = $title_select;


    $sql = "select id_list,file,ten_$lang as ten,id,tenkhongdau,thumb,mota_$lang as mota,photo,masp,gia from #_" . $table_select . " where hienthi=1  order by stt asc,id desc";
    $d->query($sql);
    $product = $d->result_array();
    $curPage = isset($_GET['p']) ? $_GET['p'] : 1;
    $url = getCurrentPageURL();
    $maxR = 10;
    $maxP = isset($_GET['maxP']) ? intval($_GET['maxP']) : 6;
    $paging = paging_home($product, $url, $curPage, $maxR, $maxP);
    $product = $paging['source'];
}
?>