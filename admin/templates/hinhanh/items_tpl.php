<script type="text/javascript">
function doEnter(evt){
	// IE					// Netscape/Firefox/Opera
	var key;
	if(evt.keyCode == 13 || evt.which == 13){
		onSearch(evt);
	}
}
function onSearch(evt) {	
		var keyword = document.getElementById("keyword").value;		
		//var encoded = Base64.encode(keyword);
		location.href = "index.php?com=product&act=man&keyword="+keyword;
		loadPage(document.location);
			
}

</script>
<script language="javascript">
	function select_onchange()
	{
		var a=document.getElementById("id_cat");
		window.location ="index.php?com=hinhanh&act=man&id_cat="+a.value;	
		return true;
	}
	
			
</script>


<h3><a href="index.php?com=hinhanh&act=add&idc=<?=$_REQUEST['idc']?>">Thêm hình ảnh</a></h3>

<table class="blue_table">

	<tr>
		<th style="width:5%;">Stt</th>	
        <?php /*?><th style="width:35%;"><?=get_main_cat();?></th><?php */?>
        <th style="width:20%;">Link</th>
        <th style="width:20%;">Hình ảnh</th>
	  	<th style="width:5%;">Hiển thị</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
    
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;" align="center"><?=$items[$i]['stt']?></td>     
      <?php /*?>  <td style="width:35%;">
			  <?php
				$sql_danhmuc="select ten_vi from table_hinhanh_cat where id='".$items[$i]['id_cat']."'";
				$result=mysql_query($sql_danhmuc);
				$item_danhmuc =mysql_fetch_array($result);
				echo @$item_danhmuc['ten_vi']
			?>      
        </td> <?php */?>
          
		<td style="width:20%;" align="center"><a href="index.php?com=hinhanh&act=edit&idc=<?=$items[$i]['id_cat']?>&id=<?=$items[$i]['id']?>" style="text-decoration:none;"><?=$items[$i]['ten_vi']?><br /><br /></a></td>
		<td style="width:20%;" align="center"><a href="index.php?com=hinhanh&act=edit&idc=<?=$items[$i]['id_cat']?>&id=<?=$items[$i]['id']?>" style="text-decoration:none;"><img src="<?=_upload_thuvienanh.$items[$i]['thumb']?>" alt="NO PHOTO"  width="150"/><br /><br /></a></td>
		<td style="width:5%;">
        
        
		
		<?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        <a href="index.php?com=hinhanh&act=man&idc=<?=$_REQUEST['idc']?>&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_1.png"  border="0"/></a>
		<? 
		}
		else
		{
		?>
         <a href="index.php?com=hinhanh&act=man&idc=<?=$_REQUEST['idc']?>&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_0.png" border="0" /></a>
         <?php
		 }?>        </td>
		<td style="width:5%;" align="center"><a href="index.php?com=hinhanh&act=edit&idc=<?=$items[$i]['id_cat']?>&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png"  border="0"/></a></td>
		<td style="width:5%;"><a href="index.php?com=hinhanh&act=delete&id=<?=$items[$i]['id']?>&idc=<?=$items[$i]['id_cat']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=hinhanh&act=add&idc=<?=$_REQUEST['idc']?>"><img src="media/images/add.jpg" border="0"  /></a>

<div class="paging"><?=$paging['paging']?></div>