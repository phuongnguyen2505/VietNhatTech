

<div id="left">
      <?php include _template."layout/left.php"; ?>
  </div>
  <!-- end left -->
  <div id="right">
  		<div class="title_p "><h3 class="title"><?=$title_tcat?> </h3></div>
	
      	<div class="content">
				<?php
				   if(count($tintuc)>0){
				   for($i=0,$count_tintuc=count($tintuc);$i<$count_tintuc;$i++){
				   	$str='';
				   	if(($i+1)%2==0) $str='style="margin-right:0px;"';
				   	else
				   		$str='style="margin-right:20px;"';
					
				?>
						<div class="box_news" <?=$str?> >
			            <div class="image_boder"><a href="thu-vien-tai-lieu/<?=$tintuc[$i]['tenkhongdau']?>-<?=$tintuc[$i]['id']?>.html"><img src="<?=_upload_tintuc_l,$tintuc[$i]['thumb']?>" alt="<?=$tintuc[$i]['ten']?>" /></a></div>
			            
			              <div class="mota_tt">
			              <div class="ten_tt"><h2> <a href="thu-vien-tai-lieu/<?=$tintuc[$i]['tenkhongdau']?>-<?=$tintuc[$i]['id']?>.html"><?=$tintuc[$i]['ten']?></a></h2></div>
			              <?php
			                    $str = $tintuc[$i]['mota'];
			                    $str = strip_tags($str);
			                    $strCut = substr($str, 0, 1000);
			                    $str = substr($strCut, 0, strrpos($strCut, ' ')).'...';
			                    echo $str;
			                ?> 

			               </div>
			              
			              <div class="clr"></div>        
			      		</div>
			                  
								<?php
										if(($i+1)%2==0) echo '<div class="clr"></div> ';
								 }
									
									?>
									
								<?php	
								 }else echo '<p>Nội dung đang cập nhật, bạn vui lòng xem các chuyên mục khác.</p>';  ?>  
								  <div class="clr"></div>                                   
									<div class="phantrang" ><?=$paging['paging']?></div>
	
		                    
		         
		</div>  
  </div> 
  <!-- end right -->

