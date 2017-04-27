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
                    <a href="javascript:void(0);" onclick="location.href='<?=$this->index_url;?>admin/news';" class="button">Cancel</a>
                </div>
            </div><!--End heading-->
            <div class="content">
            	<div id="tabs" class="htabs">
                	<a href="#tab_1" class="selected">Thông tin bản tin</a>
                    <!--<a href="#tab_2">Tab 2</a>
                    <a href="#tab_3">Tab 3</a>-->
                </div><!--End tabs-->
                
                <form action="<?=$action;?>" method="post" enctype="multipart/form-data" id="frm_add">
               	  <div id="tab_1" style="display:block;">
                   	  <table width="100%" class="form">
						<tbody>
                           	  <tr>
                                  <td width="169" align="left"><label>Tiêu đề bản tin:</label></td>
                                    <td width="922">
                                    	<?php if(@$q->title !='') :?>
                                        <input name="title" type="text" id="title" value="<?php echo @$q->title;?>" size="100" />
                                        <?php else : ?>
                                        <input name="title" type="text" id="title" value="<?php echo set_value('title');?>" size="100" />
                                        <?php endif;?>
                                    	<?=form_error('title');?>
                                	</td>
                                </tr>
                                <tr>
                                  <td width="169" align="left"><label>Nhóm tin:</label></td>
                                    <td width="922">
                                    	<select name="cat_id">
                                            <option value="0" selected >Chọn</option>
                                            <?php if(!empty($cat)) : ?>
												<?php foreach($cat as $c) : ?>
													<?php if(@$q->cat_id !='' ) : ?>
                                                    
                                                         <option value="<?=$c->id;?>" <?php if(@$q->cat_id == $c->id) echo "selected";?>><? if($c->parent==0) { echo $c->name; }else { echo "---".$c->name; }?></option>
                                                   
                                                    <?php else : ?>
                                                    <option value="<?=$c->id;?>" <?php echo set_select('cat_id', $c->id);?>><? if($c->parent==0) { echo $c->name; }else { echo "---".$c->name; }?></option>
                                                    <?php endif;?>
                                                    
                                                <?php endforeach;?>
                                            <?php endif;?>
                                        </select>
                                    	<?=form_error('cat_id');?>
                                	</td>
                                </tr>
                                <tr>
                                  <td width="169" align="left"><label>Mô tả ngắn:</label></td>
                                    <td width="922">
                                    	<?php if(@$q->intro !='') :?>
                                        <textarea name="intro" rows="5" cols="100"><?php echo @$q->intro;?></textarea>
                                        <?php else : ?>
                                        <textarea name="intro" rows="5" cols="100"><?=set_value('intro');?></textarea>
                                        <?php endif;?>
                                    	<?=form_error('intro');?>
                                	</td>
                                </tr>
                              	<tr>
                                  <td width="169" align="left"><label>Mô tả chi tiết:</label><br><span class="help">Mô tả thông tin chi tiết về bản tin</span></td>
                                    <td width="922">
                                    	<?php if(@$q->content !='') :?>
                                        <textarea name="desc" rows="20"><?php echo @$q->content;?></textarea>
                                        <?php else : ?>
                                        <textarea name="desc" rows="20"><?=set_value('desc');?></textarea>
                                        <?php endif;?>
                                    	<?=form_error('desc');?>
                                	</td>
                                </tr>
                                 
                                <tr>
                                  <td width="169" align="left"><label>Hình ảnh:</label></td>
                                    <td width="922">
										<input type="file" name="image_news" /> <br>
                                        <?php if(@$q->image !='') : ?>
                                        <img src="<?=base_url();?><?=@$q->image;?>" width="150" height="150">
                                        <?php endif;?>                                   	
                                	</td>
                                </tr>
                                <tr>
            		     </tbody>
                        </table>
                  </div>
                    <!--<div id="tab_2" style="display:none;">Noi dung tabs 2</div>
                    <div id="tab_3" style="display:none;">Noi dung tabs 3</div>-->
                    <input type="hidden" id="id" name="id" value="<?=@$q->id;?>">
                    <input type="hidden" name="oldImage" value="<?=@$q->image;?>">
                </form>
                
            </div><!--End content-->
        </div><!--End box-->
        
    </div><!--End content-->