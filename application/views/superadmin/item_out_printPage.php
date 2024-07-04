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
				<th colspan="2" style="background:#FFFFFF; color:#000000; text-align:center; font-size:13px; border-left:#FFFFFF 1px solid;" class="col-md-1">Out Item &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
				<th colspan="3" style="background:#FFFFFF; color:#000000; text-align:right; font-size:11px; border-left:#FFFFFF 1px solid; width:10%;" class="col-md-1"><?php echo $superdetails->companyname; ?><br/><?php echo $superdetails->address; ?></th>
                  <tr>
                    <th style="border:#dddddd 1px solid;" class="text-center">SL</th>
                    <th style="border:#dddddd 1px solid;" class="text-center">Name</th>
					 <th style="border:#dddddd 1px solid;" class="text-center">Note</th>
					<th style="border:#dddddd 1px solid;" class="text-center">Type</th>
					<th style="border:#dddddd 1px solid;" class="text-center">Qty</th>
					<th style="border:#dddddd 1px solid;" class="text-center">Price</th>
					<th style="border:#dddddd 1px solid;" class="text-center">Total Price</th>
                   
                  </tr>
                </thead>
				<?php 
				$i = 1;
				$total_item = 0;
				foreach ($zone_List as $v) {
				$total_item = $total_item + $v->price*$v->store;
				$it_name = $this->M_cloud->findbyidstock('item_manage_table', array('id'=> $v->name));
				?> 
                <tr>
                  <td style="border:#dddddd 1px solid;" class="text-center"><?php echo $i++; ?></td>
                  <td style="border:#dddddd 1px solid;" class="text-center"><?php echo $it_name->name; ?></td>
				   <td style="border:#dddddd 1px solid;" class="text-center"><?php echo $v->note; ?></td>
				  <td  style="border:#dddddd 1px solid;" class="text-center"><?php echo $v->type; ?></td>
				  <td style="border:#dddddd 1px solid;" class="text-center"><?php echo $v->store; ?></td>
				  <td style="border:#dddddd 1px solid;" class="text-center"><?php echo $v->price; ?></td>
				  <td style="border:#dddddd 1px solid;" class="text-center"><?php echo ($v->price*$v->store); ?></td>
                 
                </tr>
              <?php } ?> 
			   <tfoot>
                <tr>
				  <td style="border:#dddddd 1px solid;" colspan="6" class="text-right">Total =</td>
				  <td style="border:#dddddd 1px solid;" class="text-center"><?php echo $total_item; ?></td>
                </tr> 
                 </tfoot>
              </table>
			  <script language="javascript" type="text/javascript">
 window.print();
</script>

<script>
       $(function() { 
    $("#loadingId").on('submit', function(){
		$(".abcd").button('loading');
		//$(this).button('reset');      
    });
}); 
    </script>
<script>
        $("#type").on('change', function(){
		var type = $("#type").val();
		var url   = "<?php echo site_url('software/Item_Manage/item_nameList'); ?>";
		$.ajax({
			url:url,
			type:"POST",
			data:{type:type},
			success:function(data){
				$("#pro_sub_idfsf").html(data);
			}
		
		});
	});
    </script>
	<script>
	$(".viewAll").on('click', function(){
	$('.prgbar').css('display', 'block');
	var dateform = $("#dateform").val();
	var dateto = $("#dateto").val();
	var urlmgs = "<?php echo site_url('software/Item_Manage/storeAddshowreport'); ?>";
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





    </script>
	
</body>
</html>
