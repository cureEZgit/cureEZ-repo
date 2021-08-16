<style>
#sortme li
{
  margin: 10px 0;
  padding: 5px;
}
</style>
  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $heading; ?>
            <a class="btn bg-purple btn-flat pull-right" href="<?php echo site_url('admin/banner/manageBanners/')?>" ><i class="fa fa-mail-reply"></i></a>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
        <?php if($this->session->flashdata('message')){?>

					<div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Message!</h4>
                    <?php echo $this->session->flashdata('message');?>
                  </div>


          <?php } ?>
          <!-- Default box -->

          <div class="box" style="padding-bottom:5px;">
            <div class="box-header with-border">
              <h3 class="box-title" style="float:left;"><?php echo $subHeading; ?></h3>
              <div  id="savestat" style="width: 50%;text-align: right;float: left;"></div>
              <button id="save" class="btn btn-primary" style="float:right;">SAVE</button>
            </div>
            <ul id="sortme" style="list-style-type: none;">
              <?php
              foreach ($catlist as $cat):?>

                <li class="ui-state-default" id="advs_<?php echo $cat->id ?>">
                  <?php if($cat->image_name != '')
                  {?>
                    <img src="<?php echo base_url().'images/banners/thumb/'.$cat->image_name;?>" width="50">
                  <?php }?>
                  <?php echo $cat->name; ?>
                </li>

            	<?php endforeach;?>
            </ul>


          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
      <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
      <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
      <script>
      $(document).ready(function() {

          $("#sortme").sortable();
          var serial = $('#sortme').sortable('serialize');
          if(serial=="")
          {
            $j("#save").attr('disabled','disabled');
          }
          else {
            $("#save").attr('eanbled','enabled');
          }
          $("#save").click(function()
          {
            serial = $('#sortme').sortable('serialize');
            var url = "<?php echo site_url('admin/banner/save_banner_order'); ?>";
            $.ajax({
              url: url,
              type: "post",
              data: serial,
              error: function(){
              $('#savestat').css("color", "red");
              $('#savestat').text("Error occured while saving, please retry!");
              },
              success: function(){
                 $('#savestat').css("color", "green");
                 $('#savestat').text("Sorting order changed successfully!!");
              }
            });
          });

      });
      </script>
