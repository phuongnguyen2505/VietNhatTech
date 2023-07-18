<h3>Cập nhật bảng giá</h3>

<form name="frm" method="post" action="index.php?com=bannerqc&act=save_banggia" enctype="multipart/form-data" class="nhaplieu">


	<b>Bảng giá hiện tại:</b> 
	<?php
	 if($item['photo']!=NULL)
	 {
	 ?>
            <strong><?=$item['photo']?></strong>
	 <?php 
	 } 
	 else 
	 {
	 echo "Chưa có bảng giá"; 
	 }
	 ?><br /><br />
	<b>Chọn bảng giá: </b> 
    <input type="file" name="file" />  doc|docx|xls|xlsx|pdf<br />
    <b>Nội dung (VI)</b> 
	<textarea name="mota_vi" id="mota_vi" cols="45" rows="5"><?=@$item['mota_vi']?></textarea>
 	 <br><br />
 	 <b>Nội dung (EN)</b> 
	<textarea name="mota_en" id="mota_en" cols="45" rows="5"><?=@$item['mota_en']?></textarea>
 	 <br><br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" checked="checked" /> <br /><br />
	

	
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=bannerqc&act=capnhat_bg'" class="btn" />
</form>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "exact",
        elements : "mota_vi,mota_en",
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
