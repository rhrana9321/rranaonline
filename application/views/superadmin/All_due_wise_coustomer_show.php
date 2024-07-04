<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">SL.</th>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Customer Name</th>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Customer ID</th>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Address</th>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Zone</th>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Mobile No</th>
				
				<th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Clint IP</th>
				<th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Package</th>
				<th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Speed</th>
				
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">C. Date</th>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Bill Date</th>
				<th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Conn. Charge</th>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Previous Due</th>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1"> Bill</th>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Total<br>Dues</th>
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
                <td style="font-size:11px;"> <?php echo $i++; ?></td>
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
				<td style="font-size:11px;"><?php echo $v->connection_charge_due_amount; ?></td>
				<td style="font-size:11px;"><?php echo $v->previus_months_due; ?></td>
                <td style="font-size:11px;"><?php echo $v->running_bill; ?></td>
                <td style="font-size:11px;"><?php echo $v->previus_months_due+$v->connection_charge_due_amount+$v->running_bill; ?></td>
				 
            </tr>
		<?php } } ?>
			
        </tbody>
        
    </table>
	<script>
$("#village").on('change', function(){
	$('.prgbar').css('display', 'block');
	var village = $("#village").val();
	var urlmgs = "<?php echo site_url('software/All_Dues/villageshowreport'); ?>";
	$.ajax({
		url:urlmgs,
		type:"POST",
		data:{village:village},
		success:function(data){
			$("#reportdetails").html(data);
			$('.prgbar').css('display', 'none');
		}
	});
});

 </script>