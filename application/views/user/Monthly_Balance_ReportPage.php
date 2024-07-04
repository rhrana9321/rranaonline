<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<title><?php echo $superdetails->title; ?></title>
<link href="<?php echo base_url('resource/assets/bootstrap.css');?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('resource/assets/reset.css');?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('resource/assets/style.css');?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('resource/assets/2col.css');?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('resource/assets/1col.css');?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('resource/assets/main.css');?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('resource/assets/menu.css');?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('resource/assets/admin.css');?>" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">



<script type="text/javascript" src="<?php echo base_url('resource/assets/jquery1.12.4.js');?>"></script>
<link href="<?php echo base_url('resource/assets/bootstrap.css');?>" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo base_url('resource/assets/bootstrap.min.js');?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('resource/assets/dataTables.bootstrap.min.css');?>">
<script type="text/javascript" charset="utf8" src="<?php echo base_url('resource/assets/jquery.dataTables.min.js');?>"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url('resource/assets/dataTables.bootstrap.min.js');?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('resource/assets/bootstrap-datepicker.min.css');?>"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('resource/assets/select2.min.js');?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('resource/assets/select2.min.css');?>"/>
<script type="text/javascript" src="<?php echo base_url('resource/assets/custom.js');?>"></script>
<script>
function startTime() {
var today = new Date();
var h = today.getHours();
var m = today.getMinutes();
var s = today.getSeconds();
m = checkTime(m);
s = checkTime(s);
document.getElementById('clock').innerHTML =
h + ":" + m + ":" + s;
var t = setTimeout(startTime, 500);
}
function checkTime(i) {
if (i < 10) {
i = "0" + i
}
;  // add zero in front of numbers < 10
return i;
}
</script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('resource/assets/main.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('resource/assets/dataTables.bootstrap.min.css');?>">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript">
    $(document).ready(function () {

        $('#datatable').DataTable();


        $('select[name="zone"]').select2({
            placeholder: "Select a Zone",
            allowClear: true,
        });
        $('select[name="type"]').select2({
            placeholder: "Select a Type",
            allowClear: true,
        });
        $('select[name="billingperson"]').select2({
            placeholder: "Select a Billing Person",
            allowClear: true,
        });

    });
</script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>








</head>
<body>
<div class="container" id="content"
         style="width:100% !important; padding:0px; border:0px; background-color:#EAEAEA;">
  <div class="col-md-12" style="background:#100000; padding:0px; min-height:50px;">
   
     <?php $this->load->view('superadmin/header_part'); ?>
  </div>
  <div class="col-md-12" style="margin:15px 0px 15px 0px; padding:0px 15px 0px 0px;">
    <!-- ============== Start Menu ========================== -->
    <div class="col-md-2" style="padding:0px 10px 0px 0px;">
      <div class="col-md-12" style="padding:0px; width:100%;">
        <div id="body_service">
           <?php $this->load->view('superadmin/left_menuPage'); ?>
        </div>
      </div>
    </div>
    <!-- ============== End Menu ========================== -->
    <div class="col-md-10" style="background:#FFFFFF; border:1px solid #999999;">
      <style>
    .pointer {
        cursor: pointer;

    }

    .pointer:hover {
        color: #0082a4;
        font-weight: bold;
    }
</style>
      
      <div class="col-md-12 bg-grey-800" style="margin-top:20px; margin-bottom: 15px;">
        <div class="col-md-6">
          <h4><strong>The Monthly Statement of May 2020</strong></h4>
        </div>
        <div class="col-md-6" style="padding-top:5px;">
          <button type="submit" class="btn btn-primary bg-teal btn-sm pull-right"
                onclick="printDiv('month_table')">Print Statement </button>
        </div>
      </div>
	  
	   
      <div class="col-md-12 bg-slate-800" style="margin-bottom: 20px;padding:5px 0px">
        
          <div class="col-md-5">
            <div class="form-group">
              <label class="control-label col-sm-4" style="padding-top:5px" for="dateMonth">Select Month</label>
              <div class="col-sm-8">
                <select class="form-control" required="required" name="dateMonth" id="dateMonth">
                  <option value="1">January</option>
                  <option value="2">February</option>
                  <option value="3">March</option>
                  <option value="4">April</option>
                  <option value="5">May</option>
                  <option value="6">June</option>
                  <option value="7">July</option>
                  <option value="8">August</option>
                  <option value="9">September</option>
                  <option value="10">October</option>
                  <option value="11">November</option>
                  <option value="12">December</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label class="control-label col-sm-4" style="padding-top:5px" for="damageRate">Select Year</label>
              <div class="col-sm-8">
                <select class="form-control" name="dateYear" id="dateYear" required>
				   <option value="">Select Year</option>
				   <?php foreach ($year_List as $yv) { ?>
                    <option value="<?php echo $yv->yearly_name; ?>"><?php echo $yv->yearly_name; ?></option>
					<?php } ?>
                    
                  </select>
              </div>
            </div>
          </div>
          <div class="col-md-2">
            <button type="submit" name="search" class="btn btn-primary viewAll"><span
                        class="glyphicon  glyphicon-search"></span>&nbsp;&nbsp;Search </button>
          </div>
        
      </div>
      <div class="row" id="month_table">
	   <div class="progress prgbar" style="display:none;">
		  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
			<span class="sr-only"></span>
		  </div>
		</div>
     		 <div class="row progress prgbar" style="display:none; padding-top:20px;">
        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> <span class="sr-only"></span> </div>
      </div>
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
        <hr>
        <div class="col-md-12 bg-danger">
          <h4 class="text-center" style="padding-bottom:30px">Cash In Hand
            Word: 
			
			<?php
									$total_in_bill = ($total_Bill_Collection + $total_Connection_Charge + $total_Others_Income+$opanning_amount)-($total_Expense);
										 $ones = array(
											  1 => "one",
											  2 => "two",
											  3 => "three",
											  4 => "four",
											  5 => "five",
											  6 => "Six",
											  7 => "seven",
											  8 => "eight",
											  9 => "nine",
											  10 => "ten",
											  11 => "eleven",
											  12 => "twelve",
											  13 => "thirteen",
											  14 => "fourteen",
											  15 => "fifteen",
											  16 => "sixteen",
											  17 => "seventeen",
											  18 => "eighteen",
											  19 => "nineteen"
											  );
											  $tens = array(
											  2 => "Twenty",
											  3 => "Thirty",
											  4 => "Forty",
											  5 => "Fifty",
											  6 => "Sixty",
											  7 => "Seventy",
											  8 => "Eighty",
											  9 => "Ninety"
											  );
											  $hundreds = array(
											  "hundred",
											  "thousand",
											  "million",
											  "billion",
											  "trillion",
											  "quadrillion"
											  ); //limit t quadrillion
												$price = number_format($total_in_bill,2,".",",");
												$num_arr = explode(".",$total_in_bill);
												$wholenum = $num_arr[0];
												$decnum = $num_arr[1];
												$whole_arr = array_reverse(explode(",",$wholenum));
												krsort($whole_arr);
												$rettxt = "";
												foreach($whole_arr as $key => $i)
												{
												  if($i < 20)
												  {
												  $rettxt .= $ones[$i];
												  }
												  elseif($i < 100)
												  {
													$rettxt .= $tens[substr($i,0,1)];
													$rettxt .= " ".$ones[substr($i,1,1)];
												  }
												  else
												  {
													  $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0];
													  $rettxt .= " ".$tens[substr($i,1,1)];
													  $rettxt .= " ".$ones[substr($i,2,1)];
												  }
													if($key > 0)
													{
													  $rettxt .= " ".$hundreds[$key]." ";
													}
												}
												  if($decnum > 0)
												  {
													$rettxt .= " and ";
													if($decnum < 20)
													{
													  $rettxt .= $ones[$decnum];
													}
													elseif($decnum < 100)
													{
													  $rettxt .= $tens[substr($decnum,0,1)];
													  $rettxt .= " ".$ones[substr($decnum,1,1)];
													}
												}
												echo $rettxt;
										?>
			
			</h4>
          <h6 class="pull-right text-center" style="border-top:2px solid black;width:40%">Authorized Signature<h3>
        </div>
      </div>
      <script>

    $(document).ready(function () {
        $('select').selectpicker();

        $('table#monthlyTable tbody tr.digitData td.bill').on('click', function () {
            if ($(this).hasClass('pointer')) {
                var date = $(this).data('day');
                window.open('?q=daily_acc_statement&action=bill&day=' + date + '', '_blank');
            }
        });

        $('table#monthlyTable tbody tr.digitData td.con').on('click', function () {
            if ($(this).hasClass('pointer')) {
                var date = $(this).data('day');
                window.open('?q=daily_acc_statement&action=con&day=' + date + '', '_blank');
            }
        });

        $('table#monthlyTable tbody tr.digitData td.other').on('click', function () {
            if ($(this).hasClass('pointer')) {
                var date = $(this).data('day');
                window.open('?q=daily_acc_statement&action=other&day=' + date + '', '_blank');
            }
        });
        $('table#monthlyTable tbody tr.digitData td.expense').on('click', function () {
            if ($(this).hasClass('pointer')) {
                var date = $(this).data('day');
                window.open('?q=daily_expense_report&day=' + date + '', '_blank');
            }
        });

    });

    function printDiv(divName) {
        $(".print").css("margin-left", "0px");
        $('h3#printTitle').html('The Monthly Statement of May 2020');
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        $('h3#printTitle').html('');
    }

</script>
    </div>
    <!-- ============== End Container ========================== -->
  </div>
  <div class="col-md-12" id="footer" class="box">
  <p class="f-right" style="font-size:11px;">&copy; 2020 <a href="#" target="_blank">ISP
    Company Software.</a>, All Rights Reserved</p>
</div>
</div>
<script>
     $(".viewAll").on('click', function(){
	$('.prgbar').css('display', 'block');
	var dateMonth = $("#dateMonth").val();
	var dateYear = $("#dateYear").val();
	var urlmgs = "<?php echo site_url('software/Monthly_Balance_Report/showreport'); ?>";
	$.ajax({
		url:urlmgs,
		type:"POST",
		data:{dateMonth:dateMonth,dateYear:dateYear},
		success:function(data){
			$("#month_table").html(data);
			$('.prgbar').css('display', 'none');
		}
	});
});
 
	   
    </script>
</body>
</html>
