
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<title><?php echo $superdetails->title; ?></title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
#invoice{
    padding: 30px;
}



.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #3989c6
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #3989c6;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}
</style>
</head>
<body>
<!--Author      : @arboshiki-->


    <div class="invoice">
	<br/><br/><br/><br/><br/><br/>
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col" align="left" style="text-align:left;">
                            <img style="height:120px;" src="<?php echo base_url('upload/' .$superdetails->logo_image);?>" data-holder-rendered="true" />
                    </div>
					
					<div class="col" style="padding-top:50px; text-align:center;">
                        <h4>Client Copy</h4>
                    </div>
					
                    <div class="col company-details">
                        <h2 class="name">
                           
                            <?php echo $superdetails->companyname; ?>
                          
                        </h2>
                        <div><?php echo $superdetails->address; ?></div>
                        <div><?php echo $superdetails->company_mobile; ?></div>
                        <div><?php echo $superdetails->com_email; ?></div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        <h2 class="to"><?php echo $all_customer_List->name; ?></h2>
                        <div class="address"><?php echo $all_customer_List->details; ?></div>
                        <div class="email">Mobile : <?php echo $all_customer_List->mobile; ?></div>
                    </div>
                    <div class="col invoice-details">
                        <div class="date">ID : CUS<?php echo $all_customer_List->customer_id_create; ?></div>
                        <div class="date">Issue Date: <?php echo date("d-m-Y"); ?></div>
						
						<?php 
						$date 	= date("Y-m-d");
						$date 	= explode('-', $date); 
						$year 	= $date[0];
						$month  = $date[1];
						$day  	= $date[2];
						//
						$date2 	= date("Y-m-d");
						$date2 	= explode('-', $date2); 
						$year2 	= $date2[0];
						$month2  = $date2[1];
						$day2  	= $date2[2];
						 
						
						$monthNum  = $month2;
						$dateObj   = DateTime::createFromFormat('!m', $monthNum);
						$monthName = $dateObj->format('F');
						?>
						<div class="date">Due Date: <?php echo $all_customer_List->bill_date; ?>-<?php echo $month2; ?>-<?php echo $year2; ?>
						
						
						</div>
						<?php $zone_infoList = $this->M_cloud->findbyidstock('zone_table', array('id'=> $all_customer_List->zone)); ?>
						<div class="date">Zone: <?php echo $zone_infoList->zoneName; ?></div>
                    </div>
                </div>
                <table class="table-bordered" border="0" cellspacing="0" cellpadding="0" style="width:100%;">
				
				<?php
				
			$date 	= date("Y-m-d");
			$date 	= explode('-', $date); 
			$year 	= $date[0];
			$month  = $date[1];
			$day  	= $date[2];
			//
			$date2 	= date("Y-m-d");
			$date2 	= explode('-', $date2); 
			$year2 	= $date2[0];
			$month2  = $date2[1];
			$day2  	= $date2[2];
			 
			
			$monthNum  = $month2;
			$dateObj   = DateTime::createFromFormat('!m', $monthNum);
			$monthName = $dateObj->format('F');
				
				?>
                    <thead>
                        <tr>
                            <th style="text-align:center;">SL.</th>
                            <th style="text-align:center;">DESCRIPTION</th>
                            <th style="text-align:center;">MONTH</th>
                            <th colspan="2"style="text-align:center;">BILL AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align:center;">1</td>
                            <td style="text-align:center;">Dish Bill Monthly - </td>
                            <td style="text-align:center;"><?php echo $monthName; ?></td>
                            <td style="text-align:center;" colspan="2" class="qty"><?php echo $all_customer_List->taka; ?></td>
                        </tr>
						<tr>
                            <td style="text-align:center;">2</td>
                            <td style="text-align:center;" colspan="1">Previous Due</td>
							 <td style="text-align:center;" colspan="1">--</td>
                            <td style="text-align:center;" colspan="2" class="qty"><?php echo $all_customer_List->previus_months_due; ?></td>
                        </tr>
                        
                        
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Total </td>
                            <td  style="text-align:center;"><?php echo $all_customer_List->taka+$all_customer_List->previus_months_due;?> Taka</td>
                        </tr>
						
                        
                        
                    </tfoot>
                </table>
                <div class="row">
				<div class="col-md-6" style="padding-left:15px;">
                    <div>NOTICE:</div>
                    <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
					<div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                </div>
				<div class="col-md-6" style="text-align:left;"><br/>
                    <div> ....................................<br/>Signature</div>
                   
                </div>
				</div>
            </main>
            
        </div>
        
		
		 <div class=""style="width:100%; padding-bottom:20px; border-bottom:1px #000000 solid;">&nbsp;</div>
		 <div class="">&nbsp;</div>
		<div style="min-width: 600px; margin-top:20px;">
            <header>
                <div class="row">
                    <div class="col">
                        
                            <img style="height:120px;" src="<?php echo base_url('upload/' .$superdetails->logo_image);?>" data-holder-rendered="true" />
                           
                    </div>
					<div class="col" style="padding-top:50px; text-align:center;">
                       <h4> Office Copy</h4>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                           
                            <?php echo $superdetails->companyname; ?>
                           
                        </h2>
                        <div><?php echo $superdetails->address; ?></div>
                        <div><?php echo $superdetails->company_mobile; ?></div>
                        <div><?php echo $superdetails->com_email; ?></div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        <h2 class="to"><?php echo $all_customer_List->name; ?></h2>
                        <div class="address"><?php echo $all_customer_List->details; ?></div>
                        <div class="email">Mobile : <?php echo $all_customer_List->mobile; ?></div>
                    </div>
                    <div class="col invoice-details">
                        <div class="date">ID : CUS<?php echo $all_customer_List->customer_id_create; ?></div>
                        <div class="date">Issue Date: <?php echo date("d-m-Y"); ?></div>
						<div class="date">Due Date: <?php echo $all_customer_List->bill_date; ?>-<?php echo $month2; ?>-<?php echo $year2; ?></div>
						<?php $zone_infoList = $this->M_cloud->findbyidstock('zone_table', array('id'=> $all_customer_List->zone)); ?>
						<div class="date">Zone: <?php echo $zone_infoList->zoneName; ?></div>
                    </div>
                </div>
                <table class="table-bordered" border="0" cellspacing="0" cellpadding="0" style="width:100%;">
				
				<?php
				
				$date 	= date("Y-m-d");
			$date 	= explode('-', $date); 
			$year 	= $date[0];
			$month  = $date[1];
			$day  	= $date[2];
			//
			$date2 	= date("Y-m-d");
			$date2 	= explode('-', $date2); 
			$year2 	= $date2[0];
			$month2  = $date2[1];
			$day2  	= $date2[2];
			 
			
			$monthNum  = $month2;
			$dateObj   = DateTime::createFromFormat('!m', $monthNum);
			$monthName = $dateObj->format('F');
				
				?>
                    <thead>
                        <tr>
                            <th style="text-align:center;">SL.</th>
                            <th style="text-align:center;">DESCRIPTION</th>
                            <th style="text-align:center;">MONTH</th>
                            <th colspan="2"style="text-align:center;">BILL AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align:center;">1</td>
                            <td style="text-align:center;">Dish Bill Monthly - </td>
                            <td style="text-align:center;"><?php echo $monthName; ?></td>
                            <td style="text-align:center;" colspan="2" class="qty"><?php echo $all_customer_List->taka; ?></td>
                        </tr>
						<tr>
                            <td style="text-align:center;">2</td>
                            <td style="text-align:center;" colspan="1">Previous Due</td>
							 <td style="text-align:center;" colspan="1">--</td>
                            <td style="text-align:center;" colspan="2" class="qty"><?php echo $all_customer_List->previus_months_due; ?></td>
                        </tr>
                        
                        
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Total </td>
                            <td  style="text-align:center;"><?php echo $all_customer_List->taka+$all_customer_List->previus_months_due;?> Taka</td>
                        </tr>
						
                        
                        
                    </tfoot>
                </table>
                <div class="row">
				<div class="col-md-6" style="padding-left:15px;">
                    <div>NOTICE:</div>
                    <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
					<div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                </div>
				<div class="col-md-6" style="text-align:left;"><br/>
                    <div> ....................................<br/>Signature</div>
                   
                </div>
				</div>
            </main>
            
        </div>
        <div>
		
		</div>
    </div>




<script>
 $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data) 
            {
                window.print();
                return true;
            }
        });
</script>
<script language="javascript" type="text/javascript">
 window.print();
</script>
</body>
</html>