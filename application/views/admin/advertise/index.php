<script type="text/javascript">
	$(function() {
		$('#flexme').flexigrid({height: 'auto'});
	});
	
	// Action delete record
	function do_del(id) {
		
			var ok = confirm('Bạn có chắc muốn xóa bản tin này hay không?');
			var url = $('#action_del_' + id).attr('href');
			if(ok) {
				window.location.href = url;
			}
		//});
	};
	
	// Function change group
	function doi_nhom(id) {
		var _group_id = $('#change_group_' + id).val();
		var _user_id = $('#user_id_' + id).val();
		var url = index_url + 'admin/user/change_group';
		//alert(_user_id);
		
		if(_group_id !='') {
			$.ajax({
				type: "POST",
				dataType: "json",
				url: url,
				data: "group_id=" + _group_id + "&user_id=" + _user_id,
				success: function(data) {
					if(data == 'ok') {
						alert('Cập nhật nhóm thành công');
						location.reload(true);
					} else {
						alert('Không thể cập nhật nhóm');
					}
				}
			}); 
		} 
	}
	
	// Function search
	function do_search() {
		var _status = $('#status').val();
		var _group = $('#group').val();
		var url = index_url + 'admin/user/index/';
		if(_status !='' && _group !='') {
			url = url + '?trangthai=' + _status + '&group=' + _group;
		} else if(_status =='' && _group !='') {
			url = url + '?group=' + _group;
		} else if(_status !='' && _group =='') {
			url = url + '?trangthai=' + _status;
		}
		
		window.location.href = url;
		
	}
	
</script>
<script type="text/javascript">
     $(document).ready(function() {
	 	$('a.divbox').divbox({caption:false});
		$('a.lightbox').divbox({caption:false});
	 });
</script>
<div id="container">
	<div class="render_path">
    	<img src="<?=$this->index_url;?>layout/admin/images/home.png" align="absmiddle" /> &nbsp;
		<?php if($render_path) : ?>
			<?php foreach($render_path as $key => $url) : ?>
            <a href="<?=$url;?>"><?=$key;?></a> &raquo;
            <?php endforeach;?>
        <?php endif; ?>
    </div>
  <form action="<? //=$action;?>" method="post" id="frm">
    <div class="heading_top">
 
        <div class="info_title">
        	<img src="<?=$this->index_url;?>layout/admin/images/info-16.png" align="absmiddle" /> &nbsp;
        	<?php echo $heading_title;?>    
        </div>
        <div class="div_action">
        	<a href="#" title="Xóa nhiều bản tin" onclick="$('#frm').submit(); return false;"> <img src="<?=$this->index_url;?>layout/admin/images/disabled.png" width="12" height="12" border="0" align="absmiddle" />&nbsp;Delete</a> | 
            
            <a href="#" title="Nhấn để tạo mới" onclick="window.location.href='<?=$url_create;?>'; return false;"> <img src="<?=$this->index_url;?>layout/admin/images/add_16x16.png" width="12" height="12" border="0" align="absmiddle" />&nbsp;Create new</a>        
        </div>
       
    </div> <!--End heading_top-->
   
    
    
    <div id="content">
       
        <table width="100%" border="0" cellpadding="0" cellspacing="0" id="flexme">
      		<thead>
            	<tr>
                <th width="220"><b>Hình ảnh</b></th>
                <th width="100"><b>Vị trí</b></th>
                <th width="80"><b>Trang hiển thị</b></th>
                <th width="100"><b>Ngày bắt đầu</b></th>
                <th width="80"><b>Ngày kết thúc</b></th>
                <th width="80"><b>Trạng thái</b></th>
                <th width="80"><b>Chức năng</b></th>
            </tr>
           </thead>
            <tbody>
            <?php if(!empty($advertises)) : ?>
            <?php foreach($advertises->result() as $adv) : ?>
                <tr>
                    <td>
						<?php if($adv->file_type =='.gif' || $adv->file_type =='.jpg' || $adv->file_type =='.png') { ?> 
                    	<a href="<?=base_url();?><?=$adv->image_url;?>" title="Xem hình" class="divbox"><?=$adv->image_url;?></a>
                        
                        <?php } ?>
                        
                        <?php if($adv->file_type =='.swf') { ?> 
                    	<a href="<?=base_url();?><?=$adv->image_url;?>" title="Xem hình" class="lightbox"><?=$adv->image_url;?></a>
                        <?php } ?>
                        
                    </td>
                    <td>
						<?php if($adv->position ==1) echo "Top left";?>
                        <?php if($adv->position ==2) echo "Top right";?>
                        <?php if($adv->position ==3) echo "Center top";?>
                        <?php if($adv->position ==4) echo "Center";?>
                        <?php if($adv->position ==5) echo "Left";?>
                        <?php if($adv->position ==6) echo "Right";?>

                    </td>
                    <td>
						<?php if($adv->page_view == 0)  {
							echo "Trang chủ";
						} else {
							echo $this->cat->get_name($adv->page_view);
						} ?>
                    </td>
                    <td><?=$adv->date_begin;?></td>
                    <td><?=$adv->date_end;?></td>
                    <td><?=$adv->active;?></td>
                    
                    <td>
                    	<a href="<?=$this->index_url.'admin/advertise/delete/'.$adv->id;?>" title="Xóa bản tin này" id="action_del_<?=$adv->id;?>" onclick="do_del(<?=$adv->id;?>); return false;"><img src="<?=$this->index_url;?>layout/admin/images/disabled.png" width="16" height="16" border="0" align="absmiddle" /> &nbsp;</a>
                        <a href="<?=$this->index_url.'admin/advertise/add_adver/'.$adv->id;?>" title="Sửa bản tin này"><img src="<?=$this->index_url;?>layout/admin/images/edit16.png" border="0" align="absmiddle" /></a>  &nbsp;
                                            
                    </td>
                    
              </tr>
             <?php endforeach;?>
             <?php endif ?>
          </tbody>
        </table>
      
 	</div>
    </form>
    <?php if($page) : ?>
    <div class="pagination"><?php echo $page;?></div>
    <?php endif;?>
</div>
