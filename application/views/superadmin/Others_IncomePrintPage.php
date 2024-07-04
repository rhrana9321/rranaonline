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
<div id="month_print">
            <table class="table table-hover table-striped" id="datatable_view_expense">
              <thead>
			   <th colspan="1" style="background:#FFFFFF; color:#000000; text-align:left; font-size:16px; border-right:#FFFFFF 1px solid;" class="col-md-1"><img title="Visit Site" alt="Our logo" src="<?php echo base_url('upload/' .$superdetails->logo_image);?>" width="100" height="45"></th>
				<th colspan="1" style="background:#FFFFFF; color:#000000; text-align:center; font-size:13px; border-left:#FFFFFF 1px solid;" class="col-md-1"> Others Income &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
				<th colspan="1" style="background:#FFFFFF; color:#000000; text-align:right; font-size:11px; border-left:#FFFFFF 1px solid; width:10%;" class="col-md-1"><?php echo $superdetails->companyname; ?><br/><?php echo $superdetails->address; ?></th>
			  
                <tr>
                  <th>SL.</th>
                  <th>Head</th>
                  <th>Amount</th>
                </tr>
              </thead>
			   <?php $i=1; 
			   $total_amount = 0; 
			   foreach ($expense_table_List as $v) {
			   $accpont_head = $this->M_cloud->findbyidstock('account_head_table', array('id'=> $v->header_name));
			    $total_amount =  $total_amount +$v->totalamount;
			   ?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $accpont_head->name; ?></td>
                <td><?php echo $v->totalamount; ?></td>
              </tr>
			  
			  
			  
			  
			  
			  
			  <?php } ?>
              
              
             
                <tr>
                  <th colspan="2" style="text-align:right;">Total Others Income</th>
                  <th colspan="4"><?php echo $total_amount; ?> tk</th>
                </tr>
             
            </table>
			</div>
<script>
       $(function() { 
    $("#loadingId").on('submit', function(){
		$(".abcd").button('loading');
		//$(this).button('reset');      
    });
}); 
    </script>
<script>
    $(document).ready(function () {

        $('input[name="dateform"]').datepicker({
            autoclose: true,
            toggleActive: true,
            format: 'dd-mm-yyyy'
        });

        $('input[name="dateto"]').datepicker({
            autoclose: true,
            toggleActive: true,
            format: 'dd-mm-yyyy'
        });
    });
    function printDiv(divName) {
        $(".print").css("margin-left", "0px");
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
<script>
$('.submit').on('click', function(e){
		var from_date 	= $("#from_date").val();
		var to_date 	= $("#to_date").val();
		var urlmgs = "<?php echo site_url("software/Others_Income/date_to_date");?>";
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
	</script>
	<script language="javascript" type="text/javascript">
 window.print();
</script>
</body>
</html>
