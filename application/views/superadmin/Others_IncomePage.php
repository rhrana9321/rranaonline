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
      <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
      <div class="row bg-slate-700">
        <div class="col-md-6">
          <h4 id="preview_date">View Others Income Information of</h4>
        </div>
        <div class="col-md-6 " style="margin-top:5px; text-align:right;"> 
						<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> ADD NEW <span class="glyphicon glyphicon-plus"></span></a>
						</div>
						
						
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
 
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color:#000000;">Add Others Income</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-group">
	    <form enctype="multipart/form-data" id="loadingId" action="<?php echo site_url('software/Others_Income/store');?>" method="post">    
					<label style="color:#000000;">Account Head</label>
					<select class="form-control" required="required" name="header_name" id="header_name">
						<option></option>
						<?php foreach ($account_head_List as $av) { ?>
						<option value="<?php echo $av->id; ?>"><?php echo $av->name; ?></option>
						<?php } ?>
					</select>
                       </div>
					   
					   
					<div class="form-group">
                            <label style="color:#000000;">Amount</label>
                           <input onKeyPress="return numbersOnly(event)" required="required" type="text" name="amount"
                           class="form-control" id="ResponsiveTitle">
                         </div>   
					   
       <div class="form-group">
                            <label style="color:#000000;">Account Head Details</label>
                             <textarea class="form-control" style="color:#000000;" name="details" id="ResponsiveDetelis" rows="6"></textarea>
                         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background:#FF0000; color:#FFFFFF;">Close</button>
		<button type="submit" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..." class="abcd btn btn-primary"><span> Save</span></button>
      </div>
    </div>
	</form>
  </div>
</div>				
						
      </div>
      <div class="row">
        <div class="col-md-12"> </div>
      </div>
      <hr>
      <div class="row">
    <div class="col-md-12 bg-grey-800" style="margin-bottom: 20px;padding:5px 0px">
         <form action="<?php echo site_url("software/Others_Income/othersin_wise_print");?>" method="post">
            <div class="col-md-5">
                <div class="form-group">
                    <label class="control-label col-sm-4" style="padding-top:5px" for="dateMonth">Form Date</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control datepicker" autocomplete="off" placeholder="Date" name="dateform"
                               id="from_date">
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label class="control-label col-sm-4" style="padding-top:5px" for="damageRate">To Date</label>
                    <div class="col-sm-8">
                        <input style="color: black;" id="to_date" autocomplete="off" type="text" class="form-control datepicker"
                               placeholder="Date" name="dateto">
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <button type="button" name="search" class="btn btn-primary submit">Search </button>
            </div>
			
        
    </div>
</div>
      <hr>
      <div class="row" style="font-size: 12px;">
        <div class="col-md-12">
          <div class="table-responsive">
		  <div style="padding-bottom:5px;"> <button type="submit" class="btn btn-primary pull-right">Print Others Income</button></div>
		  </form>
		  <div id="month_print" class="list_valu_html">
            <table class="table table-hover table-bordered table-striped" id="datatable_view_expense">
              <thead>
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
                <td><a href="<?php echo site_url('software/Others_Income/Income_history/' .$v->header_name);?>"><?php echo $accpont_head->name; ?></a></td>
                <td><?php echo $v->totalamount; ?></td>
              </tr>
			  
			  
			  <div class="modal" id="BlockModal<?php echo $v->id; ?>">
						  <div class="modal-dialog">
						  <form method="post" id="loadingId_block" enctype="multipart/form-data" action="<?php echo site_url('software/Others_Income/updated');?>"/>
							   <input  type="hidden" value="<?php echo $v->id; ?>" name="id" class="form-control" >
							<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color:#000000;">Edit Expense</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-group">
					<label style="color:#000000;">Account Head</label>
					<select class="form-control" required="required" name="header_name" id="header_name">
						<option></option>
						<?php foreach ($account_head_List as $av) { ?>
						<option <?php if ($v->header_name == $av->name ) echo 'selected' ; ?> value="<?php echo $av->name; ?>"><?php echo $av->name; ?></option>
						<?php } ?>
					</select>
                       </div>
					   
					   
					<div class="form-group">
                            <label style="color:#000000;">Amount</label>
                           <input onKeyPress="return numbersOnly(event)" value="<?php echo $v->amount; ?>" required="required" type="text" name="amount"
                           class="form-control" id="ResponsiveTitle">
                         </div>   
					   
       <div class="form-group">
                            <label style="color:#000000;">Account Head Details</label>
                             <textarea class="form-control" style="color:#000000;" name="details" id="ResponsiveDetelis" rows="6"><?php echo $v->details; ?></textarea>
                         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background:#FF0000; color:#FFFFFF;">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
	</form>
						  </div>
						</div>
			  
			  
			  
			  <?php } ?>
              
              
              <tfoot>
                <tr>
                  <th colspan="2" style="text-align:right;">Total Others Income</th>
                  <th colspan="4"><?php echo $total_amount; ?> tk</th>
                </tr>
              </tfoot>
            </table>
			</div>
          </div>
        </div>
      </div>
      
	  
      <script type="application/javascript"
        src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
      <script type="application/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
	  
	  
    </div>
    <!-- ============== End Container ========================== -->
  </div>
  <div class="col-md-12" id="footer" class="box">
  <p class="f-right" style="font-size:11px;">&copy; 2020 <a href="#" target="_blank">ISP
    Company Software.</a>, All Rights Reserved</p>
</div>
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
	
</body>
</html>
