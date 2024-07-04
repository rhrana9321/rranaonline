<?php

/**
 * common trangrohon logic to all users , its distributed by user types
 */
class M_trangrohon extends CI_Model {

    protected $user_table = '';

    public function __construct() {
        parent::__construct();
    }

    /** SuperAdmin
     * Box C
     * @param type $data
     * @return type
     */
    public function sumSuperAdminTranGrohon($data = array()) {
        $sql = "select
            wothso,
            traner_dhoron,
            SUM(traner_poriman) as total_traner_poriman            
            from create_tran_grohon_table 
            group by traner_dhoron, wothso";
        $sql = "select
            traner_dhoron,
            SUM(traner_poriman) as total_traner_poriman            
            from create_tran_grohon_table 
            group by traner_dhoron";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    /**
     * SuperAdmin
     * Box D
     * @param type $data
     * @return type
     */
    public function sumSuperTGDealerAllocation($data = array()) {
        $this->db->select('sum(dealer_allocation_amount) as total_dealer_allocation_amount');
        $this->db->from('create_tran_grohon_table');
        $query = $this->db->get();
        $result = $query->result();
        $result = $result[0]->total_dealer_allocation_amount;
        $result = floor($result);
        return $result;
    }

    /* SuperAdmin
     * Box A
     * @param type $data
     * @return type
     */

    public function countSAManobikSohayota() {
        $sql = "select
            COUNT(DISTINCT tran_member_id) as count_tran_member_number                     
            from  tran_member_aid";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result[0]->count_tran_member_number;
    }
    
    
     /* Division
     * Box A
     * @param type $data
     * @return type
     */
    public function countDivAdminManobikSohayota($dis_code,  $is_admin, $ministry_id) { 
        //
        $where_ministry = "";
        $district_code = "    create_tran_member_table.dis_code IN (" . $dis_code . ")";
        if ($is_admin == 0) {
            $where_ministry = "   AND  aid_types.ministry_id = " . $ministry_id;
        }
        //
        $sql = "select
            COUNT(DISTINCT tran_member_id) as count_tran_member_number            
            from tran_member_aid "
        . " LEFT JOIN create_tran_member_table ON create_tran_member_table.create_tran_id = tran_member_aid.tran_member_id "
        . "  LEFT JOIN aid_types ON tran_member_aid.aid_type_id = aid_types.id  "
        . " LEFT JOIN  ministry_tbl ON  ministry_tbl.id = aid_types.ministry_id  "
        . " WHERE  "
        . $district_code
        . $where_ministry
        . "  ";     
        $query = $this->db->query($sql);
        $result = $query->result();        
        return $result[0]->count_tran_member_number;
    }
    
    
     /* District
     * Box A
     * @param type $data
     * @return type
     */
    public function countDistrictManobikSohayota($dis_code,  $is_admin, $ministry_id) { 
        //
        $where_ministry = "";
        $district_code = "    create_tran_member_table.dis_code IN (" . $dis_code . ")";
        if ($is_admin == 0) {
            $where_ministry = "   AND  aid_types.ministry_id = " . $ministry_id;
        }
        //
        $sql = "select
            COUNT(DISTINCT tran_member_id) as count_tran_member_number            
            from tran_member_aid "
        . " LEFT JOIN create_tran_member_table ON create_tran_member_table.create_tran_id = tran_member_aid.tran_member_id "
        . "  LEFT JOIN aid_types ON tran_member_aid.aid_type_id = aid_types.id  "
        . " LEFT JOIN  ministry_tbl ON  ministry_tbl.id = aid_types.ministry_id  "
        . " WHERE  "
        . $district_code
        . $where_ministry
        . "  ";     
        
        $query = $this->db->query($sql);
        $result = $query->result();        
        return $result[0]->count_tran_member_number;
    }
	
	 /* District
     * Box A
     * @param type $data
     * @return type
     */
    public function countUpozillaManobikSohayota($upo_code,  $is_admin, $ministry_id) { 
        //
        $where_ministry = "";
        $upo_code = "    create_tran_member_table.upo_code IN (" . $upo_code . ")";
        if ($is_admin == 0) {
            $where_ministry = "   AND  aid_types.ministry_id = " . $ministry_id;
        }
        //
       $sql = "select
            COUNT(DISTINCT tran_member_id) as count_tran_member_number            
            from tran_member_aid "
        . " LEFT JOIN create_tran_member_table ON create_tran_member_table.create_tran_id = tran_member_aid.tran_member_id "
        . "  LEFT JOIN aid_types ON tran_member_aid.aid_type_id = aid_types.id  "
        . " LEFT JOIN  ministry_tbl ON  ministry_tbl.id = aid_types.ministry_id  "
        . " WHERE  "
        . $upo_code
        . $where_ministry
        . "  ";     
		//exit;
        
        $query = $this->db->query($sql);
        $result = $query->result();        
        return $result[0]->count_tran_member_number;
    }

    /* SuperAdmin
     * Box B
     * @param type $data
     * @return type
     */

    public function countTranmemberBitoronNumber() {
        $sql = "select
            COUNT(DISTINCT card_no) as count_tran_member_britoron_number                     
            from  create_tran_bitoron_table";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result[0]->count_tran_member_britoron_number;
    }
    
     /* Division
     * Box B
     * @param type $data
     * @return type
     */

    public function countDivisionTranmemberBitoronNumber($dis_code, $is_admin, $ministry_id) {
        $where_ministry = "";
        if ($is_admin == 0) {
            $where_ministry = "   AND ministry_id = " . $ministry_id;
        }
        $sql = "select 
            COUNT(DISTINCT card_no) as count_tran_member_britoron_number     
            from create_tran_bitoron_table
            LEFT JOIN districts
            ON districts.dist_code = create_tran_bitoron_table.dis_code 
            where create_tran_bitoron_table.dis_code IN (" . $dis_code . ")" . $where_ministry . "  ";
        $query = $this->db->query($sql);
        $result = $query->result();
         return $result[0]->count_tran_member_britoron_number;
    }
    
      /* District
     * Box B
     * @param type $data
     * @return type
     */

    public function countDistrictTranmemberBitoronNumber($dis_code, $is_admin, $ministry_id) {
        $where_ministry = "";
        if ($is_admin == 0) {
            $where_ministry = "   AND ministry_id = " . $ministry_id;
        }
        $sql = "select 
            COUNT(DISTINCT card_no) as count_tran_member_britoron_number     
            from create_tran_bitoron_table
            LEFT JOIN districts
            ON districts.dist_code = create_tran_bitoron_table.dis_code 
            where create_tran_bitoron_table.dis_code IN (" . $dis_code . ")" . $where_ministry . "  ";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result[0]->count_tran_member_britoron_number;
    }
	
	     /* District
     * Box B
     * @param type $data
     * @return type
     */

    public function countUpozillaTranmemberBitoronNumber($upz_code, $is_admin, $ministry_id) {
        $where_ministry = "";
        if ($is_admin == 0) {
            $where_ministry = "   AND ministry_id = " . $ministry_id;
        }
        $sql = "select 
            COUNT(DISTINCT card_no) as count_tran_member_britoron_number     
            from create_tran_bitoron_table
            LEFT JOIN districts
            ON districts.dist_code = create_tran_bitoron_table.dis_code 
            where create_tran_bitoron_table.upz_code IN (" . $upz_code . ")" . $where_ministry . "  ";
        $query = $this->db->query($sql);
        $result = $query->result();
		
	
        return $result[0]->count_tran_member_britoron_number;
    }

    /** Division
     * Box C
     * @param type $data
     * @return type
     */
    public function sumDivisionAdminTranGrohon($dis_code, $ministry_id = 0, $is_supar_admin = 0) {
        $dis_code = explode(",", $dis_code);
        $this->db->select(array('traner_dhoron', 'sum(traner_poriman) as total_traner_poriman'));
        $this->db->from('create_tran_grohon_table');
        $this->db->where_in('dis_code', $dis_code);
        if ($is_supar_admin == 0) {
            $this->db->where('ministry_id', $ministry_id);
        }
        $this->db->group_by(array("traner_dhoron"));
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    
    /** District
     * Box C
     * @param type $data
     * @return type
     */
    public function sumDistrictAdminTranGrohon($dis_code, $ministry_id = 0, $is_supar_admin = 0) {
        $dis_code = explode(",", $dis_code);
        $this->db->select(array('traner_dhoron', 'sum(traner_poriman) as total_traner_poriman'));
        $this->db->from('create_tran_grohon_table');
        $this->db->where_in('dis_code', $dis_code);
        if ($is_supar_admin == 0) {
            $this->db->where('ministry_id', $ministry_id);
        }
        $this->db->group_by(array("traner_dhoron"));
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
	
	 /** Upozilla
     * Box C
     * @param type $data
     * @return type
     */
    public function sumUpozillaAdminTranGrohon($upz_code, $ministry_id = 0, $is_supar_admin = 0) {
        $upz_code = explode(",", $upz_code);
        $this->db->select(array('traner_dhoron', 'sum(traner_poriman) as total_traner_poriman'));
        $this->db->from('create_tran_grohon_table');
        $this->db->where_in('upz_code', $upz_code);
        if ($is_supar_admin == 0) {
            $this->db->where('ministry_id', $ministry_id);
        }
        $this->db->group_by(array("traner_dhoron"));
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
	
	

    /** Division
     * Box D
     * @param type $data
     * @return type
     */

    public function sumDivisionAdminTranAllocation($dis_code, $ministry_id = 0, $is_supar_admin = 0) {
        $dis_code = explode(",", $dis_code);
        $this->db->select('sum(dealer_allocation_amount) as total_dealer_allocation_amount');
        $this->db->from('create_tran_grohon_table');
        $this->db->where_in('dis_code', $dis_code);
        if ($is_supar_admin == 0) {
            $this->db->where('ministry_id', $ministry_id);
        }
        $query = $this->db->get();
        $result = $query->result();
        $result = $result[0]->total_dealer_allocation_amount;
        $result = floor($result);
        return $result;
    }
    
    
    

    /**
     * Dashboard Table 1 ----------------------------------------------------------------
     */
    public function listSADistrictWiseTranGrohons() {
        $sql = "select 
            districts.name,
            wothso, 
            traner_dhoron,
            tran_grohoner_tarikh,
            sum(traner_poriman) as total_grohon,
            sum(dealer_allocation_amount) as total_bitoron
            from create_tran_grohon_table
            LEFT JOIN districts
            ON districts.dist_code = create_tran_grohon_table.dis_code 
            group by traner_dhoron , wothso ,dis_code limit 0,20 ";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    /**
     * Division
     * @return type
     */
    public function listDivisionDistrictWiseTranGrohons($dis_code, $is_admin, $ministry_id) {
        //
        $where_ministry = "";
        if ($is_admin == 0) {
            $where_ministry = "   AND ministry_id = " . $ministry_id;
        }
        $sql = "select 
           dis_code,
            districts.name,
            wothso, 
            traner_dhoron,
            tran_grohoner_tarikh,
            sum(traner_poriman) as total_grohon,
            sum(dealer_allocation_amount) as total_bitoron
            from create_tran_grohon_table
            LEFT JOIN districts
            ON districts.dist_code = create_tran_grohon_table.dis_code 
            where dis_code IN (" . $dis_code . ")" . $where_ministry . " group by traner_dhoron , wothso , dis_code limit 0,20 ";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    
    /**
     * District
     * @param type $dis_code
     * @param type $is_admin
     * @param type $ministry_id
     * @return type
     */
    public function listDistrictDistrictWiseTranGrohons($dis_code, $is_admin, $ministry_id) {
        //
        $where_ministry = "";
        if ($is_admin == 0) {
            $where_ministry = "   AND ministry_id = " . $ministry_id;
        }
        $sql = "select 
           dis_code,
            districts.name,
            wothso, 
            traner_dhoron,
            tran_grohoner_tarikh,
            sum(traner_poriman) as total_grohon,
            sum(dealer_allocation_amount) as total_bitoron
            from create_tran_grohon_table
            LEFT JOIN districts
            ON districts.dist_code = create_tran_grohon_table.dis_code 
            where dis_code IN (" . $dis_code . ")" . $where_ministry . " group by traner_dhoron , wothso , dis_code limit 0,20 ";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
	
	    /**
     * Upozilla
     * @param type $dis_code
     * @param type $is_admin
     * @param type $ministry_id
     * @return type
     */
    public function listUpozillaWiseTranGrohons($upz_code, $is_admin, $ministry_id) {
        //
        $where_ministry = "";
        if ($is_admin == 0) {
            $where_ministry = "   AND ministry_id = " . $ministry_id;
        }
         $sql = "select
           create_tran_grohon_table.upz_code,
            upazilas.name,
            wothso, 
            traner_dhoron,
            tran_grohoner_tarikh,
            sum(traner_poriman) as total_grohon,
            sum(dealer_allocation_amount) as total_bitoron
            from create_tran_grohon_table
            LEFT JOIN upazilas
            ON upazilas.upz_code = create_tran_grohon_table.upz_code 
            where create_tran_grohon_table.upz_code IN (" . $upz_code . ")" . $where_ministry . " group by traner_dhoron , wothso , dis_code limit 0,20 ";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
	
	

    /**
     * Dashboard Table 2 ----------------------------------------------------------------
     */
    public function listSADashboardBitoron() {
        $sql = "select
            count(DISTINCT tran_member_id)  as total_tran_member_id,
            aid_type_id,
            aid_types.name as wothso, 
            ministry_tbl.ministry_name
            from tran_member_aid 
            LEFT JOIN aid_types ON tran_member_aid.aid_type_id = aid_types.id 
            LEFT JOIN  ministry_tbl ON  ministry_tbl.id = aid_types.ministry_id 
            group by tran_member_aid.aid_type_id, aid_types.ministry_id";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    /**
     * Division
     * @param type $dis_code
     * @param type $is_admin
     * @param type $ministry_id
     * @return type
     */
    public function listDivisiondistrictWisedBitoron($dis_code, $is_admin, $ministry_id) {
        $where_ministry = "";
        $district_code = "    create_tran_member_table.dis_code IN (" . $dis_code . ")";
        if ($is_admin == 0) {
            $where_ministry = "   AND  aid_types.ministry_id = " . $ministry_id;
        }
        //
        $sql = "select
            count(DISTINCT tran_member_id)  as total_tran_member_id,
            aid_type_id,
            aid_types.name as wothso, 
            ministry_tbl.ministry_name
            from tran_member_aid "
        . " LEFT JOIN create_tran_member_table ON create_tran_member_table.create_tran_id = tran_member_aid.tran_member_id "
        . "  LEFT JOIN aid_types ON tran_member_aid.aid_type_id = aid_types.id  "
        . " LEFT JOIN  ministry_tbl ON  ministry_tbl.id = aid_types.ministry_id  "
        . " WHERE  "
        . $district_code
        . $where_ministry
        . "  group by tran_member_aid.aid_type_id, aid_types.ministry_id";
        //
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    
     /**
     * Division
     * @param type $dis_code
     * @param type $is_admin
     * @param type $ministry_id
     * @return type
     */
    public function listDistrictdistrictWisedBitoron($dis_code, $is_admin, $ministry_id) {
        $where_ministry = "";
        $district_code = "    create_tran_member_table.dis_code IN (" . $dis_code . ")";
        if ($is_admin == 0) {
            $where_ministry = "   AND  aid_types.ministry_id = " . $ministry_id;
        }
        //
        $sql = "select
            count(DISTINCT tran_member_id)  as total_tran_member_id,
            aid_type_id,
            aid_types.name as wothso, 
            ministry_tbl.ministry_name
            from tran_member_aid "
        . " LEFT JOIN create_tran_member_table ON create_tran_member_table.create_tran_id = tran_member_aid.tran_member_id "
        . "  LEFT JOIN aid_types ON tran_member_aid.aid_type_id = aid_types.id  "
        . " LEFT JOIN  ministry_tbl ON  ministry_tbl.id = aid_types.ministry_id  "
        . " WHERE  "
        . $district_code
        . $where_ministry
        . "  group by tran_member_aid.aid_type_id, aid_types.ministry_id";
        ///exit;
        //
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
	
	     /**
     * Division
     * @param type $upo_code
     * @param type $is_admin
     * @param type $ministry_id
     * @return type
     */
    public function listUpozillaWisedBitoron($upo_code, $is_admin, $ministry_id) {
        $where_ministry = "";
        $district_code = "    create_tran_member_table.upo_code IN (" . $upo_code . ")";
        if ($is_admin == 0) {
            $where_ministry = "   AND  aid_types.ministry_id = " . $ministry_id;
        }
        //
        $sql = "select
            count(DISTINCT tran_member_id)  as total_tran_member_id,
            aid_type_id,
            aid_types.name as wothso, 
            ministry_tbl.ministry_name
            from tran_member_aid "
        . " LEFT JOIN create_tran_member_table ON create_tran_member_table.create_tran_id = tran_member_aid.tran_member_id "
        . "  LEFT JOIN aid_types ON tran_member_aid.aid_type_id = aid_types.id  "
        . " LEFT JOIN  ministry_tbl ON  ministry_tbl.id = aid_types.ministry_id  "
        . " WHERE  "
        . $district_code
        . $where_ministry
        . "  group by tran_member_aid.aid_type_id, aid_types.ministry_id";
        ///exit;
        //
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

}

?>