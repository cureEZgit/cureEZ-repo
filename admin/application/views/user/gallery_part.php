<div class="col-lg-12">



<?php

/*print("<pre>");

print_r($gallery);

exit;*/



$g_c = 0;

foreach($gallery as $gal){

$g_c = $g_c+1;

?>

<ul class="lb-album">

					<li>

						<?php 	if($gal['image_count']  > 0){  ?>

						<a href="<?= site_url('page/gallery').'/'.$gal['id'] ;?>">

							<img src="<?= base_url();?>upload/product/<?php echo $gal['image']; ?>" alt="image01"><p align="center"><font color="#110000"><b><?php echo $gal['title']; ?></b></font></p>

						</a>

						 <?php }else{  ?>

						<a href="#">

							<img src="<?= base_url();?>upload/product/<?php echo $gal['image']; ?>" alt="image01"><p align="center"><font color="#110000"><b><?php echo $gal['title']; ?></b></font></p>

						</a>

							

							

					<?php	}  ?>

						

						<div class="lb-overlay" id="#">

							<img src="<?= base_url();?>upload/product/<?php echo $gal['image']; ?>" alt="image01" />

							<!--<div>

								<a href="#image-<?php echo $g_c-1; ?>" class="lb-prev">Prev</a>

								<a href="#image-<?php echo $g_c+1; ?>" class="lb-next">Next</a>

							</div>-->

							<a href="#page" class="lb-close">x Close</a>

						</div>

					</li>

				

					

	</ul>











<?php	

}

?>	



</div>



 <div class="clearfix"></div>

 <div class="row">

 <div class="col-lg-12">

 <div class="pull-right">

 <?php

  if($grv_count != 0){

	

if($prev > -2){

		

?>

<a style="cursor: pointer;" onclick="get_next(<?php echo $prev; ?>, <?php echo $page_id; ?>)" ><b> Previous</b/>&nbsp;&nbsp; </a>  

<?php } ?>



 <?php 

 

 for($i=0; $i<$num; $i++){

   $cur  = $i+1;

     $pg_c = $page;



 ?>

 <a onclick="get_next(<?php echo $i-1 ; ?>, <?php echo $page_id; ?>)" href="#"> <b> <?php if($pg_c == $i){ echo '<font color="red">'.$cur."</font>";  }else{ echo $cur;  } ?> </b/>&nbsp;&nbsp;</a> 

 <?php	

 }

 

 ?>

<?php

if($grv_count >= 15){	

 ?>



<a style="cursor: pointer;" onclick="get_next(<?php echo $next; ?>, <?php echo $page_id; ?>)" > <b>Next </b/>&nbsp;&nbsp;</a>

<?php } ?>





<?php } else{ ?>



No more grievance.........

<?php } ?></div>

</div>

</div>

