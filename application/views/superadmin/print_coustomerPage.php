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

<table id="example" class="table table-striped" style="width:100%">
        <thead>
		<tr>
                <th colspan="4" style="background:#FFFFFF; color:#000000; text-align:left; font-size:16px; border-right:#FFFFFF 1px solid;" class="col-md-1"><img title="Visit Site" alt="Our logo" src="<?php echo base_url('upload/' .$superdetails->logo_image);?>" width="100" height="45"></th>
				<th colspan="2" style="background:#FFFFFF; color:#000000; text-align:center; font-size:13px; border-left:#FFFFFF 1px solid;" class="col-md-1">All Clints &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
				<th colspan="4" style="background:#FFFFFF; color:#000000; text-align:right; font-size:11px; border-left:#FFFFFF 1px solid; width:10%;" class="col-md-1"><?php echo $superdetails->companyname; ?><br/><?php echo $superdetails->address; ?></th>
                  
            </tr>
            <tr>
                 <th style="background:#444444; color:#FFFFFF;border:#dddddd 1px solid;font-size:10px;" class="col-md-1">SL</th>
                    <th style="background:#444444; color:#FFFFFF;border:#dddddd 1px solid;font-size:10px;" class="col-md-1">Customer ID</th>
                    <th style="background:#444444; color:#FFFFFF;border:#dddddd 1px solid;font-size:10px;" class="col-md-1">Customer Name</th>
                    <th style="background:#444444; color:#FFFFFF;border:#dddddd 1px solid;font-size:10px;" class="col-md-1">Address</th>
                    <th style="background:#444444; color:#FFFFFF;border:#dddddd 1px solid;font-size:10px;" class="col-md-1">Mobile No</th>
					 <th style="background:#444444; color:#FFFFFF;border:#dddddd 1px solid;font-size:10px;" class="col-md-1">Clint IP</th>
                    <th style="background:#444444; color:#FFFFFF;border:#dddddd 1px solid;font-size:10px;" class="col-md-1">Package</th>
                    <th style="background:#444444; color:#FFFFFF;border:#dddddd 1px solid;font-size:10px;" class="col-md-1">Speed</th>
                    <th style="background:#444444; color:#FFFFFF;border:#dddddd 1px solid;font-size:10px;" class="col-md-1">Bill Amount</th>
                    <th style="background:#444444; color:#FFFFFF;border:#dddddd 1px solid;font-size:10px;" class="col-md-1">Connection Date</th>
                    <th style="background:#444444; color:#FFFFFF;border:#dddddd 1px solid;font-size:10px;" class="col-md-1">Zone</th>
                    <th style="background:#444444; color:#FFFFFF;border:#dddddd 1px solid;font-size:10px;" class="col-md-1">Status</th>
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
                <td style="border:#dddddd 1px solid;"><?php echo $i++; ?></td>
                <td style="border:#dddddd 1px solid;">CUS<?php echo $v->customer_id_create; ?> </td>
                <td style="border:#dddddd 1px solid;"><?php echo $v->name; ?></td>
                <td style="border:#dddddd 1px solid;"><?php echo $v->details; ?></td>
                <td style="border:#dddddd 1px solid;"><?php echo $v->mobile; ?></td>
				
				 <td style="border:#dddddd 1px solid;"><?php echo $v->Clint_IP; ?></td>
                <td style="border:#dddddd 1px solid;"><?php echo $packageList->name; ?></td>
                <td style="border:#dddddd 1px solid;"><?php echo $packageList->Speed; ?></td>
				
				
				
				
				
                <td style="border:#dddddd 1px solid;"><?php echo $v->taka; ?></td>
                <td style="border:#dddddd 1px solid;"><?php echo $v->con_date; ?></td>
                <td style="border:#dddddd 1px solid;"><?php echo $zone_infoList->zoneName; ?></td>
                <td style="border:#dddddd 1px solid;">
					<?php if($v->status =='1'){ ?>
					<buttton class="padding_5_px btn-success btn-xs">Active</span></button>
					<?php } else if($v->status =='0'){ ?>
					<buttton class="padding_5_px btn-danger btn-xs">Inactive</span></button>
					<?php } ?>
				</td>
				 
            </tr>
		<?php } ?>
			
        </tbody>
        
    </table>
</body>
</html>
	<script language="javascript" type="text/javascript">
 window.print();
</script>