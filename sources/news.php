<?php  if(!defined('_source')) { die("Error");
       }
if(isset($_GET['id'])) {
    // tin tuc chi tiet
    $id =  addslashes($_GET['id']);

    $sql_lanxem = "UPDATE #_news SET luotxem=luotxem+1  WHERE id ='".$id."'";
    $d->query($sql_lanxem);
            
    $sql = "select ten_$lang as ten,mota_$lang as mota,noidung_$lang as noidung,title_$lang as title,keywords_$lang as keywords,description_$lang as description,luotxem,ngaytao from #_news where hienthi=1 and id='".$id."'";
    $d->query($sql);
    $tintuc_detail = $d->result_array();
    $title_bar=$tintuc_detail[0]['ten'].' - ';
    $title_custom=$tintuc_detail[0]['title'];
    $keywords_custom=$tintuc_detail[0]['keywords'];
    $description_custom=$tintuc_detail[0]['description'];
    // các tin cu hon
    $sql_khac = "select ten_$lang as ten,tenkhongdau,ngaytao,id from #_news where hienthi=1 and id <'".$id."' and loaitin='tin-tuc'  order by stt,ngaytao desc limit 0,10";
    $d->query($sql_khac);
    $tintuc_khac = $d->result_array();
}elseif(isset($_GET['idc'])) {
    $id =  addslashes($_GET['idc']);
    $sql = "select ten_$lang as ten,id,title_$lang as title,keywords_$lang as keywords,description_$lang as description from #_news_cat where hienthi=1 and tenkhongdau='".$id."' and com='tin-tuc'";
    $d->query($sql);
    $tintuc_detail = $d->result_array();
    $title_bar=$tintuc_detail[0]['ten'].' - ';
    $title_tcat=$tintuc_detail[0]['ten'];
    $title_custom=$tintuc_detail[0]['title'];
    $keywords_custom=$tintuc_detail[0]['keywords'];
    $description_custom=$tintuc_detail[0]['description'];
    $sql_tintuc = "select ten_$lang as ten,tenkhongdau,mota_$lang as mota,thumb,photo,id,ngaytao,luotxem from #_news where hienthi=1 and loaitin='tin-tuc' and id_cat='".$tintuc_detail[0]['id']."' order by stt,ngaytao desc";
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
    $title_bar=_news.' - ';        
    $title_tcat=_news;    
    $sql_tintuc = "select ten_$lang as ten,tenkhongdau,mota_$lang as mota,thumb,photo,id,ngaytao,luotxem from #_news where hienthi=1 and loaitin='tin-tuc' order by stt,ngaytao desc";
    $d->query($sql_tintuc);
    $tintuc = $d->result_array();
    $curPage = isset($_GET['p']) ? $_GET['p'] : 1;
    $url=getCurrentPageURL();
    $maxR=6;
    $maxP=5;
    $paging=paging_home($tintuc, $url, $curPage, $maxR, $maxP);
    $tintuc=$paging['source'];
}

?>
