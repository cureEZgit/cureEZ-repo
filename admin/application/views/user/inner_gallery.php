        <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/user/source/jquery.fancybox.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/user/source/helpers/jquery.fancybox-buttons.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/user/source/helpers/jquery.fancybox-thumbs.css" />
<!-- ########################################################starting of slider part ######################################  -->  
  <!-- ########################################################starting of slider part ######################################  -->  
  <?php if($en_slider == 1){ ?>
  <div class="bannerbg">
  <div class="container flarabg">
    <div>
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
        <div class="carousel-inner racsl" role="listbox">
         
		 
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
<img src="<?= base_url();?>upload/gallery/slider/<?php echo $sl['image']; ?>" class="img-responsive racsl">
			<!--// start of the item div-->
          
<div class="carousel-caption racs">
              <h3 class="icon-container" >
              <img src="<?= base_url();?>assets/user/img/logo.png" class="img-reposive ">
            </h3>
            <h4 >
             <?php echo $sl['caption']; ?>
            </h4>
            
            <a href="<?php echo $sl['link']; ?>" target="_blank"><button class="btn btn-danger racsl" align="left">Readmore..</button></a>
          </div>
          </div> 
		   <!--end of the item div-->
          <?php } 
		   ?>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
 <?php 
 } 
 ?> 
  
 <!-- ##################end of slider part############# -->






 <!-- #####################################Starting of section######################################################################################### -->
 



  <!--welcome section-->
        <div class="container">
            <div class="photo-gallery">
        <h3> Our Photo Gallery</h3>
             
			  <div class="row">
                    <ul>

<?php
if(count($gallery)!==0){
	$gal_count  = count($gallery);
	$g_c = 0;
	foreach($gallery as $gal){
		$g_c = $g_c+1;
?>
   <div class="col-xs-6 col-md-3 glry">
 
 
 
 <a class="fancybox" rel="gallery1" href="<?= base_url();?>upload/product/<?php echo $gal['image']; ?>" title="Sparsh Hospital" class="thumbnail">
	<img src="<?= base_url();?>upload/product/<?php echo $gal['image']; ?>" alt="" class="img-responsive glry" />
             <h5></h5>
</a>
     
     
  </div>
                  
<?php	
}}else{
?>
 <h3> No Image found in this Album</h3>

<?php }?>

                </div>
            </div>
            </div>
        
        <!----------------------Products----------------------->

<!--

		<?php echo $Products_data; ?>

        <div class="testimonial-racsl">
            <div class="container">
                            <h3>WHAT PEOPLE SAY ABOUT US</h3>
        <div id="tcb-testimonial-carousel" class="carousel slide" data-ride="carousel">
            <?php echo $testimonial; ?>
            <a class="left carousel-control" href="#tcb-testimonial-carousel" data-slide="prev"> <span class="glyphicon glyphicon-circle-arrow-left"></span> </a>
            <a class="right carousel-control" href="#tcb-testimonial-carousel" data-slide="next"> <span class="glyphicon glyphicon-circle-arrow-right"></span> </a>
        </div>  
    </div>
        </div>      -->
        
       

        
        <script type="text/javascript" src="<?= base_url();?>assets/user/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="<?= base_url();?>assets/user/source/helpers/jquery.fancybox-thumbs.js"></script>
<script type="text/javascript" src="<?= base_url();?>assets/user/source/helpers/jquery.fancybox-buttons.js"></script>
<script type="text/javascript" src="<?= base_url();?>assets/user/source/helpers/jquery.fancybox-media.js"></script>
<script type="text/javascript" src="<?= base_url();?>assets/user/source/jquery.fancybox.pack.js"></script>
 <script>
    $(document).ready(function() {
  $(".fancybox").fancybox({
    openEffect  : 'none',
    closeEffect : 'none'
  });
});
</script>
<script>
    // clients js//
    (function($) {
        $.fn.textWidth = function(){
            return $(this).width();
        };

        $.fn.marquee = function(args) {
            var that = $(this);
            var $textWidth = that.textWidth(),
                offset = that.width(),
                width = offset,
                css = {
                    'text-indent' : that.css('text-indent'),
                    'overflow' : that.css('overflow'), 
                    'white-space' : that.css('white-space')
                },
                marqueeCss = {
                    'text-indent' : width,
                    'overflow' : 'hidden',
                    'white-space' : 'nowrap'
                },
                args = $.extend(true, { count: -1, speed: 1e1, leftToRight: true }, args),
                i = 0,
                stop = $textWidth*-1,
                dfd = $.Deferred();
            function go() {
                if (that.data('isStopped') != 1)
                {
                if(!that.length) return dfd.reject();
                if(width == stop) {
                    i++;
                    if(i == args.count) {
                        that.css(css);
                        return dfd.resolve();
                    }
                    if(args.leftToRight) {
                        width = $textWidth*-1;
                    } else {
                        width = offset;
                    }
                }
                that.css('text-indent', width + 'px');
                if(args.leftToRight) {
                    width++;
                } else {
                    width--;
                }
            }
                
                setTimeout(go, 20);
            };
            if(args.leftToRight) {
                width = $textWidth*-1;
                width++;
                stop = offset;
            } else {
                width--;            
            }
            that.css(marqueeCss);
            that.data('isStopped', 0);
            that.bind('mouseover', function() { $(this).data('isStopped', 1); }).bind('mouseout', function() { $(this).data('isStopped', 0); });
            go();
            return dfd.promise();
        };        
    })(jQuery);
        $('h1').marquee();
        $('#ticker').marquee();
</script>
    <script>
        //our doctors js//
    (function(){
  // caursel
  $('#carousel123').carousel({ interval: 2000 });
  $('#carouselABC').carousel({ interval: 2600 });
}());

(function(){
  $('.carousel-showmanymoveone .item').each(function(){
    var itemToClone = $(this);

    for (var i=1;i<4;i++) {
      itemToClone = itemToClone.next();

      // wrap around if at end of item collection
      if (!itemToClone.length) {
        itemToClone = $(this).siblings(':first');
      }

      // grab item, clone, add marker class, add to collection
      itemToClone.children(':first-child').clone()
        .addClass("cloneditem-"+(i))
        .appendTo($(this));
    }
  });
}());
    </script>
        <script type="text/javascript"> 
            // announcement js//
    $(function () {
    
    $(".demo2").bootstrapNews({
            newsPerPage: 4,
            autoplay: true,
      pauseOnHover: true,
      navigation: false,
            direction: 'down',
            newsTickerInterval: 2500,
            onToDo: function () {
                //console.log(this);
            }
        });
    });
</script>
   <script>
$(document).ready(function(){
    // Activate Carousel
    $("#carousel-example-generic").carousel();
    
    // Enable Carousel Indicators
    $(".item1").click(function(){
        $("#carousel-example-generic").carousel(0);
    });
    $(".item2").click(function(){
        $("#carousel-example-generic").carousel(1);
    });
    $(".item3").click(function(){
        $("#carousel-example-generic").carousel(2);
    });
    $(".item4").click(function(){
        $("#carousel-example-generic").carousel(3);
    });
    
    // Enable Carousel Controls
    $(".left").click(function(){
        $("#carousel-example-generic").carousel("prev");
    });
    $(".right").click(function(){
        $("#carousel-example-generic").carousel("next");
    });
});
</script>


  