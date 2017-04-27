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
	
	// Function search
	function do_search() {
		var _status = $('#status').val();
		
		var url = index_url + 'admin/member/';
		if(_status !='') {
			url = url + '?active=' + _status;
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
    <span>Tổng số thành viên: <b><?=$total_mem;?></b></span>
  <form action="<? //=$action;?>" method="post" id="frm">
    <div class="heading_top">
 
        <div class="info_title">
        	<img src="<?=$this->index_url;?>layout/admin/images/info-16.png" align="absmiddle" /> &nbsp;
        	<?php echo $heading_title;?>    
        </div>
        <div class="div_action">
        	<a href="#" title="Xóa nhiều bản tin" onclick="$('#frm').submit(); return false;"> <img src="<?=$this->index_url;?>layout/admin/images/disabled.png" width="12" height="12" border="0" align="absmiddle" />&nbsp;Delete</a> | 
            
            <a href="#" title="Nhấn để tạo mới" onclick="window.location.href='<? //=$url_create;?>'; return false;"> <img src="<?=$this->index_url;?>layout/admin/images/add_16x16.png" width="12" height="12" border="0" align="absmiddle" />&nbsp;Create new</a>        
        </div>
       
    </div> <!--End heading_top-->
    
    <div class="filter_data">
   	  <select id="status" name="status">
       	  <option value="" selected="selected">Tất cả</option>
          <option value="1" <?php if(1 == $active) echo "selected";?>>Active</option>
          <option value="0" <?php if(0 == $active) echo "selected";?>>No active</option>
      </select>
        
&nbsp;&nbsp;&nbsp;<a href="#" title="Click để tìm" style="font-weight:bold; font-family:Verdana;" onclick="do_search(); return false;">Tìm kiếm</a>
        </div>
    <!--End filer_data-->
    
    <div id="content">
       
        <table width="100%" border="0" cellpadding="0" cellspacing="0" id="flexme">
      		<thead>
            	<tr>
                <th width="120"><b>Tài khoản</b></th>
                <th width="140"><b>Địa chỉ email</b></th>
                <th width="80"><b>Trạng thái</b></th>
                <th width="100"><b>Tham gia ngày</b></th>
                <th width="60"><b>Chức năng</b></th>
            </tr>
           </thead>
            <tbody>
            <?php if(!empty($member)) : ?>
            <?php foreach($member->result() as $row) : ?>
                <tr>
                    <td><?=$row->mem_name;?></td>
                    <td><?=$row->mem_email;?></td>
                    <td>
                    	<?php if($row->mem_active == 1) { ?>
                        <img src="<?=$this->index_url;?>layout/admin/images/check.png" />
                        <?php } else { ?>
                        <img src="<?=$this->index_url;?>layout/admin/images/unchecked.png" />
                        <?php } ?>
                    </td>
                    <td><?=$row->create_date;?></td>
                    <td>
                    	<a href="<?=$this->index_url.'member/delete/'.$row->mem_id;?>" title="Xóa bản tin này" id="action_del_<?=$row->mem_id;?>" onclick="do_del(<?=$row->mem_id;?>); return false;"><img src="<?=$this->index_url;?>layout/admin/images/disabled.png" width="16" height="16" border="0" align="absmiddle" /> &nbsp;</a>                  
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
