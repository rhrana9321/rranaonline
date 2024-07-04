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
      <div class="row">
        <div class="col-md-12 padding_5_px"> </div>
      </div>
      <div class="row">
        <div class="col-md-12 bg-slate-800">
          <h4>View Running Month And Connection Charge Due List</h4>
        </div>
      </div>
      <hr>
      <div class="row" style="font-size:12px">
        <div class="col-md-12">
          <table class="table table-responsive table-bordered table-hover " id="datatable">
            <thead>
              <tr class="bg-slate-800">
                <th class="col-md-1">SL</th>
                <th class="col-md-1">Customer Name</th>
                <th class="col-md-1">Address</th>
                <th class="col-md-1">Mobile No</th>
                <th class="col-md-2"> <small>Running Month Due</small> </th>
                <th class="col-md-2"> <small>Connection Charge Due</small> </th>
                <th class="col-md-1">Action</th>
              </tr>
            </thead>
            <tbody>
			 <?php 
			$i = 1; 
			foreach ($all_customer_List as $v) {
			$zone_infoList = $this->M_cloud->findbyidstock('zone_table', array('id'=> $v->zone));
			if($v->running_month_due_amount > 0 or $v->connection_charge_due_amount > 0){
			?>
              <tr>
                <td class="text-center"> <?php echo $i++; ?> </td>
                <td class="text-center"> <a href="<?php echo site_url('software/Customer_info/details/' .$v->custo_id);?>"><?php echo $v->name; ?> </a></td>
                <td class="text-center"> <?php echo $v->details; ?> </td>
                <td class="text-center"> <?php echo $v->mobile; ?> </td>
                <td class="text-center"> <?php echo $v->running_month_due_amount; ?> </td>
                <td class="text-center"> <?php echo $v->connection_charge_due_amount; ?> </td>
                <td class="text-center action-btn">
			<a  class="dropdown-item edit btn btn-success btn-sm" href="#BlockModal" data-toggle="modal" data-target="#BlockModal<?php echo $v->custo_id; ?>">Payment </a>					               </td>
              </tr>
			  
			  
			  
			  
			  
			 <div class="modal" id="BlockModal<?php echo $v->custo_id; ?>">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <!-- Modal Header -->
							  <div class="modal-header">
								<h4 class="modal-title">Payment of Running Month & Connection Charge Due</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							  </div>
							  <!-- Modal body -->
							  <form method="post" id="loadingId" enctype="multipart/form-data" action="<?php echo site_url('software/Customer_of_Other_Due/pay_now');?>"/>
							   <input  type="hidden" value="<?php echo $v->custo_id?>" name="custo_id" class="form-control" >
							  <div class="modal-body">
							   
								<div class="form-group">
									  <label for="inputEmail3" class="col-sm-5 control-label" style="padding-top:10px;">Running Month Due Payment</label>
									  <span class="mess_red" style="color:#FF0000; font-weight:bold;"></span>
									  <div class="col-sm-7">
										<div class="input-group">
										  <input onKeyPress="return numbersOnly(event)" type="text" autocomplete="off" value="0" id="running_month_due_payment" name="running_month_due_payment" class="form-control" >
										  <input  type="hidden" value="<?php echo $v->running_month_due_amount?>" id="running_bill_limit" name="running_bill_limit" class="form-control" >
										  <span class="input-group-addon runningMonthDue">Pre. Due <?php echo $v->running_month_due_amount; ?> Taka</span> 
										  
										  </div>
									  </div>
									</div>
                				<div class="form-group" style="padding-top:25px;">
							  <label for="inputPassword3" class="col-sm-5 control-label" style="padding-top:20px;">Conn. Charge Due Payment</label>
							   <span class="mess_redd" style="color:#FF0000; font-weight:bold;"></span>
							  <div class="col-sm-7">
								<div class="input-group" style="padding-top:10px;">
								  <input onKeyPress="return numbersOnly(event)" autocomplete="off"  type="text" value="0" id="connection_charge_due_payment" name="connection_charge_due_payment" class="form-control">
								  <input  type="hidden" value="<?php echo $v->connection_charge_due_amount; ?>" name="connection_charge_due_amount_lim" id="connection_charge_due_amount_lim" class="form-control" >
								  
								  <span class="input-group-addon connectionChargeDue" >Pre. Due <?php echo $v->connection_charge_due_amount; ?> Taka</span> </div>
							  </div>
							</div>
								
							  </div>
							  <div class="modal-footer text-center" style="padding-top:40px;">
				  <button type="submit" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..." class="abc left1_btn left1_btn-1 left1_btn-1c btn btn-primary"><span>Save changes</span></button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
							  <!-- Modal footer -->
							</form>
		
							</div>
						  </div>
						</div> 
			  
			<?php } } ?>
             
            </tbody>
          </table>
        </div>
      </div>
      <hr>
      
      <!-- /.modal -->
      <script>


    function numbersOnly(e) // Numeric Validation
    {
        var unicode = e.charCode ? e.charCode : e.keyCode
        if (unicode != 8) {
            if ((unicode < 2534 || unicode > 2543) && (unicode < 48 || unicode > 57)) {
                return false;
            }
        }
    }


    $(document).ready(function () {

        $('table#datatable').on('click', 'td.action-btn button.edit', function () {

            var agentId = $(this).data('id');
            var runningMonthDue = $(this).data('running_month');
            var connectionChargeDue = $(this).data('connection_charge');


            $('div#editdue form#editDueForm div.modal-body span.runningMonthDue').html("Pre. Due " + runningMonthDue + " taka");
            $('div#editdue form#editDueForm div.modal-body span.connectionChargeDue').html("Pre. Due " + connectionChargeDue + " taka");
            $('div#editdue form#editDueForm div.modal-body input[name="agent_id"]').val(agentId);

        });

        $('#editdue').on('hidden.bs.modal', function (e) {

            $('form#editDueForm').trigger("reset");
        })

    });
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
        $("#running_month_due_payment").keyup(function(){
	  
	  var a =  parseInt($("#running_bill_limit").val());
	  var b =  parseInt($("#running_month_due_payment").val());
	  
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
	
	
	
	$("#connection_charge_due_payment").keyup(function(){
	  
	  var a =  parseInt($("#connection_charge_due_amount_lim").val());
	  var b =  parseInt($("#connection_charge_due_payment").val());
	  
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
	<script>
       $(function() { 
    $("#loadingId").on('submit', function(){
		$(".abc").button('loading');
		//$(this).button('reset');      
    });
}); 
    </script>
</body>
</html>
