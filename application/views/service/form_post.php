<div id="box_product_post">
		<h1>Đăng bài viết mới</h1>
        <div style="float:left; width:940px; background:#fff; padding:10px 5px;">
        <div class="note" style="margin-bottom:10px; float:left;">
        	<h4>Lưu ý:</h4>
            - Khi đăng tin, bạn chọn đúng <b>Chuyên mục</b>, <b>Tỉnh thành</b>, <b>Loại bài viết</b> thì bài viết của bạn sẽ dễ dàng tìm kiếm và lượt xem nhiều hơn. <br />
            - Bài viết nên có mô tả, giá bán, thông tin và hình ảnh đầy đủ sẽ thu hút được người xem. <br />
            - Để tiện cho việc đăng tin nhanh chóng và dễ dàng. Bạn có thể <a href="http://www.youtube.com/watch?v=895lbGuruV4" class="lightbox"><b>Xem video tại đây</b></a>.<br />
            - Hướng dẫn upload hình + chèn hình vào bài viết. <a href="http://www.youtube.com/watch?v=895lbGuruV4" class="lightbox"><b>Xem video tại đây</b></a>
            <script type="text/javascript">
            	$('.lightbox').divbox({caption:false});
            </script>
        </div>
        
        <?php if($this->session->flashdata('error_product')) { ?>
        	<div class="note" style=" float:left;color:#ff0000; text-align:center; font-size:17px; font-weight:bold;"> <?php echo $this->session->flashdata('error_product');?></div>
        <?php } ?>
        <div style="float:left;">
    	<form action="<?=site_url('dang-tin');?>" method="post" enctype="multipart/form-data" id="frm">
    	  <table width="100%" border="0" cellspacing="5" cellpadding="0" id="tbl_form_pro">
            <tr>
              <td width="61%" valign="top">
              	<textarea name="cai_gi" rows="30" id="cai_gi"><?=set_value('cai_gi');?></textarea>
                <?=form_error('cai_gi');?>              </td>
              <td width="39%" align="left" valign="top">
              <ul style="list-style:none;">
                  <li><label>Tiêu đề tin rao</label></li>
                  <li>
                  	<input type="text" id="title_pro" name="title_pro" class="input_class" value="<?=set_value('title_pro');?>"><br />
                    <i style="font-size:11px;">Tiêu đề phải là tiếng Việt có dấu và không quá 120 ký tự</i>
                   	<?=form_error('title_pro');?>
                   </li>
                          
                  <li><label>Mô tả ngăn</label></li>
                  <li>
                  <textarea name="intro" rows="5" id="intro" class="input_class"><?=set_value('intro');?></textarea>
                  <?=form_error('intro');?> 
                 </li>
                  <li><label>Giá bán</label></li>
                  <li>
                  <input name="price" type="text" size="15" value="<?=set_value('price');?>"> VNĐ
                  <?=form_error('price');?>
                  </li>
                  <li><label>Tỉnh thành</label></li>
                  <li>
                  <select name="province">
                    <option value="">---Tỉnh thành---</option>
                    <?php foreach($tinh as $row) : ?>
                    <option value="<?=$row->id;?>" <?=set_select('province',$row->id);?>><?=$row->province;?></option>
                    <?php endforeach;?>
                  </select>
                  <?=form_error('province');?> 
                  </li>
                  <li><label>Danh mục</label></li>
                  <li>
                  <select name="danh_muc">
                    <option value="">---Danh mục---</option>
                    <?php foreach($cat as $row) : ?>
                    <optgroup style="background:#00FF66;" label="<?=$row->category_name;?>"></optgroup>
                    <?php $sub_cat = $this->cat->get_root_category($row->id);?>
                    <?php foreach($sub_cat->result() as $sub) : ?>
                    <option value="<?=$sub->id;?>" <?=set_select('danh_muc', $sub->id);?>>|- <?=$sub->category_name;?></option>
                    <?php endforeach;?>
                    <?php endforeach;?>
                  </select>
                  <?=form_error('danh_muc');?> 
                  </li>
                  <li><label>Loại bài viết</label></li>
                  <li>
                  <select name="type">
                    <option value="">---Loại bài viết---</option>
                    <?php foreach($type as $row) : ?>
                    <option value="<?=$row->id;?>" <?=set_select('type',$row->id);?>><?=$row->name_type;?></option>
                    <?php endforeach;?>
                  </select>
                  <?=form_error('type');?> 
                 </li>
                  <li><label>Mã bảo vệ</label></li>
                  <li>
                  <input name="sercode" type="text" size="15"><?=form_error('sercode');?><br />
                 <?=$catpcha;?>
                  </li>
              </ul>              </td>
            </tr>
            <tr>
              <td valign="top"><label>Hình ảnh sản phẩm</label>
              	<a href="#" onclick="add_image(1); return false;" title="Thêm hình">&nbsp;<img src="<?=base_url();?>layout/images/add1-16.png" border="0" style=" cursor:pointer;" /></a>              </td>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="top" id="hihi">
              	<input name="image_pro" type="file" size="30">        				
                
              </td>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2" align="center" valign="top"><img src="<?=base_url();?>layout/images/btn_dangtin.png" style="cursor:pointer;"  onclick="$('#frm').submit();" title="Đăng tin"/></td>
            </tr>
          </table>
    	</form>
   </div>
   </div>
</div>
<script type="text/javascript">
	var j = 1;
	function add_image() {	
		html =  '<div id="list_image_' + j + '">';
		html += '<input name="image_pro_' + j + '" type="file" size="30"><a href="#" onclick="$(\'#list_image_' + j + '\').remove(); return false;" title="Bỏ hình này">&nbsp;<img src="<?=base_url();?>layout/images/cross.png" style=" cursor:pointer;" border="0" /></a>';		
		html += '</div>';
		$('#hihi').append(html);
		j++;	
	}
</script>
