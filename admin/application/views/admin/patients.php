 <link href="https://themesbrand.com/skote/layouts/horizontal/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
 
 <link href="https://themesbrand.com/skote/layouts/horizontal/assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" /> 
 <link href="https://www.jqueryscript.net/demo/Material-Time-Picker-Plugin-jQuery-MDTimePicker/mdtimepicker.css" rel="stylesheet" type="text/css">
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
									<h4 class="card-title"><i class="fe fe-users"></i> Patient Listing <?php if(!empty($doctor_name))echo '('.$doctor_name.')';?></h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
									  <table class="table mb-0" id="datalist">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Total Booking</th>
                                        </tr>
                                    </thead>
                                    <tbody id="sort_slider">
                                        <?php if(!empty($datas)) { 
                                            $i = 0;
                                            foreach ($datas as $data)
                                            {
                                                $data = (object) $data;
                                                $i++;?>
                                                <tr class="odd gradeX" id="slider_<?php echo $data->id; ?>">
                                                    <td><?php echo $i;?></td>
                                                    <td><?php echo $data->name; ?></td>
                                                    <td><?php echo $data->email; ?></td>
                                                    <td><?php echo $data->mobile; ?></td>
                                                    <td>
                                                        <?php 
                                                        $cond = array('user_id'=>$data->id);
                                                        if(!empty($doctor_id))
                                                            $cond += array('doctor_id'=>$doctor_id);
                                                        echo $booking_count = $this->db->get_where('appointment_booking',$cond)->num_rows();
                                                        if($booking_count > 0)
                                                        {?>
                                                            &nbsp;<a href="<?php echo base_url('bookings/list/'.$data->id.'/'.$doctor_id);?>"><i class="fa fa-eye"></i></a>
                                                        <?php }?>
                                                    </td>
                                                </tr>
                                        <?php }}?>
                                    </tbody>
                                </table>
									</div>
								</div>
							</div>
						</div>
		
					</div>
				
				
				
				</div>			
			</div>