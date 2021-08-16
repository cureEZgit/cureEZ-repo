


<div class="">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            User Profile
          </h1>
       
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="<?php if($user['user_image']!=""){ ?><?php echo base_url()?>images/profile_pic/<?php echo $user['user_image']; }else{ ?>  <?php echo base_url()?>assets/dist/img/avatar.jpeg <?php }?>" alt="User profile picture">
                  <h3 class="profile-username text-center"><?php echo $user['first_name']." ".$user['last_name']; ?></h3>
                  <p class="text-muted text-center"><?php echo $user['occupation']; ?></p>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Date of Birth</b> <a class="pull-right"><?php echo date('d-M-Y',strtotime($user['dob'])); ?></a>
                    </li>
                  
                  </ul>
<?php if($user['user_status']==0){?><a class="anc-fun btn btn-warning btn-block" onclick=approve_user('<?php echo $user['id']; ?>') > <b>Approve</b></a><?php }else{ ?><a class="btn btn-success btn-block"> Approved </a><?php } ?>
                 
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">About Me</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                  <p class="text-muted"><?php echo $user['address']; ?></p>

                  <hr>

                  <strong><i class="fa  fa-mobile margin-r-5"></i> Phone</strong>
                  <p>
                    <?php echo $user['phone']; ?>
                  </p>

                  <hr>

                  <strong><i class="fa fa-envelope-o margin-r-5"></i> Email</strong>
                  <p><?php echo $user['email']; ?></p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                 
                  <li class="active"><a href="#timeline" data-toggle="tab">Timeline</a></li>
                  
                  <li><a href="#website" data-toggle="tab">Website</a></li>
                </ul>
                <div class="tab-content">
                  
                  <div class="active tab-pane" id="timeline">
                    <!-- The timeline -->
                    <ul class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <li class="time-label">
                       
                      </li>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-user bg-aqua"></i>
                        <div class="timeline-item">
                         
                          <h3 class="timeline-header"><a  >What are the things you are grateful for in your life ? (Mention at least 2 )</a> </h3>
                          <div class="timeline-body">
                            <?php echo $user['d1']; ?>
                          </div>
                         
                        </div>
                      
                      
                    </ul>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="website">
                    <form class="form-horizontal">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label"></label>
                        <a class="btn btn-block btn-social btn-facebook">
                    <i class="fa fa-facebook"></i>Facebook : <?php echo $user['fb_id']; ?>
                  </a>
               
                  <a class="btn btn-block btn-social btn-twitter">
                    <i class="fa fa-twitter"></i> Twitter : <?php echo $user['twit_id']; ?>
                  </a>
                
                  <a class="btn btn-block btn-social btn-linkedin">
                    <i class="fa fa-skype"></i> skypee : <?php echo $user['skp_id']; ?>
                  </a>
                
                  <a class="btn btn-block btn-social btn-google">
                    <i class="fa fa-envelope-o"></i>Email : <?php echo $user['email_id2']; ?>
                  </a>
                      </div>
                      
                      </div>
                    
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->