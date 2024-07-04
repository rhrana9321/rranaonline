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
        <div class="col-md-12 bg-slate-800" style="margin-top:20px; margin-bottom: 15px;">
          <div class="col-md-10">
            <h4><strong>View  Expense Report Sheet </strong> </h4>
          </div>
          <div class="col-md-2">  </div>
        </div>
        <div id="select_date" class="col-md-12 bg-slate-800" style="margin-bottom: 20px;padding:5px 0px">
          <div class="col-md-2">
            <label class="control-label" style="padding-top:5px" for="dateMonth">Select Date : </label>
          </div>
          <div class="col-md-2">
            
          </div>
          <div class="col-md-4">
            <input class="form-control" required="required" value="" type="date" name="date"
                   placeholder="Select Date" id="date">
          </div>
          <div class="col-md-4">
            <button class="btn btn-primary btn-sm daywiseviewAll">Submit  </button>
          </div>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-2 pull-right">
          <button class="btn btn-primary btn-sm" onClick="printDiv('month_table')">Click to Print</button>
        </div>
      </div>
      <div id="month_table" onMouseOver="marginchange()">
        <div class="row" style="font-size:14px;">
          <div class="col-md-12 reportdetailsday">
		   <div class="progress prgbar" style="display:none;">
		  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
			<span class="sr-only"></span>
		  </div>
		</div>
     		 <div class="row progress prgbar" style="display:none; padding-top:20px;">
        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> <span class="sr-only"></span> </div>
      </div>
            <h4 id="print_header" class="text-center"></h4>
            <table class="table table-responsive table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th>SL No.</th>
                  <th>Account Head</th>
                  <th>Expense</th>
                </tr>
              </thead>
              <tbody>
			  
			   <?php $i=1; 
			   $total_amount = 0; 
			   foreach ($expense_table_List as $v) { 
			    $total_amount =  $total_amount +$v->totalamount;
				$header_name = $this->M_cloud->findbyidstock('account_head_table', array('id'=> $v->header_name));
				
			   ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><a href="<?php echo site_url('software/Expense_Report/Expense_details/' .$v->header_name);?>"> <?php echo $header_name->name; ?> </a> </td>
                  <td><?php echo $v->totalamount; ?></td>
                </tr>
              <?php } ?>
				
                <tr>
                  <td colspan="2" class="text-center"><b>Total Expense</b></td>
                  <td><b><?php echo $total_amount; ?></b></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <script>
    function formateDate(dateObject){
        var monthNames = [
            "Jan", "Feb", "March",
            "April", "May", "June", "July",
            "Aug", "Sept", "Oct",
            "Nov", "Dec"
        ];

        return (dateObject.getDate() + " " + monthNames[(dateObject.getMonth())] + " " + dateObject.getFullYear());

    };
    $(document).ready(function () {
        $('input[name="date"]').datepicker({
            autoclose: true,
            toggleActive: true,
            format: 'yyyy-mm-dd'
        });

        $('input[name="date"]').on('change', function () {
            var date = $(this).val().replace(/-/g,'/');// the replace(/-/g,'/') code is given to support firefox date() function
            if (date) {
                var preDateobject = new Date(date);
                getDataFromDate(preDateobject);
                showDateInHeader(preDateobject);
            }

        });

       
        

       
    function printDiv(divName) {
        $("table").find('a').each(function () {
            $(this).attr('href', '');
        });
        dateObject = new Date($('input[name="date"]').val().replace(/-/g,'/'));

        $('h4#print_header').html('Print expense report for date: ' + formateDate(dateObject));
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        $('h4#print_header').html('');
    }
    function marginchange() {
        $(".print").css("margin-left", "-30px");
    }
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
      $(".daywiseviewAll").on('click', function(){
	$('.prgbar').css('display', 'block');
	var date =  $("#date").val();
	
	var urlmgs = "<?php echo site_url('software/Expense_Report/dayshowreport'); ?>";
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
