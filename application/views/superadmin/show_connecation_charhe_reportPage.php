<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">SL.</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Customer Name</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Customer ID</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Address</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Zone</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Mobile No</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Date</th>
				<th style="background:#444444; color:#FFFFFF;" class="col-md-1">Conn. Charge</th>
            </tr>
            </tr>
        </thead>
        <tbody>
		 <?php 
			$i = 1;
			$TOTAL_AMOUNT = 0;
			foreach ($all_customer_List as $v) {
			$find_cous = $this->M_cloud->findbyidstock('customer_table', array('custo_id'=> $v->customer_id));
			$zone_infoList = $this->M_cloud->findbyidstock('zone_table', array('id'=> $find_cous->zone));
			
			 
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
			if($v->amount > 0){
			$TOTAL_AMOUNT = $TOTAL_AMOUNT + $v->amount;
		 ?> 
            <tr>
                <td><?php echo $i++; ?></td>
				<td><a href="<?php echo site_url('software/Customer_info/details/' .$find_cous->custo_id);?>"><?php echo $find_cous->name; ?></a></td>
                <td><a href="<?php echo site_url('software/Bill_Collection/payment_history/' .$find_cous->custo_id);?>">CUS<?php echo $find_cous->customer_id_create; ?></a> </td>
                <td><?php echo $find_cous->details; ?></td>
				<td><?php echo $zone_infoList->zoneName; ?></td>
                <td><?php echo $find_cous->mobile; ?></td>
				<td><?php echo $v->payment_date; ?></td>
				<td><?php echo $v->amount; ?></td>
            </tr>
		<?php } } ?>
		<tfoot>
		<tr>
                
				<td colspan="7" align="right">Total =</td>
				<td><?php echo $TOTAL_AMOUNT; ?></td>
            </tr>
			</tfoot>
			
        </tbody>
        
    </table>
	<script>
$('.submit').on('click', function(e){
		var from_date 	= $("#from_date").val();
		var to_date 	= $("#to_date").val();
		var urlmgs = "<?php echo site_url("software/Connection_Charge/date_to_date");?>";
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