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
                 
                </tr>
              <?php } ?> 
			   <tfoot>
                <tr>
				  <td colspan="6" class="text-right">Total =</td>
				  <td class="text-center"><?php echo $total_item; ?></td>
                </tr> 
                 </tfoot>
              </table>
   
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