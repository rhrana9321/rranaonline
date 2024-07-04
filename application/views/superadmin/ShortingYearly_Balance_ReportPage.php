<table class="table table-responsive table-bordered table-hover table-striped" id="yearlyAccounts">
            <thead>
              <tr>
                <th>#</th>
                <th>Month</th>
                <th>Opening Balance</th>
                <th>Customer Payment</th>
                <th>Others Payment</th>
                <th>Connection Charge</th>
                <th>Opening Amount</th>
                <th>Total</th>
                <th>Expense Statement</th>
                <th>Closing Balance</th>
              </tr>
            </thead>
            <tbody>
			 <?php
			 
			 $total_income = 0;
			 $total_expence = 0;
			 foreach ($yearly_bal_table_List as $mon_value) {
			 $total_income 	= $total_income + $mon_value->total_total_opaning_balance+$mon_value->total_bill_collection+$mon_value->total_day_total_others_income+$mon_value->total_day_total_connection_charge+$mon_value->total_total_opaning_amount;
			 $total_expence 	= $total_expence + $mon_value->total_day_total_expence;
			 
			
			$monthNum  = $mon_value->month_name;;
			$dateObj   = DateTime::createFromFormat('!m', $monthNum);
			$monthName = $dateObj->format('F');
			
			
			 ?>
              <tr>
                <td>1</td>
                <td id="month" style="text-align: center;"><span class="pointer" data-month="1"><?php echo $monthName; ?></span> </td>
                <td style="text-align: right;"> <?php echo $mon_value->total_total_opaning_balance; ?> </td>
                <td style="text-align: right;"> <?php echo $mon_value->total_bill_collection; ?> </td>
                <td style="text-align: right;"> <?php echo $mon_value->total_day_total_others_income; ?></td>
                <td style="text-align: right;"> <?php echo $mon_value->total_day_total_connection_charge; ?> </td>
                <td style="text-align: right;"> <?php echo $mon_value->total_total_opaning_amount; ?></td>
				
                <td style="text-align: right;"><b> <?php echo $mon_value->total_total_opaning_balance+$mon_value->total_bill_collection+$mon_value->total_day_total_others_income+$mon_value->total_day_total_connection_charge+$mon_value->total_total_opaning_amount; ?> </b> </td>
                
				<td style="text-align: right;"> <?php echo $mon_value->total_day_total_expence; ?> </td>
				
                <td style="text-align: right;"><b> <?php echo ($mon_value->total_total_opaning_balance+$mon_value->total_bill_collection+$mon_value->total_day_total_others_income+$mon_value->total_day_total_connection_charge+$mon_value->total_total_opaning_amount)-($mon_value->total_day_total_expence); ?> </b> </td>
              </tr>
			  <?php } ?>
             
              <tr>
                <td colspan="10" style="background: #ddd;"></td>
              </tr>
              <tr>
                <td colspan="8" style="text-align: right;">Total Income:</td>
                <td colspan="2" style="text-align: right;"><b><?php echo $total_income; ?></b></td>
              </tr>
              <tr>
                <td colspan="8" style="text-align: right;">Total Expense:</td>
                <td colspan="2" style="text-align: right;"><b> <?php echo $total_expence; ?></b></td>
              </tr>
              <tr>
                <td colspan="8" style="text-align: right;">Yearly Profit:</td>
                <td colspan="2" style="text-align: right;"><b><?php echo ($total_income-$total_expence);?></b></td>
              </tr>
              <tr>
                <th colspan="10" style="text-align: center;"><span style="color: green;">Total Ammount In Word:&nbsp;<span style="color: red;">Negative Five Thousand One Hundred And Seventeen</span></span></th>
              </tr>
            </tbody>
          </table>
		  <script>
     $(".viewAll").on('click', function(){
	$('.prgbar').css('display', 'block');
	var dateYear = $("#dateYear").val();
	var urlmgs = "<?php echo site_url('software/Yearly_Balance_Report/showreportrrrrr'); ?>";
	$.ajax({
		url:urlmgs,
		type:"POST",
		data:{dateYear:dateYear},
		success:function(data){
			$("#month_table").html(data);
			$('.prgbar').css('display', 'none');
		}
	});
});
    </script>