<h3>Thêm danh mục</h3>
<form name="frm" method="post" action="index.php?com=product_other&act=save_list" enctype="multipart/form-data" class="nhaplieu">	  
<!-- 
<?php if ($_REQUEST['act']==edit_list)
	{?>
	<b>Hình hiện tại:</b><img src="<?=_upload_product_other.$item['thumb']?>"  alt="NO PHOTO" width="250"/><br />
	<?php }?>
	<b>Hình ảnh:</b> <input type="file" name="file" /> width: 230px - height:230px <?=_product_other_type?><br />
    <br /> 
  
 -->
<div id="info_deals" class="usual"> 
         		 <ul id="tab_content"> 
           		   <li><a class="selected" href="#tab1">Tiếng Việt</a></li>
           		   <li><a href="#tab2">Tiếng Anh</a></li>  
                 <!-- <li><a href="#tab3">Tiếng Campuchia</a></li>   -->
                            	   
          </ul> 
          
          <div id="tab1" class="content_tab">
           <b>Tên(VN):</b> <input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br /><br>
           <!-- <b>Mô tả(VN)</b><textarea type="text" cols="45" rows="5" name="mota_vi"   /><?=@$item['mota_vi']?></textarea><br /><br> -->
    <b>Title(VN)</b> <input type="text" name="title_vi" value="<?=@$item['title_vi']?>" class="input" /><br /><br>
	<b>Keywords(VN)</b> 
	<textarea name="keywords_vi" id="keywords_vi" cols="45" rows="5"><?=@$item['keywords_vi']?></textarea>
  <br><br />

	<b>Description(VN)</b> 
	<textarea name="description_vi" id="description_vi" cols="45" rows="5"><?=@$item['description_vi']?></textarea>
  <br><br />	
   
    </div>

	<div id="tab2" class="content_tab">
     <b>Tên(EN):</b> <input type="text" name="ten_en" value="<?=@$item['ten_en']?>" class="input" /><br /><br>
     <!-- <b>Mô tả(EN)</b> <textarea type="text" name="mota_en"  class="input"  maxlength="70" /><?=@$item['mota_en']?></textarea><br /><br> -->
    <b>Title(EN)</b> <input type="text" name="title_en" value="<?=@$item['title_en']?>" class="input" /><br /><br>
	<b>Keywords(EN)</b> 
	<textarea name="keywords_en" id="keywords_en" cols="45" rows="5"><?=@$item['keywords_en']?></textarea>
  <br><br />

	<b>Description(EN)</b> 
	<textarea name="description_en" id="description_en" cols="45" rows="5"><?=@$item['description_en']?></textarea>
  <br><br />	
   
    </div>
    
    <!-- <div id="tab3" class="content_tab">
      <b>Tên(CA):</b> <input type="text" name="ten_ta" value="<?=@$item['ten_ta']?>" class="input" /><br /><br>
      <b>Mô tả(CA)</b> <textarea type="text" name="mota_ta"  class="input"  maxlength="70" /><?=@$item['mota_ta']?></textarea><br /><br>
    <b>Title(CA)</b> <input type="text" name="title_ta" value="<?=@$item['title_ta']?>" class="input" /><br /><br>
	<b>Keywords(CA)</b> 
	<textarea name="keywords_ta" id="keywords_ta" cols="45" rows="5"><?=@$item['keywords_ta']?></textarea>
  <br><br />

	<b>Description(CA)</b> 
	<textarea name="description_ta" id="description_ta" cols="45" rows="5"><?=@$item['description_ta']?></textarea>
  <br><br />	
  
    </div> -->
    
    <!--<div id="tab4" class="content_tab">
      <b>Tên(JP):</b> <input type="text" name="ten_ja" value="<?=@$item['ten_ja']?>" class="input" /><br /><br>
      <b>Mô tả(JP)</b> <textarea type="text" name="mota_ja"  class="input"  maxlength="70" /><?=@$item['mota_ja']?></textarea><br /><br>
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

	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=product_other&act=man_list'" class="btn" />
</form>