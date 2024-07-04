<table class="table table-responsive table-striped" id="monthly_tbl" style="width:100%;">
              <thead>
                <tr>
                  <th style="border:#dddddd 1px solid;" class="col-md-1">Sl</th>
                  <th style="border:#dddddd 1px solid;" class="col-md-2">Date</th>
                  <th style="border:#dddddd 1px solid;" class="col-md-3 text-center">Particular</th>
                  <th style="border:#dddddd 1px solid;" class="col-md-1 text-center">Client</th>
                  <th style="border:#dddddd 1px solid;" class="col-md-1 text-right">Credit</th>
                  <th style="border:#dddddd 1px solid;" class="col-md-1 text-right">Debit</th>
                  <th style="border:#dddddd 1px solid;" class="col-md-1 text-right">Balance</th>
                </tr>
              </thead>
              <tbody>
			  
			  <?php 
				  $i =1;
				  $sum = 0;
				  $total_cradit = 0;
				  $total_debit = 0;
				  foreach ($account_table_List as $acc_value) {
				  $row_total = $acc_value->credit - $acc_value->debit;
				  $clint_info = $this->M_cloud->findbyidstock('customer_table', array('custo_id'=> $acc_value->client));
				  $sum+= $row_total;
				  $total_cradit = $total_cradit+$acc_value->credit;
				  $total_debit = $total_debit+$acc_value->debit;
			  ?>
                <tr id="1" class="pointer">
                  <td style="border:#dddddd 1px solid;"><?php echo $i++; ?></td>
                  <td style="border:#dddddd 1px solid;"><?php echo $acc_value->c_date; ?></td>
                  <td style="border:#dddddd 1px solid;" class="text-right"><?php echo $acc_value->particular; ?></td>
                  <td style="border:#dddddd 1px solid;" class="text-center"><?php echo $clint_info->name; ?></td>
                  <td style="border:#dddddd 1px solid;" class="text-right"><?php echo $acc_value->credit; ?></td>
                  <td style="border:#dddddd 1px solid;text-align: right;" ><?php echo $acc_value->debit; ?></td>
                  <td style="border:#dddddd 1px solid;text-align: right;" ><?php echo $sum; ?></td>
                </tr>
                <?php } ?>
              </tbody>
             
                <tr style="font-size:14px;">
                  <td colspan="4" style="border:#dddddd 1px solid;" class="text-center"><b>Total</b></td>
                  <td style="border:#dddddd 1px solid;" class="text-right"><b><?php echo $total_cradit; ?></b></td>
                  <td style="border:#dddddd 1px solid;" class="text-right"><b><?php echo $total_debit; ?></b></td>
                  <td style="border:#dddddd 1px solid;" class="text-right"><b><?php echo $sum; ?></b></td>
                </tr>
                
             
            </table>