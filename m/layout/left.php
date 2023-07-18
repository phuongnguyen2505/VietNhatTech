<?php		
	$d->reset();
	$sql_dmsp="select ten_$lang as ten,tenkhongdau,id from #_product_list where hienthi =1 order by stt asc";
	$d->query($sql_dmsp);
	$dmsp=$d->result_array();
	
    $d->reset();
    $sql_dmsp="select ten_$lang as ten,tenkhongdau,id,thumb,mota_$lang as mota from #_news where hienthi =1 and tinnoibat>0 and loaitin='tin-tuc' order by stt asc";
    $d->query($sql_dmsp);
    $news=$d->result_array();

    $d->reset();
    $sql_dmsp="select ten_$lang as ten,tenkhongdau,id,thumb,mota_$lang as mota from #_news where hienthi =1 and tinnoibat>0 and loaitin='cong-nghe' order by stt asc";
    $d->query($sql_dmsp);
    $thuvien=$d->result_array();


    $d->reset();
    $sql_quangcao="select  ten_$lang as ten,yahoo,skype,dienthoai,email from #_yahoo where hienthi =1 order by id desc ";
    $d->query($sql_quangcao);
    $hotro=$d->result_array();

    $d->reset();
    $sql_quangcao="select  ten_$lang as ten,url from #_lkweb where hienthi =1 ";
    $d->query($sql_quangcao);
    $lkweb=$d->result_array();  
?>
                
