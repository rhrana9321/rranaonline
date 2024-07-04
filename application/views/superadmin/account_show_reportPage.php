 <div class="row " style="padding:5px; font-size: 12px;">
        <div class="row" id="month_print">
          <div class="col-md-12 ">
            <h4 id="printtitle" class="text-center"></h4>
            <table class="table table-responsive table-striped" id="monthly_tbl" style="width:100%;">
              <thead>
			  <tr>
                <th colspan="2" style="background:#FFFFFF; color:#000000; text-align:left; font-size:16px; border-right:#FFFFFF 1px solid;" class="col-md-1"><img title="Visit Site" alt="Our logo" src="<?php echo base_url('upload/' .$superdetails->logo_image);?>" width="100" height="45"></th>
				<th colspan="3" style="background:#FFFFFF; color:#000000; text-align:center; font-size:13px; border-left:#FFFFFF 1px solid;" class="col-md-1">Account Statement<br/><?php echo date("d-m-Y", strtotime($from_date)); ?> To <?php echo date("d-m-Y", strtotime($to_date)); ?>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
				<th colspan="2" style="background:#FFFFFF; color:#000000; text-align:right; font-size:11px; border-left:#FFFFFF 1px solid; width:10%;" class="col-md-1"><?php echo $superdetails->companyname; ?><br/><?php echo $superdetails->address; ?></th>
                  
            </tr>
			  
			  
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
                  <td style="border:#dddddd 1px solid;text-align: right;"><?php echo $acc_value->debit; ?></td>
                  <td style="border:#dddddd 1px solid;text-align: right;"><?php echo $sum; ?></td>
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
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 bg-slate-800">
          <h4 class="text-center"> <strong><small>Total Balance : </small><?php echo $sum; ?> Taka</strong> </h4>
        </div>
        
      </div>
<script>
$('.submit').on('click', function(e){
		var from_date 	= $("#from_date").val();
		var to_date 	= $("#to_date").val();
		var urlmgs = "<?php echo site_url("software/Account_Statement/date_to_date");?>";
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