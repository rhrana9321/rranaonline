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
    .pointer{
        cursor: pointer;

    }
    .pointer:hover{
        text-decoration:underline;
        -webkit-text-decoration-color: #83aff7; /* Safari */
        text-decoration-color: #83aff7;
    }
</style>
      <div class="row">
        <div class="col-md-12 bg-teal-800" style="margin-top:20px; margin-bottom: 15px;">
          <div class="col-md-8">
		  <?php 
		  
		  $date 	= date("Y-m-d");
			
			//
			$date3 	= date("Y-m-d");
			$date3 	= explode('-', $date3); 
			$year3 	= $date3[0];
			$month3  = $date3[1];
			$day3  	= $date3[2];
			 
			
			$monthNum3  = $month3;
			$dateObj3   = DateTime::createFromFormat('!m', $monthNum3);
			$monthName3 = $dateObj3->format('F');
		  ?>
            <h4><strong><span id="showDate">The Accounting Statement of <?php echo $monthName3; ?> <?php echo $year3; ?></span></strong></h4>
          </div>
          <div class="col-md-2">  </div>
          <div class="col-md-2">
            <button type="submit" class="btn btn-primary btn-sm pull-right" style="margin-top:3px;" onClick="printDiv('month_print')">Print Statement </button>
          </div>
        </div>
        <form action="" method="POST" class="form-horizontal">
          <div id="select_date" class="col-md-12 bg-teal-800" style="margin-bottom: 20px;padding:5px 0px">
            <div class="col-md-1">
              <label class="control-label" style="padding-top:5px" for="dateMonth">Form : </label>
            </div>
            <div class="col-md-4">
              <input class="form-control" value="<?php echo date("d-m-Y", strtotime($date)); ?>" type="text"
                       placeholder="Select Date" name="dateform" id="from_date" required="required">
            </div>
            <div class="col-md-1">
              <label class="control-label pull-right" style="padding-top:5px" for="dateMonth">To : </label>
            </div>
            <div class="col-md-4">
              <input class="form-control" required="required" id="to_date" value="<?php echo date("d-m-Y", strtotime($date)); ?>" type="text"
                       name="dateto" placeholder="Select Date">
            </div>
            
            <div class="col-md-2 text-center">
              <input type="submit" class="btn btn-success submit" name="searchSubmit" value="Search">
            </div>
          </div>
        </form>
      </div>
	  <div class="list_valu_html">
      <div class="row " style="padding:5px; font-size: 12px;">
        <div class="row" id="month_print">
          <div class="col-md-12 ">
            <h4 id="printtitle" class="text-center"></h4>
            <table class="table table-responsive table-striped" id="monthly_tbl" style="width:100%;">
              <thead>
			  <tr>
                <th colspan="2" style="background:#FFFFFF; color:#000000; text-align:left; font-size:16px; border-right:#FFFFFF 1px solid;" class="col-md-1"><img title="Visit Site" alt="Our logo" src="<?php echo base_url('upload/' .$superdetails->logo_image);?>" width="100" height="45"></th>
				<th colspan="3" style="background:#FFFFFF; color:#000000; text-align:center; font-size:13px; border-left:#FFFFFF 1px solid;" class="col-md-1">&nbsp;&nbsp;&nbsp;&nbsp;Account Statement&nbsp; &nbsp;&nbsp;&nbsp;</th>
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
                  <td style="border:#dddddd 1px solid;text-align: right;" ><?php echo $acc_value->debit; ?></td>
                  <td style="border:#dddddd 1px solid; text-align: right;"><?php echo $sum; ?></td>
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
	   </div>
      <hr>
      <script>

    $(document).ready(function () {
        $('input[name="dateform"]').datepicker({
            autoclose: true,
            toggleActive: true,
            format: 'dd-mm-yyyy'
        });

        $('input[name="dateto"]').datepicker({
            autoclose: true,
            toggleActive: true,
            format: 'dd-mm-yyyy'
        });
    });
    function printDiv(divName) {
        var title = $('#showDate').html();
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        $('h4#printtitle').html('');
    }

    $(document).ready(function () {
        $("tbody tr").on('click', function () {
            var id = this.id;
            if (id != "0") { window.location = "?q=view_customer_payment_individual&token2=" + id; }
        });
    });
</script>
      <!-- here end table -->
    </div>
    <!-- ============== End Container ========================== -->
  </div>
  <div class="col-md-12" id="footer" class="box">
  <p class="f-right" style="font-size:11px;">&copy; 2020 <a href="#" target="_blank">Meghnalink.
    Com Software.</a>, All Rights Reserved</p>
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
<script>
	$(".viewAll").on('click', function(){
	$('.prgbar').css('display', 'block');
	var dateMonth = $("#dateMonth").val();
	var dateYear = $("#dateYear").val();
	var urlmgs = "<?php echo site_url('software/Expense_Report/showreport'); ?>";
	$.ajax({
		url:urlmgs,
		type:"POST",
		data:{dateMonth:dateMonth,dateYear:dateYear},
		success:function(data){
			$("#reportdetails").html(data);
			$('.prgbar').css('display', 'none');
		}
	});
});


 $(".daywiseviewAll").on('click', function(){
	$('.prgbar').css('display', 'block');
	var date =  $("#date").val();
	
	var urlmgs = "<?php echo site_url('software/Expense_Report/dayshowreport'); ?>";
	$.ajax({
		url:urlmgs,
		type:"POST",
		data:{date:date},
		success:function(data){
			$(".reportdetailsday").html(data);
			$('.prgbar').css('display', 'none');
		}
	});
});


    </script>
</body>
</html>
