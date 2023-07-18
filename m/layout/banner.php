<?php
    $d->reset();
    //if($lang == 'vi'){
    $sql_banner_giua = "select photo from #_photo where com='banner_top'  limit 0,1";

    // }else{

    //      $sql_banner_giua = "select photo from #_photo where com='banner_top_en'  limit 0,1";

    // }
    $d->query($sql_banner_giua);
    $row_banner_giua = $d->fetch_array();

    $d->reset();
    $sql_banner_giua = "select photo from #_photo where com='ft'  limit 0,1";
    $d->query($sql_banner_giua);
    $logo = $d->fetch_array();


?>


<div data-role="header" id="header">
    
    <a href="#menu" id="btn-menu" data-role="button" role="button"></a>
    
    <div id="banner">
        <img src="<?=_upload_hinhanh_l.$logo['photo']?>" alt="<?=$row_setting['ten_'.$lang]?>" />
    </div><!-- end #banner -->
   
</div>
<!-- #header -->

<div data-role="navbar" id="navbar">
    <ul>
        <li><a href="http://<?=$config_url?>/index.html" class="ui-btn-icon-left ui-icon-home <?php if($_GET['com']=='' || $_GET['com']=='index' || $_GET['com']==''){ echo "ui-btn-active";}?>" >Trang chủ</a></li>
        <li><a href="http://<?=$config_url?>/san-pham.html" class="ui-btn-icon-left  ui-icon-grid <?php if($_GET['com']=='san-pham'){ echo "ui-btn-active";}?>">Sản phẩm</a></li>
        
    </ul>
</div>
	 
         