 <script type="text/javascript" src="admin/media/scripts/my_script.js"></script>
<script type="text/javascript">
function js_submit(){
	if(isEmpty(document.getElementById('ten'), "<?=_xinnhaphoten?>")){
		document.getElementById('ten').focus();
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
<div id="left">
      <?php include _template."layout/left.php"; ?>
  </div>
  <!-- end left -->
    <div id="right">	
<div class="box_main " >
		<div class="title_p "><h3 class="title">Hỏi đáp</h3></div>
        <div class=" col-md-12 col-sm-12 col-xs-12" style="padding-bottom:15px;">
        <div id="cauhoi" >
        <?php 
        	if(!empty($rows_cauhoi)){
        		echo '<ul>';
        		foreach ($rows_cauhoi as $key => $value) {
        ?>
        <li>
        	<h3><?=$value['tieude']?></h3>
        	<p class="small"><?=_ngaydang?> <span style="font-size:12px;">:<?=date('d-m-Y h:i:s A',$value['ngaytao'])?> </span> - <span style="font-size:12px;color:#00f;text-transform:capitalize;"><?=$value['ten']?></span></p>
        	<div class="hd_noidung">
        		<?=$value['noidung']?>
        	</div>
        	<?php if($value['traloi']!=''){ ?>
        	<ul>
        		<li>
        			<h4>Trả lời</h4>
        			<div class="hd_traloi"><?=$value['traloi']?></div>
        		</li>
        	</ul>
        	<?php }?>
        </li>

        <?php
        		}
        		echo '</ul>';
        	}
        ?>
        </div>     
       <div class="clr"></div>                                   
		<div class="phantrang" ><?=$paging['paging']?></div>
 <div class="row">
             
           <div style="margin-top:10px;" class="tablelienhe col-md-12 col-sm-12 col-xs-12" >    
                <form method="post" name="frm" action="" class="form-horizontal" enctype="multipart/form-data">
                  <div class="form-group form-group-sm">
                    <label class="col-sm-2 control-label" for="ten"><?=_hovaten?><span>*</span></label>
                    <div class="col-sm-10">
                      <input class="form-control input" name="ten" type="text" id="ten" placeholder="<?=_hovaten?>">
                    </div>
                  </div>

                  <div class="form-group form-group-sm">
                    <label class="col-sm-2 control-label" for="tieude1"><?=_chude?><span>*</span></label>
                    <div class="col-sm-10">
                      <input class="form-control input" name="tieude1" type="text" id="tieude1" placeholder="<?=_chude?>">
                    </div>
                  </div>

                  
                    <label class="col-sm-2 control-label" for="noidung"><?=_noidung?><span>*</span></label>
                    <div class="padd0 col-sm-10">
                      <textarea name="noidung" id="noidung" class="form-control" rows="6" placeholder="<?=_noidung?>"></textarea>
                    </div>
                 


                <div class="clr" style="height:10px; text-align:center"> </div> 
               
                <div style="text-align:left">
                <button type="button" class="button btn-primary" onclick="js_submit();" ><?=_gui?></button>
                <button  type="button" class="button btn-primary" onclick="document.frm.reset();"><?=_nhaplai?></button>                                     
                </div>    
                </form>
                 <div class="clr"></div> 
            </div>
</div> 
</div> 
</div>
</div>

