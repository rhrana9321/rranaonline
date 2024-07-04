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
 <div class="row" style="padding:5px; font-size: 12px;">
        <div class="row" id="month_print">
          <div class="col-md-12" id="">
            <h4 id="printtitle" class="text-center"></h4>
            <table class="table table-responsive table-bordered table-striped" id="monthly_tbl">
              <thead>
                <tr>
                  <th class="">Sl.</th>
				  <th class="text-center">Out Date</th>
                  <th class="text-center">Item Name</th>
				  <th class="text-center">Item Qty</th>
				  <th class="text-center">Item Price</th>
                  <th class="text-center">Note</th>
                </tr>
              </thead>
              <tbody>
			    <?php 
				$i = 1;
				$total_item = 0;
				foreach ($item_List as $v) { 
				$itemname = $this->M_cloud->findbyidstock('item_manage_table', array('id'=> $v->name));
				$total_item = $total_item +$v->store*$v->price;
				?> 
                <tr id="1" class="pointer">
                  <td class="text-center"><?php echo $i++; ?></td>
				  <td class="text-center"><?php echo $v->cdate; ?></td>
				   <td class="text-center"><?php echo $itemname->name; ?></td>
				  <td class="text-center"><?php echo $v->store; ?></td>
				  <td class="text-center"><?php echo $v->price; ?></td>
                  <td class="text-center"><?php echo $v->note; ?></td>
                </tr>
				<?php } ?>
				
              </tfoot>
            </table>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 bg-slate-800">
          <h4 class="text-center"> <strong><small>Total Price : </small><?php echo $total_item; ?></strong> </h4>
        </div>
        
      </div>
<script>
	$(".viewAll").on('click', function(){
	$('.prgbar').css('display', 'block');
	var id = $("#id").val();
	var dateform = $("#dateform").val();
	var dateto = $("#dateto").val();
	var urlmgs = "<?php echo site_url('software/Item_Manage/storeInshowreport'); ?>";
	$.ajax({
		url:urlmgs,
		type:"POST",
		data:{dateform:dateform,dateto:dateto,id:id},
		success:function(data){
			$("#reportdetails").html(data);
			$('.prgbar').css('display', 'none');
		}
	});
});





    </script>
</body>
</html>
