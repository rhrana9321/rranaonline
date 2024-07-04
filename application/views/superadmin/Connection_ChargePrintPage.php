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
<table id="example" class="table table-striped" style="width:100%">
        <thead>
           <tr>
                <th colspan="2" style="background:#FFFFFF; color:#000000; text-align:left; font-size:16px; border-right:#FFFFFF 1px solid;" class="col-md-1"><img title="Visit Site" alt="Our logo" src="<?php echo base_url('upload/' .$superdetails->logo_image);?>" width="100" height="45"></th>
				<th colspan="4" style="background:#FFFFFF; color:#000000; text-align:center; font-size:13px; border-left:#FFFFFF 1px solid;" class="col-md-1"> Connection Charge &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  </th>
				<th colspan="2" style="background:#FFFFFF; color:#000000; text-align:right; font-size:11px; border-left:#FFFFFF 1px solid; width:10%;" class="col-md-1"><?php echo $superdetails->companyname; ?><br/><?php echo $superdetails->address; ?></th>
            </tr>
		   
		    <tr>
                <th style="background:#444444; color:#FFFFFF;border:#dddddd 1px solid;" class="col-md-1">SL.</th>
                <th style="background:#444444; color:#FFFFFF;border:#dddddd 1px solid;" class="col-md-1">Customer Name</th>
                <th style="background:#444444; color:#FFFFFF;border:#dddddd 1px solid;" class="col-md-1">Customer ID</th>
                <th style="background:#444444; color:#FFFFFF;border:#dddddd 1px solid;" class="col-md-1">Address</th>
                <th style="background:#444444; color:#FFFFFF;border:#dddddd 1px solid;" class="col-md-1">Zone</th>
                <th style="background:#444444; color:#FFFFFF;border:#dddddd 1px solid;" class="col-md-1">Mobile No</th>
                <th style="background:#444444; color:#FFFFFF;border:#dddddd 1px solid;" class="col-md-1">Date</th>
				<th style="background:#444444; color:#FFFFFF;border:#dddddd 1px solid;" class="col-md-1">Conn. Charge</th>
            </tr>
        </thead>
        <tbody>
		 <?php 
			$i = 1;
			$TOTAL_AMOUNT = 0;
			foreach ($all_customer_List as $v) {
			$find_cous = $this->M_cloud->findbyidstock('customer_table', array('custo_id'=> $v->customer_id));
			$zone_infoList = $this->M_cloud->findbyidstock('zone_table', array('id'=> $find_cous->zone));
			
			 
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
			if($v->amount > 0){
			$TOTAL_AMOUNT = $TOTAL_AMOUNT + $v->amount;
		 ?> 
            <tr>
                <td style="border:#dddddd 1px solid;"><?php echo $i++; ?></td>
				<td style="border:#dddddd 1px solid;"><?php echo $find_cous->name; ?></td>
                <td style="border:#dddddd 1px solid;">CUS<?php echo $find_cous->customer_id_create; ?></td>
                <td style="border:#dddddd 1px solid;"><?php echo $find_cous->details; ?></td>
				<td style="border:#dddddd 1px solid;"><?php echo $zone_infoList->zoneName; ?></td>
                <td style="border:#dddddd 1px solid;"><?php echo $find_cous->mobile; ?></td>
				<td style="border:#dddddd 1px solid;"><?php echo $v->payment_date; ?></td>
				<td style="border:#dddddd 1px solid;"><?php echo $v->amount; ?></td>
            </tr>
		<?php } } ?>
		<tfoot>
		<tr>
                
				<td colspan="7" style="border:#dddddd 1px solid;" align="right">Total =</td>
				<td style="border:#dddddd 1px solid;"><?php echo $TOTAL_AMOUNT; ?></td>
            </tr>
			</tfoot>
			
        </tbody>
        
    </table>

<script language="javascript" type="text/javascript">
 window.print();
</script>
</body>
</html>
