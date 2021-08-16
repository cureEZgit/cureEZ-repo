        <!-- MENU SECTION -->
	<div id="left" >
            <div class="media user-media well-small">
                <br />
                <div class="media-body">
                    <h5 class="media-heading"> <?php echo $this->session->userdata('username'); ?></h5>
                    <ul class="list-unstyled user-info">
                        <li>
                             <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online
                        </li>
                    </ul>
                </div>
                <br />
            </div>
            <ul id="menu" class="collapse">
                <li class="panel active">
                    <a href="<?= site_url('admin/admin/index') ?>" >
                        <i class="icon-table"></i> Dashboard
                    </a>                   
                </li>
<?php
	if ($this->ion_auth->is_admin()){					
								 ?>
                <li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav">
                        <i class="icon-tasks"> </i> Settings     
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                       &nbsp; <span class="label label-default">3</span>&nbsp;
                    </a>
                    <ul class="collapse" id="component-nav">
                        <li class=""><a href="<?= site_url('admin/slider/index') ?>"><i class="icon-angle-right"></i>Slider Management </a></li>
						  <li class=""><a href="<?= site_url('admin/events/index') ?>"><i class="icon-angle-right"></i>Event Management </a></li>
                      <!--   <li class=""><a href="<?= site_url('admin/configuration/index') ?>"><i class="icon-angle-right"></i> Configuration </a></li>-->
                        <li class=""><a href="<?= site_url('admin/social/index') ?>"><i class="icon-angle-right"></i>Social Media</a></li>
                    </ul>
                </li>
       <?php
	}
	?>
              

   <!--  <li class="panel ">

                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-nav2">

                        <i class="icon-pencil"></i> Gallery Management

                        <span class="pull-right">

                            <i class="icon-angle-left"></i>

                        </span>

                          &nbsp; <span class="label label-success"></span>&nbsp;

                    </a>

                    <ul class="collapse" id="form-nav2">
                  	<li class=""><a href="<?= site_url('admin/gallery/manage_gallery') ?>"><i class="icon-angle-right"></i> View Albums </a></li>
                  	<li class=""><a href="<?= site_url('admin/gallery/create_album') ?>"><i class="icon-angle-right"></i> Create Album </a></li>
                    </ul>

                </li>  -->

            <li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-nav3">
                        <i class="icon-pencil"></i> Manage Pages
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                          &nbsp; <span class="label label-success"></span>&nbsp;
                    </a>
                    <ul class="collapse" id="form-nav3">                      
                        <li class=""><a href="<?= site_url('admin/pages/index') ?>"><i class="icon-angle-right"></i> View Page </a></li>
						     <li class=""><a href="<?= site_url('admin/pages/create_page') ?>"><i class="icon-angle-right"></i> Add Page </a></li>
                    </ul>
                    
                </li>
				
				
		<!--		    <li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-nav10">
                        <i class="icon-pencil"></i> Manage Section
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                          &nbsp; <span class="label label-success"></span>&nbsp;
                    </a>
                    <ul class="collapse" id="form-nav10">                      
                        <li class=""><a href="<?= site_url('admin/section/index') ?>"><i class="icon-angle-right"></i> View Section </a></li>
						     <li class=""><a href="<?= site_url('admin/section/create_section') ?>"><i class="icon-angle-right"></i> Add Section </a></li>
                    </ul>
                    
                </li>  -->
				
				  <li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-nav">
                        <i class="icon-pencil"></i>Menu Management
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                          &nbsp; <span class="label label-success"></span>&nbsp;
                    </a>
                    <ul class="collapse" id="form-nav">
                        <li class=""><a href="<?= site_url('admin/menu/index') ?>"><i class="icon-angle-right"></i> Menu Listing</a></li>

                        <li class=""><a href="<?= site_url('admin/menu/create_menu') ?>"><i class="icon-angle-right"></i>Add Menu</a></li>
						
						<li class=""><a href="<?= site_url('admin/menu/order_menu') ?>"><i class="icon-angle-right"></i>Menu Order</a></li>
                      </ul>

                </li>
				
				
				
				
		 	    <li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-nav4">
                        <i class="icon-pencil"></i> Common Section
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                          &nbsp; <span class="label label-success"></span>&nbsp;
                    </a>
                    <ul class="collapse" id="form-nav4">                    
                    <li class=""><a href="<?= site_url('admin/common') ?>"><i class="icon-angle-right"></i> View Section</a></li>
					<li class=""><a href="<?= site_url('admin/common/create_common') ?>"><i class="icon-angle-right"></i> Add Section </a></li>
               
			        <li class=""><a href="<?= site_url('admin/product') ?>"><i class="icon-angle-right"></i> Latest Product</a></li>
			   
			        </ul>
                </li>
			<li class="panel"><a href="<?= site_url('admin/auth/change_password') ?>"><i class="icon-pencil"></i> Change Password</a></li>			
			</ul>
        </div>
        <!--END MENU SECTION -->
