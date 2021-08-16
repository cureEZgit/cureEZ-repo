        <link href="<?php echo base_url(); ?>assets/gallery/css/gallery.css" rel="stylesheet" type="text/css">

 <!---------gallery------------>
<div id="resp">
    <div class="container">
        <section id="pagecontainer" class="" >
            <div   class="col-md-12 ">
                <h3 class="inner-heading"><?php echo "Photo Album"; ?></h3>
                <br>
            <div class="gallery-main">
               
                <div class="demo-gallery">
            <ul id="lightgallery" class="list-unstyled row">
                
                <?php foreach($album as $ab){ ?>
                <li class="photo-gallery" >
                    <a href="<?php echo site_url('page/photogallery/'.$ab->alias).'#lg=1&slide=0'; ?>">
                        <img class="img-responsive" src="<?php echo base_url(); ?>images/gallery/medium/<?php echo  $ab->cover_pic;  ?>" alt="Thumb-1">
                    </a>
                    <h4 class="img-title"><?php  if(strlen($ab->name) >14 ){echo substr($ab->name,0,15).'...'; }else{echo $ab->name; } ?></h4>
                </li>
                <?php } ?>
            </ul>
        </div>
                
                
               <div class="pull-right" ><?php echo $pagination;  ?><!--  <img class="ldr" style="position: relative;bottom: 40px;display: none;" src="<?php echo base_url('assets/user/images/loader.gif'); ?>">--></div>
                
            </div>
            </div>
        </section>
        </div>
</div>
<script>
   $(document).ready(function(){
        $('a.paginate').click(function (event){
            $('.ldr').show();
     event.preventDefault();
    $.ajax({
        url: $(this).attr('href')
        ,success: function(response) {
            $('.ldr').hide();
            $("html, body").animate({ scrollTop: 0 }, "slow");
            $('#resp').html(response);
        }
     })
     return false;
//alert($(this).attr('href'));
});
    });

</script>
