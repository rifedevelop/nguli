<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('ceksession','language','upload_image'));
        $this->load->model(array('Post_m'));
        ceksession();
		language();
    }

    public function save_post()
    {
        $this->form_validation->set_rules('category', 'Category Project', 'required', array(
            'required' => 'Silahkan masukan %s!!!',
        ));
        // $this->form_validation->set_rules('building_area', 'Building Area', 'required', array(
        //     'required' => 'Silahkan masukan %s!!!',
        // ));
        // $this->form_validation->set_rules('budget_min', 'Budget Start', 'required', array(
        //     'required' => 'Silahkan masukan %s!!!',
        // ));
        // $this->form_validation->set_rules('budget_max', 'Budget End', 'required', array(
        //     'required' => 'Silahkan masukan %s!!!',
        // ));
        // $this->form_validation->set_rules('description', 'Description Project', 'required', array(
        //     'required' => 'Silahkan masukan %s!!!',
        // ));
        // $this->form_validation->set_rules('close_tender', 'Close Tender', 'required', array(
        //     'required' => 'Silahkan masukan %s!!!',
        // ));
        // $this->form_validation->set_rules('notif_tender', 'Tender Announcement', 'required', array(
        //     'required' => 'Silahkan masukan %s!!!',
        // ));

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', validation_errors() );
            redirect($this->input->server('HTTP_REFERER'));
        } 

        if ($this->input->post('category')) {

            $result = $this->Post_m->insertPost();
            $idPost = $this->db->insert_id();
            
            $imagePost = $this->upload_post($_FILES['images'],$_SESSION['data_session']['name'],'customer',$result);
            
            if($imagePost > 0)
            {
                $this->db->insert_batch('m12_post_d', $imagePost);
            }
            
            if($result)
            {
                $this->session->set_flashdata('success', 'Berhasil!!!');
                redirect(site_url().'payment_post/detail/'.md5((string)$idPost));
            } else {
                $this->session->set_flashdata('error', validation_errors() );
                redirect($this->input->server('HTTP_REFERER'));
            }
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan');
            redirect(base_url());
        }

    }

    public function save_daily()
    {
        $this->form_validation->set_rules('subcategory', 'Jenis Pekerjaan', 'required', array(
            'required' => 'Silahkan masukan %s!!!',
        ));

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', validation_errors() );
            redirect($this->input->server('HTTP_REFERER'));
        } 

        if ($this->input->post() !== FALSE) {

            $result = $this->Post_m->insertPostDaily();
            
            if($result === TRUE)
            {
                $this->session->set_flashdata('success', 'Pekerjaan harian berhasil dipost!!!');
                redirect($this->input->server('HTTP_REFERER'));
            } else {
                $this->session->set_flashdata('error', validation_errors() );
                redirect($this->input->server('HTTP_REFERER'));
            }
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan');
            redirect(base_url());
        }

    }

    private function upload_post($files,$name,$type_user,$idPost)
    {
        $CI =& get_instance();
        $CI->load->library('upload');
        // Config Upload Image
        $path = './uploads/'.$type_user.'/post';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '4000';
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = TRUE;

        $images = array();
        $result = array();

        foreach($files['name'] as $key => $image) {
            $_FILES['images[]']['name']= $files['name'][$key];
            $_FILES['images[]']['type']= $files['type'][$key];
            $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
            $_FILES['images[]']['error']= $files['error'][$key];
            $_FILES['images[]']['size']= $files['size'][$key];

            $fileName = 'post_'.strtolower($name).'_'.md5((string)$idPost);
            $images[] = $fileName;
            $config['file_name'] = $fileName;
            $CI->upload->initialize($config);
            // var_dump($image);die();

            if (!$CI->upload->do_upload('images[]')) {
                $result = $CI->upload->display_errors();
                
            } else {
                $images[] = compress_image($CI->upload->file_name,$CI->upload->upload_path);
                $result[] = array(
                    'm06_id' => $idPost,
                    'img' => $CI->upload->data('file_name'),
                );
                // $result[] = array(
                //     'm06_id' => 1,
                //     'img' => $CI->upload->data('file_name')
                // );
            }
        }

        return $result;
    }

}