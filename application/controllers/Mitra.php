<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mitra extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('ceksession','language'));
        $this->load->model(array('Post_m'));
        $this->load->model('Project_mitra_m','project');
        $this->load->model('Mitra_m','mitra');
        $this->load->library('form_validation');
        ceksession();
        language();
    }

    public function profile()
    {
        $sess = cekSessionMitra('cek');
		
		$data = array(
			'title' => $this->lang->line('title'),
            'data_session' => $sess,
        );
        
        $data['main'] = 'mitra/profile_mitra_v';

		$this->load->view('layout', $data);
    }

    public function edit_profile()
    {
        $sess = cekSessionMitra('cek');
        // $dataSess = $this->session->userdata('data_session');
        $user = $this->mitra->editProfile($sess['id'])->result();
        // var_dump($user[0]->img_kk);die();
		$data = array(
			'title' => $this->lang->line('title'),
            'data_session' => $sess,
            'dataUser' => $user[0]
        );
        
        $data['main'] = 'mitra/profile_mitra_edit_v';

		$this->load->view('layout', $data);
    }

    public function save_verif()
    {
        cekSessionMitra('cek');
        // Form Validation
        $this->form_validation->set_rules('nik', 'NIK', 'is_unique[m02_mitra.nik]', array(
            'is_unique' => '%s telah digunakan!',
        ));
        $this->form_validation->set_rules('npwp', 'NPWP', 'is_unique[m02_mitra.npwp]', array(
            'is_unique' => '%s telah digunakan!',
        ));

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', validation_errors() );
            redirect($this->input->server('HTTP_REFERER'));
        } else {
            $result = $this->mitra->insVerify();
            if($result)
            {
                $this->session->set_flashdata('success', 'Upload dokumen berhasil!!!');
                redirect($this->input->server('HTTP_REFERER'));
            } else {
                $this->session->set_flashdata('error', 'Upload dokumen gagal!!!');
                redirect($this->input->server('HTTP_REFERER'));
            }
        }
    }

    public function save_profile()
    {
        cekSessionMitra();

        if($this->input->post('id')){
            $result = $this->mitra->insProfile();
            if($result)
            {
                $this->session->set_flashdata('success', 'Upload dokumen berhasil!!!');
                redirect($this->input->server('HTTP_REFERER'));
            } else {
                $this->session->set_flashdata('error', 'Upload dokumen gagal!!!');
                redirect($this->input->server('HTTP_REFERER'));
            }
        } else {
            $this->session->set_flashdata('error', 'Upload dokumen gagal!!!');
            redirect($this->input->server('HTTP_REFERER'));
        }
    }

    public function ongoing_project()
    {
        $mitra = cekSessionMitra();
        $ongoingProject = $this->project->getOngoingProject($mitra['id'])->result();
        
        $data = array(
            'title' => $this->lang->line('title'),
            'data_session' => $this->session->userdata('data_session'),
            'data_project' => $ongoingProject
        );
        
        $data['main'] = 'mitra/ongoing_project_v';

        $this->load->view('layout', $data);
    }

    public function detail_ongoing_design($idProject)
    {
        $mitra = cekSessionMitra();
        $getProject = $this->project->getDetailProject($idProject)->result();
        $imgPost = $this->project->getImagePost($getProject[0]->post_id)->result();
        $data = array(
            'title' => $this->lang->line('title'),
            'data_session' => $mitra,
            'detail_project' => $getProject,
            'imgPost' => $imgPost,
        );
        
        $data['main'] = 'mitra/ongoing_project_detail_design_v';

        $this->load->view('layout', $data);
    }

    public function detail_ongoing_project($idProject)
    {
        $mitra = cekSessionMitra();
        $getProject = $this->project->getDetailProject($idProject)->result();
        $imgPost = $this->project->getImagePost($getProject[0]->post_id)->result();
        $data = array(
            'title' => $this->lang->line('title'),
            'data_session' => $mitra,
            'detail_project' => $getProject,
            'imgPost' => $imgPost,
        );
        
        $data['main'] = 'mitra/ongoing_project_detail_v';

        $this->load->view('layout', $data);
    }

    public function form_progress($idProject)
    {
        $mitra = cekSessionMitra();
        $getProject = $this->project->getDetailProject($idProject)->result();
        $data = array(
            'title' => $this->lang->line('title'),
            'data_session' => $mitra,
            'data_project' => $getProject[0]
        );
        
        $data['main'] = 'mitra/form_progress_v';

        $this->load->view('layout', $data);
    }

    public function certificate()
    {
        cekSessionMitra();
		
		$data = array(
			'title' => $this->lang->line('title'),
            'data_session' => $this->session->userdata('data_session'),
        );
        
        $data['header'] = 'mitra/component/profile_mitra_header';
        $data['main'] = 'mitra/certificate_v';

		$this->load->view('layout', $data);
    }

}