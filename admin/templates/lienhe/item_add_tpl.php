<form name="frm" method="post" action="index.php?com=lienhe&act=save&curPage=<?php echo isset($_REQUEST['curPage'])?>"
    enctype="multipart/form-data" class="nhaplieu">
    <div id="info_deals" class="usual">
        <ul id="tab_content">
            <li><a class="selected" href="#tab1">Tiếng việt</a></li>
            <li><a href="#tab2">Tiếng Anh</a></li>
            <!-- <li><a href="#tab3">Tiếng Trung</a></li>  -->
            <!--<li><a href="#tab4">Tiếng Nhật Bản</a></li>   -->
        </ul>

        <div id="tab1" class="content_tab">
            <b>Title(VN)</b> <input type="text" name="title_vi" value="<?php echo @$item['title_vi']?>"
                class="input" /><br /><br>
            <b>Keywords(VN)</b>
            <textarea name="keywords_vi" id="keywords_vi" cols="45"
                rows="5"><?php echo @$item['keywords_vi']?></textarea>
            <br><br />

            <b>Description(VN)</b>
            <textarea name="description_vi" id="description_vi" cols="45"
                rows="5"><?php echo @$item['description_vi']?></textarea>
            <br><br />
            <b>Nội dung(VI)</b><br />
            <div>
                <textarea name="noidung_vi" id="noidung_vi"><?php echo $item['noidung_vi']?></textarea>
            </div>
            <br />

        </div>

        <div id="tab2" class="content_tab">
            <b>Title(EN)</b> <input type="text" name="title_en" value="<?php echo @$item['title_en']?>"
                class="input" /><br /><br>
            <b>Keywords(EN)</b>
            <textarea name="keywords_en" id="keywords_en" cols="45"
                rows="5"><?php echo @$item['keywords_en']?></textarea>
            <br><br />

            <b>Description(EN)</b>
            <textarea name="description_en" id="description_en" cols="45"
                rows="5"><?php echo @$item['description_en']?></textarea>
            <br><br />
            <b>Nội dung(EN)</b><br />
            <div>
                <textarea name="noidung_en" id="noidung_en"><?php echo $item['noidung_en']?></textarea>
            </div>
            <br />

        </div>

        <!--  <div id="tab3" class="content_tab">
    <b>Title(CN)</b> <input type="text" name="title_ta" value="<?php echo @$item['title_ta']?>" class="input" /><br /><br>
    <b>Keywords(CN)</b> 
    <textarea name="keywords_ta" id="keywords_ta" cols="45" rows="5"><?php echo @$item['keywords_ta']?></textarea>
  <br><br />

    <b>Description(CN)</b> 
    <textarea name="description_ta" id="description_ta" cols="45" rows="5"><?php echo @$item['description_ta']?></textarea>
  <br><br />
  <b>Nội dung(CN)</b><br/>
    <div>
     <textarea name="noidung_ta" id="noidung_ta"><?php echo $item['noidung_ta']?></textarea></div>
    <br/>     
  
    </div>
     -->
        <!--<div id="tab4" class="content_tab">
    <b>Title(JP)</b> <input type="text" name="title_ja" value="<?php echo @$item['title_ja']?>" class="input" /><br /><br>
    <b>Keywords(JP)</b> 
    <textarea name="keywords_ja" id="keywords_ja" cols="45" rows="5"><?php echo @$item['keywords_ja']?></textarea>
  <br><br />

    <b>Description(JP)</b> 
    <textarea name="description_ja" id="description_ja" cols="45" rows="5"><?php echo @$item['description_ja']?></textarea>
  <br><br />
   <b>Nội dung(JP)</b><br/>
    <div>
     <textarea name="noidung_ja" id="noidung_ja"><?php echo $item['noidung_ja']?></textarea></div>
    <br/>      
  
    </div>-->

    </div>



    <b>Số thứ tự</b> <input type="text" name="stt" value="<?php echo isset($item['stt'])?$item['stt']:1?>"
        style="width:30px"><br>
    <b>Hiển thị tin</b> <input type="checkbox" name="hienthi"
        <?php echo (!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br /><br />
    <input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=lienhe&act=capnhat'"
        class="btn" />
</form>


<script type="text/javascript">
tinyMCE.init({
    // General options
    mode: "exact",
    elements: "noidung_vi",
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

function select_onchange() {
    var a = document.getElementById("id_list");
    var act = <?php echo isset($_REQUEST['act']) ? json_encode($_REQUEST['act']) : "'add'"; ?>;
    var id = <?php echo isset($_REQUEST['id']) ? json_encode($_REQUEST['id']) : "''"; ?>;
    window.location = "index.php?com=product&act=" + (act === 'edit' ? 'edit' : 'add') + (id ? "&id=" + id : "") +
        "&id_list=" + a.value;
    return true;
}
</script>

<script type="text/javascript">
tinyMCE.init({
    // General options
    mode: "exact",
    elements: "noidung_en",
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

<script type="text/javascript">
tinyMCE.init({
    // General options
    mode: "exact",
    elements: "noidung_ta",
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

<script type="text/javascript">
tinyMCE.init({
    // General options
    mode: "exact",
    elements: "noidung_ja",
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
