
<table class="table table-responsive table-bordered table-hover " id="datatable">
              <thead>
                <tr class="bg-slate-800">
                  <th class="col-md-1">SL</th>
                  <th class="col-md-1">Customer Name</th>
                  <th class="col-md-1">Customer Address</th>
                  <th class="col-md-1">Customer Mobile No.</th>
                  <th class="col-md-2">Complain Details</th>
                  <th class="col-md-2">Complain Date</th>
                  <th class="col-md-1">Solve By</th>
                  <th class="col-md-1">Solve Date</th>
                  <th class="col-md-2">Status</th>
                  <th class="col-md-1">Action</th>
                </tr>
              </thead>
              <tbody>
			  <?php $i =1; foreach ($all_com as $v) {?>
                <tr>
                  <td class="text-center"> <?php echo $i++; ?> </td>
                  <td class="text-center"><?php echo $v->customer_id; ?> </td>
                  <td class="text-center"> <?php echo $v->customer_address; ?> </td>
                  <td class="text-center"> <?php echo $v->customer_mobile; ?> </td>
                  <td class="text-center"> <?php echo $v->details; ?> </td>
                  <td class="text-center"> <?php echo $v->complain_date; ?></td>
                  <td class="text-center"> <?php echo $v->employee; ?></td>
                  <td class="text-center"> <?php echo $v->solve_date; ?></td>
                  <td class="text-center">
				  <?php if($v->status == 0){ ?>
				  <buttton class="btn-warning btn-xs">Pending</buttton>
				  <?php } else if($v->status == 1){ ?>
				  <buttton class="btn-warning btn-xs">Solved</buttton>
				  <?php } else if($v->status == 2){ ?>
				  <buttton class="btn-warning btn-xs">Reviewed</buttton>
				   <?php } else if($v->status == 3){ ?>
				  <buttton class="btn-warning btn-xs">Not Solved</buttton>
				  <?php } ?>
                  </td>
                  <td class="text-center action-btn">
				 <a class="edit btn btn-success btn-xs change-status" href="#BlockModal2" data-toggle="modal" data-target="#BlockModal2<?php echo $v->id; ?>">Change Status </a>
				 
				 <?php if($v->type == 'Add_Imminent_complain'){ ?>
                    <a href="<?php echo site_url('software/Add_Complain_For_Imminent_User/Imminent_com_edit/' .$v->id);?>" class="edit btn btn-success btn-xs change-status">Edit</a>
					<?php } else { ?>
					<a href="<?php echo site_url('software/Add_Complain_For_Imminent_User/add_com_edit/' .$v->id);?>" class="edit btn btn-success btn-xs change-status">Edit</a>
					<?php } ?>
					
					
					
					</td>
                </tr>
				
				
				<div class="modal" id="BlockModal2<?php echo $v->id; ?>">
				
						  <div class="modal-dialog">
							<div class="modal-content">
							  <!-- Modal Header -->
							  <div class="modal-header">
								<h4 class="modal-title">Change Status</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							  </div>
							  <!-- Modal body -->
							 
							   <input  type="hidden" value="<?php echo $v->id?>" name="id" id="id" class="form-control" >
							  <div class="modal-body">
							   
								<div class="form-group">
								  <label for="inputEmail3" class="col-sm-5 control-label">Change Status</label>
								  <div class="col-sm-7">
									<div class="form-group">
									  <select class="form-control" name="status" id="status" required>
										<option value="">Select</option>
										<option value="0">Pending</option>
										<option value="2">Reviewed</option>
										<option value="3">Not Solved</option>
										<option value="1">Solved</option>
									  </select>
									</div>
								  </div>
								</div>
								
							  </div>
							  <div class="modal-footer text-center" style="padding-top:40px;">
                <button type="submit" name="" class="btn btn-primary submit">Change Status</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
							
							
		
							</div>
						  </div>
						</div>
				
				
				
				<?php } ?>
              
                
              </tbody>
            </table>

<script>

 $(".submit").on('click', function(){
		$('.prgbar').css('display', 'block');
		var status 	=  $("#status").val();
		var id 		=  $("#id").val();
		var urlmgs = "<?php echo site_url('software/Add_Complain_For_Imminent_User/Change_status'); ?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{id:id,status:status},
			success:function(data){
				location.reload();
			}
		});
	});

</script>