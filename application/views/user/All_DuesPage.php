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
<style>
.important2 {
 padding-left:20px; border:1px #428bca solid; background:#428bca; color:#FFFFFF; padding:4px;
}

.important {
  padding-left:20px; border:1px #FF0000 solid; background:#FF0000; color:#FFFFFF; padding:4px;
}
</style>
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

    .progress-label {
        display: none;
    !important;
    }

    .ui-widget-header {
        border: 1px solid #812cea;
        background: #893ce8;
        color: #333333;
        font-weight: bold;
    }

    #datatable_view_all_due_filter input {
        height: 30px;
        border-radius: 5px;
        padding: 5px;
    }

</style>
      <div class="row bg-grey-800"
     style="margin-top:10px; margin-bottom: 15px; min-height:45px; padding:8px 0px 0px 15px; font-size:16px; font-family:Lucida Sans Unicode;font-weight:bold;">
        <div class="col-md-12"> <b>View All Due Payment Customer</b> </div>
      </div>
      <div class="row" style="font-size: 12px;">
        <div class="col-md-12 table-responsive">
		 <?php $total_duess = $this->M_cloud->findAll('customer_table', 'custo_id asc'); ?>
		  <?php
$total_due = 0;
foreach ($total_duess as $mon_value2234) {
$total_due = $total_due + $mon_value2234->previus_months_due;
?>
<?php } ?>
		 
		 <div class="row" style="padding-bottom:10px;">
		 	<div class="col-md-6"><h4 class="text-teal-800">Total Due Amount: <?php echo $total_due; ?> taka</h4></div>
			<div class="col-md-6" align="right"><a href="<?php echo site_url("software/All_Dues/due_customer");?>" class="btn btn-default" name="zoneAddSubmit"> Print Due Payment Client </a></div>
		 </div>
          <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Invoice</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Customer Name</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Customer ID</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Address</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Zone</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Mobile No</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">C. Date</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Bill Date</th>
				<th style="background:#444444; color:#FFFFFF;" class="col-md-1">Conn. Charge</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Previous Due</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1"> Bill</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Total<br>Dues</th>
            </tr>
            </tr>
        </thead>
        <tbody>
		 <?php 
			$i = 1; 
			foreach ($all_customer_List as $v) {
			$zone_infoList = $this->M_cloud->findbyidstock('zone_table', array('id'=> $v->zone));
			 
			$date 	= date("Y-m-d");
			$date 	= explode('-', $date); 
			$year 	= $date[0];
			$month  = $date[1];
			$day  	= $date[2];
			//
			$date2 	= date("Y-m-d");
			$date2 	= explode('-', $date2); 
			$year2 	= $date2[0];
			$month2  = $date2[1];
			$day2  	= $date2[2];
			 
			
			$monthNum  = $month2;
			$dateObj   = DateTime::createFromFormat('!m', $monthNum);
			$monthName = $dateObj->format('F');
			$all_due 	= $v->previus_months_due+$v->connection_charge_due_amount+$v->running_bill;
		 	if($all_due > 0){
		 ?> 
            <tr>
                <td><span style="padding-left:20px; border:1px #f0ad4e solid; background:#f0ad4e; color:#FFFFFF; padding:4px;" class="glyphicon glyphicon-print"></span> | 
				<span data-id="<?php echo $v->customer_id_create ?>" data-mobile="<?php echo $v->mobile ?>" total_due="<?php echo $v->previus_months_due+$v->connection_charge_due_amount+$v->running_bill; ?>" class="glyphicon glyphicon-envelope sms_class slide important2" id="loc<?php echo $v->customer_id_create;?>"></span>
				</td>
				<td><a href="<?php echo site_url('software/Customer_info/details/' .$v->custo_id);?>"><?php echo $v->name; ?></a></td>
                <td><a href="<?php echo site_url('software/Bill_Collection/payment_history/' .$v->custo_id);?>">CUS<?php echo $v->customer_id_create; ?></a> </td>
                <td><?php echo $v->details; ?></td>
				<td><?php echo $zone_infoList->zoneName; ?></td>
                <td><?php echo $v->mobile; ?></td>
				<td><?php echo $v->con_date; ?></td>
                <td><?php echo $v->bill_date; ?>-<?php echo $monthName; ?>-<?php echo $year2; ?></td>
				<td><?php echo $v->connection_charge_due_amount; ?></td>
				<td><?php echo $v->previus_months_due; ?></td>
                <td><?php echo $v->running_bill; ?></td>
                <td><?php echo $v->previus_months_due+$v->connection_charge_due_amount+$v->running_bill; ?></td>
				 
            </tr>
		<?php } } ?>
			
        </tbody>
        
    </table>
          
        </div>
      </div>
      
      <script type="application/javascript"
        src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
      <script type="application/javascript"
        src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js "></script>
    </div>
    <!-- ============== End Container ========================== -->
  </div>
  <div class="col-md-12" id="footer" class="box">
  <p class="f-right" style="font-size:11px;">&copy; 2020 <a href="#" target="_blank">ISP
    Company Software.</a>, All Rights Reserved</p>
</div>
</div>

<script>
       $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
<script>
	$('.paid').on('click', function(){
		var customer_id 	= $(this).attr("customer-id")
		var payment_date 	= $(this).attr("payment-date")
		var total_bill 	= $(this).attr("total-bill")
		
		var urlmgs = "<?php echo site_url("software/Bill_Collection/pay_now");?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{customer_id:customer_id,payment_date:payment_date,total_bill:total_bill},
			success:function(data){
				location.reload();
			}
		});
		//e.preventDefault();
	});
	</script>
<script>
        $(document).ready(function () {
            $.post("view/ajax_action/ajax_data_return.php", function (data) {

                $('div#header_area span.due_bill_amount').html(data.duePayment.toLocaleString());

            }, "json");
        });
    </script>
<script>
        //$(".edit").click(function(e)
		$(document).on("click", ".sms_class[data-id]", function(e)
		{
			var id 			= $(this).attr("data-id");
			var mobile 		= $(this).attr("data-mobile");
			var total_due 	= $(this).attr("total_due");
			$(".slide[data-id=" + $(this).data('id') + "]").removeClass("important2");
			$(".slide[data-id=" + $(this).data('id') + "]").addClass("important");
			var formURL = "<?php echo site_url('software/Bill_Collection/sms_send'); ?>";			
			$.ajax(
			{
				url : formURL,
				type: "POST",
				data : {id:id,mobile:mobile,total_due:total_due},
				dataType: "json",
				success:function(data){
				
				}
			});
			
			e.preventDefault();
		});
	//update End
    </script>
</body>
</html>
