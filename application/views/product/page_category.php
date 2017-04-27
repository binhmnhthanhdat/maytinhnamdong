<!--begin product_home-->
<div class="product_home">
	<h3>
    
    <?php foreach($render_path as $key => $val) : ?>
        <a href="<?=$val;?>"><?=$key;?> &raquo;</a> 
    <?php endforeach;?>
    </h3>
    <? // echo "<pre>";print_r($products->current_row); echo "</pre>";echo count($products);?>
    <?php if(!empty($products) and count($products->result())>0) : ?>
	<div>
		<ul>
            
            <?php foreach($products->result() as $pro) : ?>
            
			<li>
				<a href="<?=site_url('xem-san-pham/'. $pro->id .'-'. $pro->catid . '-' . $pro->p_name_alias);?>"><img style="margin-top: 13px" width="140" height="130" src="<?=base_url();?><?=$pro->p_image_thumb;?>" alt="<?=$pro->p_name;?>"></a>				                                
				<p>
					<a href="<?=site_url('xem-san-pham/'. $pro->id .'-'. $pro->catid . '-' . $pro->p_name_alias);?>"><?=$pro->p_name;?> </a>
					<? if($pro->khuyenmai!="")
                    {
                    ?>
                    <span><strong>Khuyến mại :</strong>  <? echo $pro->khuyenmai;?></span>
					<?
                    }
                    ?>
                    <span>Giá : <strong><? echo number_format($pro->gia);?></strong> VND</span>
				</p>
				<a class="last-child" href="<?=site_url('xem-san-pham/'. $pro->id .'-'. $pro->catid . '-' . $pro->p_name_alias);?>">CHI TIẾT</a>	
			</li>
			<?php endforeach;?>
			
		</ul>
	</div>
    <?php else :?>
    <div style="padding: 20px;">
    <?php echo "Chưa có sản phẩm nào trong mục này";?>
    </div>
  <?php endif;?>    
</div>