
            
          <!--<div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>  <i class="icon fa fa-check"></i> Message!</h4>
                   
                  </div>-->


          <!-- Default box -->
          <div class="" id="answer2">
          <div class="box box-primary">
            <div class="box-header with-border">
              <p style="color: #3c8dbc;">Question :</p> <h3 class="box-title"> <?php echo $question['question']; ?></h3>
             
            </div>
      <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Sl No.</th>
                                        <th>Subscriber Name</th>
                                        <th>answer</th>
                                        <th>Status</th>
                                      
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $s=1; foreach ($answer as $ed){?>
                                    <tr>
                                        <td><?php echo $s++; ?></td>
                                        <td><?php echo $ed['first_name']." ".$ed['last_name'] ; ?></td>
                                        <td><?php echo $ed['answer'] ; ?></td>
                                         <td><?php if($ed['status']==0){ ?><a class = "anc-fun badge bg-yellow"  onclick="answer_satatus(<?php echo $ed['id']; ?>,<?php echo $ed['question_id']; ?>)" > Approve </a><?php }else{?><i class="badge bg-green"> Approved </i><?php } ?></td>
                                     
                                    </tr>
                              <?php }?>
                                </tbody>

                            </table>  

<div class="box-footer clearfix">

            </div>

            </div><!-- /.box -->
</div>

        
   <!-- Modal -->

      

<script>



function answer_satatus(id,q_id){

if(confirm("Are you sure to approve this answer!")){
$.post('<?php echo site_url('admin/user_panel/approve_answer')?>',{id:id},function(msg){
if(msg == 1){

$.post('<?php echo site_url('admin/user_panel/get_answer')?>',{id:q_id},function(msg2){

     $('#answer2').html(msg2);
    });
}
    });
}
}



</script>

