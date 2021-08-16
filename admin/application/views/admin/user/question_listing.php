

  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>all Question </h1>
         
        </section>

        <!-- Main content -->
        <section class="content">
    
            
          <!--<div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>  <i class="icon fa fa-check"></i> Message!</h4>
                   
                  </div>-->


          <!-- Default box -->
          <div class="">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">   </h3>
             
            </div>
      <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Sl No.</th>
                                        <th>Subscriber Name</th>
                                        <th>Question</th>
                                        <th>Status</th>
                                      
                                        <th>Action</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $s=1; foreach ($question as $ed){?>
                                    <tr>
                                        <td><?php echo $s++; ?></td>
                                        <td><?php echo $ed['first_name']." ".$ed['last_name'] ; ?></td>
                                        <td><?php echo $ed['question'] ; ?></td>
                                        <td><?php if($ed['status']==0){ ?><a class = "anc-fun badge bg-yellow"  onclick="question_satatus(<?php echo $ed['id']; ?>)" > Approve </a><?php }else{?><i class="badge bg-green"> Approved </i><?php } ?></td>
                                        <td><a class = "anc-fun badge bg-green"   onclick="get_answer(<?php echo $ed['id']; ?>)" data-toggle="modal" data-target="#myModal" >View answer</a></td>
                                    </tr>
                              <?php }?>
                                </tbody>

                            </table>  

<div class="box-footer clearfix">
            <?php echo $pagination; ?>
            </div>

            </div><!-- /.box -->
</div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

   <!-- Modal -->

      

<script>
function question_satatus(id){
  if(id==0){
    
  }else{
    alert('yes');
  }
}

function get_answer(id){
 $.post('<?php echo site_url('admin/user_panel/get_answer')?>',{id:id},function(msg){

     $('#answer').html(msg);
    });
}


function question_satatus(id){

if(confirm("Are you sure to approve this question!")){
$.post('<?php echo site_url('admin/user_panel/approve_question')?>',{id:id},function(msg){

     location.reload();
    });
}
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
       <div id="answer" >
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

