
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title></title>

<style type="text/css">
	


.maindiv {
    width: 290px;
    height: 468px;
    /* background-image: url(idcardback.jpg)!important; */
    border: 3px solid black;
    margin: auto;
    position: relative;
    top: 0px;
    right: 3px;
    border-radius: 8px;
}
.top {
    position: relative;
    font-size: 23px;
    top: 1px;
    text-align: center;
    padding: 4px;
    font-weight: 900;
}
.top23 {
    position: relative;
    font-size: 22px;
    /* top: -2px; */
    /* left: 91px; */
    text-align: center;
    padding: 6px;
    font-weight: 900;
}

.top2 {
    position: relative;
    font-size: 16px;
    top: 0px;
    text-align: center;
    /* padding: 0px; */
    font-weight: 900;
}

.top22 {
    position: relative;
    font-size: 17px;
    top: -1px;
    text-align: center;
    padding: 2px;
    font-weight: 900;
}

.top25 {
    position: relative;
    font-size: 19px;
    top: 12px;
    text-align: center;
    padding: 2px;
    font-weight: 900;
    border: 2px solid black;
    width: 256px;
    left: 16px;
    border-radius: 20px;
}
.text {
    width: 87px;
    height: 30px;
    border: 2px solid black;
    position: absolute;
    font-size: 9px;
    text-align: center;
    font-weight: 900;
    left: 195px;
    top: 32px;
}

.sign {
    position: relative;
    font-size: 12px;
    text-align: center;
    left: 43px;
    top: -12px;
    font-weight: bold;
}

.table {
    position: relative;
    top: -45px;
    left: 10px;
    font-size: 16px;
    font-weight: 900;
}
.to3 {
    padding: 4px;
    position: relative;
    top: -121px;
    left: 7px;
}

.mugiblogo {
    padding: 4px;
    position: relative;
    top: -129px;
    left: 152px;
}

@import url(&#39;https://fonts.maateen.me/solaiman-lipi/font.css&#39;);
</style>

<script type="text/javascript">
    
function printDiv(maindiv) {
     var printContents = document.getElementById(maindiv).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}


</script>


<link href='https://fonts.maateen.me/solaiman-lipi/font.css' rel='stylesheet'/>
</head>
<body style="font-family: SolaimanLipi;">




<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="print-save.php" method="post">
<input type="hidden" name="id" value="4229" >
<input type="hidden" name="status" value="Done" >
<input type="button" onclick="printDiv('maindiv')" value="Print" />
<input type="submit" value="Print Complited" />

</form>
	







<div id="maindiv">
      

	<div class="maindiv"  id="maindiv"  >

<div class="top">
    গণপ্রজাতন্ত্রী বাংলাদেশ সরকার 
 
    </div>

    <div class="top23">
      উপজেলা প্রশাসন
    </div>

<div class="top2">
     কালিহাতি, টাঙ্গাইল
</div>



<div class="top25">
    করোনা ভাইরাস (কোভিড-১৯) প্রতিরোধে বিশেষ ত্রাণ কার্ড
</div>

<div class="to3">
    <img src="govlogo.png" align="left" width="60px">

</div>

<div class="mugiblogo">
    <img src="images/muzib_image.png" align="left" width="70px">

</div>




<table class="table" width="100%" border="0" cellspacing="2px">

        
<tr>
    <td align="right" > কার্ডধারীর  নাম </td>
    <td> : </td>
    <td >মোঃ আজিজ</td>
</tr>





<tr>
    <td align="right">আইডি নং</td>
    <td>:</td>
    <td >00100180600430</td>
</tr>

<tr>
    <td align="right">এন আই ডি নং</td>
    <td>:</td>
    <td >9314736306288</td>
</tr>



<tr>
    <td align="right">মোবাইল নং</td>
    <td> :</td>
    <td>01869657438</td>
</tr>


<tr>
    <td align="right">ইউনিয়ন/পৌরসভা</td>
    <td> :</td>
    <td>
        

এলেঙ্গা পৌরসভা







    </td>
</tr>





<tr>
    <td align="right">ওয়ার্ড নং</td>
    <td> :</td>
    <td>6</td>
</tr>










<tr>
    <td align="right">এলাকা/মহল্লা</td>
    <td>:</td>
    <td>এলেঙ্গা</td>
</tr>



</table>



<div class="sign">
    <img src="images/sing.PNG" width="90px"> <br/>

উপজেলা নির্বাহী অফিসার<br>
 কালিহাতি, টাঙ্গাইল
</div>



	</div>
</div>
</body>
</html><!DOCTYPE html>
<html>
    
<!-- Mirrored from dreamguys.co.in/smarthr/purple/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 14 May 2018 12:38:19 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url("resource/assets/img/bank_logo.jpg");?>">
        <title><?php echo $superdetails->companyname; ?></title>
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("resource/assets/css/bootstrap.min.css");?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("resource/assets/css/font-awesome.min.css");?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("resource/assets/css/style.css");?>">
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
        <div class="main-wrapper">
			<div class="account-page">
				<div class="container">
					<h3 class="account-title"></h3>
					<div class="account-box">
						<div class="account-wrapper">
						
							<div  style="font-size:18px; text-align:center;">
								<?php echo $superdetails->companyname; ?>
							</div>
							<div class="account-logo" style="padding-top:10px;">
								<a href="<?php site_url(""); ?>"><img src="<?php echo base_url("resource/assets/img/lg.png");?>" alt=""></a>
							</div>
							<?php if(!empty($usermgs)){?> 
							<div class="account-logo">
								<strong style="color:#FF0000; font-size:16px;"> <?php echo $usermgs ?></strong>
							</div>
							<?php }?>
								<form method="POST" action="<?php echo site_url('Superadmin/login'); ?>">
								
								<div class="form-group">
								  <select class="form-control" required id="type" name="type">
									<option value="" >Select Login Type</option>
									<option value="Superadmin">Superadmin</option>
									<option value="Create_divisional_admin">Divisional Panel</option>
									<option value="District_admin">District Admin</option>
									<option value="Create_Zila_admin">Zila Panel</option>
									<option value="Create_Upozila_admin">Upozila Admin</option>
									<option value="Create_Dealer_admin">Dealer Admin</option>
								  </select>
								</div>
								
								<div class="form-group form-focus">
									<label class="control-label">Username</label>
									<input class="form-control floating"  type="text" name="username" id="username">
								</div>
								<div class="form-group form-focus">
									<label class="control-label">Password</label>
									<input class="form-control floating" autocomplete="off" type="password" name="password" id="password">
								</div>
								<div class="form-group text-center">
									<button class="btn btn-primary btn-block account-btn" type="submit">Login</button>
								</div>
								<!--<div class="text-center">
									<a href="<?php echo site_url("Home/forgot_password");?>">Forgot your password?</a>
								</div>-->
							</form>
						</div>
					</div>
				</div>
			</div>
        </div>
		
		
		
								
								
								
		
		
		<div class="sidebar-overlay" data-reff="#sidebar"></div>
        <script type="text/javascript" src="<?php echo base_url("resource/assets/js/jquery-3.2.1.min.js");?>"></script>
        <script type="text/javascript" src="<?php echo base_url("resource/assets/js/bootstrap.min.js");?>"></script>
        <script type="text/javascript" src="<?php echo base_url("resource/assets/js/app.js");?>"></script>
    </body>

<!-- Mirrored from dreamguys.co.in/smarthr/purple/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 14 May 2018 12:38:19 GMT -->
</html>