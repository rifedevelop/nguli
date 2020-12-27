<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appoint_project extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('ceksession','language','timeago','upload_image'));
        $this->load->model('Appoint_project_m', 'appoint');
        ceksession();
        language();
    }

    public function save()
    {
        if ($this->input->post() !== FALSE) 
        {
            $result = $this->appoint->insAppoint();

            if($result)
            {
                $this->session->set_flashdata('success', 'Pengajuan telah dikirim!!!');
                redirect(site_url().'payment_appoint/detail/'.md5((string)$result));
            } else {
                $this->session->set_flashdata('error', 'Pengajuan gagal dikirim!!!');
                redirect($this->input->server('HTTP_REFERER'));
            }
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan');
            redirect($this->input->server('HTTP_REFERER'));
        }
    }

}