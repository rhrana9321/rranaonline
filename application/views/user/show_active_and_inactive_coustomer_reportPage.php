 <?php
		 $total_bill = 0; 
		 foreach ($all_customer_List as $tv) {
		 $total_bill = $total_bill + $tv->taka;
		 ?>
		 <?php } ?>
 <h4 class="text-teal-800">Total Bill Amount: <?php echo $total_bill; ?> Taka</h4>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                 <th style="background:#444444; color:#FFFFFF;" class="col-md-1">SL</th>
                    <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Customer ID</th>
                    <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Customer Name</th>
                    <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Address</th>
                    <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Mobile No</th>
                    <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Bill Amount</th>
                    <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Connection Date</th>
                    <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Zone</th>
                    <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Remarks</th>
                    <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Status</th>
                    <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Action</th>
            </tr>
        </thead>
        <tbody>
		 <?php 
		 $i = 1; 
		 foreach ($all_customer_List as $v) {
		 $zone_infoList = $this->M_cloud->findbyidstock('zone_table', array('id'=> $v->zone)); 
		 ?> 
            <tr>
                <td><?php echo $i++; ?></td>
                <td><a href="<?php echo site_url('software/Bill_Collection/payment_history/' .$v->custo_id);?>">CUS<?php echo $v->customer_id_create; ?> </a>&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; <span style="padding-left:20px; border:1px #428bca solid; background:#428bca; color:#FFFFFF; padding:4px;" class="glyphicon glyphicon-envelope"></span></td>
                <td><a href="<?php echo site_url('software/Customer_info/details/' .$v->custo_id);?>"><?php echo $v->name; ?></a></td>
                <td><?php echo $v->details; ?></td>
                <td><?php echo $v->mobile; ?></td>
                <td><?php echo $v->taka; ?></td>
                <td><?php echo $v->con_date; ?></td>
                <td><?php echo $zone_infoList->zoneName; ?></td>
                <td><a target="_blank" class="btn btn-xs btn-primary" style="padding:5px;" href="<?php echo site_url('software/Customer_info/remarks/' .$v->custo_id);?>"><span class="glyphicon glyphicon-paperclip"></span>Remarks</a></td>
                <td>
					<?php if($v->status =='1'){ ?>
					<buttton class="padding_5_px btn-success btn-xs">Active</span></button>
					<?php } else if($v->status =='0'){ ?>
					<buttton class="padding_5_px btn-danger btn-xs">Inactive</span></button>
					<?php } ?>
				</td>
				 <td> <a href="<?php echo site_url('software/Customer_info/edit/' .$v->custo_id);?>"><span class="glyphicon glyphicon-edit"></span> </a>| <a href="<?php echo site_url('software/Customer_info/delete/' .$v->custo_id);?>"><span class="glyphicon glyphicon-remove"></span></a></td>
            </tr>
		<?php } ?>
			
        </tbody>
        
    </table>
<script>
    $(document).ready(function() {
   	 $('#example').DataTable();
	});
</script>