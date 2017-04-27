<div id="product_page">
	<h3>
    <?php foreach($render_path as $key => $val) : ?>
         <a href="<?=$val;?>">  <?=$key;?> &nbsp;  &raquo; &nbsp;</a>
    <?php endforeach;?>
    </h3>
    <div id="about_page">
    	<h1 style="font-size:20px; margin-bottom:10px; font-weight:normal; margin-top: 10px;"><?=$news->title;?></h1>
        <p style="font-weight:bold; margin-bottom:10px;"><?=$news->intro;?></p>
        <p class="content_news"><?=$news->content;?></p>
    </div>
    
</div>
<!--end product_page-->
<div  id="product_page" >
    	<h1 style="font-size:20px; font-weight:normal;border-bottom: 1px solid #ccc;padding-bottom: 10px;">Các tin liên quan </h1>
    	<?php if(!empty($other_news)) : ?>
        <ul style="list-style:none;padding:10px;">
        	<?php foreach($other_news as $other) : ?>
            <li style="padding:7px 0px;">&raquo; <a href="<?=site_url($url_view . $other->id .'-'. $this->util->alias($other->title));?>" title="<?=$other->title;?>"><?=$other->title;?></a> <span style="font-size:11px; font-style:italic;">(Đăng ngày: <?=mdate('%d/%m', $other->create_date);?>)</span></li>
            <?php endforeach;?>
        </ul>
        <?php endif;?>
    </div>