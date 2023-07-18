<?php $idp=$_GET['idp']?>
<h3>Tags</h3>

<form name="frm" method="post" action="index.php?com=product_other&act=save_tags" enctype="multipart/form-data" class="nhaplieu">

<?php for($i=0; $i<5; $i++){?>
	
	      
	<b>Tên</b> <input type="text" name="ten<?=$i?>" class="input"  />	<br />
	<b>Link</b> <input type="text" name="link<?=$i?>" class="input" /> <strong>Link dạng: "//domainname/page" hoặc chỉ nhập "page" nếu không link sang site khác. </strong><br /><br />
    <input type="hidden" name="idp" value="<?=$idp?>" />
	
<? }?>
	
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=product_other&act=man_tags&idp=<?=$_REQUEST['id']?>'" class="btn" />
</form>