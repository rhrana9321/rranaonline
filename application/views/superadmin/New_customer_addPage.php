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
<div class="container" id="content"style="width:100% !important; padding:0px; border:0px; background-color:#EAEAEA;">
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
        <div class="col-md-12"> </div>
      </div>
      <div class="row">
        <div class="col-md-12 bg-slate-800" style="margin-top:20px; margin-bottom: 15px;">
          <h4> <strong>Create New Customer </strong> </h4>
        </div>
      </div>
      <div class="row" style="padding:10px; font-size: 12px;">
        <form role="form" id="loadingId" action="<?php echo site_url('software/New_customer_add/store');?>" enctype="multipart/form-data" method="post" style="padding:10px; font-size: 12px;">
          <div class="row"> </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Customer Name/Company Name</label>
                <input type="text" name="name" class="form-control" required="required">
              </div>
              <div class="form-group">
                <label>SMS Mobile No</label>
                <input onKeyPress="return numbersOnly(event)" type="text" name="mobile" class="form-control">
              </div>
              <div class="form-group">
                <label>Others Mobile Number</label>
                <input type="text" name="regularmobile" class="form-control">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
              </div>
              
              <div class="form-group">
                <label>National Id/Passport Number</label>
                <input type="text" name="national_id" class="form-control"
                    >
              </div>
			  <div class="form-group">
                <label class="pull-left">Select Village</label>
                
                <select class="form-control" name="village" required="required">
                  <option></option>
				  <?php foreach ($village_List as $vzv) { ?> 
                  <option value="<?php echo $vzv->name; ?>"><?php echo $vzv->name; ?></option>
					<?php } ?>
                 
                </select>
              </div>
              <div class="form-group">
                <label>Address</label>
                <textarea class="form-control" name="details" id="ResponsiveDetelis" rows="4"></textarea>
              </div>
			  <div class="form-group" style="padding-top:10px;">
                          <input type="file" name="logo_image">
                          <p class="help-block">Make Sure Logo Image Size 225 X 86</p>
                        </div>
              
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="pull-left">Select Zone</label>
                <select class="form-control" name="zone" required="required">
                  <option></option>
				  <?php foreach ($zone_List as $zv) { ?> 
                  <option value="<?php echo $zv->id; ?>"><?php echo $zv->zoneName; ?></option>
					<?php } ?>
                 
                </select>
              </div>
			  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                <label>Previus months due</label>
                 <input onKeyPress="return numbersOnly(event)" type="text" name="previus_months_due" class="form-control"
                           placeholder=" previus months due">
              </div>
                    </div>
					<div class="col-md-6">
                        <div class="form-group">
                <label>Previus Due Note</label>
                 <input type="text" name="previus_due_note" class="form-control"
                           placeholder=" previus due note">
              </div>
                    </div>
                </div>
				
				
				
              <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Running Month Amount</label>
                            <input onKeyPress="return numbersOnly(event)" type="text" name="opening_amount"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group col-md-6" id="running_month_amount">
                        <label>Having Due in Running Month Amount</label>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="checkbox" style="margin-top:5px">
                                    <label>
                                        <input type="checkbox" name="running_month_due_have"><b>Due</b>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <input onKeyPress="return numbersOnly(event)" type="text" placeholder="Due amount"
                                       disabled name="running_month_due_amount"
                                       class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
              <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Connection Charge</label>
                            <input onKeyPress="return numbersOnly(event)" type="text" name="connect_charge"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group col-md-6" id="connection_charge_amount">
                        <label>Having Due in Connection Charge</label>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="checkbox" style="margin-top:5px">
                                    <label>
                                        <input type="checkbox" name="connection_charge_due_have" value="1"><b>Due</b>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <input onKeyPress="return numbersOnly(event)" type="text" placeholder="Due amount"
                                       disabled name="connection_charge_due_amount"
                                       class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
              <div class="form-group">
                <label>Connection Date</label>
                <input id="datepicker" type="text" name="con_date" class="form-control" required autocomplete="off">
              </div>
			  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                <label>Package</label>
                <select class="form-control" name="package" id="package">
                  <option>Select Package</option>
                  <?php foreach ($package_List as $vzv) { ?> 
                  <option value="<?php echo $vzv->id; ?>"><?php echo $vzv->name; ?></option>
					<?php } ?>
                </select>
              </div>
                    </div>
					
                </div>
			  <div class="row">
					<div class="col-md-12">
                        <div class="form-group">
                <label>Speed</label>
                 <input type="text" name="Speed" id="Speed" readonly class="form-control"
                           placeholder="Speed">
              </div>
                    </div>
                </div>
			  
              
              <div class="form-group" id ="billAmount">
                <label>Bill Amount</label>
                <input onKeyPress="return numbersOnly(event)" type="text" name="taka" id="taka" class="form-control"
                           placeholder="Provide Bill Amount">
              </div>
              
			   <div class="form-group">
                <label>Bill Date</label>
                 <input onKeyPress="return numbersOnly(event)" type="text" name="bill_date" class="form-control"
                           placeholder=" Bill Date">
              </div>
			  <div class="form-group">
                <label>Clint IP</label>
                 <input type="text" name="Clint_IP" class="form-control"
                           placeholder="Clint IP">
              </div>
			  
              
              
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" required="required" name="status" id="status">
                      <option></option>
                      <option selected value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4" style="margin-top: 18px;">
                  <div class="form-group">
                    <div class="checkbox">
                      <label>
                      <input type="checkbox" name="sms_check" value="1">
                      <b>SMS Notification</b> </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Remarks</label>
                <textarea class="form-control" name="remarks" id="remarks" rows="2"></textarea>
              </div>
			  
            </div>
          </div>
          <!--            row-->
          <div class="row text-center">
		  <button type="submit" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..." class="abc btn btn-success"><span>Save New Customer</span></button>
          </div>
        </form>
      </div>
      <!-- Modal Start-->
      <div class="modal fade" id="addPackageModal" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title text-center">Insert New package</h4>
            </div>
            <form method="post">
              <div class="modal-body">
                <div class="row" style="padding:0 10px;">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Package Name</label>
                      <input type="text" name="packageName" class="form-control"  placeholder="Provide Package Name" required = "required" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Net Speed</label>
                      <input type="text" name="packageNetSpeed" class="form-control"
                                       required = "required" placeholder="Provide Net Speed">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Bill Amount</label>
                      <input type="text" onKeyPress="return numbersOnly(event)" name="packageBillAmount" class="form-control" placeholder="Provide Bill Amount" required = "required" >
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer text-center">
                <button type="submit" class="btn btn-success pull-left" name="packageAddSubmit"> Save Package </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Modal Start-->
      <div class="modal fade" id="addZoneModal" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title text-center">Insert New Zone</h4>
            </div>
             <form method="post" action="<?php echo site_url('software/New_customer_add/zone_store');?>">
              <div class="modal-body">
                <div class="row" style="padding:0 10px;">
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="row">
                        <label>Zone Name</label>
                        <input type="text" name="zoneName" class="form-control"
                                           placeholder="Provide Zone Name">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group text-center">
                      <button type="submit" class="btn btn-default" name="zoneAddSubmit"> Insert Zone </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
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


        $('#datepicker').datepicker({
            autoclose: true,
            toggleActive: true,
            format: 'dd-mm-yyyy'
        });


    }); // document ready function
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
   $(function() { 
    $("#loadingId").on('submit', function(){
		$(".abc").button('loading');
		//$(this).button('reset');      
    });
}); 


$("#package").on('change', function(){
		var package = $("#package").val();
		$.ajax({
			url : "<?php echo site_url('software/New_customer_add/show_cover_gel_qty'); ?>",
			type : "POST",
			dataType: "json",
			data : {package:package},
			success : function(data) {
				if(data){
					$('#taka').val(data.amount);
					$('#Speed').val(data.Speed);
				} else {
					$('#taka').val(0);
					$('#Speed').val(0);
				}
			}
		});
});

    </script>
</body>
</html>
