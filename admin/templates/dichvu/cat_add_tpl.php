<?php
function get_main_category()
	{
		$sql="select * from table_dichvu_list order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_list" name="id_list" onchange="select_onchange1()" class="main_font">
			<option>Chọn danh mục</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$_REQUEST["id_list"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
	?>
<h3>Thêm danh mục</h3>
<form name="frm" method="post" action="index.php?com=dichvu&act=save_cat" enctype="multipart/form-data" class="nhaplieu">	
      <b>Danh mục cấp 1:</b><?=get_main_category();?><br /><br />
    <b>Tên - VIE</b> <input type="text" name="ten_vi" value="<?=$item['ten_vi']?>" class="input" /><br />
     <b>Title(VN)</b> <input type="text" name="title_vi" value="<?=@$item['title_vi']?>" class="input" /><br /><br>
	<b>Keywords(VN)</b> 
	<textarea name="keywords_vi" id="keywords_vi" cols="45" rows="5"><?=@$item['keywords_vi']?></textarea>
  <br><br />

	<b>Description(VN)</b> 
	<textarea name="description_vi" id="description_vi" cols="45" rows="5"><?=@$item['description_vi']?></textarea>
  <br><br />	
    <!-- <b>Tên - ENG</b> <input type="text" name="ten_en" value="<?=$item['ten_en']?>" class="input" /><br /> -->
    <br>
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=dichvu&act=man_cat'" class="btn" />
</form>