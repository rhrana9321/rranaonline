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
<style>
.important2 {
 padding-left:20px; border:1px #428bca solid; background:#428bca; color:#FFFFFF; padding:4px;
}

.important {
  padding-left:20px; border:1px #FF0000 solid; background:#FF0000; color:#FFFFFF; padding:4px;
}
</style>
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
      <div class="row">
        <div class="col-md-12 bg-teal-800" style="margin-bottom: 15px; padding:10px 0px 3px 15px; font-size:16px; font-family:Lucida Sans Unicode;">
          <div class="col-md-4"> <b>View Customer Information</b> </div>
		  
		  <?php 
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
		  
		  
		  
          <div class="col-md-4 text-center" style="color: #dbdbdb;"> <small class="padding_3_10_px btn-success">Active : <span class="badge"><?php echo $total_a_c; ?></span> Incative : <span class="badge"><?php echo $total_ina_c; ?></span> </small> </div>
          <div class="col-md-3" style="margin-left: -230px;margin-bottom: -24px;"> <a href="<?php echo site_url('software/Customer_info/print_coustomer');?>" target="_blank" class="btn btn-primary btn-xs pull-right" >Print Client List </a> </div>
          <div class="col-md-4"> <a class="btn btn-primary btn-sm pull-right" href="<?php echo site_url('software/New_customer_add');?>">ADD NEW<span class="glyphicon
        glyphicon-plus"></span></a> </div>
        </div>
      </div>
      <div class="row" id="print_row" style="margin-bottom:10px;">
        <div class="col-md-6 text-center">
          <div class="btn-group" id="active_inactive_list" role="group" style="margin-left: 233px;">
            <button class="btn btn-default all active">View All</button>
            <button class="btn btn-default active2">Only Active</button>
            <button class="btn btn-default inactive">Only Inactive</button>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 text-center" style="margin-left: 178px;">
            <select class="form-control" name="zone" id="zone" required>
              <option></option>
			  <?php foreach ($zone_List as $zzv) { ?> 
              <option value="<?php echo $zzv->id; ?>"> <?php echo $zzv->zoneName; ?></option>
			  <?php } ?>
             
            </select>
          </div>
          
        </div>
      </div>
      <!-- all user show -->
      <div id="div_all" class="row" style="padding:10px;font-size: 12px;">
        <div class="col-md-12" id="reportdetails">
		<div class="progress prgbar" style="display:none;">
		  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
			<span class="sr-only"></span>
		  </div>
		</div>
     		 <div class="row progress prgbar" style="display:none; padding-top:20px;">
        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> <span class="sr-only"></span> </div>
      </div>
          <div class="table-responsive">
		  <?php $total_duess = $this->M_cloud->findAll('customer_table', 'custo_id asc'); ?>
		  <?php
