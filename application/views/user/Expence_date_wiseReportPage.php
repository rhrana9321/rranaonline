<table class="table table-responsive table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th>SL No.</th>
                  <th>Account Head</th>
                  <th>Expense</th>
                </tr>
              </thead>
              <tbody>
			  
			   <?php $i=1; 
			   $total_amount = 0; 
			   foreach ($expense_table_Lis2t as $v2) { 
			    $total_amount =  $total_amount +$v2->totalamount;
				$header_name = $this->M_cloud->findbyidstock('account_head_table', array('id'=> $v2->header_name));
				
			   ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><a href="<?php echo site_url('software/Expense_Report/Expense_details/' .$v2->header_name);?>"> <?php echo $header_name->name; ?> </a> </td>
                  <td><?php echo $v2->totalamount; ?></td>
                </tr>
              <?php } ?>
				
                <tr>
                  <td colspan="2" class="text-center"><b>Total Expense</b></td>
                  <td><b><?php echo $total_amount; ?></b></td>
                </tr>
              </tbody>
            </table>
			
			<script>
	$(".viewAll").on('click', function(){
	$('.prgbar').css('display', 'block');
	var dateMonth = $("#dateMonth").val();
	var dateYear = $("#dateYear").val();
	var urlmgs = "<?php echo site_url('software/Expense_Report/showreport'); ?>";
	$.ajax({
		url:urlmgs,
		type:"POST",
		data:{dateMonth:dateMonth,dateYear:dateYear},
		success:function(data){
			$("#reportdetails").html(data);
			$('.prgbar').css('display', 'none');
		}
	});
});


 $(".daywiseviewAll").on('click', function(){
	$('.prgbar').css('display', 'block');
	var date =  $("#date").val();
	var urlmgs = "<?php echo site_url('software/Expense_Report/dayshowreport'); ?>";
	$.ajax({
		url:urlmgs,
		type:"POST",
		data:{date:date},
		success:function(data){
			$(".reportdetailsday").html(data);
			$('.prgbar').css('display', 'none');
		}
	});
});


    </script>