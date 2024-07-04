   <div class="col-md-12" style="font-size:12px;">
          <div class="text-center">
            <h3 id="printTitle"></h3>
          </div>
          <table class="table table-responsive table-bordered table-hover table-striped" id="monthlyTable">
            <thead>
              <tr>
                <th class="bg-success text-center col-md-2" colspan="1" rowspan="2"><b>Date</b></th>
                <th class="bg-info text-center  col-md-6" colspan="4"><b>Income</b></th>
                <th class="bg-success text-center  col-md-1" rowspan="2"><b>Expense</b></th>
              </tr>
              <tr>
                <td class="text-center bg-info col-md-2"><b>Bill Collection</b></td>
                <td class="text-center bg-info col-md-2"><b>Connection Charge</b></td>
                <td class="text-center bg-info col-md-2"><b>Others Income</b></td>
                <td class="text-center bg-info col-md-2"><b>Opening Amount</b></td>
              </tr>
            </thead>
            <tbody>
             <?php
			 $total_Bill_Collection = 0;
			 $total_Connection_Charge = 0;
			 $total_Others_Income = 0;
			 $total_Opening_Amount = 0;
			 $total_Expense = 0;
			 $total_Discount = 0;
			 $total_opannig = 0;
			 foreach ($monthly_bal_table_List as $mon_value) {
			 $total_Bill_Collection 	= $total_Bill_Collection + $mon_value->dat_total_bill_collection;
			 $total_Connection_Charge 	= $total_Connection_Charge + $mon_value->day_total_connection_charge;
			 $total_Others_Income 		= $total_Others_Income + $mon_value->day_total_others_income;
			 $total_Opening_Amount 		= $total_Opening_Amount + $mon_value->total_opaning_amount;
			 $total_Expense 			= $total_Expense + $mon_value->day_total_expence;
			 $total_Discount 			= $total_Discount + $mon_value->day_total_discount;
			 $total_opannig_ble			= $total_opannig + $mon_value->total_opaning_balance;
			 ?>
			  <tr class="digitData">
                <td class="text-center"><?php echo $mon_value->month_running_date; ?></td>
				
				<?php if($mon_value->dat_total_bill_collection == 0){ ?>
                <td class="text-center bill pointer" data-day="2020-05-12">--</td>
				<?php } else { ?>
				<td class="text-center bill pointer" data-day="2020-05-12"><?php echo $mon_value->dat_total_bill_collection; ?></td>
				<?php } ?>
				 
				<?php if($mon_value->day_total_connection_charge == 0){ ?>
                <td class=" text-center con"data-day="0">--</td>
				<?php } else { ?>
				<td class=" text-center con"data-day="0"><?php echo $mon_value->day_total_connection_charge; ?></td>
				<?php } ?>
				
				<?php if($mon_value->day_total_others_income == 0){ ?>
                <td class="text-center other "data-day="0">--</td>
				<?php } else { ?>
				<td class="text-center other "data-day="0"><?php echo $mon_value->day_total_others_income; ?></td>
				<?php } ?>
				
				<?php if($mon_value->total_opaning_amount == 0){ ?>
                <td class=" text-center other">--</td>
				<?php } else { ?>
				<td class=" text-center other"><?php echo $mon_value->total_opaning_amount; ?></td>
				<?php } ?>
				<?php if($mon_value->day_total_expence == 0){ ?>
                <td class="text-center expense "data-day="0">--</td>
				<?php } else { ?>
				 <td class="text-center expense "data-day="0"><?php echo $mon_value->day_total_expence; ?></td>
				<?php } ?>
				
              </tr>
			  <?php } ?>
              <tr class=" bg-warning">
                <th class="text-right">Total = </th>
				
				<?php if($total_Bill_Collection == 0){ ?>
                <th class="text-center">--</th>
				<?php } else { ?>
				<th class="text-center"><?php echo $total_Bill_Collection; ?></th>
				<?php } ?>
				
				<?php if($total_Connection_Charge == 0){ ?>
                 <th class="text-center">--</th>
				<?php } else { ?>
				<th class="text-center"><?php echo $total_Connection_Charge; ?></th>
				<?php } ?>
               
			    <?php if($total_Others_Income == 0){ ?>
                 <th class="text-center">--</th>
				<?php } else { ?>
				<th class="text-center"><?php echo $total_Others_Income; ?></th>
				<?php } ?>
                
				 <?php if($total_Opening_Amount == 0){ ?>
                 <th class="text-center">--</th>
				<?php } else { ?>
				<th class="text-center"><?php echo $total_Opening_Amount; ?></th>
				<?php } ?>
               
			   <?php if($total_Expense == 0){ ?>
                 <th class="text-center">--</th>
				<?php } else { ?>
				<th class="text-center"><?php echo $total_Expense; ?></th>
				<?php } ?>
				
				
              </tr>
              
              <tr>
                <th colspan="3" class="text-right" style='font-size:15px;'>Total Income</th>
                <th class="text-center"style='font-size:15px;'><?php echo $total_Bill_Collection + $total_Connection_Charge + $total_Others_Income + $total_Opening_Amount; ?> Taka </th>
                <th class="text-right" style='font-size:15px;'>Total Expense</th>
                <th class="text-center" style='font-size:15px;' colspan="1" ><?php echo $total_Expense; ?> Taka </th>
					
					
              </tr>
			  
			  
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-md-4 col-md-offset-4">
          <div>
            <table class="table">
              <tr>
                <td><b>Opening Balance:</b></td>
				
                <th style="text-align: right;"><?php echo $opanning_balance = $total_opannig_ble; ?> Taka </th>
              </tr>
              <tr>
                <td><b>Total Income:</b></td>
                <th style="text-align: right;"><?php echo $total_Bill_Collection + $total_Connection_Charge + $total_Others_Income + $total_Opening_Amount+$total_opannig_ble; ?> Taka</th>
              </tr>
              <tr>
                <td><b>Total Expense:</b></td>
                <th style="text-align: right;"><?php echo $total_Expense; ?> Taka </th>
              </tr>
			  
              <tr>
                <td><b>Cash In Hand:</b></td>
                <th style="text-align: right;"><?php echo ($total_Bill_Collection + $total_Connection_Charge + $total_Others_Income+$total_Opening_Amount+$total_opannig_ble)-($total_Expense); ?> Taka </th>
              </tr>
            </table>
          </div>
        </div>