<h3>Hinh ảnh</h3>
<form name="frm" method="post" action="index.php?com=product_other&act=save_tags" enctype="multipart/form-data" class="nhaplieu">
	<b>Tên</b> <input type="text" name="ten" value="<?=$item['ten']?>" class="input" />	<br />
	<b>Link</b> <input type="text" name="link" class="input"  value="<?=$item['link']?>"/> <strong>Link dạng: "//domainname/page" hoặc chỉ nhập "page" nếu không link sang site khác. </strong><br /><br />

	<input type="hidden" name="id" value="<?=$item['id']?>" />
    <input type="hidden" name="id_pro" value="<?=$_REQUEST['idp']?>" /><?php //echo $_REQUEST['idp'];exit;?>
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=product_other&act=man_tags&idp=<?=$_REQUEST['idp']?>'" class="btn" />
</form>