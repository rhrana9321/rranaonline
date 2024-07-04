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
    <!-- ============== header close ========================== -->
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
    .setting-list li.list-group-item {
        padding: 3px !important;
    }

    ul.setting-list li.active a {
        background: #0a564c !important;
    }

</style>
      <div class="row bg-teal-800">
        <div class="col-md-12">
          <h4 id="preview_date">Change Setting Of This Software</h4>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-12"> </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <ul id="nav-tabs-wrapper" class="setting-list list-group nav nav-pills nav-stacked">
            <li class="list-group-item active"> <a href="#logo_change" data-toggle="tab"><i class="glyphicon glyphicon-picture"></i> Logo </a> </li>
			<li class="list-group-item"> <a href="#print_invoice" data-toggle="tab"> <i class="glyphicon glyphicon-print"></i> Configuration</a> </li>
            <li class="list-group-item"> <a href="#sms_panel" data-toggle="tab"> <i class="glyphicon glyphicon-envelope"></i> SMS Setting</a> </li>
          
            <li class="list-group-item"> <a href="#excell_info" data-toggle="tab"> <i class="glyphicon glyphicon-file"></i> Excell Sheet</a> </li>
          </ul>
        </div>
        <div class="col-sm-9">
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="logo_change">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Change Logo</h3>
                </div>
                <div class="panel-body">
				 <div style="padding-bottom:10px;"><img class="img-responsive" style="height:40px; width:125px;" src="<?php echo base_url('upload/' .$superdetails->logo_image);?>"/></div>
                  <form method="post" enctype="multipart/form-data" action="<?php echo site_url('software/Settings/logo_updated');?>">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="file" name="logo_image">
                          <p class="help-block">Make Sure Logo Image Size 225 X 86</p>
                        </div>
                      </div>
					  
					  
                    </div>
                    <div class="form-group text-left row">
                      <div class="col-sm-12">
                        <input type="submit" name="logo_image_upload" value="Update Logo Image" class="btn btn-primary"/>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="sms_panel">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">SMS Setting</h3>
                </div>
                <div class="panel-body">
                  <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('software/Settings/sms_updated');?>">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">SMS Panel Company Name</label>
                      <div class="col-sm-8">
                        <input type="text" required name="sms_cname"
                                           value="<?php echo $superdetails->sms_cname; ?>"
                                           class="form-control" placeholder="Company Name">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">SMS Panel User Name</label>
                      <div class="col-sm-8">
                        <input type="text" required name="sms_user"
                                           value="<?php echo $superdetails->sms_user; ?>"
                                           class="form-control" placeholder="User Name">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">SMS Panel Password</label>
                      <div class="col-sm-8">
                        <input type="text" required name="sms_password"
                                           value="<?php echo $superdetails->sms_password; ?>"
                                           class="form-control" placeholder="Password">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">SMS Panel Sender</label>
                      <div class="col-sm-8">
                        <input type="text" required name="sms_sender"
                                           value="<?php echo $superdetails->sms_sender; ?>"
                                           class="form-control" placeholder="SMS Sender">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">SMS Support Number</label>
                      <div class="col-sm-8">
                        <input type="text" required name="support_num"
                                           value="<?php echo $superdetails->support_num; ?>"
                                           class="form-control" placeholder="Support Number">
                      </div>
                    </div>
                    <div class="form-group text-center">
                      <div class="col-sm-12">
                        <input type="submit" name="sms_info_submit" value="Update SMS Info"
                                           class="btn btn-primary"/>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane fade in" id="print_invoice">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Configuration</h3>
                </div>
                <div class="panel-body">
                  <form method="post" class="form-horizontal" action="<?php echo site_url('software/Settings/company_updated');?>">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Company Name</label>
                      <div class="col-sm-8">
                         <input type="text" required name="companyname"
                                           value="<?php echo $superdetails->companyname; ?>"
                                           class="form-control" placeholder="Company Name">
                      </div>
                    </div>
					<div class="form-group">
                      <label class="col-sm-4 control-label">Company Title</label>
                      <div class="col-sm-8">
                         <input type="text" required name="title"
                                           value="<?php echo $superdetails->title; ?>"
                                           class="form-control" placeholder="Company Title">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label class="col-sm-4 control-label">Mobile Number</label>
                      <div class="col-sm-8">
                         <input type="text" required name="company_mobile"
                                           value="<?php echo $superdetails->company_mobile; ?>"
                                           class="form-control" placeholder="Mobile Number">
                      </div>
                    </div>
					<div class="form-group">
                      <label class="col-sm-4 control-label">Address </label>
                      <div class="col-sm-8">
                         <input type="text" required name="address"
                                           value="<?php echo $superdetails->address; ?>"
                                           class="form-control" placeholder="Address">
                      </div>
                    </div>
					
					
                    <div class="form-group text-center" style="padding-right:165px;">
                      <div class="col-sm-12">
                        <input type="submit" name="invoice_style_submit" value="Update Now"
                                           class="btn btn-primary"/>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane fade in" id="excell_info">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Excel Sheet Info Setting</h3>
                </div>
                <div class="panel-body">
                  <form method="post" class="form-horizontal" action="<?php echo site_url('software/Settings/Excel_updated');?>">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Set Company Name</label>
                      <div class="col-sm-8">
                        <input type="text" required name="excel_company_name"
                                           value="<?php echo $superdetails->excel_company_name; ?>"
                                           class="form-control" placeholder="Company Name">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Set Company Title</label>
                      <div class="col-sm-8">
                        <input type="text" required name="excel_company_title"
                                           value="<?php echo $superdetails->excel_company_title; ?>"
                                           class="form-control" placeholder="Company Title">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Set Company Keyword</label>
                      <div class="col-sm-8">
                        <input type="text" required name="excel_company_keyword"
                                           value="<?php echo $superdetails->excel_company_keyword; ?>"
                                           class="form-control" placeholder="Company Keyword">
                      </div>
                    </div>
                    <div class="form-group text-center">
                      <div class="col-sm-12">
                        <input type="submit" name="excel_info_submit" value="Update Excel File Info"
                                           class="btn btn-primary"/>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr>
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
