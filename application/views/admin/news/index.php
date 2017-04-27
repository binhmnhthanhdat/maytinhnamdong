<script type="text/javascript">
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
		var _status = $('#status_pro').val();
		var _cat = $('#cat_pro').val();
		var _name = $('#name_pro').val();
		var url = index_url + 'admin/product/';
		
		url = url + '?cat=' + _cat + '&name=' + _name + '&status=' + _status;
		
		window.location.href = url;
	}
	
</script>


<div id="content">
    	<div class="breadcrumb">
        	<?php if($render_path) : ?>
            <?php foreach($render_path as $key => $val) :?>
            <a href="<?=$val;?>"><?=$key;?></a> ::
            <?php endforeach;?>
            <?php endif;?>
        </div><!--End breadcrumb-->
        <div class="warning" style="display:none;"><?php if($this->session->flashdata('warning')) echo $this->session->flashdata('warning');?></div>
        <div class="box">
        	<div class="heading">
            	<h1><img src="<?=base_url();?>admin_template/image/category.png" /><?=@$heading_title;?></h1>
                <div class="buttons">
                	<a href="javascript:void(0);" onclick="location.href='<?=$url_edit;?>';" class="button">Insert</a>
                    <a href="javascript:void(0);" onclick="$('#form_list').submit();" class="button">Delete</a>
                </div>
            </div><!--End heading-->
            <div class="content">
            	<form id="form_list" method="post" action="<?=$action_del;?>">
                <input type="hidden" id="act" name="act" value="act_del" />
                	<table width="100%" class="list">
       	  <thead>
                        	<tr>
                           	  <td style="text-align:center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" /></td>
                              <td  class="left"><a href="#">Tiêu đề tin</a></td>
                              <td  class="left"><a href="#">Danh mục tin</a></td>
                              <td  class="left"><a href="#">Hình ảnh</a></td>
                              <td class="left"><a href="#">Ngày tạo</a></td>
                              <td  class="left"><a href="#">Ngày sữa</a></td>
                              <td  class="right">Action</td>
            </tr>
                        </thead>
                        <tbody>
                        	
                        	<?php if(!empty($news)) : ?>
							<?php foreach($news->result() as $new) : ?>
                            <tr>
                                <td style="text-align:center"><input type="checkbox" name="selected[]" value="<?=$new->id;?>" /></td>
                                <td class="left"><?=$new->title;?></td>
                                <td class="left"><? 
                                $cat_id=$new->cat_id;
                                 $sql="select name,type from cat_news where id=\"".$cat_id."\"";	
                                 $name= $this->db->query($sql);
                                 if($name->num_rows()>0)
                                 {
                                     $kqname=$name->row();
                                    echo $kqname->name ;
                                    $type=$kqname->type;
                                 }
                               ?></td>
                                <td class="left"><img src="<? echo base_url().$new->image; ?>" alt="tin tuc"  width="100" height="100" /></td>
                                <td class="left"><?php echo mdate('%d/%m/%Y', $new->create_date);?></td>
                                <td class="left"><?php echo mdate('%d/%m/%Y', $new->modify_date);?></td>
                                <td class="right">
                                    <a href="<?=$url_edit;?>/<?=$new->id;?>">Edit</a> :: <a href="<?=$url_del;?>/<?=$new->id;?>" title="Xóa User này" id="action_del_<?=$new->id;?>" onclick="do_del(<?=$new->id;?>); return false;">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                            <?php endif;?>
                        </tbody>
                    </table>
                </form><!--End form-->
                
                <div class="pagination">
                	<div class="link">
                    	 <?php if(!empty($page)) :?>
                        <?php echo $page;?>
                        <?php endif;?>
                    </div>
                    <div class="result">Có <b><?=@$total_record;?></b> bản tin được tìm thấy</div>
                </div><!--End pagination-->
                
            </div><!--End content-->
        </div><!--End box-->
        
    </div><!--End content-->
