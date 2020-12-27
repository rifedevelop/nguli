<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('ceksession','language'));
        $this->load->model(array('Post_m'));
        $this->load->model('Mitra_m', 'mitra');
        $this->load->model('Customer_m', 'customer');
        // ceksession();
		language();
    }

    public function index()
    {
        $ceksession = ceksession();
		$user_id = $this->input->get('id', true);
        
        if($ceksession['type_user'] == 'mitra'){
            $user_customer = $this->customer->get_customer($user_id)->row();
            // var_dump($user_mitra);die();
            $data = array(
                'title' => $this->lang->line('title'), 
                'data_session' => $this->session->userdata('data_session'),
                'dataCustomer' => $user_customer
            );

            $data['navbar'] = 'mitra/component/navbar_after_login';
            $data['main'] = 'page/profile_customer_v';
        } else if ($ceksession['type_user'] == 'customer') {
            $user_mitra = $this->mitra->get_mitra($user_id)->row();
            // var_dump($user_mitra);die();
            $data = array(
                'title' => $this->lang->line('title'), 
                'data_session' => $this->session->userdata('data_session'),
                'dataMitra' => $user_mitra
            );

            $data['navbar'] = 'customer/component/navbar_after_login';
            $data['main'] = 'page/profile_mitra_v';
            
        } else {
            $data['navbar'] = 'component/navbar';
        }
        // var_dump($data);die();

        $this->load->view('layout', $data);
    }

}