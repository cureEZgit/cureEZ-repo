 <div class="container">
<!-- starting of slider part 
-->    <div class="carsolwarp">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
        <!-- Indicators -->
        <ol class="carousel-indicators">
         <?php
		 $c= 0 ;
		  foreach($slider as $sl){
			if($c==0){
		?>
		<li data-target="#carousel-example-generic" data-slide-to="<?php echo $c; ?>" class="active"></li>
		<?php
			}else{  ?>
			<li data-target="#carousel-example-generic" data-slide-to="<?php echo $c; ?>"></li>
			<?php
			}
			$c = $c+1;
			 } 
			 ?>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
         
		 
		  <?php
		 $c= 0 ;
		  foreach($slider as $sl){
		  	$c = $c+1;
			 ?>
          <?php if($c==1){ ?>		  
		  <div class="item active">
           <?php }else{ ?>
		  <div class="item">
			<?php } ?>
		  <img src="<?= base_url();?>assets/user/images/banner.jpg" alt="">
		  </div>
		  <?php } ?>
		  
		 <!--<div class="item active"> 
      <img src="<?= base_url();?>assets/user/images/banner.jpg" alt="">
          </div>
          <div class="item "> 
      <img src="<?= base_url();?>assets/user/images/banner.jpg" alt="">
          </div>
              <div class="item "> 
      <img src="<?= base_url();?>assets/user/images/banner.jpg" alt="">
          </div>
              <div class="item "> 
      <img src="<?= base_url();?>assets/user/images/banner.jpg" alt="">
          </div>
          <div class="item "> 
      <img src="<?= base_url();?>assets/user/images/banner.jpg" alt="">
          </div> -->
		           
        
		
		
		</div>
       
      </div>
    </div>
   <!--end of slider part-->
   <div> 
   <img src="<?= base_url();?>assets/user/images/slidershadow.png" alt=""></div>
  
  
	 <!--This is the startinfg of the bottom slider-->
<?php foreach($home as $hm){ 
if($hm['name']== 'bottomslider'){
	?>

	<div class="padbtn10">
           <div class="thumbsliderarrowarp pull-right col-lg-1 padtop20">
        <div class="tleftbg"><a href="#myCarousel" data-slide="prev" ><img src="<?= base_url();?>assets/user/images/tleft.png" alt=""  class="pad5"/></a></div>
        <div  class="tleftbg"><a href="#myCarousel" data-slide="next"><img src="<?= base_url();?>assets/user/images/tright.png" alt="" class="pad5"/></a></div>
      </div>
      <div class="clearfix"></div>
    </div>
	
<?php }	
echo $hm['content'];

 } ?>

	
	 <!-- <div class="padbtn10">
      
	<!--End of the bottom slider-->
 </div>

<div>

<?php  echo $clients;  ?>

 </div>
