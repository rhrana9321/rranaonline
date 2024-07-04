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
          <h4>Add Customer Complane</h4>
        </div>
      </div>
      <div class="col-md-12"
     style=" margin-top:5px; margin-bottom: 5px; font-size:14px;  color:red; font-weight:bold; text-align: center;"> <b></b> </div>
      <div class="row">
        <form role="form" id="loadingId" enctype="multipart/form-data" action="<?php echo site_url('software/Complain_Template/store');?>" method="post">
          <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
              <label>Complain Template Details</label>
              <textarea class="form-control" name="comments" id="ResponsiveDetelis" rows="6" required></textarea>
            </div>
            <div class="form-group text-center">
			   <button type="submit" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..." class="abcd btn btn-success"><span> Add Complaine Template</span></button>
            </div>
          </div>
        </form>
      </div>
      <hr>
      <div class="col-md-8 col-md-offset-2">
        <div class="table-responsive">
          <table style="margin-left:-15px;" class="table table-bordered table-hover table-striped" id="datatable">
            <thead>
              <tr>
                <th class="text-center">SL</th>
                <th class="text-center">Details</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
			<?php $i =1; foreach ($complain_template_table_List as $v) { ?>
            <tr>
              <td class="text-center"><?php echo $i++;?></td>
              <td class="text-center"><?php echo $v->comments;?></td>
              <td class="text-center"><div class="btn-group"> <a class="btn btn-xs btn-info" style="padding:5px;"
                                   href="<?php echo site_url('software/Complain_Template/edit/' .$v->id);?>"> <span class="glyphicon glyphicon-edit"></span> </a> <a href="<?php echo site_url('software/Complain_Template/delete/' .$v->id);?>"
                                   class="btn btn-xs btn-danger" onClick="return confirm('Are you sure you want to delete this zone?');" style="padding:5px;"> <span class="glyphicon glyphicon-remove"></span> </a> </div></td>
            </tr>
            <?php } ?>
            
          </table>
        </div>
      </div>
      <script>
    $('select[name="customer_id"]').select2({
        placeholder: "Select",
        allowClear: true,
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
       $(function() { 
    $("#loadingId").on('submit', function(){
		$(".abcd").button('loading');
		//$(this).button('reset');      
    });
}); 
    </script>
<script>
        $(document).ready(function () {
            $.post("view/ajax_action/ajax_data_return.php", function (data) {

                $('div#header_area span.due_bill_amount').html(data.duePayment.toLocaleString());

            }, "json");
        });
    </script>
</body>
</html>
