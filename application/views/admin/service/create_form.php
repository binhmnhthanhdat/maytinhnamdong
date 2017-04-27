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
            	<h1><img src="<?=base_url();?>admin_template/image/category.png" /><?=$heading_title;?></h1>
                <div class="buttons">
                	<a href="javascript:void(0);" onclick="$('#frm_add').submit();" class="button">Save</a>
                    <a href="javascript:void(0);" onclick="location.href='<?=$this->index_url;?>admin/service';" class="button">Cancel</a>
                </div>
            </div><!--End heading-->
            <div class="content">
            	<div id="tabs" class="htabs">
                	<a href="#tab_1" class="selected">Thông tin dịch vụ</a>
                    <!--<a href="#tab_2">Tab 2</a>
                    <a href="#tab_3">Tab 3</a>-->
                </div><!--End tabs-->
                
                <form action="<?=$action;?>" method="post" enctype="multipart/form-data" id="frm_add">
               	  <div id="tab_1" style="display:block;">
                   	  <table width="100%" class="form">
						<tbody>
                           	  <tr>
                                  <td width="169" align="left"><label>Tên dịch vụ:</label></td>
                                    <td width="922">
                                    	<?php if(@$q->p_name !='') :?>
                                        <input name="name" type="text" id="name" value="<?php echo @$q->p_name;?>" size="100" />
                                        <?php else : ?>
                                        <input name="name" type="text" id="name" value="<?php echo set_value('name');?>" size="100" />
                                        <?php endif;?>
                                    	<?=form_error('name');?>
                                	</td>
                                </tr>
                                
                                <tr>
                                  <td width="169" align="left"><label>Danh mục:</label></td>
                                    <td width="922">
                                    	<select name="cat">
                                        	<option value=""></option>
                                            <?php if(!empty($cat)) : ?>
												<?php foreach($cat as $c) : ?>
													<?php if(@$q->catid !='') : ?>
                                                    <option value="<?=$c->catid;?>" <?php if(@$q->catid == $c->catid) echo "selected";?>><?=$c->cat_name;?></option>
                                                    <?php else : ?>
                                                    <option value="<?=$c->catid;?>" <?php echo set_select('cat', $c->catid);?>><?=$c->cat_name;?></option>
                                                    <?php endif;?>
                                                <?php endforeach;?>
                                            <?php endif;?>
                                        </select>
                                    	<?=form_error('cat');?>
                                	</td>
                                </tr>
                                <tr>
                                  <td width="169" align="left"><label>Giới thiệu :</label><br><span class="help">Giới thiệu ngắn</span></td>
                                    <td width="922">
                                    	<?php if(@$q->p_description !='') :?>
                                        <textarea name="p_description" rows="10" cols="100"><?php echo @$q->p_description;?></textarea>
                                        <?php else : ?>
                                        <textarea name="p_description" rows="10" cols="100"><?=set_value('p_description');?></textarea>
                                        <?php endif;?>
                                    	<?=form_error('p_description');?>
                                	</td>
                                </tr>
                              	<tr>
                                  <td width="169" align="left"><label>Mô tả chi tiết:</label><br><span class="help">Mô tả thông tin chi tiết về sản phẩm cần bán: Thông số, chức năng,...</span></td>
                                    <td width="922">
                                    	<?php if(@$q->p_detail !='') :?>
                                        <textarea name="desc" rows="20"><?php echo @$q->p_detail;?></textarea>
                                        <?php else : ?>
                                        <textarea name="desc" rows="20"><?=set_value('desc');?></textarea>
                                        <?php endif;?>
                                    	<?=form_error('desc');?>
                                	</td>
                                </tr>
                                <tr>
                                  <td width="169" align="left"><label>Hình ảnh:</label></td>
                                    <td width="922">
										<input type="file" name="image_pro" /> <br>
                                        <?php if(@$q->p_image_thumb !='') : ?>
                                        <img src="<?=base_url();?><?=@$q->p_image_thumb;?>">
                                        <?php endif;?>                                   	
                                	</td>
                                </tr>
                                <tr>
                                  <td align="left"><label>Kích hoạt:</label><br /><span class="help">Trạng thái của sản phẩm hiển thị hoặc không</span></td>
                                    <td>
                                    <input type="checkbox" name="status" <?php if(@$q->status == 1) echo "checked=checked"; else "";?>/>
                                   
                                </td>
                                </tr>
            		     </tbody>
                        </table>
                  </div>
                    <!--<div id="tab_2" style="display:none;">Noi dung tabs 2</div>
                    <div id="tab_3" style="display:none;">Noi dung tabs 3</div>-->
                    <input type="hidden" id="id" name="id" value="<?=@$q->id;?>">
                    <input type="hidden" name="oldImage" value="<?=@$q->p_image;?>">
                    <input type="hidden" name="oldImageThumb" value="<?=@$q->p_image_thumb;?>">
                </form>
                
            </div><!--End content-->
        </div><!--End box-->
        
    </div><!--End content-->