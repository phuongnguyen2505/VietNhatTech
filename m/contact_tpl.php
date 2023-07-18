<script type="text/javascript" src="admin/media/scripts/my_script.js"></script>
<script type="text/javascript">
function js_submit(){
	if(isEmpty(document.getElementById('ten'), "<?=_xinnhaphoten?>")){
		document.getElementById('ten').focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('ten'), "<?=_xinnhapdiachi?>")){
		document.getElementById('ten').focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('dienthoai'), "<?=_xinnhapdt?>")){
		document.getElementById('dienthoai').focus();
		return false;
	}
	
	if(!isNumber(document.getElementById('dienthoai'), "<?=_dtkhonghople?>")){
		document.getElementById('dienthoai').focus();
		return false;
	}
	
	if(!check_email(document.frm.email.value)){
		alert("<?=_emailkhonghople?>");
		document.frm.email.focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('tieude1'), "<?=_xinnhaptieude?>")){
		document.getElementById('tieude1').focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('noidung'), "<?=_xinnhapnoidung?>")){
		document.getElementById('noidung').focus();
		return false;
	}
	
	document.frm.submit();
}
</script>

<div class="ui-corner-all custom-corners">
    <div class="ui-bar ui-bar-a"><h3>LIÊN HỆ</h3></div>
    <div class="ui-body ui-body-a">
        <div><?=stripcslashes($company_contact['noidung'])?> </div>
       
        <div>
            <form method="post" name="frm" action="index.php?com=lien-he">

                <table width="100%" cellpadding="5" cellspacing="0" border="0" class="tablelienhe ">
                    <tr>
                        <td><input name="ten" type="text" class="input" id="ten" size="40" placeholder="Họ và tên "/></td>
                    </tr>                        
                    <tr>
                        <td><input name="diachi" id="diachi" type="text"  class="input" size="40" placeholder="Địa chỉ" /></td>
                    </tr>
                    <tr>
                        <td><input name="dienthoai" type="text" class="input" id="dienthoai" size="40" placeholder="Điện thoại" /></td>
                    </tr>
                    <tr>
                        <td><input name="email" id="email" type="text" class="input" size="40" placeholder="Email" /></td>
                    </tr>                                                  
                    <tr>
                        <td><input name="tieude1" type="text" class="input" id="tieude1" size="40" placeholder="Chủ đề" /></td>
                    </tr>                         
                    <tr>
                        <td><textarea name="noidung" cols="40" rows="5" class="ta_noidung" id="noidung" placeholder="Nội dung" ></textarea></td>
                    </tr>
                    <tr>
                     
                        <td> 
                            <input  class="button" style="background:#0065b3" type="button" value="Gửi" onclick="js_submit();" />
                            <input class="button" style="background:#0065b3" type="button" value="Nhập lại" onclick="document.frm.reset();" />                       
                        </td>
                    </tr>
                </table>   
            </form>
        </div>
    </div>
</div>


 
