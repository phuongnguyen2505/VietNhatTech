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
		location.href = "index.php?com=newsnb&act=man&keyword="+keyword;
		loadPage(document.location);
			
}

</script>
<script language="javascript">
	function select_onchange()
	{
		var a=document.getElementById("id_cat");
		window.location ="index.php?com=newsnb&act=man&id_cat="+a.value;	
		return true;
	}
	
			
</script>
<?php
function get_main_cat()
	{
		$sql="select ten_vi,id from table_newsnb_cat order by stt asc";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_cat" name="id_cat" onchange="select_onchange()" class="main_font">
			<option value="">Danh mục</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==$_REQUEST['id_cat'])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
	
?>



<h3><a href="index.php?com=newsnb&act=add">Thêm bài viết</a></h3>

<table class="blue_table">

	<tr>
		<th style="width:5%;">Stt</th>	
        <!--<th style="width:35%;"><?php /*?><?=get_main_cat();?><?php */?></th>-->
        <th style="width:85%;">Tên</th>
        <!--<th style="width:5%;">Nổi bật</th>-->
	  	<th style="width:5%;">Hiển thị</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
    
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;" align="center"><?=$items[$i]['stt']?></td>     
        <!--<td style="width:35%;">
			  <?php /*?><?php
				$sql_danhmuc="select ten_vi from table_newsnb_cat where id='".$items[$i]['id_cat']."'";
				$result=mysql_query($sql_danhmuc);
				$item_danhmuc =mysql_fetch_array($result);
				echo @$item_danhmuc['ten_vi']
			?>   <?php */?>   
        </td> -->
          
		<td style="width:85%;" align="center"><a href="index.php?com=newsnb&act=edit&id_cat=<?=$items[$i]['id_cat']?>&id=<?=$items[$i]['id']?>" style="text-decoration:none;"><?=$items[$i]['ten_vi']?></a></td>
        
       <?php /*?> <td align="center" style="width:5%;">
        <?php
        if($items[$i]['tinnoibat']>0)
        {
        ?>
        <a href="index.php?com=newsnb&act=man&tinnoibat=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/yes-km.gif" border="0" /></a>
        <?php
        }
        else
        {
        ?>
        <a href="index.php?com=newsnb&act=man&tinnoibat=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/no-km.gif" border="0" /></a>
        <?php }
        ?> 
        </td><?php */?>
        
        <td style="width:5%;">
		<?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        <a href="index.php?com=newsnb&act=man&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_1.png"  border="0"/></a>
		<? 
		}
		else
		{
		?>
         <a href="index.php?com=newsnb&act=man&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_0.png" border="0" /></a>
         <?php
		 }?>        </td>
         
		<td style="width:5%;" align="center"><a href="index.php?com=newsnb&act=edit&id_cat=<?=$items[$i]['id_cat']?>&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png"  border="0"/></a></td>
		<td style="width:5%;"><a href="index.php?com=newsnb&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=newsnb&act=add"><img src="media/images/add.jpg" border="0"  /></a>

<div class="paging"><?=$paging['paging']?></div>