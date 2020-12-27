<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bid_project extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('ceksession','language','timeago','upload_image'));
        $this->load->model('Bid_project_m', 'Bid');
        ceksession();
        language();
    }

    public function form_bid()
    {
        $sess_mitra = cekSessionMitra('cek');

        if($sess_mitra['status_verif'] == 0 || $sess_mitra['status_verif'] == 2)
        {
            $this->session->set_flashdata('error', 'Silahkan verifikasi data diri terlebih dahulu!!!');
            redirect($this->input->server('HTTP_REFERER'));
        } else {
            if($this->input->get('id')) {
                $id = addslashes($this->input->get('id'));
            } else {
                redirect($this->input->server('HTTP_REFERER'));
            }
            $getBid = $this->Bid->getProjectBiddingMitra($id)->result();

            $data = array(
    			'title' => 'Form Pengajuan -'.$this->lang->line('title'), 
                'data_session' => $sess_mitra,
                'dataBid' => $getBid[0],
            );
            
            $data['main'] = 'mitra/form_bid_mitra_v';

            $this->load->view('layout', $data);
        }
    }
    
    public function saveBid()
    {

        cekSessionMitra();

        if ($this->input->post() !== FALSE) {
            $idBid = $this->Bid->insertBid();
            $idPost = $this->input->post('id_post',true);
            $desc = $this->input->post('description',true);
            $imagePost = upload_post_bid($_FILES['images'],$_SESSION['data_session']['name'],'mitra',$idBid, $idPost, $desc);
            // var_dump($imagePost);die();
            if($imagePost > 0)
            {
                $result = $this->db->insert_batch('m08_post_bid_pict', $imagePost);
            }
            if($result)
            {
                $this->session->set_flashdata('success', 'Pengajuan telah dikirim!!!');
                redirect(base_url('project/detail?id='.md5((string)$idPost)));
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