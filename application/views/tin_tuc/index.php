<script type="text/javascript">
        	function loadUrl(url, id)
			{
			 //alert("Fdfdf");
				$('.' + id ).load(url);
			}
			
</script>
<!--begin product_page-->
<div id="product_page">
    <h3>
        <?php foreach($render_path as $key => $val) : ?>
            <a href="<?=$val;?>"> <?=$key;?> &nbsp;  &raquo; &nbsp; </a> 
        <?php endforeach;?>
    </h3>
    <!--begin listnews_page-->
    <?php if(!empty($news)) : ?> 
    <div id="listnews_page">
        <?php foreach($news as $new) : ?>
    	<dl>
    		<dt><a href="<?=site_url($url_view . $new->id .'-'. $this->util->alias($new->title));?>"><img width="140" height="100" src="<?=base_url();?><?=$new->image;?>" alt="<?=$new->title;?>"></a></dt>
    		<dd>
    			<h4><a href="<?=site_url($url_view . $new->id .'-'. $this->util->alias($new->title));?>"><?=$new->title;?></a></h4>
    			<p><?=$new->intro;?></p>
    
    		</dd>
    	</dl>
    	<?php endforeach;?>					
    	
    </div>
    <!--end listnews_page-->
    <?php endif;?>
</div>
<?php if(!empty($page)) :?>
   <div class="pagination">
	<div class="link">
        <?php // echo $page;?>
    </div>
	</div><!--End pagination--> 
 <?php endif;?>  
 