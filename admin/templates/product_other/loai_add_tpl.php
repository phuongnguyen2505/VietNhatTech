<h3>Thêm danh mục</h3>
<script language="javascript">				
	function select_onchange1()
	{				
		var a=document.getElementById("id_list");
		window.location ="index.php?com=product_other&act=<?php if($_REQUEST['act']=='edit_item') echo 'edit_item'; else echo 'add_item';?><?php if($_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_list="+a.value;	
		return true;
	}

	
</script>
<?php
function get_main_list()
	{
		$sql="select * from table_product_other_list order by stt";
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
	
	
	function get_main_category()
	{
		$sql_huyen="select * from table_product_other_cat where id_list=".$_REQUEST['id_list']." order by id desc ";
		$result=mysql_query($sql_huyen);
		$str='
			<select id="id_cat" name="id_cat"">
			<option>Chọn danh mục</option>			
			';
		while ($row_huyen=@mysql_fetch_array($result)) 
		{
			if($row_huyen["id"]==(int)@$_REQUEST["id_cat"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row_huyen["id"].' '.$selected.'>'.$row_huyen["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
?>
<form name="frm" method="post" action="index.php?com=product_other&act=save_item&curPage=<?=$_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">	 
    <b>Danh mục cấp 1:</b><?=get_main_list();?><br /><br />
	<b>Danh mục cấp 2:</b><?=get_main_category();?><br /><br />   	
	<div id="info_deals" class="usual"> 
         		 <ul id="tab_content"> 
           		 <!-- <li><a class="selected" href="#tab1">Tiếng việt</a></li> -->
           		 <!-- <li><a href="#tab2">Tiếng Anh</a></li>   -->
                 <!-- <li><a href="#tab3">Tiếng Campuchia</a></li>   -->
                 <!--<li><a href="#tab4">Tiếng Nhật Bản</a></li>       -->      	   
          </ul> 
          
          <div id="tab1" class="content_tab">
           <b>Tên(VN):</b> <input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br /><br>
    <b>Title(VN)</b> <input type="text" name="title_vi" value="<?=@$item['title_vi']?>" class="input" /><br /><br>
	<!-- <b>Mô tả (VN)</b> 
	<textarea name="noidung_vi" id="noidung_vi" ><?=@$item['noidung_vi']?></textarea>
  <br><br /> -->
    <b>Keywords(VN)</b> 
	<textarea name="keywords_vi" id="keywords_vi" cols="45" rows="5"><?=@$item['keywords_vi']?></textarea>
  <br><br />

	<b>Description(VN)</b> 
	<textarea name="description_vi" id="description_vi" cols="45" rows="5"><?=@$item['description_vi']?></textarea>
  <br><br />	
   
    </div>

	<!-- <div id="tab2" class="content_tab">
     <b>Tên(EN):</b> <input type="text" name="ten_en" value="<?=@$item['ten_en']?>" class="input" /><br /><br>
   <b>Mô tả (EN)</b> 
	<textarea name="noidung_en" id="noidung_en" ><?=@$item['noidung_en']?></textarea>
  <br><br 
    <b>Title(EN)</b> <input type="text" name="title_en" value="<?=@$item['title_en']?>" class="input" /><br /><br>
	<b>Keywords(EN)</b> 
	<textarea name="keywords_en" id="keywords_en" cols="45" rows="5"><?=@$item['keywords_en']?></textarea>
  <br><br />

	<b>Description(EN)</b> 
	<textarea name="description_en" id="description_en" cols="45" rows="5"><?=@$item['description_en']?></textarea>
  <br><br />	
   
    </div>
     -->
   <!--  <div id="tab3" class="content_tab">
      <b>Tên(CA):</b> <input type="text" name="ten_ta" value="<?=@$item['ten_ta']?>" class="input" /><br /><br>
    <b>Mô tả (CA)</b> 
	<textarea name="noidung_ta" id="noidung_ta" ><?=@$item['noidung_ta']?></textarea>
  <br><br 
    <b>Title(CA)</b> <input type="text" name="title_ta" value="<?=@$item['title_ta']?>" class="input" /><br /><br>
	<b>Keywords(CA)</b> 
	<textarea name="keywords_ta" id="keywords_ta" cols="45" rows="5"><?=@$item['keywords_ta']?></textarea>
  <br><br />

	<b>Description(CA)</b> 
	<textarea name="description_ta" id="description_ta" cols="45" rows="5"><?=@$item['description_ta']?></textarea>
  <br><br />	
  
    </div>
     -->
   <!-- <div id="tab4" class="content_tab">
      <b>Tên(JP):</b> <input type="text" name="ten_ja" value="<?=@$item['ten_ja']?>" class="input" /><br /><br>
    <b>Title(JP)</b> <input type="text" name="title_ja" value="<?=@$item['title_ja']?>" class="input" /><br /><br>
	<b>Keywords(JP)</b> 
	<textarea name="keywords_ja" id="keywords_ja" cols="45" rows="5"><?=@$item['keywords_ja']?></textarea>
  <br><br />

	<b>Description(JP</b> 
	<textarea name="description_ja" id="description_ja" cols="45" rows="5"><?=@$item['description_ja']?></textarea>
  <br><br />	
  
    </div>-->
</div>
	<b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
	<b>Hiển thị tin</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br /><br />
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=product_other&act=man_item'" class="btn" />
</form>