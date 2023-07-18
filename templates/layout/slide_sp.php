<?php
	$d->reset();
	$sql_doitac="select id,ten,tenkhongdau,thumb from #_product_list where hienthi =1 order by stt,id desc";
	$d->query($sql_doitac);
	$danhmuc=$d->result_array();

	
?>


   
<div class="slide_sp">
	
        <div class="owl-carousel" >
        <?php
            if(!empty($danhmuc)){
                
                foreach($danhmuc as $danhmuc_item){
        ?>
            
                         <div class="block_item" <?=$str?> >
                                    <div class="tt_img"><img src="<?=_upload_product_l,$danhmuc_item["thumb"]?>" alt="<?=$danhmuc_item['ten']?>" title="<?=$danhmuc_item['ten']?>" width="235" height="190" />
                                    	<div class="hover"><a href="<?=$danhmuc_item['tenkhongdau']?>/" title="<?=$danhmuc_item['ten']?>"></a></div>
                                    </div>
                                    <div class="bongsp"></div>
                                    <h3><a href="<?=$danhmuc_item['tenkhongdau']?>/" title="<?=$danhmuc_item['ten']?>"> <?=$danhmuc_item['ten']?></a></h3>
                                   
                                   
                                    
                         </div><!--blocj item--->	
        <?php
                }
                
            }
        ?>
        </div>  

</div><!--end slide_sp-->