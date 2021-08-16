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
table.search_table {
    margin-bottom: 20px;
}
table.search_table tbody tr td {
    margin-right: 10px;
}
.table  mb-0 td, .table th {
    padding: .75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
    width: 40px;
}

@media(max-width: 480px){
   .table {
    display: block;
    width: 100%;
    overflow-x: auto;
} 
}


.table thead tr th, .table tr td:nth-child(4n){width:200px;}

</style>
<div class="page-wrapper" style="min-height: 511px;">
                <div class="content container-fluid">
	
					
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header bg-grey">
									<h4 class="card-title"><i class="fa fa-medkit custom"></i> Report
									<a class="btn btn-sm bg-success-light" href="javascript:void(0);" style="float:right;" onclick="downloadReport();">Excel <i class="fa fa-download"></i></a>
									</h4>
								</div>
								<div class="card-body">
									<div class="table">
									    <form method="post" action="<?php echo current_url();?>" id="reportSearchForm">
									        <input type="hidden" name="export_type" value="" id="export_type">
    									    <table class="search_table">
    									        <tr>
    									            <td>From Date:</td>
    									            <td><input type="date" class="form-control" name="from_date" id="from_date" value="<?php echo $from_date;?>"></td>
    									            <td>To Date: </td>
    									            <td><input type="date" class="form-control" name="to_date" id="to_date" value="<?php echo $to_date;?>"></td>
    									            <td><input type="submit" value="Search" class="btn btn-primary"></td>
    									        </tr>
    									    </table>
									    </form>
									    <table class="table  mb-0" id="datalist4" >
                                                <thead>
                                                    <tr>
                                                        <th width="10%">Doctor ID</th>
                                                        <th width="20%">Doctor Name</th>
                                                        <th width="10%">City</th>
                                                        <th width="10%">Address</th>
                                                        <!--<th>State</th>-->
                                                        <!--<th>City/District/Town</th>-->
                                                        <!--<th>Pincode</th>-->
                                                        
                                                        <!--<th>Patient ID</th>-->
                                                        <th width="20%">Patient Name</th>
                                                        <!--<th>State</th>-->
                                                        <!--<th>City/District/Town</th>-->
                                                        <!--<th>Pincode</th>-->
                                                        <th width="10%">Booked Date</th>
                                                        <th width="10%">Amount Received</th>
                                                        <th width="10%">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                if(!empty($datas))
                                                {
                                                    foreach ($datas as $appointment)
                                                    { ?>
                                                        <tr>
                                                            <td><?php echo $appointment['uniq_id']; ?></td>
                                                            <td><?php echo $appointment['doctor_name']; ?></td>
                                                            <td><?php echo $appointment['dr_city']; ?></td>
                                                            <td><?php echo nl2br($appointment['dr_address']); ?></td>
                                                            <td><?php echo $appointment['patient_name']; ?></td>
                                                            <td>
                                                                <?php if(!empty($appointment['booking_date']))echo date('d-m-Y', strtotime($appointment['booking_date']));else echo '-';?>
                                                            </td>
                                                            <td><?php if(!empty($appointment['amount'])) echo $appointment['amount']; else echo '-';?></td>
                                                            <td class="status">
                                                                <?php if($appointment['status'] == 'Pending')
                                                                    echo '<span class="btn btn-sm bg-primary">'.$appointment['status'];
                                                                if($appointment['status'] == 'Cancelled')
                                                                    echo '<span class="btn btn-sm bg-danger">'.$appointment['status'];
                                                                if($appointment['status'] == 'Completed')
                                                                    echo '<span class="btn btn-sm bg-success">'.$appointment['status'];
                                                                if($appointment['status'] == 'Accepted')
                                                                    echo '<span class="btn btn-sm bg-warning">'.$appointment['status'];
                                                                else echo '-';?>
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