<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    static $helper = array('url', 'authentication');
    public $userInfo;

    public function __construct() {
        parent::__construct();
        $this->load->helper(self::$helper);
        $this->load->database();
        $this->load->model(array('M_allocation', 'M_trangrohon', 'M_user', 'M_cloud', 'M_join', 'M_superadmin'));
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('email');
        //$this->load->library('pagination');
        //$this->load->library('upload');
        isAuthenticate();
        $user_type = $this->session->userdata('email');
        if ($user_type != 'User') {
            redirect('Home');
        }
    }

    public function index() {
        $data['title'] = "";
        $this->session->userdata('id');
        $user_id = $this->session->userdata('userid');
        $data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id' => $user_id));
        $this->load->view('user/dashboardpage', $data);
    }

}

?>