<h3>Sửa tag</h3>

<form name="frm" method="post" action="index.php?com=tags&act=save" enctype="multipart/form-data" class="nhaplieu">

   
	
	<table width="600px" border="1" style="border:1px solid #333">
    	<tr><td colspan="3" bgcolor="#0099CC"><strong style="color:#FFF">Các sản phẩm liên kết với tag "<?=@$item['ten']?>"</strong></td></tr>
        <?php for($i=0, $count_aas=count($id_pros); $i<$count_aas; $i++){
			$sql_inf= "select * from #_product where id='".$id_pros[$i]['id_pro']."' limit 0,1";
			$d->query($sql_inf);
			$pro_info = $d->fetch_array();
		?>
        <tr>
        	<td  bgcolor="#075992"><strong style="color:#FFFFFF;width:30px; text-align:center;"><?=$i+1?></strong></td>
            <td> <a href="index.php?com=product&act=edit&id=<?=$pro_info['id']?>" style="text-decoration:none;"><?=@$pro_info['ten_vi']?></a></td>
            <td width="30px"> <a href="index.php?com=product&act=edit&id=<?=$pro_info['id']?>" style="text-decoration:none;"><img src="media/images/edit.png" border="0" /></a></td>
        </tr>
        <?php }?>
     </table><br /><strong>Để xóa liên kết giữa sản phẩm và "<?=@$item['ten_vi']?>" , vào phần quản trị sản phẩm đó và xóa tên  "<?=@$item['ten_vi']?>" trong mục Tag.</strong><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=tags&act=man&curPage=<?=$_REQUEST['curPage']?>'" class="btn" />
</form>