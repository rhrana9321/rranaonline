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
      <div class="col-md-12"
         style=" margin-top:5px; margin-bottom: 5px; font-size:14px;  color:red; font-weight:bold; text-align: center;"> <b></b> </div>
      <div class="row">
        <div class="col-md-12 bg-teal-800" style="margin-top:20px; margin-bottom: 15px;">
          <h4><strong>Edit Customer : <?php echo $find_customer_info->name; ?></strong></h4>
        </div>
      </div>
      <div class="row" style="padding:10px; font-size: 12px;">
        <form role="form" enctype="multipart/form-data" action="<?php echo site_url('software/Customer_info/update_now');?>" method="post">
		<input value="<?php echo $find_customer_info->custo_id; ?>" type="hidden" name="custo_id" class="form-control">
          <div class="row">
            <div class="col-md-10 col-md-offset-1"> </div>
          </div>
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Customer Name/Company Name</label>
                  <input value="<?php echo $find_customer_info->name; ?>" type="text"
                                   name="name" class="form-control">
                </div>
                <div class="form-group">
                  <label>Mobile No</label>
                  <input onKeyPress="return numbersOnly(event)"  value="<?php echo $find_customer_info->mobile; ?>" type="text" name="mobile" class="form-control">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input value="<?php echo $find_customer_info->email; ?>"
                                   type="email"
                                   name="email" class="form-control">
                </div>
                <div class="form-group">
                  <label>Others Mobile Number:</label>
                  <input value="<?php echo $find_customer_info->regularmobile; ?>"
                                   type="text" name="regularmobile" class="form-control">
                </div>
                <div class="form-group">
                  <label>National Id/Passport Number</label>
                  <input value="<?php echo $find_customer_info->national_id; ?>"
                                   type="text" name="national_id" class="form-control">
                </div>
                <div class="form-group">
                <label class="pull-left">Select Village</label>
                
                <select class="form-control" name="village" required="required">
                  <option></option>
				  <?php foreach ($village_List as $vzv) { ?> 
                  <option <?php echo ($find_customer_info->village ==  $vzv->name) ? ' selected="selected"' : '';?> value="<?php echo $vzv->name; ?>"><?php echo $vzv->name; ?></option>
					<?php } ?>
                 
                </select>
              </div>
                <div class="form-group">
                  <label>Address</label>
                  <textarea class="form-control" name="details"
                                      rows="4"><?php echo $find_customer_info->details; ?></textarea>
                </div>
				<div class="form-group" style="padding-top:10px;">
                          <input type="file" name="logo_image">
                          <p class="help-block">Make Sure Logo Image Size 225 X 86</p>
                        </div>
                
              </div>
              <div class="col-md-6">
                <div class="form-group" style="margin-bottom: 22px; ">
                  <label class="pull-left">Select Zone</label>
                  <button type="button" style="padding-top: 0px;padding-bottom : 0px;"
                                    class="btn btn-default border-white btn-sm pull-right" data-toggle="modal"
                                    data-target="#addZoneModal"> <span class="glyphicon glyphicon-plus"></span> Add Zone </button>
                  <select class="form-control" name="zone" required="required">
                    <option></option>
                    <?php foreach ($zone_List as $zv) { ?> 
                  <option <?php echo ($find_customer_info->zone ==  $zv->id) ? ' selected="selected"' : '';?>  value="<?php echo $zv->id; ?>"><?php echo $zv->zoneName; ?></option>
					<?php } ?>
                  </select>
                </div>
				
				<div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                <label>Previus months due</label>
                 <input onKeyPress="return numbersOnly(event)" readonly type="text" value="<?php echo $find_customer_info->previus_months_due; ?>" name="previus_months_due" class="form-control"
                           placeholder=" previus months due">
              </div>
                    </div>
					<div class="col-md-6">
                        <div class="form-group">
                <label>Previus Due Note</label>
                 <input type="text" name="previus_due_note" value="<?php echo $find_customer_info->previus_due_note; ?>" class="form-control"
                           placeholder=" previus due note">
              </div>
                    </div>
                </div>
				
				
                <div class="row">
                  <div class="col-md-6">
				  <div class="form-group">
                  <label>Billing Date</label>
                  <input onKeyPress="return numbersOnly(event)" value="<?php echo $find_customer_info->bill_date; ?>" type="text" name="bill_date" class="form-control" required autocomplete="off">
                </div>
                    <div class="form-group">
                      <label>Bill Amount</label>
                      <div class="input-group" id ="billAmount">
                        <input style="background: #f9f9f9 none repeat scroll 0 0" value="<?php echo $find_customer_info->taka; ?>" type="number" name="taka"  onkeypress="return numbersOnly(event)"  class="form-control">
                        <span class="input-group-addon">TK</span> </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Previous Due Payment</label>
                      <div class="input-group">
                        <input type="number" name="previous_due_payment" readonly class="form-control"  onkeypress="return numbersOnly(event)"
                                               value="<?php echo $find_customer_info->previous_due_payment; ?>">
                        <span class="input-group-addon">TK</span> </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Running Month Amount Due</label>
                      <div class="input-group">
                        <input value="<?php echo $find_customer_info->running_month_due_amount; ?>" type="number" name="running_month_due_have"  onkeypress="return numbersOnly(event)"  class="form-control">
                        <span class="input-group-addon">TK</span> </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Connection Charge Amount Due</label>
                      <div class="input-group">
                        <input value="<?php echo $find_customer_info->connection_charge_due_amount; ?>" type="number" name="connection_charge_due_have" onKeyPress="return numbersOnly(event)" class="form-control">
                        <span class="input-group-addon">TK</span> </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Connection Date</label>
                  <input type="text" name="connection_date" required class="form-control" value="<?php echo  date("d-m-Y", strtotime($find_customer_info->con_date));?>"
                                  >
                </div>
                 <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                <label>Package</label>
                <select class="form-control" name="package" id="package">
                  <option>Select Package</option>
                  <?php foreach ($package_List as $vzv) { ?> 
                  <option <?php echo ($find_customer_info->package ==  $vzv->id) ? ' selected="selected"' : '';?> value="<?php echo $vzv->id; ?>"><?php echo $vzv->name; ?></option>
					<?php } ?>
                </select>
              </div>
                    </div>
					
                </div>
			  <div class="row">
					<div class="col-md-12">
                        <div class="form-group">
                <label>Speed</label>
                 <input type="text" name="Speed" id="Speed" value="<?php echo $find_customer_info->Speed; ?>" readonly class="form-control"
                           placeholder="Speed">
              </div>
                    </div>
                </div>
                <div class="form-group">
                <label>Clint IP</label>
                 <input type="text" name="Clint_IP" value="<?php echo $find_customer_info->Clint_IP; ?>" class="form-control"
                           placeholder="Clint IP">
              </div>
                
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" required="required" name="status" id="status">
                    <option <?php echo ($find_customer_info->status ==  '1') ? ' selected="selected"' : '';?> value="1">Active </option>
                    <option <?php echo ($find_customer_info->status ==  '0') ? ' selected="selected"' : '';?>  value="0">Inactive </option>
                  </select>
                </div>
                
              </div>
            </div>
          </div>
          <div class="row" style="text-align: center; padding: 5px 0px 15px 25px; font-size: 12px;">
            <button type="submit" class="btn btn-success" name="update">Update</button>
          </div>
        </form>
      </div>
      <hr>
      <!-- Modal Start-->
      <div class="modal fade" id="addZoneModal" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title text-center">Insert New Zone</h4>
            </div>
            <form method="post">
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
      <!--============== jquery part ===================-->
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

            $('select[name="package"]').select2({
                placeholder: "Select a Profile",
                allowClear: true,
            });

            $('input[name="connection_date"]').datepicker({
                autoclose: true,
                toggleActive: true,
                format: 'dd-mm-yyyy'
            });
            // while package change autometic bill and speed will be updated
        $('select#packageList').on('change', function () {
            var package = $('select#packageList option:selected').val();
            var speed = $('select#packageList option:selected').data('speed');
            var bill = $('select#packageList option:selected').data('bill');

            $("div#billAmount input[name='taka']").val(bill);
            $("div#netSpeed input[name='mb']").val(speed);

        }); // on change

            $('input[name="running_month_due_have"]').prop('disabled', true);
            $('input[name="connection_charge_due_have"]').prop('disabled', true);

        });

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
        $(document).ready(function () {
            $.post("view/ajax_action/ajax_data_return.php", function (data) {

                $('div#header_area span.due_bill_amount').html(data.duePayment.toLocaleString());

            }, "json");
        });
    </script>
</body>
</html>
