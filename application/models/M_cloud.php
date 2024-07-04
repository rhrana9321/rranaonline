<?php

	class M_cloud extends CI_Model {
	
		const TABLE	= '';
	
		public function __construct()
		{
			parent::__construct();
		}
			
		public function save($table, $data)
		{
			$this->db->insert($table, $data); 
		}
		
		public function save2($table, $data)
		{
			$this->db->insert($table, $data); 
			return $this->db->insert_id();       
		}

		public function generateCode($table_name, $zilla_code, $upzilla_code) {

			$this->db->select('count(*) as total');
			$this->db->from($table_name);
			$this->db->where('dis_code', $zilla_code);
			if($upzilla_code!=NULL) {
				$this->db->where('upo_code', $upzilla_code);
			}

			$query = $this->db->get();
			$row = $query->row();

			if($upzilla_code!=NULL) {
				$serial = str_pad($row->total, 6, "0", STR_PAD_LEFT);
				 $code = $zilla_code.$upzilla_code.$serial;
			} else {
				$serial = str_pad($row->total, 6, "0", STR_PAD_LEFT);
				$code = $zilla_code.'00'.$serial;
			}
			return array($code, $serial);


		}
		
		
		public function total_bill_gen_m($table, $orderbyid, $where)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->order_by($orderbyid);
			$query = $this->db->get();
			return $query->result();		
		}

		public function getQueryData($query) {
			$query = $this->db->query($query);
			return $query->result();
		}
		
		
		public function basicall($table, $order)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->order_by($order);
			$query = $this->db->get();
			return $query->row();
		}

		public function group_count_by_field($table, $field, $where)
		{
			$this->db->select($field.', count(*) as total');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->group_by($field);
			$query = $this->db->get();
			return $query->result();
		}

		public function getMinistrySessionData(){
			$data['ministry_name']=$this->session->userdata('ministry_name');
			$data['is_admin']=$this->session->userdata('is_admin');
			$data['id']=$this->session->userdata('is');
			return $data;
		}
		
		
		
		
		
		public function countCustomer($table)
		{
			$this->db->select('*');
			$this->db->from($table);
			$query = $this->db->get();
			return $query->num_rows();
		}
		
		
		
		public function alvdfCcdslprosearch($keyword)
		{
			$this->db->select('*');
			$this->db->from("product_manage");
			$this->db->like('product_name', $keyword);
			$this->db->or_like('product_code', $keyword); 
			$this->db->order_by("id", "asc");
			$query = $this->db->get();
			return $query->result();
		}
		
		public function allprosearch($keyword, $branceid)
		{
			$this->db->select('*');
			$this->db->from("product_distribute_branchwise");
			$this->db->like('product_name', $keyword);
			$this->db->where('brance_name_id', $branceid);
			$this->db->limit(10, 0);
			$this->db->order_by("id", "asc");
			$query = $this->db->get();
			return $query->result();
		}
		
		public function purchasefindAll($table, $orderbyid)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->order_by($orderbyid);
			$this->db->limit(20, 0);
			$query = $this->db->get();
			return $query->result();
		}
		
		public function allproductsearchweb($keyword)
		{
			$this->db->select('*');
			$this->db->from("product_manage");
			$this->db->like('product_name', $keyword);
			$this->db->or_like('product_code', $keyword);
			$this->db->or_like('selling_price', $keyword); 
			$this->db->limit(4, 0);
			$this->db->order_by("id", "asc");
			$query = $this->db->get();
			return $query->result();
		}
		
		
		
		
		
		public function product_dis_codesearch($keyword, $brance)
		{
			$this->db->select('*');
			$this->db->from("product_distribute_branchwise");
			$this->db->like('product_dis_code', $keyword);
			$this->db->where('brance_name_id', $brance);
			$this->db->limit(1, 0);
			$this->db->order_by("id", "asc");
			$query = $this->db->get();
			return $query->result();
		}
		
		
		public function tbObyRozvvw($table, $orderbyid)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->order_by($orderbyid);
			$query = $this->db->get();
			return $query->row();
		}
		
		
		public function find($table, $where)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}

		public function getUnprocessedRow($table, $where, $limit)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->limit($limit);
			$query = $this->db->get();
			return $query->result();
		}
		
		
		
		
		public function findbyidstock($table, $where)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}
		
		public function allpurchasesearchweb($keyword)
		{
			$this->db->select('*');
			$this->db->from("purchase_entry");
			$this->db->like('pur_invoice_no', $keyword);
			$this->db->limit(1, 0);
			$this->db->order_by("purId", "asc");
			$query = $this->db->get();
			return $query->result();
		}
		
		
		public function alldistubitsearchweb($keyword, $where)
		{
			$this->db->select('*');
			$this->db->from("products_distribute_table");
			$this->db->like('invoice_No', $keyword);
			$this->db->limit(1, 0);
			$this->db->order_by("proDisid", "asc");
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}
		
		
		
		public function allinsdistubitsearchweb($keyword)
		{
			$this->db->select('*');
			$this->db->from("installment_distribute_table");
			$this->db->like('ins_invoice_No', $keyword);
			$this->db->limit(1, 0);
			$this->db->order_by("instu_id", "asc");
			$query = $this->db->get();
			return $query->result();
		}
		
		
		
		public function fijjktukyukynd($table, $where)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}
		
		
	public function homecataWithsub($table, $orderby)
	{
			$merchentwithcat = $this->findAll($table, $orderby);
			foreach($merchentwithcat as $mcv){
				$mcv->subcat = $this->subcatproduct('merchant_catagory_manage', array('merchant_id' => $mcv->id), 'm_catagory_id DESC');
			}
			return $merchentwithcat;
	}	
		
		
	public function homeproduct($table, $orderby)
	{
			$merchent = $this->findAll($table, $orderby);
			foreach($merchent as $v){
				$v->pro = $this->merchentidbyproduct('product_manage', array('mercant_id' => $v->id), 'id DESC');
			}
			return $merchent;
	}
	public function findAllWhere($table, $where, $orderbyid = "")
		{
            
			$this->db->select('*');
			$this->db->from($table);
                        $this->db->where($where);
			//$this->db->order_by($orderbyid);
			$query = $this->db->get();
			return $query->result();
		}

	public function findAll($table, $orderbyid)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->order_by($orderbyid);
			$query = $this->db->get();
			return $query->result();
		}
		
		public function findAllamount($table, $where)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();	
		}
		
		public function all_coustomer($table, $where, $orderbyid)
		{
			$this->db->select('*, sum(taka) as totalamount');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->order_by($orderbyid);
			 $this->db->group_by('header_name'); 
			$query = $this->db->get();
			return $query->result();		
		}
		
		public function findAllamount22($table, $where, $orderbyid)
		{
			$this->db->select('*, sum(amount) as totalamount');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->order_by($orderbyid);
			 $this->db->group_by('header_name'); 
			$query = $this->db->get();
			return $query->result();		
		}
		
		public function findAllamount22333($table, $where, $orderbyid)
		{
			$this->db->select('*, sum(amount) as totalamount');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->order_by($orderbyid);
			 $this->db->group_by('header_name'); 
			$query = $this->db->get();
			return $query->result();		
		}
		
		
		
		
		public function yearly_m($table, $where, $orderbyid)
		{
			$this->db->select('*, sum(dat_total_bill_collection) as total_bill_collection, sum(day_total_connection_charge) as total_day_total_connection_charge, sum(total_opaning_amount) as total_total_opaning_amount, sum(total_opaning_balance) as total_total_opaning_balance, sum(day_total_others_income) as total_day_total_others_income, sum(day_total_expence) as total_day_total_expence');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->order_by($orderbyid);
			 $this->db->group_by('month_name'); 
			$query = $this->db->get();
			return $query->result();		
		}
		
		public function year_group($table, $orderbyid)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->order_by($orderbyid);
			 $this->db->group_by('year_name'); 
			$query = $this->db->get();
			return $query->result();		
		}
		
		public function year_group2($table, $orderbyid)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->order_by($orderbyid);
			 $this->db->group_by('yearly_name'); 
			$query = $this->db->get();
			return $query->result();		
		}
		
		
		
		
		
		public function getAllTranGroitaGroupList($table, $where, $group)
		{
			$this->db->select($group);
			$this->db->from($table);
			$this->db->where($where);
			$this->db->group_by($group);
			$query = $this->db->get();
			return $query->result();
		}
		
		
		public function minimamaqty($table, $where, $orderbyid)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->order_by($orderbyid);
			$query = $this->db->get();
			return $query->result();
		}
		
		public function findAlltablewhereorderbyid($table, $where, $orderbyid)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->order_by($orderbyid);
			$query = $this->db->get();
			return $query->result();
		}	
			
		
		public function findbrance($table, $orderbyid)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->order_by($orderbyid);
			$query = $this->db->get();
			return $query->row();
		}		
				
	public function merchentidbyproduct($table, $where, $orderbyid)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->order_by($orderbyid);
			$this->db->limit(3, 0);
			$query = $this->db->get();
			return $query->result();
		}
		
		
		public function subcatproduct($table, $where, $orderbyid)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->order_by($orderbyid);
			//$this->db->limit(3, 0);
			$query = $this->db->get();
			return $query->result();
		}
		
			
			
			
			
		public function tbWhOrbyResult($table, $where, $orderbyid)
			{
				$this->db->select('*');
				$this->db->from($table);
			    $this->db->where($where);
				$this->db->order_by($orderbyid);
				$query = $this->db->get();
				return $query->result();
			}
			
			
			
			
			
		public function tbWhOrbyRow($table, $where, $orderbyid)
			{
				$this->db->select('*');
				$this->db->from($table);
				//$this->db->limit(10, $onset);
			    $this->db->where($where);
				$this->db->order_by($orderbyid);
				$query = $this->db->get();
				return $query->row();
			}
			
		public function tbOnWhOrbyResult($table, $where, $onset,  $orderbyid)
			{
				$this->db->select('*');
				$this->db->from($table);
				$this->db->limit(4, $onset);
			    $this->db->where($where);
				$this->db->order_by($orderbyid);
				$query = $this->db->get();
				return $query->result();
			}
			
		public function tbOn6WhOrbyResult($table, $where, $onset,  $orderbyid)
			{
				$this->db->select('*');
				$this->db->from($table);
				$this->db->limit(6, $onset);
			    $this->db->where($where);
				$this->db->order_by($orderbyid);
				$query = $this->db->get();
				return $query->result();
			}
			
		public function tbOn3WhOrbyResult($table, $where, $onset,  $orderbyid)
			{
				$this->db->select('*');
				$this->db->from($table);
				$this->db->limit(3, $onset);
			    $this->db->where($where);
				$this->db->order_by($orderbyid);
				$query = $this->db->get();
				return $query->result();
			}
			
		public function tbOn4WhOrbyResult($table, $where, $onset,  $orderbyid)
			{
				$this->db->select('*');
				$this->db->from($table);
				$this->db->limit(4, $onset);
			    $this->db->where($where);
				$this->db->order_by($orderbyid);
				$query = $this->db->get();
				return $query->result();
			}
		
		
		
		
		public function totaluser($table)
		   {
				$this->db->select('*');
				$this->db->from($table);
				return $this->db->count_all_results();
		   }
		
		
			
		public function tbWhRow($table, $where)
			{
				$this->db->select('*');
				$this->db->from($table);
				//$this->db->limit(10, $onset);
			    $this->db->where($where);
				//$this->db->order_by($orderbyid);
				$query = $this->db->get();
				return $query->row();
			}
			
	
			
		public function categorylist($table, $where, $orderbyid)
			{
				$this->db->select('*');
				$this->db->from($table);
				//$this->db->limit(10, $onset);
				$this->db->where($where);
				$this->db->order_by($orderbyid);
				$query = $this->db->get();
				return $query->result();
			}
			
		public function subcategory($table, $where, $orderbyid)
			{
				$this->db->select('*');
				$this->db->from($table);
				//$this->db->limit(10, $onset);
			    $this->db->where($where);
				$this->db->order_by($orderbyid);
				$query = $this->db->get();
				return $query->result();
			}
			
		public function productbyId($table, $where)
			{
				$this->db->select('*');
				$this->db->from($table);
				//$this->db->limit(10, $onset);
			    $this->db->where($where);
				//$this->db->order_by($orderbyid);
				$query = $this->db->get();
				return $query->row();
			}
			
		
			
		public function whereOederbyRow($table, $where)
			{
				$this->db->select('*');
				$this->db->from($table);
			    $this->db->where($where);
				$query = $this->db->get();
				return $query->row();
			}
			
		public function Row($table, $orderbyid)
			{
				$this->db->select('*');
				$this->db->from($table);
				//$this->db->limit(10, $onset);
			    //$this->db->where($where);
				$this->db->order_by($orderbyid);
				$query = $this->db->get();
				return $query->result();
			}
			
			
			
			
			
		public function purchaseintry($onset, $table, $oderby)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->order_by($oderby);
			$this->db->limit(20, $onset);
			$query = $this->db->get();
			return $query->result();
		}
			
			
			
			
			
		
		public function findrawitem($onset, $table, $where, $orderbyid)
			{
				$this->db->select('*');
				$this->db->from($table);
				$this->db->limit(10, $onset);
				$this->db->where($where);
				$this->db->order_by($orderbyid);
				$query = $this->db->get();
				return $query->result();
			}
			
			
			
		public function findbyidWhere($onset, $table, $where, $orderbyid)
			{
				$this->db->select('*');
				$this->db->from($table);
				$this->db->limit(20, $onset);
				$this->db->where($where);
				$this->db->order_by($orderbyid);
				$query = $this->db->get();
				return $query->result();
			}
		
		
		
		

		public function findWithOrder($table, $where, $order)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where, NULL, FALSE);
			$this->db->order_by($order);
			$query = $this->db->get();
			return $query->row();
		}

		public function findSummation($select, $table, $where = array())
		{
			$this->db->select($select);
			$this->db->from($table);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}
		
		
		public function findReport($table, $where)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}
		
		public function findReportzvsv($table)
		{
			$this->db->select('*');
			$this->db->from($table);
			//$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}
		
		 public function total_rows($table)
			   {
				 
				    $this->db->select('*');
					$this->db->from($table);
					return $this->db->count_all_results();
			   }
		
		 
		
		public function findCashBypayId($table,$id)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where('paidSuplyId', $id);
			$query = $this->db->get();
			return $query->row();
		}


		public function findAllPurchaseDetails($table, $where)
		{
			$this->db->select('*');
			$this->db->from($table);
			//if(!empty($details_id)) $this->db->where_not_in('AutoId', $details_id);
			$this->db->where($where);
			//$this->db->where('hand_qty', 'pur_quantity', FALSE);
			$query = $this->db->get();
			return $query->result();
		}

		public function findAllSoldPurchaseDetails($pur_id)
		{
			$this->db->select('*');
			$this->db->from('purchase_details');
			$this->db->where('pur_id', $pur_id);
			$this->db->where('hand_qty < pur_quantity', NULL, FALSE);
			$query = $this->db->get();
			return $query->result();
		}

		public function findAllFifoDetails($where)
		{
			$this->db->select('*');
			$this->db->from('selling_fifo');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}
		
		public function update($table, $data, $id)
		{
			$this->db->update($table, $data, array('AutoId' => $id));        
		}
		
		
		
		public function weborderupdate($table, $data, $where)
		{
			$this->db->update($table, $data, $where);        
		}
		
		public function passupdate($table, $data, $id)
		{
			$this->db->update($table, $data, array('userid' => $id));
		}
		
		public function destroy($table, $id)
		{
			$this->db->delete($table, array('AutoId' => $id));        
		}
		
		public function destroyBank($table, $id)
		{
			$this->db->delete($table, array('suPayRecId' => $id));        
		}
		
		public function destroyExpenseBank($table, $id)
		{
			$this->db->delete($table, array('expenseIdbank' => $id));        
		}
		
		public function destroyBankCust($table, $id)
		{
			$this->db->delete($table, array('custPayId' => $id));        
		}
		
		public function destroyCash($table, $id)
		{
			$this->db->delete($table, array('paidSuplyId' => $id));        
		}
		public function destroyExpenseCash($table, $id)
		{
			$this->db->delete($table, array('expenseId' => $id));        
		}
		public function destroyCashCust($table, $id)
		{
			$this->db->delete($table, array('paidCustId' => $id));        
		}
		
		public function update2($table, $data, $where)
		{
			$this->db->update($table, $data, $where);        
		}
		
		public function updateAll($table, $data, $where)
		{
			$this->db->update($table, $data, $where);        
		}
		
		public function destroyAll($table, $where)
		{
			$this->db->delete($table, $where);        
		}

		public function destroyallpurchase($table, $where)
		{
			$this->db->delete($table, $where);        
		}
		
		public function findPurchaseNoMax($table) {
			$this->db->select('*');
			$this->db->from($table);
			$this->db->order_by("pur_no", "desc");
			$query = $this->db->get();
			return $query->row();
		}
		
		public function findinvoiceNoMax($table) {
			$this->db->select('*');
			$this->db->from($table);
			$this->db->order_by("invoice_no", "desc");
			//$this->db->where('AutoId', $id);
			$query = $this->db->get();
			return $query->row();
		}
		
		public function findpayNoMax($table, $where)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->order_by("receNo", "desc");
			$query = $this->db->get();
			return $query->row();
		 }
		 
		 
		 public function findMaxId($table, $where, $orderbyId)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->order_by($orderbyId);
			$query = $this->db->get();
			return $query->row();
		 }
		 
		 
		 
		
		 
		
		
		public function findPurchaseLastID($table, $orderbyid) {
			$this->db->select('*');
			$this->db->from($table);
			$this->db->order_by($orderbyid);
			$query = $this->db->get();
			return $query->row();
		}
		
		
		
		public function adminuserLastId($table) {
			$this->db->select('*');
			$this->db->from($table);
			$this->db->order_by('auid', 'DESC');
			//$this->db->where('AutoId', $id);
			$query = $this->db->get();
			return $query->row();
		}
		
		
		
		public function findSaleLastID($table) {
			$this->db->select('*');
			$this->db->from($table);
			$this->db->order_by("sell_id", "desc");
			//$this->db->where('AutoId', $id);
			$query = $this->db->get();
			return $query->row();
		}
		
		
		public function findStockInfoByProID($table, $where) {
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}
		
		
	
		
		public function cashinfo($table) {
			$this->db->select('*');
			$this->db->from($table);
			$this->db->order_by("AutoId", "desc");
			//$this->db->where('AutoId', $pro_id);
			$query = $this->db->get();
			return $query->row();
		}
		
		public function findMaxSl($table)
		{
			$this->db->select('max(invoice_no) as invoice_no');
			$this->db->from($table);
			$query = $this->db->get();
			return $query->row()->invoice_no+1;
		}
		
		public function findAllAdmin($table, $where = array(), $onset = 0)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->order_by('AutoId', 'desc');
			$this->db->limit(10, $onset); 
			$query = $this->db->get();
			return $query->result();
		}
		
		public function countAll($table, $where = array())
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);			
			return $this->db->count_all_results();
		}
        
		public function findMaxSls($table)
		{
			$this->db->select('max(AutoId) as AutoId');
			$this->db->from($table);
			$query = $this->db->get();
			return $query->row()->AutoId+1;
		}
		public function findMaxSlss($table)
		{
			$this->db->select('max(pur_id) as pur_id');
			$this->db->from($table);
			$query = $this->db->get();
			return $query->row()->pur_id+1;
		}
		
		
		
		public function findemail($table, $where)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}
		
		public function findMaxOp($table)
		{
			$this->db->select('max(op_id) as op_id');
			$this->db->from($table);
			$query = $this->db->get();
			return $query->row()->op_id+1;
		}
		
		public function findMaxReject($table)
		{
			$this->db->select('max(rej_id) as rej_id');
			$this->db->from($table);
			$query = $this->db->get();
			return $query->row()->rej_id+1;
		}
		
			
	}
?>