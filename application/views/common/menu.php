<div id="menu">
    <span></span>
    <div>
        <?php if(!empty($cats)) :?>
        <ul>
			<li><a href="<? echo base_url();?>">Home</a></li>
            <?php foreach($cats as $cat) :?>
                
            <li><a href="
            <? 
            if($cat['type']==0){
               echo site_url('danh-muc-tin-tuc/' . $cat['id'] . '-' . $cat['alias']);
            }
            else if($cat['type']==1){
                echo base_url().'san-pham';//sanpham
            }else if($cat['type']==2){
                echo site_url('gioi-thieu/' . $cat['id'] . '-' . $cat['alias']);
            }else if($cat['type']==3){
                 echo base_url().'dich-vu'; //dichvu
            }else if($cat['type']==4){
                 echo base_url().'lien-he';
            }
        
        
        ?>
      "><?=$cat['name'];?></a>  
                <?php if(count($cat['cat_sub'])>0)
                {
                
                ?>
				<div style="left: -4px;">
					<div>
						<p class="first_p"></p>
						<ul style="background: #fff;">
                            <?php foreach($cat['cat_sub'] as $cat_sub) :?>
                            <li><a href="<? 
                            if($cat_sub->type==0){
                               echo  site_url('danh-muc-tin-tuc/' . $cat_sub->id . '-' . $cat_sub->alias);
                            }
                            else if($cat_sub->type==1){echo base_url();
                            }else if($cat_sub->type==2){
                                echo site_url('gioi-thieu/' . $cat_sub->id . '-' . $cat_sub->alias);
                            }else if($cat_sub->type==3){
                             echo base_url('contact');
                            }else if($cat_sub->type==4){
                             echo base_url('san-pham');
                            }
        ?>"><? echo $cat_sub->name;?></a></li>
                            <?php endforeach;?>
						</ul>
						<p class="second_p"></p>
					</div>
					<p class="third_p"></p>
			    </div>
                <?
                }
                else if($cat['type']==3)
                {
                  ?>  
                   <?
                    $sql="select * from category_service ";	
            		$category_service=$this->db->query($sql);
                    if($category_service->num_rows()>0)
                	{
                    ?>
                    <div style="left: -4px;">
					<div>
						<p class="first_p"></p>
                       
						<ul style="background: #fff;">
                            <?php 
                            foreach($category_service->result() as $kqcategory_service)
                            {
                            ?>
                            <li><a href="<?php  echo base_url();?>danh-muc-dich-vu/<? echo $kqcategory_service->catid . '-' . $kqcategory_service->alias ?>"><? echo $kqcategory_service->cat_name;?></a></li>
                            <?
                            }
                            ?>
						</ul>
                        
						<p class="second_p"></p>
					</div>
					<p class="third_p"></p>
			        </div>
                    <?
                      }
                   ?>
               <?
                }
                ?>
            </li>
                
			<?php endforeach;?>
        </ul>
        <?php endif;?>
    </div>
    <span class="last-child"></span>
</div>