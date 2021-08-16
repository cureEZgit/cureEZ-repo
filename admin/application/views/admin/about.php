<style>
    h3.htext{
        color:#333;
    }
    
    .main-card:hover {
    box-shadow: 0 3px 6px rgb(0 0 0 / 16%), 0 3px 6px rgb(0 0 0 / 23%);
    transition: 0.3s;
}
    
    
    
</style>
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Welcome Admin!</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Dashboard</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="row">
						<div class="col-xl-4 col-sm-6 col-12">
						    <a href="<?php echo base_url('admin/doctor');?>">
    							<div class="card main-card">
    								<div class="card-body">
    									<div class="dash-widget-header">
    										<span class="dash-widget-icon text-primary border-primary">
    											<i class="fa fa-user-md"></i>
    										</span>
    										<div class="dash-count">
    											<h3 class="htext"><?php echo $doctor_cnt;?></h3>
    										</div>
    									</div>
    									<div class="dash-widget-info">
    										<h6 class="text-muted">Doctors</h6>
    										<div class="progress progress-sm">
    											<div class="progress-bar bg-primary w-50"></div>
    										</div>
    									</div>
    								</div>
    							</div>
							</a>
						</div>
						<div class="col-xl-4 col-sm-6 col-12">
						    <a href="<?php echo base_url('admin/patients');?>">
    							<div class="card main-card">
    								<div class="card-body">
    									<div class="dash-widget-header">
    										<span class="dash-widget-icon text-success">
    											<i class="fe fe-users"></i>
    										</span>
    										<div class="dash-count">
    											<h3 class="htext"><?php echo $patient_cnt;?></h3>
    										</div>
    									</div>
    									<div class="dash-widget-info">
    										
    										<h6 class="text-muted">Patients</h6>
    										<div class="progress progress-sm">
    											<div class="progress-bar bg-success w-50"></div>
    										</div>
    									</div>
    								</div>
    							</div>
							</a>
						</div>
						<div class="col-xl-4 col-sm-6 col-12">
						    <a href="<?php echo base_url('bookings/list');?>">
    							<div class="card main-card">
    								<div class="card-body">
    									<div class="dash-widget-header">
    										<span class="dash-widget-icon text-danger border-danger">
    											<!--<i class="fe fe-money"></i>-->
    										<i class="fa fa-calendar-check-o" aria-hidden="true"></i>
    										</span>
    										<div class="dash-count">
    											<h3 class="htext"><?php echo $appointment_cnt;?></h3>
    										</div>
    									</div>
    									<div class="dash-widget-info">
    										
    										<h6 class="text-muted">Appointment</h6>
    										<div class="progress progress-sm">
    											<div class="progress-bar bg-danger w-50"></div>
    										</div>
    									</div>
    								</div>
    							</div>
							</a>
						</div>
						<!--<div class="col-xl-3 col-sm-6 col-12">-->
						<!--	<div class="card">-->
						<!--		<div class="card-body">-->
						<!--			<div class="dash-widget-header">-->
						<!--				<span class="dash-widget-icon text-warning border-warning">-->
						<!--					<i class="fe fe-folder"></i>-->
						<!--				</span>-->
						<!--				<div class="dash-count">-->
						<!--					<h3>$62523</h3>-->
						<!--				</div>-->
						<!--			</div>-->
						<!--			<div class="dash-widget-info">-->
										
						<!--				<h6 class="text-muted">Revenue</h6>-->
						<!--				<div class="progress progress-sm">-->
						<!--					<div class="progress-bar bg-warning w-50"></div>-->
						<!--				</div>-->
						<!--			</div>-->
						<!--		</div>-->
						<!--	</div>-->
						<!--</div>-->
					</div>
					<div class="row">
					    
					    
					    <div class="col-md-12">
                          <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#today_booking" id="today_booking_link">Today Bookings (#<?php echo count($appointments);?>)</a></li>
                            <?php if(!empty($adv_appointments)){?>
                            <li><a data-toggle="tab" id="adv-book" href="#adv_booking">Advance Bookings (#<?php echo count($adv_appointments);?>)</a></li>
                            <?php }?>
                          </ul>
                        
                          <div class="tab-content">
                            <div id="today_booking" class="tab-pane fade in active">
                              <?php 
    							if(!empty($appointments)) 
    							{?> 
        							<div class="card card-chart">
        								<div class="card-body">
        									<div class="table-responsive">
                                                <table class="table mb-0" id="datalist">
                                                    <thead>
                                                        <tr>
                                                        <th>Booking Date</th>
                                                        <th>Patient</th>
                                                        <th>Doctor</th>
                                                        <th>Booking type</th>
                                                        <th>Time Slot</th>
                                                        <th>Speciality</th>
                                                        <th>Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="sort_slider">
                                                    <?php foreach ($appointments as $appointment){
                                                    ?>
                                                        <tr class="odd gradeX">
                                                            <td><?php echo date('d-m-Y', strtotime($appointment['booking_date']));?></td>
                                                            <td><?php echo $appointment['patient_name']; ?></td>
                                                            <td><?php echo $appointment['doctor_name']; ?></td>
                                                            <td><?php echo ucfirst($appointment['type_id']); ?></td>
                                                            <td><?php echo $appointment['start_time_slot']." - ".$appointment['end_time_slot']; ?></td>
                                                            <td><?php echo $appointment['speciality']; ?></td>
                                                            <td>
                                                                <?php if($appointment['status'] == 'Pending')
                                                                        echo '<span class="btn btn-sm bg-primary">'.$appointment['status'];
                                                                    if($appointment['status'] == 'Cancelled')
                                                                        echo '<span class="btn btn-sm bg-danger">'.$appointment['status'];
                                                                    if($appointment['status'] == 'Completed')
                                                                        echo '<span class="btn btn-sm bg-success">'.$appointment['status'];
                                                                    if($appointment['status'] == 'Accepted')
                                                                        echo '<span class="btn btn-sm bg-warning">'.$appointment['status'];?>
                                                            </td>
                                                        </tr>
                                                    <?php }?>
                                                    </tbody>
                                                </table>
        									</div>
        								</div>
        							</div>
    							<?php }?>
                            </div>
                            <div id="adv_booking" class="tab-pane fade">
                              <?php 
    							if(!empty($adv_appointments)) 
    							{?> 
        							<div class="card card-chart">
        								<div class="card-body">
        									<div class="table-responsive">
                                                <table class="table mb-0" id="datalist">
                                                    <thead>
                                                        <tr>
                                                        <th>Booking Date</th>
                                                        <th>Patient</th>
                                                        <th>Doctor</th>
                                                        <th>Booking type</th>
                                                        <th>Time Slot</th>
                                                        <th>Speciality</th>
                                                        <th>Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="sort_slider">
                                                    <?php foreach ($adv_appointments as $adv_appointment){
                                                    ?>
                                                        <tr class="odd gradeX">
                                                            <td><?php echo date('d-m-Y', strtotime($adv_appointment['booking_date']));?></td>
                                                            <td><?php echo $adv_appointment['patient_name']; ?></td>
                                                            <td><?php echo $adv_appointment['doctor_name']; ?></td>
                                                            <td><?php echo ucfirst($adv_appointment['type_id']); ?></td>
                                                            <td><?php echo $adv_appointment['start_time_slot']." - ".$adv_appointment['end_time_slot']; ?></td>
                                                            <td><?php echo $adv_appointment['speciality']; ?></td>
                                                            <td>
                                                                <?php if($adv_appointment['status'] == 'Pending')
                                                                        echo '<span class="btn btn-sm bg-primary">'.$adv_appointment['status'];
                                                                    if($adv_appointment['status'] == 'Cancelled')
                                                                        echo '<span class="btn btn-sm bg-danger">'.$adv_appointment['status'];
                                                                    if($adv_appointment['status'] == 'Completed')
                                                                        echo '<span class="btn btn-sm bg-success">'.$adv_appointment['status'];
                                                                    if($adv_appointment['status'] == 'Accepted')
                                                                        echo '<span class="btn btn-sm bg-warning">'.$adv_appointment['status'];?>
                                                            </td>
                                                        </tr>
                                                    <?php }?>
                                                    </tbody>
                                                </table>
        									</div>
        								</div>
        							</div>
    							<?php }?>
                            </div>
                          </div>
                        </div>
					</div>
					
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		<script>
		$(function() {
            $('#today_booking_link').click();
        });
		</script>