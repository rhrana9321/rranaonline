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
	
	 <?php 
	  $total_bill2 =0;
	  foreach ($results_paymentinfo as $v2) { 
	  $total_bill2 = $total_bill2 + $v2->amount;
	  ?>
	  <?php } ?>
	 <?php
	 $total_conn_bill2 = 0;
	 foreach ($results_paymentconninfo as $cv2) {
	 $total_conn_bill2 = $total_conn_bill2 + $cv2->amount; 
	 ?>
	 <?php } ?>
	<?php
		$total_op_amount = 0;
		foreach ($total_opaning_list as $opn_value) {
		$total_op_amount = ($total_op_amount + $opn_value->amount);
		?>
		<?php } ?>
		
		<?php
		$total_CoN_amount = 0;
		foreach ($total_cone_List as $coN_value) {
		$total_CoN_amount = ($total_CoN_amount + $coN_value->amount);
		?>
		<?php } ?>
	
	
    <!-- ============== End Menu ========================== -->
    <div class="col-md-10" style="background:#FFFFFF; border:1px solid #999999;">
      <div class="col-md-12"
         style=" margin-top:5px; margin-bottom: 5px; font-size:14px;  color:red; font-weight:bold; text-align: center;"> <b></b> </div>
      <div class="col-md-12"
         style=" background:#606060; margin-top:20px; margin-bottom: 15px; min-height:45px; padding:8px 0px 0px 15px; font-size:16px; font-family:Lucida Sans Unicode; color:#FFFFFF; font-weight:bold;">
        <div class="col-md-6"> <b>View Customer Payment Information for <?php echo $find_customer_paymentinfo->name; ?></b> </div>
      </div>
      <div class="row" style="font-size: 12px;">
        <div class="col-md-12">
          <table class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th class="col-md-1">ID</th>
                <th class="col-md-1">Name</th>
                <th class="col-md-1">Address</th>
                <th class="col-md-1">Mobile No</th>
                <th class="col-md-1">Taka</th>
                <th class="col-md-1">C. Date</th>
                <th class="col-md-1">Zone</th>
                <th class="col-md-1">Action</th>
              </tr>
            </thead>
            <tr>
			<?php
			$zone_infoList = $this->M_cloud->findbyidstock('zone_table', array('id'=> $find_customer_paymentinfo->zone)); 
			date_default_timezone_set('Asia/Dhaka');
			
			
			?>
              <td> CUS<?php echo $find_customer_paymentinfo->customer_id_create; ?> </td>
              <td><?php echo $find_customer_paymentinfo->name; ?></td>
              <td><?php echo $find_customer_paymentinfo->details; ?></td>
              <td><?php echo $find_customer_paymentinfo->mobile; ?></td>
              <td><?php echo $find_customer_paymentinfo->taka; ?></td>
              <td><?php echo $find_customer_paymentinfo->con_date; ?></td>
              <td><?php echo $zone_infoList->zoneName; ?></td>
              <td><div class="btn-group"> <a class="btn btn-xs btn-info" style="padding:5px;"
                               href="<?php echo site_url('software/Customer_info/edit/' .$find_customer_paymentinfo->custo_id);?>"> <span class="glyphicon glyphicon-edit"></span> Edit </a>  </div></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="row" style="font-size: 12px;">
	  <form id="paid_form" role="form" enctype="multipart/form-data" method="post" action="<?php echo site_url('software/Bill_Collection/payment_action');?>">
	  <input class="form-control" value="<?php echo $find_customer_paymentinfo->custo_id; ?>" style="height: 30px;" type="hidden" name="customer_id">
        <div class="col-md-4">
          <div class="form-group">
            <label>Bill Amount</label>
            <input value="<?php echo $find_customer_paymentinfo->taka; ?>" type="text" class="form-control"
                       id="ResponsiveTitle" readonly="">
          </div>
        </div>
        
       
	    <div class="col-md-4">
          <div class="form-group">
            <label>Pay Amount</label>
            <input value="<?php echo ($total_bill2+$total_conn_bill2)-($total_op_amount+$total_CoN_amount); ?>" type="text" class="form-control" id="ResponsiveTitle"
                       readonly="">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Due Amount</label>
            <input value="<?php echo $find_customer_paymentinfo->previus_months_due; ?>" type="text" class="form-control"
                       id="due_amount" readonly="">
          </div>
        </div>
		
		
		
      </div>
      
        
        
      </form>
      <hr>
      <div class="col-md-2"> <a href="?q=printpaymenthistory&chhistoryPrint=6" id="print_link" target="_blank" class="btn btn-primary btn-xs pull-right" >Show Change Payment History</a> </div>
      <div class="row pull-right" id="print_row" style="margin-bottom: 10px;
    margin-right: -140px;">
        <!--     <div class="col-md-2">
        <a href="?q=printpaymenthistory&historyPrint=6" id="print_link" target="_blank" class="btn btn-primary btn-xs pull-right" >Print Payment History</a>
    </div> -->
        <div class="col-md-2"> <a href="?q=printpaymenthistory&historyPrint=6" id="print_link" target="_blank" class="btn btn-primary btn-xs pull-right" >Print Payment History</a> </div>
      </div>
      <div class="row" style="font-size: 12px;">
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" id="datatable">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Date</th>
                  <th class="col-md-1">Month</th>
                  <th>Description</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
			  <?php 
			  $i = 1;   
			  $total_bill =0;
			  foreach ($results_paymentinfo as $v) { 
			  $total_bill = $total_bill + $v->amount;
			  if($v->amount > 0){
			  ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $v->cdate_time; ?></td>
                  <td><?php echo $v->month_name; ?></td>
                  <td style="text-align: right;"><?php echo $v->details; ?></td>
                  <td style="text-align: right;"><?php echo $v->amount; ?></td>
                  <td><div class="btn-group" >   <a target="_blank" href="<?php echo site_url('software/Bill_Collection/Payment_Print/' .$v->payment_id);?>"class="btn btn-xs " style="margin-left: 5px;"> <span style="color: black;" class="glyphicon glyphicon-print"></span> </a> </div></td>
                </tr>
             <?php } } ?> 
			   
			   
			   
              <tbody>
              <thead>
				 <tr>
                  <th colspan="4"> <div class="pull-right">Total</div></th>
                  <th colspan="2"><b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $total_bill+$total_conn_bill; ?> taka</b></th>
                </tr>
				
                <tr>
                  <th colspan="6" style="text-align: center;"><span style="color: green;">Total Ammount In Word::&nbsp;&nbsp;&nbsp;<span
                                        style="color: red;">
									<?php
									$total_in_bill = $total_bill+$total_conn_bill;
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
								
										
										
										
										</span></span> </th>
                </tr>
              </thead>
            </table>
            <hr>
          </div>
        </div>
      </div>
      <script>
        $(document).ready(function () {

            $('select#payment_month').on('change', function (event) {
                var monthName = $(this).val();
                var descriptionField = $('form#paid_form textarea[name="description"]');
                if ($(this).val()) {
                    descriptionField.val('Additional Payment of month : ' + monthName)
                    $('#monthsms').val(monthName);
                }else{
                    descriptionField.val('');
                }
            });
            /*$("#print_link").click(function(){
                 $('a#print_link').attr('href','?q=printclient&historyPrint=' + zoneId);
          });
        });*/
        $("#hold").click(function(){
        var hold = 6;
        //alert(hold);
            $.ajax({

                type: "get",
                url: 'view/ajax_action/add_ajax_data.php',
                data: 
                {
                    'hold' : hold
                },
                success: function()
                {
                    alert("Bill collection Of this customer has been hold");
                }

              });
           });
    });
        function numbersOnly(e) // Numeric Validation
        {
            var unicode = e.charCode ? e.charCode : e.keyCode
            if (unicode != 8) {
                if ((unicode < 2534 || unicode > 2543) && (unicode < 48 || unicode > 57)) {
                    return false;
                }
            }
        }
    </script>
    </div>
    <!-- ============== End Container ========================== -->
  </div>
  <div class="col-md-12" id="footer" class="box">
  <p class="f-right" style="font-size:11px;">&copy; 2020 <a href="#" target="_blank">Meghnalink.
    Com Software.</a>, All Rights Reserved</p>
</div>
</div>
<script>
     
	 $("#amount").keyup(function(){
	  
	  var a =  parseInt($("#due_amount").val());
	  var b =  parseInt($("#amount").val());
	  var d = (a-b);
	  $("#limited").val(d);
	  var c =  a+1;
	  if(c <= b){
			$(".mess_red").text("(You do not have enough Amounts.)");
			$(".abc").attr('disabled', 'disabled');
			return false;
		} else {
			$(".mess_red").text("");
			$(".abc").removeAttr('disabled', 'disabled');
		}
	});
	
	 $("#discount").keyup(function(){
	  var a =  parseInt($("#limited").val());
	  var b =  parseInt($("#discount").val());
	  var c =  a+1;
	  if(c <= b){
			$(".mess_redd").text("(You do not have enough Amounts.)");
			$(".abcd").attr('disabled', 'disabled');
			return false;
		} else {
			$(".mess_redd").text("");
			$(".abcd").removeAttr('disabled', 'disabled');
		}
	});
	
	
    </script>
</body>
</html>
