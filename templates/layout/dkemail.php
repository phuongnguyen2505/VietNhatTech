<div id="nhantin">
            
        
     <form action="" method="post" name="frm_dknhantin" id="frm_dknhantin" onsubmit="return false;">
        
        <input type="text" id="email_newsletter" name="email_subcri" value="<?=_nhapemail?>" onblur="if(this.value=='') this.value='<?=_nhapemail?>'" onfocus="if(this.value =='<?=_nhapemail?>' ) this.value=''" />
        <input type="submit" name="btn_send_newsletter" value="<?=_gui?>" id="btn_send_newsletter" />
    </form>

<script type="text/javascript">
    $(document).ready(function(e) {
        $('#btn_send_newsletter').click(function(){
            var el = $('#email_newsletter');
            var emailRegExp = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.([a-z]){2,4})$/;
            if(el.val()=='' || el.val()=='<?=_nhapemail?>'){el.focus();alert('<?=_nhapemail1?>');return false;}
            if(!emailRegExp.test(el.val())){
                el.focus();
                alert('<?=_dinhdangemail?>');
            }else{
                $.ajax({
                    type: 'POST',
                    url : 'ajax/newsletter.php',
                    data: 'email='+el.val(),
                    success: function(result){
                        alert(result);
                        el.val('<?=_nhapemail?>');
                    }
                });	
            }
            return false;
        });
    });
</script>
</div>