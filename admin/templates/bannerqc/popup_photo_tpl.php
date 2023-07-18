<h3>Quản lý quảng cáo popup</h3>
<form name="frm" method="post" action="index.php?com=bannerqc&act=save_popup" enctype="multipart/form-data" class="nhaplieu">
	<b>Hình hiện tại:</b> 
	<?php
	 if($item['photo']!=NULL)
	 {
	 ?>
      <img src="<?=_upload_hinhanh.$item['photo']?>" width="500" height="350"/>      
     
	 <?php 
	 } 
	 else 
	 {
	 echo "Chưa có ảnh"; 
	 }
	 ?><br /><br />
	<b>Chọn ảnh: </b> 
    <input type="file" name="file" /> <strong style="color:#F00">Width: 500px&nbsp; -&nbsp;Height: 350px&nbsp; - Type:&nbsp;.png|jpg|gif</strong><br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=$item['hienthi']==1? "checked='checked'":""?>  /> <br /><br />
	

	
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=bannerqc&act=capnhat_popup'" class="btn" />
</form>