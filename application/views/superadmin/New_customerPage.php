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
      <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
      <style>
    .all-class {
        background: #23659f;
        border-color: #23578d;
        box-shadow: -1px 6px 4px #4e4e4e !important
    }

    .active-class {
        background-color: #308a30;
        border-color: #387c38;
        box-shadow: -1px 6px 4px #4e4e4e !important
    }

    .inactive-class {
        background-color: #bd2a26;
        border-color: #9c2824;
        box-shadow: -1px 6px 4px #4e4e4e !important
    }
</style>
      <div class="row">
        <div class="col-md-12"> </div>
      </div>
	  <div class="list_valu_html">
      <div class="row">
        <div class="col-md-12 bg-grey-800">
          <h4 id="new_joining_title">New Joining Customer Information for <span id="show_date">
		  <?php
		 $newDate = new DateTime(date("Y-m-d"));
		 echo $newDate->format('M d, Y');
		 ?>
		  </span></h4>
        </div>
      </div>
      <div class="row" id="date_search_field">
        <div class="panel panel-success">
          <div class="panel-heading"> <b>Please select Date to search Client</b></div>
          <div class="panel-body">
            <form id="date_search" action="" method="POST">
              <div class="col-md-5">
                <div class="form-group">
                  <input type="text" class="form-control datepicker" autocomplete="off" id="from_date" placeholder="Form Date" name="datefrom"
                               required>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <input type="text" class="form-control datepicker"
                               placeholder="To Date" id="to_date" autocomplete="off" name="dateto" required>
                </div>
              </div>
              <div class="col-md-2">
                <button type="submit" name="search" class="btn btn-primary submit"> Search</button>
              </div>
            </form>
          </div>
        </div>
      </div>
	   <?php
	   $total_active_coustomerall = $this->M_cloud->findAll('customer_table', 'custo_id asc');
		  $total_active_coustomer = $this->M_cloud->minimamaqty('customer_table', array('status'=> 1), 'custo_id asc');
		  $total_inactive_coustomer = $this->M_cloud->minimamaqty('customer_table', array('status'=> 0), 'custo_id asc');
		?>
		 <?php
		$total_a_c = 0;
		foreach ($total_active_coustomer as $av) {
		$total_a_c = $total_a_c + 1;
		?>
		<?php } ?>
		
		 <?php
		$total_ina_c = 0;
		foreach ($total_inactive_coustomer as $iav) {
		$total_ina_c = $total_ina_c + 1;
		?>
		<?php } ?>
		
		 <?php
		$total_alla_c = 0;
		foreach ($total_active_coustomerall as $alav) {
		$total_alla_c = $total_alla_c + 1;
		?>
		<?php } ?>
		
		
		
      <div class="row" id="">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-body">
              <div id="client_list" class="btn-group btn-group-justified"> 
				  <a class="btn btn-primary allcustomer">All Client - <span class="badge all_client">0</span> </a> 
				  <a class="btn btn-success submitactive">Active Client - <span class="badge all_active">0</span></a> 
				  <a class="btn btn-danger submitinactive">Inactive Client - <span class="badge all_inactive">0</span></a>
			  </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="table-responsive active_list_valu_html" style="font-size:12px;">
            
          </div>
        </div>
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
  <p class="f-right" style="font-size:11px;">&copy; 2020 <a href="#" target="_blank">Meghnalink.
    Com Software.</a>, All Rights Reserved</p>
</div>
</div>
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


    function noSpace(e) {
        if (e.which == 32) {
            return false;
        }
    }

    $(document).ready(function () {
        // look client Id is unique or not --->
        $('#clientIp').focusout(function () {
            var clientIpData = $(this).val();
            if (clientIpData != '') {
                var url = 'view/ajax_action/add_ajax_data.php';
                var postData = {check: clientIpData}
                $.post(url, postData, function (data) {
                    $('#checkavailablityclientIp').html(data);
                });
            } else {
                $('#checkavailablityclientIp').html('');
            }
        });

        // while package change autometic bill and speed will be updated
        $('select#packageList').on('change', function () {
            var package = $('select#packageList option:selected').val();
            var speed = $('select#packageList option:selected').data('speed');
            var bill = $('select#packageList option:selected').data('bill');

            $("div#billAmount input[name='taka']").val(bill);
            $("div#netSpeed input[name='mb']").val(speed);

        }); // on change


        $('#running_month_amount').on('change', 'input[name="running_month_due_have"]', function () {

            var dueAmountText = $(this).closest('.row').find('input[name="running_month_due_amount"]');
            dueAmountText.val("");
            if (dueAmountText.is(':disabled')) {
                dueAmountText.prop('disabled', false);
            } else {
                dueAmountText.prop('disabled', true);
            }
        });

        $('#connection_charge_amount').on('change', 'input[name="connection_charge_due_have"]', function () {

            var dueAmountText = $(this).closest('.row').find('input[name="connection_charge_due_amount"]');
            dueAmountText.val("");
            if (dueAmountText.is(':disabled')) {
                dueAmountText.prop('disabled', false);
            } else {
                dueAmountText.prop('disabled', true);
            }
        });


        $('select[name="package"]').select2({
            placeholder: "Select a Profile",
            allowClear: true,
        });


        $('#from_date').datepicker({
            autoclose: true,
            toggleActive: true,
            format: 'dd-mm-yyyy'
        });
		
		$('#to_date').datepicker({
            autoclose: true,
            toggleActive: true,
            format: 'dd-mm-yyyy'
        });
		


    }); // document ready function
</script>
<script>

       $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
	
	
<script>
$('.submit').on('click', function(e){
		var from_date 	= $("#from_date").val();
		var to_date 	= $("#to_date").val();
		var urlmgs = "<?php echo site_url("software/New_customer/date_to_date");?>";
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
	
	$('.submitactive').on('click', function(e){
		var from_date 	= $("#from_date").val();
		var to_date 	= $("#to_date").val();
		var urlmgs = "<?php echo site_url("software/New_customer/active_date_to_date");?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{from_date:from_date,to_date:to_date },
			success:function(data){
				$(".active_list_valu_html").html(data);
			}
		});
		e.preventDefault();
	});
	
	$('.submitinactive').on('click', function(e){
		var from_date 	= $("#from_date").val();
		var to_date 	= $("#to_date").val();
		var urlmgs = "<?php echo site_url("software/New_customer/inactive_date_to_date");?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{from_date:from_date,to_date:to_date },
			success:function(data){
				$(".active_list_valu_html").html(data);
			}
		});
		e.preventDefault();
	});
	
	$('.allcustomer').on('click', function(e){
		var from_date 	= $("#from_date").val();
		var to_date 	= $("#to_date").val();
		var urlmgs = "<?php echo site_url("software/New_customer/allactive_date_to_date");?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{from_date:from_date,to_date:to_date },
			success:function(data){
				$(".active_list_valu_html").html(data);
			}
		});
		e.preventDefault();
	});
	
	
</script>	
	
	
</body>
</html>
