<script type="text/javascript">
	function searchPro()
	{
		//contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		var key = $('#keyword').val();
		if(key =='')
		{
			alert('Vui lòng nhập từ khóa cần tìm');
			$('#keyword').focus();
			return false;
			
		} else if(key.length < 4)
		{
			alert('Bạn nhập ít nhất 4 ký tự');
			$('#keyword').focus();
			return false;
		} else if(key =='Nhập từ cần tìm')
		{
			alert('Vui lòng nhập từ khóa cần tìm');
			$('#keyword').focus();
			return false;
		} else {
			var url = '<?=$this->index;?>';
			window.location.href= url + 'tim-kiem/?key=' + encodeURIComponent(key);
		}
	}
</script>
<div id="right">
        	<div id="block_search">
            	<div style="margin:5px 13px 0px 10px; float:left;"><a href="javascript:void(0);" onclick="searchPro(); return false;" title="Nhấn để tìm"><img src="<?=base_url();?>template/images/system_search.png" width="22" height="22" border="0"/></a></div>
                <div style="float:left;"><input type="text" id="keyword" value="Nhập từ cần tìm" style="width:140px; border:none; border:0; margin-top:8px; color:#a18e8e; font-size:11px;"/></div>
            </div><!--End block search-->
            
            <div id="block_category">
            	<div class="category_title">Danh mục sản phẩm</div>
                <div class="category_list">
                	<?php if(!empty($cats)) :?>
                	<ul id="list_cat">
                    	<?php foreach($cats as $cat) :?>
                    	<li><a href="<?=site_url('xem-danh-muc/' . $cat->catid . '-' . $cat->alias);?>" title="<?=$cat->cat_name;?>"><?=$cat->cat_name;?></a></li>
                        <?php endforeach;?>
                    </ul>
                    <?php endif;?>
                </div>
                <div class="category_bottom"></div>
            </div><!--End block category-->
            
            <div id="block_category">
            	<div class="category_title">tin tức</div>
                <div class="category_list">
                	<?php if(!empty($news)) : ?>
                    <ul id="list_news">
                    	<?php foreach($news as $new) : ?>
                    	<li>
                        	<span style="float:left; font-size:11px; padding-bottom:5px;"><a href="<?=site_url('xem-tin/' . $new->id .'-'. $this->util->alias($new->title));?>" title="<?=$new->title;?>" style="color:#662693; font-weight:bold; font-size:12px;"><?=$new->title;?></a> (Đăng ngày: <?php echo mdate('%d/%m', $new->create_date);?>)</span>
                            <div style="float:left;">
                            	<img src="<?=base_url();?><?=$new->image;?>" width="50" height="50" style="float:left; border:1px solid #cccccc; margin-right:7px;"/>
                                <?=word_limiter($new->intro, 10);?>
                            </div>
                        </li>
                       <?php endforeach;?>
                    </ul>
                    <?php endif;?>
                    <div class="more" style="float:left; text-align:right; width:168px; font-size:11px; font-weight:bold;"><img src="<?=base_url();?>template/images/arrow.png"/> <a href="<?=site_url('tin-tuc');?>" title="Xem thêm">Xem thêm</a></div>
                </div>
                <div class="category_bottom"></div>
            </div><!--End block news-->
            
            <div id="block_category">
            	<div class="category_title">kiến thức tiêu dùng</div>
                <div class="category_list">
                	<?php if(!empty($kts)) : ?>
                    <ul id="list_news">
                    	<?php foreach($kts as $new) : ?>
                    	<li>
                        	<span style="float:left; font-size:11px; padding-bottom:5px;"><a href="<?=site_url('xem-kien-thuc/' . $new->id .'-'. $this->util->alias($new->title));?>" title="<?=$new->title;?>" style="color:#662693; font-weight:bold; font-size:12px;"><?=$new->title;?></a> (Đăng ngày: <?php echo mdate('%d/%m', $new->create_date);?>)</span>
                            <div style="float:left;">
                            	<img src="<?=base_url();?><?=$new->image;?>" width="50" height="50" style="float:left; border:1px solid #cccccc; margin-right:7px;"/>
                                <?=word_limiter($new->intro, 10);?>
                            </div>
                        </li>
                       <?php endforeach;?>
                    </ul>
                    <?php endif;?>
                    <div class="more" style="float:left; text-align:right; width:168px; font-size:11px; font-weight:bold;"><img src="<?=base_url();?>template/images/arrow.png"/> <a href="<?=site_url('kien-thuc');?>" title="Xem thêm">Xem thêm</a></div>
                </div>
                <div class="category_bottom"></div>
            </div><!--End block Kien thuc tieu dung-->
            	
        </div><!--End right-->