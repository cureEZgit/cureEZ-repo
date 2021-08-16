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
    <?php $s++; } }else{  ?> <center><h2>No event Created in your Select date </h2><br><a class="btn btn-xs btn-success" href="<?php echo site_url('admin/events/add_event'); ?>" >New Events</a></center> <?php  }  ?>
              </div>