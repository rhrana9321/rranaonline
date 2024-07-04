<table class="table table-hover table-bordered table-striped" id="datatable_view_expense">
              <thead>
                <tr>
                  <th>SL.</th>
                  <th>Date</th>
                  <th>Head</th>
                  <th>Amount</th>
                  <th>Description</th>
                  <th>Last Updated</th>
                  <th>Action</th>
                </tr>
              </thead>
			   <?php $i=1; 
			   $total_amount = 0; 
			   foreach ($expense_table_List as $v) { 
			    $total_amount =  $total_amount +$v->amount;
				$header_name = $this->M_cloud->findbyidstock('account_head_table', array('id'=> $v->header_name));
				
			   ?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $v->cdate; ?></td>
                <td><?php echo $header_name->name; ?></td>
                <td><?php echo $v->amount; ?></td>
                <td><?php echo $v->details; ?></td>
                <td> <?php echo $v->last_update; ?> </td>
                <td class="text-center"><div class="btn-group"> <a class="btn btn-xs btn-success"
                                       href="#BlockModal" data-toggle="modal" data-target="#BlockModal<?php echo $v->id; ?>"> Edit <span class="glyphicon glyphicon-edit"></span> </a> <a onClick="return confirm('Are You Sure To Delete This Expense ?');"
                                       href="<?php echo site_url('software/Expense/delete/' .$v->id);?>"
                                       class="btn btn-xs btn-danger"> Delete <span class="glyphicon glyphicon-remove"></span> </a> </div></td>
              </tr>
			  
			  
			  <div class="modal" id="BlockModal<?php echo $v->id; ?>">
						  <div class="modal-dialog">
						  <form method="post"  enctype="multipart/form-data" action="<?php echo site_url('software/Expense/updated');?>"/>
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
						<option <?php if ($v->header_name == $av->id ) echo 'selected' ; ?> value="<?php echo $av->id; ?>"><?php echo $av->name; ?></option>
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
        <button type="submit" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..." class=" btn btn-primary"><span> Save</span></button>
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
		var urlmgs = "<?php echo site_url("software/Expense/date_to_date");?>";
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