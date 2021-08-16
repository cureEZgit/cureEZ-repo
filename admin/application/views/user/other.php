
 <!----------------slider section------------->
          <?php if($en_slider == 1){ ?>
    
 <div id="wrapper-slider">
          <div class="row">
            <div class="span12">
              <div id="slider" class="owl-carousel">
                  <?php if(!empty($slider)){$m=0; foreach($slider as $sl){  ?>
                <div class="item">
                    <img src="<?php echo base_url(); ?>upload/gallery/slider/<?php echo $sl['image']; ?>" alt="Gram-utthan">
                    <div class="caption wow fadeInRight animated">
                        <h3><?php if(!empty($sl['caption'])){ echo $sl['caption']; } ?></h3>
                        <?php if(!empty($sl['link'])){  ?>
                        <a href="<?php echo $sl['link'];  ?>" class="caption-btn">More Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a><?php } ?>
                    </div>
                  </div>
                <?php }} ?>
              </div>
            </div>
          </div>
    </div>
          <?php } ?>
  
 <!-- ##################end of slider part############# -->
 
<?php 
       $bg_col = $this->input->cookie('color',true);
        
        ?>
  <!----------------------------welcome section----------------------------->
        <div class="container">
            <section  id="chn-eft" class="inner-ctnr" >
                <span id="pagecontainer" class="<?php if(!empty($bg_col)){ echo $bg_col; } ?>" >
            <div   class="col-md-12 ">
                
                <h3 class="inner-heading"><?php echo $page['name'] ?></h3>
              <?php echo $page['right']; ?><br>
                
            </div>
                </span>
            </section>
            </div>
        
        <!----------------------Products----------------------->

<div class="founders">
            <div class="container">
                <div class="founders-logo">
                    <h3 class="heading-lst">Our Funders</h3>
                    <marquee  scrolldelay="100" onmouseover="this.stop();" onmouseout="this.start();" >
                    <ul>   <?php if(!empty($bottomslider)){$m=0; foreach($bottomslider as $bsl){  ?>
                        <li><a href="<?php echo $bsl['link'];  ?>"><img src="<?php echo base_url(); ?>upload/gallery/slider/<?php echo $bsl['image']; ?>"> </a> </li>
                        <?php } } ?>
                    </ul>
                    </marquee>
                </div>
            </div>
        </div>
