<h3>Background</h3>
<h3>
 
	<form name="frm" method="post" action="index.php?com=banner&amp;act=save" enctype="multipart/form-data" class="nhaplieu">

	<?php if ($_REQUEST['act']==capnhat)
	{?>
	<b>Hình hiện tại:</b><img src="<?=_upload_hinhanh.$item['photo']?>"  alt="NO PHOTO" /><br />
	<?php }?>
	<b>Hình ảnh:</b> <input type="file" name="file" /> <?=_product_type?>( Hình sẽ repeat nếu không đủ kích thước)<br />
    <input type="submit" value="Lưu" class="btn" />
    <input type="hidden" name="id" id="id" value="4" />
    
    
   
    </form>
</h3>
