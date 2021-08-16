


<div class="main">
  
  <div class="main-inner">

      <div class="container">
        <div class="row">
          
          <div class="span6">         
            
            <div class="widget ">
              
              <div class="widget-header">
                <i class="icon-user"></i>
                <h3><?php echo lang('change_password_heading');?></h3>
                                        <?php if ($this->ion_auth->is_admin()) {  ?>
                                        <a href="<?php echo site_url('admin/auth')?>" class="btn btn-success pull-right"> View user </a>   
            <?php }?>
            </div> <!-- /widget-header -->
          
             <div class="widget-content">
      

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("admin/auth/change_password");?>

      <p>
            <?php echo lang('change_password_old_password_label', 'old_password');?> 
            <?php echo form_input($old_password);?>
      </p>

      <p>
            <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label> 
            <?php echo form_input($new_password);?>
      </p>

      <p>
            <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?>
            <?php echo form_input($new_password_confirm);?>
      </p>

      <?php echo form_input($user_id);?>
      <p><?php echo form_submit('submit', lang('change_password_submit_btn'));?></p>

<?php echo form_close();?>


          </div> <!-- /container -->
          
      </div> <!-- /main-inner -->
    
</div> <!-- /main -->
     </div> <!-- /container -->
          
      </div> <!-- /main-inner -->
    
</div> </div> 