<div class="page-wrapper" style="min-height: 511px;">
                <div class="content container-fluid">
<div class="row">
        <!-- Main content -->
        <section class="content" style="width:100%;">
        <?php if($message){?>
            <div class="alert alert-success"><?php echo $message;?></div>
          <?php } ?>
          <!-- Default box -->
          <div class="col-md-6">
          <div class="box box-primary">
                <h3 class="box-title">Profile</h3>
                                        
                                
                                        
                      <?php if ($this->ion_auth->is_admin()) {  ?>
                  <!--<a href="<?php echo site_url('admin/auth')?>" class="badge bg-blue pull-right"> View user </a>   -->
            <?php }?>  
          

<p><?php //echo lang('create_user_subheading');?></p>



<?php echo form_open(uri_string());?>
<div class="box-body">
            
    <div class="form-group">
            <?php echo lang('create_user_fname_label', 'first_name');?> 
            <?php echo form_input($first_name);?>
      </div>

     <div class="form-group">
            <?php echo lang('create_user_lname_label', 'last_name');?> 
            <?php echo form_input($last_name);?>
      </div>
      

      <div class="form-group">
            <label for="email">Email:</label>
            <?php echo form_input($email);?>
      </div>

     
     <div class="form-group">
            <?php echo lang('create_user_phone_label', 'phone');?> 
            <?php echo form_input($phone);?>
      </div>

      <div class="form-group">
            <?php echo lang('create_user_password_label', 'password');?> 
            <?php echo form_input($password);?>
      </div>

      <div class="form-group">
            <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> 
            <?php echo form_input($password_confirm);?>
      </div>


                  
                  <div class="checkbox icheck" style="display:none;">
  <?php if ($this->ion_auth->is_admin()): ?>

          <h3><?php echo lang('edit_user_groups_heading');?></h3>
          <?php foreach ($groups as $group):?>
              <label class="checkbox">
              <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                      break;
                      }
                  }
              ?>
              </br>
              <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
              <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
              </label>
          <?php endforeach?>

      <?php endif ?>
      </div>
       <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>
      <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
<?php echo form_close();?>

    </div>
          </div><!-- /.box -->
</div>
        </section><!-- /.content -->
        </div>
      </div><!-- /.content-wrapper -->

 <script src="<?php echo base_url()?>assets/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
