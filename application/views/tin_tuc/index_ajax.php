<?php if(!empty($news)) : ?> 
                   <?php foreach($news as $new) : ?>
                   <div class="box_n" style="float:left; margin-bottom:10px;">
                   		
                        <h1 style="font-size:14px;"><a href="<?=site_url($url_view . $new->id .'-'. $this->util->alias($new->title));?>"><?=$new->title;?></a></h1>
                        <span style="font-size:10px; float:left; margin-bottom:10px; clear:both;">Đăng ngày: <?=mdate('%d/%m/%Y', $new->create_date);?> | Cập nhật ngày: <?=mdate('%d/%m/%Y', $new->modify_date);?></span>
                        <p style=" float:left; clear:both;">
                        	<img src="<?=base_url();?><?=$new->image;?>" width="100" height="100" style="float:left; margin-right:10px;"/>
                            <?=$new->intro;?>
                         </p>
                   </div>
                   <?php endforeach;?>
                   <?php endif;?>
                   <div class="pagination">
                	<div class="link">
                    	 <?php if(!empty($page)) :?>
                        <?php echo $page;?>
                        <?php endif;?>
                    </div>
                </div><!--End pagination-->                       
                
           
<script type="text/javascript">
function loadUrl(url, id)
{
	$('.' + id ).load(url);
}
			
</script>