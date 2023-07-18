<div style="width:100%; padding:10px;">
<div style="border-bottom:1px solid #999; width:97%; font-size:17px; font-weight:bold;"><?=_doitac?></div>
<?=$noidungdt['noidung']?>
<?php
for($i=0;$i<count($doitac);$i++){
?>
<div class="doitac-box">
  <a href="<?=$doitac[$i]['mota']?>" target="_blank" style="color:#000;"><img src="<?=_upload_hinhanh_l.$doitac[$i]['thumb']?>" alt="<?=$doitac[$i]['ten']?>" class="tv"></a>
</div>
<?php }?>
<div class="phantrang"><?=$paging['paging']?></div>
</div>