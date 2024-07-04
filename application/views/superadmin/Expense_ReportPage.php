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
      <script>

    function printDiv(divName) {
        $("table").find('a').each(function () {
            $(this).attr('href', '');
        });
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
    function marginchange() {
        $(".print").css("margin-left", "-30px");
    }
</script>
      <div class="row bg-slate-800">
        <div class="col-md-6">
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
          <h4><strong>View <?php echo $monthName3; ?>  <?php echo $year3; ?> Expense Report Sheet </strong></h4>
        </div>
        <div class="col-md-6"> <a class="btn btn-success btn-sm pull-right " href="<?php echo site_url('software/Expense_Report/day_wise');?>" style="margin-top:3px;">Daywise Expense Report</a> <a class="btn btn-primary btn-sm pull-right" href="<?php echo site_url('software/Expense');?>" style="margin-top:3px;">Add New Expense</a>
          <button class="btn btn-primary btn-sm pull-right"  style="margin-top:3px;" onClick="printDiv('month_table')" >Click to Print</button>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12"
         style=" margin-top:5px; margin-bottom: 5px; font-size:14px;  color:red; font-weight:bold; text-align: center;"> <b></b> </div>
      </div>
      <div class="row">
        <div class="col-md-12 bg-slate-800" style="margin-bottom: 20px;padding:5px 0px">
         
            <div class="col-md-5">
              <div class="form-group">
                <label class="control-label col-sm-5" style="padding-top:5px" for="dateMonth">Select Month</label>
                <div class="col-sm-7">
                  <select class="form-control" name="dateMonth" id="dateMonth" required>
				  <option value="">Select Month</option>
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
                <label class="control-label col-sm-5" style="padding-top:5px" for="damageRate">Select Year</label>
                <div class="col-sm-7">
                  <select class="form-control" name="dateYear" id="dateYear" required>
				   <option value="">Select Year</option>
				   <?php foreach ($year_List as $yv) { ?>
                    <option value="<?php echo $yv->year_name; ?>"><?php echo $yv->year_name; ?></option>
					<?php } ?>
                    
                  </select>
                </div>
              </div>
            </div>
            <input type="hidden" name="q" value="expense_report">
            <input type="hidden" name="action" value="search">
            <div class="col-md-2">
              <button type="button" name="search" class="btn btn-default viewAll"><span
                            class="glyphicon  glyphicon-search"></span>&nbsp;&nbsp;Search </button>
            </div>
          
        </div>
      </div>
      <div id="month_table" onMouseOver="marginchange()">
        <div class="row" style="font-size:14px;">
          <div class="col-md-12 reportdetailsday" id="reportdetails">
		   <div class="progress prgbar" style="display:none;">
		  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
			<span class="sr-only"></span>
		  </div>
		</div>
     		 <div class="row progress prgbar" style="display:none; padding-top:20px;">
        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> <span class="sr-only"></span> </div>
      </div>
            <table class="table table-responsive table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th>SL No.</th>
                  <th>Account Head</th>
                  <th>Expense</th>
                </tr>
              </thead>
              <tbody>
			  
			   <?php $i=1; 
			   $total_amount = 0; 
			   foreach ($expense_table_List as $v) { 
			    $total_amount =  $total_amount +$v->totalamount;
				$header_name = $this->M_cloud->findbyidstock('account_head_table', array('id'=> $v->header_name));
				
			   ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><a href="<?php echo site_url('software/Expense_Report/Expense_details/' .$v->header_name);?>"> <?php echo $header_name->name; ?> </a> </td>
                  <td><?php echo $v->totalamount; ?></td>
                </tr>
              <?php } ?>
				
                <tr>
                  <td colspan="2" class="text-center"><b>Total Expense</b></td>
                  <td><b><?php echo $total_amount; ?></b></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
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
