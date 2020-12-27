<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribe extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function put()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', 'Please input email!!!');
            redirect(base_url(), 'refresh');
        } 
        
        if($this->input->post('email'))
        {
            
            $email_subs = $this->input->post('email', true);
            
            // cek email
            if($this->cekEmail($email_subs) == true)
            {
                $this->session->set_flashdata('error', 'Email already exist!!!');
                redirect(base_url(), 'refresh');
            }

            $data = array(
                'subscribe_email' => $email_subs,
                'subscribe_create' => date("Y-m-d H:i:s")
            );
            
            $this->db->insert('resp_subscribe', $data);

            if($this->db->affected_rows())
            {
                $this->session->set_flashdata('success', 'Subscribe success!!!');
                redirect(base_url());
            } else {
                $this->session->set_flashdata('error', 'Subscribe failed!!!');
                redirect(base_url(), 'refresh');
            }

        } else {
            echo "Maaf terjadi kesalahan!!!";
        }
        
    }

    public function cekEmail($email)
    {
        $this->db->where('subscribe_email', $email);
        $query = $this->db->get('resp_subscribe');
        if($query->num_rows() > 0){
            return true;
        } else{
            return false;
        }
    }

}