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
                    <a href="javascript:void(0);" onclick="location.href='<?=$this->index_url;?>admin';" class="button">Cancel</a>
                </div>
            </div><!--End heading-->
            <div class="content">
            	<div id="tabs" class="htabs">
                	<a href="#tab_1" class="selected"><?=$heading_title;?></a>
                    <!--<a href="#tab_2">Tab 2</a>
                    <a href="#tab_3">Tab 3</a>-->
                </div><!--End tabs-->
                
                <form action="<?=$action;?>" method="post" enctype="multipart/form-data" id="frm_add">
               	  <div id="tab_1" style="display:block;">
                   	  <table width="100%" class="form">
<tbody>
           	  <tr>
           	  <td width="16%" align="left"><label>Tên webiste:</label></td>
          	<td width="84%">
            	<input type="text" id="site_title" name="site_title" size="50" value="<?=@$setting->site_name;?>" />
                
            </td>
            </tr>
           
            <tr>
           	  <td align="left"><label>SEO Keywords:</label></td>
              <td><input type="text" id="meta_key" name="meta_key" size="50" value="<?=@$setting->meta_key;?>" />
              
              </td>
            </tr>
            <tr>
           	  <td align="left"><label>SEO Description:</label></td>
              <td><input type="text" id="meta_desc" name="meta_desc" size="50" value="<?=@$setting->meta_desc;?>" />
              
              </td>
            </tr>
            <tr>
           	  <td align="left"><label>Số trang sản phẩm:</label></td>
              <td><input type="text" id="product_perpage" name="product_perpage" size="5" value="<?=@$setting->per_page;?>" />
              	
              </td>
            </tr>
            
            <tr>
           	  <td align="left"><label>Địa chỉ Cty:</label></td>
          	<td>
            	<input type="text" id="address" name="address" size="50" value="<?=@$setting->address;?>" />
                
            </td>
            </tr>
            <tr>
           	  <td align="left"><label>Điện thoại liên hệ:</label></td>
          	<td>
            	<input type="text" id="phone" name="phone" size="50" value="<?=@$setting->phone;?>" />
                
            </td>
            </tr>
            <tr>
           	  <td align="left"><label>Email:</label></td>
              <td>
              	
                <input type="text" id="google_analytics" name="google_analytics" size="50" value="<?=@$setting->google_analytics;?>" />
              </td>
            </tr>
                            </tbody>
                        </table>
                  </div>
                    <!--<div id="tab_2" style="display:none;">Noi dung tabs 2</div>
                    <div id="tab_3" style="display:none;">Noi dung tabs 3</div>-->
                    <input type="hidden" id="_action" name="_action" value="let_go">
                </form>
                
            </div><!--End content-->
        </div><!--End box-->
        
    </div><!--End content-->