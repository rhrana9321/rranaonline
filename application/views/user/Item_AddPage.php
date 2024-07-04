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
      <div class="row">
        <div id="div_all" class="row" style="font-size: 12px;">
          <div class="col-md-8 col-md-offset-2">
            <div class="table-responsive">
              <table style="margin-left:-15px;" class="table table-bordered table-hover table-striped" id="datatable">
                <thead>
                  <tr>
                    <th class="text-center">SL</th>
                    <th class="text-center">Name</th>
					<th class="text-center">Type</th>
					<th class="text-center">Qty</th>
					<th class="text-center">Price</th>
					<th class="text-center">Total Price</th>
                   
                  </tr>
                </thead>
				<?php 
				$i = 1; 
				foreach ($zone_List as $v) { 
				$it_name = $this->M_cloud->findbyidstock('item_manage_table', array('id'=> $v->name));
				?> 
                <tr>
                  <td class="text-center"><?php echo $i++; ?></td>
                  <td class="text-center"><?php echo $it_name->name; ?></td>
				  <td class="text-center"><?php echo $v->type; ?></td>
				  <td class="text-center"><?php echo $v->store; ?></td>
				  <td class="text-center"><?php echo $v->price; ?></td>
				  <td class="text-center"><?php echo ($v->price*$v->store); ?></td>
                 
                </tr>
              <?php } ?>  
                
                
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
            <form method="post" action="<?php echo site_url('software/Item_Manage/add_store');?>">
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
                  </div>
                  <div class="col-md-12">
                    <div class="form-group text-center">
                      <button type="submit" class="btn btn-default" name="zoneAddSubmit"> Add Item </button>
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
  <p class="f-right" style="font-size:11px;">&copy; 2020 <a href="#" target="_blank">ISP
    Company Software.</a>, All Rights Reserved</p>
</div>
</div>
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
</body>
</html>
