<?php

$d->reset();
$sql_dmsp = "select ten_$lang as ten,tenkhongdau,id,thumb,mota_$lang as mota from #_tuyendung where hienthi =1 and tinnoibat>0  order by stt asc";
$d->query($sql_dmsp);
$kythuat = $d->result_array();


$d->reset();
$sql_quangcao = "select  ten_$lang as ten,yahoo,skype,dienthoai,email from #_yahoo where hienthi =1 order by id desc ";
$d->query($sql_quangcao);
$hotro = $d->result_array();

$d->reset();
$sql = "select ten_$lang as ten,tenkhongdau,id,url from #_video where hienthi=1 order by stt asc";
$d->query($sql);
$video = $d->result_array();
?>

<script type="text/javascript">
	(function ($) {
		$(function () { //on DOM ready
			$("#scroller1").simplyScroll({
				customClass: 'vert1',
				orientation: 'vertical',
				auto: true,
				manualMode: 'loop',
				frameRate: 20,
				speed: 1
			});

		});
	})(jQuery);
</script>

<div class="left_box">
	<h2>Kỹ thuật chăn nuôi</h2>
	<ul id="scroller1">
		<?php
		if (!empty($kythuat)) {
			foreach ($kythuat as $spmoi_item) {
				?>
				<li>
					<div class="left_item">
						<div class="left_img" style="width:100%;float: none">
							<a href="ky-thuat/<?= $spmoi_item['tenkhongdau'] ?>-<?= $spmoi_item['id'] ?>.html"> <img
									src="<?= _upload_tintuc_l . $spmoi_item['thumb'] ?>" /></a>
						</div>
						<h3><a
								href="ky-thuat/<?= $spmoi_item['tenkhongdau'] ?>-<?= $spmoi_item['id'] ?>.html"><?= $spmoi_item['ten'] ?></a>
						</h3>

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
	<h2>video clip</h2>
	<div class="video">
		<script type="text/javascript">

			$(document).ready(function () {


				$('#video').change(function (e) {

					var value = $(this).val();

					if (value != '')
						$('#vide-iframe').load("ajax/video.php?id=" + value);

					return false;
				});

			});
		</script>

		<div id="vide-iframe">
			<?php
			if (!empty($video)) {

				?>
				<a href="quickview.php?id=<?= $video[0]['id'] ?>" class="various3 xemnhanh">
					<img width="220" height="165" src="http://img.youtube.com/vi/<?= $video[0]['url'] ?>/hqdefault.jpg"
						alt="<?= $video[0]['ten'] ?>" />
					<span class="nut_video"></span>
				</a>
			<?php
			}

			?>
		</div>
		<?php
		if (!empty($video)) {
			echo '<select name="video"  id="video" >';
			foreach ($video as $video_item) {
				?>
				<option value="<?= $video_item['id'] ?>"><?= $video_item["ten"] ?></option>
			<?php
			}
			echo '</select>';
		}
		?>
	</div>
	<div class="clr" style="height:10px;"></div>
</div>