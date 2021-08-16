<div class="content-wrapper">
               
              <section class="content-header">
          <h1>Events Calendar</h1><br>
                                   
        </section>
        <section class="content">

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $(function(){
    $( "#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        onSelect: function(date) {
           $('#events_dat').html('<center><h3>Loading...</h3></center>');
       $.post('<?php echo site_url('admin/events/get_date_event'); ?>',{selectdate:date},function(resp,sts){
     
           $('#events_dat').html(resp);
           
       }); 
    }    
    });
  });
  </script>
<div class="col-md-3">
<div id="datepicker"></div> 
            </div>
            <div class="col-md-9">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Events Data</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="events_dat">
                
<div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <?php if(!empty($events)){ $s =1;  foreach($events as $ev){ ?>
                <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $s; ?>" >
                       <?php echo $s.') '.  $ev['title']; ?>
                      </a>
                    </h4>
                  </div>
                  <div id="collapse<?php echo $s; ?>" class="panel-collapse collapse <?php echo ($s == 1)? 'in' : ''; ?>" aria-expanded="<?php echo ($s == 1)? 'true' : 'false'; ?>" >
                    <div class="box-body">
                     <?php echo $ev['description']; ?>
                    </div>
                  </div>
                </div>
                  <?php $s++; } }else{  ?>
    <center><h2>No event Created in your Select date </h2><br><a class="btn btn-xs btn-success" href="<?php echo site_url('admin/events/add_event'); ?>" >New Events</a></center> 
                    <?php  }  ?>
              </div>
                
              </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
            
    </section>
</div>


<script>

$('.ui-state-default').click(function(){

    alert('dshjfgs');
    
});

</script>