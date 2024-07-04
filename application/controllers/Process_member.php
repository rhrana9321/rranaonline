<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Process_member extends CI_Controller {

	static $helper   = array('url','user_helper');
	public function __construct(){
		parent::__construct();
		$this->load->helper(self::$helper);
		$this->load->database();
		$this->load->model(array('M_cloud', 'M_superadmin', 'M_join'));
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('form_validation'); 
		$this->load->library('email');
		//$this->load->library('pagination');
		//$this->load->library('upload');
		$this->load->library('cart');
		//isAuthenticate();
		if(!$this->input->is_cli_request())
		{
			echo "process member can be access only from  the command line";
			return;
		}
	
	 }
	
	
	public function index()
	{
		$temp_list = $this->M_cloud->getUnprocessedRow('temp_tran_member_table', array('is_crawl'=> 0, 'is_error'=> 0, 'is_uno_approved'=>1, 'is_pio_approved'=>1), 500);
		foreach($temp_list as $member) {
			if(!($this->isRowValid($member->dis_code,$member->upo_code, $member->tran_grohitar_name, $member->f_haus_name, $member->mobile))) {
				$this->importMemberFromTemp($member);
			} else {
				$update_data = array('is_crawl'=>1,'is_error'=>1, 'error_msg'=>'Date Exists');
				$this->db->update('temp_tran_member_table', $update_data, array('tran_id' => $member->tran_id));
				//not processed;
			}

		}

	}
	private function importMemberFromTemp($member){

		try {
			$result = array(
				'dis_code' => $member->dis_code,
				'upo_code' => $member->upo_code,
				'card_no' => $member->card_no,
				'serial_no' => $member->serial_no,
				'tran_grohitar_name' => $member->tran_grohitar_name,
				'mobile' => $member->mobile,
				'boyos' => $member->boyos,
				'date_of_birth' => $member->date_of_birth,
				'fh' => $member->fh,
				'f_haus_name' => $member->f_haus_name,
				'others_vata' => $member->others_vata,
				'purbe_kono_samajik_nirapotta' => $member->purbe_kono_samajik_nirapotta,
				'poribarer_sodosso_sonkha' => $member->poribarer_sodosso_sonkha,
				'lingo' => $member->lingo,
				'pesa' => $member->pesa,
				'jatiotanombor' => $member->jatiotanombor,
				'jela_bortoman' => $member->jela_bortoman,
				'jela_sthai' => $member->jela_sthai,
				'upjella_bortoman' => $member->upjella_bortoman,
				'upjella_sthai' => $member->upjella_sthai,
				'union_word_bortoman' => $member->union_word_bortoman,
				'union_word_sthai' => $member->union_word_sthai,
				'word_bortoman' => $member->word_bortoman,
				'word_sthai' => $member->word_sthai,
				'gram_para_moholla_bortoman' => $member->gram_para_moholla_bortoman,
				'gram_para_moholla_sthai' => $member->gram_para_moholla_sthai,
				'basa_sorok_name_nombor_bortoman' => $member->basa_sorok_name_nombor_bortoman,
				'basa_sorok_name_nombor_sthai' => $member->basa_sorok_name_nombor_sthai,
				'datetime' => $member->datetime,
				'cdate' => $member->cdate,
				'create_record' => $member->create_record,
				'upozila_create' => $member->upozila_create,
				'f_member_male' => $member->f_member_male,
				'f_member_female' => $member->f_member_female,
				'f_member_hizra' => $member->f_member_hizra,
				'f_member_child' => $member->f_member_child,
				'f_member_disable' => $member->f_member_disable,
				'log' => $member->log


			);

			if ($this->db->insert('create_tran_member_table', $result)) {
				$insert_id = $this->db->insert_id();
				list($code, $serial) = $this->M_cloud->generateCode('create_tran_member_table', $member->dis_code, $member->upo_code);

				$update_data = array('card_no' => $code, 'serial_no' => $serial);
				$this->db->update('create_tran_member_table', $update_data, array('create_tran_id' => $insert_id));

				$update_data = array('is_crawl'=>1);
				$this->db->update('temp_tran_member_table', $update_data, array('tran_id' => $member->tran_id));
				return true;
			}
		} catch(Exception $e) {
			$update_data = array('is_crawl'=>1,'is_error'=>1, 'error_msg'=>$e->getMessage());
			$this->db->update('temp_tran_member_table', $update_data, array('tran_id' => $member->tran_id));
		}
	}

	private function isRowValid($dis_code, $upz_code, $name, $fname, $mobile) {

		$this->db->select('count(*) as total');
		$this->db->from('create_tran_member_table');
		$this->db->where(array('dis_code'=>$dis_code, 'upo_code'=>$upz_code, 'tran_grohitar_name'=>$name, 'f_haus_name'=>$fname, 'mobile'=>$mobile));
		$query = $this->db->get();
		$row= $query->row();
		return $row->total;
	}
	
	
}
?>