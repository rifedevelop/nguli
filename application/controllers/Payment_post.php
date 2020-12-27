<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_post extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('ceksession','language','direct'));
        $this->load->model('Payment_m','pay');
        ceksession();
		language();
    }

    public function detail($idPost)
    {
        $post = $this->pay->detailPost($idPost)->result();
        $image = $this->pay->detailImage($idPost)->result();
        // var_dump($image);die();
        if($post){

            $payPost = array(
                'post_id'  => $post[0]->id,
                'post_subtotal'  =>  $post[0]->category == 1 ? $this->config->item('payment_design') : $this->config->item('payment_construction'),
            );

            $this->session->set_userdata('payment_post',$payPost);

            $data = array(
                'title' => 'Payment - '.$this->lang->line('title'), 
                'data_session' => $this->session->userdata('data_session'),
                'post' => $post[0],
                'image' => $image[0],
                'subtotal' => $post[0]->category == 1 ? $this->config->item('payment_design') : $this->config->item('payment_construction'),
            );

            $data['main'] = 'customer/payment_detail_post_v';

            $this->load->view('layout', $data);
        } else {
            redirect(site_url('customer/ongoing_bidding'));
        }
        
    }

    public function method()
    {
        if($_SESSION['payment_post']['post_id']){
            $data = array(
                'title' => 'Payment - '.$this->lang->line('title'), 
                'data_session' => $this->session->userdata('data_session')
            );

            $data['main'] = 'customer/payment_method_post_v';
            $this->load->view('layout', $data);
        } else {
            $this->session->set_flashdata('error', 'Sesi pembayaran berakhir!!!');
            redirect(site_url('customer/ongoing_bidding'));
        }
        
    }

    public function save()
    {
        if($this->input->post('post_id')){
            $ins = $this->pay->insPost();
            if($ins){
                $this->session->unset_userdata('payment_post');
                $this->session->set_flashdata('success', 'Silahkan konfirmasi pembayaran anda!!!');
                redirect(site_url('customer/transaction_post'));
            } else {
                $this->session->set_flashdata('error', 'Transaksi gagal!!!');
                redirect($this->input->server('HTTP_REFERER'));
            }
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan!!!');
            redirect($this->input->server('HTTP_REFERER'));
        }
    }

    // public function method_post()
    // {
    //     if($_POST['project_id']){
    //         $idProject = md5($this->input->post('project_id'));
    //         $project = $this->pay->detailProject($idProject)->result();
    //         $data = array(
    //             'title' => 'Payment - '.$this->lang->line('title'), 
    //             'data_session' => $this->session->userdata('data_session'),
    //             'project' => $project[0]
    //         );

    //         $data['main'] = 'customer/payment_method_v';
    //         $this->load->view('layout', $data);
    //     } else {
    //         $this->session->set_flashdata('error', 'Access Denied!!!');
    //         redirect(site_url('customer/ongoing_bidding'));
    //     }
        
    // }

    public function confirm()
    {
        if($this->input->post('invoice_id')){
            $result = $this->pay->confirm_post();
            if($result)
            {
                $this->session->set_flashdata('success', 'Bukti pembayaran berhasil dikirim!!!');
                redirect($this->input->server('HTTP_REFERER'));
            } else {
                $this->session->set_flashdata('error', validation_errors() );
                redirect($this->input->server('HTTP_REFERER'));
            }
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan');
             redirect($this->input->server('HTTP_REFERER'));
        }
    }

}