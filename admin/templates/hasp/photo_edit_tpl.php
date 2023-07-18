<h3>Thư viện ảnh</h3>
<form name="frm" method="post" action="index.php?com=hasp&type1=<?=$_REQUEST['type1']?>&act=save_photo&id=<?=$_REQUEST['id'];?>&idc=<?=$_REQUEST['idc']?>" enctype="multipart/form-data" class="nhaplieu">    
	<b>Hình hiện tại</b> <img src="<?=_upload_product.$item['photo']?>" style="max-width:200px; max-height:200px" /><br />
	<b>Hình ảnh </b> <input type="file" name="file" /> Width:760px - Height:640px <?=_product_type?><br /><br />
    <b>Tên (VI)</b> <input type="text" name="ten_vi" value="<?=$item['ten_vi']?>" class="input" /><br /><br />
    <!-- <b>Tên (EN)</b> <input type="text" name="ten_en>" value="<?=$item['ten_en']?>" class="input" /><br /><br /> -->
    <!-- <b>Tên (CA)</b> <input type="text" name="ten_ta" value="<?=$item['ten_ta']?>" class="input"  /><br /><br /> -->
    <?php /*?><b>Mã</b> <input type="text" name="mahinh" value="<?=$item['mahinh']?>" class="input" /><br /><br />
    <b>Mô tả:</b>
    	<textarea name="mota" id="mota" cols="45" rows="5"><?=@$item['mota']?></textarea>
    <br /><br><?php */?>
	<b>Số thứ tự </b> <input type="text" name="stt" value="<?=$item['stt']?>" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=$item['hienthi'] ? 'checked="checked"' : ""?> /> <br /><br />
	
	<input type="hidden" name="id" value="<?=$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=hasp&type1=<?=$_REQUEST['type1']?>&act=man_photo&idc=<?=$_REQUEST['idc']?>'" class="btn" />
</form>