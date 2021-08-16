   		
  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            
            <?php echo lang('index_heading');?>
          </h1>
         
        </section>

        <!-- Main content -->
        <section class="content">
        <?php if($message){?>
            
					<div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Message!</h4>
                    <?php echo $message;?>
                  </div>


          <?php } ?>
          <!-- Default box -->
          <div class="">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo lang('index_subheading');?></h3>
              <!--<a href="<?php echo site_url('admin/auth/create_group')?>" class="btn btn-info btn-sm pull-right">Create Group</a>-->
                                        <a href="<?php echo site_url('admin/auth/create_user')?>" class="btn btn-success btn-sm pull-right">Create User</a>
            </div>
          <table class="table table-bordered table-hover table-striped ">
	<tr>
		<th><?php echo lang('index_fname_th');?></th>
		<th><?php echo lang('index_lname_th');?></th>
		<th><?php echo lang('index_email_th');?></th>
		<th><?php echo lang('index_groups_th');?></th>
		<!--<th><?php echo lang('index_status_th');?></th>-->
		<th><?php echo lang('index_action_th');?></th>
	</tr>
	<?php foreach ($users as $user):?>
		<tr>
            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
			<td>
				<?php foreach ($user->groups as $group):?>
					<?php echo htmlspecialchars($group->name,ENT_QUOTES,'UTF-8');?><br />
                <?php endforeach?>
			</td>
			<!--<td><?php echo ($user->active) ? anchor("admin/auth/deactivate/".$user->id, lang('index_active_link')) : anchor("admin/auth/activate/". $user->id, lang('index_inactive_link'));?></td>-->
			<td><a class="badge bg-blue" href="<?php echo site_url('admin/auth/edit_user').'/'.$user->id;?>" > Edit </a></td>
		</tr>
	<?php endforeach;?>
</table>
            
          </div><!-- /.box -->
</div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
