<!--begin support-->
 <?
$sql="select * from hotro where active=1  order by ord asc";	
$layhotro= $this->db->query($sql);
if($layhotro->num_rows()>0)
 {
 ?>
<div id="support">
	<span></span>
	<div>
		<ul>
         <?
        foreach($layhotro->result()  as $kqlayhotro)
		{
            if($kqlayhotro->type==1)
            {
            ?>
			<li><a href="ymsgr:sendim?<? echo $kqlayhotro->info;?>"><img src="http://opi.yahoo.com/online?u=<? echo $kqlayhotro->info;?>&m=g&t=5" border="0"><? echo $kqlayhotro->name;?></a></li>
	    <?
            }
            else if($kqlayhotro->type==2)
            {
            ?>
               <li class="skype"><a href="skype:<? echo $kqlayhotro->info;?>?call" style="padding-left: 15px;"><? echo $kqlayhotro->name;?></a></li>
         <?
            }
        }
        ?>
        </ul>
		<p>Hotline: <strong>091 9993683</strong></p>
	</div>
	<span class="last-child"></span>
</div>
<?
}
?>
<!--end support-->
<?// echo "<pre>"; print_r($cats); echo "</pre>"; ?>
<?php if(!empty($cats)) :?>
<div id="presentation_container" class="pc_container">
    <?php foreach($cats as $cat) :?>
	<div class="pc_item">
		<div class="desc">
			<h2><?=$cat->name;?></h2>
			<?=$cat->contents;?>
		</div>
		<img src="<? echo base_url();?><?=$cat->img;?>" width="980" height="300"/>
	</div>
    <?php endforeach;?>
	
</div>
<?php endif;?>
<script type="text/javascript">
	presentationCycle.init();
</script>
<!--begin content_page-->