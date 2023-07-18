<div class="bg_bottom title_p "><h3 class="title center_"><?=$title_tcat?></h3></div>

<div class="content">

  <?php
			   if(count($tintuc)>0){
				   echo '<ul id="doitac">';
			   for($i=0,$count_tintuc=count($tintuc);$i<$count_tintuc;$i++){
				   $str='';
				   if(($i+1)%3==0) $str='style="margin-right:0px;"';
		   ?>
    		<li <?=$str?>><a href="<?=$tintuc[$i]['mota']?>" target="_blank"><img src="<?=_upload_hinhanh_l.$tintuc[$i]['photo']?>" alt="<?=$tintuc[$i]['ten']?>" title="<?=$tintuc[$i]['ten']?>" /></a></li>
        <?php
			if(($i+1)%3==0) echo ' <div class="clr"></div>';
		 } echo '</ul>'; }else echo '<p>Nội dung đang cập nhật, bạn vui lòng xem các chuyên mục khác.</p>';  ?>                                     
            
    <div class="clr"></div>
</div>