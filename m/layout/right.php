<?php
	$d->reset();
	$sql_img = "select thumb,ten_$lang as ten,tenkhongdau,id,mota_$lang as mota from #_product where hienthi=1 and noibat>0 order by stt asc,id desc limit 0,2";
	$d->query($sql_img);
	$thongtindichvu = $d->result_array();

	$d->reset();
	$sql_img = "select photo,link,id from #_hinhanh where hienthi=1 order by stt asc,id desc";
	$d->query($sql_img);
	$quangcao = $d->result_array();

	$d->reset();
	$sql_img = "select ten_$lang as ten,url from #_lkweb where hienthi=1 order by id desc";
	$d->query($sql_img);
	$lienket = $d->result_array();
?>
<div class="right_box">
	<h2><?=_thongtindichvu?></h2>
	<ul >
	<?php
        
         
                    
                     if(!empty($thongtindichvu)){
                        for($i=0;$i<count($thongtindichvu);$i++ ){
                           
        ?>
        
            <li>
            	<div class="right_item">
            	<h3><a href="dich-vu/<?=$thongtindichvu[$i]['tenkhongdau']?>-<?=$thongtindichvu[$i]['id']?>.html"><?=$thongtindichvu[$i]['ten']?></a></h3>
            	<div class="dv_img">
            		<img src="<?=_upload_product_l.$thongtindichvu[$i]['thumb']?>" alt="<?=$thongtindichvu[$i]['ten']?>"/>
            	</div>	
            	<div class="dv_mota">
            	<?php
                    $str = $thongtindichvu[$i]['mota'];
                    $str = strip_tags($str);
                    $strCut = substr($str, 0, 500);
                    $str = substr($strCut, 0, strrpos($strCut, ' ')).'...';
                    echo $str;
                ?> 

            	</div>
            		<a class="dv_xemchitiet" href="dich-vu/<?=$thongtindichvu[$i]['tenkhongdau']?>-<?=$thongtindichvu[$i]['id']?>.html"><?=_chitiet?> >></a>
            	</div>
            	<!-- end right_item -->
            </li>
                      
                 
        <?php       
                    
                    }
                 }
                
        ?>
    </ul>
    <h2><?=_quangcao?></h2>
	<ul >
	<?php
        
         
                    
         if(!empty($quangcao)){
            for($i=0;$i<count($quangcao);$i++ ){
                           
        ?>
        
            <li>
            	
            	
            	<div class="qc_img">
            		<a href="<?=$quangcao[$i]['link']?>"><img src="<?=_upload_thuvienanh_l.$quangcao[$i]['photo']?>" alt="<?=$row_setting['ten_'.$lang]?>"/></a>
            	</div>	
            	
            </li>
                      
                 
        <?php       
                    
                    }
                 }
                
        ?>
    </ul>

    <h2><?=_lienketweb?></h2>
    <div class="lkweb">
	    <label><strong><?=_lienketweb?>:</strong></label>
	    <select id="lienket" onchange="DD_jumpMenu('parent',this,0)">
	    	<option>----<?=_lienketweb?>-----</option>
	    	<?php
	        
	         
	                    
	         if(!empty($lienket)){
	            for($i=0;$i<count($lienket);$i++ ){
	                           
	        ?>
	        
	        <option value="<?=$lienket[$i]['url']?>"><?=$lienket[$i]['ten']?></option>   
	                      
	                 
	        <?php       
	                    
	                    }
	                 }
	                
	        ?>
	    </select>
	    <script type="text/javascript">
						function DD_jumpMenu(targ,selObj,restore){ 
							var s = selObj.options[selObj.selectedIndex].value; 
							window.open(s); 
							if (!restore) selObj.selectedIndex=0; 
							} 
											
					</script>
		<ul  class="lienket">
		<?php
	        
	         
	                    
	         if(!empty($lienket)){
	            for($i=0;$i<count($lienket);$i++ ){
	                           
	        ?>
	        
	            <li>
	            		<a href="<?=$lienket[$i]['url']?>"><?=$lienket[$i]['ten']?></a>      	
	            </li>
	                      
	                 
	        <?php       
	                    
	                    }
	                 }
	                
	        ?>
	    </ul>
    </div>
</div>
<!-- end right_box -->

