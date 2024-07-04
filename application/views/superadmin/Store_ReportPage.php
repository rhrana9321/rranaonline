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
            <h4><strong><span id="showDate">Store Report</span></strong></h4>
          </div>
          <div class="col-md-2">  </div>
          <div class="col-md-2">
            <a href="<?php echo site_url("software/Item_Manage/Store_report_wise_print");?>"  class="btn btn-primary btn-sm pull-right" style="margin-top:3px;">Print Statement </a>
          </div>
        </div>
       
          
      
      </div>
      <div class="row" style="padding:5px; font-size: 12px;">
        <div class="row" id="month_print">
          <div class="col-md-12" id="reportdetails">
            <h4 id="printtitle" class="text-center"></h4>
            <table class="table table-responsive table-bordered table-striped" id="monthly_tbl">
              <thead>
                <tr>
                  <th class="">Sl.</th>
                  <th class="text-center">Item Name</th>
				   <th class="text-center">Item Price</th>
				   <th class="text-center">Item In</th>
				   <th class="text-center">Item Out</th>
                  <th class="text-center">Store</th>
                </tr>
              </thead>
              <tbody>
			    <?php 
				$i = 1;
				$total_taka = 0;
				foreach ($item_List as $v) {
				$total_taka = $total_taka + $v->price*$v->store;
				?> 
                <tr id="1" class="pointer">
                  <td class="text-center"><?php echo $i++; ?></td>
				  <td class="text-center"><?php echo $v->name; ?></td>
				   <td class="text-center"><?php echo $v->price; ?></td>
				  <td class="text-center"><a href="<?php echo site_url('software/Item_Manage/Store_Report_In_his/' .$v->id);?>"><?php echo $v->in_qty; ?></a></td>
				  <td class="text-center"><a href="<?php echo site_url('software/Item_Manage/Store_Report_Out_his/' .$v->id);?>"><?php echo $v->out_qty; ?></a></td>
                  <td class="text-center"><?php echo $v->store; ?></td>
                </tr>
				<?php } ?>
				
              </tfoot>
            </table>
          </div>
        </div>
      </div>
	  
	   <?php 
		$total_aataka = 0;
		foreach ($add_List as $av) {
		$total_aataka = $total_aataka + $av->price*$av->store;
		?>
		<?php } ?>
		
		<?php 
		$total_outtaka = 0;
		foreach ($out_List as $outv) {
		$total_outtaka = $total_outtaka + $outv->price*$outv->store;
		?>
		<?php } ?>
	  
	 
	  
      <div class="row">
        <div class="col-md-12 bg-slate-800">
          <h4 class="text-center"> <strong><small>Total Balance : </small><?php echo $total_aataka-$total_outtaka; ?> Taka</strong> </h4>
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
        $('#printtitle').html(title);
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
	$(".viewAll###").on('click', function(){
	$('.prgbar').css('display', 'block');
	var dateform = $("#dateform").val();
	var dateto = $("#dateto").val();
	var urlmgs = "<?php echo site_url('software/Expense_Report/showreport'); ?>";
	$.ajax({
		url:urlmgs,
		type:"POST",
		data:{dateform:dateform,dateto:dateto},
		success:function(data){
			$("#reportdetails").html(data);
			$('.prgbar').css('display', 'none');
		}
	});
});


 $(".daywiseviewAll").on('click', function(){
	$('.prgbar').css('display', 'block');
	var date =  $("#date").val();
	
	var urlmgs = "<?php echo site_url('software/Item_Manage/StorredatewiseReport'); ?>";
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
