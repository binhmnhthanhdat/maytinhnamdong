<script type="text/javascript">
	
	$(document).ready(function() {
		$('#ql_bv tr').hover(function() {
			$(this).css({'background-color':'#f2f2f2'});
		}, function() {
			$(this).css({'background-color':'#ffffff'});
		});
	});
	
	function up_pro(id) {
		if(id) {
			var status = true;
			$.ajax({
				type: "POST",
				dataType: "json",
				data: "pid=" + id,
				url: index_url + 'product/up',
				success: function(data) {
					if(data.status) {
						alert(data.message);
					} else {
						alert(data.message);
					}
				}
			});
			
		}
	}
</script>
<div class="breadcrumb" style="width:920px; padding:5px 0px 5px 30px;">
    <?php foreach($breabcrumb as $key => $val) : ?>
    <a href="<?=$val;?>"><?=$key;?></a> &raquo;
    <?php endforeach;?>
</div><!--End Breadcrumb-->
<div class="box_login">
	<div class="box_cat_manager">
    	<h1>Bài viết</h1>
        <ul>
        	<li><a href="<?=site_url('dang-tin');?>">Đăng tin</a></li>
            <li><a href="<?=site_url('member/product_manager');?>">Quản lý bài viết</a></li>
        </ul>
        <h1>Tài khoản</h1>
        <ul>
        	<li><a href="<?=site_url('member/profile');?>">Đổi thông tin</a></li>
            <li><a href="<?=site_url('member/change_pass');?>">Đổi mật khẩu</a></li>
        </ul>
        <h1>Tin nhắn</h1>
        <ul>
        	<li><a href="#">Viết tin nhắn</a></li>
            <li><a href="<?=site_url('member/view_message');?>">Xem tin nhắn</a></li>
        </ul>
    </div>
    <div class="box_content_manager">
    	<h1>Quản lý bài viết</h1>
        <ul style="margin:10px; list-style:none; color:#ff0000;">
        	<li> - Bạn cần xóa hoặc ẩn những bài viết đã giao dịch, hoặc những sản phẩm đã hết hàng để tránh nhầm lẫn</li>
            <li> - Hãy sử dụng chức năng <b>Up sản phẩm</b> để bài viết luôn nằm trên trang chủ</li>
        </ul>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" id="ql_bv">
          <thead>
            <th width="4%" align="center">ID</th>
            <th width="23%" align="left">Tiêu đề tin</th>
            <th width="14%" align="center">Tình trạng</th>
            <th width="19%" align="center">Tạo ngày</th>
            <th width="13%" align="center">Up sản phẩm</th>
            <th width="9%" align="center">Lượt xem</th>
            <th width="18%">Action</th>
          <tbody>
          <?php if($products) { ?>
          <?php foreach($products as $pro) : ?>
          <tr>
            <td align="center"><?=$pro->id;?></td>
            <td><?=$pro->title;?></td>
            <td align="center"><?php if($pro->active ==1) echo 'Đã duyệt'; else echo 'Đang chờ duyệt';?></td>
            <td><?=$pro->create_date;?></td>
            <td align="center"><a href="#" onclick="up_pro(<?=$pro->id;?>); return false;" title="Up sản phẩm này lên"><img src="<?=base_url();?>layout/images/up.png" width="16" height="16" border="0" align="absmiddle" /> &nbsp;</a></td>
            <td align="center"><?=$pro->num_view;?></td>
            <td align="center">
            	<a href="<?=$this->index;?>member/del_product/<?=$pro->id;?>" title="Xóa bản tin này"><img src="<?=base_url();?>layout/admin/images/disabled.png" width="16" height="16" border="0" align="absmiddle" /> &nbsp;</a>
                        <a href="<?=$this->index;?>member/edit_product/<?=$pro->id;?>" title="Sửa bản tin này"><img src="<?=base_url();?>layout/admin/images/edit16.png" border="0" align="absmiddle" /></a>            </td>
          </tr>
          <?php endforeach;?>
          <?php } else { ?>
          <tr>
          	<td colspan="6" align="center">Chưa có bài viết nào</td>
          </tr>
          <?php } ?>
          </tbody>
        </table>
		<?php if($page) : ?>		
        <div class="pagination">
         <?php echo $page; ?>
        </div>
        <?php endif;?>
    </div>
</div>
