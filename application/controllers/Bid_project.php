<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bid_project extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('ceksession', 'language', 'timeago', 'upload_image'));
        $this->load->model('Bid_project_m', 'Bid');
        ceksession();
        language();
    }

    public function form_bid()
    {
        $sess_mitra = cekSessionMitra('cek');
        $idPost = addslashes($this->input->get('id'));
        $idMitra = $sess_mitra['id'];
            
        $cek_bid = $this->db->query("SELECT count(m06_id) as count_m06_id FROM m07_post_bid WHERE md5(m06_id)='$idPost' AND mitra_id=$idMitra")->result_array();

        // var_dump($cek_bid[0]['count_m06_id']);die();
        if ($sess_mitra['status_verif'] == 0 || $sess_mitra['status_verif'] == 2) {
            $this->session->set_flashdata('error', 'Silahkan verifikasi data diri terlebih dahulu!!!');
            redirect($this->input->server('HTTP_REFERER'));
        } 
        elseif($cek_bid[0]['count_m06_id'] > 0) {
            $this->session->set_flashdata('error', 'Tawaran hanya bisa 1 kali pengajuan.');
            redirect($this->input->server('HTTP_REFERER'));
        } else {
            if ($this->input->get('id')) {
                $id = addslashes($this->input->get('id'));
            } else {
                redirect($this->input->server('HTTP_REFERER'));
            }
            $getBid = $this->Bid->getProjectBiddingMitra($id)->result();

            $data = array(
                'title' => 'Form Pengajuan -' . $this->lang->line('title'),
                'data_session' => $sess_mitra,
                'dataBid' => $getBid[0],
            );


            if ($data['dataBid']->category_id == 'Desain') {

                $this->load->model('M_deskripsi_pekerjaan_model');

                $kondisi = array(
                    'id_mitra_deskripsi_pekerjaan' => $_SESSION['data_session']['id'],
                );
                $m_item_pekerjaan = $this->M_deskripsi_pekerjaan_model->get_all($kondisi);



                $data_desain_form = array(
                    'button' => 'Buat',
                    'action' => site_url('bid_desain/create_action'),
                    'id_bid_desain' => set_value('id_bid_desain'),
                    'no_bid_desain' => set_value('no_bid_desain'),
                    'tanggal_bid_desain' => set_value('tanggal_bid_desain'),
                    'nilai_projek_bid_desain' => set_value('nilai_projek_bid_desain'),
                    'min_anggaran_bid_desain' => set_value('min_anggaran_bid_desain'),
                    'max_anggaran_bid_desain' => set_value('max_anggaran_bid_desain'),
                    'durasi_projek_bid_desain' => set_value('durasi_projek_bid_desain'),
                    'dokumen_administrasi_bid_desain' => set_value('dokumen_administrasi_bid_desain'),
                    'id_mitra_bid_desain' => set_value('id_mitra_bid_desain'),
                    'delete_at_bid_desain' => set_value('delete_at_bid_desain'),

                    'm_deskripsi_pekerjaan_data' => $m_item_pekerjaan,
                    // 'id_deskripsi_pekerjaan' => set_value('id_deskripsi_pekerjaan'),
                    'id_deskripsi_pekerjaan_item_pekerjaan' => set_value('id_deskripsi_pekerjaan_item_pekerjaan'),

                );
                $data = array_merge($data, $data_desain_form);
                $data['main'] = 'mitra/bid_desain_mitra/bid_desain_mitra_form';
            } elseif ($data['dataBid']->category_id == 'Konstruksi') {

                $this->load->model('M_deskripsi_pekerjaan_model');

                $kondisi = array(
                    'id_mitra_deskripsi_pekerjaan' => $_SESSION['data_session']['id'],
                );
                $m_item_pekerjaan = $this->M_deskripsi_pekerjaan_model->get_all($kondisi);


                $data_konstruksi_form = array(
                    'button' => 'Buat',
                    'action' => site_url('bid_konstruksi/create_action'),
                    'id_bid_konstruksi' => set_value('id_bid_konstruksi'),
                    'no_bid_konstruksi' => set_value('no_bid_konstruksi'),
                    'tanggal_bid_konstruksi' => set_value('tanggal_bid_konstruksi'),
                    'id_mitra_bid_konstruksi' => set_value('id_mitra_bid_konstruksi'),
                    'delete_at_bid_konstruksi' => set_value('delete_at_bid_konstruksi'),

                    'm_deskripsi_pekerjaan_data' => $m_item_pekerjaan,
                    // 'id_deskripsi_pekerjaan' => set_value('id_deskripsi_pekerjaan'),
                    'id_deskripsi_pekerjaan_item_pekerjaan' => set_value('id_deskripsi_pekerjaan_item_pekerjaan'),

                );
                $data = array_merge($data, $data_konstruksi_form);
                $data['main'] = 'mitra/bid_konstruksi_mitra/bid_konstruksi_mitra_form';
            } else {
                // desain lama depredected
                $data['main'] = 'mitra/form_bid_mitra_v';
                echo 'desain lama';
                die;
            }

            $this->load->view('layout', $data);
        }
    }

    public function saveBid()
    {

        cekSessionMitra();

        if ($this->input->post() !== FALSE) {
            $idBid = $this->Bid->insertBid();
            $idPost = $this->input->post('id_post', true);
            $desc = $this->input->post('description', true);
            $imagePost = upload_post_bid($_FILES['konsep_desain'], $_SESSION['data_session']['name'], 'mitra', $idBid, $idPost, $desc);
            // echo json_encode($imagePost);die();
            if ($imagePost > 0) {
                $result = $this->db->insert_batch('m08_post_bid_pict', $imagePost);
            }
            if ($result) {
                $this->session->set_flashdata('success', 'Pengajuan telah dikirim!!!');
                redirect(base_url('project/detail?id=' . md5((string)$idPost)));
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
