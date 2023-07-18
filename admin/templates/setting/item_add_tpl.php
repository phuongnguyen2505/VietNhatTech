<h3>Thiết lập hệ thống</h3>

<form name="frm" method="post" action="index.php?com=setting&act=save" enctype="multipart/form-data" class="nhaplieu">

<div id="info_deals" class="usual"> 
         		 <ul id="tab_content"> 
           		 <li><a class="selected" href="#tab1">Tiếng việt</a></li>
           		 <li><a href="#tab2">Tiếng Anh</a></li>  
                <!-- <li><a href="#tab3">Tiếng Campuchia</a></li>   -->
                 <!--<li><a href="#tab4">Tiếng Nhật Bản</a></li>      -->       	   
          </ul> 

 <div id="tab1" class="content_tab">
    <b>Title(VN)</b> <input type="text" name="title_vi" value="<?=@$item['title_vi']?>" class="input" /><br /><br>
	<b>Keywords(VN)</b> 
	<textarea name="keywords_vi" id="keywords_vi" cols="45" rows="5"><?=@$item['keywords_vi']?></textarea>
  <br><br />

	<b>Description(VN)</b> 
	<textarea name="description_vi" id="description_vi" cols="45" rows="5"><?=@$item['description_vi']?></textarea>
  <br><br />	
    <b>Tên công ty(VN):</b> <input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br /><br>
   
    <b>Địa chỉ(VN):</b> <input type="text" name="diachi_vi" value="<?=@$item['diachi_vi']?>" class="input" /><br /><br>
    </div>

	<div id="tab2" class="content_tab">
    <b>Title(EN)</b> <input type="text" name="title_en" value="<?=@$item['title_en']?>" class="input" /><br /><br>
	<b>Keywords(EN)</b> 
	<textarea name="keywords_en" id="keywords_en" cols="45" rows="5"><?=@$item['keywords_en']?></textarea>
  <br><br />

	<b>Description(EN)</b> 
	<textarea name="description_en" id="description_en" cols="45" rows="5"><?=@$item['description_en']?></textarea>
  <br><br />	
    <b>Tên công ty(EN):</b> <input type="text" name="ten_en" value="<?=@$item['ten_en']?>" class="input" /><br /><br>
   
    <b>Địa chỉ(EN):</b> <input type="text" name="diachi_en" value="<?=@$item['diachi_en']?>" class="input" /><br /><br>
    </div>
    

    
    <!--<div id="tab4" class="content_tab">
    <b>Title(JP)</b> <input type="text" name="title_ja" value="<?=@$item['title_ja']?>" class="input" /><br /><br>
	<b>Keywords(JP)</b> 
	<textarea name="keywords_ja" id="keywords_ja" cols="45" rows="5"><?=@$item['keywords_ja']?></textarea>
  <br><br />

	<b>Description(JP</b> 
	<textarea name="description_ja" id="description_ja" cols="45" rows="5"><?=@$item['description_ja']?></textarea>
  <br><br />	
    <b>Tên công ty(JP):</b> <input type="text" name="ten_ja" value="<?=@$item['ten_ja']?>" class="input" /><br /><br>
   
    <b>Địa chỉ(JP):</b> <input type="text" name="diachi_ja" value="<?=@$item['diachi_ja']?>" class="input" /><br /><br>
    </div>-->

</div>

<div style="border-bottom:1px solid #CCC; margin-top:-10px;"></div>
<br />

	   <b>Email:</b> <input type="text" name="email" value="<?=@$item['email']?>" class="input" /><br /><br>
    <b>Điện thoại:</b> <input type="text" name="dienthoai" value="<?=@$item['dienthoai']?>" class="input" /><br /><br>
    <b>Hotline:</b> <input type="text" name="hotline" value="<?=@$item['hotline']?>" class="input" /><br /><br>
    <b>Fax:</b> <input type="text" name="fax" value="<?=@$item['fax']?>" class="input" /><br /><br>
    <b>Website:</b> <input type="text" name="website" value="<?=@$item['website']?>" class="input" /><br /><br>
    <b>Fanpage Facebook:</b> <input type="text" name="facebook" value="<?=@$item['facebook']?>" class="input" /><br /><br>
    <!--<b>Google:</b> <input type="text" name="google" value="<?=@$item['google']?>" class="input" /><br /><br>
    <b>twitter:</b> <input type="text" name="twitter" value="<?=@$item['twitter']?>" class="input" /><br /><br>
    <b>youtube:</b> <input type="text" name="youtube" value="<?=@$item['youtube']?>" class="input" /><br /><br> -->
    <b>Tọa độ google map :</b> <input type="text" name="toado" value="<?=@$item['toado']?>" class="input" /><br /><br>
    <!-- <b>Tọa độ google map 2:</b> <input type="text" name="toado1" value="<?=@$item['toado1']?>" class="input" /><br /><br> -->
    <b>Code Google analytics</b> 
    <textarea name="analytics" id="analytics" cols="45" rows="5"><?=@$item['analytics']?></textarea>
    <br><br />
  <b>Code chat</b> 
    <textarea name="chat" id="chat" cols="45" rows="5"><?=@$item['chat']?></textarea>
    <br><br />
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=setting&act=capnhat'" class="btn" />
</form>

 	


