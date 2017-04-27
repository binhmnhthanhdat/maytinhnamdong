<div id="container">
	<div class="render_path">
    	<img src="<?=$this->index_url;?>layout/admin/images/home.png" align="absmiddle" /> &nbsp;
		<?php if($render_path) : ?>
			<?php foreach($render_path as $key => $url) : ?>
            <a href="<?=$url;?>"><?=$key;?></a> &raquo;
            <?php endforeach;?>
        <?php endif;?>
    </div>
    <form action="<?=$action;?>" method="post" id="frm">
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
           	  <td align="left"><label>Tên khách hàng:</label></td>
          		<td>
            	<?php if(@$cus->cus_name !='') { ?>
            	<input type="text" id="username" name="username" size="70" value="<?=@$cus->cus_name;?>" />
                <?php } else { ?>
                <input type="text" id="username" name="username" value="<?=set_value('username');?>" />
                <?php } ?>
                <?=form_error('username');?>
            </td>
            </tr>
            <tr>
           	  <td align="left"><label>Địa chỉ:</label></td>
          		<td>
            	<?php if(@$cus->cus_address !='') { ?>
            	<input type="text" id="address" name="address" value="<?=@$cus->cus_address;?>" />
                <?php } else { ?>
                <input type="text" id="address" name="address" value="<?=set_value('address');?>" />
                <?php } ?>
                <?=form_error('address');?>
            </td>
            </tr>
            <tr>
           	  <td align="left"><label>Điện thoại:</label></td>
          		<td>
                <?php if(@$cus->cus_phone !='') { ?>
            	<input type="text" id="phone" name="phone" value="<?=@$cus->cus_phone;?>" />
                <?php } else { ?>
                <input type="text" id="phone" name="phone" value="<?=set_value('phone');?>" />
                <?php } ?>
                <?=form_error('phone');?>
            </td>
            </tr>
            <tr>
           	  <td align="left"><label>Địa chỉ Email:</label></td>
          		<td>
            	<?php if(@$cus->cus_email !='') { ?>
            	<input type="text" id="email" name="email" value="<?=@$cus->cus_email;?>" />
                <?php } else { ?>
                <input type="text" id="email" name="email" value="<?=set_value('email');?>" />
                <?php } ?>
                <?=form_error('email');?>
            </td>
            </tr>
           
        </table>
        <input type="hidden" id="id" name="id" value="<?=@$cus->cus_id;?>">      
    </div>
    </form>
</div>
