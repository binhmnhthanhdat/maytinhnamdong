<div id="container">
	<div class="render_path">
    	<img src="<?=base_url();?>layout/admin/images/home.png" align="absmiddle" /> &nbsp;
		<?php if($render_path) : ?>
			<?php foreach($render_path as $key => $url) : ?>
            <a href="<?=$url;?>"><?=$key;?></a> &raquo;
            <?php endforeach;?>
        <?php endif;?>
    </div>
    <form action="<?=$action;?>" method="post" id="frm">
    <div class="heading_top">
 
        <div class="info_title">
        	<img src="<?=base_url();?>layout/admin/images/info-16.png" align="absmiddle" /> &nbsp;
        	<?php echo $heading_title;?>    
        </div>
        <div class="div_action">
        	<a href="#" title="Nhấn vào đây để cập nhật" onClick="$('#frm').submit(); return false;">
            	<img src="<?=base_url();?>layout/admin/images/update.png" width="12" height="12" border="0" align="absmiddle" />&nbsp;Cập nhật</a>
            </a>
        </div>
       
    </div>
    <div id="content">
        <table cellpadding="0" cellspacing="20" id="table_content" style="position:relative;">
			<tr>
           	  <td align="left"><label>Nick name:</label></td>
          		<td>
            	<?php if(@$article->s_nickname != NULL) { ?>
            	<input type="text" id="name" name="name" value="<?php echo @$article->s_nickname;?>" />
                <span class="hint">Nhập tên nick name.<span class="hint-pointer">&nbsp;</span></span>
				<?php } else { ?>
				<input type="text" id="name" name="name" value="<?php echo set_value('name');?>" />
                <span class="hint">Nhập tên nick name.<span class="hint-pointer">&nbsp;</span></span>
				<?php } ?>
                <?php echo form_error('name');?>
            </td>
            </tr>
            
            <tr>
           	  <td align="left"><label>Mô tả:</label></td>
          		<td>
            	<?php if(@$article->s_desc != NULL) { ?>
            	<input type="text" id="desc" name="desc" value="<?php echo @$article->s_desc;?>" />
                <span class="hint">Mô tả chức năng.<span class="hint-pointer">&nbsp;</span></span>
				<?php } else { ?>
				<input type="text" id="desc" name="desc" value="<?php echo set_value('desc');?>" />
                <span class="hint">Mô tả chức năng.<span class="hint-pointer">&nbsp;</span></span>
				<?php } ?>
               
            </td>
            </tr>
                 
        </table>
              
    </div>
    <input type="hidden" id="id" name="id" value="<?=@$article->s_id;?>">
    </form>
</div>
