<?php  if(!defined('_source')) { die("Error");
       }
if(isset($_GET['id'])) {
    // tin tuc chi tiet
    $id =  addslashes($_GET['id']);

    $sql_lanxem = "UPDATE #_news SET luotxem=luotxem+1  WHERE id ='".$id."'";
    $d->query($sql_lanxem);
            
    $sql = "select id,photo,thumb,ten_$lang as ten,mota_$lang as mota,noidung_$lang as noidung,title_$lang as title,keywords_$lang as keywords,description_$lang as description,luotxem,ngaytao from #_news where hienthi=1 and id='".$id."'";
    $d->query($sql);
    $tintuc_detail = $d->result_array();
    $title_bar=$tintuc_detail[0]['ten'].' - ';
    $title_custom=$tintuc_detail[0]['title'];
    $keywords_custom=$tintuc_detail[0]['keywords'];
    $description_custom=$tintuc_detail[0]['description'];

    $sql_hinhanh="select id,photo,thumb,ten_$lang as ten from #_hasp where com='album' and hienthi=1 and id_photo='".$tintuc_detail[0]['id']."'";
    $d->query($sql_hinhanh);
    $row_hinhanhsp11 = $d->result_array();
    // các tin cu hon
    $sql_khac = "select thumb,ten_$lang as ten,tenkhongdau,ngaytao,id,thumb from #_news where hienthi=1 and id <'".$id."' and loaitin='album'  order by ngaytao desc limit 0,10";
    $d->query($sql_khac);
    $tintuc_khac = $d->result_array();
}elseif(isset($_GET['idc'])) {
    $id =  addslashes($_GET['idc']);
    $sql = "select ten_$lang as ten,id,title_$lang as title,keywords_$lang as keywords,description_$lang as description from #_news_cat where hienthi=1 and tenkhongdau='".$id."' and com='album'";
    $d->query($sql);
    $tintuc_detail = $d->result_array();
    $title_bar=$tintuc_detail[0]['ten'].' - ';
    $title_tcat=$tintuc_detail[0]['ten'];
    $title_custom=$tintuc_detail[0]['title'];
    $keywords_custom=$tintuc_detail[0]['keywords'];
    $description_custom=$tintuc_detail[0]['description'];
    $sql_tintuc = "select ten_$lang as ten,tenkhongdau,mota_$lang as mota,thumb,id,ngaytao,luotxem from #_news where hienthi=1 and loaitin='album' and id_cat='".$tintuc_detail[0]['id']."' order by stt,ngaytao desc";
    $d->query($sql_tintuc);
    $tintuc = $d->result_array();
    $curPage = isset($_GET['p']) ? $_GET['p'] : 1;
    $url=getCurrentPageURL();
    $maxR=5;
    $maxP=5;
    $paging=paging_home($tintuc, $url, $curPage, $maxR, $maxP);
    $tintuc=$paging['source'];
}
else{
    $title_bar='Dịch vụ'.' - ';        
    $title_tcat='Dịch vụ';    
    $sql_tintuc = "select ten_$lang as ten,tenkhongdau,mota_$lang as mota,thumb,id,ngaytao,luotxem from #_news where hienthi=1 and loaitin='album' order by stt,ngaytao desc";
    $d->query($sql_tintuc);
    $tintuc = $d->result_array();
    $curPage = isset($_GET['p']) ? $_GET['p'] : 1;
    $url=getCurrentPageURL();
    $maxR=5;
    $maxP=5;
    $paging=paging_home($tintuc, $url, $curPage, $maxR, $maxP);
    $tintuc=$paging['source'];
}

?>
