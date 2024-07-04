<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';

class Users extends \Restserver\Libraries\REST_Controller
{
    public function __construct() {
        parent::__construct();
        // Load User Model
        $this->load->model(array('User_model', 'M_cloud', 'M_join'));
        $this->load->library('form_validation');
    }

//    /**
//     * User Register
//     * --------------------------
//     * @param: fullname
//     * @param: username
//     * @param: email
//     * @param: password
//     * --------------------------
//     * @method : POST
//     * @link : api/user/register
//     */
//    public function register_post()
//    {
//        header("Access-Control-Allow-Origin: *");
//
//        # XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
//        $_POST = $this->security->xss_clean($_POST);
//
//        # Form Validation
//        $this->form_validation->set_rules('fullname', 'Full Name', 'trim|required|max_length[50]');
//        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]|alpha_numeric|max_length[20]',
//            array('is_unique' => 'This %s already exists please enter another username')
//        );
//        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[80]|is_unique[users.email]',
//            array('is_unique' => 'This %s already exists please enter another email address')
//        );
//        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[100]');
//        if ($this->form_validation->run() == FALSE)
//        {
//            // Form Validation Errors
//            $message = array(
//                'status' => false,
//                'error' => $this->form_validation->error_array(),
//                'message' => validation_errors()
//            );
//
//            $this->response($message, REST_Controller::HTTP_NOT_FOUND);
//        }
//        else
//        {
//            $insert_data = [
//                'full_name' => $this->input->post('fullname', TRUE),
//                'email' => $this->input->post('email', TRUE),
//                'username' => $this->input->post('username', TRUE),
//                'password' => md5($this->input->post('password', TRUE)),
//                'created_at' => time(),
//                'updated_at' => time(),
//            ];
//
//            // Insert User in Database
//            $output = $this->UserModel->insert_user($insert_data);
//            if ($output > 0 AND !empty($output))
//            {
//                // Success 200 Code Send
//                $message = [
//                    'status' => true,
//                    'message' => "User registration successful"
//                ];
//                $this->response($message, REST_Controller::HTTP_OK);
//            } else
//            {
//                // Error
//                $message = [
//                    'status' => FALSE,
//                    'message' => "Not Register Your Account."
//                ];
//                $this->response($message, REST_Controller::HTTP_NOT_FOUND);
//            }
//        }
//    }


    /**
     * User Login API
     * --------------------
     * @param: username or email
     * @param: password
     * --------------------------
     * @method : POST
     * @link: api/user/login
     */
    public function login_post()
    {
        header("Access-Control-Allow-Origin: *");

        # XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
        $_POST = $this->security->xss_clean($_POST);

        # Form Validation
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[100]');
        if ($this->form_validation->run() == FALSE)
        {
            // Form Validation Errors
            $message = array(
                'status' => false,
                'error' => $this->form_validation->error_array(),
                'message' => validation_errors()
            );

            $this->response($message, REST_Controller::HTTP_NOT_FOUND);
        }
        else
        {
            // Load Login Function
            $output = $this->User_model->user_login($this->input->post('username'), $this->input->post('password'));
            if (!empty($output) AND $output != FALSE)
            {
                // Load Authorization Token Library
                $this->load->library('Authorization_Token');

                $dealer_details_info = $this->M_join->finddealer_with_upzilla('create_dealer_admin_table', array('create_dealer_admin_id'=> $output->create_dealer_admin_id));


                // Generate Token
                $token_data['create_dealer_admin_id'] = $output->create_dealer_admin_id;

                $token_data['username'] = $output->username;
                $token_data['mobile'] = $output->mobile;
                $token_data['seba_prodankarir_name'] = $output->seba_prodankarir_name;
                $token_data['time'] = time();

                $user_token = $this->authorization_token->generateToken($token_data);
                $dealer_allocation = $this->M_join->get_dealer_allocation_for_api('dealer_allocation_tbl', $output->create_dealer_admin_id);


                $return_data = [
                    'create_dealer_admin_id' => $output->create_dealer_admin_id,
                    'seba_prodankarir_name' => $output->seba_prodankarir_name,
                    'details'=>$dealer_details_info,
                    'allocation'=>$dealer_allocation,
                    'username' => $output->username,
                   'card_no' => $output->card_no,
                    'token' => $user_token,
                ];

                // Login Success
                $message = [
                    'status' => true,
                    'data' => $return_data,
                    'message' => "User login successful"
                ];
                $this->response($message, REST_Controller::HTTP_OK);
            } else
            {
                // Login Error
                $message = [
                    'status' => FALSE,
                    'message' => "Invalid Username or Password"
                ];
                $this->response($message, REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
}