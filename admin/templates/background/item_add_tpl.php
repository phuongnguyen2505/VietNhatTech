<h3>Cập nhật background</h3>
<form name="frm" method="post" action="index.php?com=background&act=save" enctype="multipart/form-data" class="nhaplieu"> 
  <b>Màu nền</b> <input type="color" name="color" value="<?=@$item['color']?>" class="input" /> <br />
    <b>Hình hiện tại:</b><img src="<?=_upload_hinhanh.$item['photo']?>" alt="NO PHOTO"  width="150"/><br />
    <br />
    <b>Sử dụng hình ảnh:</b> <input type="checkbox" name="hienthi" <?php if($item['hienthi']==1) echo 'checked="checked"'; ?>  /> <br /><br />

  <b>Hình ảnh:</b> <input type="file" name="file" /><br /><br />
  <b>Repeat</b><select name="repeatbg">
     <option value="repeat">Repeat</option>
      <option value="no-repeat" <?php if($item['repeatbg']=='no-repeat') echo 'selected'?>>No-repeat</option>        
        <option value="repeat-x" <?php if($item['repeatbg']=='repeat-x') echo 'selected'?>>Repeat-x</option>
        <option value="repeat-y" <?php if($item['repeatbg']=='repeat-y') echo 'selected'?>>Repeat-y</option>
   </select><br /><br />
   <b>Position</b> <input type="text" name="position" value="<?=@$item['position']?>" class="input" /><br /><br />
  <input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
  <input type="submit" value="Lưu" class="btn" />
  <input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=background&act=man'" class="btn" />
</form>