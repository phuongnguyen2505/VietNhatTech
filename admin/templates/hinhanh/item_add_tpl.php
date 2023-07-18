<h3>Thêm hình ảnh</h3>

<form name="frm" method="post" action="index.php?com=hinhanh&act=save&idc=<?=$_GET['idc']?>" enctype="multipart/form-data" class="nhaplieu">
  
<?php for($i=0; $i<5; $i++){?>
	
	<b>Hình ảnh <?=$i+1?></b> <input type="file" name="file<?=$i?>" /> width:275px - height:170px <?=_hinhanh_type?> <br />	       
	<b>link</b> <input type="text" name="ten_vi<?=$i?>"  class="input" /><br />
	<!-- <b>Tên (en)</b> <input type="text" name="ten_en<?=$i?>"  class="input" /><br /> -->
	<!-- <b>link</b> <input type="text" name="link" value="<?=@$item['link']?>" class="input" /><br /> -->
	<b>Số thứ tự </b> <input type="text" name="stt<?=$i?>" value="1" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi<?=$i?>" checked="checked" /> <br /><br />
	
<? }?>
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=hinhanh&act=man&idc=<?=$_GET['idc']?>'" class="btn" />
</form>