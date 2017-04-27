<script type="text/javascript">
	$(function() {
	$('#flexme').flexigrid({height: 'auto'});
	});
	
	// Action delete record
	function do_del(id) {
		
			var ok = confirm('Bạn có chắc muốn xóa Nickname này hay không?');
			var url = $('#url_del_' + id).val();
			if(ok) {
				window.location.href= url;
			}
		return false;
	};
	
</script>
<div id="container">
	<div class="render_path">
    	<img src="<?=base_url();?>layout/admin/images/home.png" align="absmiddle" /> &nbsp;
		<?php if($render_path) : ?>
			<?php foreach($render_path as $key => $url) : ?>
            <a href="<?=$url;?>"><?=$key;?></a> &raquo;
            <?php endforeach;?>
        <?php endif; ?>
    </div>
  <form action="<?=$action;?>" method="post" id="frm">
  	
    <input type="hidden" id="act_del" name="act_del" value="act_del">
    
    <div class="heading_top">
 
        <div class="info_title">
        	<img src="<?=base_url();?>layout/admin/images/info-16.png" align="absmiddle" /> &nbsp;
        	<?php echo $heading_title;?>    
        </div>
        <div class="div_action">
        	<a href="#" title="Xóa nhiều bản tin" onclick="$('#frm').submit(); return false;"> <img src="<?=base_url();?>layout/admin/images/disabled.png" width="12" height="12" border="0" align="absmiddle" />&nbsp;Delete</a> | 
            
            <a href="#" title="Nhấn để tạo mới" onclick="window.location.href='<?=$url_create;?>'; return false;"> <img src="<?=base_url();?>layout/admin/images/add_16x16.png" width="12" height="12" border="0" align="absmiddle" />&nbsp;Create new</a>        
        </div>
       
    </div>
    
    <div id="content">
       
        <table width="100%" border="0" cellpadding="0" cellspacing="0" id="flexme">
      		<thead>
            	<tr>
                <th width="25"><b>Chọn</b></th>
                <th width="120"><b>Nick name</b></th>
                <th width="100"><b>Mô tả</b></th>
                <th width="70"><b>Chức năng</b></th>
            </tr>
           </thead>
            <tbody>
            <?php if(!empty($lists)) : ?>
            <?php foreach($lists as $list) : ?>
                <tr>
                    <td><input type="checkbox" id="delete[]" name="delete[]" value="<?=$list['id'];?>"></td>
                    <td><?=$list['name'];?></td>
                    <td><?=$list['desc'];?></td>
                    <td>
                    	<a href="#" title="Xóa bản tin này" id="action_del_<?=$list['id'];?>" onclick="return do_del(<?=$list['id'];?>);"><img src="<?=base_url();?>layout/admin/images/disabled.png" width="16" height="16" border="0" align="absmiddle" /> &nbsp;</a>
                        <input type="hidden" id="url_del_<?=$list['id'];?>" value="<?=$list['url_del'];?>" />
                        <a href="<?=$list['url_edit'];?>" title="Sửa bản tin này"><img src="<?=base_url();?>layout/admin/images/edit16.png" border="0" align="absmiddle" /></a>                    
                    </td>
                    
              </tr>
             <?php endforeach;?>
             <?php endif;?>
          </tbody>
        </table>
      
 	</div> <!--#end content-->
    </form>
    <div class="pagination">
    	<input type="checkbox" id="check_all" name="check_all" title="Nhấn để chọn tất cả">
        <?php //if($page) echo $page;?>
    </div>
</div>
