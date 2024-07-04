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
		<?php
			$total_bill_gen = $this->M_cloud->minimamaqty('customer_table', array('status'=> 1), 'custo_id asc');
			$total_active_coustomer = $this->M_cloud->minimamaqty('customer_table', array('status'=> 1), 'custo_id asc');
			$total_customer_other = $this->M_cloud->findAll('customer_table', 'custo_id asc');
			$total_inactive_coustomer = $this->M_cloud->minimamaqty('customer_table', array('status'=> 0), 'custo_id asc');
			$total_collection = $this->M_cloud->findAll('payment_table', 'payment_id asc');
			$total_duess = $this->M_cloud->findAll('customer_table', 'custo_id asc');
			$total_con_chargeList = $this->M_cloud->findAll('connecting_charge_report_table', 'connecting_report_id asc');
			$total_cun_other_inList = $this->M_cloud->findAll('other_income_table', 'id asc');
			$total_opaning_list = $this->M_cloud->minimamaqty('payment_table', array('type'=> 'Opaning_amount'), 'payment_id  asc');
			$total_cone_List = $this->M_cloud->minimamaqty('payment_table', array('type'=> 'Connect_charge'), 'payment_id  asc');
		?>
		 <?php
		$total_a_c = 0;
		foreach ($total_active_coustomer as $av) {
		$total_a_c = $total_a_c + 1;
		?>
		<?php } ?>
		
		 <?php
		$total_ina_c = 0;
		foreach ($total_inactive_coustomer as $iav) {
		$total_ina_c = $total_ina_c + 1;
		?>
		<?php } ?>
		
		<?php
		$total_bill_gr = 0;
		foreach ($total_bill_gen as $mon_value22) {
		$total_bill_gr = $total_bill_gr + $mon_value22->taka;
		?>
		<?php } ?>
		
		<?php
		$total_coll = 0;
		foreach ($total_collection as $mon_value223) {
		$total_coll = $total_coll + $mon_value223->amount;
		?>
		<?php } ?>
		
		<?php
		$total_due = 0;
		foreach ($total_duess as $mon_value2234) {
		$total_due = $total_due+$mon_value2234->previus_months_due+$mon_value2234->running_bill+$mon_value2234->running_month_due_amount+$mon_value2234->connection_charge_due_amount;
		?>
		<?php } ?>
		
		<?php
		$total_con_charge = 0;
		foreach ($total_con_chargeList as $con_ch_va) {
		$total_con_charge = $total_con_charge + $con_ch_va->amount;
		?>
		<?php } ?>
		
		<?php
		$total_cus_other = 0;
		foreach ($total_customer_other as $con_oth_du_va) {
		$total_cus_other = $total_cus_other + $con_oth_du_va->running_month_due_amount+$con_oth_du_va->connection_charge_due_amount;
		?>
		<?php } ?>
		
		<?php
		$total_cus_oth_in = 0;
		foreach ($total_cun_other_inList as $con_oth_inh_va) {
		$total_cus_oth_in = $total_cus_oth_in + $con_oth_inh_va->amount;
		?>
		<?php } ?>
		<?php
		$total_op_amount = 0;
		foreach ($total_opaning_list as $opn_value) {
		$total_op_amount = ($total_op_amount + $opn_value->amount);
		?>
		<?php } ?>
		
		<?php
		$total_CoN_amount = 0;
		foreach ($total_cone_List as $coN_value) {
		$total_CoN_amount = ($total_CoN_amount + $coN_value->amount);
		?>
		<?php } ?>
		
			
              <div class="col-lg-3 col-md-3 col-sm-3" style="padding-right: 0px; padding-left: 4px;">
	 			<a href="<?php echo site_url('software/Customer_info');?>">
                <div class="card text-white bg-flat-color-2">
                  <div class="card-body pb-0 text-center">
				 
                    <p class="text-light" style="padding-top:10px;">Total Active Customer</p>
                    <h4 class="mb-0"> <span class="count"><?php echo $total_a_c; ?></span> </h4>
					
                    <div class="chart-wrapper px-0" style="height:70px;" height="70"> <i class="fa fa-user-plus" style="font-size: 50px;"></i> </div>
                  </div>
                </div>
				</a>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3"style="padding-right: 0px;padding-left: 4px;">
			  <a href="<?php echo site_url('software/Customer_info');?>">
                <div class="card text-white bg-flat-color-3">
                  <div class="card-body pb-0 text-center">
                    <p class="text-light"  style="padding-top:10px;">Total In-active Customer</p>
                    <h4 class="mb-0"> <span class="count"><?php echo $total_ina_c; ?></span> </h4>
                    <div class="chart-wrapper px-0" style="height:70px;" height="70"> <i class="fa fa-money" style="font-size: 50px;"></i> </div>
                  </div>
                </div>
				</a>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3"style="padding-right: 0px;padding-left: 4px;">
               <a href="<?php echo site_url('software/Bill_Collection');?>">
			    <div class="card text-white bg-flat-color-4">
                  <div class="card-body pb-0 text-center">
                    <p class="text-light"  style="padding-top:10px;">Total Bill</p>
                    <h4 class="mb-0"> <span class="count"><?php echo $total_bill_gr; ?></span> </h4>
                    <div class="chart-wrapper px-0" style="height:70px;" height="70"> <i class="fa fa-money" style="font-size: 50px;"></i> </div>
                  </div>
                </div>
				</a>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3"style="padding-right: 0px;padding-left: 4px;">
                <a href="<?php echo site_url('software/All_Dues');?>">
			    <div class="card text-white bg-flat-color-5">
                  <div class="card-body pb-0 text-center" style="padding: 0 2px;">
                    <p class="text-light"  style="padding-top:10px;">Total Due</p>
                    <h4 class="mb-0"> <span class=""><?php echo $total_due; ?></span> </h4>
                    <div class="chart-wrapper px-0" style="height:70px;" height="70"> <i class="fa fa-bolt" style="font-size: 50px;"></i> </div>
                  </div>
                </div>
				</a>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3" style="padding-right: 0px;padding-left: 4px;padding-top:10px;">
			   <a href="<?php echo site_url('software/Dashboard/All_collection');?>">
                <div class="card text-white bg-flat-color-6">
                  <div class="card-body pb-0 text-center">
                    <p class="text-light"  style="padding-top:10px;">Total Collection</p>
                    <h4 class="mb-0"> <span class="count"> <?php echo ($total_coll)-($total_op_amount+$total_CoN_amount); ?></span> </h4>
                    <div class="chart-wrapper px-0" style="height:70px;" height="70"> <i class="fa fa-money" style="font-size: 50px;"></i> </div>
                  </div>
                </div>
				</a>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3" style="padding-right: 0px;padding-left: 4px;padding-top:10px;">
			   <a href="<?php echo site_url('software/Connection_Charge');?>">
                <div class="card text-white bg-flat-color-1">
                  <div class="card-body pb-0 text-center">
                    <p class="text-light"  style="padding-top:10px;">Total C. Charge</p>
                    <h4 class="mb-0"> <span class="count"><?php echo $total_con_charge; ?></span> </h4>
                    <div class="chart-wrapper px-0" style="height:70px;" height="70"> <i class="fa fa-user-circle" style="font-size: 50px;"></i> </div>
                  </div>
                </div>
				</a>
              </div>
			  <div class="col-lg-3 col-md-3 col-sm-3" style="padding-right: 0px;padding-left: 4px; padding-top:15px;padding-top:10px;">
			   <a href="<?php echo site_url('software/Customer_of_Other_Due');?>">
                <div class="card text-white bg-flat-color-2">
                  <div class="card-body pb-0 text-center">
                    <p class="text-light" style="padding-top:10px;">Total Customer Of Due</p>
                    <h4 class="mb-0"> <span class="count"><?php echo $total_cus_other; ?></span> </h4>
                    <div class="chart-wrapper px-0" style="height:70px;" height="70"> <i class="fa fa-user-plus" style="font-size: 50px;"></i> </div>
                  </div>
                </div>
				</a>
              </div>
			  <div class="col-lg-3 col-md-3 col-sm-3" style="padding-right: 0px;padding-left: 4px;padding-top:10px;">
			  <a href="<?php echo site_url('software/Others_Income');?>">
                <div class="card text-white bg-flat-color-6">
                  <div class="card-body pb-0 text-center">
                    <p class="text-light"  style="padding-top:10px;">Total Others Income</p>
                    <h4 class="mb-0"> <span class="count"><?php echo $total_cus_oth_in; ?></span> </h4>
                    <div class="chart-wrapper px-0" style="height:70px;" height="70"> <i class="fa fa-money" style="font-size: 50px;"></i> </div>
                  </div>
                </div>
				</a>
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
<p class="f-right" style="font-size:11px;">&copy; 2020 <a href="#" target="_blank">Meghnalink.
  Com Software.</a>, All Rights Reserved</p>
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
