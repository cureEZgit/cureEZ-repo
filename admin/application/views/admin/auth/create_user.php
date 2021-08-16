      
  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            
            <?php echo lang('index_heading');?>
          </h1>
         
        </section>
<div class="row">
        <!-- Main content -->
        <section class="content">
        <?php if($message){?>
            <div class="callout callout-danger">
            <h4>Message!</h4>
            <p><?php echo $message;?></p>
          </div>
          <?php } ?>
          <!-- Default box -->
          <div class="col-md-6">
          <div class="box box-primary">
	      				<h3 class="box-title"><?php echo lang('create_user_heading');?></h3>
                                        
                                        <a href="<?php echo site_url('admin/auth')?>" class="badge bg-blue pull-right"> View user </a>   
	  			

<p><?php echo lang('create_user_subheading');?></p>



<?php echo form_open("admin/auth/create_user");?>
<div class="box-body">
            
    <div class="form-group">
            <?php echo lang('create_user_fname_label', 'first_name');?> 
            <?php echo form_input($first_name);?>
      </div>

     <div class="form-group">
            <?php echo lang('create_user_lname_label', 'last_name');?> 
            <?php echo form_input($last_name);?>
      </div>
      
      <?php
      if($identity_column!=='email') {
          echo '<p>';
          echo lang('create_user_identity_label', 'identity');
          echo '<br />';
          echo form_error('identity');
          echo form_input($identity);
          echo '</p>';
      }
      ?>

      <div class="form-group">
            <?php echo lang('create_user_company_label', 'company');?> 
            <?php echo form_input($company);?>
      </div>

      <div class="form-group">
            <?php echo lang('create_user_email_label', 'email');?> 
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

