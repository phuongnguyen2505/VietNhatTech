<h3>Thư viện ảnh</h3>
<form name="frm" method="post" action="index.php?com=hasp&type1=<?=$_REQUEST['type1']?>&act=save_photo&idc=<?=$_REQUEST['idc']?>" enctype="multipart/form-data" class="nhaplieu">
<?php for($i=0; $i<5; $i++){?>
	<b>Hình ảnh <?=$i+1?></b> <input type="file" name="file<?=$i?>" /> width:760px - Height:640px <?=_product_type?><br />
    <br />
    <b>Tên (VI)</b> <input type="text" name="ten_vi<?=$i?>" class="input" /><br /><br />
   	<!-- <b>Tên (EN)</b> <input type="text" name="ten_en<?=$i?>" class="input" /><br /><br /> -->
   	<!-- <b>Tên (CA)</b> <input type="text" name="ten_ta<?=$i?>" class="input" /><br /><br /> -->
    <?php /*?><b>Mã</b> <input type="text" name="mahinh<?=$i?>" class="input" /><br /><br />
	<b>Mô tả:</b>
    	<textarea name="mota<?=$i?>" id="mota<?=$i?>" cols="45" rows="5"></textarea>
    <br /><br><?php */?>
	<b>Số thứ tự </b> <input type="text" name="stt<?=$i?>" value="1" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi<?=$i?>" checked="checked" /> <br /><br />
	<hr style="margin:15px 0;" />
<? }?>
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=hasp&type1=<?=$_REQUEST['type1']?>&act=man_photo&idc=<?=$_REQUEST['idc']?>'" class="btn" />
</form>