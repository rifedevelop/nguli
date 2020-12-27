<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment_appoint extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('ceksession', 'language', 'direct'));
        $this->load->model('Payment_m', 'pay');
        ceksession();
        language();
    }

    public function detail($idProject)
    {
        $project = $this->pay->detailAppoint($idProject)->result();
        if ($project[0]->payment_status == 0) {
            $payProject = array(
                'project_id'  => $project[0]->id,
                'category'  => $project[0]->category,
                'budget'  => $project[0]->budget,
                'duration' => $project[0]->duration
            );

            $this->session->set_userdata('payment_appoint', $payProject);

            $data = array(
                'title' => 'Payment - ' . $this->lang->line('title'),
                'data_session' => $this->session->userdata('data_session'),
                'project' => $project[0]
            );

            $data['main'] = 'customer/payment_detail_appoint_v';

            $this->load->view('layout', $data);
        } else {
            redirect(site_url('customer/ongoing_bidding'));
        }
    }

    public function method()
    {
        if ($_SESSION['payment_appoint']['project_id']) {
            $data = array(
                'title' => 'Payment - ' . $this->lang->line('title'),
                'data_session' => $this->session->userdata('data_session')
            );

            $data['main'] = 'customer/payment_method_appoint_v';
            $this->load->view('layout', $data);
        } else {
            $this->session->set_flashdata('error', 'Sesi pembayaran berakhir!!!');
            redirect(site_url('customer/ongoing_bidding'));
        }
    }

    public function save()
    {
        if ($this->input->post('project_id')) {
            $ins = $this->pay->insAppoint();
            if ($ins) {
                $this->session->unset_userdata('payment_appoint');
                $this->session->set_flashdata('success', 'Silahkan konfirmasi pembayaran anda!!!');
                redirect(site_url('customer/transaction_project'));
            } else {
                $this->session->set_flashdata('error', 'Transaksi gagal!!!!!!');
                redirect($this->input->server('HTTP_REFERER'));
            }
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan!!!');
            redirect($this->input->server('HTTP_REFERER'));
        }
    }

    public function method_post()
    {
        if ($_POST['project_id']) {
            $idProject = md5($this->input->post('project_id'));
            $project = $this->pay->detailProject($idProject)->result();
            $data = array(
                'title' => 'Payment - ' . $this->lang->line('title'),
                'data_session' => $this->session->userdata('data_session'),
                'project' => $project[0]
            );

            $data['main'] = 'customer/payment_method_v';
            $this->load->view('layout', $data);
        } else {
            $this->session->set_flashdata('error', 'Access Denied!!!');
            redirect(site_url('customer/ongoing_bidding'));
        }
    }
}
