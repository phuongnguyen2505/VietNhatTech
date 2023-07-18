<div class="ui-corner-all custom-corners">
	<div class="ui-bar ui-bar-a"><h3><?=$title_tcat?></h3></div>
	<div class="ui-body ui-body-a">
		<?php if($tintuc){?>
		<?php for($i=1; $i<=count($tintuc); $i++){?>
			<div class="box-news">
				
				<p class="news-img"><a href="tin-tuc/<?=$tintuc[$i-1]['tenkhongdau']?>-<?=$tintuc[$i-1]['id']?>.html" title="<?=stripcslashes($tintuc[$i-1]['ten'])?>"><img alt="<?=stripcslashes($tintuc[$i-1]['alt_img'])?>" src="http://<?=$config_url.'/'._upload_tintuc_l.$tintuc[$i-1]['thumb']?>"></a></p>
				<h3 class="news-name"><a href="tin-tuc/<?=$tintuc[$i-1]['tenkhongdau']?>-<?=$tintuc[$i-1]['id']?>.html" title="<?=stripcslashes($tintuc[$i-1]['ten'])?>" class="transitionAll"><?=stripcslashes($tintuc[$i-1]['ten'])?></a></h3>
				<div class="news-des"><?=stripcslashes($tintuc[$i-1]['mota'])?></div>
				<p class="news-readmore"><a href="tin-tuc/<?=$tintuc[$i-1]['tenkhongdau']?>-<?=$tintuc[$i-1]['id']?>.html" class="transitionAll">Xem chi tiết</a></p>
			</div><!-- .box-news -->
			
		<?php } ?>
		<div class="pagination"><?=$paging['paging']?></div>
		<?php }else{?><div class="text" style="text-align:center"><b style="color:#FF0; font-size: 17px;">Nội dung chưa cập nhật. Xin vui lòng xem chuyên mục khác.</b></div><?php }?>

	</div>
</div>


