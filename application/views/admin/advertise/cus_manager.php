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
                <th width="220"><b>Tên khách hàng</b></th>
                <th width="180"><b>Địa chỉ</b></th>
                <th width="80"><b>Điện thoại</b></th>
                <th width="100"><b>Email</b></th>
                <th width="80"><b>Chức năng</b></th>
            </tr>
           </thead>
            <tbody>
            <?php if(!empty($customers)) : ?>
            <?php foreach($customers as $cus) : ?>
                <tr>
                    <td><?=$cus['name'];?></td>
                    <td><?=$cus['address'];?></td>
                    <td><?=$cus['phone'];?></td>
                    <td><?=$cus['email'];?></td>
                    
                    <td>
                    	<a href="<?=$cus['url_del'];?>" title="Xóa bản tin này" id="action_del_<?=$cus['id'];?>" onclick="do_del(<?=$cus['id'];?>); return false;"><img src="<?=$this->index_url;?>layout/admin/images/disabled.png" width="16" height="16" border="0" align="absmiddle" /> &nbsp;</a>
                        <a href="<?=$cus['url_edit'];?>" title="Sửa bản tin này"><img src="<?=$this->index_url;?>layout/admin/images/edit16.png" border="0" align="absmiddle" /></a>  &nbsp;
                        <a href="<?=$cus['url_manager_image'];?>" title="Quảng cáo của khách hàng này"><img src="<?=$this->index_url;?>layout/admin/images/package.png" border="0" align="absmiddle" /></a>                    
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
