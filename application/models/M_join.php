<?php

	class M_join extends CI_Model {
	
		const TABLE	= '';
	
		public function __construct()
		{
			parent::__construct();
		}
		
		public function finduser($table, $where)
		{
			$this->db->select('user_manage.*,branch_manage.*');
			$this->db->from($table);
			$this->db->join('branch_manage', 'branch_manage.id = user_manage.branch_name', 'left');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}

		public function finduser_with_district($table, $where)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->join('districts', 'districts.id = '.$table.'.District', 'inner');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}

		public function finduser_with_upzilla($table, $where)
		{
			$this->db->select('*, districts.bn_name as dist_bn_name, districts.dist_code as dis_code ');
			$this->db->from($table);
			$this->db->join('districts', 'districts.id = '.$table.'.District', 'inner');
			$this->db->join('upazilas', 'upazilas.id = '.$table.'.Upozila', 'inner');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}

		public function finddealer_with_upzilla($table, $where)
		{
			$this->db->select('*, districts.bn_name as dist_bn_name, districts.dist_code as dis_code ');
			$this->db->from($table);
			$this->db->join('districts', 'districts.dist_code = '.$table.'.dis_code', 'inner');
			$this->db->join('upazilas', 'upazilas.upz_code = '.$table.'.upz_code', 'inner');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}


		public function finduser_with_upzilla_result($table, $where)
		{
			$this->db->select('*, districts.bn_name as dist_bn_name, districts.dist_code as dis_code ');
			$this->db->from($table);
			$this->db->join('districts', 'districts.id = '.$table.'.District', 'inner');
			$this->db->join('upazilas', 'upazilas.id = '.$table.'.Upozila', 'inner');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function get_dealer_allocation($table, $where)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->join('create_package_table', 'create_package_table.create_package_id = '.$table.'.package_id', 'inner');
			$this->db->join('create_dealer_admin_table', 'create_dealer_admin_table.create_dealer_admin_id = '.$table.'.dealer_id', 'inner');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function get_dealer_allocation_byid($table, $where)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->join('create_package_table', 'create_package_table.create_package_id = '.$table.'.package_id', 'inner');
			$this->db->join('create_dealer_admin_table', 'create_dealer_admin_table.create_dealer_admin_id = '.$table.'.dealer_id', 'inner');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}

		public function get_dealer_allocation_for_api($table, $dealer_id)
		{
			$sql = "select * from ".$table."
			inner join create_package_table on create_package_table.create_package_id= ".$table.".package_id
			inner join create_dealer_admin_table on create_dealer_admin_table.create_dealer_admin_id = ".$table.".dealer_id
			where dealer_allocation_tbl.dealer_id=".$dealer_id." and prodan_amount < allocation_amount";
//			$this->db->select('*');
//			$this->db->from($table);
//			$this->db->join('create_package_table', 'create_package_table.create_package_id = '.$table.'.package_id', 'inner');
//			$this->db->join('create_dealer_admin_table', 'create_dealer_admin_table.create_dealer_admin_id = '.$table.'.dealer_id', 'inner');
//			$this->db->where($where);
//			$this->db->where(arrau'prodan_amount <', 'allocation_amount');
			$query = $this->db->query($sql);

			return $query->result();
		}
		
		
		public function order_info($table, $where)
		{
			$this->db->select('order_info.*,party_customer_manage.*');
			$this->db->from($table);
			$this->db->join('party_customer_manage', 'party_customer_manage.id = order_info.customer_id', 'left');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}
		
		
		
		
		public function totaldistributestock()
		{
			$this->db->select('product_distribute.*,product_manage.*');
			$this->db->from('product_distribute');
			$this->db->join('product_manage', 'product_manage.id = product_distribute.product_name_id', 'left');
			//$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}
		
		public function branchuseridbyreport($table, $where)
		{
			$this->db->select('order_info.*,party_customer_manage.*,(order_info.id) as orifId');
			$this->db->from($table);
			$this->db->join('party_customer_manage', 'party_customer_manage.id = order_info.customer_id', 'left');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}
		
		
		public function orderDetails_MJ($where)
			{
				$this->db->select('web_order_details.*, product_manage.*');
				$this->db->from('web_order_details');
				$this->db->join('product_manage', 'product_manage.id = web_order_details.proId', 'left');
				$this->db->where($where);
				$query = $this->db->get();
				return $query->result();
			}
		
		
		public function findpoint($where = array())
		{
			$this->db->select('*');
			$this->db->from('signup_user');
			$this->db->join('tree_manage', 'tree_manage.userName = signup_user.userName', 'left');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}
		
		
			
			
			public function orderDetails($where)
			{
				$this->db->select('order_details.*, product_manage.*');
				$this->db->from('order_details');
				$this->db->join('product_manage', 'product_manage.id = order_details.product_id', 'left');
				$this->db->where($where);
				$query = $this->db->get();
				return $query->result();
			}
		
		
		public function weborderDetails($where)
			{
				$this->db->select('customer_order_details.*, product_manage.*');
				$this->db->from('customer_order_details');
				$this->db->join('product_manage', 'product_manage.pro_id = customer_order_details.proId', 'left');
				$this->db->where($where);
				$query = $this->db->get();
				return $query->result();
			}
		
		public function weborderDetails2($where)
			{
				$this->db->select('company_order_details.*, product_manage.*');
				$this->db->from('company_order_details');
				$this->db->join('product_manage', 'product_manage.pro_id = company_order_details.proId', 'left');
				$this->db->where($where);
				$query = $this->db->get();
				return $query->result();
			}
		
		public function weborderDetailsssss($where)
			{
				$this->db->select('installment_order_details.*, product_manage.*');
				$this->db->from('installment_order_details');
				$this->db->join('product_manage', 'product_manage.pro_id = installment_order_details.proId', 'left');
				$this->db->where($where);
				$query = $this->db->get();
				return $query->result();
			}
			
		public function userrequresbantoagen($where)
		{
			$this->db->select('wallettransfertoagent.*, signup_user.userName');
			$this->db->from('wallettransfertoagent');
			$this->db->join('signup_user', 'signup_user.signId = wallettransfertoagent.sendId', 'left');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}
		
		
		public function allprovvfddsearch($keyword)
		{
			$this->db->select('product_distribute.*, category_manage.*');
			$this->db->from('product_distribute');
			$this->db->join('product_manage', 'product_manage.id = product_distribute.product_name_id', 'left');
			$this->db->like('product_name', $keyword);
			$this->db->or_like('product_code', $keyword);
			$this->db->order_by("product_manage.id", "desc");
			$query = $this->db->get();
			return $query->result();
		}
		
		
		public function allmer_catmange($where = array())
		{
			$this->db->select('*, merchant_manage.merchant_name');
			$this->db->from('merchant_catagory_manage');
			$this->db->join('merchant_manage', 'merchant_manage.id = merchant_catagory_manage.merchant_id', 'left');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}
		
		
		
		public function merchentWisePro($where)
		{
			$this->db->select('merchant_manage.*, product_manage.*');
			$this->db->from('merchant_manage');
			$this->db->join('product_manage', 'product_manage.merchant_id = merchant_manage.id', 'left');
			$this->db->order_by("product_manage.id", "desc"); 
			$query = $this->db->get();
			return $query->result();
		}
		
		
		public function catagoryWiseProduct($where)
		{
			$this->db->select('product_manage.*.merchant_manage.*');
			$this->db->from('product_manage');
			$this->db->join('merchant_manage', 'merchant_manage.id = product_manage.merchant_id', 'left');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}
		
		public function allproduct($where = array())
		{
			$this->db->select('product_manage.*, merchant_manage.merchant_name,merchant_catagory_manage.m_catagory_name');
			$this->db->from('product_manage');
			$this->db->join('merchant_manage', 'merchant_manage.id = product_manage.mercant_id', 'left');
			$this->db->join('merchant_catagory_manage', 'merchant_catagory_manage.m_catagory_id = product_manage.mercant_catagory_id', 'left');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}
		
		
		public function invoicedetails_J()
		{
			$this->db->select('order_info.*, order_details.*,party_customer_manage.*');
			$this->db->from('order_info');
			$this->db->join('merchant_manage', 'merchant_manage.id = product_manage.mercant_id', 'left');
			$this->db->join('merchant_catagory_manage', 'merchant_catagory_manage.m_catagory_id = product_manage.mercant_catagory_id', 'left');
			//$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}
		
		
		public function allusermanage($where = array())
		{
			$this->db->select('user_manage.*, branch_manage.branch_name');
			$this->db->from('user_manage');
			$this->db->join('branch_manage', 'branch_manage.id = user_manage.branch_name', 'left');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}
		
		
		public function product_distribute_report($where = array())
		{
			$this->db->select('product_distribute.*, product_manage.*');
			$this->db->from('product_distribute');
			$this->db->join('product_manage', 'product_manage.product_code = product_distribute.product_dis_code', 'left');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}
		
		
		
		public function product_distribute_stock_branch_report($where = array())
		{
			$this->db->select('product_distribute_branchwise.*, product_manage.*');
			$this->db->from('product_distribute_branchwise');
			$this->db->join('product_manage', 'product_manage.id = product_distribute_branchwise.product_name_id', 'left');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}
		
		
		
		public function profite_and_loss($where = array())
		{
			$this->db->select('order_details.*, order_info.*');
			$this->db->from('order_details');
			$this->db->join('order_info', 'order_info.id = order_details.order_id', 'left');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}
		
		
		
		
		public function productdistube($onset, $table, $oderby)
		{
			$this->db->select('product_distribute.*, product_manage.product_name,selling_price,branch_manage.branch_name,(product_distribute.selling_prices) as sPrice');
			$this->db->from($table);
			$this->db->join('product_manage', 'product_manage.product_code = product_distribute.product_dis_code', 'left');
			$this->db->join('branch_manage', 'branch_manage.id = product_distribute.brance_name_id', 'left');
			$this->db->order_by($oderby);
			$this->db->limit(20, $onset);
			$query = $this->db->get();
			return $query->result();
		}
		
		
		public function paymentmerchant($onset, $table, $oderby)
		{
			$this->db->select('payment_to_supplier.*, merchant_manage.merchant_name');
			$this->db->from($table);
			$this->db->join('merchant_manage', 'merchant_manage.id = payment_to_supplier.mother_company', 'left');
			$this->db->order_by($oderby);
			$this->db->limit(20, $onset);
			$query = $this->db->get();
			return $query->result();
		}
	
				
	}
?>