<h3>Quản lý favicon</h3>
<form name="frm" method="post" action="index.php?com=bannerqc&act=saveft" enctype="multipart/form-data" class="nhaplieu">
	<b>Hình hiện tại:</b> 
	<?php
	 if($item['photo']!=NULL)
	 {
	 ?>
     <img src="<?=_upload_hinhanh.$item['photo']?>" alt="ABC" />
            
	 <?php 
	 } 
	 else 
	 {
	 echo "Chưa có logo"; 
	 }
	 ?><br /><br />
	<b>Chọn Logo: </b> 
    <input type="file" name="file" /> <strong style="color:#F00">Width: 100px&nbsp;  - height:100px Type:&nbsp;.png|jpg|gif</strong><br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" checked="checked" /> <br /><br />
	

	
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=bannerqc&act=capnhatft'" class="btn" />
</form>