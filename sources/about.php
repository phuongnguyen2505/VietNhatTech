<?php  if(!defined('_source')) { die("Error");
       }
if(isset($_GET['id'])) {
    // tin tuc chi tiet
    $id =  addslashes($_GET['id']);

    $sql = "select ten_$lang as ten,mota_$lang as mota,noidung_$lang as noidung,title_$lang as title,keywords_$lang as keywords,description_$lang as description from #_about where hienthi=1 and id='".$id."'";
    $d->query($sql);
    $tintuc_detail = $d->result_array();
    $title_bar=$tintuc_detail[0]['ten'].' - ';
    $title_custom=$tintuc_detail[0]['title'];
    $keywords_custom=$tintuc_detail[0]['keywords'];
    $description_custom=$tintuc_detail[0]['description'];
    // các tin cu hon
    $sql_khac = "select ten_$lang as ten,tenkhongdau,ngaytao,id from #_about where hienthi=1 and id <>'".$id."'  order by stt,ngaytao desc limit 0,5";
    $d->query($sql_khac);
    $tintuc_khac = $d->result_array();
    
}else{
    $title_bar=_about.' - ';        
    $title_tcat=_about;    
    $sql_tintuc = "select ten_$lang as ten,tenkhongdau,id,thumb,mota_$lang as mota from #_about order by stt asc,id asc ";
    $d->query($sql_tintuc);
    $tintuc = $d->result_array();
    
}
?>
