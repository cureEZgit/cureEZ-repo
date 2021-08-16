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
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-primary border-primary">
											<i class="fe fe-users"></i>
										</span>
										<div class="dash-count">
											<h3><?php echo $doctor_cnt;?></h3>
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
						</div>
						<div class="col-xl-4 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-success">
											<i class="fe fe-credit-card"></i>
										</span>
										<div class="dash-count">
											<h3><?php echo $patient_cnt;?></h3>
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
						</div>
						<div class="col-xl-4 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-danger border-danger">
											<i class="fe fe-money"></i>
										</span>
										<div class="dash-count">
											<h3><?php echo $appointment_cnt;?></h3>
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
						<div class="col-md-12 col-lg-12">
						
							<!-- Sales Chart -->
							<?php 
							if(!empty($appointments)) 
							{?> 
    							<div class="card card-chart">
    								<div class="card-header">
    									<h4 class="card-title">Today Bookings <?php if(!empty($appointments))echo '(#'.count($appointments).')';?></h4>
    								</div>
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
                                                                    echo '<span class="btn btn-sm bg-default">'.$appointment['status'];
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
							<!-- /Sales Chart -->
							
						</div>
					</div>
					
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->