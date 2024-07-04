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

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>








</head>
<body>
<table style="" class="table table-hover table-striped" id="datatable">
              <thead>
			  <th colspan="2" style="background:#FFFFFF; color:#000000; text-align:left; font-size:16px; border-right:#FFFFFF 1px solid;" class="col-md-1"><img title="Visit Site" alt="Our logo" src="<?php echo base_url('upload/' .$superdetails->logo_image);?>" width="100" height="45"></th>
				<th colspan="2" style="background:#FFFFFF; color:#000000; text-align:center; font-size:13px; border-left:#FFFFFF 1px solid;" class="col-md-1">Store Report &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
				<th colspan="2" style="background:#FFFFFF; color:#000000; text-align:right; font-size:11px; border-left:#FFFFFF 1px solid; width:10%;" class="col-md-1"><?php echo $superdetails->companyname; ?><br/><?php echo $superdetails->address; ?></th>
                <tr>
                  <th style="border:#dddddd 1px solid;">Sl.</th>
                  <th style="border:#dddddd 1px solid;" class="text-center">Item Name</th>
				   <th style="border:#dddddd 1px solid;" class="text-center">Item Price</th>
				   <th style="border:#dddddd 1px solid;" class="text-center">Item In</th>
				   <th style="border:#dddddd 1px solid;" class="text-center">Item Out</th>
                  <th style="border:#dddddd 1px solid;" class="text-center">Store</th>
                </tr>
              </thead>
              <tbody>
			    <?php 
				$i = 1;
				$total_taka = 0;
				foreach ($item_List as $v) {
				$total_taka = $total_taka + $v->price*$v->store;
				?> 
                <tr id="1" class="pointer">
                  <td style="border:#dddddd 1px solid;" class="text-center"><?php echo $i++; ?></td>
				  <td style="border:#dddddd 1px solid;" class="text-center"><?php echo $v->name; ?></td>
				   <td style="border:#dddddd 1px solid;" class="text-center"><?php echo $v->price; ?></td>
				  <td style="border:#dddddd 1px solid;" class="text-center"><?php echo $v->in_qty; ?></td>
				  <td  style="border:#dddddd 1px solid;" class="text-center"><?php echo $v->out_qty; ?></td>
                  <td style="border:#dddddd 1px solid;" class="text-center"><?php echo $v->store; ?></td>
                </tr>
				<?php } ?>
				
              </tfoot>
            </table>
            
             <?php 
		$total_aataka = 0;
		foreach ($add_List as $av) {
		$total_aataka = $total_aataka + $av->price*$av->store;
		?>
		<?php } ?>
		
		<?php 
		$total_outtaka = 0;
		foreach ($out_List as $outv) {
		$total_outtaka = $total_outtaka + $outv->price*$outv->store;
		?>
		<?php } ?>
	  
	 
	  
      <div class="row">
        <div class="col-md-12 bg-slate-800">
          <h4 class="text-center"> <strong><small>Total Balance : </small><?php echo $total_aataka-$total_outtaka; ?> Taka</strong> </h4>
        </div>
        
      </div>
<script>
	$(".viewAll###").on('click', function(){
	$('.prgbar').css('display', 'block');
	var dateform = $("#dateform").val();
	var dateto = $("#dateto").val();
	var urlmgs = "<?php echo site_url('software/Expense_Report/showreport'); ?>";
	$.ajax({
		url:urlmgs,
		type:"POST",
		data:{dateform:dateform,dateto:dateto},
		success:function(data){
			$("#reportdetails").html(data);
			$('.prgbar').css('display', 'none');
		}
	});
});


 $(".daywiseviewAll").on('click', function(){
	$('.prgbar').css('display', 'block');
	var date =  $("#date").val();
	
	var urlmgs = "<?php echo site_url('software/Item_Manage/StorredatewiseReport'); ?>";
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
	<script language="javascript" type="text/javascript">
 window.print();
</script>
</body>
</html>
