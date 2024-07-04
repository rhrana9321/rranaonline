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
      <div class="row" style="padding-top:10px;">
        <div class="col-md-6 col-md-offset-3 bg-teal-700 text-center" style="margin-bottom:5px; ">
                <h4>Welcome to Edit page of </h4>
            </div>
      </div>
      <div class="row" style="padding:10px; font-size: 12px;">
        <form role="form" action="<?php echo site_url('software/Add_New_Employee/updated');?>" enctype="multipart/form-data" method="post" style="padding:10px; font-size: 12px;">
		<input type="hidden" name="auto_id" class="form-control" value="<?php echo $employeeList->auto_id; ?>" required="required">
          <div class="row"> </div>
          <div class="row">
		  <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Employee Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $employeeList->name; ?>" required="required">
              </div>
			  
			  
			  <div class="form-group">
                <label>Employee Designation</label>
                <input type="text" name="designation" class="form-control" value="<?php echo $employeeList->designation; ?>" required="required">
              </div>
			  
              <div class="form-group">
                <label>Employee Mobile No</label>
                <input onKeyPress="return numbersOnly(event)" type="text" value="<?php echo $employeeList->name; ?>"  name="mobile" class="form-control">
              </div>
              <div class="form-group">
                <label>Employee Others Mobile Number</label>
                <input type="text" name="regularmobile" value="<?php echo $employeeList->regularmobile; ?>"  class="form-control">
              </div>
              <div class="form-group">
                <label>Employee Email</label>
                <input type="email" name="email" value="<?php echo $employeeList->email; ?>"  class="form-control">
              </div>
              
              <div class="form-group">
                <label>Employee National Id/Passport Number</label>
                <input type="text" name="national_id" value="<?php echo $employeeList->national_id; ?>"  class="form-control">
              </div>
			  <div class="form-group">
                <label>Blood Group</label>
                <input type="text" name="blood_group" value="<?php echo $employeeList->blood_group; ?>"  class="form-control">
              </div>
			  <div class="form-group">
                <label>Employee Join Date</label>
                <input id="datepicker" type="text" name="con_date" value="<?php echo $employeeList->con_date; ?>"  class="form-control" required autocomplete="off">
              </div>
              <div class="form-group">
                <label>Employee Address</label>
                <textarea class="form-control" name="details" value="<?php echo $employeeList->details; ?>"  id="ResponsiveDetelis" rows="4"></textarea>
              </div>
			  <div class="form-group" style="padding-top:10px;">
                          <input type="file" name="logo_image">
                          <p class="help-block">Make Sure Logo Image Size 225 X 86</p>
                        </div>
						
				<div class="form-group" style="padding-top:10px;">
                           <button type="submit" class="btn btn-success" name="submit">Update now</button>
                        </div>
              
            </div>
		  <div class="col-md-3"></div>
          </div>
          <!--            row-->
          
        </form>
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
  <p class="f-right" style="font-size:11px;">&copy; 2020 <a href="#" target="_blank">ISP
    Company Software.</a>, All Rights Reserved</p>
</div>
</div>
<script>
        $(document).ready(function () {
            $.post("view/ajax_action/ajax_data_return.php", function (data) {

                $('div#header_area span.due_bill_amount').html(data.duePayment.toLocaleString());

            }, "json");
        });
    </script>
</body>
</html>
