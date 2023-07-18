<script type="text/javascript">
	$(document).ready(function() {
		$("#chonhet").click(function(){
			var status=this.checked;
			$("input[name='chon']").each(function(){this.checked=status;})
		});
		
		$("#xoahet").click(function(){
			var listid="";
			$("input[name='chon']").each(function(){
				if (this.checked) listid = listid+","+this.value;
				})
			listid=listid.substr(1);	 //alert(listid);
			if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
			hoi= confirm("Bạn có chắc chắn muốn xóa?");
			if (hoi==true) document.location = "index.php?com=hasp&type1=<?=$_REQUEST['type1']?>&idc=<?=$_REQUEST['idc'];?>&act=delete_photo&listid=" + listid;
		});
	});
</script>
<h3><a href="index.php?com=hasp&type1=<?=$_REQUEST['type1']?>&act=add_photo&idc=<?=$_REQUEST['idc'];?>">Thêm hình ảnh</a></h3>
<table class="blue_table">
	<tr>
    	<th style="width:5%" align="center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
		<th style="width:6%;">STT</th>
        <th style="width:12%;<?php if($_REQUEST['type1']!='mausac') echo ' display:none;'; ?>">Tên màu</th>
		<th style="width:12%;">Hình ảnh</th>
		<th style="width:6%;">Hiển thị</th>
		<th style="width:6%;">Sửa</th>
		<th style="width:6%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
    	<td style="width:5%;" align="center"><input type="checkbox" name="chon" id="chon" value="<?=$items[$i]['id']?>" class="chon" /></td>
		<td style="width:6%;"><?=$items[$i]['stt']?></td>
        <td style="width:12%;<?php if($_REQUEST['type1']!='mausac') echo ' display:none;'; ?>"><?=$items[$i]['ten']?></td>
		<td style="width:12%;">
        <a href="index.php?com=hasp&type1=<?=$_REQUEST['type1']?>&act=edit_photo&id=<?=$items[$i]['id']?>&idc=<?=$items[$i]['id_photo']?>">
        <img src="<?=_upload_product.$items[$i]['photo']?>" width="100" />
        </a>
        </td>
		<td style="width:6%;"><?php if(@$items[$i]['hienthi']){?><img src="media/images/active_1.png" /><? }?></td>
		<td style="width:6%;"><a href="index.php?com=hasp&type1=<?=$_REQUEST['type1']?>&act=edit_photo&id=<?=$items[$i]['id']?>&idc=<?=$items[$i]['id_photo']?>"><img src="media/images/edit.png" border="0" /></a></td>
		<td style="width:6%;"><a href="index.php?com=hasp&type1=<?=$_REQUEST['type1']?>&act=delete_photo&idc=<?=$_REQUEST['idc']?>&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=hasp&type1=<?=$_REQUEST['type1']?>&act=add_photo&idc=<?=$_REQUEST['idc'];?>"><img src="media/images/add.jpg" border="0"  /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="xoahet"><img src="media/images/delete.jpg" border="0"  /></a>
<div class="paging"><?=$paging['paging']?></div>