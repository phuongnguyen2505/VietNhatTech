<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "exact",
        elements : "noidung_ta,noidung_vi,noidung_en",
		theme : "advanced",
		convert_urls : false,
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,imagemanager,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",
height:"500px",
    width:"100%",
	remove_script_host : false,

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",		
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>







<?php
function get_main_category()
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
	
	?>
    
<h3>Thêm danh mục</h3>
<form name="frm" method="post" action="index.php?com=product_other&act=save_cat" enctype="multipart/form-data" class="nhaplieu">	    
 <b>Danh mục:</b><?=get_main_category();?><br /><br />
 
 <?php /*?><?php if ($_REQUEST['act']==edit_cat)
	{?>
	<b>Hình hiện tại:</b><img src="<?=_upload_product_other.$item['thumb']?>"  alt="NO PHOTO" /><br />
	<?php }?>
	<b>Hình ảnh:</b> <input type="file" name="file" /> <?=_product_other_type?><br />
    <br />  
<?php */?>
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
   
    </div> -->
    <!-- 
    <div id="tab3" class="content_tab">
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
  
    </div> -->
    
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

	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=product_other&act=man_cat'" class="btn" />
</form>
