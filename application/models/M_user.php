<?php
/**
 * common logic for all types of users
 */
class M_user extends CI_Model {

    protected $user_table = '';

    public function __construct() {
        parent::__construct();
    }

    public function findUser($whereField , $whereValue, $user_table) {              
        $this->db->select('*');
        $this->db->from($user_table);
        $this->db->where($whereField, $whereValue);
        $query = $this->db->get();
        return $query->row();
    }
    /**
     * 
     * @param type $field
     * @param type $whereField
     * @param type $whereValue
     * @param type $table
     * @return type
     */
    public function findFieldValue($field , $whereField , $whereValue, $table) {           
        $this->db->select($field);
        $this->db->from($table);
        $this->db->where($whereField, $whereValue);
        $query = $this->db->get();
        return $query->row();
    }
    
     /**
     * 
     * @param type $field
     * @param type $whereField
     * @param type $whereValue
     * @param type $table
     * @return type
     */
    public function findDistrictList($whereValue) {    
        $district_list = new stdClass();
        $sql = "select * from districts where division_id =" . $whereValue . " ORDER BY dist_code ASC";
        $query = $this->db->query($sql);
        $result = $query->result();
        $dist_code = array();
        foreach ($result as $key => $distCode) {
            $dist_code[] = $distCode->dist_code;
        }
        $dist_code = implode("," , $dist_code);
        $district_list->district_list = $dist_code;
        $result = $district_list;
        return $result;
        /**
        $this->db->select(array("GROUP_CONCAT ( DISTINCT dist_code ORDER BY dist_code  SEPARATOR ',') as district_list"));
        $this->db->from('districts');
        $this->db->where('division_id', $whereValue);
        $query = $this->db->get();
        return $query->row();**/
    }

}

?>