<!-- jQuery -->
        
		
		<!-- Bootstrap Core JS -->
        <script src="<?php echo base_url();?>assets/doctor/js/popper.min.js"></script>
        <script src="<?php echo base_url();?>assets/doctor/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="<?php echo base_url();?>assets/doctor/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<script src="<?php echo base_url();?>assets/doctor/plugins/raphael/raphael.min.js"></script>    
	
		
		<!-- Custom JS -->
		<script  src="<?php echo base_url();?>assets/doctor/js/script.js"></script>
		
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
        
		<script  src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
		<script  src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    </body>
    <script>
    $(document).ready(function() {
        $('#datalist').DataTable( {
            "pageLength": 25
        });
        $('#datalist2').DataTable( {
            "pageLength": 25
        });
        
        //   $("#datalist tbody td.status").each( function ( i ) {
        //     var select = $('<select><option value=""> SELECT </option></select>')
        //         .appendTo( $(this) )
        //         .on( 'change', function () {
        //             table.column( i )
        //                 .search( $(this).val() )
        //                 .draw();
        //         } );
     
        //     table.column( i ).data().unique().sort().each( function ( d, j ) {
        //         select.append( '<option value="'+d+'">'+d+'</option>' )
        //     } );
        // } );
    } );
    function downloadReport()
    {
        $('#export_type').val(1);
        $('#reportSearchForm').submit();
    }
    </script>
<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:34 GMT -->
</html>