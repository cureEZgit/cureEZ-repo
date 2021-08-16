    
  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>All Users </h1>
         
        </section>

        <!-- Main content -->
        <section class="content">
    
            
          <!--<div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>  <i class="icon fa fa-check"></i> Message!</h4>
                   
                  </div>-->


          <!-- Default box -->
          <div class="">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">   </h3>
             
            </div>
           
			<table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Sl No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th> Type of user</th>
                                         <th>status</th>
                                         <th>Action</th>
                                     
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $s=1; foreach ($all_user as $ed){?>
                                    <tr>
                                        <td><?php echo $s++; ?></td>
                                        <td><?php echo $ed['first_name']." ".$ed['last_name'] ; ?></td>
                                        <td><?php echo $ed['email'] ; ?></td>
                                        <td><?php echo $ed['user_type'] ; ?></td>
                                       <td><?php if($ed['user_status']==0){?><a class="anc-fun badge bg-yellow" onclick=approve_user('<?php echo $ed['id']; ?>') > Approve</a><?php }else{ ?>
                                       <?php 
                                        $users_data = $this->userdetails_model->approve_data($ed['id']);
                                       ?>
                                       <i class="badge bg-green"> Approved by <?php echo $users_data['first_name'].' '.$users_data['last_name'];?></i><?php } ?></td>
                                      <td><a class="anc-fun fa fa-edit badge bg-red" onclick=get_user('<?php echo $ed['id']; ?>') data-toggle="modal" data-target="#myModal" >View Detail</a></td>
                                        
                                      
                                    </tr>
                              <?php }?>
                                </tbody>

                            </table>	
<div id="answer"></div>
<div class="box-footer clearfix">
						<?php echo $page; ?>
            </div>

					  </div><!-- /.box -->
</div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<script>
function approve_user(id){
 
  $.post('<?php echo site_url('admin/user_panel/approve_user'); ?>',{id:id} ,function(msg){

     if(msg==1){
      location.reload();
    }else{
     alert('Something Error , please try again.')
    }

  });


}

function get_user(id){
 
  $.post('<?php echo site_url('admin/user_panel/get_user'); ?>',{id:id} ,function(msg){

     if(msg!=""){
       $('#user').html(msg);
    }else{
     alert('Something Error , please try again.')
    }

  });


}


</script>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 71%;top: 22px;left:7%;" >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Answer</h4>
      </div>
      <div class="modal-body">
       <div id="user" >
        <div class="progress progress-sm active">
                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                  
                </div>
              </div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>    
