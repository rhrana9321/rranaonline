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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <div class="row panel panel-success" style="margin-top:2%;">
        <div class="panel-heading lead">
          <div class="row">
            <div class="col-lg-8 col-md-8"><i class="fa fa-users"></i> View Customer Details</div>
            <div class="col-lg-4 col-md-4 text-right"> </div>
          </div>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="row">
                <div class="col-lg-9 col-md-9">
                  <div class="tab-content">
                    <div id="Summery" class="tab-pane fade in active">
                      <div class="table-responsive panel">
                        <table class="table">
                          <tbody>
                            <tr>
                              <td colspan="2" style="text-align:left;"><img style="height:60px;" src="<?php echo base_url('upload/' .$find_customer_info->logo_image);?>"/></td>
                            </tr>
							
							<tr>
                              <td class="text-success"><i class="fa fa-user"></i> Name</td>
                              <td><?php echo $find_customer_info->name; ?></td>
                            </tr>
                            <tr>
                              <td class="text-success"><i class="fa fa-envelope"></i> Email</td>
                              <td><?php echo $find_customer_info->email; ?></td>
                            </tr>
                            <tr>
                              <td class="text-success"><i class="fa fa-suitcase"></i> Address</td>
                              <td><?php echo $find_customer_info->details; ?></td>
                            </tr>
                            <tr>
                              <td class="text-success"><i class="fa fa-comment"></i> SMS Mobile Number </td>
                              <td> <?php echo $find_customer_info->mobile; ?></td>
                            </tr>
                            <tr>
                              <td class="text-success"><i class="fa fa-phone"></i> Regular Phone Number </td>
                              <td><?php echo $find_customer_info->regularmobile; ?></td>
                            </tr>
                            
                            <tr>
                              <td class="text-success"><i class="fa fa-sticky-note"></i> National ID/Passport Number</td>
                              <td><?php echo $find_customer_info->national_id; ?></td>
                            </tr>
                            
                            <tr>
                              <td class="text-success"><i class="fa fa-usd"></i> Billing Amount</td>
                              <td> <?php echo $find_customer_info->taka	; ?> Tk</td>
                            </tr>
                            <tr>
                              <td class="text-success"><i class="fa fa-usd"></i> Previous Bill</td>
                              <td> <?php echo $find_customer_info->previus_months_due; ?> Tk</td>
                            </tr>
                            <tr>
							<?php  $zone_infoList = $this->M_cloud->findbyidstock('zone_table', array('id'=> $find_customer_info->zone));  ?>
                              <td class="text-success"><i class="fa fa-street-view"></i> Zone</td>
                              <td> <?php echo $zone_infoList->zoneName; ?></td>
                            </tr>
                            
                            <tr>
                              <td class="text-success"><i class="fa fa-calendar"></i> Connection Date</td>
                              <td> <?php echo $find_customer_info->con_date; ?></td>
                            </tr>
                            <tr>
                              <td class="text-success"><i class="fa fa-play-circle"></i> Status</td>
                              <td>
							  
							  <?php if($find_customer_info->status == '1'){ ?>
							  Active
							  <?php } else if($find_customer_info->status == '0'){ ?>
							  In-active
							  <?php } ?>
							  
							  </td>
                            </tr>
                            <tr>
                              <td class="text-success"><i class="fa fa-check-circle"></i> Payment For This Running Month</td>
							 <?php if($find_customer_info->running_bill == '0'){ ?>
                              <td>Yes</td>
							  <?php } else if($find_customer_info->running_bill > '0'){ ?>
							  <td>No</td>
							  <?php } ?>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div id="Address" class="tab-pane fade">
                      <div class="table-responsive panel">
                        <table class="table">
                          <tbody>
                            <tr>
                              <td class="text-success"><i class="fa fa-home"></i> Address</td>
                              <td><address>
                                <strong> C-***, Amahiya </strong><br>
                                Kharobar, ****** <br>
                                Gorakhpur, Utter Pradesh, India<br>
                                </address></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div id="Contact" class="tab-pane fade">
                      <div class="table-responsive panel">
                        <table class="table">
                          <tbody>
                            <tr>
                              <td class="text-success"><i class="fa fa-envelope-o"></i> Email ID</td>
                              <td><a href="mailto:****@pawanmall.net?subject=Email from &amp;body=Hello, Viddhyut Mall">****@pawanmall.net</a></td>
                            </tr>
                            <tr>
                              <td class="text-success"><i class="glyphicon glyphicon-phone"></i> Mobile Number</td>
                              <td>88********</td>
                            </tr>
                            <tr>
                              <td class="text-success"><i class="fa fa-flag"></i> Nationality</td>
                              <td>Indian</td>
                            </tr>
                            <tr>
                              <td class="text-success"><i class="fa fa-user"></i> Father's Name</td>
                              <td>Ajay Mall</td>
                            </tr>
                            <tr>
                              <td class="text-success"><i class="glyphicon glyphicon-phone"></i> Father's Mobile</td>
                              <td>+91 99********</td>
                            </tr>
                            <tr>
                              <td class="text-success"><i class="fa fa-user"></i> Mother's Name</td>
                              <td>Hemlata Mall</td>
                            </tr>
                            <tr>
                              <td class="text-success"><i class="glyphicon glyphicon-phone"></i> Mother's Mobile</td>
                              <td>+91 90********</td>
                            </tr>
                            <tr>
                              <td class="text-success"><i class="fa fa-user"></i> Emergency Contact Person</td>
                              <td>Pawan Mall</td>
                            </tr>
                            <tr>
                              <td class="text-success"><i class="glyphicon glyphicon-phone"></i> Emergency Contact Person's Mobile</td>
                              <td>+91 88********</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div id="General" class="tab-pane fade">
                      <div class="table-responsive panel">
                        <table class="table">
                          <tbody>
                            <tr>
                              <td class="text-success"><i class="fa fa-university"></i> Last School</td>
                              <td>Pawan Mall's School</td>
                            </tr>
                            <tr>
                              <td class="text-success"><i class="fa fa-calendar"></i> Date of Admission</td>
                              <td>March 4, 2009</td>
                            </tr>
                            <tr>
                              <td class="text-success"><i class="fa fa-home"></i> Birth Place</td>
                              <td>Delhi</td>
                            </tr>
                            <tr>
                              <td class="text-success"><i class="fa fa-calendar"></i> Academic Year</td>
                              <td>2015-2016</td>
                            </tr>
                            <tr>
                              <td class="text-success"><i class="fa fa-medkit"></i> Medical Condition</td>
                              <td>Normal</td>
                            </tr>
                            <tr>
                              <td class="text-success"><i class="fa fa-thumbs-up"></i> Active/Inactive</td>
                              <td>Student is Active</td>
                            </tr>
                            <tr>
                              <td class="text-success"><i class="glyphicon glyphicon-time"></i> Last Editing</td>
                              <td>2015-08-20 09:41:56</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.table-responsive -->
        </div>
      </div>
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
