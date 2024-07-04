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
               <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Invoice</th>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Customer Name</th>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Clint ID</th>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Address</th>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Zone</th>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Mobile No</th>
				<th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Clint IP</th>
				<th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Package</th>
				<th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Speed</th>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">C. Date</th>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Bill Date</th>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Previous Due</th>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Bill</th>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Total<br>Dues</th>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Action</th>
            </tr>
            </tr>
        </thead>
        <tbody>
		 <?php 
			$i = 1; 
			foreach ($all_customer_List as $v) {
			$zone_infoList = $this->M_cloud->findbyidstock('zone_table', array('id'=> $v->zone));
			 $packageList = $this->M_cloud->findbyidstock('package_table', array('id'=> $v->package)); 
			 
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
                <td style="font-size:11px;"><a target="_blank" href="<?php echo site_url('software/Customer_info/Print/' .$v->custo_id);?>"><span style="padding-left:20px; border:1px #f0ad4e solid; background:#f0ad4e; color:#FFFFFF; padding:4px;" class="glyphicon glyphicon-print"></span></a> | 
				<span data-id="<?php echo $v->customer_id_create ?>" data-mobile="<?php echo $v->mobile ?>" total_due="<?php echo $v->previus_months_due+$v->connection_charge_due_amount+$v->running_bill; ?>" class="glyphicon glyphicon-envelope sms_class slide important2" id="loc<?php echo $v->customer_id_create;?>"></span>
				</td>
				<td style="font-size:11px;"><a href="<?php echo site_url('software/Customer_info/details/' .$v->custo_id);?>"><?php echo $v->name; ?></a></td>
                <td style="font-size:11px;"><a href="<?php echo site_url('software/Bill_Collection/payment_history/' .$v->custo_id);?>">CUS<?php echo $v->customer_id_create; ?></a> </td>
                <td style="font-size:11px;"><?php echo $v->details; ?></td>
				<td style="font-size:11px;"><?php echo $zone_infoList->zoneName; ?></td>
                <td style="font-size:11px;"><?php echo $v->mobile; ?></td>
				<td style="font-size:11px;"><?php echo $v->Clint_IP; ?></td>
				<td style="font-size:11px;"><?php echo $packageList->name; ?></td>
				<td style="font-size:11px;"><?php echo $packageList->Speed; ?></td>
				
				<td style="font-size:11px;"><?php echo $v->con_date; ?></td>
                <td style="font-size:11px;"><?php echo $v->bill_date; ?>-<?php echo $monthName; ?>-<?php echo $year2; ?></td>
				<td style="font-size:11px;"><?php echo $v->previus_months_due; ?></td>
                <td style="font-size:11px;"><?php echo $v->running_bill; ?></td>
                <td style="font-size:11px;"><?php echo $v->previus_months_due+$v->running_bill; ?></td>
				 <td style="font-size:11px;"> <div class="btn-group">
				 	<?php if($v->running_bill > 0){ ?>
					 <a onClick="return confirm('Are you sure you want to pay this?');" customer-id="<?php echo $v->custo_id; ?>" payment-date="<?php echo $year2; ?>-<?php echo $month2; ?>-<?php echo $v->bill_date; ?>" total-bill="<?php echo $v->taka; ?>" href="#"  class="btn btn-primary btn-sm paid" style="padding:5px; width:58px;">Pay</a>
					 <?php } else { ?>
					 <a href="#" disabled class="btn btn-primary btn-sm paid" style="padding:5px; background:#FF0000; color:#FFFFFF; border:1px #FF0000 solid; width:58px;">Pay</a>
					 <?php } ?>
					 
					 
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