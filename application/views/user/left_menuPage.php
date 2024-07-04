<?php $url = $this->uri->uri_string();?>

			
			
<div id="body_service_list">
            <div id="body_service_list_text">
              <ul class="box" style="margin:0px ! important;">
                <li class="mactive" style="background: url('<?php echo base_url('resource/assets/left-menu-active.gif');?>') repeat-x scroll 0 0 rgba(0, 0, 0, 0);"> <a href="<?php echo site_url('software/Dashboard');?>" class="left_menu_bull"
                               style=" padding: 1px 0px 1px 30px; font-size:14px;  color:#FFFFFF; font-family:Arial, Helvetica, sans-serif; font-weight:600;">Dashboard</a> </li>
                <li class="menu" style="background: url('<?php echo base_url('resource/assets/left-menu-active.gif');?>') repeat-x scroll 0 0 rgba(0, 0, 0, 0);"> <a href="#" class="left_menu_bull mainli" style="color:white;">Configuration</a>
                  <ul>
					<li class="list">&nbsp;<a class="texta" href="#">Add New User</a></li>
                    <li class="list">&nbsp;<a class="texta" href="#">User Info</a></li>
                  </ul>
                </li>
                <li class="mactive" style="background: url('<?php echo base_url('resource/assets/left-menu-active.gif');?>') repeat-x scroll 0 0 rgba(0, 0, 0, 0);"> <a href="?q=view_agent" class="left_menu_bull"
                               style=" padding: 1px 0px 1px 30px; font-size:14px;  color:#FFFFFF; font-family:Arial, Helvetica, sans-serif; font-weight:600;">Customer Info</a>
                  <ul>
                    <li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/New_customer_add');?>">Add New Customer</a></li>
                    <li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/Customer_info');?>">Customer Info</a></li>
                    <li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/New_customer');?>">New Customer</a></li>
                    <li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/Zone_Info');?>">Zone Info</a></li>
					 <li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/Village_Info');?>">Village Info</a></li>
					
                    <li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/Customer_of_Other_Due');?>">Customer of Other Due</a></li>
                  </ul>
                </li>
                <li class="menu" style="background: url('<?php echo base_url('resource/assets/left-menu-active.gif');?>') repeat-x scroll 0 0 rgba(0, 0, 0, 0);"> <a href="?q=view_due_payment" class="left_menu_bull mainli"
                               style="color:white;">Income</a>
                  <ul>
                    <li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/Bill_Collection');?>">Bill Collection</a></li>
                    <li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/All_Dues');?>">All Dues</a></li>
                    <li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/All_Paid_Customer');?>">All Paid Customer</a></li>
                    <li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/Connection_Charge');?>">Connection Charge</a></li>
                    <li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/Others_Income');?>">Others Income</a></li>
                    <li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/In_active_coustomer');?>">Inactive Collection</a></li>
                  </ul>
                </li>
                <li class="menu" style="background: url('<?php echo base_url('resource/assets/left-menu-active.gif');?>') repeat-x scroll 0 0 rgba(0, 0, 0, 0);"> <a href="?q=view_expense" class="left_menu_bull mainli"
                               style="color:white;">Expense</a>
                  <ul>
                    <li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/Account_Head');?>">Account Head</a></li>
                    <li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/Discount');?>">Discount</a></li>
                    <li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/Expense');?>">Expense</a></li>
                    <li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/Expense_Report');?>">Expense Report</a></li>
                  </ul>
                </li>
                <li class="menu" style="background: url('<?php echo base_url('resource/assets/left-menu-active.gif');?>') repeat-x scroll 0 0 rgba(0, 0, 0, 0);"> <a href="?q=monthly_new" class="left_menu_bull mainli" style="color:white;">Balance Sheet</a>
                  <ul>
                    <li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/Monthly_Balance_Report');?>">Monthly Balance Report</a></li>
                    <li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/Yearly_Balance_Report');?>">Yearly Balance Report</a></li>
                    <li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/Account_Statement');?>">Account Statement</a></li>
					
					<li class="list">&nbsp;<a class="texta" href="#">Export in Excell File</a></li>
                  </ul>
                </li>
				
				
				<li class="menu" style="background: url('<?php echo base_url('resource/assets/left-menu-active.gif');?>') repeat-x scroll 0 0 rgba(0, 0, 0, 0);"> <a href="?q=monthly_new" class="left_menu_bull mainli" style="color:white;">Store Management</a>
                  <ul>
                    <li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/Item_Manage');?>">Item Manage</a></li>
                    <li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/Item_Manage/Item_Add');?>">Item Add</a></li>
                    <li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/Item_Manage/Item_out');?>">Item Out</a></li>
					<li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/Item_Manage/Store_Report');?>">Store Report</a></li>
                  </ul>
                </li>
                <li class="menu" style="background: url('<?php echo base_url('resource/assets/left-menu-active.gif');?>') repeat-x scroll 0 0 rgba(0, 0, 0, 0);"> <a href="?q=main_configuration" class="left_menu_bull mainli" style="color:white;">Employee</a>
                  <ul>
                    <li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/Add_New_Employee');?>">Add New Employee</a></li>
                    <li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/Add_New_Employee/View_all_Employee');?>">View all Employee</a></li>
                  </ul>
                </li>
				
                <li class="menu" style="background: url('<?php echo base_url('resource/assets/left-menu-active.gif');?>') repeat-x scroll 0 0 rgba(0, 0, 0, 0);"> <a href="?q=main_configuration" class="left_menu_bull mainli" style="color:white;">Complain</a>
                  <ul>
                    <li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/Add_Complain');?>">Add Complain</a></li>
                    <li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/Add_Complain_For_Imminent_User');?>">Add Complain For Imminent User</a></li>
                    <li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/Add_Complain_For_Imminent_User/View_All_Complain');?>">View All Complain</a></li>
                    <li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/Complain_Template');?>">Complain Template</a></li>
                  </ul>
                </li>
				
				
                <li class="menu" style="background: url('<?php echo base_url('resource/assets/left-menu-active.gif');?>') repeat-x scroll 0 0 rgba(0, 0, 0, 0);"> <a href="?q=due_sms" class="left_menu_bull mainli" style="color:white;">SMS
                  SERVICE</a>
                  <ul>
                    <li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/Add_Custome_SMS');?>">Add Custome SMS</a></li>
                    <li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/Add_Custome_SMS/Due_sms');?>">Due SMS</a></li>
                    <li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/Add_Custome_SMS/Occational_sms');?>">Occational SMS</a></li>
                    <li class="list">&nbsp;<a class="texta" href="<?php echo site_url('software/Add_Custome_SMS/inactive_customer_sms');?>">Inactive Customer SMS</a></li>
                  </ul>
                </li>
                <li class="menu" style="background: url('<?php echo base_url('resource/assets/left-menu-active.gif');?>') repeat-x scroll 0 0 rgba(0, 0, 0, 0);"> <a href="<?php echo site_url('software/Settings');?>" class="left_menu_bull mainli" style="color:white;"> Setting </a> </li>
                <li class="menu" style="background: url('<?php echo base_url('resource/assets/left-menu-active.gif');?>') repeat-x scroll 0 0 rgba(0, 0, 0, 0);"> <a href="" class="left_menu_bull mainli" style="color:white;"> Deleted Agent </a> </li>
              </ul>
            </div>
          </div>