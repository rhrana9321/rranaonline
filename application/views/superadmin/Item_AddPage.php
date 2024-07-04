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
      <div class="row" style="padding: 6px;">
        <div class="col-md-12 bg-grey-600 padding_10_px">
          <div class="col-md-6">
            <h4>View Add Item info</h4>
          </div>
          <div class="col-md-6" style="">
            <button type="button" class="btn btn-default pull-right" data-toggle="modal"
                        data-target="#addZoneModal"> <span class="glyphicon glyphicon-plus"></span> Add Item </button>
          </div>
        </div>
      </div>
	  <div id="select_date" class="col-md-12 bg-teal-800" style="margin-bottom: 20px;padding:5px 0px">
            <div class="col-md-1">
              <label class="control-label" style="padding-top:5px" for="dateMonth">Form : </label>
            </div>
			 <form action="<?php echo site_url("software/Item_Manage/item_add_print");?>" method="post">
            <div class="col-md-4">
              <input class="form-control" value="" type="text"
                       placeholder="Select Date" name="dateform" autocomplete="off"   id="dateform">
            </div>
            <div class="col-md-1">
              <label class="control-label pull-right" style="padding-top:5px" for="dateMonth">To : </label>
            </div>
            <div class="col-md-4">
              <input class="form-control" value="" autocomplete="off"  type="text"
                       name="dateto" id="dateto" placeholder="Select Date">
					   
<input class="form-control" required="required" value="<?php echo $itemnameList->id; ?>" autocomplete="off"  type="hidden" name="id" id="id" placeholder="Select Date">
            </div>
            
            <div class="col-md-2 text-center">
              <input type="button" class="btn btn-success viewAll" name="searchSubmit" value="Search">
            </div>
          </div>
	  
      <div class="row">
	  <div align="right" style="padding-right:20px; padding-bottom:10px;"><button  type="submit" class="btn btn-primary btn-sm" >Print Client Bill <span class="glyphicon glyphicon-print"></span></button></div>
	  </form>
        <div id="div_all" class="row" style="font-size: 12px;">
          <div class="col-md-9 col-md-offset-2">
            <div class="table-responsive" id="reportdetails">
              <table style="margin-left:-15px;" class="table table-bordered table-hover table-striped" id="datatable">
                <thead>
                  <tr>
                    <th class="text-center">SL</th>
                    <th class="text-center">Name</th>
					 <th class="text-center">Note</th>
					<th class="text-center">Type</th>
					<th class="text-center">Qty</th>
					<th class="text-center">Price</th>
					<th class="text-center">Total Price</th>
					<th class="text-center">Action</th>
                   
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
                  <td class="text-center"><?php echo $i++; ?></td>
                  <td class="text-center"><?php echo $it_name->name; ?></td>
				   <td class="text-center"><?php echo $v->note; ?></td>
				  <td class="text-center"><?php echo $v->type; ?></td>
				  <td class="text-center"><?php echo $v->store; ?></td>
				  <td class="text-center"><?php echo $v->price; ?></td>
				  <td class="text-center"><?php echo ($v->price*$v->store); ?></td>
                 <td class="text-center"><a  href="<?php echo site_url('software/Item_Manage/Item_Manage_update/' .$v->id);?>">Edit </a>	</td>
                </tr>
				
				
				
				
				
              <?php } ?> 
			   <tfoot>
                <tr>
				  <td colspan="6" class="text-right">Total =</td>
				  <td class="text-center"><?php echo $total_item; ?></td>
                </tr> 
                 </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal Start-->
      <div class="modal fade" id="addZoneModal" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title text-center">Add Item</h4>
            </div>
            <form method="post" id="loadingId" action="<?php echo site_url('software/Item_Manage/add_store');?>">
              <div class="modal-body">
                <div class="row" style="padding:0 10px;">
                  <div class="col-md-12">
				  
				    <div class="form-group">
                      <div class="row">
						 <select class="form-control" style="width:100%;" name="type" id="type">
							  <option>Select Item Type</option>
							   <option value="Instruments">Instruments</option>
							  <option value="Cable">Cable</option>
						</select>
                      </div>
                    </div>
                     <div class="form-group">
                      <div class="row">
                        <label>Item Name</label>
						 <div id="pro_sub_idfsf">
						  <select class="form-control" name="name" id="name">
						  <option>Select Item Name</option>
						</select>
					</div>
                      </div>
                    </div>
					
					<div class="form-group">
                      <div class="row">
                        <label>Qty</label>
                        <input type="text" name="store" class="form-control" id="ResponsiveTitle" placeholder="Qty">
                      </div>
                    </div>
					
					<div class="form-group">
                      <div class="row">
                        <label>Unite Price</label>
                        <input type="text" name="price" class="form-control" id="ResponsiveTitle" placeholder="Price">
                      </div>
                    </div>
					<div class="form-group">
                      <div class="row">
                        <label>Note</label>
                        <input type="text" name="note" class="form-control" id="ResponsiveTitle" placeholder="note">
                      </div>
                    </div>
					
					
                  </div>
                  <div class="col-md-12">
                    <div class="form-group text-center">
                       <button type="submit" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..." class="abcd btn btn-primary"><span> Item In</span></button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Modal End-->
    </div>
    <!-- ============== End Container ========================== -->
  </div>
  <div class="col-md-12" id="footer" class="box">
  <p class="f-right" style="font-size:11px;">&copy; 2020 <a href="#" target="_blank">Meghnalink.
    Com Software.</a>, All Rights Reserved</p>
</div>
</div>
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
        var title = $('#showDate').html();
        $('#printtitle').html(title);
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        $('h4#printtitle').html('');
    }

    $(document).ready(function () {
        $("tbody tr").on('click', function () {
            var id = this.id;
            if (id != "0") { window.location = "?q=view_customer_payment_individual&token2=" + id; }
        });
    });
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
