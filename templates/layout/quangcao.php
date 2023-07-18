<?php
	$d->reset();
	$sql_qctrai="select * from #_quangcao where com='quangcao' and hienthi=1 and vitri=1 limit 0,1 ";
	$d->query($sql_qctrai);
	$result_qctrai=$d->fetch_array();
	
	$d->reset();
    $sql_qctrai="select * from #_quangcao where com='quangcao' and hienthi=1 and vitri=2 limit 0,1 ";
    $d->query($sql_qctrai);
    $result_qcphai=$d->fetch_array();
	
	
?>
    <div id="adv-right" class="adv">
    
        
         <a href="<?=$result_qcphai['mota']?>" target="_blank"><img src="<?=_upload_hinhanh_l.$result_qcphai['photo']?>" width="175" /></a><br/>
	
    </div>
    
    <div id="adv-left" class="adv">
    
    	<a href="<?=$result_qctrai['mota']?>" target="_blank"><img src="<?=_upload_hinhanh_l.$result_qctrai['photo']?>" width="175" /></a><br/>
   
    </div>
   

