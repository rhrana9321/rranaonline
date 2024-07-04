<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
 
class Tran extends \Restserver\Libraries\REST_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_cloud','M_join'));
    }

    public function members_post()
    {
        header("Access-Control-Allow-Origin: *");

        // Load Authorization Token Library
        $this->load->library('Authorization_Token');

        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();


        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE)
        {
            # Delete a User Article

            # XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
            $card_no = $this->security->xss_clean($this->input->post('card_no'));
            $allocation_id = $this->security->xss_clean($this->input->post('allocation_id'));
            $date = $this->security->xss_clean($this->input->post('date'));


            if (empty($card_no) AND !is_numeric($card_no))
            {
                $this->response(['status' => FALSE, 'message' => 'Invalid Card No' ], REST_Controller::HTTP_NOT_FOUND);
            }
            else
            {

                // Load Article Model
               $member =  $this->M_cloud->findbyidstock('create_tran_member_table', array('card_no'=> $card_no));

                if (!empty($member))
                {
                    $allocation_info = $this->M_join->get_dealer_allocation_byid('dealer_allocation_tbl', array('id'=> $allocation_id));

                    $member_list = json_decode($allocation_info->tran_member_id,true);


                    if(in_array($member->create_tran_id, $member_list)) {

                        //check inventory
                        if($allocation_info->allocation_amount <= $allocation_info->prodan_amount) {
                            $message = [
                                'status' => false,
                                'message' => "দেয়ার মত যথেষ্ট ত্রাণ আপনার কাছে নাই ",
                                'allocation_amount'=>$allocation_info->allocation_amount,
                                'prodan_amount'=>$allocation_info->prodan_amount



                            ];
                            $this->response($message, REST_Controller::HTTP_OK);
                        } else {

                            // lets check for date validation
                            $day_remain = $this->isValidForTran($card_no, $allocation_info->wothso, $date);
                            if ($day_remain == '-1' || $day_remain == '-2') {
                                $data = [
                                    'tran_member_id' => $member->create_tran_id,
                                    'card_no' => $card_no,
                                    'wothso' => $allocation_info->wothso,
                                    'seba_package_name' => $allocation_info->seba_package_name,
                                    'tran_grohoner_tarikh' => $date,
                                    'datetime' => date('Y-m-d'),
                                    'cdate' => date('Y-m-d'),
                                    'create_record' => $is_valid_token['data']->create_dealer_admin_id,
                                    'upz_code' => $member->upo_code,
                                    'dis_code' => $member->dis_code,
                                    'allocation_id'=>$allocation_id,
                                    'ministry_id'=>$allocation_info->ministry_id
                                ];

                                $this->db->insert('create_tran_bitoron_table', $data);

                                $sql = "UPDATE dealer_allocation_tbl SET prodan_amount = prodan_amount +" . $allocation_info->amount . ",count_member_prodhan_id+" . $allocation_info->count_member_prodhan_id . "  WHERE id = " . $allocation_id;
                                $this->db->query($sql);


                                // Success
                                $message = [
                                    'status' => true,
                                    'message' => "আপনার ত্রাণসফলভাবেবিতরণহয়েছে",
                                    'day_remain'=>$day_remain,
                                    'allocation_amount' => $allocation_info->allocation_amount,
                                    'prodan_amount' => $allocation_info->prodan_amount + $allocation_info->amount


                                ];
                                $this->response($message, REST_Controller::HTTP_OK);
                            } else {
                                $message = [
                                    'status' => FALSE,
                                    'message' => "আপনি ইতিমধ্যে এই মানবিক সহায়তা গ্রহণ করেছেন। পরবর্তি মানবিক সহায়তা " . $day_remain . " দিন পরে গ্রহণ করতে পারবেন।"
                                ];
                                $this->response($message, REST_Controller::HTTP_OK);
                            }
                        }

                    } else {
                        //member not valid for this tran
                        $message = [
                            'status' => FALSE,
                            'message' => "আপনি এই সহায়তারজন্যমমনোনীত নন"
                        ];
                        $this->response($message, REST_Controller::HTTP_NOT_FOUND);
                    }
                } else
                {
                    // Error
                    $message = [
                        'status' => FALSE,
                        'message' => "Card No Not Found"
                    ];
                    $this->response($message, REST_Controller::HTTP_NOT_FOUND);
                }
            }

        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }



    private function isValidForTran($card_no, $type, $current_date) {
        $tran_bitoron =  $this->M_cloud->findbyidstock('create_tran_bitoron_table', array('card_no'=> $card_no));
        $aid_type =  $this->M_cloud->findbyidstock('aid_types', array('name'=> $type));
        if(!$tran_bitoron){
            return '-1';
        } else {
            $earlier = new DateTime($tran_bitoron->tran_grohoner_tarikh);
            $later = new DateTime($current_date);

            $diff = $later->diff($earlier);

            if($diff->days >= $aid_type->limit_day) {
                return '-2';
            } else {
                return $aid_type->limit_day - $diff->days;
            }
        }
    }


}