<h3>Sửa giới thiệu</h3>

<form name="frm" method="post" action="index.php?com=about&act=save&curPage=<?=isset($_REQUEST['curPage'])?>"
    enctype="multipart/form-data" class="nhaplieu">
    <!-- 
	<?php if ($_REQUEST['act']==edit)
	{?>
	<b>Hình hiện tại:</b><img src="<?=_upload_tintuc.$item['thumb']?>"  alt="NO PHOTO" /><br />
	<?php }?>
	<b>Hình ảnh:</b> <input type="file" name="file" /> <?=_product_type?> - <strong>Kích thước chuẩn: width 425px - height 290px</strong><br />
    <br /> -->

    <div id="info_deals" class="usual">
        <ul id="tab_content">
            <li><a class="selected" href="#tab1">Tiếng việt</a></li>
            <li><a href="#tab2">Tiếng Anh</a></li>
            <!-- <li><a href="#tab3">Tiếng Campuchia</a></li>   -->
            <!--<li><a href="#tab4">Tiếng Nhật Bản</a></li>    -->
        </ul>

        <div id="tab1" class="content_tab">
            <b>Tên(VN):</b> <input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br /><br>

            <b>Title(VN)</b> <input type="text" name="title_vi" value="<?=@$item['title_vi']?>"
                class="input" /><br /><br>
            <b>Keywords(VN)</b>
            <textarea name="keywords_vi" id="keywords_vi" cols="45" rows="5"><?=@$item['keywords_vi']?></textarea>
            <br><br />

            <b>Description(VN)</b>
            <textarea name="description_vi" id="description_vi" cols="45"
                rows="5"><?=@$item['description_vi']?></textarea>
            <br><br />
            <!-- <b>Mô tả(VN)</b> 
	<textarea name="mota_vi" id="mota_vi" cols="45" rows="5"><?=@$item['mota_vi']?></textarea>
  <br><br /> -->
            <b>Nội dung(VI)</b><br />
            <div>
                <textarea name="noidung_vi" id="noidung_vi"><?=stripslashes($item['noidung_vi'])?></textarea>
            </div>
            <br />

        </div>

        <div id="tab2" class="content_tab">
            <b>Tên(EN):</b> <input type="text" name="ten_en" value="<?=@$item['ten_en']?>" class="input" /><br /><br>
            <!-- <b>Mô tả(EN)</b> 
	<textarea name="mota_en" id="mota_en" cols="45" rows="5"><?=@$item['mota_en']?></textarea>
  <br><br /> -->
            <b>Title(EN)</b> <input type="text" name="title_en" value="<?=@$item['title_en']?>"
                class="input" /><br /><br>
            <b>Keywords(EN)</b>
            <textarea name="keywords_en" id="keywords_en" cols="45" rows="5"><?=@$item['keywords_en']?></textarea>
            <br><br />

            <b>Description(EN)</b>
            <textarea name="description_en" id="description_en" cols="45"
                rows="5"><?=@$item['description_en']?></textarea>
            <br><br />
            <b>Nội dung(EN)</b><br />
            <div>
                <textarea name="noidung_en" id="noidung_en"><?=stripslashes($item['noidung_en'])?></textarea>
            </div>
            <br />

        </div>

        <!--  <div id="tab3" class="content_tab">
      <b>Tên(CA):</b> <input type="text" name="ten_ta" value="<?=@$item['ten_ta']?>" class="input" /><br /><br>
      <b>Mô tả(CA)</b> 
	<textarea name="mota_ta" id="mota_ta" cols="45" rows="5"><?=@$item['mota_ta']?></textarea>
  <br><br />
    <b>Title(CA)</b> <input type="text" name="title_ta" value="<?=@$item['title_ta']?>" class="input" /><br /><br>
	<b>Keywords(CA)</b> 
	<textarea name="keywords_ta" id="keywords_ta" cols="45" rows="5"><?=@$item['keywords_ta']?></textarea>
  <br><br />

	<b>Description(CA)</b> 
	<textarea name="description_ta" id="description_ta" cols="45" rows="5"><?=@$item['description_ta']?></textarea>
  <br><br />
  <b>Nội dung(CA)</b><br/>
	<div>
	 <textarea name="noidung_ta" id="noidung_ta"><?=stripslashes($item['noidung_ta'])?></textarea></div>
    <br/> 	
  
    </div> -->

        <!-- <div id="tab4" class="content_tab">
      <b>Tên(JP):</b> <input type="text" name="ten_ja" value="<?=@$item['ten_ja']?>" class="input" /><br /><br>
      <b>Mô tả(JP)</b> 
	<textarea name="mota_ja" id="mota_ja" cols="45" rows="5"><?=@$item['mota_ja']?></textarea>
  <br><br />
    <b>Title(JP)</b> <input type="text" name="title_ja" value="<?=@$item['title_ja']?>" class="input" /><br /><br>
	<b>Keywords(JP)</b> 
	<textarea name="keywords_ja" id="keywords_ja" cols="45" rows="5"><?=@$item['keywords_ja']?></textarea>
  <br><br />

	<b>Description(JP)</b> 
	<textarea name="description_ja" id="description_ja" cols="45" rows="5"><?=@$item['description_ja']?></textarea>
  <br><br />
   <b>Nội dung(JP)</b><br/>
	<div>
	 <textarea name="noidung_ja" id="noidung_ja"><?=stripslashes($item['noidung_ja'])?></textarea></div>
    <br/>  	
  
    </div>-->

    </div>


    <!--    
	<b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
	<b>Hiển thị tin</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br /><br /> -->
    <input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=about&act=capnhat'"
        class="btn" />
</form>

<script type="text/javascript">
tinyMCE.init({
    // General options
    mode: "exact",
    elements: "noidung_vi,noidung_en,noidung_ta,noidung_ja",
    theme: "advanced",
    convert_urls: false,
    plugins: "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,imagemanager,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",
    height: "500px",
    width: "100%",
    remove_script_host: false,

    // Theme options
    theme_advanced_buttons1: "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
    theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
    theme_advanced_buttons3: "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
    theme_advanced_toolbar_location: "top",
    theme_advanced_toolbar_align: "left",
    theme_advanced_statusbar_location: "bottom",
    theme_advanced_resizing: true,

    // Example content CSS (should be your site CSS)
    content_css: "css/content.css",

    // Drop lists for link/image/media/template dialogs
    template_external_list_url: "lists/template_list.js",
    external_link_list_url: "lists/link_list.js",
    external_image_list_url: "lists/image_list.js",
    media_external_list_url: "lists/media_list.js",

    // Style formats
    style_formats: [{
            title: 'Bold text',
            inline: 'b'
        },
        {
            title: 'Red text',
            inline: 'span',
            styles: {
                color: '#ff0000'
            }
        },
        {
            title: 'Red header',
            block: 'h1',
            styles: {
                color: '#ff0000'
            }
        },
        {
            title: 'Example 1',
            inline: 'span',
            classes: 'example1'
        },
        {
            title: 'Example 2',
            inline: 'span',
            classes: 'example2'
        },
        {
            title: 'Table styles'
        },
        {
            title: 'Table row 1',
            selector: 'tr',
            classes: 'tablerow1'
        }
    ],

    // Replace values for the template plugin
    template_replace_values: {
        username: "Some User",
        staffid: "991234"
    }
});
</script>