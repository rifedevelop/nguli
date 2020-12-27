<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirm_payment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('ceksession','language','direct'));
        $this->load->model('Payment_m','pay');
        ceksession();
		language();
    }

    public function confirm()
    {
    	if ($this->input->post('image_confirm')) 
        {
            $result = $this->pay->confirm();

            if($result)
            {
                $this->session->set_flashdata('success', 'Konfirmasi telah dikirim!!!');
                redirect($this->input->server('HTTP_REFERER'));
            } else {
                $this->session->set_flashdata('error', 'Konfirmasi gagal dikirim!!!');
                redirect($this->input->server('HTTP_REFERER'));
            }
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan');
            redirect($this->input->server('HTTP_REFERER'));
        }
    }
}