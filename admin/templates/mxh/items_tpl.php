<h3><a href="index.php?com=mxh&act=add">Thêm mới liên kết</a></h3>

<style type="text/css">
.blue_table a {
    text-decoration: none;
}
</style>

<table class="blue_table">
    <tr>
        <th style="width:6%;">Stt</th>
        <th style="width:20%;">Tên</th>
        <th style="width:20%;">Link</th>
        <th style="width:20%;">Hình ảnh</th>
        <!-- <th style="width:5%;">Hiển thị footer</th>  -->
        <th style="width:6%;">Hiển thị</th>

        <th style="width:6%;">Sửa</th>
        <th style="width:6%;">Xóa</th>
    </tr>
    <?php for($i=0, $count=count($items); $i<$count; $i++){?>
    <tr>
        <td style="width:6%;"><?=$items[$i]['stt']?></td>
        <td style="width:20%;"><a href="index.php?com=mxh&act=edit&id=<?=$items[$i]['id']?>"><?=$items[$i]['ten']?></a>
        </td>
        <td style="width:20%;"><a href="index.php?com=mxh&act=edit&id=<?=$items[$i]['id']?>">
                <?=$items[$i]['url']?>
            </a>
        </td>
        <td style="width:20%;">
            <img src="<?=_upload_hinhanh.$items[$i]['image']?>" width="50" height="50" />
        </td>
        <!-- <td align="center" style="width:5%;">
         <?php 
		if(@$items[$i]['noibat']>0)
		{
		?>
        
        <a href="index.php?com=mxh&act=man&noibat=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/yes-km.gif" border="0" /></a>
		<? 
		}
		else
		{
		?>
         <a href="index.php?com=mxh&act=man&noibat=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/no-km.gif"  border="0"/></a>
         <?php
		 }?>      
         </td> -->
        <td style="width:6%;">
            <?php if(@$items[$i]['hienthi']==1)
		{
		?>
            <a href="index.php?com=mxh&act=man&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_1.png"
                    border="0" /></a>
            <? 
		}
		else
		{
		?>
            <a href="index.php?com=mxh&act=man&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_0.png"
                    border="0" /></a>
            <?php
		 }?>
        </td>
        <td style="width:6%;"><a href="index.php?com=mxh&act=edit&id=<?=$items[$i]['id']?>"><img
                    src="media/images/edit.png" /></a></td>
        <td style="width:6%;"><a href="index.php?com=mxh&act=delete&id=<?=$items[$i]['id']?>"
                onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" /></a></td>
    </tr>
    <?php	}?>
</table>
<div class="paging"><?=$paging['paging']?></div>