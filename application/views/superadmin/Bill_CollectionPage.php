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

    .ui-progressbar {
        position: relative;
    }

    .progress-label {
        text-align: center;
        position: absolute;
        left: 50%;
        top: 4px;
        font-weight: bold;
        /*text-shadow: 1px 1px 0 #fff;*/
    }

    .ui-widget-header {
        border: 1px solid #2f7d2f;
        background: #5cb85c;
        color: #333333;
        font-weight: bold;
    }

    #datatable_view_due_filter input {
        height: 30px;
        border-radius: 5px;
        padding: 5px;
    }

</style>
      <div class="row">
        <div class="col-md-12 bg-grey-800"
         style="margin-top:10px; margin-bottom: 15px; min-height:45px; padding:8px 0px 0px 15px; font-size:16px; font-family:Lucida Sans Unicode; font-weight:bold;">
          <div class="row">
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
		  
            <div class="col-md-4"> <b>View Customer Billing Information <?php echo $monthName3; ?></b> </div>
            <div class="col-md-4" style="font-family: Helvetica;">
              <div class="text-center">
              </div>
            </div>
            <div class="col-md-4">
			 <form action="<?php echo site_url("software/Bill_Collection/zone_wise_print");?>" method="post">
              <div style="float:right; padding-right:10px"> <button  type="submit" class="btn btn-primary btn-sm" >Print Client Bill <span class="glyphicon glyphicon-print"></span></button> <a class="btn btn-primary btn-sm" href="<?php echo site_url('software/New_customer_add');?>">Add New <span class="glyphicon glyphicon-plus"></span></a> </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row" style="margin-bottom:10px;">
        <div class="col-md-4">
          <div class="btn-group" role="group"> <a class="btn btn-primary btn-sm" id="print_link" href="?q=view_report_paganition&flag=INVOICE" target="_blank">Print Invoice</a> </div>
        </div>
        <div class="col-md-4"> 
		<select class="form-control" name="village" id="village" style="text-align:center;">
              <option style="text-align:center;" value="">Select Village</option>
			   <?php foreach ($village_List as $vzv) { ?> 
                  <option value="<?php echo $vzv->name; ?>"><?php echo $vzv->name; ?></option>
					<?php } ?>
             
            </select>
		 </div>
        <div class="col-md-4 text-center">
          <select class="form-control" name="zone" id="zone">
              <option></option>
			  <?php foreach ($zone_List as $zzv) { ?> 
              <option value="<?php echo $zzv->id; ?>"> <?php echo $zzv->zoneName; ?></option>
			  <?php } ?>
             
            </select>
			</form>
        </div>
		
		
		
        
      </div>
      <div class="row reportdetails" id="reportdetails" style="font-size:12px">
	  <div class="progress prgbar" style="display:none;">
		  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
			<span class="sr-only"></span>
		  </div>
		</div>
     		 <div class="row progress prgbar" style="display:none; padding-top:20px;">
        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> <span class="sr-only"></span> </div>
      </div>
        <div class="col-md-12 table-responsive">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Invoice</th>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Customer Name</th>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Clint ID</th>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Address</th>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Zone</th>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Mobile No</th>
				<th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Clint IP</th>
				<th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Package</th>
				<th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Speed</th>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">C. Date</th>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Bill Date</th>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Previous Due</th>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Bill</th>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Total<br>Dues</th>
                <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Action</th>
            </tr>
            </tr>
        </thead>
        <tbody>
		 <?php 
			$i = 1; 
			foreach ($all_customer_List as $v) {
			$zone_infoList = $this->M_cloud->findbyidstock('zone_table', array('id'=> $v->zone));
			 $packageList = $this->M_cloud->findbyidstock('package_table', array('id'=> $v->package)); 
			 
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
                <td style="font-size:11px;"><a target="_blank" href="<?php echo site_url('software/Customer_info/Print/' .$v->custo_id);?>"><span style="padding-left:20px; border:1px #f0ad4e solid; background:#f0ad4e; color:#FFFFFF; padding:4px;" class="glyphicon glyphicon-print"></span></a> | 
				<span data-id="<?php echo $v->customer_id_create ?>" data-mobile="<?php echo $v->mobile ?>" total_due="<?php echo $v->previus_months_due+$v->connection_charge_due_amount+$v->running_bill; ?>" class="glyphicon glyphicon-envelope sms_class slide important2" id="loc<?php echo $v->customer_id_create;?>"></span>
				</td>
				<td style="font-size:11px;"><a href="<?php echo site_url('software/Customer_info/details/' .$v->custo_id);?>"><?php echo $v->name; ?></a></td>
                <td style="font-size:11px;"><a href="<?php echo site_url('software/Bill_Collection/payment_history/' .$v->custo_id);?>">CUS<?php echo $v->customer_id_create; ?></a> </td>
                <td style="font-size:11px;"><?php echo $v->details; ?></td>
				<td style="font-size:11px;"><?php echo $zone_infoList->zoneName; ?></td>
                <td style="font-size:11px;"><?php echo $v->mobile; ?></td>
				<td style="font-size:11px;"><?php echo $v->Clint_IP; ?></td>
				<td style="font-size:11px;"><?php echo $packageList->name; ?></td>
				<td style="font-size:11px;"><?php echo $packageList->Speed; ?></td>
				
				<td style="font-size:11px;"><?php echo $v->con_date; ?></td>
                <td style="font-size:11px;"><?php echo $v->bill_date; ?>-<?php echo $monthName; ?>-<?php echo $year2; ?></td>
				<td style="font-size:11px;"><?php echo $v->previus_months_due; ?></td>
                <td style="font-size:11px;"><?php echo $v->running_bill; ?></td>
                <td style="font-size:11px;"><?php echo $v->previus_months_due+$v->running_bill; ?></td>
				 <td style="font-size:11px;"> <div class="btn-group">
				 	<?php if($v->running_bill > 0){ ?>
					 <a onClick="return confirm('Are you sure you want to pay this?');" customer-id="<?php echo $v->custo_id; ?>" payment-date="<?php echo $year2; ?>-<?php echo $month2; ?>-<?php echo $v->bill_date; ?>" total-bill="<?php echo $v->taka; ?>" href="#"  class="btn btn-primary btn-sm paid" style="padding:5px; width:58px;">Pay</a>
					 <?php } else { ?>
					 <a href="#" disabled class="btn btn-primary btn-sm paid" style="padding:5px; background:#FF0000; color:#FFFFFF; border:1px #FF0000 solid; width:58px;">Pay</a>
					 <?php } ?>
					 
					 
					 <a href="<?php echo site_url('software/Bill_Collection/payment/' .$v->custo_id);?>" style="padding:5px" class="btn btn-success btn-sm "> Payment </a>
					 
					 
					 
					 </div>
				</td>
            </tr>
		<?php } } ?>
			
        </tbody>
        
    </table>
          
        </div>
      </div>
      
    </div>
    <!-- ============== End Container ========================== -->
  </div>
  <div class="col-md-12" id="footer" class="box">
  <p class="f-right" style="font-size:11px;">&copy; 2020 <a href="#" target="_blank">Meghnalink.
    Com Software.</a>, All Rights Reserved</p>
</div>
</div>
<script>
       $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
	<script>
	
	$("#village").on('change', function(){
	$('.prgbar').css('display', 'block');
	var village = $("#village").val();
	var urlmgs = "<?php echo site_url('software/Bill_Collection/villageshowreport'); ?>";
	$.ajax({
		url:urlmgs,
		type:"POST",
		data:{village:village},
		success:function(data){
			$("#reportdetails").html(data);
			$('.prgbar').css('display', 'none');
		}
	});
});
	
	
	$("#zone").on('change', function(){
	$('.prgbar').css('display', 'block');
	var zone = $("#zone").val();
	
	var urlmgs = "<?php echo site_url('software/Bill_Collection/zoneshowreport'); ?>";
	$.ajax({
		url:urlmgs,
		type:"POST",
		data:{zone:zone},
		success:function(data){
			$("#reportdetails").html(data);
			$('.prgbar').css('display', 'none');
		}
	});
});
	
	
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
