<?php
	
	$d->reset();
	$sql = "select ten_$lang as ten,thumb,tenkhongdau,id from #_news where hienthi=1 and tinnoibat>0 and loaitin='cong-nghe' order by stt asc,id desc limit 0,5";
	$d->query($sql);
	$baiviet= $d->result_array();

	
?>	

<div id="content_mid">
	<div class="box_main">
	  <div id="content_mid_nd">
	     <?php
	            if(!empty($baiviet)){
	            
	              foreach($baiviet as $k=>$sptb_item){
	                $str='';
	                if(($k+1)%5==0) $str='style="margin-right:0px;"';
	          ?>
	          	<div class="top_item" <?=$str?>>
			        <div class="top_img">
			        	<a href="<?=$sptb_item['tenkhongdau']?>">
			            	<img src="<?=_upload_tintuc_l.$sptb_item['thumb']?>" alt="<?=$sptb_item['ten']?>" title="<?=$sptb_item['ten']?>" />
			            </a>
			        </div>
			        <h3 class="top_name"><a href="<?=$sptb_item['tenkhongdau']?>"><?=$sptb_item['ten']?></a></h3>
		    		
		    	</div><!--end top_item-->       
	       <?php 
	              if(($k+1)%5==0) echo '<div class="clr"></div>';
	              }
	              
	            }
	        ?>
	 
	  <div class="clr"></div>
	  </div>
 		<!-- end content_mid_nds -->
	</div>
 	
</div>
<!-- end content_mid -->