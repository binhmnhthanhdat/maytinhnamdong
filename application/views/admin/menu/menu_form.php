<?php
        
        //tat ca cai nay dung de cau hinh cho ckeditter
        $config_mini = array();  
 
        $config_mini['toolbar'] = array(
            array( 'Source', '-', 'Bold', 'Italic', 'Underline', 'Strike' ,'-', 'Link', 'Unlink', 'Anchor','Image')
        );
         
// B?n có th? dùng m?ng full tùy ch?n
 $config_mini =array(
            array( 'Source', '-', 'Bold', 'Italic', 'Underline', '-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo','-','NumberedList','BulletedList' ));
//---- Ho?c tùy bi?n kích thu?c
//  $this->ckeditor->config['width'] = '730px';
//        $this->ckeditor->config['height'] = '300px';

        /* Y la configuración del kcfinder, la debemos poner así si estamos trabajando en local */
                                    $config_mini['filebrowserBrowseUrl'] = base_url()."ckeditor/ckfinder/ckfinder.html";
                                    $config_mini['filebrowserImageBrowseUrl'] = base_url()."ckeditor/ckfinder/ckfinder.html?type=Images";
                                    $config_mini['filebrowserUploadUrl'] = base_url()."ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files";
                                    $config_mini['filebrowserImageUploadUrl'] = base_url()."ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images";
 
        //ket thuc cau hinh cho ckediter
?>
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
                    <a href="javascript:void(0);" onclick="location.href='<?=base_url();?>admin/menu/index';" class="button">Cancel</a>
                </div>
            </div><!--End heading-->
            <div class="content">
            	<div id="tabs" class="htabs">
                	<a href="#tab_1" class="selected">Thông tin Danh mục</a>
                    <!--<a href="#tab_2">Tab 2</a>
                    <a href="#tab_3">Tab 3</a>-->
                </div><!--End tabs-->
                
                <form action="<?=$action;?>" method="post" enctype="multipart/form-data" id="frm_add">
               	  <div id="tab_1" style="display:block;">
                   	  <table width="100%" class="form">
						<tbody>
                           	  <tr>
                                  <td width="169" align="left"><label>Tên danh mục:</label></td>
                                    <td width="922">
                                    	<?php if(@$article->name !='') :?>
                                        <input name="name" type="text" id="name" value="<?php echo @$article->name;?>" size="100" />
                                        <?php else : ?>
                                        <input name="name" type="text" id="name" value="<?php echo set_value('name');?>" size="100" />
                                        <?php endif;?>
                                    	<?=form_error('name');?>
                                	</td>
                                </tr>
                               
                                <tr>
                                 <td width="169" align="left"><label>Loại menu :</label></td>
                                    <td width="922">
                                        <select name="type">
                                          
                                                  <option value="0" <?php if(@$article->type == 0) echo "selected";?>>Tin tức </option>
                                                  <option value="2" <?php if(@$article->type == 2) echo "selected";?>>Giới thiệu</option>
                                                  <option value="1" <?php if(@$article->type == 1) echo "selected";?>>Sản phẩm</option>
                                                  <option value="3" <?php if(@$article->type == 3) echo "selected";?>>Dịch vụ</option>
                                                  <option value="4" <?php if(@$article->type == 4) echo "selected";?>>Liên hệ</option>
                                                   
                                        </select>
                                        <?=form_error('type');?>
                                    </td>
                                </tr>
                                <tr>
                                 <td width="169" align="left"><label>Danh mục cha :</label></td>
                                    <td width="922">
                                        <select name="parent">
                                            <option value="0" selected >Trang chủ</option>
                                            <?
                                            	$sql="select * from cat_news where active=1 and parent=0 order by ord asc";	
                                                $dsmenu= $this->db->query($sql);
                                                 if($dsmenu->num_rows()>0)
                                               {
                                                foreach($dsmenu->result()  as $kqdsmenu)
                                            		{
                                             ?>
                                                  <option value="<? echo $kqdsmenu->id ?>" <?php if(@$article->parent == $kqdsmenu->id ) echo "selected";?>><? echo $kqdsmenu->name; ?></option>
                                                <?
                                                }
                                               }
                                              ?>   
                                                   
                                        </select>
                                        <?=form_error('type');?>
                                    </td>
                                </tr>
                                <tr>
                                  <td width="169" align="left"><label>Link:</label></td>
                                    <td width="922">
                                        <?php if(@$article->link !='') :?>
                                        <input name="link" type="text" id="link" value="<?php echo @$article->link;?>" size="100" />
                                        <?php else : ?>
                                        <input name="link" type="text" id="link" value="<?php echo set_value('link');?>" size="100" />
                                        <?php endif;?>
                                        <?=form_error('link');?>
                                    </td>
                                </tr>
                                <tr>
                                  <td width="169" align="left"><label>Vị trí:</label></td>
                                    <td width="922">
                                        <?php if(@$article->ord !='') :?>
                                        <input name="ord" type="text" id="ord" value="<?php echo @$article->ord;?>" size="100" />
                                        <?php else : ?>
                                        <input name="ord" type="text" id="ord" value="<?php echo set_value('vitri');?>" size="100" />
                                        <?php endif;?>
                                        <?=form_error('ord');?>
                                    </td>
                                </tr>
                                <tr>
                                  <td align="left"><label>Trạng thái:</label><br /><span class="help">Nếu muốn hiển thị thì Click chọn</span></td>
                                    <td>
                                    <input type="checkbox" name="active" <?php if(@$article->active == 1) echo "checked=checked"; else "";?>/>
                                    <?=form_error('active');?>
                                </td>
                                </tr>
                                <tr>
                                  <td align="left"><label>Hiển thị chi tiết tin ở trang home:</label><br /><span class="help">Nếu muốn hiển thị thì Click chọn</span></td>
                                    <td>
                                    <input type="checkbox" name="home" <?php if(@$article->home == 1) echo "checked=checked"; else "";?>/>
                                    <?=form_error('home');?>
                                </td>
                                </tr>
                                
            		     </tbody>
                        </table>
                  </div>
                    <!--<div id="tab_2" style="display:none;">Noi dung tabs 2</div>
                    <div id="tab_3" style="display:none;">Noi dung tabs 3</div>-->
                    <input type="hidden" id="id" name="id" value="<?=@$article->id;?>">
                     <input type="hidden" name="oldImage" value="<?=@$article->image;?>">
                </form>
                
            </div><!--End content-->
        </div><!--End box-->
        
    </div><!--End content-->