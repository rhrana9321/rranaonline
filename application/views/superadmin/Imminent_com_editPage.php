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
      <div class="row">
        <div class="col-md-12 bg-teal-800">
          <h4>Add Imminent Customers Complane</h4>
        </div>
      </div>
      <div class="col-md-12"
style=" margin-top:5px; margin-bottom: 5px; font-size:14px;  color:red; font-weight:bold; text-align: center;"> <b></b> </div>
      <div class="row">
        <h4 class="text-center">Edit Complain</h4>
		<?php date_default_timezone_set("Asia/Dhaka"); ?>
        <form role="form" enctype="multipart/form-data" action="<?php echo site_url('software/Add_Complain_For_Imminent_User/Imminent_com_Update');?>" method="post">
		<input type="hidden" name="id" value="<?php echo $add_complain_tableList->id; ?>" class="form-control" autocomplete="off" required>
          <div class="col-md-6 col-md-offset-3">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label> Complain Date</label>
                        <input type="text" name="complain_date" value="<?php echo $add_complain_tableList->complain_date; ?>" class="form-control" autocomplete="off" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label> Complain Time</label>
                        <input type="text" value="<?php echo date("h:i:sa"); ?>" value="<?php echo $add_complain_tableList->complain_time; ?>" name="complain_time" class="form-control" autocomplete="off">
                    </div>
                </div>
            </div>
				<div class="form-group">
              <label>Customer Name</label>
             <input type="text" name="customer_name" class="form-control" autocomplete="off" value="<?php echo $add_complain_tableList->customer_id; ?>" placeholder="Name" required>
            </div>
			
			<div class="form-group">
              <label>Customer Address</label>
             <input type="text" name="customer_address" value="<?php echo $add_complain_tableList->customer_address; ?>" class="form-control" autocomplete="off" placeholder="Address" required>
            </div>
			<div class="form-group">
              <label>Customer Cell No.</label>
            <input type="text" name="customer_mobile" value="<?php echo $add_complain_tableList->customer_mobile; ?>" class="form-control" autocomplete="off" placeholder="Ex: 01XXXXXXXXX"/>
            </div>
			
            <div class="form-group">
              <label>Complain Template</label>
             <select name="template" id="template" class="form-control select2" required>
                <option value="">Select Template</option>
                <?php foreach ($complain_template_table_List as $ctv) { ?>
                <option <?php echo ($add_complain_tableList->template ==  $ctv->comments) ? ' selected="selected"' : '';?> value="<?php echo $ctv->comments; ?>"><?php echo $ctv->comments; ?></option>
				<?php } ?>
             
              </select>
            </div>
            <div class="form-group">
              <label>Complain Details</label>
              <textarea class="form-control" name="details" id="details" rows="6" required><?php echo $add_complain_tableList->details; ?></textarea>
            </div>
            <div class="form-group">
              <label>Note</label>
              <textarea class="form-control" name="note"  id="note" rows="6"><?php echo $add_complain_tableList->note; ?></textarea>
            </div>
            <div class="form-group">
              <label>Employee For Solve</label>
               <select name="employee" id="employee" class="form-control select2" required>
                <option value="">Select Employee</option>
               <?php foreach ($Employee_List as $ev) { ?>
                <option <?php echo ($add_complain_tableList->employee ==  $ev->name) ? ' selected="selected"' : '';?> value="<?php echo $ev->name; ?>"><?php echo $ev->name; ?></option>
				<?php } ?>
              </select>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                <input type="checkbox" <?php echo ($add_complain_tableList->sms_check ==  '1') ? ' checked="checked"' : '';?> name="sms_check" value="<?php echo $add_complain_tableList->sms_check; ?>">
                <b>SMS Notification</b> </label>
              </div>
            </div>
            <div class="form-group text-center">
              <button type="submit" class="btn btn-primary" name="submit">Add Complaine</button>
            </div>
          </div>
        </form>
      </div>
      <hr>
	  
	  <script>
    $('select[name="customer_id"]').select2({
        placeholder: "Select",
        allowClear: true,
    });

    $('select[name="template"]').on('change',function () {
        var tempalte = $(this).val();
        $('#complain-details').html(tempalte);
    });

    $('input[name="complain_date"]').datepicker({
        autoclose: true,
        toggleActive: true,
        format: 'dd-mm-yyyy'
    });
    $('input[name="complain_time"]').timepicker();
</script>

	  
	  
      <script>
        $('select[name="customer_id"]').select2({
            placeholder: "Select",
            allowClear: true,
        });

        $('select[name="template"]').on('change',function () {
            var tempalte = $(this).val();
            $('#complain-details').html(tempalte);
        });

        /*$('input[name="complain_date"]').datepicker({
            autoclose: true,
            toggleActive: true,
            format: 'dd-mm-yyyy'
        });*/
        $('input[name="complain_time"]').timepicker();
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
      $("#template").change(function(){
	  var template =  $("#template").val();
	  var details =  $("#details").val();
	  $("#details").val(template);
	});
    </script>
</body>
</html>
