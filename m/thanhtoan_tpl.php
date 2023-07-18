<script type="text/javascript">
function validEmail(obj) {
	var s = obj.value;
	for (var i=0; i<s.length; i++)
		if (s.charAt(i)==" "){
			return false;
		}
	var elem, elem1;
	elem=s.split("@");
	if (elem.length!=2)	return false;

	if (elem[0].length==0 || elem[1].length==0)return false;

	if (elem[1].indexOf(".")==-1)	return false;

	elem1=elem[1].split(".");
	for (var i=0; i<elem1.length; i++)
		if (elem1[i].length==0)return false;
	return true;
}//Kiem tra dang email
function IsNumeric(sText)
{
	var ValidChars = "0123456789";
	var IsNumber=true;
	var Char;

	for (i = 0; i < sText.length && IsNumber == true; i++) 
	{ 
		Char = sText.charAt(i); 
		if (ValidChars.indexOf(Char) == -1) 
		{
			IsNumber = false;
		}
	}
	return IsNumber;
}//Kiem tra dang so
function check()
		{
			var frm 	= document.frm_order;
			
			if(frm.ten.value=='') 
			{ 
				alert( "Bạn chưa điền họ tên." );
				frm.ten.focus();
				return false;
			}
			if(frm.dienthoai.value=='') 
			{ 
				alert( "Bạn chưa điền điện thoại." );
				frm.dienthoai.focus();
				return false;
			}
			if(frm.diachi.value=='') 
			{ 
				alert( "Bạn chưa điền địa chỉ." );
				frm.diachi.focus();
				return false;
			}
			
			if(frm.email.value=='') 
			{ 
				alert( "Bạn chưa điền email." );
				frm.email.focus();
				return false;
			}
			if(!validEmail(frm.email)){
				alert('Vui lòng nhập đúng địa chỉ email');
				frm.email.focus();
				return false;
			}												
			frm.submit();		
		}	
</script>
<div class="box_main" style="margin-top:60px;">
<div class="title_p "><h3 class="title title_mid">Thanh toán</h3></div>
	<div class="content gh">
           <table border="0" cellpadding="5px" cellspacing="1px" style="font-size:13px; background-color:#E1E1E1; padding:5px;" width="100%">
    	<?
			if(is_array($_SESSION['cart'])){
            	echo '<tr bgcolor="#509E0D" style="font-weight:bold;color:#FFF"><td align="center">STT</td><td align="center">Tên</td><td align="center">Giá</td><td align="center">Số lượng</td><td align="center">Tổng giá</td></tr>';
				$max=count($_SESSION['cart']);
				for($i=0;$i<$max;$i++){
					$pid=$_SESSION['cart'][$i]['productid'];
					$q=$_SESSION['cart'][$i]['qty'];				
					$pname=get_product_name($pid,$lang);

					if($q==0) continue;
			?>
            		<tr bgcolor="#FFFFFF"><td width="10%" align="center"><?=$i+1?></td>
            		<td width="29%" align="center"><?=$pname?></td>
                    <td width="20%" align="center"><?=get_price($pid)?>&nbsp;VNĐ</td>
                    <td width="14%" align="center"><?=$q?></td>                    
                    <td width="17%" align="center"><?=get_price($pid)*$q?>&nbsp;VNĐ</td>                  
            		</tr>
            <?					
				}
			?>
				<tr><td colspan="5">
              <table width="100%" cellpadding="0" cellspacing="0" border="0">
              <tr>
              <td>  
                
                <b>Tổng giá bán: <span style="color:#f00"> <?=number_format(get_order_total(),0, ',', '.')?>&nbsp; VNĐ</span></b></td>
              <td colspan="5" align="right">&nbsp;</td>
             </tr>
             </table>   
                </td></tr>
			<?
            }
			else{
				echo "<tr bgColor='#FFFFFF'><td>There are no items in your shopping cart!</td>";
			}
		?>
        </table>
    <form method="post" name="frm_order" action="" enctype="multipart/form-data" onsubmit="return check();">          
    <table width="100%" cellpadding="5" cellspacing="0" border="0" class="tablelienhe">   
      <tr>
        <td colspan="2"><b>Thông tin khách hàng</b></td>                
      </tr>
      <tr>
        <td>Họ tên<span>*</span></td>        
        <td><input name="ten" id="ten" class="input" value="" /></td>
      </tr>
      <tr>
        <td>Điện thoại<span>*</span></td>
        <td><input name="dienthoai" id="dienthoai" class="input" value="" /></td>
      </tr>
      
      <tr>
        <td>Địa chỉ<span>*</span></td>
        <td><input  name="diachi"  id="diachi" class="input"  value=""/></td>
       </tr>
       <tr>
        <td>E-mail<span>*</span></td>
        <td><input name="email" id="email" class="input"  value=""/></td>
      </tr>     
      <tr>
        <td>Nội dung</td>
        <td><textarea name="noidung"  cols="50" rows="5"  ></textarea></td>
        </tr>               
    </table>

    <div style="text-align: right; padding-top:20px;">
      
        <input title='tiếp tục' class="button" type="submit" name="next" value="Tiếp tục" style="cursor:pointer;"/>  
    </div>
      </form>
            
         </div>  
          </div>  