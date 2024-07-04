<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tranmember_Model extends CI_Model
{
    protected $tranmember_table = 'create_tran_member_table';



    /**
     * Delete an Article
     * @param: {array} Article Data
     */
    public function get_member(array $data)
    {
        /**
         * Check Article exist with article_id and user_id
         */
        $query = $this->db->get_where($this->tranmember_table, $data);
        if ($this->db->affected_rows() > 0) {
            
            // Delete Article
            $this->db->delete($this->article_table, $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            }
            return false;
        }   
        return false;
    }

    public function get_members($start, $length, $order, $dir, $where)
    {

        if($order !=null) {
            $this->db->order_by($order, $dir);
        }

        return $this->db
            ->limit($length,$start)
            ->where($where)
            ->get('create_tran_member_table');
    }

    public function get_total_members($where)
    {
        $query = $this->db->select("COUNT(*) as num") ->where($where)->get('create_tran_member_table');
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
    }


}