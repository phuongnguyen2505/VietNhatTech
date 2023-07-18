<?php 

	$d->reset();
	$sql_dmsp="select ten_$lang as ten,tenkhongdau,id,thumb,mota_$lang as mota from #_product_list where hienthi =1 order by stt,id desc limit 0,3";
	$d->query($sql_dmsp);
	$dichvu=$d->result_array();
?>
<div id="menu_top_sp">
<div class="box_main" style="width:1055px; margin:0 auto;">
	<?php
    
     
                
                 if(!empty($dichvu)){
                    foreach($dichvu as $k=>$sp_item){
                        $trs='';
                        if(($k+1)%3==0) $trs='style="margin-right:0px;"';
	?>
    
        
                  
              <div class="block_item_home"  <?=$trs?>  >
                    
                    <div class="block-img">
                           <a href="<?=$sp_item['tenkhongdau']?>/">
                           	<img  src="<?=_upload_product_l.$sp_item['thumb']?>" alt="<?=$sp_item['ten']?>" title="<?=$sp_item['ten']?>" />
                           </a>
                           
                    </div>
                    <div class="over_item over<?=$k+1?>"><h3><a class="dv_name" href="<?=$sp_item['tenkhongdau']?>/" title="<?=$sp_item['ten']?>"><?=$sp_item['ten']?></a></h3>

                        <div class="over_mota">
                            <?php
                                $str = $sp_item['mota'];
                                $str = strip_tags($str);
                                $strCut = substr($str, 0, 300);
                                $str = substr($strCut, 0, strrpos($strCut, ' ')).'...';
                                echo $str;
                            ?>
                        </div>
                    </div>
                  
             </div><!--blocj item-->
        <?php		
                    if(($k+1)%3==0) echo '<div class="clr"></div>';
                    }
                 }
                
		?>
</div>
<!-- end box_main -->
</div>
<!-- end menu_top_sp -->