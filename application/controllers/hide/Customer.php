<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->cekSessionCustomer();
    }

    public function profile()
    {
        $ind = $this->uri->segment("1");
		
		switch ($ind) {
			case 'id':
				$lang = $this->lang->load('nguli', 'indonesia');
				break;
			default:
				$lang = $this->lang->load('nguli', 'english');
				break;
		}
		
		$data = array(
			'title' => $this->lang->line('title'), 
            'language' => $lang,
            'data_session' => $this->session->userdata('data_session'),
        );
        
        $data['main'] = 'page/profile_v';

		$this->load->view('layout', $data);
    }

    public function cekSessionCustomer()
    {
        if($this->session->userdata('data_session') == null)
        {
            redirect(base_url(),'refresh');
        }

        if($_SESSION['data_session']['type_user'] !== 'customer')
        {
            $this->session->set_flashdata('error', 'Anda masuk sebagai Customer!!!');
            redirect(base_url(),'refresh');
        }
    }

}