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

</head>
<body>
<div class="container" id="content"
         style="width:100% !important; padding:0px; border:0px; background-color:#EAEAEA;">
  <div class="col-md-12" style="background:#100000; padding:0px; min-height:50px;">
   
     <?php $this->load->view('superadmin/header_part'); ?>
  </div>
  <div class="col-md-12" style="margin:15px 0px 15px 0px; padding:0px 15px 0px 0px;">
    <div class="col-md-2" style="padding:0px 10px 0px 0px;">
      <div class="col-md-12" style="padding:0px; width:100%;">
        <div id="body_service">
           <?php $this->load->view('superadmin/left_menuPage'); ?>
        </div>
      </div>
    </div>
    <!-- ============== End Menu ========================== -->
    <div class="col-md-10" style="background:#FFFFFF; border:1px solid #999999;">
      <!-- <div class="col-md-12" style=" background:#606060; min-height:40px; margin-top:20px; padding:8px 0px 0px 15px;
        font-size:16px; font-family:Lucida Sans Unicode; color:#FFFFFF; font-weight:bold;">
			<b>Dashboard</b>
		</div> -->
      <div class="row">
        <div class="panel panel-default" style="margin-bottom: 10px;">
          <div class="panel-body" style="padding: 5px;">
            <div class="col-lg-16 col-md-16 col-sm-16" style="padding-top:10px;">
              <div class="col-lg-2 col-md-2 col-sm-2" style="padding-right: 0px;
    padding-left: 4px;">
                <div class="card text-white bg-flat-color-2">
                  <div class="card-body pb-0 text-center">
                    <p class="text-light" style="padding-top:10px;">Total Active Customer</p>
                    <h4 class="mb-0"> <span class="count">1021</span> </h4>
                    <div class="chart-wrapper px-0" style="height:70px;" height="70"> <i class="fa fa-user-plus" style="font-size: 50px;"></i> </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-2"style="padding-right: 0px;
    padding-left: 4px;">
                <div class="card text-white bg-flat-color-3">
                  <div class="card-body pb-0 text-center">
                    <p class="text-light"  style="padding-top:10px;">Total Bill</p>
                    <h4 class="mb-0"> <span class="count">572300</span> </h4>
                    <div class="chart-wrapper px-0" style="height:70px;" height="70"> <i class="fa fa-money" style="font-size: 50px;"></i> </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-2"style="padding-right: 0px;
    padding-left: 4px;">
                <div class="card text-white bg-flat-color-4">
                  <div class="card-body pb-0 text-center">
                    <p class="text-light"  style="padding-top:10px;">Total Due Bill</p>
                    <h4 class="mb-0"> <span class="count">7287130</span> </h4>
                    <div class="chart-wrapper px-0" style="height:70px;" height="70"> <i class="fa fa-money" style="font-size: 50px;"></i> </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-2"style="padding-right: 0px;
    padding-left: 4px;">
                <div class="card text-white bg-flat-color-5">
                  <div class="card-body pb-0 text-center" style="padding: 0 2px;">
                    <p class="text-light"  style="padding-top:10px;">Total Bandwidth Sell</p>
                    <h4 class="mb-0"> <span class="">4914.00</span> </h4>
                    <div class="chart-wrapper px-0" style="height:70px;" height="70"> <i class="fa fa-bolt" style="font-size: 50px;"></i> </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-2"style="padding-right: 0px;
    padding-left: 4px;">
                <div class="card text-white bg-flat-color-6">
                  <div class="card-body pb-0 text-center">
                    <p class="text-light"  style="padding-top:10px;">Total Collection</p>
                    <h4 class="mb-0"> <span class="count">0</span> </h4>
                    <div class="chart-wrapper px-0" style="height:70px;" height="70"> <i class="fa fa-money" style="font-size: 50px;"></i> </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-2" style="padding-right: 0px;
    padding-left: 4px;">
                <div class="card text-white bg-flat-color-1">
                  <div class="card-body pb-0 text-center">
                    <p class="text-light"  style="padding-top:10px;">Total Inactive Customer</p>
                    <h4 class="mb-0"> <span class="count">67</span> </h4>
                    <div class="chart-wrapper px-0" style="height:70px;" height="70"> <i class="fa fa-user-circle" style="font-size: 50px;"></i> </div>
                  </div>
                </div>
              </div>
			  
			  
			  
			  
			  <div class="col-lg-2 col-md-2 col-sm-2" style="padding-right: 0px;
    padding-left: 4px; padding-top:15px;">
                <div class="card text-white bg-flat-color-2">
                  <div class="card-body pb-0 text-center">
                    <p class="text-light" style="padding-top:10px;">Total Active Customer</p>
                    <h4 class="mb-0"> <span class="count">1021</span> </h4>
                    <div class="chart-wrapper px-0" style="height:70px;" height="70"> <i class="fa fa-user-plus" style="font-size: 50px;"></i> </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-2"style="padding-right: 0px;
    padding-left: 4px;padding-top:15px;">
                <div class="card text-white bg-flat-color-3">
                  <div class="card-body pb-0 text-center">
                    <p class="text-light"  style="padding-top:10px;">Total Bill</p>
                    <h4 class="mb-0"> <span class="count">572300</span> </h4>
                    <div class="chart-wrapper px-0" style="height:70px;" height="70"> <i class="fa fa-money" style="font-size: 50px;"></i> </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-2"style="padding-right: 0px;
    padding-left: 4px; padding-top:15px;">
                <div class="card text-white bg-flat-color-4">
                  <div class="card-body pb-0 text-center">
                    <p class="text-light"  style="padding-top:10px;">Total Due Bill</p>
                    <h4 class="mb-0"> <span class="count">7287130</span> </h4>
                    <div class="chart-wrapper px-0" style="height:70px;" height="70"> <i class="fa fa-money" style="font-size: 50px;"></i> </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-2"style="padding-right: 0px;
    padding-left: 4px;padding-top:15px;">
                <div class="card text-white bg-flat-color-5">
                  <div class="card-body pb-0 text-center" style="padding: 0 2px;">
                    <p class="text-light"  style="padding-top:10px;">Total Bandwidth Sell</p>
                    <h4 class="mb-0"> <span class="">4914.00</span> </h4>
                    <div class="chart-wrapper px-0" style="height:70px;" height="70"> <i class="fa fa-bolt" style="font-size: 50px;"></i> </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-2"style="padding-right: 0px;
    padding-left: 4px;padding-top:15px;">
                <div class="card text-white bg-flat-color-6">
                  <div class="card-body pb-0 text-center">
                    <p class="text-light"  style="padding-top:10px;">Total Collection</p>
                    <h4 class="mb-0"> <span class="count">0</span> </h4>
                    <div class="chart-wrapper px-0" style="height:70px;" height="70"> <i class="fa fa-money" style="font-size: 50px;"></i> </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-2" style="padding-right: 0px;
    padding-left: 4px;padding-top:15px;">
                <div class="card text-white bg-flat-color-1">
                  <div class="card-body pb-0 text-center">
                    <p class="text-light"  style="padding-top:10px;">Total Inactive Customer</p>
                    <h4 class="mb-0"> <span class="count">67</span> </h4>
                    <div class="chart-wrapper px-0" style="height:70px;" height="70"> <i class="fa fa-user-circle" style="font-size: 50px;"></i> </div>
                  </div>
                </div>
              </div>
			  
			  
			  <div class="col-lg-2 col-md-2 col-sm-2" style="padding-right: 0px;
    padding-left: 4px; padding-top:15px;">
                <div class="card text-white bg-flat-color-2">
                  <div class="card-body pb-0 text-center">
                    <p class="text-light" style="padding-top:10px;">Total Active Customer</p>
                    <h4 class="mb-0"> <span class="count">1021</span> </h4>
                    <div class="chart-wrapper px-0" style="height:70px;" height="70"> <i class="fa fa-user-plus" style="font-size: 50px;"></i> </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-2"style="padding-right: 0px;
    padding-left: 4px;padding-top:15px;">
                <div class="card text-white bg-flat-color-3">
                  <div class="card-body pb-0 text-center">
                    <p class="text-light"  style="padding-top:10px;">Total Bill</p>
                    <h4 class="mb-0"> <span class="count">572300</span> </h4>
                    <div class="chart-wrapper px-0" style="height:70px;" height="70"> <i class="fa fa-money" style="font-size: 50px;"></i> </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-2"style="padding-right: 0px;
    padding-left: 4px; padding-top:15px;">
                <div class="card text-white bg-flat-color-4">
                  <div class="card-body pb-0 text-center">
                    <p class="text-light"  style="padding-top:10px;">Total Due Bill</p>
                    <h4 class="mb-0"> <span class="count">7287130</span> </h4>
                    <div class="chart-wrapper px-0" style="height:70px;" height="70"> <i class="fa fa-money" style="font-size: 50px;"></i> </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-2"style="padding-right: 0px;
    padding-left: 4px;padding-top:15px;">
                <div class="card text-white bg-flat-color-5">
                  <div class="card-body pb-0 text-center" style="padding: 0 2px;">
                    <p class="text-light"  style="padding-top:10px;">Total Bandwidth Sell</p>
                    <h4 class="mb-0"> <span class="">4914.00</span> </h4>
                    <div class="chart-wrapper px-0" style="height:70px;" height="70"> <i class="fa fa-bolt" style="font-size: 50px;"></i> </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-2"style="padding-right: 0px;
    padding-left: 4px;padding-top:15px;">
                <div class="card text-white bg-flat-color-6">
                  <div class="card-body pb-0 text-center">
                    <p class="text-light"  style="padding-top:10px;">Total Collection</p>
                    <h4 class="mb-0"> <span class="count">0</span> </h4>
                    <div class="chart-wrapper px-0" style="height:70px;" height="70"> <i class="fa fa-money" style="font-size: 50px;"></i> </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-2" style="padding-right: 0px;
    padding-left: 4px;padding-top:15px;">
                <div class="card text-white bg-flat-color-1">
                  <div class="card-body pb-0 text-center">
                    <p class="text-light"  style="padding-top:10px;">Total Inactive Customer</p>
                    <h4 class="mb-0"> <span class="count">67</span> </h4>
                    <div class="chart-wrapper px-0" style="height:70px;" height="70"> <i class="fa fa-user-circle" style="font-size: 50px;"></i> </div>
                  </div>
                </div>
              </div>
			  
			  
            </div>
          </div>
        </div>
      </div>
	  
	  
      <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
      
      
      
      
      
      
    </div>
    <script type="text/javascript" src="<?php echo base_url('resource/assets/jquery.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('resource/assets/Chart.bundle.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('resource/assets/Chart.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('resource/assets/widgets.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('resource/assets/CustomChartData.js');?>"></script>
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
