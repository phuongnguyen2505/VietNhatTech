<h3>Quản lý Video</h3>

	<form name="frm" method="post" action="index.php?com=video&act=save" enctype="multipart/form-data" class="nhaplieu">
    <!--  <?php if ($_REQUEST['act']==edit)
    {?>
    <b>Hình hiện tại:</b><img src="<?=_upload_hinhanh.$item['image']?>"  width="120" alt="NO PHOTO" /><br />
    <?php }?>
    <b>Hình ảnh:</b> <input type="file" name="file" /> width:150px - hieght: 105px <?=_product_type?><br />
    <br /> -->
     <b>Tên (VI)</b><input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" /></br></br>
     <b>Tên (EN)</b><input type="text" name="ten_en" value="<?=@$item['ten_en']?>" /></br></br>
     <!-- <b>Tên (CA)</b><input type="text" name="ten_ta" value="<?=@$item['ten_ta']?>" /></br></br> -->
	<b>Mã Youtube</b><input type="text" name="url" value="<?=@$item['url']?>" /></br>
    <span>Chỉ nhập mã Youtube vào. VD: Nếu link youtube là: http://www.youtube.com/watch?v=JHiNWkheC08 -> Mã:  <span style="color:#F00">JHiNWkheC0</span></span>
    </br>
	<br />
    
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

  <b>Hiển thị</b> 
  <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>>
  <br />
  <input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=video&act=man'" class="btn" />
    </form>

