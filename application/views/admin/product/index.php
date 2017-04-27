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
            	<form id="form_list" method="post" action="<?=$this->index_url;?>admin/product">
                <input type="hidden" id="act" name="act" value="act_del" />
                	<table width="100%" class="list">
       	  <thead>
                        	<tr>
                           	  <td width="40" style="text-align:center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" /></td>
                                <td width="69" class="left"><a href="#">Hình ảnh</a></td>
                              <td width="419" class="left"><a href="#">Tên sản phẩm</a></td>
                              <td width="218" class="left"><a href="#">Thuộc danh mục</a></td>
                                <td width="124" class="left"><a href="#">Trạng thái</a></td>
                                <td width="205" class="right">Action</td>
            </tr>
                        </thead>
                        <tbody>
                        	<tr class="filter">
                            	<td></td>
                                <td></td>
                                <td><input type="text" id="name_pro" name="name_pro" /></td>
                                <td>
                                	<select id="cat_pro" name="cat_pro">
                                    	<option value=""></option>
                                        <?php if(!empty($cat)) : ?>
												<?php foreach($cat as $c) : ?>
                                                    <option value="<?=$c->catid;?>" <?php if(@$_cat == $c->catid) echo "selected";?>><?=$c->cat_name;?></option>
                                                <?php endforeach;?>
                                            <?php endif;?>
                                    </select>
                                </td>
                                <td>
                                	<select id="status_pro" name="status_pro">
                                    	<option value="" selected></option>
                                        <option value="1" <?php if($_status == 1) { echo "selected"; } ?>>Enbale</option>
                                        }
                                        }
                                        <option value="0" <?php if($_status == 0) { echo "selected"; };?>>Disable</option>
                                        }
                                    </select>
                                </td>
                                <td class="right"><a class="button" onclick="do_search();">Lọc sản phẩm</a></td>
                            </tr>
                        	<?php if(!empty($products)) : ?>
							<?php foreach($products->result() as $product) : ?>
                            <tr>
                                <td style="text-align:center"><input type="checkbox" name="selected[]" value="<?=$product->id;?>" /></td>
                                <td class="left"><img src="<?=base_url();?><?=$product->p_image_thumb;?>" width="50" height="50" style="padding:2px; border:1px solid #cccccc;"/></td>
                                <td class="left"><?=$product->p_name;?></td>
                                <td class="left"><?=$this->cat->get_name($product->catid);?></td>
                                <td class="left"><?=($product->status == 1) ?  "Enable" : "Disable";?></td>
                                <td class="right">
                                    <a href="<?=$url_edit;?>/<?=$product->id;?>">Edit</a> :: <a href="<?=$url_del;?>/<?=$product->id;?>" title="Xóa User này" id="action_del_<?=$product->id;?>" onclick="do_del(<?=$product->id;?>); return false;">Delete</a>
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
