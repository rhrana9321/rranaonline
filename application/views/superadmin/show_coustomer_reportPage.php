

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
		
		 <?php
		$total_alla_c = 0;
		foreach ($total_active_coustomerall as $alav) {
		$total_alla_c = $total_alla_c + 1;
		?>
		<?php } ?>


<div class="row">
        <div class="col-md-12 bg-grey-800">
          <h4 id="new_joining_title">New Joining Customer Information for <?php echo $from_date; ?> to <?php echo $to_date; ?></h4>
        </div>
      </div>
<div class="row" id="date_search_field">
        <div class="panel panel-success">
          <div class="panel-heading"> <b>Please select Date to search Client</b></div>
          <div class="panel-body">
            <form id="date_search" action="" method="POST">
              <div class="col-md-5">
                <div class="form-group">
                  <input type="text" class="form-control datepicker" value="<?php echo $from_date; ?>" autocomplete="off" id="from_date" placeholder="Form Date" name="datefrom"
                               required>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <input type="text" class="form-control datepicker"
                               placeholder="To Date" id="to_date" value="<?php echo $to_date; ?>" autocomplete="off" name="dateto" required>
                </div>
              </div>
              <div class="col-md-2">
                <button type="submit" name="search" class="btn btn-primary submit"> Search</button>
              </div>
            </form>
          </div>
        </div>
      </div>
<div class="row" id="">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-body">
              <div id="client_list" class="btn-group btn-group-justified"> 
			  <a class="btn btn-primary allcustomer">All Client - <span class="badge all_client"><?php echo $total_alla_c; ?></span> </a> 
				  <a class="btn btn-success submitactive">Active Client - <span class="badge all_active"><?php echo $total_a_c; ?></span></a> 
				  <a class="btn btn-danger submitinactive">Inactive Client - <span class="badge all_inactive"><?php echo $total_ina_c; ?></span></a>
            </div>
          </div>
        </div>
        <div class="col-md-12">
		
		 <?php
		 $total_bill = 0; 
		 foreach ($all_customer_List as $tv) {
		 $total_bill = $total_bill + $tv->taka;
		 ?>
		 <?php } ?>
		
		
          <div class="table-responsive active_list_valu_html" style="font-size:12px;">
            <h4 class="text-teal-800">Total Bill Amount: <?php echo $total_bill; ?> Taka</h4>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                 <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">SL</th>
                    <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Customer ID</th>
                    <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Customer Name</th>
                    <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Address</th>
                    <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Mobile No</th>
					<th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Clint IP</th>
					<th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Package</th>
					<th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Speed</th>
                    <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Bill Amount</th>
                    <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Conn. Date</th>
                    <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Zone</th>
                    <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Remarks</th>
                    <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Status</th>
                    <th style="background:#444444; color:#FFFFFF;font-size:10px;" class="col-md-1">Action</th>
            </tr>
        </thead>
        <tbody>
		 <?php 
		 $i = 1; 
		 foreach ($all_customer_List as $v) {
		 $zone_infoList = $this->M_cloud->findbyidstock('zone_table', array('id'=> $v->zone));
		 $packageList = $this->M_cloud->findbyidstock('package_table', array('id'=> $v->package)); 
		 ?> 
            <tr>
                <td style="font-size:11px;"><?php echo $i++; ?></td>
                <td style="font-size:11px;">CUS<?php echo $v->customer_id_create; ?> &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; <span style="padding-left:20px; border:1px #428bca solid; background:#428bca; color:#FFFFFF; padding:4px;" class="glyphicon glyphicon-envelope"></span></td>
                <td style="font-size:11px;"><a href="<?php echo site_url('software/Customer_info/details/' .$v->custo_id);?>"><?php echo $v->name; ?></a></td>
                <td style="font-size:11px;"><?php echo $v->details; ?></td>
                <td style="font-size:11px;"><?php echo $v->mobile; ?></td>
				<td style="font-size:11px;"><?php echo $v->Clint_IP; ?></td>
				<td style="font-size:11px;"><?php echo $packageList->name; ?></td>
				<td style="font-size:11px;"><?php echo $packageList->Speed; ?></td>
                <td style="font-size:11px;"><?php echo $v->taka; ?></td>
                <td style="font-size:11px;"><?php echo $v->con_date; ?></td>
                <td style="font-size:11px;"><?php echo $zone_infoList->zoneName; ?></td>
                <td style="font-size:11px;"><a target="_blank" class="btn btn-xs btn-primary" style="padding:5px;" href="<?php echo site_url('software/Customer_info/remarks/' .$v->custo_id);?>"><span class="glyphicon glyphicon-paperclip"></span>Remarks</a></td>
                <td style="font-size:11px;">
					<?php if($v->status =='1'){ ?>
					<buttton class="padding_5_px btn-success btn-xs">Active</span></button>
					<?php } else if($v->status =='0'){ ?>
					<buttton class="padding_5_px btn-danger btn-xs">Inactive</span></button>
					<?php } ?>
				</td>
				 <td style="font-size:11px;"> <a href="<?php echo site_url('software/Customer_info/edit/' .$v->custo_id);?>"><span class="glyphicon glyphicon-edit"></span> </a>| <a href="<?php echo site_url('software/Customer_info/delete/' .$v->custo_id);?>"><span class="glyphicon glyphicon-remove"></span></a></td>
            </tr>
		<?php } ?>
			
        </tbody>
        
    </table>
          </div>
        </div>
      </div>
	  <script>

       $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
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


        $('#from_date').datepicker({
            autoclose: true,
            toggleActive: true,
            format: 'dd-mm-yyyy'
        });
		
		$('#to_date').datepicker({
            autoclose: true,
            toggleActive: true,
            format: 'dd-mm-yyyy'
        });
		


    }); // document ready function
</script>
<script>
$('.submit').on('click', function(e){
		var from_date 	= $("#from_date").val();
		var to_date 	= $("#to_date").val();
		var urlmgs = "<?php echo site_url("software/New_customer/date_to_date");?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{from_date:from_date,to_date:to_date },
			success:function(data){
				$(".list_valu_html").html(data);
			}
		});
		e.preventDefault();
	});
	
	$('.submitactive').on('click', function(e){
		var from_date 	= $("#from_date").val();
		var to_date 	= $("#to_date").val();
		var urlmgs = "<?php echo site_url("software/New_customer/active_date_to_date");?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{from_date:from_date,to_date:to_date },
			success:function(data){
				$(".active_list_valu_html").html(data);
			}
		});
		e.preventDefault();
	});
	
	$('.submitinactive').on('click', function(e){
		var from_date 	= $("#from_date").val();
		var to_date 	= $("#to_date").val();
		var urlmgs = "<?php echo site_url("software/New_customer/inactive_date_to_date");?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{from_date:from_date,to_date:to_date },
			success:function(data){
				$(".active_list_valu_html").html(data);
			}
		});
		e.preventDefault();
	});
	
	$('.allcustomer').on('click', function(e){
		var from_date 	= $("#from_date").val();
		var to_date 	= $("#to_date").val();
		var urlmgs = "<?php echo site_url("software/New_customer/allactive_date_to_date");?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{from_date:from_date,to_date:to_date },
			success:function(data){
				$(".active_list_valu_html").html(data);
			}
		});
		e.preventDefault();
	});
	
	
</script>