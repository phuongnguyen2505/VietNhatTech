<h3><a href="index.php?com=yahoo&act=add">Thêm thành viên mới</a></h3>

<table class="blue_table">
    <tr>
        <th style="width:5%;">STT</th>

        <th style="width:25%;">Tên </th>
        <th style="width:25%;">Yahoo</th>
        <th style="width:25%;">Skype</th>
        <!-- <th style="width:15%;">Điện thoại</th>     -->
        <th style="width:5%;">Hiển thị</th>
        <th style="width:5%;">Sửa</th>
        <th style="width:5%;">Xóa</th>
    </tr>
    <?php for($i=0, $count=count($items); $i<$count; $i++){?>
    <tr>
        <td style="width:5%;"><?php echo $items[$i]['stt']?></td>

        <td style="width:25%;"><?php echo $items[$i]['ten_vi']?></td>
        <td style="width:25%;"><?php echo $items[$i]['yahoo']?></td>
        <td style="width:25%;"><?php echo $items[$i]['skype']?></td>
        <!-- <td style="width:15%;"><?php echo $items[$i]['dienthoai']?></td> -->
        <td style="width:5%;"><?php
        if(@$items[$i]['hienthi']) {
            ?>
            <img src="media/images/active_1.png" />
            <?php 
        }
        else
        {
            ?>
            <img src="media/images/active_0.png" />
            <?php
        }?>
        </td>
        <td style="width:5%;"><a href="index.php?com=yahoo&act=edit&id=<?php echo $items[$i]['id']?>"><img
                    src="media/images/edit.png" border="0" /></a></td>
        <td style="width:5%;"><a href="index.php?com=yahoo&act=delete&id=<?php echo $items[$i]['id']?>"
                onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png"
                    border="0" /></a></td>
    </tr>
    <?php	}?>
</table>
<div class="paging"><?php echo isset($paging['paging']) ? $paging['paging'] : '' ?></div>
