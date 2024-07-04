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
        <div class="col-md-12 padding_5_px"> </div>
      </div>
		
		<?php
		$total_all = 0;
		foreach ($all_com as $tac) {
		$total_all = $total_all + 1;
		?>
		<?php } ?>
		<?php
		$total_pending = 0;
		foreach ($pending_com as $tpc) {
		$total_pending = $total_pending + 1;
		?>
		<?php } ?>
		<?php
		$total_Solved = 0;
		foreach ($Solved_com as $tsc) {
		$total_Solved = $total_Solved + 1;
		?>
		<?php } ?>
		<?php
		$total_Reviewed = 0;
		foreach ($Reviewed_com as $trc) {
		$total_Reviewed = $total_Reviewed + 1;
		?>
		<?php } ?>
		<?php
		$total_Not_Solved = 0;
		foreach ($Not_Solved_com as $tnsc) {
		$total_Not_Solved = $total_Not_Solved + 1;
		?>
		<?php } ?>
		<?php
		$total_imadi = 0;
		foreach ($imadi_com as $tnsc) {
		$total_imadi = $total_imadi + 1;
		?>
		<?php } ?>
		 
      <div class="row">
        <div class="col-md-12 bg-slate-800">
          <h4>View All Complains</h4>
        </div>
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-body">
              <div id="client_list" class="btn-group btn-group-justified">
                <form action="" method="post">
                  <button type="button" class="btn btn-primary All" value="all">ALL (<?php echo $total_all; ?>)</button>
                  <button type="button" class="btn btn-success Solved" value="3">Solved (<?php echo $total_Solved ; ?>)</button>
                  <button type="button" class="btn btn-warning Pending" value = "1">Pending (<?php echo $total_pending; ?>)</button>
                  <button type="button" class="btn btn-info Reviewed" value="2">Reviewed (<?php echo $total_Reviewed; ?>)</button>
                  <button type="button" class="btn btn-danger Not_Solved" value="4">Not Solved (<?php echo $total_Not_Solved; ?>)</button>
                  <button style="background: #FF3327;" type="button" class="btn btn-info Imminent_Customers" value="im_user_all">Imminent Customers (<?php echo $total_imadi; ?>)</button>
                  <a href="<?php echo site_url('software/Add_Complain');?>">
                  <button type="button" class="btn btn-primary" >Add  Complain</button>
                  </a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="row" style="font-size:12px">
        <div class="col-md-12">
          <div class="reportdetailsday">
		   <div class="progress prgbar" style="display:none;">
		  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
			<span class="sr-only"></span>
		  </div>
		</div>
     		 <div class="row progress prgbar" style="display:none; padding-top:20px;">
        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> <span class="sr-only"></span> </div>
      </div>
            <table class="table table-responsive table-bordered table-hover " id="datatable">
              <thead>
                <tr class="bg-slate-800">
                  <th class="col-md-1">SL</th>
                  <th class="col-md-1">Customer Name</th>
                  <th class="col-md-1">Customer Address</th>
                  <th class="col-md-1">Customer Mobile No.</th>
                  <th class="col-md-2">Complain Details</th>
                  <th class="col-md-2">Complain Date</th>
                  <th class="col-md-1">Solve By</th>
                  <th class="col-md-1">Solve Date</th>
                  <th class="col-md-2">Status</th>
                  <th class="col-md-1">Action</th>
                </tr>
              </thead>
              <tbody>
			  <?php $i =1; foreach ($add_complain_table_List as $v) {?>
                <tr>
                  <td class="text-center"> <?php echo $i++; ?> </td>
                  <td class="text-center"><?php echo $v->customer_id; ?> </td>
                  <td class="text-center"> <?php echo $v->customer_address; ?> </td>
                  <td class="text-center"> <?php echo $v->customer_mobile; ?> </td>
                  <td class="text-center"> <?php echo $v->details; ?> </td>
                  <td class="text-center"> <?php echo $v->complain_date; ?></td>
                  <td class="text-center"> <?php echo $v->employee; ?></td>
                  <td class="text-center"> <?php echo $v->solve_date; ?></td>
                  <td class="text-center">
				  <?php if($v->status == 0){ ?>
				  <buttton class="btn-warning btn-xs">Pending</buttton>
				  <?php } else if($v->status == 1){ ?>
				  <buttton class="btn-warning btn-xs">Solved</buttton>
				  <?php } else if($v->status == 2){ ?>
				  <buttton class="btn-warning btn-xs">Reviewed</buttton>
				   <?php } else if($v->status == 3){ ?>
				  <buttton class="btn-warning btn-xs">Not Solved</buttton>
				  <?php } ?>
                  </td>
                  <td class="text-center action-btn">
				 <a class="edit btn btn-success btn-xs change-status" href="#BlockModal" data-toggle="modal" data-target="#BlockModal<?php echo $v->id; ?>">Change Status </a>
				 
				 <?php if($v->type == 'Add_Imminent_complain'){ ?>
                    <a href="<?php echo site_url('software/Add_Complain_For_Imminent_User/Imminent_com_edit/' .$v->id);?>" class="edit btn btn-success btn-xs change-status">Edit</a>
					<?php } else { ?>
					<a href="<?php echo site_url('software/Add_Complain_For_Imminent_User/add_com_edit/' .$v->id);?>" class="edit btn btn-success btn-xs change-status">Edit</a>
					<?php } ?>
					
					
					
					</td>
                </tr>
				
				
				<div class="modal" id="BlockModal<?php echo $v->id; ?>">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <!-- Modal Header -->
							  <div class="modal-header">
								<h4 class="modal-title">Change Status</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							  </div>
							  <!-- Modal body -->
							  <form method="post" id="loadingId_block" enctype="multipart/form-data" action="<?php echo site_url('software/Add_Complain_For_Imminent_User/Change_status');?>"/>
							   <input  type="hidden" value="<?php echo $v->id?>" name="id" class="form-control" >
							  <div class="modal-body">
							   
								<div class="form-group">
                  <label for="inputEmail3" class="col-sm-5 control-label">Change Status</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <select class="form-control" name="status" required>
                        <option value="">Select</option>
                        <option value="0">Pending</option>
                        <option value="2">Reviewed</option>
                        <option value="3">Not Solved</option>
						<option value="1">Solved</option>
                      </select>
                    </div>
                  </div>
                </div>
								
							  </div>
							  <div class="modal-footer text-center" style="padding-top:40px;">
                <button type="submit" name="submit_due_payment" class="btn btn-primary abc abcd">Change Status</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
							  <!-- Modal footer -->
							</form>
		
							</div>
						  </div>
						</div>
				
				
				
				<?php } ?>
              
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <hr>
      
      <!-- /.modal -->
      
      <!-- /.modal -->
      <!-- Get complains_data -->
      <script>
    function getComplains(value){
        if (value != '') {
            $.ajax({
                url:"modules/complain/getcomplain.php",
                method:"POST",
                data:{complains_data:value},
                dataType:"text",
                success:function(data){
                    $('#complain-list').html(data);
                }
            });
        }
    }