$total_due = 0;
foreach ($total_duess as $mon_value2234) {
$total_due = $total_due + $mon_value2234->taka;
?>
<?php } ?>
            <h4 class="text-teal-800">Total Bill Amount: <?php echo $total_due; ?> taka</h4>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                 <th style="background:#444444; color:#FFFFFF;" class="col-md-1">SL</th>
                    <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Customer ID</th>
                    <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Customer Name</th>
                    <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Address</th>
                    <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Mobile No</th>
                    <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Bill Amount</th>
                    <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Connection Date</th>
                    <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Zone</th>
                    <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Remarks</th>
                    <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Status</th>
                    <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Action</th>
            </tr>
        </thead>
        <tbody>
		 <?php 
		 $i = 1; 
		 foreach ($all_customer_List as $v) {
		 $zone_infoList = $this->M_cloud->findbyidstock('zone_table', array('id'=> $v->zone)); 
		 ?> 
            <tr>
                <td><?php echo $i++; ?></td>
                <td><a href="<?php echo site_url('software/Bill_Collection/payment_history/' .$v->custo_id);?>">CUS<?php echo $v->customer_id_create; ?> </a>&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; 
				<span data-id="<?php echo $v->customer_id_create ?>" data-mobile="<?php echo $v->mobile ?>" class="glyphicon glyphicon-envelope sms_class slide important2" id="loc<?php echo $v->customer_id_create;?>"></span>
				</td>
                <td><a href="<?php echo site_url('software/Customer_info/details/' .$v->custo_id);?>"><?php echo $v->name; ?></a></td>
                <td><?php echo $v->details; ?></td>
                <td><?php echo $v->mobile; ?></td>
                <td><?php echo $v->taka; ?></td>
                <td><?php echo $v->con_date; ?></td>
                <td><?php echo $zone_infoList->zoneName; ?></td>
                <td><a target="_blank" class="btn btn-xs btn-primary" style="padding:5px;" href="<?php echo site_url('software/Customer_info/remarks/' .$v->custo_id);?>"><span class="glyphicon glyphicon-paperclip"></span>Remarks</a></td>
                <td>
					<?php if($v->status =='1'){ ?>
					<buttton class="padding_5_px btn-success btn-xs">Active</span></button>
					<?php } else if($v->status =='0'){ ?>
					<buttton class="padding_5_px btn-danger btn-xs">Inactive</span></button>
					<?php } ?>
				</td>
				 <td> <a href="<?php echo site_url('software/Customer_info/edit/' .$v->custo_id);?>"><span class="glyphicon glyphicon-edit"></span> </a>| <a href="<?php echo site_url('software/Customer_info/delete/' .$v->custo_id);?>"><span class="glyphicon glyphicon-remove"></span></a></td>
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

$(".all").on('click', function(){
	$('.prgbar').css('display', 'block');
	var zone = $("#zone").val();
	var urlmgs = "<?php echo site_url('software/Customer_info/allshowreport'); ?>";
	$.ajax({
		url:urlmgs,
		type:"POST",
		data:{zone:zone},
		success:function(data){
			$("#reportdetails").html(data);
			$('.prgbar').css('display', 'none');
		}
	});
});

$(".active2").on('click', function(){
	$('.prgbar').css('display', 'block');
	var zone = $("#zone").val();
	var urlmgs = "<?php echo site_url('software/Customer_info/activeshowreport'); ?>";
	$.ajax({
		url:urlmgs,
		type:"POST",
		data:{zone:zone},
		success:function(data){
			$("#reportdetails").html(data);
			$('.prgbar').css('display', 'none');
		}
	});
});

$(".inactive").on('click', function(){
	$('.prgbar').css('display', 'block');
	var zone = $("#zone").val();
	var urlmgs = "<?php echo site_url('software/Customer_info/inactiveshowreport'); ?>";
	$.ajax({
		url:urlmgs,
		type:"POST",
		data:{zone:zone},
		success:function(data){
			$("#reportdetails").html(data);
			$('.prgbar').css('display', 'none');
		}
	});
});




$("#zone").on('change', function(){
	$('.prgbar').css('display', 'block');
	var zone = $("#zone").val();
	var urlmgs = "<?php echo site_url('software/Customer_info/zoneshowreport'); ?>";
	$.ajax({
		url:urlmgs,
		type:"POST",
		data:{zone:zone},
		success:function(data){
			$("#reportdetails").html(data);
			$('.prgbar').css('display', 'none');
		}
	});
});


    </script>
	<script>
        //$(".edit").click(function(e)
		$(document).on("click", ".sms_class[data-id]", function(e)
		{
			var id 			= $(this).attr("data-id");
			var mobile 		= $(this).attr("data-mobile");
			$(".slide[data-id=" + $(this).data('id') + "]").removeClass("important2");
			$(".slide[data-id=" + $(this).data('id') + "]").addClass("important");
			var formURL = "<?php echo site_url('software/Customer_info/sms_send'); ?>";			
			$.ajax(
			{
				url : formURL,
				type: "POST",
				data : {id:id,mobile:mobile},
				dataType: "json",
				success:function(data){
				
				}
			});
			
			e.preventDefault();
		});
	//update End
    </script>
</body>
</html>
