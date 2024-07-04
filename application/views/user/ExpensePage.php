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
          <h4 id="preview_date">View Expense Information of 01 May 2020 to 15 May 2020</h4>
        </div>
        <div class="col-md-6 " style="margin-top:5px; text-align:right;"> 
						<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> ADD NEW EXPENSE <span class="glyphicon glyphicon-plus"></span></a>
						</div>
						
						
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form role="form" enctype="multipart/form-data" action="<?php echo site_url('software/Expense/store');?>" method="post">    
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color:#000000;">Add Expense</h5>
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
        <button type="submit" class="btn btn-primary">Save changes</button>
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
      <div class="row bg-slate-700" style="padding:3px;">
        <div class="col-md-12">
          <form action="" method="POST">
            <div class="col-md-5">
              <div class="form-group">
                <label class="control-label col-sm-4" style="padding-top:5px" for="dateMonth">Form Date : </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control datepicker"
                               value="" placeholder="Date"
                               name="dateform"
                               id="new_flight_date" required>
                </div>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label class="control-label col-sm-4" style="padding-top:5px" for="damageRate">To Date : </label>
                <div class="col-sm-8">
                  <input style="color: black;" id="old_flight_date"
                               value="" type="text"
                               class="form-control datepicker"
                               placeholder="Date" name="dateto" required>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <input type="submit" name="search" class="btn btn-primary" value="Search">
            </div>
          </form>
        </div>
      </div>
      <hr>
      <div class="row" style="padding:10px; font-size: 12px;">
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped" id="datatable_view_expense">
              <thead>
                <tr>
                  <th>SL.</th>
                  <th>Date</th>
                  <th>Head</th>
                  <th>Amount</th>
                  <th>Description</th>
                  <th>Last Updated</th>
                  <th>Action</th>
                </tr>
              </thead>
			   <?php $i=1; 
			   $total_amount = 0; 
			   foreach ($expense_table_List as $v) { 
			    $total_amount =  $total_amount +$v->amount;
				$header_name = $this->M_cloud->findbyidstock('account_head_table', array('id'=> $v->header_name));
				
			   ?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $v->cdate; ?></td>
                <td><?php echo $header_name->name; ?></td>
                <td><?php echo $v->amount; ?></td>
                <td><?php echo $v->details; ?></td>
                <td> <?php echo $v->last_update; ?> </td>
                <td class="text-center"><div class="btn-group"> <a class="btn btn-xs btn-success"
                                       href="#BlockModal" data-toggle="modal" data-target="#BlockModal<?php echo $v->id; ?>"> Edit <span class="glyphicon glyphicon-edit"></span> </a> <a onClick="return confirm('Are You Sure To Delete This Expense ?');"
                                       href="<?php echo site_url('software/Expense/delete/' .$v->id);?>"
                                       class="btn btn-xs btn-danger"> Delete <span class="glyphicon glyphicon-remove"></span> </a> </div></td>
              </tr>
			  
			  
			  <div class="modal" id="BlockModal<?php echo $v->id; ?>">
						  <div class="modal-dialog">
						  <form method="post" id="loadingId_block" enctype="multipart/form-data" action="<?php echo site_url('software/Expense/updated');?>"/>
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
						<option <?php if ($v->header_name == $av->id ) echo 'selected' ; ?> value="<?php echo $av->id; ?>"><?php echo $av->name; ?></option>
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
                  <th colspan="3">Total Expense</th>
                  <th colspan="4"><?php echo $total_amount; ?> tk</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
      <script>


    $(document).ready(function () {


        var title = $('h4#preview_date').html();
        var table = $('#datatable_view_expense').DataTable({
                        dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'print',
                    text: 'Print Expense',
                    exportOptions: {
                        columns: [0,1,2,3,4]
                    },
                    title: function () {
                        return title
                    },
                    customize: function (win) {
                        $(win.document.body).css('font-size', '12px');
                        $(win.document.body).find('h1').addClass('text-center').css('font-size', '20px');
                        $(win.document.body).find('table').addClass('container').css('font-size', 'inherit');
                        $(win.document.body).find('table').removeClass('table-bordered');
                    }
                }
            ],
                });


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

</script>
      <script type="application/javascript"
        src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
      <script type="application/javascript"
        src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    </div>
    <!-- ============== End Container ========================== -->
  </div>
  <div class="col-md-12" id="footer" class="box">
  <p class="f-right" style="font-size:11px;">&copy; 2020 <a href="#" target="_blank">ISP
    Company Software.</a>, All Rights Reserved</p>
</div>
</div>
<script>
        $(document).ready(function () {
            $.post("view/ajax_action/ajax_data_return.php", function (data) {

                $('div#header_area span.due_bill_amount').html(data.duePayment.toLocaleString());

            }, "json");
        });
    </script>
</body>
</html>
