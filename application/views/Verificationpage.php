<!DOCTYPE html>
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
								Dealer Login Information
							</div>
							<div class="account-logo" style="padding-top:10px;">
								<a href="<?php site_url(""); ?>"><img src="<?php echo base_url("resource/assets/img/lg.png");?>" alt=""></a>
							</div>
							<?php if(!empty($usermgs)){?> 
							<div class="account-logo">
								<strong style="color:#FF0000; font-size:16px;"> <?php echo $usermgs ?></strong>
							</div>
							<?php }?>
								<form method="POST" action="<?php echo site_url('Delear/login'); ?>">
								<input class="form-control floating"  type="hidden" value="Create_Dealer_admin" name="type" id="type">
								<input class="form-control floating"  type="hidden" value="<?php echo $card_no; ?>" name="card_no" id="card_no">
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