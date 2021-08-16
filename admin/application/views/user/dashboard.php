 <!----------------slider section------------->
 <?php /*       <section class="slider">
            <div class="main-container">
            <div id="carousel-example-generic" class="carousel slide">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                  <?php if(!empty($slider)){ $s=0; foreach($slider as $sl){  ?>
                <li data-target="#carousel-example-generic" data-slide-to="<?php echo $s; ?>" class="<?php if($s==0){ echo "active"; } ?>"></li>
                  <?php $s++; }} ?>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner wrapper-slider" role="listbox">
                
                  <!-- SLIDER VIEWS -->
                <?php if(!empty($slider)){$m=0; foreach($slider as $sl){  ?>
                  <div class="item <?php if($m == 0){ echo "active"; }?>">
                    <img src="<?php echo base_url(); ?>upload/gallery/slider/<?php echo $sl['image']; ?>" class="img-responsive">
                  <div class="carousel-caption">
                    <h3 data-animation="animated bounceInRight">
                      <?php echo $sl['title']; ?>
                    </h3>
                      <p data-animation="animated bounceInLeft"> <?php echo $sl['caption']; ?></p>
                    <?php if($sl['link'] != ""){ ?><a href="<?php echo $sl['link']; ?>" class="btn btn-primary btn-lg read-details" data-animation="animated zoomInUp" target="_blank">Read Details..</a><?php } ?>
                  </div>
                </div> <!-- /.item -->
                  <?php $m++; } } ?>
                  
              </div><!-- /.carousel-inner -->

              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i><span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i><span class="sr-only">Next</span>
        </a>
            </div><!-- /.carousel -->

        </div><!-- /.container -->
        </section>



 <?php 
       $bg_col = $this->input->cookie('color',true);
        
        ?>
<span id="cls-ctrl" class="" >

        <!------------PARTICIPATE SECTION HERE------------>
<?php $headcontent = $this->user_model->getCommonRow('headcontent'); ?>
    <section class="participate">
        <span id="homecontainer" class="<?php if(!empty($bg_col)){ echo $bg_col; } ?>">
        <div class="container">
             <?php if(!empty($headcontent)){ echo $headcontent->content; } ?>
        </div>
        </span>
    </section>
        <!---------------------three button section here------------>
    <?php $commonLink = $this->user_model->getCommonRow('common-link'); ?>
    <section class="reports-sctn">
        <div class="container">
            <?php if(!empty($commonLink)){ echo $commonLink->content; } ?>
        </div>
    </section>
    <!------------support section here--------------->
    <section class="support">
        <span id="homecontainer2" class="<?php if(!empty($bg_col)){ echo $bg_col; } ?>">
        <div class="container">
            
             <?php $mid_section = $this->user_model->getCommonRow('mid-section'); 
            if(!empty($mid_section)){
                echo $mid_section->content;
            }
            
            ?>
            
        </div>
            </span>
    </section>
    <!-------------------our partners------------>
<?php $partners = $this->user_model->getCommonRow('our-partners');  ?>
    <section class="our-partner">
            <h3 class="headingcls" style="margin-top:0;"><?php echo $partners->name; ?></h3>
        <div class="our-partners">
        <div class="container">
            <?php 
            if(!empty($partners)){
                echo $partners->content;
            } ?>
        </div>
        </div>
    </section>
    <!-------------testimonial---------------->

<?php $testimonial = $this->user_model->getEventsByCtgy('testimonial'); ?> 
    <section class="testimonial">
        <div class="container">
                <div class='col-md-8'>
                    <h3 class="headingcls tst-txt">Testimonial</h3>
                  <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                    <!-- Bottom Carousel Indicators -->
                    <ol class="carousel-indicators">
                        <?php if(!empty($testimonial)){ $k = 0; foreach($testimonial as $tst){ ?>
                      <li data-target="#quote-carousel" data-slide-to="<?php echo $k; ?>" class="<?php if($k==0){ echo "active"; } ?>"></li>
                        <?php $k++; }} ?>
                    </ol>

                    <!-- Carousel Slides / Quotes -->
                    <div class="carousel-inner testimonial">
                      <!-- Quote 1 -->
                      <?php if(!empty($testimonial)){ $j = 0; foreach($testimonial as $tst){ ?>
                        <div class="item <?php if($j==0){ echo "active"; } ?>">
                        <blockquote>
                          <div class="row">
                            <div class="col-sm-3 pimg">
                              <img class="img-testimonial" src="<?php echo base_url('upload/events/'.$tst->cover_pic); ?>">
                            </div>
                            <div class="col-sm-9 testimonial-txt">
                              
                                <?php echo $tst->description; ?>
                            </div>
                          </div>
                        </blockquote>
                      </div>
                      
                        <?php $j++; }} ?>
                    </div>
                  </div>                          
                </div>
            <div class="col-md-4 fbplgn">
                <div class="facebook">
                  <?php $facebook = $this->user_model->getCommonRow('facebook'); ?>  
                     <?php if(!empty($facebook)){ echo $facebook->content; } ?>
                </div>
            </div>
        </div>
    </section>
</span>

*/ ?>


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
        <!----------Include welcome message---------->
        <div class="wrapper-about">
            
           
            
            
            <div class="container">
                  <?php $news = $this->user_model->getEventsByCtgy('news'); if(!empty($news)){ ?> 
                
                <div class="news">
                     <span>Latest News</span>
                    <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();"     width= "85%">
                    <div class="news-mark">
                        <?php $mk =1; foreach($news as $ns){ ?>
                        <p><a href="<?php echo site_url('page/news/'.$ns->alias); ?>"><?php echo $mk.') '.$ns->title; ?></a></p> 
                        <?php $mk++; } ?>
                    </div>
                    </marquee> 

                </div>
                   <?php } ?>
           
                
                <?php $welcome = $this->user_model->getCommonRow('welcome'); if(!empty($welcome)){ echo $welcome->content;  } ?>
                
                <!-------About company box-------->
                <div class="about-boxes">
                    <div class="col-md-4">
                     <?php $ourworld = $this->user_model->getCommonRow('our-world'); if(!empty($ourworld)){ echo $ourworld->content;  } ?>
                </div>
                <div class="col-md-4">
                    <?php $promise = $this->user_model->getCommonRow('our-promise'); if(!empty($promise)){ echo $promise->content;  } ?>
                </div>
                <div class="col-md-4">
                    <?php $reach = $this->user_model->getCommonRow('our-reach'); if(!empty($reach)){ echo $reach->content;  } ?>
                </div>
                </div>
            </div>
        </div>
        <!------------Include cause list section------------->
        <div class="causelist">
            <div class="container">
                <h3 class="heading-lst">Project List</h3>
                <?php $project = $this->user_model->getEventsByCtgy('project'); ?> 
            <div id="cause" class="owl-carousel">
                <?php if(!empty($project)){  foreach($project as $prj){ ?>
                <div class="item">
                    <div class="causeListBox">
                        <?php if(!empty($prj->cover_pic)){ ?>
                    <img class="lazyOwl" data-src="<?php echo base_url(); ?>upload/events/min_events/<?php echo $prj->cover_pic; ?>" alt="Gram-utthan">
                        <?php }?>
                    <h3><?php echo $prj->title; ?></h3>
                    <p><?php echo $prj->sht_desc; ?></p>
                    <a href="<?php echo site_url('page/project/'.$prj->alias); ?>" class="caption-btn">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                <?php } } ?>
              </div>
            </div>
        </div>
        <!------------Include company view section ------------>
        <div class="company-view">
            <div class="container">
                <div class="col-md-4">
                    <div class="viewBox">
                        
                        <?php $events = $this->user_model->getEventsByCtgy('events'); ?> 
                        
                        <h3>Events</h3>
                        <ul class="newsBox">
                            <?php if(!empty($events)){  foreach($events as $eve){ ?>
                            <li><a href="<?php echo site_url('page/events/'.$eve->alias); ?>"><?php echo $eve->title; ?></a> </li>
                            <?php }} ?>
                        </ul>
                        <a href="<?php echo site_url('page/events/'); ?>" class="moreView">More view</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="viewBox">
                        
                         <?php $books = $this->user_model->getGalleryByType('book'); ?> 
                        
                        <h3>Downloads</h3>
                        <ul class="Downloads">
                            <?php if(!empty($books)){  foreach($books as $bks){
                            
    
            if((!empty($bks->file)) || !empty($bks->source)){ 
                  if($bks->file !=""){
                      $ado = base_url('upload/gallery/book/'.$bks->file);
                  }else if($bks->source != ""){
                    $ado = $bks->source;
                  }
            }else{
                $ado = '#';
            }
                            
                            ?>
                            <li><a  target="_blank" href="<?php echo $ado;?>"><?php echo $bks->caption; ?></a> </li>
                            <?php } }?>
                        </ul>
                        <a href="<?php echo site_url('page/reports'); ?>" class="moreView">More view</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php $funds = $this->user_model->getEventsByCtgy('funds'); ?> 
                    <div class="viewBox">
                        <h3>Funds Details</h3>
                        <ul class="funds">
                             <?php if(!empty($funds)){ foreach($funds as $fnd){ ?>
                            <li><a href="<?php echo site_url('page/funds/'.$fnd->alias); ?>"><?php echo $fnd->title; ?></a> </li>
                            <?php }} ?>
                        </ul>
                        <a href="<?php echo site_url('page/funds/'); ?>" class="moreView">More view</a>
                    </div>                
                </div>
            </div>
        </div>
        <!----------Founders section start here--------->
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
