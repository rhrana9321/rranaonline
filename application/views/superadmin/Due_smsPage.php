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
        <div class="col-md-12 bg-teal-800">
          <h4>Add Custome SMS <small>For Individual Customer</small></h4>
        </div>
      </div>
      <div class="col-md-12"
     style=" margin-top:5px; margin-bottom: 5px; font-size:14px;  color:red; font-weight:bold; text-align: center;"> <b></b> </div>
      <div class="row">
        <form role="form" enctype="multipart/form-data" action="<?php echo site_url('software/Add_Custome_SMS/due_action');?>" method="post">
          <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
              <label>Custome SMS Header</label>
              <textarea class="form-control" onKeyUp="countCharH(this)" name="header_sms" id="ResponsiveDetelis"
                          rows="2"><?php echo $add_customer_sms_tableList->header_sms; ?></textarea>
              <div class="float-left" style="margin-left: 523px;"><span id="charNumH"></span></div>
            </div>
            <div class="form-group">
              <label>Custome SMS Details</label>
              <textarea class="form-control" onKeyUp="countCharB(this)" name="sms_details" id="ResponsiveDetelis"
                          rows="6"><?php echo $add_customer_sms_tableList->sms_details; ?></textarea>
              <div class="float-left" style="margin-left: 523px;"><span id="charNumB"></span></div>
            </div>
            <div class="form-group text-left">
              <button type="submit" class="btn btn-primary" name="submit">SAVE SMS</button>
            </div>
          </div>
        </form>
		
		
		
		
        
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <input type="hidden" name="header_sms" id="header_sms" value="<?php echo $add_customer_sms_tableList->header_sms; ?>"/>
			  <input type="hidden" name="comments" id="comments" value="<?php echo $add_customer_sms_tableList->sms_details; ?>"/>
			  <div class="col-md-2"></div>
              <div class="col-md-6" style="padding-left:50px;">
                <div class="form-group">
                  <select class="form-control" name="zone" id="zone">
              <option></option>
			  <?php foreach ($zone_List as $zzv) { ?> 
              <option value="<?php echo $zzv->id; ?>"> <?php echo $zzv->zoneName; ?></option>
			  <?php } ?>
             
            </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary" id="comments_send">SEND SMS </button>
                </div>
              </div>
            </div>
          </div>
       
      </div>
      <hr>
      <script type="text/javascript">
     function countCharH(val) {
        var len = val.value.length;
        if (len >= 60) {
          val.value = val.value.substring(0, 60);
        } else {
          $('#charNumH').text(60 - len);
        }
      };
      function countCharB(val) {
        var len = val.value.length;
        if (len >= 160) {
          val.value = val.value.substring(0, 160);
        } else {
          $('#charNumB').text(160 - len);
        }
      };
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
    $("#comments_send").on('click', function(){
	var header_sms 	= $("#header_sms").val();
	var comments 	= $("#comments").val();
	var zone 		= $("#zone").val();
	var urlmgs = "<?php echo site_url('software/Add_Custome_SMS/Due_sms_action');?>";
	$.ajax({
		url:urlmgs,
		type:"POST",
		data:{header_sms:header_sms,comments:comments,zone:zone},
		success:function(data){
			location.reload();	
		}
	});
});
    </script>
</body>
</html>
