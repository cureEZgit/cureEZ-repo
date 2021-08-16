<!-----------Start product section-----------> 
<div class="marginbtn10 padtop30">
    <div class="container">
   <div class="row">

<div class="welcometext"><span class="dhanara"><a href="<?php echo $pg_img['menu_link']; ?>"><?php echo $pg_img['page_name']; ?> </a></span>  <span class="dhanara"> &nbsp;&nbsp; >> &nbsp;&nbsp; </span>  <span class="dhanara"><a href="<?= site_url('page/gallery').'/'.$details['image_id'] ;?>"><?php echo $pg_img['title']; ?></a></span> >> <span class="dhanara"><a href="<?php echo $pg_img['menu_link']; ?>"> <font color="#ff8686"><?php echo $details['title']; ?></font> </a></span>  <span class="dhanara"> &nbsp;&nbsp;  &nbsp;&nbsp; </span></div>



       <h3 class="prdcthead" style="border-bottom:1px dotted #aeaeae;"></h3>  
  <div class="col-md-6"><p class="bedimg"><img src="<?= base_url();?>upload/product/<?php echo $details['image']; ?>" class="img-responsive"></p> </div>
  <div class="col-md-6" id="side-img">
	  
	  <div class="row" >
	<div ><strong><h4><?php echo $details['title']; ?></h4></strong></div>
	<hr/>		
</div>
           <div class="row" style="padding-top:10px">
     
<p align="justify"> <?php echo $details['description'];  ?></p>

         
    </div>
    
       </div>
</div>
    </div>
    <!-------products Tabs---------->
    

    
</div>
<div class="container">
    <div class="row">
		
        
	</div>
</div>
<div class="container">
    <div class="row">
            <div class="panel with-nav-tabs panel-warning">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">

             <?php if($details['features'] !=''){ ?>   <li class="active" ><a href="#tab1warning" data-toggle="tab">Feature</a></li> <?php } ?>
             <?php if($details['specification'] !=''){ ?>   <li <?php if($details['features'] ==''){ ?> class="active" <?php } ?> ><a href="#tab2warning" data-toggle="tab">Specification</a></li> <?php } ?>
               
 <?php if(count($other) > 0){ ?>            <li  class="active"  ><a href="#tab3warning" data-toggle="tab">Similar Products</a></li> <?php } ?>               

                            
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">

<?php if($details['features'] !=''){ ?>      <div class="tab-pane fade in active" id="tab1warning">
                          <div class="product_table">        <div class="row">
        <div class="mapleproducts">
   <?php echo $details['features']; ?>
   
  </div>     
          </div>                  
 </div>
</div> <?php } ?>


<?php if($details['specification'] !='' ){ ?>          <div  <?php if($details['features'] =='' ){ ?> class="tab-pane fade in active" <?php }else{   ?> class="tab-pane fade"  <?php } ?>id="tab2warning">
                       <div class="product_table">  
			     <div class="row">
			        <div class="mapleproducts">
    
				    <?php echo $details['specification']; ?>
  </div>     
          </div>         
  </div></div>

<?php } ?>


<div   <?php if($details['features'] =='' && $details['specification'] ==''){ ?>  class="tab-pane fade in active" <?php }else{ ?> class="tab-pane fade"  <?php } ?>  id="tab3warning">
                            <div class="product_table">       <div class="row">
        <div class="mapleproducts">
    
    
 <div class="row" style="padding-top:10px">
     
<?php foreach($other as $ot){ ?>

 <div class="col-lg-4 " >
        <a href="<?= site_url('page/details').'/'.$ot['id'] ;?>">
             <img src="<?= base_url();?>upload/product/<?php echo $ot['image']; ?>"  class="img-responsive" style="height:100px">
        </a>
        <p> <span class="glyphicon glyphicon-circle-arrow-right"></span><a href="<?= site_url('page/details').'/'.$ot['id'] ;?>"  > <?php echo $ot['title']; ?> </a></p>
    </div>
     
<?php } ?>
    
         
    </div>

  </div>     
          </div>         
  </div></div>

                        
                            
                        
                    </div>
                </div>
            </div>
        </div>
</div>
    
    <!----------------end--------------->


