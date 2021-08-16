<style>
    span.text-red {
    color: red;
}
#center {
  text-align: center;
}
.fa-star {
  font-size: 50px;
}
.checked {
  color: orange;
}
</style>
<div class="page-wrapper" style="min-height: 511px;">
                <div class="content container-fluid">
	
					
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header bg-grey">
									<h4 class="card-title"><i class="fa fa-medkit custom"></i> Booking List 
									    <?php if(!empty($doctor_name) || !empty($patient_name))
									    {
									        echo '<div style="float:right; font-size:16px;">';
									        if(!empty($patient_name)) echo '<strong>Patient:</strong> '.$patient_name;
									        if(!empty($doctor_name)) echo '<br><strong>Doctor:</strong> '.$doctor_name;
									        echo '</div>';
									    }?>
									</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
									    <table class="table mb-0" id="datalist">
                                                <thead>
                                                    <tr>
                                                    <th>Booking Date</th>
                                                    <?php if(empty($patient_name))
                                                    {?>
                                                        <th>Patient</th>
                                                    <?php }?>
                                                    <?php if(empty($doctor_name))
                                                    {?>
                                                        <th>Doctor</th>
                                                    <?php }?>
                                                    <th>Booking type</th>
                                                    <th>Time Slot</th>
                                                    <th>Speciality</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody id="sort_slider">
                                                <?php 
                                                if(!empty($datas))
                                                {
                                                    foreach ($datas as $appointment)
                                                    { ?>
                                                        <tr class="odd gradeX">
                                                            <td><?php echo date('d-m-Y', strtotime($appointment['booking_date']));?></td>
                                                            <?php if(empty($patient_name))
                                                            {?>
                                                                <td><?php echo $appointment['patient_name']; ?></td>
                                                            <?php }?>
                                                            <?php if(empty($doctor_name))
                                                            {?>
                                                                <td><?php echo $appointment['doctor_name']; ?></td>
                                                            <?php }?>
                                                            <td><?php echo ucfirst($appointment['type_id']); ?></td>
                                                            <td><?php echo $appointment['start_time_slot']." - ".$appointment['end_time_slot']; ?></td>
                                                            <td><?php echo $appointment['speciality']; ?></td>
                                                            <td class="status">
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
                                                <?php }
                                                }?>
                                                </tbody>
                                            </table>
									</div>
								</div>
							</div>
						</div>
		
					</div>
				
				
				
				</div>			
			</div>