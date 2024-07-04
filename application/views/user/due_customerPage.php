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
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
		 <th colspan="11" style="background:#FFFFFF; color:#000000; text-align:center; font-size:24px;" class="col-md-1"><?php echo $superdetails->companyname; ?><br/><?php echo $superdetails->address; ?><br/>View All Due Payment Customer</th>
            <tr>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Customer Name</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Customer ID</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Address</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Zone</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Mobile No</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">C. Date</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Bill Date</th>
				<th style="background:#444444; color:#FFFFFF;" class="col-md-1">Conn. Charge</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Previous Due</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Running Bill</th>
                <th style="background:#444444; color:#FFFFFF;" class="col-md-1">Total<br>Dues</th>
            </tr>
            </tr>
        </thead>
        <tbody>
		 <?php 
			$i = 1; 
			foreach ($all_customer_List as $v) {
			$zone_infoList = $this->M_cloud->findbyidstock('zone_table', array('id'=> $v->zone));
			 
			$date 	= date("Y-m-d");
			$date 	= explode('-', $date); 
			$year 	= $date[0];
			$month  = $date[1];
			$day  	= $date[2];
			//
			$date2 	= date("Y-m-d");
			$date2 	= explode('-', $date2); 
			$year2 	= $date2[0];
			$month2  = $date2[1];
			$day2  	= $date2[2];
			 
			
			$monthNum  = $month2;
			$dateObj   = DateTime::createFromFormat('!m', $monthNum);
			$monthName = $dateObj->format('F');
			$all_due 	= $v->previus_months_due+$v->connection_charge_due_amount+$v->running_bill;
		 	if($all_due > 0){
		 ?> 
            <tr>
				<td><?php echo $v->name; ?></td>
                <td>CUS<?php echo $v->customer_id_create; ?></td>
                <td><?php echo $v->details; ?></td>
				<td><?php echo $zone_infoList->zoneName; ?></td>
                <td><?php echo $v->mobile; ?></td>
				<td><?php echo $v->con_date; ?></td>
                <td><?php echo $v->bill_date; ?>-<?php echo $monthName; ?>-<?php echo $year2; ?></td>
				<td><?php echo $v->connection_charge_due_amount; ?></td>
				<td><?php echo $v->previus_months_due; ?></td>
                <td><?php echo $v->running_bill; ?></td>
                <td><?php echo $v->previus_months_due+$v->connection_charge_due_amount+$v->running_bill; ?></td>
				 
            </tr>
		<?php } } ?>
			
        </tbody>
        
    </table>
	
</body>
</html>
	<script language="javascript" type="text/javascript">
 window.print();
</script>