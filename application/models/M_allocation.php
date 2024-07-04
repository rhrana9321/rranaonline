<?php

/**
 * common tran_allocation logic to all users , its distributed by user types
 */
class M_allocation extends CI_Model {

    protected $user_table = '';

    public function __construct() {
        parent::__construct();
    }

    public function sumSuperAdminDealerTranAllocation($data = array()) {
        $this->db->select('sum(allocation_amount) as total_dealer_allocation_amount');
        $this->db->from('dealer_allocation_tbl');
        $query = $this->db->get();
        $result = $query->result();
        $result = $result[0]->total_dealer_allocation_amount;
        $result = floor($result);
        return $result;
    }

    public function sumSuperAdminDealerTranProdhan($data = array()) {
        $this->db->select('sum(prodan_amount) as total_prodan_amount');
        $this->db->from('dealer_allocation_tbl');
        $query = $this->db->get();
        $result = $query->result();
        $result = $result[0]->total_prodan_amount;
        $result = floor($result);
        return $result;
    }

    public function sumDivisionAdminDealerTranAllocation($dis_code, $ministry_id = 0, $is_supar_admin = 0) {
        $dis_code = explode(",", $dis_code);
        $this->db->select('sum(allocation_amount) as total_dealer_allocation_amount');        
        $this->db->from('dealer_allocation_tbl');
        //
        $this->db->where_in('dealer_allocation_tbl.dis_code', $dis_code);
        if ($is_supar_admin == 0) {
            $this->db->join('create_tran_grohon_table', 'create_tran_grohon_table.create_tran_grohon_id = dealer_allocation_tbl.tran_grohon_id', 'left');
            $this->db->where('create_tran_grohon_table.ministry_id', $ministry_id);
        }       
        $query = $this->db->get();
        $result = $query->result();
        $result = $result[0]->total_dealer_allocation_amount;
        $result = floor($result);
        return $result;
    }

    public function sumDivisionAdminDealerTranProdhan($dis_code, $ministry_id = 0, $is_supar_admin = 0) {
        $dis_code = explode(",", $dis_code);
        $this->db->select('sum(prodan_amount) as total_prodan_amount');
        $this->db->from('dealer_allocation_tbl');
        $this->db->where_in('dealer_allocation_tbl.dis_code', $dis_code);
        if ($is_supar_admin == 0) {
            $this->db->join('create_tran_grohon_table', 'create_tran_grohon_table.create_tran_grohon_id = dealer_allocation_tbl.tran_grohon_id', 'left');
            $this->db->where('create_tran_grohon_table.ministry_id', $ministry_id);
        }
        $query = $this->db->get();
        $result = $query->result();
        $result = $result[0]->total_prodan_amount;
        $result = floor($result);
        return $result;
    }
    /**
     * District
     */
    public function sumDistrictAdminDealerTranAllocation($dis_code, $ministry_id = 0, $is_supar_admin = 0) {
        $dis_code = explode(",", $dis_code);
        $this->db->select('sum(allocation_amount) as total_dealer_allocation_amount');        
        $this->db->from('dealer_allocation_tbl');
        //
        $this->db->where_in('dealer_allocation_tbl.dis_code', $dis_code);
        if ($is_supar_admin == 0) {
            $this->db->join('create_tran_grohon_table', 'create_tran_grohon_table.create_tran_grohon_id = dealer_allocation_tbl.tran_grohon_id', 'left');
            $this->db->where('create_tran_grohon_table.ministry_id', $ministry_id);
        }       
        $query = $this->db->get();
        $result = $query->result();
        $result = $result[0]->total_dealer_allocation_amount;
        $result = floor($result);
        return $result;
    }

    public function sumDistrictAdminDealerTranProdhan($dis_code, $ministry_id = 0, $is_supar_admin = 0) {
        $dis_code = explode(",", $dis_code);
        $this->db->select('sum(prodan_amount) as total_prodan_amount');
        $this->db->from('dealer_allocation_tbl');
        $this->db->where_in('dealer_allocation_tbl.dis_code', $dis_code);
        if ($is_supar_admin == 0) {
            $this->db->join('create_tran_grohon_table', 'create_tran_grohon_table.create_tran_grohon_id = dealer_allocation_tbl.tran_grohon_id', 'left');
            $this->db->where('create_tran_grohon_table.ministry_id', $ministry_id);
        }
        $query = $this->db->get();
        $result = $query->result();
        $result = $result[0]->total_prodan_amount;
        $result = floor($result);
        return $result;
    }
	
	  /**
     * Upozilla
     */
    public function sumUpozillaAdminDealerTranAllocation($upz_code, $ministry_id = 0, $is_supar_admin = 0) {
        $upz_code = explode(",", $upz_code);
        $this->db->select('sum(allocation_amount) as total_dealer_allocation_amount');        
        $this->db->from('dealer_allocation_tbl');
        //
        $this->db->where_in('dealer_allocation_tbl.upz_code', $upz_code);
        if ($is_supar_admin == 0) {
            $this->db->join('create_tran_grohon_table', 'create_tran_grohon_table.create_tran_grohon_id = dealer_allocation_tbl.tran_grohon_id', 'left');
            $this->db->where('create_tran_grohon_table.ministry_id', $ministry_id);
        }       
        $query = $this->db->get();
        $result = $query->result();
        $result = $result[0]->total_dealer_allocation_amount;
        $result = floor($result);
        return $result;
    }

    public function sumUpozillaAdminDealerTranProdhan($upz_code, $ministry_id = 0, $is_supar_admin = 0) {
        $upz_code = explode(",", $upz_code);
        $this->db->select('sum(prodan_amount) as total_prodan_amount');
        $this->db->from('dealer_allocation_tbl');
        $this->db->where_in('dealer_allocation_tbl.upz_code', $upz_code);
        if ($is_supar_admin == 0) {
            $this->db->join('create_tran_grohon_table', 'create_tran_grohon_table.create_tran_grohon_id = dealer_allocation_tbl.tran_grohon_id', 'left');
            $this->db->where('create_tran_grohon_table.ministry_id', $ministry_id);
        }
        $query = $this->db->get();
        $result = $query->result();
        $result = $result[0]->total_prodan_amount;
        $result = floor($result);
        return $result;
    }
    
}

?>