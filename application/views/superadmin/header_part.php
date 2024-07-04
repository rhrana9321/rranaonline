<?php 
$total_bill_gen = $this->M_cloud->minimamaqty('customer_table', array('status'=> 1), 'custo_id asc');
$total_collection = $this->M_cloud->findAll('payment_table', 'payment_id asc');
$total_duess = $this->M_cloud->findAll('customer_table', 'custo_id asc');
$total_ban_Cus_List = $this->M_cloud->findAll('customer_table', 'custo_id asc');
$total_opaning_list = $this->M_cloud->minimamaqty('payment_table', array('type'=> 'Opaning_amount'), 'payment_id  asc');
$total_cone_List = $this->M_cloud->minimamaqty('payment_table', array('type'=> 'Connect_charge'), 'payment_id  asc');

?>

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
$total_band = 0;
foreach ($total_ban_Cus_List as $ban_value) {
$packageList = $this->M_cloud->findbyidstock('package_table', array('id'=> $ban_value->package));
$row_kbps = $packageList->kb_count; 
$total_band = ($total_band + $row_kbps);
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




<div id="header_area" class="col-md-12" style="padding:5px 5px 5px 5px;">
  <div class="col-md-2 col-sm-2">
    <div style="float:left;"> <img title="Visit Site" alt="Our logo" src="<?php echo base_url('upload/' .$superdetails->logo_image);?>" width="100" height="45"> </div>
  </div>
  <div class="col-md-2 text-center" style="margin-top: 15px;"> 
  
  <small class="padding_3_10_px label btn-primary"> Total Bill Generated : <span class="badge"><?php echo $total_bill_gr; ?></span>&nbsp; taka </small> 
  </div>
  <div class="col-md-2 text-center" style="margin-top: 15px;"> <small class="padding_3_10_px label btn-primary"> Total Collection : 
  <span class="badge"><?php echo ($total_coll)-($total_op_amount+$total_CoN_amount); ?> </span>&nbsp; Taka </small> </div>
  <div class="col-md-2 text-center" style="margin-top: 15px;">
 
        <small class="padding_3_10_px label btn-primary">
           <?php $final = ($total_band/1024); ?>
            Total Bandwidth Sell : <span class="badge"><?php echo $final; ?> </span>&nbsp; Mbps
        </small>
      
    </div>
  <div class="col-md-2 text-center" style="margin-top: 15px;"> <small class="padding_3_10_px label btn-danger"> Total Due Bill : <span class="badge due_bill_amount"><?php echo $total_due; ?> </span>&nbsp; taka </small> </div>
  <div class="col-md-2 pull-right" style="margin-top: 12px"> <a id="logout"
           style="background:url(asset/img/logout.png) left center no-repeat; font-size:12px; padding-left:20px; color:#FFFFFF;"
           href="<?php echo site_url('Superadmin/logout'); ?>"><b>Logout from Superadmin</b></a> </div>
</div>