</script>
      <script>
    function numbersOnly(e)
    {
        var unicode = e.charCode ? e.charCode : e.keyCode
        if (unicode != 8) {
            if ((unicode < 2534 || unicode > 2543) && (unicode < 48 || unicode > 57)) {
                return false;
            }
        }
    }

    $(document).ready(function () {

        $('.change-status').on('click',function () {
            var complain_id = $(this).data('id');
            console.log(complain_id);

            $('input[name="complain_id"]').val(complain_id);
        });
    });

    $(document).on("click", ".change-status-new", function () {

        var complain_new_id = $(this).data('id');
            $('input[name="complain_new_id"]').val(complain_new_id);
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
       $(".All").on('click', function(){
		$('.prgbar').css('display', 'block');
		var date =  $("#date").val();
		var urlmgs = "<?php echo site_url('software/Add_Complain_For_Imminent_User/All_Complain'); ?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{date:date},
			success:function(data){
				$(".reportdetailsday").html(data);
				$('.prgbar').css('display', 'none');
			}
		});
	});
	
	$(".Solved").on('click', function(){
		$('.prgbar').css('display', 'block');
		var date =  $("#date").val();
		var urlmgs = "<?php echo site_url('software/Add_Complain_For_Imminent_User/Solved_Complain'); ?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{date:date},
			success:function(data){
				$(".reportdetailsday").html(data);
				$('.prgbar').css('display', 'none');
			}
		});
	});
	
	
	$(".Pending").on('click', function(){
		$('.prgbar').css('display', 'block');
		var date =  $("#date").val();
		var urlmgs = "<?php echo site_url('software/Add_Complain_For_Imminent_User/Pending_Complain'); ?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{date:date},
			success:function(data){
				$(".reportdetailsday").html(data);
				$('.prgbar').css('display', 'none');
			}
		});
	});
	
	
	$(".Reviewed").on('click', function(){
		$('.prgbar').css('display', 'block');
		var date =  $("#date").val();
		var urlmgs = "<?php echo site_url('software/Add_Complain_For_Imminent_User/Reviewed_Complain'); ?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{date:date},
			success:function(data){
				$(".reportdetailsday").html(data);
				$('.prgbar').css('display', 'none');
			}
		});
	});
	
	$(".Not_Solved").on('click', function(){
		$('.prgbar').css('display', 'block');
		var date =  $("#date").val();
		var urlmgs = "<?php echo site_url('software/Add_Complain_For_Imminent_User/Not_Solved_Complain'); ?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{date:date},
			success:function(data){
				$(".reportdetailsday").html(data);
				$('.prgbar').css('display', 'none');
			}
		});
	});
	
	
	$(".Imminent_Customers").on('click', function(){
		$('.prgbar').css('display', 'block');
		var date =  $("#date").val();
		var urlmgs = "<?php echo site_url('software/Add_Complain_For_Imminent_User/Imminent_Customers_Complain'); ?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{date:date},
			success:function(data){
				$(".reportdetailsday").html(data);
				$('.prgbar').css('display', 'none');
			}
		});
	});
	
	
	
	
    </script>
</body>
</html>
