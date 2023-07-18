<script>
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
	if (hoi==true) document.location = "index.php?com=tags&act=delete&listid=" + listid;
});
});
</script>


<table class="blue_table">

	<tr>
    	<th style="width:3%" align="center"><input type="checkbox" name="chonhet" id="chonhet" /></th>	
		<th width="5%" style="width:6%;">ID</th>

		<th style="width:30%;">Tên Tag (Tổng sản phẩm liên kết với tag)</th>

		<th width="9%" style="width:6%;">Sửa</th>
		<th width="9%" style="width:6%;">Xóa</th>
	</tr>
    
	<?php for($i=0, $count=count($items); $i<$count; $i++){
		$sql_protag= "select id_pro from #_protag where id_tag='".$items[$i]['id']."'";
		$d->query($sql_protag);
		$pro_intag = $d->result_array();
	?>
	<tr>
    	<td style="width:3%;" align="center"><input type="checkbox" name="chon" id="chon" value="<?=$items[$i]['id']?>" class="chon" /></td>
		<td style="width:6%;" align="center"><?=$items[$i]['id']?></td>
		<td style="width:30%;" align="center"><a href="index.php?com=tags&act=edit&id=<?=$items[$i]['id']?>" style="text-decoration:none;"><?=$items[$i]['ten']?> &nbsp;&nbsp; ( <?=count($pro_intag)?> )</a></td>
        
		<td style="width:6%;" align="center"><a href="index.php?com=tags&act=edit&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png"  border="0"/></a></td>
		<td style="width:6%;"><a href="index.php?com=tags&act=delete<?php if($_REQUEST['id_ncat']!='') echo "&id_ncat=".$_REQUEST['id_ncat'];?><?php if($_REQUEST['curPage']!='') echo "&curPage=".$_REQUEST['curPage'];?>&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Hãy chắc chắn rằng tag này không còn liên kết với sản phẩm nào ! Xác nhận xóa ?')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=tags&act=add"><img src="media/images/add.jpg" border="0"  /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="xoahet"><img src="media/images/delete.jpg" border="0"  /></a>

<div class="paging"><?=$paging['paging']?></div>