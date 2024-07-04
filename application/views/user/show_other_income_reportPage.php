<table class="table table-hover table-bordered table-striped" id="datatable_view_expense">
              <thead>
                <tr>
                  <th>SL.</th>
                  <th>Head</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>
              </thead>
			   <?php $i=1; 
			   $total_amount = 0; 
			   foreach ($expense_table_List as $v) { 
			    $total_amount =  $total_amount +$v->amount;
			   ?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td><a href="<?php echo site_url('software/Others_Income/Income_history/' .$v->header_name);?>"><?php echo $v->header_name; ?></a></td>
                <td><?php echo $v->totalamount; ?></td>
                <td class="text-center"><div class="btn-group"> <a class="btn btn-xs btn-success"
                                       href="#BlockModal" data-toggle="modal" data-target="#BlockModal<?php echo $v->id; ?>"> Edit <span class="glyphicon glyphicon-edit"></span> </a> <a onClick="return confirm('Are You Sure To Delete This Others Income ?');"
                                       href="<?php echo site_url('software/Others_Income/delete/' .$v->id);?>"
                                       class="btn btn-xs btn-danger"> Delete <span class="glyphicon glyphicon-remove"></span> </a> </div></td>
              </tr>
			  
			  
			  <div class="modal" id="BlockModal<?php echo $v->id; ?>">
						  <div class="modal-dialog">
						  <form method="post" id="loadingId_block" enctype="multipart/form-data" action="<?php echo site_url('software/Others_Income/updated');?>"/>
							   <input  type="hidden" value="<?php echo $v->id; ?>" name="id" class="form-control" >
							<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color:#000000;">Edit Expense</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-group">
					<label style="color:#000000;">Account Head</label>
					<select class="form-control" required="required" name="header_name" id="header_name">
						<option></option>
						<?php foreach ($account_head_List as $av) { ?>
						<option <?php if ($v->header_name == $av->name ) echo 'selected' ; ?> value="<?php echo $av->name; ?>"><?php echo $av->name; ?></option>
						<?php } ?>
					</select>
                       </div>
					   
					   
					<div class="form-group">
                            <label style="color:#000000;">Amount</label>
                           <input onKeyPress="return numbersOnly(event)" value="<?php echo $v->amount; ?>" required="required" type="text" name="amount"
                           class="form-control" id="ResponsiveTitle">
                         </div>   
					   
       <div class="form-group">
                            <label style="color:#000000;">Account Head Details</label>
                             <textarea class="form-control" style="color:#000000;" name="details" id="ResponsiveDetelis" rows="6"><?php echo $v->details; ?></textarea>
                         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background:#FF0000; color:#FFFFFF;">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
	</form>
						  </div>
						</div>
			  
			  
			  
			  <?php } ?>
              
              
              <tfoot>
                <tr>
                  <th colspan="3">Total Expense</th>
                  <th colspan="4"><?php echo $total_amount; ?> tk</th>
                </tr>
              </tfoot>
            </table>
			<script>
$('.submit').on('click', function(e){
		var from_date 	= $("#from_date").val();
		var to_date 	= $("#to_date").val();
		var urlmgs = "<?php echo site_url("software/Others_Income/date_to_date");?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{from_date:from_date,to_date:to_date },
			success:function(data){
				$(".list_valu_html").html(data);
			}
		});
		e.preventDefault();
	});
	</script>