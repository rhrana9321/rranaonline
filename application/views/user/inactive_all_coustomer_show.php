<style>
.important2 {
 padding-left:20px; border:1px #428bca solid; background:#428bca; color:#FFFFFF; padding:4px;
}

.important {
  padding-left:20px; border:1px #FF0000 solid; background:#FF0000; color:#FFFFFF; padding:4px;
}
</style>
<div class="col-md-12 table-responsive">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Invoice</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Customer Name</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Customer ID</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Address</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Zone</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Mobile No</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">C. Date</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Bill Date</th>
				<th style="background:#444444; color:#FFFFFF;" class="col-md-1">Conn. Charge</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Previous Due</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Running Bill</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Total<br>Dues</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Action</th>
            </tr>
            </tr>
        </thead>
        <tbody>
		 <?php 
			$i = 1; 
			foreach ($all_customer_List as $v) {
			$zone_infoList = $this->M_cloud->findbyidstock('zone_table', array('id'=> $v->zone));
			 
			$date 	= date("Y-m-d");
			$date 	= explode('-', $date); 
			$year 	= $date[0];
			$month  = $date[1];
			$day  	= $date[2];
			//
			$date2 	= date("Y-m-d");
			$date2 	= explode('-', $date2); 
			$year2 	= $date2[0];
			$month2  = $date2[1];
			$day2  	= $date2[2];
			 
			
			$monthNum  = $month2;
			$dateObj   = DateTime::createFromFormat('!m', $monthNum);
			$monthName = $dateObj->format('F');
			$all_due 	= $v->previus_months_due+$v->connection_charge_due_amount+$v->running_bill;
		 	if($all_due > 0){
		 ?> 
            <tr>
                <td><span style="padding-left:20px; border:1px #f0ad4e solid; background:#f0ad4e; color:#FFFFFF; padding:4px;" class="glyphicon glyphicon-print"></span> | 
				<span data-id="<?php echo $v->customer_id_create ?>" data-mobile="<?php echo $v->mobile ?>" total_due="<?php echo $v->previus_months_due+$v->connection_charge_due_amount+$v->running_bill; ?>" class="glyphicon glyphicon-envelope sms_class slide important2" id="loc<?php echo $v->customer_id_create;?>"></span>
				</td>
				<td><a href="<?php echo site_url('software/Customer_info/details/' .$v->custo_id);?>"><?php echo $v->name; ?></a></td>
                <td>CUS<?php echo $v->customer_id_create; ?> </td>
                <td><?php echo $v->details; ?></td>
				<td><?php echo $zone_infoList->zoneName; ?></td>
                <td><?php echo $v->mobile; ?></td>
				<td><?php echo $v->con_date; ?></td>
                <td><?php echo $v->bill_date; ?>-<?php echo $monthName; ?>-<?php echo $year2; ?></td>
				<td><?php echo $v->connection_charge_due_amount; ?></td>
				<td><?php echo $v->previus_months_due; ?></td>
                <td><?php echo $v->running_bill; ?></td>
                <td><?php echo $v->previus_months_due+$v->connection_charge_due_amount+$v->running_bill; ?></td>
				 <td> <div class="btn-group">
				 	
					 <a href="<?php echo site_url('software/Bill_Collection/payment/' .$v->custo_id);?>" style="padding:5px" class="btn btn-success btn-sm "> Payment </a>
					 
					 
					 
					 </div>
				</td>
            </tr>
		<?php } } ?>
			
        </tbody>
        
    </table>
          
        </div>
<script>
	$(document).ready(function() {
	$('#example').DataTable();
	});
</script>