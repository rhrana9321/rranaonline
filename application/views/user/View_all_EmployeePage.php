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
      <style>

    #datatable_view_agent_filter input {
        height: 30px;
        border-radius: 5px;
        padding: 5px;
    }
</style>
      <div class="row">
        <div class="col-md-12 padding_5_px"> </div>
      </div>
     
      <!-- all user show -->
      <div id="div_all" class="row" style="padding:10px;font-size: 12px;">
        <div class="col-md-12">
          <div class="table-responsive">
            <h4 class="text-teal-800">View All Employee: <span id="totalBillAmount"></span></h4>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                 <th style="background:#444444; color:#FFFFFF;" class="col-md-1">SL</th>
				<th style="background:#444444; color:#FFFFFF;" class="col-md-1">Employee ID</th>
				<th style="background:#444444; color:#FFFFFF;" class="col-md-1">Employee Name</th>
				<th style="background:#444444; color:#FFFFFF;" class="col-md-1">Employee Designation</th>
				<th style="background:#444444; color:#FFFFFF;" class="col-md-1">Employee Mobile No</th>
				 <th style="background:#444444; color:#FFFFFF;" class="col-md-1">National ID</th>
				<th style="background:#444444; color:#FFFFFF;" class="col-md-1">Employee Address</th>
				<th style="background:#444444; color:#FFFFFF;" class="col-md-1">Employee Blood Group</th>
				<th style="background:#444444; color:#FFFFFF;" class="col-md-1">Employee Join Date</th>
				<th style="background:#444444; color:#FFFFFF;" class="col-md-1">Photo</th>
				<th style="background:#444444; color:#FFFFFF;" class="col-md-1">Action</th>
            </tr>
        </thead>
        <tbody>
		 <?php 
		 $i = 1; 
		 foreach ($Employee_List as $v) {
		 ?> 
            <tr>
                <td><?php echo $i++; ?></td>
                <td>EMPL<?php echo $v->employee_id; ?>  </td>
                <td><a href="#"><?php echo $v->name; ?></a></td>
				<td><?php echo $v->designation; ?></td>
                <td><?php echo $v->mobile; ?></td>
                <td><?php echo $v->national_id; ?></td>
                <td><?php echo $v->details; ?></td>
                <td><?php echo $v->blood_group; ?></td>
				<td><?php echo $v->con_date; ?></td>
                <td><img title="Visit Site" alt="Our logo" src="<?php echo base_url('upload/' .$v->logo_image);?>" width="45" height="45"> </td>
				 <td> <a href="<?php echo site_url('software/Add_New_Employee/edit/' .$v->auto_id);?>"><span class="glyphicon glyphicon-edit"></span> </a>| <a href="<?php echo site_url('software/Add_New_Employee/delete/' .$v->auto_id);?>"><span class="glyphicon glyphicon-remove"></span></a></td>
            </tr>
		<?php } ?>
			
        </tbody>
        
    </table>
          </div>
        </div>
      </div>
      <!-- Modal Start-->
      <div class="modal fade" id="zoneAdd" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title text-center">Insert New Zone for <span id="modalCompanyName"></span></h4>
            </div>
            <form method="post">
              <div class="modal-body">
                <div class="row" style="padding:0 10px;">
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="row">
                        <label>Zone Name</label>
                        <input type="hidden" name="zoneId" value="" class="form-control">
                        <select class="form-control" name="zoneName" required>
                          <option value="">---Provide Zone Name---</option>
                          <option value="14">zone1</option>
                          <option value="15">zone2</option>
                          <option value="16">zone3</option>
                          <option value="19">zone5</option>
                          <option value="20">zone6</option>
                          <option value="22">Free User</option>
                          <option value="23">demo2334</option>
                          <option value="24">test88</option>
                          <option value="26">fgfd3</option>
                          <option value="27">fdefdfd</option>
                          <option value="28">fweew</option>
                          <option value="29">httra</option>
                          <option value="30">noapara</option>
                          <option value="31">ch6t43</option>
                          <option value="32">ch6t43</option>
                          <option value="33"></option>
                          <option value="34">joynal tower</option>
                          <option value="35"></option>
                          <option value="36">Chandpur</option>
                          <option value="37">CHOR BOZRA</option>
                          <option value="38">adabor</option>
                          <option value="39"></option>
                          <option value="40">MIrpur</option>
                          <option value="41"></option>
                          <option value="42">MIrpur</option>
                          <option value="43">MIrpur</option>
                          <option value="44">sripur</option>
                          <option value="45">sripur</option>
                          <option value="46">uttara</option>
                          <option value="47">Jessore</option>
                          <option value="48">MIrpur</option>
                          <option value="49">nekun jo</option>
                          <option value="50">nekun jo</option>
                          <option value="51">MIrpur</option>
                          <option value="52"></option>
                          <option value="53">1</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group text-center">
                      <button type="submit" class="btn btn-default" name="zoneUpdateSubmit"> Update Zone </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      
    </div>
    <!-- ============== End Container ========================== -->
  </div>
  <div class="col-md-12" id="footer" class="box">
  <p class="f-right" style="font-size:11px;">&copy; 2020 <a href="#" target="_blank">ISP
    Company Software.</a>, All Rights Reserved</p>
</div>
</div>
<script>
       $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
</body>
</html>
