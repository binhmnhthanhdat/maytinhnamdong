<link rel="stylesheet" type="text/css" href="<?=base_url();?>layout/themes/base/jquery.ui.all.css" />
<script type="text/javascript" src="<?=base_url();?>layout/js/jquery.ui.core.js"></script>
<script type="text/javascript" src="<?=base_url();?>layout/js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?=base_url();?>layout/js/jquery.ui.datepicker.js"></script>

<script type="text/javascript"> 
	$(function() {
		$("#date_begin").datepicker();
	});
	
	$(function() {
		$("#date_end").datepicker();
	});
	
</script> 

<div id="container">
	<div class="render_path">
    	<img src="<?=$this->index_url;?>layout/admin/images/home.png" align="absmiddle" /> &nbsp;
		<?php if($render_path) : ?>
			<?php foreach($render_path as $key => $url) : ?>
            <a href="<?=$url;?>"><?=$key;?></a> &raquo;
            <?php endforeach;?>
        <?php endif;?>
    </div>
    <form action="<?=$action;?>/<?=@$adv->id;?>" method="post" id="frm" enctype="multipart/form-data">
    <div class="heading_top">
 
        <div class="info_title">
        	<img src="<?=$this->index_url;?>layout/admin/images/info-16.png" align="absmiddle" /> &nbsp;
        	<?php echo $heading_title;?>    
        </div>
        <div class="div_action">
        	<a href="#" title="Nhấn vào đây để cập nhật" onClick="$('#frm').submit(); return false;">
            	<img src="<?=$this->index_url;?>layout/admin/images/update.png" width="12" height="12" border="0" align="absmiddle" />&nbsp;Cập nhật</a>
            </a>
        </div>
       
    </div>
    <div id="content">
        <table cellpadding="0" cellspacing="20" id="table_content">
    <tr>
           	  <td align="left"><label>Khách hàng:</label></td>
          		<td>
            	<select id="customer" name="customer">
                	<option value="">--Chọn khách hàng--</option>
                    <?php if(!empty($customers)) : ?>
                    <?php foreach($customers->result() as $row) : ?>
                    <?php if(@$adv->cus_id !='') { ?>
                    <option value="<?=$row->cus_id;?>" selected="selected"><?=$row->cus_name;?></option>
                    <?php } else { ?>
                    <option value="<?=$row->cus_id;?>" <?=set_select('customer', $row->cus_id);?>><?=$row->cus_name;?></option>
                    <?php } ?>
                    <?php endforeach;?>
                    <?php endif;?>
                </select>
                <?=form_error('customer');?>
            </td>
            </tr>
            <tr>
           	  <td align="left"><label>Trang hiển thị:</label></td>
          		<td>
            	<select id="page_view" name="page_view">
                	<option value="">--Chọn trang hiển thị--</option>
                    <option value="0" <?php if(@$adv->page_view == 0) echo "selected";?>>Trang chủ</option>
                    <?php if(!empty($categorys)) : ?>
                    <?php foreach($categorys->result() as $row) : ?>
                    <?php if(@$adv->page_view !='') { ?>
                    <option value="<?=$row->id;?>" <?php if($row->id == @$adv->page_view) echo "selected";?>><?=$row->category_name;?></option>
                    <?php } else { ?>
                    <option value="<?=$row->id;?>" <?=set_select('page_view', $row->id);?>><?=$row->category_name;?></option>
                    <?php } ?>
                    <?php endforeach;?>
                    <?php endif;?>
                </select>
                <?=form_error('page_view');?>
            </td>
            </tr>
            <tr>
           	  <td align="left"><label>Vị trí:</label></td>
          		<td>
                <select id="position" name="position">
                	<option value="">--Chọn vị trí--</option>
                    <?php foreach($position as $key => $val) : ?>
                    <?php if($adv->position !='') { ?>
                    <option value="<?=$val;?>" <?php if($val == @$adv->position) echo "selected";?>><?=$key;?></option>
                    <?php } else { ?>
                    <option value="<?=$val;?>" <?=set_select('position', $val);?>><?=$key;?></option>
                    <?php } ?>
                    <?php endforeach;?>
                </select>
                <?=form_error('position');?>
            </td>
            </tr>
            <tr>
           	  <td align="left"><label>Ngày bắt đầu:</label></td>
          		<td>
                <?php if(@$adv->date_begin !='') { ?>
            	<input type="text" id="date_begin" name="date_begin" value="<?=@$adv->date_begin;?>" />
                <?php } else { ?>
                <input type="text" id="date_begin" name="date_begin" value="<?=set_value('date_begin');?>" />
                <?php } ?>
                <?=form_error('date_begin');?>
            </td>
            </tr>
            <tr>
           	  <td align="left"><label>Ngày kết thúc:</label></td>
          		<td>
            	<?php if(@$adv->date_end !='') { ?>
                <input type="text" id="date_end" name="date_end" value="<?=@$adv->date_end;?>" />
                <?php } else { ?>
                <input type="text" id="date_end" name="date_end" value="<?=set_value('date_end');?>" />
                <?php } ?>
                <?=form_error('date_end');?>
            </td>
            </tr>
            
            <tr>
           	  <td align="left"><label>Link quảng cáo:</label></td>
          		<td>
            	<input type="file" id="file_adv" name="file_adv" />
                <?=form_error('file_adv');?> <br />
                <?php if(@$adv->image_url !='') { ?>
                <a href="<?=base_url();?><?=@$adv->image_url;?>" title="Xem hình" class="lightbox"><?=@$adv->image_url;?></a>
                <?php } ?>
            </td>
            </tr>
            <tr>
           	  <td align="left"><label>Trang đích:</label></td>
          		<td>
                <?php if(@$adv->link_to !='') { ?>
            	<input type="text" id="link_to" name="link_to" value="<?=@$adv->link_to;?>" />
                <?php } else { ?>
                <input type="text" id="link_to" name="link_to" value="<?=set_value('link_to');?>" />
                <?php } ?>
                <?=form_error('link_to');?>
            </td>
            </tr>
            <tr>
           	  <td align="left"><label>Mô tả thêm:</label></td>
          		<td>
                <?php if(@$adv->desc !='') { ?>
                <input type="text" id="desc" name="desc" value="<?=@$adv->desc;?>" />
                <?php } else { ?>
            	<input type="text" id="desc" name="desc" />
                <?php } ?>
            </td>
            </tr>
           
        </table>
        <input type="hidden" id="id" name="id" value="<?=@$adv->id;?>">
        <input type="hidden" id="oldFile" name="oldFile" value="<?=@$adv->image_url;?>">
        <input type="hidden" id="oldFileType" name="oldFileType" value="<?=@$adv->file_type;?>">      
    </div>
    </form>
</div>
<script type="text/javascript">
     $(document).ready(function() {
	 	$('a.divbox').divbox({caption:false});
		$('a.lightbox').divbox({caption:false});
	 });
</script>