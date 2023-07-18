<?php $idp=$_GET['idp'];?>
<h3><a href="index.php?com=product_other&act=add_tags&idp=<?=$idp?>">Thêm tags</a></h3>

<table class="blue_table">
	<tr>
		<th style="width:5%;">Stt</th>
		<th style="width:45%;">Tên tag</th>
        <th style="width:40%;">Link</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"><?=$items[$i]['stt']?></td>
		<td style="width:45%;">      
       	<a href="index.php?com=product_other&act=edit_tags&id=<?=$items[$i]['id']?>&idp=<?=$items[$i]['id_pro']?>" style="text-decoration:none;"><?=$items[$i]['ten']?></a>
        </td>
        <td style="width:40%;">      
       	<a href="index.php?com=product_other&act=edit_tags&id=<?=$items[$i]['id']?>&idp=<?=$items[$i]['id_pro']?>" style="text-decoration:none;"><?=$items[$i]['link']?></a>
        </td>
		<td style="width:5%;">
		<a href="index.php?com=product_other&act=edit_tags&id=<?=$items[$i]['id']?>&idp=<?=$items[$i]['id_pro']?>"><img src="media/images/edit.png" /></a>
        </td>
		<td style="width:5%;"><a href="index.php?com=product_other&act=delete_tags&id=<?=$items[$i]['id']?>&idp=<?=$items[$i]['id_pro']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=product_other&act=add_tags&idp=<?=$idp?>"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?=$paging['paging']?></div>