<script type="text/javascript">
(function($) {
	$(function() { //on DOM ready
		$("#scroller").simplyScroll({
			customClass: 'vert',
			orientation: 'vertical',
			auto: true,
			manualMode: 'loop',
			frameRate: 20,
			speed: 1
		});
		
	});
})(jQuery);
</script>
 <!--Danh mục sản phẩm-->
    <div class="left_box box_dm">
        <h2>Danh mục sản phẩm</h2>
        <div id="smoothmenu" class="ddsmoothmenu-v danhmuc">
            <ul class="cateUl accordion accordion-2 transitionAll">
                   <?php
                        if(!empty($dmsp)){
                            foreach($dmsp as $dmsp_item){
                    ?>
                                   
                        
                          <li><a <?php if($_GET['idc']==$dmsp_item['tenkhongdau']) echo 'class="active1"';?> href="san-pham/<?=$dmsp_item['tenkhongdau']?>/" title="<?=$dmsp_item['ten']?>"><?=$dmsp_item['ten']?></a>
                            <?php
                                $d->reset();
                                $sql_dmsp="select ten_$lang as ten,tenkhongdau,id from #_product_cat where hienthi=1 and id_list=$dmsp_item[id] order by stt asc,id desc";
                                $d->query($sql_dmsp);
                                $dmsp1=$d->result_array();
                                if(!empty($dmsp1)){
                                echo '<ul>';
                                foreach($dmsp1 as $dmsp1_item){
                            ?>
                                <li><a href="san-pham/<?=$dmsp_item['tenkhongdau']?>/<?=$dmsp1_item['tenkhongdau']?>/" title="<?=$dmsp1_item['ten']?>"  ><?=$dmsp1_item['ten']?></a>
                                    <?php
                                        $d->reset();
                                        $sql_dmsp="select ten_$lang as ten,tenkhongdau,id from #_product_item where hienthi=1 and id_cat=$dmsp1_item[id] order by stt asc,id desc";
                                        $d->query($sql_dmsp);
                                        $dmsp2=$d->result_array();
                                        if(!empty($dmsp2)){
                                        echo '<ul>';
                                        foreach($dmsp2 as $dmsp2_item){
                                    ?>
                                        <li><a href="san-pham/<?=$dmsp_item['tenkhongdau']?>/<?=$dmsp1_item['tenkhongdau']?>/<?=$dmsp2_item['tenkhongdau']?>/" title="<?=$dmsp2_item['ten']?>"  ><?=$dmsp2_item['ten']?></a></li>
                                    
                                    <?php
                                            }
                                            echo '</ul>';
                                        }
                                    ?>
                                </li>
                            
                            <?php
                                    }
                                    echo '</ul>';
                                }
                            ?>
                          </li>
                        
                    <?php
                               
                            }
                        }
                    ?>
                   
            </ul>
         </div>   
    </div>
 <div class="left_box">
        <h2>Tin tức</h2>
        <ul id="scroller">            
        <?php
            if(!empty($news)){
                foreach($news as $spmoi_item){
        ?>
         <li>
            <div class="left_item">
                <div class="left_img">
                    <a href="tin-tuc/<?=$spmoi_item['tenkhongdau']?>-<?=$spmoi_item['id']?>.html" > <img src="<?=_upload_tintuc_l.$spmoi_item['thumb']?>" /></a>
                </div>
                <h3><a href="tin-tuc/<?=$spmoi_item['tenkhongdau']?>-<?=$spmoi_item['id']?>.html"><?=$spmoi_item['ten']?></a></h3>
                <?=catchuoi($spmoi_item['mota'],100)?>
            </div>
            <div class="clr"></div>
          </li>
        <?php
                }
            }
        
        ?>
       </ul>
       <div class="clr" style="height:10px;"></div>
        
    </div>
 
   <div class="left_box">
       <h2>Hỗ trợ trực tuyến</h2>
       <div class="hotl">
                <br/>
                <span class="sodt" style="color:#ff0000; font-style:italic; font-size:24px;"><?=$row_setting['hotline']?></span>
                
            </div>
        <div id="hotro">
       
            <p class="tuvan_nv">Hỗ trợ online: </p>
        <ul >
            
             <?php
                if(!empty($hotro)){
                    foreach($hotro as $hotro_it){
            ?>
                    <li>
                        <div style="text-align:left; line-height:20px; position:relative;padding:5px 0px; ">
                            
                            <div class="nick" >
                                    <div class="ht_name">
                                        <span class="ten_ht"><?=@$hotro_it['ten']?></span>
                                        <span class="dt_ht"><?=@$hotro_it['dienthoai']?></span>
                                    </div>
                                    <span class="ht_img">
                                        <a rel="nofollow" href="skype:<?=@$hotro_it['skype']?>?chat"><img src="images/skype.png" alt="<?=@$hotro_it['ten']?>" title=""/></a>
                                        <a rel="nofollow" href="ymsgr:sendIM?<?=$hotro_it['yahoo']?>"><img src="images/icon_yahoo.png" alt="<?=@$hotro_it['ten']?>" /> </a>
                                    </span>
                                </p>
                                <div class="clr"></div>
                                
                            </div>
                           
                        </div>
                    </li>
            
            <?php
                    }
                }
             ?>
                
             </ul>
              <p class="tuvan_nv red"><?=_thongtinlh?></p>
              <p class="ht_lh" style="font-size:12px;"><?=_dienthoai?>: <span style="color:#2733a6;font-size:14px; "><?=@$row_setting['dienthoai']?></span> </p>
                                 
              <p  class="ht_lh" style="font-size:12px;">Email: <span style="color:#2733a6;font-size:12px; "><?=@$row_setting['email']?></span> </p>
                           
        </div>
        <div class="clr" style="height:10px;"></div>
   </div>
    
    
    
   
<div class="left_box">
    <h2>Tiện ích</h2>
    <ul class="ul_box">
        <li ><a href="http://www.reviewcompany.vn/free-service/?woeid=1252431" onclick="return hs.htmlExpand(this, { objectType: 'iframe' } )" class="thoitiet">Dự báo thời tiết</a></li>
        <li ><a href="http://www.reviewcompany.vn/free-service/exchange/" onclick="return hs.htmlExpand(this, { objectType: 'iframe' } )" class="tygia">tỉ giá ngoại tệ</a></li>
        <li ><a href="http://www.reviewcompany.vn/free-service/gold/" onclick="return hs.htmlExpand(this, { objectType: 'iframe' } )" class="lich">Giá vàng</a></li>
        <li ><a href="http://vnexpress.net/User/ck/hcms/HCMStockSmall.asp" onclick="return hs.htmlExpand(this, { objectType: 'iframe' } )" class="chungkhoan">Thông tin chứng khoán</a></li>
        
        
    </ul> 
    <div class="clr" style="height:10px;"></div>   
</div>