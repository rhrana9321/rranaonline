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

    .pointer:hover{
        text-decoration:underline;
        -webkit-text-decoration-color: #83aff7; /* Safari */
        text-decoration-color: #83aff7;
        color: #1548ff;
    }
</style>
      <div class="row bg-grey-800" style="margin-bottom: 15px;">
        <div class="col-md-8">
          <h4>Yearly Balance Report of Year 2020</h4>
        </div>
        <div class="col-md-4">
          <button class="btn btn-primary btn-sm pull-right" style="margin-top:3px;"
                onclick="printDiv('year_table')">Print Statement </button>
          <a href="?q=decadely" class="btn btn-success btn-sm pull-right" style="margin-top:3px;" >Last 3 Years Report</a> </div>
      </div>
      <div class="row">
        <div id="select_date" class="col-md-12 bg-slate-800" style="margin-bottom: 20px;padding:5px 0px">
          <div class="col-md-2">
            <label class="control-label" style="padding-top:5px" for="dateMonth">Select Year : </label>
          </div>
          <form action="" method="POST">
            <div class="col-md-4 text-left">
              <select class="form-control" name="dateYear" id="dateYear" required style="color:#000000;">
				   <option value="">Select Year</option>
				   <?php foreach ($year_ListRe as $yyv) { ?>
                    <option value="<?php echo $yyv->yearly_name; ?>"><?php echo $yyv->yearly_name; ?></option>
					<?php } ?>
                    
                  </select>
            </div>
            <div class="col-md-4">
              <input type="submit" name="search" class="btn btn-success viewAll" value="Search Year">
            </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div id="printHeader"></div>
        </div>
        <div class="col-md-12" id="month_table">
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
        </div>
      </div>
      <script>

    $(document).ready(function () {

        $('table#yearlyAccounts tbody tr td#month span').on('click', function () {
            month = $(this).data('month');
            window.location = '?q=monthly_new&month=' + month + '&year=2020';
        });
    });
    function printDiv(divName) {
        $('#printHeader').html('<h2 class="text-center">The Yearly Balance report of 2020</h2>');
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        $('#printHeader').html('');
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
</body>
</html>
