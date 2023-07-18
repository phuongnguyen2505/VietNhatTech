
<h3>Hỏi đáp</h3>
<form name="frm" method="post" action="index.php?com=nhanxet&act=save&curPage=<?=$_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">
	 <b>Tên </b> <input type="text" name="ten" value="<?=$item['ten']?>" class="input" /><br />
 		<div id="info_deals" class="usual"> 
         		 <ul id="tab_content"> 
           		 <!-- <li><a class="selected" href="#tab1">Tiếng việt</a></li> -->
           		 <!-- <li><a href="#tab2">Tiếng Anh</a></li>   -->
                 <!-- <li><a href="#tab3">Tiếng Campuchia</a></li>   -->
                 <!--<li><a href="#tab4">Tiếng Nhật Bản</a></li>    -->         	   
          		</ul> 
          
         <div id="tab1" class="content_tab">
           	<b>Tiêu đề (VI)</b> <input type="text" name="tieude_vi" value="<?=$item['tieude_vi']?>" class="input" /><br /><br /><br />
                
				 
			    <br />
			    <b>Nội dung (VI)</b><br/>
				<div>
					<textarea name="noidung_vi" id="noidung_vi"><?=$item['noidung_vi']?></textarea>
					
			   
			    </div>
			    <b style="color:#f00;">Trả lời  (VI)</b><br/>
				<div>
					<textarea name="traloi_vi" id="traloi_vi"><?=$item['traloi_vi']?></textarea>
					
			   
			    </div>
		</div>	    

		<!-- <div id="tab2" class="content_tab">
				<b>Tiêu đề (EN)</b> <input type="text" name="tieude_en" value="<?=$item['tieude_en']?>" class="input" /><br /><br /><br />
               
                
			    <br /><b>Nội dung (EN)</b><br/>
				<div>
					<textarea name="noidung_en" id="noidung_en"><?=$item['noidung_en']?></textarea>
					

					</div><br/><br/>
			    <b style="color:#f00;">Trả lời  (EN)</b><br/>
				<div>
					<textarea name="traloi_en" id="traloi_en"><?=$item['traloi_en']?></textarea>
					
			   
			    </div>
			   
			</div> -->
	</div>
	<br /><br />
   
    
    
   	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br /> 
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=nhanxet&act=man'" class="btn" />
</form>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "exact",
        elements : "noidung_vi,noidung_en,traloi_vi,traloi_en",
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
