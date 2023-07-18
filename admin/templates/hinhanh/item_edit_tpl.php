<h3>Sửa hình ảnh</h3>
<form name="frm" method="post" action="index.php?com=hinhanh&act=save&idc=<?=$_GET['idc']?>" enctype="multipart/form-data" class="nhaplieu">
  <?php /*?> <b>Chủ đề:</b><?=get_main_cat();?><br /><br />   <?php */?>
   <?php if (@$_REQUEST['act']=='edit')
	{?>
	<b>Hình hiện tại:</b><img src="<?=_upload_thuvienanh.$item['thumb']?>" alt="NO PHOTO"  width="150"/><br />
	<?php }?>
    <br />
	<b>Hình ảnh:</b> <input type="file" name="file" /> width:275px - height:170px <?=_hinhanh_type?><br />
	<b>Link</b> <input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br />
	<!-- <b>Tên (en)</b> <input type="text" name="ten_en" value="<?=@$item['ten_en']?>" class="input" /><br /> -->
	<!-- <b>link</b> <input type="text" name="link" value="<?=@$item['link']?>" class="input" /><br /> -->
	<b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
	
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=hinhanh&act=man&idc=<?=$_GET['idc']?>'" class="btn" />
</form>