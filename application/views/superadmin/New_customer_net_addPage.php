<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<title>ISP Soft</title>
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
          <h4> <strong>Create New Customer as CUS01109 </strong> </h4>
        </div>
      </div>
      <div class="row" style="padding:10px; font-size: 12px;">
        <form role="form" action="add/add_agent_action.php" method="post" style="padding:10px; font-size: 12px;">
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
                <label>Mac Address</label>
                <input type="text" name="macaddress" class="form-control">
              </div>
              <div class="form-group">
                <label>National Id/Passport Number</label>
                <input type="text" name="national_id" class="form-control"
                    >
              </div>
              <div class="form-group">
                <label>Address</label>
                <textarea class="form-control" name="details" id="ResponsiveDetelis" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label class="pull-left">Select Billing Person</label>
                <select class="form-control" name="billingperson" required="required">
                  <option>Select</option>
                  <option
                                    value="1">BSD</option>
                  <option
                                    value="8">Entry Operator</option>
                  <option
                                    value="14">Karim</option>
                  <option
                                    value="15">DEMO</option>
                  <option
                                    value="16">Kurigram World Travel Agency </option>
                  <option
                                    value="17">Yes</option>
                  <option
                                    value="18">shakim</option>
                  <option
                                    value="19">md Rashed</option>
                  <option
                                    value="20">karim1</option>
                  <option
                                    value="21">Habib</option>
                  <option
                                    value="22">MD HARUN MIA</option>
                  <option
                                    value="23">Piash</option>
                  <option
                                    value="24">Masud Par</option>
                  <option
                                    value="25">company2</option>
                  <option
                                    value="26">tghtr</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="pull-left">Select Zone</label>
                <button type="button" style="padding-top: 0px;padding-bottom : 0px;"
                            class="btn btn-default border-white btn-sm pull-right" data-toggle="modal"
                            data-target="#addZoneModal"> <span class="glyphicon glyphicon-plus"></span> Add Zone </button>
                <select class="form-control" name="zone" required="required">
                  <option></option>
                  <option
                                    value="14">zone1</option>
                  <option
                                    value="15">zone2</option>
                  <option
                                    value="16">zone3</option>
                  <option
                                    value="19">zone5</option>
                  <option
                                    value="20">zone6</option>
                  <option
                                    value="22">Free User</option>
                  <option
                                    value="23">demo2334</option>
                  <option
                                    value="24">test88</option>
                  <option
                                    value="26">fgfd3</option>
                  <option
                                    value="27">fdefdfd</option>
                  <option
                                    value="28">fweew</option>
                  <option
                                    value="29">httra</option>
                  <option
                                    value="30">noapara</option>
                  <option
                                    value="31">ch6t43</option>
                  <option
                                    value="32">ch6t43</option>
                  <option
                                    value="33"></option>
                  <option
                                    value="34">joynal tower</option>
                  <option
                                    value="35"></option>
                  <option
                                    value="36">Chandpur</option>
                  <option
                                    value="37">CHOR BOZRA</option>
                  <option
                                    value="38">adabor</option>
                  <option
                                    value="39"></option>
                  <option
                                    value="40">MIrpur</option>
                  <option
                                    value="41"></option>
                  <option
                                    value="42">MIrpur</option>
                  <option
                                    value="43">MIrpur</option>
                  <option
                                    value="44">sripur</option>
                  <option
                                    value="45">sripur</option>
                  <option
                                    value="46">uttara</option>
                  <option
                                    value="47">Jessore</option>
                  <option
                                    value="48">MIrpur</option>
                  <option
                                    value="49">nekun jo</option>
                  <option
                                    value="50">nekun jo</option>
                  <option
                                    value="51">MIrpur</option>
                  <option
                                    value="52"></option>
                  <option
                                    value="53">1</option>
                </select>
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
                        <input type="checkbox" name="running_month_due_have" value="1">
                        <b>Due</b> </label>
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
                        <input type="checkbox" name="connection_charge_due_have" value="1">
                        <b>Due</b> </label>
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
              <div class="form-group">
                <label class="pull-left">Select Package</label>
                <button type="button" style = "padding-top: 0px;padding-bottom : 0px;" class="btn btn-default btn-sm pull-right" data-toggle="modal" data-target="#addPackageModal"> <span class="glyphicon glyphicon-plus"></span> Add package </button>
                <select class="form-control" name="package" id="packageList">
                  <option></option>
                  <option data-speed = "5mbps" data-bill = "500" value="BRONZE (500)">BRONZE (500)</option>
                  <option data-speed = "12Mbps" data-bill = "1200" value="TITANIUM (1200)">TITANIUM (1200)</option>
                  <option data-speed = "10Mbps" data-bill = "900" value="SPECIAL (900)">SPECIAL (900)</option>
                  <option data-speed = "4Mbps" data-bill = "400" value="MINI (400)">MINI (400)</option>
                  <option data-speed = "3Mbps" data-bill = "300" value="MICRO (300)">MICRO (300)</option>
                  <option data-speed = "15Mbps" data-bill = "1500" value="URANIUM (1500)">URANIUM (1500)</option>
                  <option data-speed = "20Mbps" data-bill = "1800" value="SUPER DUPER PACKAGE (1800)">SUPER DUPER PACKAGE (1800)</option>
                  <option data-speed = "39Mbps" data-bill = "00" value="FREE ">FREE </option>
                  <option data-speed = "1 mb" data-bill = "600" value="P1">P1</option>
                  <option data-speed = "1" data-bill = "500" value="silvert">silvert</option>
                  <option data-speed = "24" data-bill = "35" value="test">test</option>
                  <option data-speed = "1" data-bill = "500" value="silvert">silvert</option>
                  <option data-speed = "1" data-bill = "500" value="silvert">silvert</option>
                  <option data-speed = "2" data-bill = "1000" value="sojol">sojol</option>
                  <option data-speed = "1" data-bill = "500" value="sojol">sojol</option>
                  <option data-speed = "2" data-bill = "1000" value="sojol">sojol</option>
                </select>
              </div>
              <div class="form-group" id ="billAmount">
                <label>Bill Amount</label>
                <input onKeyPress="return numbersOnly(event)" type="text" name="taka" class="form-control"
                           placeholder="Provide Bill Amount">
              </div>
              <div class="form-group" id = "netSpeed">
                <label>Speed</label>
                <input type="text" name="mb" class="form-control"
                           placeholder="Provide Net Speed">
              </div>
              <div class="form-group" id>
                <label>Bill Date</label>
                <input onKeyPress="return numbersOnly(event)" type="text" name="bill_date" class="form-control"
                           placeholder="Provide Bill Date">
              </div>
              <div class="form-group">
                <label>Client IP</label>
                <input type="text" name="ip" value="" class="form-control" placeholder="Provide Unique Ip"
                               required="required"
                               onkeypress="return noSpace(event)">
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
                      <input type="checkbox" name="sms_check" checked value="1">
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
            <button type="submit" class="btn btn-success" name="submit">Save New Customer</button>
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
        $(document).ready(function () {
            $.post("view/ajax_action/ajax_data_return.php", function (data) {

                $('div#header_area span.due_bill_amount').html(data.duePayment.toLocaleString());

            }, "json");
        });
    </script>
</body>
</html>
